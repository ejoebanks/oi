<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shift;
use App\Staff;
use App\Event;
use App\User;
use \DateTime;
use App\Exports\ShiftsFromView;
use App\Exports\ShiftInfoFromView;
use \Excel;
use App\ShiftChange;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrgChart;

class ShiftController extends Controller
{
    public function recent()
    {
        $recentChanges = \DB::table('shifts')
                    ->join('staff', 'staff.clockNumber', '=', 'shifts.clockNumber')
                    ->select('staff.clockNumber as id', 'shifts.updated_at AS updated', 'shifts.shift', 'shifts.clockNumber', 'staff.firstName', 'staff.lastName')
                    ->orderBy('shifts.updated_at', 'desc')
                    ->take(10)
                    ->get();

        return view('recent', compact('recentChanges'));
    }

    public function index()
    {
        $shift = \DB::table('shifts')
                  ->join('staff', 'staff.clockNumber', '=', 'shifts.clockNumber')
                  ->orderBy('shift')
                  ->get();

        return view('crud.shifts.index', compact('shift'));
    }

    public function listShifts()
    {
        $shift = \DB::table('shifts')
                  ->join('staff', 'staff.clockNumber', '=', 'shifts.clockNumber')
                  ->orderBy('seniority', 'desc')
                  ->get();

        $normalUser = Shift::where('id', Auth::user()->id)
                      ->first();


        return view('crud.shifts.list', compact('shift', 'shiftcount', 'normalUser'));
    }

    public function unassignedEmployees()
    {
        $unassigned = \DB::table('staff')
                    ->leftjoin('shifts', 'staff.clockNumber', '=', 'shifts.clockNumber')
                    ->where('shifts.clockNumber', '=', null)
                    ->select('staff.*')
                    ->get();

        return view('unassigned', compact('unassigned'));
    }

    public function personalShift()
    {
        $normalUser = Shift::where('id', Auth::user()->clockNumber)
                      ->first();

        //Counts
        $shiftCount = Shift::count();
        $staffCount = Staff::count();
        $eventCount = \DB::table('events')
                        ->whereBetween('date', [Carbon::today()->toDateString(), Carbon::today()->addDays(7)->toDateString()])
                        ->count();

        $shiftchangecount = \DB::table('shiftchanges')
                              ->whereBetween('created_at', [Carbon::today()->subDays(30)->toDateString(), Carbon::today()->toDateString()])
                              ->count();

        $unassigned = \DB::table('staff')
                      ->leftjoin('shifts', 'staff.clockNumber', '=', 'shifts.clockNumber')
                      ->where('shifts.clockNumber', '=', null)
                      ->count();


        //$firstName = $normalUser->firstName;
        //$lastName = $normalUser->lastName;

        return view('home', compact('unassigned', 'normalUser', 'firstName', 'lastName', 'shiftCount', 'staffCount', 'eventCount', 'shiftchangecount'));
    }


    public function create()
    {
        return view('crud.shifts.create');
    }

    public function store(Request $request)
    {
        $shift = new Shift([
            'clockNumber'=>$request->get('clockNumber'),
            'comments'=> $request->get('comments'),
            'primaryJob'=> $request->get('primaryJob'),
            'shift'=> $request->get('shift')
        ]);

        $shift->save();
        return redirect('/shifts');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $shift = Shift::where('id', $id)
                      ->join('staff', 'staff.clockNumber', '=', 'shifts.clockNumber')
                      ->first();

        return view('crud.shifts.edit', compact('shift', 'id'));
    }

    public function updateShift($id, $char)
    {
        $shift = Shift::find($id);
        $shiftchange = new ShiftChange();
        if ($char == 'A' || $char == 'B' || $char == 'C' || $char == 'D') {
            $shiftchange->prevshift = $shift->shift;
            $shift->shift = $char;
            $shiftchange->clockNumber = $shift->clockNumber;
            $shiftchange->currentshift = $char;
            $shiftchange->save();
            $shift->save();
        }

        return redirect('/lists');
    }

    public function update(Request $request, $id)
    {
        $shift = new Shift();
        $data = $this->validate($request, [
          'clockNumber'=> 'required',
          'primaryJob'=> 'required',
          'comments'=> 'nullable',
          'shift'=> 'required',
        ]);
        $data['id'] = $id;
        $shift->updateShift($data);

        return redirect('/shifts');
    }


    public function destroy($id)
    {
        $shift = Shift::find($id);
        $shift->delete();

        return redirect('/shifts');
    }

    public function spreadsheet()
    {
        $shifts = Shift::join('staff', 'staff.clockNumber', '=', 'shifts.clockNumber')
            ->select('shifts.clockNumber', 'staff.firstName', 'staff.lastName', 'shifts.shift', 'shifts.primaryJob')
            ->orderBy('shift', 'ASC')
            ->orderBy('primaryJob', 'ASC')
            ->get();

        return Excel::download(new ShiftsFromView, 'shifts.xlsx');
    }

    public function shiftspread()
    {
        $shifts = Shift::join('staff', 'staff.clockNumber', '=', 'shifts.clockNumber')
            ->select('shifts.clockNumber', 'staff.firstName', 'staff.lastName', 'shifts.shift', 'shifts.primaryJob')
            ->orderBy('shift', 'ASC')
            ->orderBy('primaryJob', 'ASC')
            ->get();

        return view('orgchart', compact('shifts'));
    }

    public function shiftspread2()
    {
        $shifts = Shift::orderBy('shift', 'ASC')
            ->orderBy('primaryJob', 'ASC')
            ->get();

        $testshift = Shift::join('staff', 'staff.clockNumber', '=', 'shifts.clockNumber')
              ->select('shifts.clockNumber', 'staff.firstName', 'staff.lastName', 'shifts.shift', 'shifts.primaryJob')
              ->get();


        $grouped = $testshift->groupBy('shift');

        $grouped->toArray();


        return view('orgchart.testchart', compact('grouped', 'shifts', 'testshift'));
    }


    public function export()
    {
        return Excel::download(new ShiftInfoFromView, 'shifts_'.(Carbon::now())->toDateString().'.xlsx');
        //return Excel::download(new ShiftInfoFromView, 'shifts.xlsx');
    }

    public function sendChart()
    {
        Mail::to(User::find(Auth::user()->id))->send(new OrgChart());
        return redirect('/orgchart');
    }
}
