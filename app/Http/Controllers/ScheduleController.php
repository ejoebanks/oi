<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedule = \DB::table('schedule')->oldest()->get();
        return view('crud.schedule.index', compact('schedule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.schedule.create');
    }

    public function store(Request $request)
    {
        $schedule = new Schedule([
            'firstName'=>$request->get('firstName'),
            'lastName'=> $request->get('lastName'),
        ]);

        $schedule->save();
        return redirect('/schedules');
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Schedule::where('id', $id)
                      ->first();

        return view('crud.schedule.edit', compact('schedule', 'id'));
    }

    public function update(Request $request, $id)
    {
        $schedule = new Schedule();
        $data = $this->validate($request, [
          'firstName'=>'required',
          'lastName'=> 'required',
        ]);
        $data['id'] = $id;
        $schedule->updateSchedule($data);

        return redirect('/schedules');
    }


    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();

        return redirect('/schedule');
    }
}
