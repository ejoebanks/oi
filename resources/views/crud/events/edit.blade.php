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
    <h2 id="crud_header">Edit Event</h2>
    <hr class="crud_hr"/>
      <form class="form-horizontal" role="form" method="POST" action="{{ action('EventController@update',$event->id) }}">
           {!! csrf_field() !!}

           <input type="hidden" name="_method" value="PATCH">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" value="{{ $event->title }}" />
        </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="date">Date:</label>
            <input type="text" class="form-control" name="date" value="{{ $event->date }}" />
        </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="employee">Employee:</label>
            <select class="form-control" name="employee" id="employee" required>
              <option value="">None</option>
            @foreach($staff as $mem)
              @if ($event->employee == $mem->clockNumber)
                @php ($active = 'selected')
              @else
                @php ($active = '')
              @endif
              <option {{ $active }} value="<?= $mem->clockNumber ?>"><?= $mem->firstName. " "."Smith" ?></option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="description">Description:</label>
            <textarea type="textarea" class="form-control" name="description" value="{{ $event->description }}"/>{{ $event->description }}</textarea>
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
