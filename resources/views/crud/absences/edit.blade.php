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
      <h2 id="crud_header">Edit Staff Member</h2>
      <hr class="crud_hr"/>
                 <form class="form-horizontal" role="form" method="POST" action="{{ action('AbsenceController@update',$absence->id) }}">
                   {!! csrf_field() !!}

                   <input type="hidden" name="_method" value="PATCH">

                 <div class="row">
                   <div class="col-md-6">
                     <h5 for="clockNumber">Employee:</h5>
                     <select class="form-control" name="clock_number" required>
                       <option value="">None</option>
                       @foreach($staff as $mem)
                          @if ($absence->clock_number == $mem->clockNumber)
                            @php ($selected = "selected")
                          @else
                            @php ($selected = "")
                          @endif
                         <option {{ $selected }} value="<?=$mem->clockNumber ?>"><?= $mem->firstName. " ".$mem->lastName ?></option>
                       @endforeach
                     </select>
                   </div>
                   <br/>
                   <div class="col-md-6">
                     <h5>Date Missed:</h5>
                     <input type="text" class="form-control" id="date_missed" name="date_missed" value="{{ $absence->date_missed }}" required />
                   </div>
                 </div>
                 <br/>
                 <div class="row">
                   <div class="col-md-12">
                     <h5>Reason:</h5>
                     <textarea type="text" class="form-control" name="reason" />{{ $absence->reason}}</textarea>
                   </div>
                   <br/>
                 </div>
               <br />
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
