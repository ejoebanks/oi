<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shift;
use App\Staff;
use App\Event;
use App\User;
use App\Absence;
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
        $recentChanges = Shift::join('staff', 'staff.clockNumber', '=', 'shifts.clockNumber')
                    ->select('staff.clockNumber as id', 'shifts.updated_at AS updated', 'shifts.shift', 'shifts.clockNumber', 'staff.firstName', 'staff.lastName')
                    ->orderBy('shifts.updated_at', 'desc')
                    ->take(10)
                    ->get();

        return view('recent', compact('recentChanges'));
    }

    public function index()
    {
        $shift = Shift::join('staff', 'staff.clockNumber', '=', 'shifts.clockNumber')
                  ->orderBy('shift')
                  ->get();

        return view('crud.shifts.index', compact('shift'));
    }

    public function listShifts()
    {
        $shift = Shift::join('staff', 'staff.clockNumber', '=', 'shifts.clockNumber')
                  ->orderBy('seniority', 'asc')
                  ->get();

        $normalUser = Shift::where('id', Auth::user()->id)
                      ->first();

        $jobs = Shift::all()->keyBy('primaryJob')->pluck('primaryJob')->toArray();
        $employee_absence = Absence::all()->keyBy('clock_number');
        $i = 1;
        foreach ($jobs as $job) {
            $outputclass[$job] = 'job-color-'.$i;
            $i++;
        }

        return view('crud.shifts.list', compact('shift', 'shiftcount', 'normalUser', 'jobs', 'outputclass', 'employee_absence'));
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

        return view('home', compact('unassigned', 'normalUser', 'firstName', 'lastName', 'shiftCount', 'staffCount', 'eventCount', 'shiftchangecount'));
    }


    public function create()
    {
        $staff = Staff::leftjoin('shifts', 'staff.clockNumber', '=', 'shifts.clockNumber')
                      ->where('shifts.clockNumber', '=', null)
                      ->select('staff.*')
                      ->get();

        return view('crud.shifts.create', compact('staff'));
    }

    public function store(Request $request)
    {
        try {
            $shift = new Shift([
            'clockNumber'=>$request->get('clockNumber'),
            'comments'=> $request->get('comments'),
            'primaryJob'=> $request->get('primaryJob'),
            'shift'=> $request->get('shift')
        ]);
            $shift->save();
        } catch (\Exception $e) {
            $message = "Database Interaction Disabled";
        }

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
        $staff = Staff::all();

        return view('crud.shifts.edit', compact('shift', 'id', 'staff'));
    }

    public function updateShift($id, $char)
    {
        $shift = Shift::find($id);
        try {
            $shiftchange = new ShiftChange();
            if ($char == 'A' || $char == 'B' || $char == 'C' || $char == 'D') {
                $shiftchange->prevshift = $shift->shift;
                $shift->shift = $char;
                $shiftchange->clockNumber = $shift->clockNumber;
                $shiftchange->currentshift = $char;
                $shiftchange->save();
                $shift->save();
            }
        } catch (\Exception $e) {
            $message = "Database Interaction Disabled";
        }

        return back()->withErrors(['Database Interaction Disabled']);
    }



    public function update(Request $request, $id)
    {
      try{
        $shift = new Shift();
        $data = $this->validate($request, [
          'clockNumber'=> 'required',
          'primaryJob'=> 'required',
          'comments'=> 'nullable',
          'shift'=> 'required',
        ]);
        $data['id'] = $id;
        $shift->updateShift($data);
      }
      catch(\Exception $e) {
      $message = "Database Interaction Disabled";
      }


        return redirect('/shifts');
    }


    public function destroy($id)
    {
        try {
            $shift = Shift::find($id);
            $shift->delete();
        } catch (\Exception $e) {
            $message = "Database Interaction Disabled";
        }

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
    }

    public function sendChart()
    {
        Mail::to(User::find(Auth::user()->id))->send(new OrgChart());
        return redirect('/lists');
    }
}
