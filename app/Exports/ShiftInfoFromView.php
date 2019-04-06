<?php
namespace App\Exports;
use App\Shift;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ShiftInfoFromView implements FromView, ShouldAutoSize, WithEvents
{
    public function view(): View
    {
        return view('orgchart.testchart', [
            'shifts' => Shift::join('staff', 'staff.clockNumber', '=', 'shifts.clockNumber')
                        ->select('shifts.clockNumber', 'staff.firstName', 'staff.lastName', 'shifts.shift', 'shifts.primaryJob')
                        ->orderBy('shift', 'ASC')
                        ->orderBy('primaryJob', 'ASC')
                        ->get()

        ]);
    }

    public function registerEvents(): array
{
    return [
        AfterSheet::class=> function(AfterSheet $event) {
            $cellRange = 'A1:W1'; // All headers
            $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
        },
    ];
}

}
