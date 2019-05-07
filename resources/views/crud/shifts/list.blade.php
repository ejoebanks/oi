@extends('layouts.app')

@section('content')
<script>
function absence(name, id) {
  $('#modal').modal();
  $('#employee').val(name);
  $('#emp_id').val(id);
}
</script>
<div class="container list_top">
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form id="modalInputs">
            <input type="hidden" name="emp_id" id="emp_id" value="" />
            <div class="modal-body mx-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle"></i>
                </button>

                  <h4 id="modalheader">Absence</h4>
                  <hr class="orange_hr"/>
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                      </div>
                      <input class="form-control" name="employee" id="employee" value="" disabled></input>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <input type="blank" class="form-control" name="date_missed" id="date_missed" required/>
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
                  <input type="button" class="btn btn-primary" id="absence_create" value="Submit">
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
          <div class="float-right">
          <a href="{{action('ShiftController@export')}}" class="btn btn-outline-secondary" role="button"><i class="fas fa-download"></i> Org Chart</a>
          <a href="{{action('StaffController@exportScheduling')}}" class="btn btn-outline-secondary" role="button"><i class="fas fa-download"></i> Employee List</a>
          <a href="{{action('ShiftController@sendChart')}}" class="btn btn-outline-info" role="button"><i class="far fa-envelope"></i> Email</a>
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
              <div class="circle-tile-heading dark-blue">{{ $char }}</div>
                    <div class="circle-tile-content darker-blue">
                      <div class="circle-tile-description text-faded">Staff</div>
                      <div class="circle-tile-number text-faded ">{{$shiftcount}}</div>
                    </div>
            </th>
          </tr>
        </thead>
        <thead class="list_head">
              <tr>
                <td>Action</td>
                <td>Employee</td>
              </tr>
          </thead>
          <tbody id="myTable">
              @foreach($shift as $s)
              @if($char == $s->shift)
              <tr class="list_border">
                <td>
                  <div class="btn-group-vertical" id="list_btn">
                    <button class="btn btn-secondary " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-pencil-alt"></i>
                    </button>

                    <button data-toggle="collapse" data-target="#EMP{{$s->id}}" aria-controls="EMP" aria-expanded="false" class="btn btn-md btn-outline-secondary">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <h6 class="dropdown-header"></h6>
                    @include('functions.shiftdropdown')
                  </div>
                </div>
                </td>
                  <td>
                    <h4><span class="badge badge-secondary {{$outputclass[$s->primaryJob]}}">{{$s->id}}</span>
                      @php ($name = $s->firstName.' '.$s->lastName)
                      <button type="button" class="btn btn-info btn-custom btn-sm" onclick="absence('{{ $name }}', '{{ $s->id }}')"><i class="fas fa-calendar-times"></i></button>
                    </h4>
                    <h6>{{ $s->firstName }} {{ "Smith" }}</h6>

                    <div class="collapse" id="EMP{{$s->id}}">
                      <div>
                        <span class="float-md-left"><i id="collapse_icon" class="fas fa-calendar-day fa-lg"></i> {{ $s->seniority }}</span>
                      </div>
                      <div>
                        <span class="float-md-left"><i id="collapse_icon" class="far fa-hand-point-right fa-lg"></i> {{ $s->primaryJob }}</span>
                      </div>
                      <div>
                        <?php
                        if ($s->comments == null) {
                            $var = "None";
                        } else {
                            $var = $s->comments;
                        }?>
                          <span class="float-md-left"><i id="collapse_icon" class="far fa-comment fa-lg"></i> {{ $var }}</span>
                      </div>

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
