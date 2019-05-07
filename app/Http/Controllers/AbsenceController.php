<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absence;
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

class AbsenceController extends Controller
{
    public function index()
    {
        $absences = Absence::all();

        return view('crud.absences.index', compact('absences'));
    }


    public function create()
    {
        $absences = Absence::all();

        $staff = Staff::all();

        return view('crud.absences.create', compact('absences', 'staff'));
    }

    public function store(Request $request)
    {
        $absence = new Absence([
            'clock_number'=>$request->get('clock_number'),
            'date_missed'=> $request->get('date_missed'),
            'reason'=> $request->get('reason')
        ]);

        $absence->save();
        return redirect('/absences');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $absence = Absence::where('id', $id)
                      ->first();

        $staff = Staff::all();

        return view('crud.absences.edit', compact('absence', 'id', 'staff'));
    }

    public function updateShift($id, $char)
    {
        $shift = Absence::find($id);
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
        $absence = new Absence();
        $data = $this->validate($request, [
          'clock_number'=> 'required',
          'reason'=> 'nullable',
          'date_missed'=> 'required',
        ]);
        $data['id'] = $id;
        $absence->updateAbsence($data);

        return redirect('/absences');
    }

    public function destroy($id)
    {
        $shift = Absence::find($id);
        $shift->delete();

        return redirect('/absences');
    }

    public function createAbsence(Request $request) {
      $absence = new Absence([
           'clock_number'=> $request->get('clock_number'),
           'date_missed'=> $request->get('date_missed'),
           'reason'=> $request->get('reason')
       ]);
      $absence->save();
    }
}
