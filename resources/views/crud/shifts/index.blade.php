@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
    <div class="col">
      <div class="float-left"><h1>Shifts</h1></div>
    </div>
    <div class="col">
      <div class="float-right"><a href="{{ action('ShiftController@create') }}" button type="submit" class="btn btn-primary">Add Shift <i class="fas fa-plus-circle"></i></a></div>
    </div>
  </div>
  <hr class="crud_hr"/>


    <div class="row">
      <div class="col-3">
        <input class="form-control" type="text" id="search" placeholder="Search" />
        <hr class="blue_hr"/>
      </div>
    </div>

    <div class="table-responsive">

    <table id="table" class="table crud_table table-sm table-striped">
        <thead class="crud_head">
          <tr class="custom_border">
              <td>Clock #</td>
              <td>Shift</td>
              <td>First Name</td>
              <td>Last Name</td>
              <td>Action</td>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach($shift as $s)
            <tr class="custom_border">
                <td>{{$s->clockNumber}}</td>
                <td>{{$s->shift}}</td>
                <td>{{$s->firstName}}</td>
                <td>{{$s->lastName}}</td>
                <td>
                      <form action="{{action('ShiftController@destroy', $s->id)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                    <div class="btn-group" role="group">
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit"><i class="fa fa-trash" /></i></button>
                      </form>
                      <a href="{{action('ShiftController@edit',$s->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
<div>
@endsection
