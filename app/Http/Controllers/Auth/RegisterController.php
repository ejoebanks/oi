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

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'clockNumber' => "nullable|integer|unique:users",
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'clockNumber' => $data['clockNumber'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            //'type' => User::DEFAULT_TYPE,
        ]);

        $staff = Staff::find($data['clockNumber']);
        if($staff != null) {
          $staff->emergencycontact = $data['emergencycontact'];
          $staff->save();
        }

        $sendTo = \App\User::find($user["id"]);
        $sendTo->notify(new NewUser());
        $user->sendEmailVerificationNotification();

        return $user;
    }
}
