<?php

foreach(range('A', 'D') as $char) {
  if ($char == $s->shift){
    $active = 'active';
  } else {
    $active = '';
  }
  $id = $s->id;
  ?>
  <a class="dropdown-item {{ $active }}" href="{{action('ScheduleController@updateShift', [$s->id, $char])}}">{{$char}}</a>
<?php } ?>
