@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Recent Changes</h2>

  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
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
      @foreach($recentChanges as $change)
        <tr>
          <td><h5>{{ $change->id }}</h5></td>
          <td><h5>{{ $change->firstName }} {{$change->lastName}}</h5></th>
          <td><h5>{{ $change->shift }}</h5></td>
          <td><h5>X</h5></td>
          <td><h5>{{ date('m-d-Y', strtotime($change->updated_at)) }}</h5></td>
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
