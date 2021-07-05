<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Exports\ShiftInfoFromView;
use App\Exports\ShiftsFromView;
use \Excel;
use Carbon;


class OrgChart extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.org.chart')
            ->attach(
                Excel::download(
                    new ShiftInfoFromView(),
                    'shifts.xlsx'
                )->getFile(), ['as' => 'shifts_'.(Carbon::now())->toDateString().'.xlsx'])
                ->attach(
                  Excel::download(
                      new ShiftsFromView(),
                      'employees.xlsx'
                  )->getFile(), ['as' => 'Employee_List_'.(Carbon::now())->toDateString().'.xlsx']
            );
    }

}
