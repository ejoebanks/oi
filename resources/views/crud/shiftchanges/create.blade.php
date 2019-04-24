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
    <h2 id="crud_header">Create Shift Change</h2>
    <hr class="crud_hr"/>

    <form method="post" action="{{ action('ShiftChangeController@store') }}">

      <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <h5>Employee:</h5>
          <select class="form-control" value='' name="clockNumber" >
          @foreach($staff as $member)
            <option value="{{ $member->clockNumber }}">{{ $member->firstName.' '."Smith" }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <h5>Current Shift:</h5>
          <select class="form-control" value='' name="currentshift" >
          @foreach(range('A', 'D') as $char)
            <option value="{{ $char }}">{{ $char }}</option>
          @endforeach
        </select>
      </div>


      <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <h5>Previous Shift:</h5>
          <select class="form-control" value='' name="prevshift" id="prevshift">
          @foreach(range('A', 'D') as $char)
            <option value="{{ $char }}">{{ $char }}</option>
          @endforeach
        </select>
      </div>

       <button type="submit" class="btn btn-primary">Create</button>
        </form>
      </div>
      </div>
      <div class="col">
      </div>
    </div>
    </div>
@endsection
