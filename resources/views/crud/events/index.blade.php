@extends('layouts.app')

@section('content')
    <div class="container">
      <table class="table table-striped">
        <thead>
            <tr>
              <td>Employee</td>
              <td>Title</td>
              <td>Date</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($event as $loc)
            <tr>
                <td>{{$loc->id}}</td>
                <td>{{$loc->title}}</td>
                <td>{{$loc->date}}</td>
                <td><a href="{{action('EventController@edit',$loc->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{action('EventController@destroy', $loc->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br/>
    <a href="{{ action('EventController@create') }}" button type="submit" class="btn btn-primary">Insert New Event</button></a>

<div>
@endsection
