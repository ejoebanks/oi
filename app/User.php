<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Staff;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    function info() {
        return $this->hasOne(Staff::class, 'clockNumber', 'id');
    }

    protected $fillable = [
        'id', 'firstName', 'lastName', 'email', 'clockNumber', 'password', 'type', 'emergencycontact'
    ];

    public function updateUser($data)
    {
        $user = $this->find($data['id']);
        $staff = Staff::find($data['id']);
        $user->id = $data['id'];
        //$user->firstName = $data['firstName'];
        //$user->lastName = $data['lastName'];
        $staff->emergencycontact = $data['emergencycontact'];
        $user->email = $data['email'];
        $user->type = $data['type'];
        $user->password = bcrypt($data['password']);
        $user->save();
        $staff->save();
        return 1;
    }

    public function singleUpdate($data)
    {
        $user = $this->find($data['id']);
        $staff = Staff::find($data['clockNumber']);
        //$staff->firstName = $data['firstName'];
        //$staff->lastName = $data['lastName'];
        $staff->emergencycontact = $data['emergencycontact'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();
        $staff->save();
        return 1;
    }
}
