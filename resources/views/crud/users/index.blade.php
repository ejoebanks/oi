@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
  <div class="col">
    <div class="float-left"><h1>Users</h1></div>
  </div>
  <div class="col">
    <div class="float-right"><a href="{{ action('UserController@create') }}" button type="submit" class="btn btn-primary">Add User <i class="fas fa-plus-circle"></i></a></div>
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
              <td>ID</td>
              <td>Clock Number</td>
              <td>Email</td>
              <td>Admin</td>
              <td>Action</td>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach($users as $user)
              @if ($user->type == '1')
                @php ($admin = "Yes")
              @else
                @php ($admin = "No")
              @endif

              @if($user->clockNumber == null)
                @php($clockNumber = "N/A")
              @else
                @php($clockNumber = $user->clockNumber)
              @endif
              <tr class="custom_border">
                <td>{{$user->id}}</td>
                <td>{{$clockNumber}}</td>
                <td>{{$user->email}}</td>
                <td>{{$admin}}</td>

                <td>
                      <form action="{{action('UserController@destroy', $user->id)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit"><i class="fa fa-trash" /></i></button>
                      </form>
                      <a href="{{action('UserController@edit',$user->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
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
