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
        <div class="text">
          <h5>There are currently
            <span id="counts">{{ $shiftCount }}
            </span> active shifts, and
            <span id="counts">{{ $unassigned }}
            </span> employees
            have not been assigned a shift.
          </h5>
        </div>
        <a id="cardLink" href="/lists">View
        </a>
        <i class="fas fa-ellipsis-v">
        </i>
        <a id="cardLink" href="/unassigned">Assign
        </a>
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
        <div class="text">
          <h5>There are currently
            <span id="counts">{{ $staffCount }}
            </span> staff members.
          </h5>
        </div>
        <br/>
        <a id="cardLink" href="/staff">View
        </a>
        <i class="fas fa-ellipsis-v">
        </i>
        <a id="cardLink" href="/staff/create">Add
        </a>
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
        <br/>
        <a id="cardLink" href="/calendar">View
        </a>
        <i class="fas fa-ellipsis-v">
        </i>
        <a id="cardLink" href="/events/create">Add
        </a>
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
        <div class="text">
          <h5>There has been
            <span id="counts">{{ $shiftchangecount }}
            </span> shift changes in the past month.
          </h5>
        </div>
        <br/>
        <a id="cardLink" href="/changes">View
        </a>
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
        <div class="col-sm-4">
          <h1 id="greet">Hello, <br/>{{ $user->firstName }}</h1>
        </div>
        <div class="col-sm-5">
          <h1 >Your current shift is: <span id="currentshift">{{$user->shift}}</span></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
          <ul class="list-group">
                <li class="list-group-item ulhead">
                  <i class="far fa-user-circle"></i>
                  Profile
                </li>
                <li class="list-group-item text-right">
                  <span class="float-left">
                    <strong>Full Name
                    </strong>
                  </span>{{ $user->firstName }} {{ $user->lastName}}
                </li>
                <li class="list-group-item text-right">
                  <span class="float-left">
                    <strong>Seniority
                    </strong>
                  </span> {{ $user->seniority }}
                </li>
                <li class="list-group-item text-right">
                  <span class="float-left">
                    <strong>Last seen
                    </strong>
                  </span> Yesterday
                </li>
              </ul>
              <br/>
              <ul class="list-group">
                <li class="list-group-item ulhead">
                  <i class="fas fa-chart-line"></i>
                   Activity
                </li>
                <li class="list-group-item text-right">
                  <span class="pull-left">
                    <strong>Shares
                    </strong>
                  </span> 125
                </li>
                <li class="list-group-item text-right">
                  <span class="pull-left">
                    <strong>Likes
                    </strong>
                  </span> 13
                </li>
                <li class="list-group-item text-right">
                  <span class="pull-left">
                    <strong>Posts
                    </strong>
                  </span> 37
                </li>
                <li class="list-group-item text-right">
                  <span class="pull-left">
                    <strong>Followers
                    </strong>
                  </span> 78
                </li>
              </ul>
</div>
        <div class="col-sm-8">            <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#
                          </th>
                          <th>Label 1
                          </th>
                          <th>Label 2
                          </th>
                          <th>Label 3
                          </th>
                          <th>Label
                          </th>
                          <th>Label
                          </th>
                        </tr>
                      </thead>
                      <tbody id="items">
                        <tr>
                          <td>1
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                        </tr>
                        <tr>
                          <td>2
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                        </tr>
                        <tr>
                          <td>3
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                        </tr>
                        <tr>
                          <td>4
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                        </tr>
                        <tr>
                          <td>5
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                        </tr>
                        <tr>
                          <td>6
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                        </tr>
                        <tr>
                          <td>7
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                        </tr>
                        <tr>
                          <td>8
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                        </tr>
                        <tr>
                          <td>9
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                          <td>Table cell
                          </td>
                        </tr>
                      </tbody>
                    </table>
</div>
    </div>
</div>
@endif
@if (!is_object(Auth::user()->info) && Auth::user()->type == 0)
<div class="container">
    <div class="row">
        <div class="col-sm-12">
          <br/></br/>
          <br/></br/>
          <br/></br/>

        <h1 id="newemployee">You have not yet been assigned a shift, please check back later.</div>
    </div>
</div>
@endif
@endsection
