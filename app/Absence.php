<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $fillable = [
      'clock_number', 'date_missed', 'reason'
  ];

    public function updateAbsence($data)
    {
        $absence = $this->find($data['id']);
        $absence->clock_number = $data['clock_number'];
        $absence->date_missed = $data['date_missed'];
        $absence->reason = $data['reason'];
        $absence->save();
        return 1;
    }
}
