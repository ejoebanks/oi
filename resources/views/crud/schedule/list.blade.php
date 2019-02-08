@extends('layouts.app')

@section('content')
<?php
if (Auth::user() != null && Auth::user()->type == 1) {
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
        <input class="form-control" id="system-search" name="q" placeholder="Search" required>
        <br/>
      </div>
    </div>
  </div>

<div class="container">
  <div class="row">
    <br/>
    <?php
    foreach (range('A', 'D') as $char) {
        $shiftcount = \DB::table('schedule')->where('shift', '=', $char)->count();
        ?>
    <div class="col-sm">
    <div id="sCount">{{ $shiftcount }}</div>
    <br/>

      <h1 id="shift"> Shift {{ $char }} </h1>
      <table class="table table-list-search table table-striped">
          <thead>
              <tr>
                <td>ID</td>
                <td>Name</td>
              </tr>
          </thead>
          <tbody>
              @foreach($schedule as $s)
              @if($char == $s->shift)
              <tr>
                <td><div class="btn-group">
                  <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{$s->id}}
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="">Shift</a>
                    <div class="dropdown-divider"></div>
                    @include('functions.shiftdropdown')
                  </div>
                </div>
                </td>
              </td>
                  <td>{{$s->firstName}} {{ $s->lastName }}</td>
              </tr>
              @endif
              @endforeach
          </tbody>
      </table>

    </div>
  <?php
    } ?>
  </div>
<div>
  <?php
} else {
        ?>
    @include('functions.denied')
  <?php
    } ?>

@endsection
