<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Staff;
use Auth;
use DB;
Use App\Notifications\NewUser;
Use App\Notifications\AppointmentReminder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id' => "required|integer|unique:users",
            //'firstname' => 'required|string|max:255',
            //'lastname' => 'required|string|max:255',
            //'city' => 'required|string|max:255',
            //'address' => 'required|string|max:255',
            //'state' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'id' => $data['id'],
            //'firstname' => $data['firstname'],
            //'lastname' => $data['lastname'],
            //'city' => $data['city'],
            //'state' => $data['state'],
            //'address' => $data['address'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            //'type' => User::DEFAULT_TYPE,
        ]);

        $staff = Staff::find($data['id']);
        if($staff != null) {
          $staff->emergencycontact = $data['emergencycontact'];
          $staff->save();
        }

        $sendTo = \App\User::find($user["id"]);
        $sendTo->notify(new NewUser());

        return $user;
    }
}
