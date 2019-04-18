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
<div class="row">
  <div class="col">
  </div>
  <div class="col-md-8">
    <div id="crud_box">
    <h2 id="crud_header">Create User</h2>
    <hr class="crud_hr"/>
    <form method="post" action="{{ action('UserController@store') }}">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" required/>
        </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="emergencycontact">Emergency Contact:</label>
            <input type="text" class="form-control" name="emergencycontact" required/>
        </div>


        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" required/>
        </div>

        <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <label for="type">Admin Priviliges:</label>
          <select class="form-control" id="type" name="type">
            <option value="1">Yes</option>
            <option value="0">No</option>
          </select>
        </div>
       <button type="submit" class="btn btn-primary">Create</button>
     </form>
   </div>
   </div>
   <div class="col">
   </div>
 </div>
</div>
@endsection
