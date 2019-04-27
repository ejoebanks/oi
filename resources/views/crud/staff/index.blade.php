@extends('layouts.app')

@section('content')
  <div class="container">
    @if( Session::has('message') )
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('message') }}
        </div>
      </div>
    </div>
    @endif
    <div class="row">
    <div class="col">
      <div class="float-left"><h1>Staff</h1></div>
    </div>
    <div class="col">
      <div class="float-right"><a href="{{ action('StaffController@create') }}" button type="submit" class="btn btn-primary">Add Staff <i class="fas fa-plus-circle"></i></a></div>
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
              <td>Seniority</td>
              <td>First Name</td>
              <td>Last Name</td>
              <td>Action</td>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach($staff as $member)
            <tr class="custom_border">
                <td>{{ $member->clockNumber }}</td>
                <td>{{$member->seniority}}</td>
                <td>{{$member->firstName}}</td>
                <td>{{ $member->lastName }}</td>
                <td>
                      <form action="{{action('StaffController@destroy', $member->clockNumber)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit"><i class="fa fa-trash" /></i></button>
                      </form>
                      <a href="{{action('StaffController@edit',$member->clockNumber)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
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
