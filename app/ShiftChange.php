<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShiftChange extends Model
{
    protected $table = 'shiftchanges';

    protected $fillable = [
      'clockNumber', 'currentshift', 'prevshift', 'created_at'
  ];

    public function updateChange($data)
    {
        $shiftchange = $this->find($data['clockNumber']);
        $shiftchange->currentshift = $data['currentshift'];
        $shiftchange->prevshift = $data['prevshift'];
        $shiftchange->created_at = $data['created_at'];
        $shiftchange->save();
        return 1;
    }
}
