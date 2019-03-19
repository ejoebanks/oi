@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-1">
      </div>
      <div class="col-sm">
          <div id='calendar'></div>
        </div>
        <div class="modal hide" id="eventModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Modal body text goes here.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <form id="modalInputs">
                  <input type="hidden" name="event_id" id="event_id" value="" />
                  <input type="hidden" name="ev_id" id="ev_id" value="" />
                  <div class="modal-body mx-3">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <i class="fas fa-times-circle"></i>
                      </button>

                        <h4 id="modalheader">Edit Event</h4>
                        <hr />
                        <div class="form-group">
                          <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <select class="form-control" name="employee" id="employee" required>
                              <option value="01212121212">None</option>
                            @foreach($staff as $mem)
                              <option value="<?= $mem->clockNumber ?>"><?= $mem->firstName. " ".$mem->lastName ?></option>
                            @endforeach
                            </select>
                          </div>
                        </div>

                        <br />
                        <div class="form-group">
                          <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-heading"></i></span>
                            </div>
                              <input type="text" class="form-control" name="title" id="title" required placeholder="Event Title"/>
                          </div>
                        </div>

                        <br />
                        <div class="form-group">
                          <div class="input-group input-group-lg">
                            <input class="form-control" name="selected_time" id="selected_time" required/>
                          </div>
                        </div>
                          </form>
                    </div>

                    <div class="modal-footer">
                        <input type="button" class="btn btn-danger" id="event_remove" value="Remove">
                        <input type="button" class="btn btn-primary" id="event_update" value="Save">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-1">
        </div>

      </div>
        <script>
        $(document).ready(function() {
          $('#editModal').on('hidden.bs.modal', function () {
              $(this).find('form').trigger('reset');
          });

            $('#event_update').click(function(calEvent, delta, revertFunc) {
                $(function() {
                    $.ajax({
                        url: '/calendar',
                        type: 'POST',
                        data: {
                            'method': 'POST',
                            'id': $('#ev_id').val(),
                            'employee': $('#employee').val(),
                            "title": $("#title").val(),
                            'date': $('#selected_time').val()
                        },
                        success: function(data) {
                            location.reload();

                        },
                        error: function(data) {
                            alert($('#title').val() + " | " + $('#ev_id').val());
                        }
                    });
                });
            });

            $('#event_remove').click(function(calEvent, delta, revertFunc) {
                $(function() {
                    $.ajax({
                        url: '/calendar/remove',
                        type: 'POST',
                        data: {
                            'method': 'POST',
                            'id': $('#ev_id').val(),
                        },
                        success: function(data) {
                            location.reload();
                        },
                        error: function(data) {
                            alert($('#title').val() + " | " + $('#ev_id').val());
                        }
                    });
                });
            });

            $('#calendar').fullCalendar({
              @if(Auth::user()->type == 1)
                editable: true,
                selectable: true,
                selectHelper: true,
              @endif
                eventRender: function(eventObj, $el) {
                  $el.popover({
                    title: eventObj.name,
                    //content: eventObj.title,
                    trigger: 'hover',
                    placement: 'top',
                    container: 'body'
                  });
                },
                events: [
                    @foreach($event as $ev) {
                        textColor: 'white',
                        color: '#2370B8',
                        id: '{{ $ev->id }}',
                        title: "{{ $ev->title }}",
                        name: "{{ $ev->firstName}} {{$ev->lastName}}",
                        modalTitle: "{{ $ev->title }}",
                        start: '{{ $ev->date }}',
                        employee: '{{ $ev->employee }}',
                        selected_time: '{{ $ev->date }}'
                    },
                    @endforeach
                ],
                header: {
                    left: 'title',
                    center: '',
                    right: 'month,list prev,today,next'
                },
                @if(Auth::user()->type == 1)
                eventClick: function(calEvent, jsEvent, view) {
                    $('#modalheader').html("Edit Event");
                    $('#event_update').val("Save");
                    $('#event_id').val(calEvent._id);
                    $('#ev_id').val(calEvent.id);
                    $('#employee').val(calEvent.employee);
                    $("#title").val(calEvent.modalTitle);
                    $('#selected_time').val(moment(calEvent.selected_time).format('YYYY-MM-DD'));
                    $('#editModal').modal();
                },
                dayClick: function(calEvent, jsEvent, view, date) {
                  $('#selected_time').val(calEvent.format('YYYY-MM-DD'));
                  $('#modalheader').html("Create Event");
                  $('#event_update').val("Submit");
                  $('#editModal').modal();
                },
                eventDrop: function(calEvent, delta, revertFunc) {
                            $(function() {
                                $.ajax({
                                    url: '/calendar/drop',
                                    type: 'POST',
                                    data: {
                                      'method': 'POST',
                                      'date': calEvent.start.format(),
                                      'ev_id' : calEvent.id }
                                });
                              });
                            }
                  @endif

            });
        });
      </script>
</div>
    </div>
</div>

@endsection
