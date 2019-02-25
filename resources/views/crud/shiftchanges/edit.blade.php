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
    <div class="container">
      <form class="form-horizontal" role="form" method="POST" action="{{ action('StaffController@update',$staff->clockNumber) }}">
           {!! csrf_field() !!}

           <input type="hidden" name="_method" value="PATCH">

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="clockNumber">Clock Number:</label>
            <input type="text" class="form-control" name="clockNumber" value="{{ $staff->clockNumber }}" required/>
        </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="seniority">Seniority:</label>
            <input type="text" class="form-control" name="seniority" value="{{ $staff->seniority }}" required/>
        </div>


        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control" name="firstName" value="{{ $staff->firstName }}" required/>
        </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control" name="lastName" value="{{ $staff->lastName }}" required/>
        </div>


        <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection
