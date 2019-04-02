<div class="container">
	<a href="{{action('ShiftController@export')}}">Link name/Embedded Button</a>
  <a href="{{action('ShiftController@sendChart')}}">Send Mail</a>

<div class="row">
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
              @if ($stack[0] !== $char)
                @php ($stack = array())
                @php (array_push($stack, $char))
              @endif
              @if (in_array("$shift->primaryJob", $stack))
              <tr>
                <td><strong>{{$shift->clockNumber}}</strong></td>
                <td>{{$shift->firstName}} {{$shift->lastName}}</td>
              </tr>
              @else
              <tr>
                <th class="jobheader" colspan="2">
                   {{ $shift->primaryJob }}
                </th>
              </tr>
                <tr>
                  <td><strong>{{$shift->clockNumber}}</strong></td>
                  <td>{{$shift->firstName}} {{$shift->lastName}}</td>
                </tr>
              @endif
              @if (in_array("$shift->primaryJob", $stack))
              @else
                @php (array_push($stack, $shift->primaryJob))
              @endif
            @endif
          @endforeach
				</tbody>
		</table>
	</div>
  @endforeach
</div>
