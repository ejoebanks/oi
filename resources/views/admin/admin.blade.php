@extends('layouts.app')

@section('content')
<div class="container-fluid">
  @if( Session::has('message') )
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{ Session::get('message') }}
      </div>
    </div>
  </div>
  @endif

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
   </div>
   <div class="row">
      <div class="col-md-3 offset-md-3">
         <a href="/events" id="admin_cards">
            <div class="card-counter event-admin">
               <i class="fas fa-calendar-week"></i>
               <span class="count-numbers">{{ $eventcount }}</span>
               <span class="count-name">Events</span>
            </div>
         </a>
      </div>
      <div class="col-md-3">
            <div class="card-counter import-admin">
               <i class="fas fa-upload" id="import-icon"></i>
               <span class="card-import">
                 <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="custom-file">
                         <label for="file" class="custom-file-upload">
                           <i class="fas fa-cloud-upload"></i> Upload File
                         </label>
                         <input id="file" name='file' type="file" style="display:none;">
                     </div>
                     <br>
                     <button class="btn btn-primary">Import</button>
                </form>
              </span>
            </div>
      </div>

   </div>
</div>
@endsection
