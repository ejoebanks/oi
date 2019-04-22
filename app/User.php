<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Staff;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    function info() {
        return $this->hasOne(Staff::class, 'clockNumber', 'clockNumber');
    }

    protected $fillable = [
        'id', 'firstName', 'lastName', 'email', 'clockNumber', 'password', 'type', 'emergencycontact'
    ];

    public function updateUser($data)
    {
        $user = $this->find($data['id']);
        $user->id = $data['id'];
        $user->email = $data['email'];
        $user->clockNumber = $data['clockNumber'];
        $user->type = $data['type'];
        if ($data['password'] != NULL){
          $user->password = bcrypt($data['password']);
        }
        $user->save();
        return 1;
    }

    public function singleUpdate($data)
    {
        $user = $this->find($data['id']);
        if (is_object(Staff::find($data['clockNumber']))){
          $staff = Staff::find($data['clockNumber']);
          $staff->emergencycontact = $data['emergencycontact'];
          $staff->save();
        }
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();
        return 1;
    }
}
