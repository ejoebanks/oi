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
    </div><br />
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
           <div class="form-group">
               <input type="hidden" value="{{csrf_token()}}" name="_token" />
               <label for="firstName">First Name:</label>
               <input type="text" class="form-control" name="firstName" value="{{ $user->info->firstName }}" required/>
           </div>

           <div class="form-group">
               <input type="hidden" value="{{csrf_token()}}" name="_token" />
               <label for="lastName">Last Name:</label>
               <input type="text" class="form-control" name="lastName" value="{{ $user->info->lastName }}" required/>
           </div>
           @endif
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" value="{{ $user->email }}" required/>
        </div>

        @if($user->info != null)

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="emergencycontact">Emergency Contact:</label>
            <input type="text" class="form-control" name="emergencycontact" value="{{ $user->emergencycontact }}" required/>
        </div>
        @endif

        <!--
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="address">Address:</label>
            <input type="text" class="form-control" name="address" value="{{ $user->address }}" required/>
          </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="city">City:</label>
            <input type="text" class="form-control" name="city" value="{{ $user->city }}" required/>
          </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="state">State:</label>
            <input type="text" class="form-control" name="state" value="{{ $user->state }}" required/>
          </div>
          -->


          <div class="form-group">
              <input type="hidden" value="{{csrf_token()}}" name="_token" />
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="password" value="{{ $user->password }}" required/>
          </div>

          <div class="form-group">
              <label for="password-confirm">{{ __('Confirm Password') }}</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
