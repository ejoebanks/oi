<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedule = \DB::table('schedule')->orderBy('shift')->get();
        return view('crud.schedule.index', compact('schedule'));
    }

    public function index2()
    {
        $schedule = \DB::table('schedule')->orderBy('seniority', 'desc')->get();

        $normalUser = Schedule::where('id', Auth::user()->id)
                      ->first();


        return view('crud.schedule.list', compact('schedule', 'shiftcount', 'normalUser'));
    }

    public function personalShift()
    {
        $normalUser = Schedule::where('id', Auth::user()->clockNumber)
                      ->first();

        $firstName = $normalUser->firstName;
        $lastName = $normalUser->lastName;

        return view('home', compact('normalUser', 'firstName', 'lastName'));
    }


    public function create()
    {
        return view('crud.schedule.create');
    }

    public function store(Request $request)
    {
        $schedule = new Schedule([
            'firstName'=>$request->get('firstName'),
            'lastName'=> $request->get('lastName'),
            'shift'=> $request->get('shift')
        ]);

        $schedule->save();
        return redirect('/schedule');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $schedule = Schedule::where('id', $id)
                      ->first();

        return view('crud.schedule.edit', compact('schedule', 'id'));
    }

    public function updateShift($id, $char)
    {
        $schedule = Schedule::find($id);
        if ($char == 'A' || $char == 'B' || $char == 'C' || $char == 'D') {
            $schedule->shift = $char;
            $schedule->save();
        }

        return redirect('/lists');
    }

    public function update(Request $request, $id)
    {
        $schedule = new Schedule();
        $data = $this->validate($request, [
          'firstName'=>'required',
          'lastName'=> 'required',
          'shift'=> 'required',
        ]);
        $data['id'] = $id;
        $schedule->updateSchedule($data);

        return redirect('/schedule');
    }


    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();

        return redirect('/schedule');
    }
}
