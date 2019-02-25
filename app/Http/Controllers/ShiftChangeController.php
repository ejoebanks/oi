<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShiftChange;
use Auth;

class ShiftChangeController extends Controller
{

    public function index()
    {
        $shiftchange = \DB::table('shiftchanges')
                  ->join('staff', 'staff.clockNumber', '=', 'shiftchanges.clockNumber')
                  ->select('staff.clockNumber as id', 'staff.firstName', 'staff.lastName', 'shiftchanges.currentshift', 'shiftchanges.prevshift', 'shiftchanges.created_at')
                  ->orderBy('shiftchanges.created_at', 'desc')
                  ->get();

        return view('crud.shiftchanges.index', compact('shiftchange'));
    }


    public function create()
    {
        return view('crud.shiftchanges.create');
    }

    public function store(Request $request)
    {
        $shiftchange = new ShiftChange([
            'clockNumber'=>$request->get('clockNumber'),
            'currentshift'=> $request->get('currentshift'),
            'prevshift'=> $request->get('prevshift')
            ]);

        $shiftchange->save();
        return redirect('/shiftchanges');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $shiftchange = ShiftChange::where('id', $id)
                      ->join('staff', 'staff.clockNumber', '=', 'schedule.clockNumber')
                      ->first();

        return view('crud.shiftchanges.edit', compact('schedule', 'id'));
    }


    public function update(Request $request, $id)
    {
        $shiftchange = new ShiftChange();
        $data = $this->validate($request, [
          'clockNumber'=>'required',
          'currentshift'=> 'required',
          'prevshift'=> 'required',
        ]);
        $data['id'] = $id;
        $shiftchange->UpdateShiftChange($data);

        return redirect('/shiftchanges');
    }


    public function destroy($id)
    {
        $shiftchange = ShiftChange::find($id);
        $shiftchange->delete();

        return redirect('/shiftchanges');
    }
}
