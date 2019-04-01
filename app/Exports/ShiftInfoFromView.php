<?php
namespace App\Exports;
use App\Shift;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ShiftInfoFromView implements FromView
{
    public function view(): View
    {
        return view('orgchart.chart', [
            'shifts' => Shift::join('staff', 'staff.clockNumber', '=', 'shifts.clockNumber')
                  ->select('shifts.clockNumber', 'staff.firstName', 'staff.lastName', 'shifts.shift', 'shifts.primaryJob')
                  ->orderBy('shift', 'ASC')
                  ->orderBy('primaryJob', 'ASC')
                  ->get()
        ]);
    }
}
