@extends('layouts.app')

@section('content')
<br/>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4">
        </div>

      <div class="col-sm-4">
          <a href="/staff" button type="button" class="btn btn-secondary btn-lg btn-block">Staff</a>
          <a href="/schedule" button type="button" class="btn btn-secondary btn-lg btn-block">Schedule</a>
          <a href="/users" button type="button" class="btn btn-secondary btn-lg btn-block">Users</a>
          <a href="/events" button type="button" class="btn btn-secondary btn-lg btn-block">Events</a>
          <a href="/shiftchanges" button type="button" class="btn btn-secondary btn-lg btn-block">Shift Changes</a>
      </div>

      <div class="col-sm-4">
      </div>

</div>

@endsection
