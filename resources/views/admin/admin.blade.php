@extends('layouts.app')

@section('content')
<br/>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4">
        </div>

      <div class="col-sm-4">
          <a href="/schedule" button type="button" class="btn btn-primary btn-lg btn-block">Schedule</button></a>
          <a href="/users" button type="button" class="btn btn-primary btn-lg btn-block">Staff</button></a>
          <a href="/events" button type="button" class="btn btn-primary btn-lg btn-block">Events</button></a>
      </div>

      <div class="col-sm-4">
      </div>

</div>

@endsection
