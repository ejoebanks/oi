<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use Notifiable;

    public function user() {
      return $this->belongsTo(User::class, 'id', 'clockNumber');
    }

    public function shiftInfo() {
      return $this->hasOne(Shift::class, 'clockNumber', 'clockNumber')
      ->withDefault([
        'shift' => NULL
    ]);;
    }


    protected $primaryKey = 'clockNumber';

    protected $fillable = [
      'clockNumber', 'seniority', 'firstName', 'lastName'
    ];

    public function updateMember($data)
    {
        $staff = $this->find($data['clockNumber']);
        $staff->firstName = $data['firstName'];
        $staff->lastName = $data['lastName'];
        $staff->seniority = $data['seniority'];
        $staff->save();
        return 1;
    }

}
