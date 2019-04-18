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
    <h2 id="crud_header">Create Shift</h2>

    <form method="post" action="{{ action('ShiftController@store') }}">

      <div class="form-group">
      <input type="hidden" value="{{csrf_token()}}" name="_token" />
      <label for="id">Employee:</label>

      <select class="form-control" name="clockNumber" id="clockNumber" required>
        <option value="">None</option>
      @foreach($staff as $mem)
        <option value="<?=$mem->clockNumber ?>"><?= $mem->firstName. " ".$mem->lastName ?></option>
      @endforeach
      </select>
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

@endsection
