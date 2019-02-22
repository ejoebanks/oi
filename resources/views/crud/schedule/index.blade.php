@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
              <td>Clock #</td>
              <td>Shift</td>
              <td>First Name</td>
              <td>Last Name</td>

              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($schedule as $s)
            <tr>
                <td>{{$s->clockNumber}}</td>
                <td>{{$s->shift}}</td>
                <td>{{$s->firstName}}</td>
                <td>{{$s->lastName}}</td>

                <td><a href="{{action('ScheduleController@edit',$s->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{action('ScheduleController@destroy', $s->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ action('ScheduleController@create') }}" button type="submit" class="btn btn-primary">Insert New Schedule</button></a>

<div>
@endsection
