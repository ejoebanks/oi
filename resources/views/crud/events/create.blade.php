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
    <h2 id="crud_header">Create Event</h2>
    <hr class="crud_hr"/>
    <form method="post" action="{{ action('EventController@store') }}">

      <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <label for="employee">Employee:</label>
          <select class="form-control" name="employee" id="employee" required>
            <option value="">None</option>
          @foreach($staff as $mem)
            <option value="<?= $mem->clockNumber ?>"><?= $mem->firstName. " ".$mem->lastName ?></option>
          @endforeach
          </select>
      </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title"/>
        </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="date">Date:</label>
            <input type="text" class="form-control" name="date"/>
        </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="description">Description:</label>
            <textarea type="textarea" class="form-control" name="description" /></textarea>
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
