<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'firstname', 'lastname', 'email', 'clockNumber', 'password', 'type'
    ];

    public function updateUser($data)
    {
        $user = $this->find($data['id']);
        $user->id = $data['id'];
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->emergencyContact = $data['emergencyContact'];
        $user->email = $data['email'];
        $user->type = $data['type'];
        $user->password = bcrypt($data['password']);
        $user->save();
        return 1;
    }

    public function singleUpdate($data)
    {
        $user = $this->find($data['id']);
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->emergencyContact = $data['emergencyContact'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();
        return 1;
    }
}
