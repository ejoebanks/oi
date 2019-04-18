@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-3-md">
      <input class="form-control" type="text" id="search" placeholder="Type to search..." />
    </div>
    &nbsp;    &nbsp;    &nbsp;
    <a href="{{ action('ShiftChangeController@create') }}" button type="submit" class="btn btn-primary">Insert New Shift Change</button></a>
  </div>

  <div class="row">
    <table id="table" class="table table-sm table-striped">
        <thead>
            <tr>
              <td>Clock #</td>
              <td>Name</td>
              <td>Current Shift</td>
              <td>Previous Shift</td>
              <td>Changed On</td>

              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach($shiftchange as $shift)
            <tr>
                <td>{{$shift->clockNumber}}</td>
                <td>{{$shift->firstName}} {{$shift->lastName}}</td>
                <td>{{$shift->currentshift}}</td>
                <td>{{$shift->prevshift}}</td>
                <td>{{$shift->created_at}}</td>

                <td><a href="{{action('ShiftChangeController@edit',$shift->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{action('ShiftChangeController@destroy', $shift->id)}}" method="post">
                      {{csrf_field()}}
                      <input name="_method" type="hidden" value="DELETE">
                      <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
@endsection
