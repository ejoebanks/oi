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
    public function employeeAbsences()
    {
        $absences = Absence::join('staff', 'staff.clockNumber', '=', 'absences.clock_number')
                  ->select('staff.clockNumber as clock_number', 'absences.start_date AS start', 'absences.end_date AS end', 'staff.firstName', 'staff.lastName')
                  ->orderBy('absences.created_at', 'desc')
                  ->get();

        return view('absences.report', compact('absences'));
    }

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
        try {
            $absence = new Absence([
            'clock_number'=>$request->get('clock_number'),
            'start_date'=> $request->get('start_date'),
            'end_date'=> $request->get('end_date'),
            'reason'=> $request->get('reason')
        ]);

            $absence->save();
        } catch (\Exception $e) {
            $message = "Database Interaction Disabled";
        }

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
        try {
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
        } catch (\Exception $e) {
            $message = "Database Interaction Disabled";
        }


        return redirect('/lists');
    }

    public function update(Request $request, $id)
    {
        try {
            $absence = new Absence();
            $data = $this->validate($request, [
          'clock_number'=> 'required',
          'reason'=> 'nullable',
          'start_date'=> 'required',
          'end_date'=> 'required'
        ]);
            $data['id'] = $id;
            $absence->updateAbsence($data);
        } catch (\Exception $e) {
            $message = "Database Interaction Disabled";
        }


        return redirect('/absences');
    }

    public function destroy($id)
    {
        try {
            $shift = Absence::find($id);
            $shift->delete();
        } catch (\Exception $e) {
            $message = "Database Interaction Disabled";
        }


        return redirect('/absences');
    }

    public function createAbsence(Request $request)
    {
        try {
            $absence = new Absence([
             'clock_number'=> $request->get('clock_number'),
             'start_date'=> $request->get('start_date'),
             'end_date'=> $request->get('end_date'),
             'reason'=> $request->get('reason')
         ]);
            $absence->save();
        } catch (\Exception $e) {
            $message = "Database Interaction Disabled";
        }
    }
}
