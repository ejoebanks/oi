@extends('layouts.app')

@section('content')

@if(Auth::user()->type == 1)
<br/>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
      <div class="cliente">
        <a href="/schedule" button type="button" class="btn btn-secondary btn-lg btn-block">View Shifts</button></a>
        <button type="button" class="btn btn-secondary btn-lg btn-block">Update Shift</button>
        <button type="button" class="btn btn-secondary btn-lg btn-block">Add Employee</button>
        </div>
    </div>

    <div class="col-sm-4">
  </div>
</div>
</div>
@endif

@if(Auth::user()->type == 0)
@include('landing')
@endif
@endsection
