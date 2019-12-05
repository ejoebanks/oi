@extends('layouts.app')

@section('content')

<div class="container">
  <div id="crud_box">
  <h2 id="crud_header">Unassigned Employees</h2>
  <hr class="crud_hr"/>

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
          <td>
            <h5>
            <div class="form-group">
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
              </h5>
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
