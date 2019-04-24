<div class="container">
	<a href="{{action('ShiftController@export')}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Download</a>
	<a href="{{action('ShiftController@sendChart')}}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Email</a>
<div class="row">
	@php ($i = 0)
	@foreach(range('A', 'D') as $char)
	<div class="col-sm">
  <table class="table table-list-search table table-striped">
      <thead>
          <tr>
            <th class="shiftheader" colspan="2">Shift {{$char}}</th>
          </tr>
      </thead>
      <tbody>
        @php ($stack = array())
        @foreach ($shifts as $shift)
            @if ($char == $shift->shift)
            @php (array_push($stack, $char))
						@php ($i++)
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
                <td><strong>{{$i}}</strong></td>
                <td>{{$shift->firstName}} {{ "Smith"}}</td>
              </tr>
              @if (in_array("$shift->primaryJob", $stack))
              @else
                @php (array_push($stack, $shift->primaryJob))
              @endif
            @endif
          @endforeach
				</tbody>
				<?php echo "\n"; ?>
		</table>
	</div>
  @endforeach
</div>
