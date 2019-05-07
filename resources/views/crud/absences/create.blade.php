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
      <h2 id="crud_header">Create Absence</h2>
      <hr class="crud_hr"/>
        <form method="post" action="{{ action('AbsenceController@store') }}">
          <input type="hidden" value="{{csrf_token()}}" name="_token" />

        <div class="row">
          <div class="col-md-6">
            <h5 for="clockNumber">Employee:</h5>
            <select class="form-control" name="clock_number" id="clock_number" required>
              <option value="">None</option>
            @foreach($staff as $mem)
              <option value="<?=$mem->clockNumber ?>"><?= $mem->firstName. " ".$mem->lastName ?></option>
            @endforeach
            </select>
          </div>
          <br/>
          <div class="col-md-6">
            <h5>Date Missed:</h5>
            <input type="text" class="form-control" id="date_missed" name="date_missed" required />
          </div>
        </div>
        <br/>
        <div class="row">
          <div class="col-md-12">
            <h5>Reason:</h5>
            <textarea type="text" class="form-control" name="reason" required></textarea>
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
