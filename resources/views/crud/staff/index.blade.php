@extends('layouts.app')

@section('content')
<br/>

<div class="container">
  <div class="row">
    <table class="table table-sm table-striped">
        <thead>
            <tr>
              <td>Clock </td>
              <td>Seniority</td>
              <td>First Name</td>
              <td>Last Name</td>

              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($staff as $member)
            <tr>
                <td>{{$member->clockNumber}}</td>
                <td>{{$member->seniority}}</td>
                <td>{{$member->firstName}}</td>
                <td>{{$member->lastName}}</td>

                <td><a href="{{action('StaffController@edit',$member->clockNumber)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{action('StaffController@destroy', $member->clockNumber)}}" method="post">
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
    <a href="{{ action('StaffController@create') }}" button type="submit" class="btn btn-primary">Insert New Staff</button></a>

@endsection
