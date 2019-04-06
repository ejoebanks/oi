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
          $styleArray = [
    'font' => [
        'bold' => true,
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
        'argb' => 'FFA0A0A0',
        ],
    ],
];

            $cellRange = 'A1:D1'; // All headers
            $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);

            $event->sheet->getStyle($cellRange)->applyFromArray($styleArray);

        },
    ];
}

}
