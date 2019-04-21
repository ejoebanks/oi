@extends('layouts.app')

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
  <div class="col">
  </div>
  <div class="col-md-8">
    <div id="crud_box">
    <h2 id="crud_header">Update Details</h2>
    <hr class="crud_hr"/>
      <form class="form-horizontal" role="form" method="POST" action="{{ action('UserController@singleUpdate',$user->id) }}">
           {!! csrf_field() !!}

           <input type="hidden" name="_method" value="POST">
           @if($user->info != null)
           <div class="row">
             <div class="col-md-6">
               <input type="hidden" value="{{csrf_token()}}" name="_token" />
               <h5 for="clockNumber">First Name:</h5>
               <input type="text" class="form-control" name="firstName" value="{{ $user->info->firstName }}" required/>
             </div>
             <div class="col-md-6">
               <input type="hidden" value="{{csrf_token()}}" name="_token" />
               <h5>Last Name:</h5>
               <input type="text" class="form-control" name="lastName" value="{{ $user->info->lastName }}" required/>
             </div>
             <br/>
           </div>
           <br/>
           @endif

           <div class="row">
             @if ($user->info == null)
             <div class="col-md-12">
             @else
             <div class="col-md-6">
             @endif
               <input type="hidden" value="{{csrf_token()}}" name="_token" />
               <h5 for="clockNumber">Email:</h5>
               <input type="text" class="form-control" name="email" value="{{ $user->email }}" required/>
             </div>
             @if($user->info != null)
             <div class="col-md-6">
               <input type="hidden" value="{{csrf_token()}}" name="_token" />
               <h5>Emergency Contact:</h5>
               <input type="text" class="form-control" name="emergencycontact" value="{{ $user->info->emergencycontact }}" required/>
             </div>
             @endif
             <br/>
           </div>
           <br/>

          <div class="form-group">
              <input type="hidden" value="{{csrf_token()}}" name="_token" />
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="password" value="{{ $user->password }}" required />
          </div>

          <div class="form-group">
              <label for="password-confirm">{{ __('Confirm Password') }}</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required >
          </div>


        <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
      </div>
      <div class="col">
      </div>
    </div>
   </div>

@endsection
