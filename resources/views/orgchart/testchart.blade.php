<?php
    $grouped = $shifts->groupBy('shift');
    $grouped->toArray();
?>

<a href="{{action('ShiftController@export')}}">Link name/Embedded Button</a>
<div class="container">

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
                              {{$grouped['A'][$a]->clockNumber}}
  														{{$grouped['A'][$a]->firstName}}
  														{{$grouped['A'][$a]->lastName}}
  													@endif
  												</td>

  												<td>
  													@if ($b > 0)
                              {{$grouped['B'][$b]->clockNumber}}
  														{{$grouped['B'][$b]->firstName}}
                              {{$grouped['B'][$b]->lastName}}
  													@endif
  												</td>

  												<td>
  													@if ($c > 0)
  														{{$grouped['C'][$c]->clockNumber}}
                              {{$grouped['C'][$c]->firstName}}
                              {{$grouped['C'][$c]->lastName}}
  													@endif
  												</td>

  												<td>
  													@if ($d > 0)
  														{{$grouped['D'][$d]->clockNumber}}
                              {{$grouped['D'][$d]->firstName}}
                              {{$grouped['D'][$d]->lastName}}
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
</div>
