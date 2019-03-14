@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
        </div>
        <div id='calendar'></div>

        <script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            events : [
                @foreach($event as $ev)
                {
                    title : '{{ $ev->title }}',
                    start : '{{ $ev->date }}',
                    url : '{{ route('events.edit', $ev->id) }}'
                },
                @endforeach
            ],
            header: {
              left: 'prev,next today myCustomButton',
              center: 'title',
              right: 'month,list'
            }

        })
    });
</script>

</div>
    </div>
</div>

@endsection
