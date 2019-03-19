<?php

foreach(range('A', 'D') as $char) {
  if ($char == $s->shift){
    $active = 'active';
  } else {
    $active = '';
  }
  $id = $s->id;
  ?>
  <a class="dropdown-item {{ $active }}" href="{{action('ShiftController@updateShift', [$s->id, $char])}}">{{$char}}</a>
<?php } ?>
