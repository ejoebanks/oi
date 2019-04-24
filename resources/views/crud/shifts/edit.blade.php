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
      <h2 id="crud_header">Edit Shift</h2>
      <hr class="crud_hr"/>
      <form class="form-horizontal" role="form" method="POST" action="{{ action('ShiftController@update',$shift->id) }}">
           {!! csrf_field() !!}
           <input type="hidden" name="_method" value="PATCH">

           <div class="row">
             <div class="col-md-5">
               <h5>Employee:</h5>

               <select class="form-control" name="clockNumber" id="clockNumber" required>
                 <option value="">None</option>
                 @foreach($staff as $mem)
                    @if ($mem->clockNumber == $shift->clockNumber)
                      @php ($selected = "selected")
                    @else
                      @php ($selected = "")
                    @endif
                   <option {{ $selected }} value="<?=$mem->clockNumber ?>"><?= $mem->firstName. " "."Smith" ?></option>
                 @endforeach
               </select>
             </div>
             <br/>
             <div class="col-md-3">
               <h5>Shift:</h5>
               <select class="form-control" value='{{ $shift->shift }}' name="shift" id="shift">
                 <option value="">None</option>
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
             <div class="col-md-4">
               <h5>Primary Job:</h5>
               <input type="text" class="form-control" name="primaryJob" value="{{ $shift->primaryJob }}" />
             </div>
           </div>
           <br>
           <div class="row">
             <div class="col-md-12">
             <input type="hidden" value="{{csrf_token()}}" name="_token" />
             <h5>Comments:</h5>
             <textarea type="textarea" class="form-control" name="comments" />{{ $shift->comments }}</textarea>
           </div>
        </div>
        <br/>

        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
    </div>
    <div class="col">
    </div>
  </div>
  </div>
@endsection
