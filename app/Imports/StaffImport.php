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
      return new Staff([
         'clockNumber'     => $row[0],
         'seniority'    => $row[1],
         'firstName'    => $row[2],
         'lastName'    => $row[3]
      ]);
    }
}
