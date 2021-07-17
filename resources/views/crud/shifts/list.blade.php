@extends('layouts.app')

@section('content')
<?php
use App\Absence;
 ?>
 @if ($errors->any())
     <div class="alert alert-danger">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div><br />
 @endif

 <script>typeof Alert !== 'undefined' || document.write('<script src="/js/bootstrap/bootstrap.min.js">\x3C/script>')</script>

<script>
function absence(name, id) {
  $('#employee').val(name);
  $('#emp_id').val(id);
  $('#modal').modal('show');
}
</script>
<div class="container list_top">

  <div class="row" id="added_absence">
    <div class="col-md-6 offset-md-3">
      <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <div id="absence_text"></div>
      </div>
    </div>
  </div>
  <!-- Button trigger modal -->

  <div class="modal fade" tabindex="-1" id="modal" >
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form id="modalInputs">
            <input type="hidden" name="emp_id" id="emp_id" value="" />
            <div class="modal-body mx-3">
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>

                  <h4 id="modalheader">Absence</h4>
                  <hr class="orange_hr"/>
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <div class="input-group-prepend">
                      <span class="input-group-text"><i class="bi bi-person"></i></span>
                      </div>
                      <input class="form-control" name="employee" id="employee" value="" disabled></input>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <input class="form-control" name="start_date" id="start_date" placeholder="Start Date" required/>
                    </div>
                    <div class="col-md-6">
                      <input class="form-control" name="end_date" id="end_date" placeholder="End Date" required/>
                  </br>
                  </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-info"></i></span>
                      </div>
                      <textarea class="form-control" name="reason" id="reason" placeholder="Reason" rows="3"></textarea>
                    </div>
                  </div>
                    </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                  <button class="btn btn-primary" id="absence_create" type="submit">Submit</button>

              </div>
          </div>
      </div>
  </div>

      <div class="row">
        <div class="col-md-3">
        <!--<input class="form-control" id="system-search" name="q" placeholder="Search" required>-->
        <input class="form-control" type="text" id="search" placeholder="Search" />
        </div>
        <div class="col-md-9">
          <div class="float-end">
          <a href="{{action('ShiftController@export')}}" class="btn btn-outline-secondary" role="button"><i class="bi bi-download"></i> Org Chart</a>
          <a href="{{action('StaffController@exportScheduling')}}" class="btn btn-outline-secondary" role="button"><i class="bi bi-card-list"></i> Employee List</a>
          <a href="{{action('ShiftController@sendChart')}}" class="btn btn-outline-secondary" role="button"><i class="bi bi-mailbox2"></i> Email</a>
        </div>
      </div>
    </div>
  </div>
<div class="container">
  <div class="row">
    <br/>
    @foreach(range('A', 'D') as $char)
      @php ($shiftcount = \DB::table('shifts')->where('shift', $char)->count())
    <div class="col">
      <table id="table" class="table table-list-search table table-striped">
        <thead class="list_tablehead">
          <tr>
            <th colspan="2" class="circle-tile">
              <div class="circle-tile-heading black">{{ $char }}</div>
                    <div class="circle-tile-content black">
                      <div class="circle-tile-description text-faded">Staff</div>
                      <div class="circle-tile-number text-faded ">{{$shiftcount}}</div>
                    </div>
            </th>
          </tr>
        </thead>
        <thead class="list_head">
          </thead>
          <tbody id="myTable">
              @foreach($shift as $s)
              @if($char == $s->shift)
              @if (isset($employee_absence[$s->clockNumber]))
                 @php($marker = $employee_absence[$s->clockNumber] )
              @else
               @php($marker = '')
              @endif
              @php ($name = $s->firstName.' '.$s->lastName)

              <tr class="list_border">
                <td>
                  <div class="btn-group-vertical" id="list_btn">
                    <button class="btn btn-secondary " type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="bi bi-pencil-square" style="font-size:1.2rem;"></i>
                    </button>
                    <button type="button" class="btn btn-secondary" onclick="absence('{{ $name }}', '{{ $s->clockNumber }}')"><i class="bi bi-calendar-x" style="color:white;font-size:1.2rem;"></i></button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <h6 class="dropdown-header"></h6>
                    @include('functions.shiftdropdown')
                  </div>
                </div>
                </td>
                  <td>
                    <!--
                    <h4><span class="badge badge-secondary {{$outputclass[$s->primaryJob]}}">{{$s->jobTitle}}</span>
                    -->
                    <h4><span class="badge bg-secondary">{{ $s->clockNumber }}</span></h4>
                    </h4>
                    <div id="{{ $marker }}"></div>
                    <h5>{{ $name }}</h5>
                    <h6>{{ $s->jobTitle }}</h6>
                    <h6>{{ $s->seniority }}</h6>
                    </div>
                  </td>
                </tr>
              @endif
              @endforeach
          </tbody>
      </table>
    </div>
@endforeach
  </div>
</div>

@endsection
