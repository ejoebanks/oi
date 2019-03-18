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
            </span> Employees
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
          <?php if ($eventCount > 0) {
?>
          <h5>There are currently
            <span id="counts">{{ $eventCount }}
            </span> events in the next 7 days.
          </h5>
          <?php
} else {
?>
          <h5>There are no upcoming events.
          </h5>
          <?php
} ?>
        </div>
        <br/>
        <a id="cardLink" href="/events">View
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
@if(Auth::user()->type == 0)
<hr>
<div class="container bootstrap snippet">
  <div class="row">
    <div class="col-sm-10">
      <h1 id="greet">Hello, {{ Auth::user()->firstname }}
      </h1>
    </div>
    <div class="col-sm-2">
      <a href="/users" class="pull-right">
        <img title="profile image" class="img-circle img-responsive" src="https://bootdey.com/img/Content/avatar/avatar1.png">
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3">
      <!--left col-->
      <ul class="list-group">
        <li class="list-group-item text-muted">Profile
        </li>
        <li class="list-group-item text-right">
          <span class="pull-left">
            <strong>Full Name
            </strong>
          </span>{{ Auth::user()->firstname }} {{ Auth::user()->lastname}}
        </li>
        <li class="list-group-item text-right">
          <span class="pull-left">
            <strong>Seniority
            </strong>
          </span> 2.13.2014
        </li>
        <li class="list-group-item text-right">
          <span class="pull-left">
            <strong>Last seen
            </strong>
          </span> Yesterday
        </li>
      </ul>
      <br/>
      <ul class="list-group">
        <li class="list-group-item text-muted">Activity
          <i class="fa fa-dashboard fa-1x">
          </i>
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
    <!--/col-3-->
    <div class="col-sm-9">
      <ul class="nav nav-tabs" id="myTab">
        <li class="active">
          <a href="#home" data-toggle="tab">Home
          </a>
        </li>
        <li>
          <a href="#messages" data-toggle="tab">Messages
          </a>
        </li>
        <li>
          <a href="#settings" data-toggle="tab">Settings
          </a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="home">
          <div class="table-responsive">
            <table class="table table-hover">
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
            <hr>
            <div class="row">
              <div class="col-md-4 col-md-offset-4 text-center">
                <ul class="pagination" id="myPager">
                </ul>
              </div>
            </div>
          </div>
          <!--/table-resp-->
          <hr>
        </div>
        <!--/tab-pane-->
        <div class="tab-pane" id="messages">
          <h2>
          </h2>
          <ul class="list-group">
            <li class="list-group-item text-muted">Inbox
            </li>
            <li class="list-group-item text-right">
              <a href="#" class="pull-left">Here is your a link to the latest summary report from the..
              </a> 2.13.2014
            </li>
            <li class="list-group-item text-right">
              <a href="#" class="pull-left">Hi Joe, There has been a request on your account since that was..
              </a> 2.11.2014
            </li>
            <li class="list-group-item text-right">
              <a href="#" class="pull-left">Nullam sapien massaortor. A lobortis vitae, condimentum justo...
              </a> 2.11.2014
            </li>
            <li class="list-group-item text-right">
              <a href="#" class="pull-left">Thllam sapien massaortor. A lobortis vitae, condimentum justo...
              </a> 2.11.2014
            </li>
            <li class="list-group-item text-right">
              <a href="#" class="pull-left">Wesm sapien massaortor. A lobortis vitae, condimentum justo...
              </a> 2.11.2014
            </li>
            <li class="list-group-item text-right">
              <a href="#" class="pull-left">For therepien massaortor. A lobortis vitae, condimentum justo...
              </a> 2.11.2014
            </li>
            <li class="list-group-item text-right">
              <a href="#" class="pull-left">Also we, havesapien massaortor. A lobortis vitae, condimentum justo...
              </a> 2.11.2014
            </li>
            <li class="list-group-item text-right">
              <a href="#" class="pull-left">Swedish chef is assaortor. A lobortis vitae, condimentum justo...
              </a> 2.11.2014
            </li>
          </ul>
        </div>
        <!--/tab-pane-->
        <div class="tab-pane" id="settings">
          <hr>
          <form class="form" action="##" method="post" id="registrationForm">
            <div class="form-group">
              <div class="col-xs-6">
                <label for="first_name">
                  <h4>First name
                  </h4>
                </label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-6">
                <label for="last_name">
                  <h4>Last name
                  </h4>
                </label>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-6">
                <label for="phone">
                  <h4>Phone
                  </h4>
                </label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-6">
                <label for="mobile">
                  <h4>Mobile
                  </h4>
                </label>
                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-6">
                <label for="email">
                  <h4>Email
                  </h4>
                </label>
                <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-6">
                <label for="email">
                  <h4>Location
                  </h4>
                </label>
                <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-6">
                <label for="password">
                  <h4>Password
                  </h4>
                </label>
                <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-6">
                <label for="password2">
                  <h4>Verify
                  </h4>
                </label>
                <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12">
                <br>
                <button class="btn btn-lg btn-success" type="submit">
                  <i class="glyphicon glyphicon-ok-sign">
                  </i> Save
                </button>
                <button class="btn btn-lg" type="reset">
                  <i class="glyphicon glyphicon-repeat">
                  </i> Reset
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!--/tab-pane-->
    </div>
    <!--/tab-content-->
  </div>
  <!--/col-9-->
</div>
<!--/row-->
@endif
@endsection
