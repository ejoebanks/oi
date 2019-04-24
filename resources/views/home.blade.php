@extends('layouts.app')
@section('content')
@if(Auth::user()->type == 1)
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-4">
      <div class="box-part text-center">
        <i class="far fa-clock fa-3x" id="cardIcon" aria-hidden="true">
        </i>
        <div class="title">
          <h4>Shifts</h4>
        </div>
        <a id="cardLink" href="/lists">View
        </a>
        <i class="fas fa-ellipsis-v">
        </i>
        <a id="cardLink" href="/shifts/create">Assign
        </a>

        <div class="text">
          @if ($unassigned == 0)
          <h5>There are currently
            <span id="counts">{{ $shiftCount }}
            </span> active shifts.
          </h5>
          @else
          <h5>There are currently
            <span id="counts">{{ $shiftCount }}
            </span> active shifts, and
            <span id="counts">{{ $unassigned }}
            </span> employee(s)
            have not been assigned a shift.
          </h5>

          @endif
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="box-part text-center">
        <i class="fas fa-users fa-3x" id="cardIcon" aria-hidden="true">
        </i>
        <div class="title">
          <h4>Employees
          </h4>
        </div>
        <div>
        <a id="cardLink" href="/staff">View
        </a>
        <i class="fas fa-ellipsis-v">
        </i>
        <a id="cardLink" href="/staff/create">Add
        </a>
      </div>
        <div class="text">
          <h5>There are currently
            <span id="counts">{{ $staffCount }}
            </span> staff members.
          </h5>
        </div>
        <br/>
      </div>
    </div>
    <div class="col-md-2">
    </div>
  </div>
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-4">
      <div class="box-part text-center">
        <i class="fas fa-calendar-day fa-3x" id="cardIcon" aria-hidden="true">
        </i>
        <div class="title">
          <h4>Events
          </h4>
        </div>
        <a id="cardLink" href="/calendar">View
        </a>
        <i class="fas fa-ellipsis-v">
        </i>
        <a id="cardLink" href="/events/create">Add
        </a>

        <div class="text">
          @if($eventCount > 0)
          <h5>There are currently
            <span id="counts">{{ $eventCount }}
            </span> events in the next 7 days.
          </h5>
          @else
          <h5>There are no upcoming events.</h5>
          @endif
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="box-part text-center">
        <i class="fas fa-exchange-alt fa-3x" id="cardIcon" aria-hidden="true">
        </i>
        <div class="title">
          <h4>Recent Changes
          </h4>
        </div>
        <a id="cardLink" href="/changes">View
        </a>
        <div class="text">
          <h5>There has been
            <span id="counts">{{ $shiftchangecount }}
            </span> shift changes in the past month.
          </h5>
        </div>
      </div>
    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>
@endif
@if(Auth::user()->type == 0 && is_object(Auth::user()->info))
<div class="container">
<div class="row">
  <div class="col-xs-4 col-md-3">
    <h1 id="greet">Hello, <br/>{{ $user->firstName }}.</h1>
  </div>
  <div class="col-md-9">
    <h1 id="shift_header">You are currently on the <span id="currentshift">{{$user->shift}}</span> shift.</h1>
  </div>
</div>
<br/>
<div class="row">
  <div class="col-xs-4 col-md-3">
    <ul class="list-group">
          <li class="list-group-item ulhead">
            <span class="float-left ulhead">
            <i class="far fa-user-circle"></i>
            Profile
          </span>
            <span class="float-right"><a href="/update/user/{{Auth::user()->id}}" button type="button" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i></a></span>
          </li>

          <li class="list-group-item text-right">
            <span class="float-left">
              <strong>Clock #
              </strong>
            </span><span class="float-right">{{ $user->id }}</span>
          </li>

          <li class="list-group-item text-right">
            <span class="float-left">
              <strong>Full Name
              </strong>
            </span><span class="float-right">{{ $user->firstName }} {{ "Smith" }}</span>
          </li>
          <li class="list-group-item text-right">
            <span class="float-left">
              <strong>Seniority
              </strong>
            </span> <span class="float-right">{{ $user->seniority }}</span>
          </li>
          <li class="list-group-item text-right">
            <span class="float-left">
              <strong>Primary Job
              </strong>
            </span> <span class="float-right">{{$user->primaryJob}}</span>
          </li>

          <li class="list-group-item text-right">
            <span class="float-left">
              <strong>E-Mail
              </strong>
            </span> <span class="float-right">{{ Auth::user()->email }}</span>
          </li>

          <li class="list-group-item text-right">
            <span class="float-left">
              <strong>Contact
              </strong>
            </span> <span class="float-right">{{ $user->emergencycontact }}</span>
          </li>
        </ul>

  </div>
  <div class="col-md-9">
    <img src="{{ asset('images/Calendar_View.png') }}" id="table_image" alt="Owens-Header">
  </div>
</div>
</div>@endif
@if (!is_object(Auth::user()->info) && Auth::user()->type == 0)
<div class="container">
    <div id="home-nostaff" class="row">
        <h1 id="newemployee">You have not yet been assigned a shift, please check back later.
    </div>
</div>
@endif
@endsection
