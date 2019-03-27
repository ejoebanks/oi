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
            <input type="text" class="form-control" name="employee" value="{{ $event->employee }}" />
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

@endsection
