<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;

class StaffController extends Controller
{
    public function index()
    {
        $staff = \DB::table('staff')->oldest()->get();
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
        return redirect('/staff');
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
        $data['clockNumber'] = $clockNumber;
        $staff->updateMember($data);

        return redirect('/staff');
    }

    public function destroy($clockNumber)
    {
        $staff = Staff::find($clockNumber);
        $staff->delete();

        return redirect('/staff');
    }
}