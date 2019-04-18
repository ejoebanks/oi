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
    <h2 id="crud_header">Create Shift</h2>
    <hr class="crud_hr"/>
      <form method="post" action="{{ action('ShiftController@store') }}">
      <div class="row">
        <div class="col-md-4">
          <h5>Employee:</h5>

          <select class="form-control" name="clockNumber" id="clockNumber" required>
            <option value="">None</option>
          @foreach($staff as $mem)
            <option value="<?=$mem->clockNumber ?>"><?= $mem->firstName. " ".$mem->lastName ?></option>
          @endforeach
          </select>
        </div>
        <br/>
        <div class="col-md-4">
          <h5>Shift:</h5>
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
        <div class="col-md-4">
          <h5>Primary Job:</h5>
          <input type="text" class="form-control" name="primaryJob" id="primaryJob" />
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
        <input type="hidden" value="{{csrf_token()}}" name="_token" />
        <h5>Comments:</h5>
        <textarea type="textarea" class="form-control" name="comments" /></textarea>
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
