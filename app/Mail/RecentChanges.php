<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Exports\RecentExport;
use \Excel;
use Carbon;

class RecentChanges extends Mailable
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
        return $this->markdown('emails.recent.changes')
            ->attach(
                Excel::download(
                    new RecentExport(),
                    'recent.xlsx'
                )->getFile(), ['as' => 'changes_'.(Carbon::now())->toDateString().'.xlsx']);
    }

}
