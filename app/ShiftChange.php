<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShiftChange extends Model
{
    protected $table = 'shiftchanges';

    protected $fillable = [
      'clockNumber', 'currentshift', 'prevshift'
  ];

    public function updateChange($data)
    {
        $shiftchange = $this->find($data['id']);
        $shiftchange->prevshift = $data['prevshift'];
        $shiftchange->currentshift = $data['currentshift'];
        $shiftchange->clockNumber = $data['clockNumber'];
        $shiftchange->save();
        return 1;
    }
}
