@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
    <div class="col">
      <div class="float-left"><h1>Shift Changes</h1></div>
    </div>
    <div class="col">
      <div class="float-right"><a href="{{ action('ShiftChangeController@create') }}" button type="submit" class="btn btn-primary">Add Shift Change <i class="fas fa-plus-circle"></i></a></div>
    </div>
  </div>
  <hr class="crud_hr"/>


    <div class="row">
      <div class="col-3">
        <input class="form-control" type="text" id="search" placeholder="Search" />
        <hr class="blue_hr"/>
      </div>
    </div>



  <div class="row">
    <div class="col">
      <div class="table-responsive">
      <table id="table" class="table crud_table table-sm table-striped">
          <thead class="crud_head">
            <tr>
              <td>Clock #</td>
              <td>Name</td>
              <td>Current Shift</td>
              <td>Previous Shift</td>
              <td>Changed On</td>
              <td>Action</td>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach($shiftchange as $shift)
            <tr class="custom_border">
                <td>{{$shift->clockNumber}}</td>
                <td>{{$shift->firstName}} {{$shift->lastName}}</td>
                <td>{{$shift->currentshift}}</td>
                <td>{{$shift->prevshift}}</td>
                <td>{{$shift->created_at}}</td>

                <td>
                      <form action="{{action('ShiftChangeController@destroy', $shift->id)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit"><i class="fa fa-trash" /></i></button>
                      </form>
                      <a href="{{action('ShiftChangeController@edit',$shift->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                  </div>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
  </div>
</div>
@endsection
