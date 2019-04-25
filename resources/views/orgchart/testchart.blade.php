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
                 @php ($a = 0)
                 @php ($b = 0)
                 @php ($c = 0)
                 @php ($d = 0)

                 @php ($acount = count($grouped['A']))
  							 @php ($bcount = count($grouped['B']))
  							 @php ($ccount = count($grouped['C']))
  							 @php ($dcount = count($grouped['D']))

  							 @foreach(range('A', 'D') as $char)
  							 	@foreach($grouped["$char"] as $group)
  								@if ($a >= $acount && $b >= $bcount && $c >= $ccount && $d >= $dcount)
  								 <?php break; ?>
  								@endif
  								      <tr>
  												<td>
  													@if ($a < $acount)
                              {{$group->clockNumber}}
  														{{$group->firstName}}
  														{{$group->lastName}}
                              @php($a++)
  													@endif
  												</td>

  												<td>
  													@if ($b < $bcount)
                              {{$grouped['B'][$b]->clockNumber}}
  														{{$grouped['B'][$b]->firstName}}
                              {{$grouped['B'][$b]->lastName}}
                              @php($b++)
  													@endif
  												</td>

  												<td>
  													@if ($c < $ccount)
  														{{$grouped['C'][$c]->clockNumber}}
                              {{$grouped['C'][$c]->firstName}}
                              {{$grouped['C'][$c]->lastName}}
                              @php($c++)
  													@endif
  												</td>

  												<td>
  													@if ($d < $dcount)
  														{{$grouped['D'][$d]->clockNumber}}
                              {{$grouped['D'][$d]->firstName}}
                              {{$grouped['D'][$d]->lastName}}
                              @php($d++)
  													@endif
  												</td>
  								       </tr>
  							@endforeach
  						@endforeach
  				</tbody>
  		</table>
  	</div>
  </div>
</div>
