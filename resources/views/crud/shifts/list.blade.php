@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-3">
        <!--<input class="form-control" id="system-search" name="q" placeholder="Search" required>-->
        <input class="form-control" type="text" id="search" placeholder="Type to search..." />
        <br/>
      </div>
    </div>
  </div>

<div class="container">
  <div class="row">
    <br/>
    @foreach(range('A', 'D') as $char)
      @php ($shiftcount = \DB::table('shifts')->where('shift', $char)->count())
    <div class="col">
      <table id="table" class="table table-list-search table table-striped">
        <thead class="list_tablehead">
          <tr>
            <th colspan="2" class="circle-tile">
              <div class="circle-tile-heading dark-blue">{{ $char }}</div>
                    <div class="circle-tile-content darker-blue">
                      <div class="circle-tile-description text-faded">Staff</div>
                      <div class="circle-tile-number text-faded ">{{$shiftcount}}</div>
                    </div>
            </th>
          </tr>
        </thead>
        <thead class="list_head">
              <tr>
                <td>Action</td>
                <td>Employee</td>
              </tr>
          </thead>
          <tbody id="myTable">
              @foreach($shift as $s)
              @if($char == $s->shift)
              <tr class="custom_border">
                <td>
                  <div class="btn-group-vertical">
                  <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-pencil-alt"></i>
                  </button>

                  <button data-toggle="collapse" data-target="#EMP{{$s->id}}" aria-controls="EMP" aria-expanded="false" class="btn btn-sm btn-outline-secondary">
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
                    <h4><span class="badge badge-secondary">{{$s->clockNumber}}</span></h4>
                    <h6>{{ $s->firstName }} {{ $s->lastName }}</h6>

                    <div class="collapse" id="EMP{{$s->id}}">
                      <div>
                        <span class="float-md-left"><i id="collapse_icon" class="fas fa-calendar-day fa-lg"></i> {{ $s->seniority }}</span>
                      </div>
                      <div>
                        <span class="float-md-left"><i id="collapse_icon" class="far fa-hand-point-right fa-lg"></i> {{ $s->primaryJob }}</span>
                      </div>
                      <div>
                        <?php
                        if ($s->comments == null) {
                            $var = "None";
                        } else {
                            $var = $s->comments;
                        }?>
                          <span class="float-md-left"><i id="collapse_icon" class="far fa-comment fa-lg"></i> {{ $var }}</span>
                      </div>

                    </div>
                  </td>
                </tr>
              @endif
              @endforeach
          </tbody>
      </table>
    </div>
@endforeach
  </div>
</div>
@endsection
