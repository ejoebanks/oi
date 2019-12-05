@extends('layouts.app')
@section('content')
  <div id="alert_text">
    This is for demonstration purposes only.  All database functionality has been
    disabled, so none of the create, edit, or delete functions will do anything to
    the values.
  </div>

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
        @if($unassigned != 0)
        <i class="fas fa-ellipsis-v">
        </i>
        <a id="cardLink" href="/shifts/create">Assign
        </a>
        @endif

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
@endsection
