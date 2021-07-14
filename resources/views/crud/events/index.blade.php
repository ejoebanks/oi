@extends('layouts.app')

@section('content')
      <div class="container">
        <div class="row">
        <div class="col">
          <div class="float-left"><h1>Events</h1></div>
        </div>
        <div class="col">
          <div class="float-right"><a href="{{ action('EventController@create') }}" button type="submit" class="btn btn-primary">Add Event <i class="fas fa-plus-circle"></i></a></div>
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
              <td>Employee</td>
              <td>Title</td>
              <td>Date</td>
              <td>Action</td>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach($event as $ev)
            <tr class="custom_border">
                <td>{{$ev->employee}}</td>
                <td>{{$ev->title}}</td>
                <td>{{$ev->date}}</td>
                <td>
                      <form action="{{action('EventController@destroy', $ev->id)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit"><i class="bi bi-trash"></i></button>
                      </form>
                      <a href="{{action('EventController@edit',$ev->id)}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                  </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
</div>
</div>
</div>

@endsection
