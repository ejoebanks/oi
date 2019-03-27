<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use DB;
use Carbon;
use App\ShiftChange;
use App\Order;
use App\Event;
use App\User;
use App\Notifications\ChangeNotification;
use App\Notifications\EventReminder;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
      //
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $shiftchanges = ShiftChange::
                            whereBetween(
                                'created_at',
                                [Carbon::now()->startOfWeek(),
                            Carbon::now()->endOfWeek()]
                            )
                            ->where('notified', '!=', 1)
                            ->get();

            foreach ($shiftchanges as $change) {
                $sendTo = \App\User::find($change->clockNumber);
                $sendTo->notify(new ChangeNotification());

                // Update so e-mail doesn't get sent repeatedly
                $thisChange = ShiftChange::find($change->id);
                //$thisChange->notified = 1;
                $thisChange->save();
            }

            $events = Event::
                            whereBetween(
                                'date',
                                [Carbon::now()->startOfWeek(),
                            Carbon::now()->endOfWeek()]
                            )
                            ->get();
            $users = User::all();

            foreach ($events as $event) {
                foreach ($users as $user) {
                    $user->notify(new EventReminder());
                }
            }
        });
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
