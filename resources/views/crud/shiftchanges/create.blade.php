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
    <h2 id="crud_header">Create Shift Change</h2>

    <form method="post" action="{{ action('ShiftChangeController@store') }}">

      <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <label for="clockNumber">Clock Number:</label>
          <input type="text" class="form-control" name="clockNumber" required/>
      </div>

      <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <label for="currentshift">Current Shift:</label>
          <input type="text" class="form-control" name="currentshift" required/>
      </div>


      <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <label for="prevshift">Previous Shift:</label>
          <input type="text" class="form-control" name="prevshift" required/>
      </div>

       <button type="submit" class="btn btn-primary">Create</button>
        </form>

    </div>
</div>

@endsection
