<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = \DB::table('events')
        ->oldest()
        ->get();
        return view('crud.events.index', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.events.create');
    }


    public function store(Request $request)
    {
        $event = new Event([
             'address'=> $request->get('address'),
             'city'=> $request->get('city'),
             'state'=> $request->get('state')
         ]);

        $event->save();
        return redirect('/events');
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
        $events = Event::where('id', $id)
                    ->first();

        return view('crud.events.edit', compact('event', 'id'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $data = $this->validate($request, [
          'address'=>'required',
          'city'=> 'required',
          'state'=> 'required',
        ]);
        $data['id'] = $id;
        $location->updateEvent($data);

        return redirect('/events');
    }


    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect('/events');
    }
/*
    public function singleDestroy($id)
    {
        $location = Location::find($id);
        $location->delete();

        return redirect('/home');
    }

    public function approveLocation($id)
    {
        $location = Location::find($id);
        $location->status = 1;
        $location->save();
        return redirect('/home');
    }

    public function cancelLocation($id)
    {
        $location = Location::find($id);
        $location->status = 0;
        $location->save();
        return redirect('/home');
    }
    */
}
