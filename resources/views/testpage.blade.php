@extends('layouts.app')

@section('content')
<div class="container">
	<!--
	<h2>Create Staff Member</h2>
	<br/>
  @php ($stack = array())
  @foreach ($shifts as $shift)
    @foreach(range('A', 'D') as $char)
      @if ($char == $shift->shift)
      @php (array_push($stack, $char))
        @if ($stack[0] !== $char)
          @php ($stack = array())
          @php (array_push($stack, $char))
        @endif

        @if (in_array("$shift->primaryJob", $stack))
          {{ $shift->firstName}}
        @else
          {{"HEADING"}}
          {{$shift->firstName}}
        @endif
          {{ $shift->shift }}
          {{$shift->primaryJob}}
        @if (in_array("$shift->primaryJob", $stack))
        @else
          @php (array_push($stack, $shift->primaryJob))
        @endif
      @endif
    @endforeach
  <br/>
  @endforeach
-->

<?php
    $i = 0;
    $aShifts = array();
    $bShifts = array();
    $cShifts = array();
    $dShifts = array();

    foreach ($testshift as $shift) {
        if ($testshift[$i]->shift == "A") {
            array_push($aShifts, $testshift[$i]);
        }

        if ($testshift[$i]->shift == "B") {
            array_push($bShifts, $testshift[$i]);
        }

        if ($testshift[$i]->shift == "C") {
            array_push($cShifts, $testshift[$i]);
        }

        if ($testshift[$i]->shift == "D") {
            array_push($dShifts, $testshift[$i]);
        }
        $i++;
    }
    $array_count = (count($aShifts) + count($bShifts) + count($cShifts) + count($dShifts));
    $biggest_array = max(count($aShifts), count($bShifts), count($cShifts), count($dShifts));
?>

<div class="row">
	<div class="col-sm">
  <table class="table table-list-search table table-striped">
      <thead>
          <tr>
            <th class="shiftheader" colspan="2">Shift A</th>
						<th class="shiftheader" colspan="2">Shift B</th>
						<th class="shiftheader" colspan="2">Shift C</th>
						<th class="shiftheader" colspan="2">Shift D</th>
          </tr>
      </thead>
      <tbody>
				@foreach(range('A', 'D') as $char)
        @php ($stack = array())
        @foreach ($shifts as $shift)
            @if ($char == $shift->shift)
            @php (array_push($stack, $char))
              @if ($stack[0] !== $char)
                @php ($stack = array())
                @php (array_push($stack, $char))
              @endif
              @if (!in_array("$shift->primaryJob", $stack))
							<tr>
								<th class="jobheader" colspan="2">
									 {{ $shift->primaryJob }}
								</th>
							</tr>
							@endif
              <tr>
                <td><strong>{{$shift->clockNumber}}</strong></td>
                <td>{{$shift->firstName}} {{$shift->lastName}}</td>
              </tr>
              @if (in_array("$shift->primaryJob", $stack))
              @else
                @php (array_push($stack, $shift->primaryJob))
              @endif
            @endif
          @endforeach
				</tbody>
				@endforeach
		</table>
	</div>
</div>

<div class="row">
	<div class="col-sm">
  <table class="table table-list-search table table-striped">
      <thead>
          <tr>
            <th class="shiftheader">Shift A</th>
						<th class="shiftheader">Shift B</th>
						<th class="shiftheader">Shift C</th>
						<th class="shiftheader">Shift D</th>
          </tr>
      </thead>
      <tbody>
        			 @php ($stack = array())
							 @php ($a = count($grouped['A']) - 1)
							 @php ($b = count($grouped['B']) - 1)
							 @php ($c = count($grouped['C']) - 1)
							 @php ($d = count($grouped['D']) - 1)

							 @foreach(range('A', 'D') as $char)
							 	@foreach($grouped["$char"] as $group)
								@if ($a < 0 && $b < 0 && $c < 0 && $d < 0)
								 <?php break; ?>
								@endif
								      <tr>
												<td>
													@if ($a > 0)
														{{$grouped['A'][$a]->firstName}}
														{{$grouped['A'][$a]->lastName}}
													@endif
												</td>

												<td>
													@if ($b > 0)
														{{$grouped['B'][$b]->firstName}}
													@endif
												</td>
												<td>
													@if ($c > 0)
														{{$grouped['C'][$c]->firstName}}
													@endif
												</td>
												<td>
													@if ($d > 0)
														{{$grouped['D'][$d]->firstName}}
													@endif
												</td>
								       </tr>
											 @php($a--)
											 @php($b--)
											 @php($c--)
											 @php($d--)
							@endforeach
						@endforeach
				</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-sm">
  <table class="table table-list-search table table-striped">
      <thead>
          <tr>
            <th class="shiftheader">Shift A</th>
						<th class="shiftheader">Shift B</th>
						<th class="shiftheader">Shift C</th>
						<th class="shiftheader">Shift D</th>
          </tr>
      </thead>
      <tbody>
        			 @php ($stack = array())
							 @for ( $i = 0; $i< $biggest_array; $i++ )
								      <tr>
												<td>
													@if (isset($aShifts[$i]))
														{{ $aShifts[$i]['clockNumber'] }}
														{{ $aShifts[$i]['firstName'] }}
														{{ $aShifts[$i]['lastName'] }}
													@endif
												</td>
												<td>
													@if (isset($bShifts[$i]))
														{{ $bShifts[$i]['clockNumber'] }}
														{{ $bShifts[$i]['firstName'] }}
														{{ $bShifts[$i]['lastName'] }}
													@endif
												</td>
												<td>
													@if (isset($cShifts[$i]))
														{{ $cShifts[$i]['clockNumber'] }}
														{{ $cShifts[$i]['firstName'] }}
														{{ $cShifts[$i]['lastName'] }}
													@endif
												</td>
												<td>
													@if (isset($dShifts[$i]))
														{{ $dShifts[$i]['clockNumber'] }}
														{{ $dShifts[$i]['firstName'] }}
														{{ $dShifts[$i]['lastName'] }}
													@endif
												</td>
								       </tr>
								  @endfor
				</tbody>
		</table>
	</div>
</div>

  <div class="row">
    <div class="col">
    </div>
    <div class="col-md-8">
      <div id="bleh">
      <form>
        <div class="row">
          <div class="col-md-6">
            <h5 for="clockNumber">Clock Number:</h5>
            <input type="text" class="form-control" required />
          </div>
          <br/>
          <div class="col-md-6">
            <h5>Seniority:</h5>
            <input type="text" class="form-control" id="seniority" required />
          </div>
        </div>
        <br/>
        <div class="row">
          <div class="col-md-6">
            <h5>First Name:</h5>
            <input type="text" class="form-control"  required />
          </div>
          <br/>
          <div class="col-md-6">
            <h5>Last Name:</h5>
            <input type="text" class="form-control"  required />
          </div>
        </div>
      <br />
        <button id="staff_btn" name="staff_btn" type="button" class="btn btn-outline-info">
          Add Shift
          <i class="fas fa-plus-circle"></i>
        </button>
        <br/>
        <div id="staffbox">
          <br/>
          <div class="row">
            <div class="col">
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
            <div class="col">
              <h5>Primary Job:</h5>
              <input type="text" class="form-control" name="primaryJob" id="primaryJob" />
            </div>
          </div>

          <br/>

          <div class="form-group">
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
