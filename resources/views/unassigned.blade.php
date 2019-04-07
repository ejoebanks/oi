@extends('layouts.app')

@section('content')

<?php
use App\Shift;

    $shifts = Shift::join('staff', 'staff.clockNumber', '=', 'shifts.clockNumber')
                ->select('shifts.clockNumber', 'staff.firstName', 'staff.lastName', 'shifts.shift', 'shifts.primaryJob')
                ->orderBy('shift', 'ASC')
                ->orderBy('primaryJob', 'ASC')
                ->get();

    $arr = array();
    $cellVal = array();
    $cellVal[0] = "A";
    $i = 0;
    foreach($shifts as $shift){
      if ($i >= 23){
        $i = 0;
      }
      $i++;
      if ($cellVal[0] !== $shift->shift){
        $cellVal[0] = $shift->shift;
      }
      if (!in_array($shift->primaryJob, $cellVal) && $cellVal[0] == $shift->shift){
        array_push($arr, $shift->primaryJob);
        array_push($cellVal, $shift->shift.$i);
      }
    }
var_dump($cellVal);
exit;
 ?>
<div class="container">
  <h2>Unassigned Employees</h2>

  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
      <table class="table table-striped" id="recentTab">
        <thead>
    <tr>
      <th scope="col">Clock #</th>
      <th scope="col">Name</th>
      <th scope="col">Shift</th>
    </tr>
  </thead>
  <tbody>
      @foreach($unassigned as $emp)
        <tr>
          <td><h5>{{ $emp->clockNumber }}</h5></th>
          <td><h5>{{ $emp->firstName }} {{ $emp->lastName}}</h5></th>
          <td><h5><div class="form-group">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    <select class="form-control" value='' name="shift" id="shift">
                    <?php
                    foreach (range('A', 'D') as $char) {
                    ?>
                      <option value="<?= $char ?>"><?=  $char ?></option>
                      <?php
                      }?>
                  </select>
                </div>
</h5></th>
        </tr>
      @endforeach
    </tbody>
  </table>
    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>
@endsection
