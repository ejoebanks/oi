<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Staff;

class EventController extends Controller
{
    public function index()
    {
        $event = Event::all();

        return view('crud.events.index', compact('event'));
    }

    public function all()
    {
        $event = Event::join('staff', 'events.employee', '=', 'staff.clockNumber')
                ->select('staff.firstName', 'staff.lastName', 'events.*')
                ->get();

        $generalevent = Event::whereNull('employee')->select('events.*')->get();
        $staff = \DB::table('staff')
                //->join('events', 'events.employee', '=', 'staff.clockNumber')
                //->select('staff.clockNumber', 'staff.firstName', 'staff.lastName')
                ->get();

        return view('calendar', compact('event', 'staff', 'generalevent'));
    }

    public function create()
    {
        return view('crud.events.create');
    }


    public function store(Request $request)
    {
        $event = new Event([
             'title'=> $request->get('title'),
             'employee'=> $request->get('employee'),
             'description'=> $request->get('description'),
             'date'=> $request->get('date')
         ]);

        $event->save();
        return redirect('/events');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $event = Event::where('id', $id)
                    ->first();

        $staff = Staff::all();

        return view('crud.events.edit', compact('event', 'id', 'staff'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $data = $this->validate($request, [
          'title'=>'required',
          'employee'=> 'required',
          'date'=> 'required',
          'description'=> 'nullable',
        ]);
        $data['id'] = $id;
        $event->updateEvent($data);

        return redirect('/events');
    }


    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect('/events');
    }

    public function updateEvent(Request $request)
    {
        $id = $request->input('id');
        if (Event::find($id) == null) {
            $event = new Event([
                 'title'=> $request->get('title'),
                 'employee'=> $request->get('employee'),
                 'description'=> $request->get('description'),
                 'date'=> $request->get('date')
             ]);
            $event->save();
        } else {
            $title = $request->input('title');
            alert($request->input('employee'));
            $employee = $request->input('employee');
            $date = $request->input('date');
            $description = $request->input('description');
            $event = Event::findOrFail($id);
            $event->description = $description;
            $event->title = $title;
            $event->employee = $employee;
            $event->date = $date;
            $event->save();
        }
    }

    public function createEvent(Request $request)
    {
      $event = new Event([
           'title'=> $request->get('title'),
           'employee'=> $request->get('employee'),
           'description'=> $request->get('description'),
           'date'=> $request->get('date')
       ]);

      $event->save();
    }

    public function removeEvent(Request $request)
    {
        $id = $request->input('id');
        $event = Event::find($id);
        $event->delete();
    }

    public function updateDate(Request $request)
    {
        $date = $request->input('date');
        $id = $request->input('ev_id');
        $event = Event::find($id);
        $event->date = $date;
        $event->save();
    }
}
