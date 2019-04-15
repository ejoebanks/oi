@extends('layouts.app')

@section('content')
<br/>
<div class="container-fluid">
   <div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-3">
         <a href="/staff" id="admin_cards">
            <div class="card-counter staff-admin">
               <i class="fas fa-users-cog"></i>
               <span class="count-numbers">{{ $staffcount }}</span>
               <span class="count-name">Staff</span>
            </div>
         </a>
      </div>
      <div class="col-md-3">
         <a href="/users" id="admin_cards">
            <div class="card-counter user-admin">
               <i class="fas fa-users"></i>
               <span class="count-numbers">{{ $usercount }}</span>
               <span class="count-name">Users</span>
            </div>
         </a>
      </div>
      <div class="col-md-3">
      </div>
   </div>
   <div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-3">
         <a href="/shiftchanges" id="admin_cards">
            <div class="card-counter change-admin">
               <i class="fas fa-exchange-alt"></i>
               <span class="count-numbers">{{ $changecount}}</span>
               <span class="count-name">Shift Changes</span>
            </div>
         </a>
      </div>
      <div class="col-md-3">
         <a href="/shifts" id="admin_cards">
            <div class="card-counter shift-admin">
               <i class="fas fa-clock"></i>
               <span class="count-numbers">{{ $shiftcount }}</span>
               <span class="count-name">Shifts</span>
            </div>
         </a>
      </div>
      <div class="col-md-3">
      </div>
   </div>
   <div class="row justify-content-center">
      <div class="col-md-3">
         <a href="/events" id="admin_cards">
            <div class="card-counter event-admin">
               <i class="fas fa-calendar-week"></i>
               <span class="count-numbers">{{ $eventcount }}</span>
               <span class="count-name">Events</span>
            </div>
         </a>
      </div>
   </div>
</div>
@endsection
