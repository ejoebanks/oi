@extends('layouts.app')

@section('content')
<div class="container">
  <div id="crud_box">
  <h2 id="crud_header">Recent Changes</h2>
  <hr class="crud_hr"/>

  <div class="row">
    <div class="col">
      <table class="table table-striped" id="recentTab">
        <thead>
    <tr>
      <th scope="col">Clock #</th>
      <th scope="col">Name</th>
      <th scope="col">Current Shift</th>
      <th scope="col">Moved From</th>
      <th scope="col">Updated At</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0; ?>
      @foreach($recentChanges as $change)
        <tr>
          <td><h5>{{ $change->id }}</h5></td>
          <td><h5>{{ $change->firstName }} {{ $change->lastName }}</h5></th>
          <td><h5>{{ $change->currentshift }}</h5></td>
          <td><h5>{{ $change->prevshift }}</h5></td>
          <td><h5>{{ date('m-d-Y', strtotime($change->created)) }}</h5></td>
        </tr>
      @endforeach
    </tbody>
  </table>
    </div>
  </div>
  </div>
</div>
@endsection
