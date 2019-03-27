<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dbname = 'work';
    protected $table = 'events';

    protected $fillable = [
      'title', 'employee', 'date', 'description'
  ];

    public function updateEvent($data)
    {
        $event = $this->find($data['id']);
        $event->title = $data['title'];
        $event->employee = $data['employee'];
        $event->description = $data['description'];
        $event->date = $data['date'];
        $event->save();
        return 1;
    }
}
