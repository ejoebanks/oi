<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dbname = 'work';
    protected $table = 'events';

    protected $fillable = [
      'title', 'employee', 'date'
  ];

    public function updateLocation($data)
    {
        $event = $this->find($data['id']);
        $event->address = $data['title'];
        $event->city = $data['employee'];
        $event->state = $data['date'];
        $event->save();
        return 1;
    }
}
