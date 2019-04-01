<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $table = 'shifts';

    protected $fillable = [
      'clockNumber', 'comments', 'shift', 'primaryJob'
  ];

    public function updateShift($data)
    {
        $shift = $this->find($data['id']);
        $shift->shift = $data['shift'];
        $shift->clockNumber = $data['clockNumber'];
        $shift->primaryJob = $data['primaryJob'];
        $shift->comments = $data['comments'];
        $shift->save();
        return 1;
    }
}
