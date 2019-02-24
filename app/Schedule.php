<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';

    protected $fillable = [
      'firstName', 'lastName', 'shift'
  ];

    public function updateSchedule($data)
    {
        $schedule = $this->find($data['id']);
        $schedule->firstName = $data['firstName'];
        $schedule->lastName = $data['lastName'];
        $schedule->shift = $data['shift'];
        $schedule->save();
        return 1;
    }
}
