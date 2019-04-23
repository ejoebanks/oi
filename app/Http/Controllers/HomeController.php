<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shift;
use App\Staff;
use App\Event;
use App\User;
use App\ShiftChange;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function homepage() {
          $normalUser = Shift::where('id', Auth::user()->clockNumber)
                        ->first();

          //Counts
          $shiftCount = Shift::count();
          $staffCount = Staff::count();
          $eventCount = \DB::table('events')
                          ->whereBetween('date', [Carbon::today()->toDateString(), Carbon::today()->addDays(7)->toDateString()])
                          ->count();

          $shiftchangecount = \DB::table('shiftchanges')
                                ->whereBetween('created_at', [Carbon::today()->subDays(30)->toDateString(), Carbon::now()])
                                ->count();

          $unassigned = \DB::table('staff')
                        ->leftjoin('shifts', 'staff.clockNumber', '=', 'shifts.clockNumber')
                        ->where('shifts.clockNumber', '=', null)
                        ->count();

          $user = Staff::where('staff.clockNumber', Auth::user()->clockNumber)
                  ->join('shifts', 'shifts.clockNumber', '=', 'staff.clockNumber')
                  ->first();

    return view('home', compact('unassigned', 'normalUser', 'firstName', 'lastName', 'shiftCount', 'staffCount', 'eventCount', 'shiftchangecount', 'user'));

    }

}
