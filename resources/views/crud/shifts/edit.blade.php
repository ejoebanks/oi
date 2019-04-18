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
      <h2 id="crud_header">Edit Shift</h2>
      <form class="form-horizontal" role="form" method="POST" action="{{ action('ShiftController@update',$shift->id) }}">
           {!! csrf_field() !!}

           <input type="hidden" name="_method" value="PATCH">

           <div class="form-group">
               <input type="hidden" value="{{csrf_token()}}" name="_token" />
               <label for="id">Employee:</label>

               <select class="form-control" name="employee" id="employee" required>
                 <option value="">None</option>
               @foreach($staff as $mem)
                  @if ($mem->clockNumber == $shift->clockNumber)
                    @php ($selected = "selected")
                  @else
                    @php ($selected = "")
                  @endif
                 <option {{ $selected }} value="<?=$mem->clockNumber ?>"><?= $mem->firstName. " ".$mem->lastName ?></option>
               @endforeach
               </select>
           </div>

        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="shift">Shift:</label>
              <select class="form-control" value='{{ $shift->shift }}' name="shift" id="shift">

              <?php
              foreach (range('A', 'D') as $char) {
                if ($shift->shift == $char) {
                    $selected = "selected";
                } else {
                    $selected = "";
                } ?>
                <option {{ $selected }} value="<?= $char ?>"><?=  $char ?></option>
                <?php
                }?>
            </select>
          </div>

            <div class="form-group">
                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                <label for="primaryJob">Primary Job:</label>
                <input type="text" class="form-control" name="primaryJob" value="{{ $shift->primaryJob }}" />
            </div>

            <div class="form-group">
                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                <label for="comments">Comments:</label>
                <textarea type="textarea" class="form-control" name="comments" />{{ $shift->comments }}</textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
