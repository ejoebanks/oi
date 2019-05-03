<?php

namespace App\Exports;

use App\ShiftChange;
use Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


class RecentExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{

    public function collection()
    {
      $recentChanges = ShiftChange::join('staff', 'staff.clockNumber', '=', 'shiftchanges.clockNumber')
                ->join('shifts', 'staff.clockNumber', '=', 'shifts.clockNumber')
                ->select('staff.clockNumber as id', 'shifts.primaryJob AS job', 'staff.firstName', 'staff.lastName', 'shiftchanges.prevshift', 'shiftchanges.currentshift', 'shiftchanges.created_at AS created')
                ->whereBetween('shiftchanges.created_at',
                [Carbon::today()->subDays(30)->toDateString(),
                Carbon::now()])
                ->orderBy('shiftchanges.created_at', 'desc')
                ->get();
      $count = ShiftChange::count();

      return $recentChanges;

    }

    public function headings(): array
    {
        return [
        'Clock #',
        'Primary Job',
        'First Name',
        'Last Name',
        'Moved From',
        'Moved To',
        'Moved On'
        ];
    }

    public function registerEvents(): array
    {
    return [
        AfterSheet::class=> function(AfterSheet $event) {
            $cellRange = 'A1:G1';
            $count = ShiftChange::count() + 1;
            $all = 'A1:G'.$count;

            $event->sheet->getStyle($all)->getAlignment()->applyFromArray(
                array('horizontal' => 'center')
            );

            $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);

            $event->sheet->getStyle($cellRange)->getFill()
                         ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                         ->getStartColor()->setARGB('85c1cc');

        },
    ];
}


}
