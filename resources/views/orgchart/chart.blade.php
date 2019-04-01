<div class="container">
	<a href="{{action('ShiftController@export')}}">Link name/Embedded Button</a>
<div class="row">
	@foreach(range('A', 'D') as $char)
	<div class="col-sm">
  <table class="table table-list-search table table-striped">
      <thead>
          <tr>
            <td>
              {{$char}}
						</td>
          </tr>
      </thead>
      <tbody>
        @php ($stack = array())
        @foreach ($shifts as $shift)
            @if ($char == $shift->shift)
            <tr>
            @php (array_push($stack, $char))
              @if ($stack[0] !== $char)
                @php ($stack = array())
                @php (array_push($stack, $char))
              @endif
              @if (in_array("$shift->primaryJob", $stack))
                <td><strong>{{$shift->clockNumber}}</strong>: {{$shift->firstName}} {{$shift->lastName}}</td>
              @else
              <thead>
								<tr>
                  <td class="jobheader">
                    {{ $shift->primaryJob }}
                  </td>
                </tr>
              </thead>
                <td><strong>{{$shift->clockNumber}}</strong>: {{$shift->firstName}} {{$shift->lastName}}</td>
              @endif
              @if (in_array("$shift->primaryJob", $stack))
              @else
                @php (array_push($stack, $shift->primaryJob))
              @endif
            </tr>
            @endif
          @endforeach
				</tbody>
		</table>
	</div>
  @endforeach
</div>
