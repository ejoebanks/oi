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
      <div class="row">
        <div class="col-md-6">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <h5 for="clockNumber">Clock Number (Optional):</h5>
          <input type="text" class="form-control" name="clockNumber" />
        </div>
        <div class="col-md-6">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <h5>Email:</h5>
          <input type="text" class="form-control" id="email" name="email" />
        </div>

        <br/>
      </div>
      <br/>

      <div class="row">
        <div class="col-md-6">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <h5 for="password">Password:</h5>
          <input type="text" class="form-control" name="password" required/>
        </div>
        <div class="col-md-6">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <h5 for="type">Admin Priviliges:</h5>
          <select class="form-control" id="type" name="type">
            <option value="1">Yes</option>
            <option value="0">No</option>
          </select>
        </div>
      </div>

      <br/>

       <button type="submit" class="btn btn-primary">Create</button>
     </form>
   </div>
   </div>
   <div class="col">
   </div>
 </div>
</div>
@endsection
