<?php

namespace App\Imports;

use App\Staff;
use App\Shift;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StaffImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $member = Staff::where('clockNumber', $row[0])->first();
        $shift = Shift::where('clockNumber', $row[0])->first();

        if (!Staff::find($row[0])) {
            return new Staff([
               'clockNumber'     => $row[0],
               'seniority'    => $row[1],
               'firstName'    => $row[2],
               'lastName'    => $row[3]
                ]);
        } else {
            $member->update([
              'seniority' => $row[1],
              'firstName' => $row[2],
              'lastName' => $row[3]
                ]);
        }
        if (!$shift) {
            return new Shift([
               'clockNumber'   => $row[0],
               'shift'         => $row[4],
               'primaryJob'    => $row[5],
               'comments'      => $row[6]
                ]);
        } else {
            $shift->update([
               'shift'         => $row[4],
               'primaryJob'    => $row[5],
               'comments'      => $row[6]
                ]);
        }

    }
}
