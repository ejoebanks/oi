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
<div class="container">
    <form method="post" action="{{ action('StaffController@store') }}">

      <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <label for="clockNumber">Clock Number:</label>
          <input type="text" class="form-control" name="clockNumber" required/>
      </div>

      <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <label for="seniority">Seniority:</label>
          <input id="seniority" name="seniority" />
      </div>

      <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <label for="firstName">First Name:</label>
          <input type="text" class="form-control" name="firstName" required/>
      </div>


      <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />
          <label for="lastName">Last Name:</label>
          <input type="text" class="form-control" name="lastName" required/>
      </div>
      <button id="staff_btn" name="staff_btn" type="button" class="btn btn-outline-info">
        Add Shift
        <i class="fas fa-plus-circle"></i>
      </button>
      <br/>
      <div id="staffbox">
        <br/>
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="shift">Shift:</label>
            <select class="form-control" value='' name="shift" id="shift">
              <option value="">None</option>
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
            <input type="text" class="form-control" name="primaryJob" id="primaryJob" />
        </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="comments">Comments:</label>
            <textarea type="textarea" class="form-control" name="comments" /></textarea>
        </div>
      </div>
      <br/>
       <button type="submit" class="btn btn-primary">Create</button>
        </form>

    </div>
</div>

@endsection
