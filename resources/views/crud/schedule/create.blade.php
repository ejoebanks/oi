@extends('layouts.app')

@section('content')
<?php
if (Auth::user() != null && Auth::user()->type == 1) {
    ?>

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
<div class="container">
    <form method="post" action="{{ action('ServiceController@store') }}">
      <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <label for="firstName">First Name:</label>
          <input type="text" class="form-control" name="firstName" />
      </div>

      <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <label for="lastNameescription">Last Name:</label>
          <input type="text" class="form-control" name="lastNameescription" />
      </div>

        <button type="submit" class="btn btn-primary">Create</button>
        </form>

    </div>
</div>
<?php
} else {
        ?>
  @include('functions.denied')
<?php
    } ?>

@endsection
