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
        $shiftchange = $this->find($data['clockNumber']);
        $shiftchange->currentshift = $data['currentshift'];
        $shiftchange->prevshift = $data['prevshift'];
        $shiftchange->save();
        return 1;
    }
}
