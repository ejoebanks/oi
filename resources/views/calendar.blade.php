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
                    <div class="modal-body">
                        <h4 id="modalheader">Edit Event</h4>
                        <hr />
                        Employee
                        <br />
                        <select class="form-control" name="employee" id="employee" required>
                        @foreach($staff as $mem)
                          <option value="<?= $mem->clockNumber ?>"><?= $mem->firstName. " ".$mem->lastName ?></option>
                        @endforeach
                        </select>

                        Event Title
                        <br />
                        <input type="text" class="form-control" name="title" id="title" required>


                        Date:
                        <br />
                            <input type="hidden" value="{{csrf_token()}}" name="_token" />
                            <input id="selected_time" name="selected_time" required/>
                          </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                editable: true,
                selectable: true,
                events: [
                    @foreach($event as $ev) {
                        textColor: 'white',
                        color: '#4183D7',
                        id: '{{ $ev->id }}',
                        title: "{{ $ev->firstName }} {{ $ev->lastName }}\n{{ $ev->title }}",
                        modalTitle: "{{ $ev->title }}",
                        start: '{{ $ev->date }}',
                        employee: '{{ $ev->employee }}',
                        selected_time: '{{ $ev->date }}'
                    },
                    @endforeach
                ],
                header: {
                    left: 'addEventButton prev,next today',
                    center: 'title',
                    right: 'month,list'
                },
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

            });
        });
      </script>
</div>
    </div>
</div>

@endsection
