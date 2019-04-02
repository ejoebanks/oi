<?php
namespace App\Exports;
use App\Shift;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ShiftInfoFromView implements FromView, ShouldAutoSize
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
