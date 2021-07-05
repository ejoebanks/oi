<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shift;
use App\Admin;
use App\Staff;
use App\Event;
use App\User;
use App\ShiftChange;
use Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function adminPage() {

          $shiftcount = Shift::count();
          $staffcount = Staff::count();
          $eventcount = Event::count();
          $changecount = ShiftChange::count();
          $usercount = User::count();

    return view('admin.admin', compact('shiftcount', 'staffcount', 'eventcount', 'changecount', 'usercount'));

    }

}
