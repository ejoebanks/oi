@extends('layouts.app')

@section('content')
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
        $shiftcount = \DB::table('schedule')->where('shift', '=', $char)->count(); ?>
    <div class="col-sm">
    <div id="shift{{ $char }}" value="{{$shiftcount}}">{{ $shiftcount }}</div>

    <br/>
      <h1 id="shift"> Shift {{ $char }}</h1>
      <table class="table table-list-search table table-striped">
          <thead>
              <tr>
                <td>Action</td>
                <td>Employee</td>
              </tr>
          </thead>
          <tbody>
              @foreach($schedule as $s)
              @if($char == $s->shift)
              <tr>
                <td>
                  <div class="btn-group-vertical">
                  <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                  </button>

                  <button data-toggle="collapse" data-target="#{{$s->id}}"class="btn btn-sm btn-outline-secondary">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                  </button>

                  <div class="dropdown-menu">
                    <p class="dropdown-item">Shift</p>
                    <div class="dropdown-divider"></div>
                    @include('functions.shiftdropdown')
                  </div>
                </div>
                </td>
                  <td>
                    <h4><span class="badge badge-secondary">{{$s->id}}</span></h4>
                    <h6>{{ $s->firstName }} {{ $s->lastName}}</h6>
                  </td>
                </tr>
                <tr></tr>
                <tr class="no-bottom-border">
                  <td colspan="2">
                  <div id="{{$s->id}}" class="collapse">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <span id="collapseTitle" class="float-md-left">Seniority:</span>
                        </div>
                        <div class="col-md-6 text-center">
                            <span class="float-md-right">{{ $s->seniority }}</span>
                        </div>

                        <div class="col-md-6 text-center">
                            <span id="collapseTitle" class="float-md-left">Primary Job:</span>
                        </div>
                        <div class="col-md-6 text-center">
                            <span class="float-md-right">{{ $s->primaryJob }}</span>
                        </div>

                        <div class="col-md-6 text-center">
                            <span id="collapseTitle" class="float-md-left">Comments:</span>
                        </div>
                        <div class="col-md-6 text-center">
                          <?php
                          if ($s->comments == null){
                            $var = "None";
                          } else {
                            $var = $s->comments;
                          }?>
                            <span class="float-md-right">{{ $var }}</span>
                        </div>
                    </div>
                  </div>
                </td>
                </tr>
              @endif
              @endforeach
          </tbody>
      </table>
    </div>
  <?php
    } ?>
  </div>
</div>
@endsection
