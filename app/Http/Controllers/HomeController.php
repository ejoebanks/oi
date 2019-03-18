<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Staff;
use App\Event;
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
          $normalUser = Schedule::where('id', Auth::user()->clockNumber)
                        ->first();

          //Counts
          $shiftCount = Schedule::count();
          $staffCount = Staff::count();
          $eventCount = \DB::table('events')
                          ->whereBetween('date', [Carbon::today()->toDateString(), Carbon::today()->addDays(7)->toDateString()])
                          ->count();

          $shiftchangecount = \DB::table('shiftchanges')
                                ->whereBetween('created_at', [Carbon::today()->subDays(30)->toDateString(), Carbon::today()->toDateString()])
                                ->count();

          $unassigned = \DB::table('staff')
                        ->leftjoin('schedule', 'staff.clockNumber', '=', 'schedule.clockNumber')
                        ->where('schedule.clockNumber', '=', null)
                        ->count();

      $shift = \DB::table('schedule')
              ->join('staff', 'staff.clockNumber', '=', 'schedule.clockNumber')
              ->select('schedule.shift', 'staff.firstName', 'staff.lastName')
              ->where('staff.clockNumber', '=', Auth::user()->id)
              ->first();

    return view('home', compact('unassigned', 'normalUser', 'firstName', 'lastName', 'shiftCount', 'staffCount', 'eventCount', 'shiftchangecount', 'shift'));

    }

}
