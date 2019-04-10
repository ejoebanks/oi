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
                'borders' => [
                    'bottom' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    ],
                ],

            ];

            $footerStyle = [
                  'font' => [
                      'size' => 16,
                      'bold' => true,
                      'color' => array('rgb' => 'ffffff'),
                  ],
                  'alignment' => [
                      'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                  ],
                  'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => '140000'],
                        ],
                  ],

              ];

            $shifts = Shift::join('staff', 'staff.clockNumber', '=', 'shifts.clockNumber')
                ->select('shifts.clockNumber', 'staff.firstName', 'staff.lastName', 'shifts.shift', 'shifts.primaryJob')
                ->get();

            $grouped = $shifts->groupBy('shift');

            $grouped->toArray();

            foreach(range('A', 'D') as $char){
              $pos = 1;
             foreach($grouped["$char"] as $group){
              $sCount= Shift::where('shift', $group->shift)->count();
              if ($pos > $sCount){
                $pos = 2;
              } else {
                $pos++;
              }
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

              if ($group->primaryJob == "G0807") {
                $event->sheet->getStyle($cell)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('8cabe1');
              }

              if ($group->primaryJob == "GD640") {
                $event->sheet->getStyle($cell)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('eeea88');
              }

              if ($group->primaryJob == "G0809") {
                $event->sheet->getStyle($cell)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('698b80');
              }
            }
          }

            $event->sheet->setCellValue('A30', 'G0809')->getStyle('A30')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('698b80');

            $event->sheet->setCellValue('B30', 'G1003')->getStyle('B30')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('85c1cc');

            $event->sheet->setCellValue('C30', 'G0609')->getStyle('C30')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('a1bfdc');

            $event->sheet->setCellValue('D30', 'G0410')->getStyle('D30')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('b3a78f');

            $event->sheet->setCellValue('A31', 'GD640')->getStyle('A31')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('eeea88');

            $event->sheet->setCellValue('B31', 'G4010')->getStyle('B31')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('7a93b0');

            $event->sheet->setCellValue('C31', 'G0807')->getStyle('C31')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('8cabe1');

            $event->sheet->setCellValue('D31', 'G410')->getStyle('D31')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('ff555d');

            $cellRange = 'A1:D1';
            $event->sheet->setCellValue('A1', 'Shift A');
            $event->sheet->getStyle($cellRange)->applyFromArray($styleArray);
            $event->sheet->getStyle('A30:D30')->applyFromArray($footerStyle);
            $event->sheet->getStyle('A31:D31')->applyFromArray($footerStyle);

        },
    ];
}

}
