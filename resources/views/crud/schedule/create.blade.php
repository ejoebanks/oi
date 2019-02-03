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
    <form method="post" action="{{ action('ScheduleController@store') }}">

      <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <label for="id">Clock #:</label>
          <input type="text" class="form-control" name="id" />
      </div>

      <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <label for="firstName">First Name:</label>
          <input type="text" class="form-control" name="firstName" />
      </div>

      <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <label for="lastName">Last Name:</label>
          <input type="text" class="form-control" name="lastName" />
      </div>

      <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <label for="shift">Shift:</label>
          <select class="form-control" value='' name="shift" id="shift">
          <?php
          foreach (range('A', 'D') as $char) {
          ?>
            <option value="<?= $char ?>"><?=  $char ?></option>
            <?php
            }?>
        </select>
      </div>

      <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <label for="primaryJob">Primary Job:</label>
          <input type="text" class="form-control" name="primaryJob" />
      </div>

      <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <label for="comments">Comments:</label>
          <textarea type="textarea" class="form-control" name="comments" /></textarea>
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
