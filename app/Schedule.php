<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $dbname = 'work';
    protected $table = 'schedule';

    protected $fillable = [
      'firstName', 'lastName',
  ];

    public function updateService($data)
    {
        $schedule = $this->find($data['id']);
        $schedule->firstName = $data['firstName'];
        $schedule->lastName = $data['lastName'];
        $schedule->save();
        return 1;
    }
}
