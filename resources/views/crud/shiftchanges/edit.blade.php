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
    <h2 id="crud_header">Edit Shift Change</h2>
    <hr class="crud_hr"/>

      <form class="form-horizontal" role="form" method="POST" action="{{ action('ShiftChangeController@update',$shiftchange->id) }}">
           {!! csrf_field() !!}

           <input type="hidden" name="_method" value="PATCH">

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <h5>Employee:</h5>
            <select class="form-control" value='' name="clockNumber" >
            @foreach($staff as $member)
              @if($member->clockNumber == $shiftchange->clockNumber)
                @php ($active = "selected")
              @else
                @php ($active = "")
              @endif
              <option {{$active}} value="{{ $member->clockNumber }}">{{ $member->firstName.' '.$member->lastName }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="currentshift">Current Shift:</label>
            <select class="form-control" name="currentshift" value="{{ $shiftchange->currentshift }}">
            @foreach(range('A', 'D') as $char)
              @if($char == $shiftchange->currentshift)
                @php ($active = "selected")
              @else
                @php ($active = "")
              @endif
              <option {{$active}} value="{{$char}}">{{$char}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="prevshift">Previous Shift:</label>
            <select class="form-control" name="prevshift" value="{{ $shiftchange->prevshift }}">
            @foreach(range('A', 'D') as $char)
              @if($char == $shiftchange->prevshift)
                @php ($active = "selected")
              @else
                @php ($active = "")
              @endif
              <option {{$active}} value="{{$char}}">{{$char}}</option>
            @endforeach
            </select>
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
