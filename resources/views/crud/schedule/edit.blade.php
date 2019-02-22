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
      <form class="form-horizontal" role="form" method="POST" action="{{ action('ScheduleController@update',$schedule->id) }}">
           {!! csrf_field() !!}

           <input type="hidden" name="_method" value="PATCH">

           <div class="form-group">
               <input type="hidden" value="{{csrf_token()}}" name="_token" />
               <label for="id">Clock #:</label>
               <input type="text" class="form-control" name="clockNumber" value="{{ $schedule->clockNumber }}" />
           </div>
        
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="shift">Shift:</label>
              <select class="form-control" value='{{ $schedule->shift }}' name="shift" id="shift">

              <?php
              foreach (range('A', 'D') as $char) {
                if ($schedule->shift == $char) {
                    $selected = "selected";
                } else {
                    $selected = "";
                } ?>
                <option {{ $selected }} value="<?= $char ?>"><?=  $char ?></option>
                <?php
                }?>
            </select>

            <div class="form-group">
                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                <label for="primaryJob">Primary Job:</label>
                <input type="text" class="form-control" name="primaryJob" value="{{ $schedule->primaryJob }}" />
            </div>

            <div class="form-group">
                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                <label for="comments">Comments:</label>
                <textarea type="textarea" class="form-control" name="comments" />{{ $schedule->comments }}</textarea>
            </div>


        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
