<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShiftChange;
use Auth;
use App\User;
use App\Staff;
use Carbon;
use Illuminate\Support\Facades\Mail;
use App\Exports\RecentExport;
use App\Mail\RecentChanges;

class ShiftChangeController extends Controller
{
    public function recent()
    {
        $recentChanges = ShiftChange::join('staff', 'staff.clockNumber', '=', 'shiftchanges.clockNumber')
                  ->join('shifts', 'staff.clockNumber', '=', 'shifts.clockNumber')
                  ->select('staff.clockNumber as id', 'shiftchanges.created_at AS created', 'shiftchanges.prevshift', 'shiftchanges.currentshift', 'staff.firstName', 'staff.lastName', 'shifts.primaryJob AS job')
                  ->whereBetween(
                      'shiftchanges.created_at',
                  [Carbon::today()->subDays(30)->toDateString(),
                  Carbon::now()]
                  )
                  ->orderBy('shiftchanges.created_at', 'desc')
                  ->get();

        return view('recent', compact('recentChanges'));
    }


    public function index()
    {
        $shiftchange = ShiftChange::join('staff', 'staff.clockNumber', '=', 'shiftchanges.clockNumber')
                  ->select('shiftchanges.id as id', 'staff.clockNumber', 'staff.firstName', 'staff.lastName', 'shiftchanges.currentshift', 'shiftchanges.prevshift', 'shiftchanges.created_at')
                  ->orderBy('shiftchanges.created_at', 'desc')
                  ->get();

        return view('crud.shiftchanges.index', compact('shiftchange'));
    }


    public function create()
    {
        $staff = Staff::all();
        return view('crud.shiftchanges.create', compact('staff'));
    }

    public function store(Request $request)
    {
        try {
            $shiftchange = new ShiftChange([
            'clockNumber'=>$request->get('clockNumber'),
            'currentshift'=> $request->get('currentshift'),
            'prevshift'=> $request->get('prevshift')
            ]);

            $shiftchange->save();
        } catch (\Exception $e) {
            $message = "Database Interaction Disabled";
        }

        return redirect('/shiftchanges');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $shiftchange = ShiftChange::where('id', $id)
                      ->join('staff', 'staff.clockNumber', '=', 'shiftchanges.clockNumber')
                      ->first();
        $staff = Staff::all();


        return view('crud.shiftchanges.edit', compact('shiftchange', 'id', 'staff'));
    }


    public function update(Request $request, $id)
    {
        try {
            $shiftchange = new ShiftChange();
            $data = $this->validate($request, [
          'clockNumber'=>'required',
          'currentshift'=> 'required',
          'prevshift'=> 'required',
        ]);
            $data['id'] = $id;
            $shiftchange->updateChange($data);
        } catch (\Exception $e) {
            $message = "Database Interaction Disabled";
        }


        return redirect('/shiftchanges');
    }


    public function destroy($id)
    {
        try {
            $shiftchange = ShiftChange::find($id);
            $shiftchange->delete();
        } catch (\Exception $e) {
            $message = "Database Interaction Disabled";
        }


        return redirect('/shiftchanges');
    }

    public function sendRecent()
    {
        try {
            Mail::to(User::find(Auth::user()->id))->send(new RecentChanges());
        } catch (\Exception $e) {
            $message = "Database Interaction Disabled";
        }

        return redirect('/changes');
    }
}
