<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Shift;
use App\User;
use App\Imports\StaffImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ShiftsFromView;



class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::oldest()->get();
        return view('crud.staff.index', compact('staff'));
    }

    public function create()
    {
        return view('crud.staff.create');
    }

    public function store(Request $request)
    {
        $staff = new Staff([
            'clockNumber'=>$request->get('clockNumber'),
            'seniority'=>$request->get('seniority'),
            'firstName'=>$request->get('firstName'),
            'lastName'=>$request->get('lastName')
        ]);

        $staff->save();

        if ($request->get('shift') != NULL){
          $shift = new Shift([
            'clockNumber'=>$request->get('clockNumber'),
            'shift'=>$request->get('shift'),
            'primaryJob'=>$request->get('primaryJob'),
            'comments'=>$request->get('comments')
          ]);
          $shift->save();
        }
        if ($request->get('shift') != NULL){
          $shiftappend = " They were assigned to shift ".$shift->shift.".";
        } else {
          $shiftappend = '';
        }
        return redirect('/staff')->with('message',
        'Staff member '.$staff->firstName.' '.$staff->lastName.' created.'.$shiftappend);
    }

    public function show($clockNumber)
    {
        //
    }

    public function edit($clockNumber)
    {
        $staff = Staff::where('clockNumber', $clockNumber)
                      ->first();

        return view('crud.staff.edit', compact('staff', 'clockNumber'));
    }

    public function update(Request $request, $clockNumber)
    {
        $staff = new Staff();
        $data = $this->validate($request, [
          'clockNumber'=>'required|integer',
          'seniority'=>'required|date_format:Y-m-d',
          'firstName'=>'required|string|max:255',
          'lastName'=>'required|string|max:255',
        ]);

        if ($request->get('shift') != NULL){
          $shift = new Shift([
            'clockNumber'=>$request->get('clockNumber'),
            'shift'=>$request->get('shift'),
            'primaryJob'=>$request->get('primaryJob'),
            'comments'=>$request->get('comments')
          ]);
          $shift->save();
        }

        $data['clockNumber'] = $clockNumber;
        $staff->updateMember($data);

        return redirect('/staff');
    }

    public function destroy($clockNumber)
    {
        $staff = Staff::find($clockNumber);
        $staff->delete();

        return redirect('/staff')->with('message', $staff->firstName.' '.$staff->lastName.' deleted.');
    }

    public function import()
    {
        Excel::import(new StaffImport,request()->file('file'));
        return redirect('/admin')->with('message', 'Staff and shifts created/updated!');
    }

    public function exportScheduling()
    {
        return Excel::download(new ShiftsFromView, 'Employee_Scheduling.xlsx');
    }
}
