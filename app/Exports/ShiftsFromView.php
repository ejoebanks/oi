<?php

namespace App\Exports;

use App\Shift;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ShiftsFromView implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {

        $shifts = Shift::join('staff', 'staff.clockNumber', '=', 'shifts.clockNumber')
              ->select('shifts.clockNumber', 'staff.seniority', 'staff.firstName', 'staff.lastName', 'shifts.shift', 'shifts.primaryJob', 'shifts.comments')
              ->orderBy('shift', 'ASC')
              ->orderBy('primaryJob', 'ASC')
              ->get();

        return $shifts;
    }

    public function headings(): array
    {
        return [
        '#',
        'Seniority',
        'First Name',
        'Last Name',
        'Shift',
        'Primary Job',
        'Comments'
    ];
    }

    public function registerEvents(): array
    {
    return [
        AfterSheet::class=> function(AfterSheet $event) {
            $cellRange = 'A1:G1'; // All headers
            $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);

            $event->sheet->getStyle($cellRange)->getFill()
                         ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                         ->getStartColor()->setARGB('85c1cc');
        },
    ];
}

}
