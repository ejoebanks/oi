<?php
namespace App\Exports;
use App\Shift;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;

class ShiftInfoFromView implements FromView, ShouldAutoSize, WithEvents
{
    public function view(): View
    {
        $shifts = Shift::join('staff', 'staff.clockNumber', '=', 'shifts.clockNumber')
            ->select('shifts.clockNumber', 'staff.firstName', 'staff.lastName', 'shifts.shift', 'shifts.primaryJob')
            ->get();

        $grouped = $shifts->groupBy('shift');

        $grouped->toArray();

        return view('orgchart.testchart', [
            'shifts' => $shifts,
            'grouped' => $grouped,
        ]);
    }


    public function registerEvents(): array
{

    return [
      BeforeExport::class  => function(BeforeExport $event) {
            $event->writer->setCreator('OI');
        },

        AfterSheet::class=> function(AfterSheet $event) {
          $styleArray = [
                'font' => [
                    'size' => 16,
                    'bold' => true,
                    'color' => array('rgb' => 'ffffff'),
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => '173CA0',
                    ],
                ],
            ];
            $shifts = Shift::join('staff', 'staff.clockNumber', '=', 'shifts.clockNumber')
                ->select('shifts.clockNumber', 'staff.firstName', 'staff.lastName', 'shifts.shift', 'shifts.primaryJob')
                ->get();

            $grouped = $shifts->groupBy('shift');

            $grouped->toArray();

/*
            $arr = array();
            $cellVal = array();
            $cellVal[0] = "A";
            $i = 0;
            foreach($shifts as $shift){
              if ($i >= 23){
                $i = 0;
              }
              $i++;
              if ($cellVal[0] !== $shift->shift){
                $cellVal[0] = $shift->shift;
              }
              if (!in_array($shift->primaryJob, $cellVal) && $cellVal[0] == $shift->shift){
                array_push($arr, $shift->primaryJob);
                array_push($cellVal, $shift->shift.$i);
              }
            }
            */
            $pos = 1;
            foreach(range('A', 'D') as $char){
             foreach($grouped["$char"] as $group){
              $sCount= Shift::where('shift', $group->shift)->count();
              if ($pos > $sCount){
                $pos = 1;
              }

              $pos++;
              $cell = $group->shift.$pos;

              if ($group->primaryJob == "G4010") {
                $event->sheet->getStyle($cell)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('7a93b0');
              }

              if ($group->primaryJob == "G1003"){
                $event->sheet->getStyle($cell)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('85c1cc');
              }

              if ($group->primaryJob == "G0410"){
                $event->sheet->getStyle($cell)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('b3a78f');
              }


              if ($group->primaryJob == "G0609"){
                $event->sheet->getStyle($cell)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('a1bfdc');
              }

              if ($group->primaryJob == "G410") {
                $event->sheet->getStyle($cell)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('ff555d');
              }

            }
          }


            $cellRange = 'A1:D1';
            $event->sheet->setCellValue('A1', 'Shift A');
            $event->sheet->getStyle($cellRange)->applyFromArray($styleArray);
        },
    ];
}

}
