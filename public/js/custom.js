$.ajaxSetup({
     headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });

$(document).ready(function() {
  $('#modal').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
  });

  $("#absence_button").click(function(e){
    console.log(e);
    $('#modal').modal();
  });

  $("#staff_btn").click(function(){
    $("#staffbox").toggle();

    if($('#staffbox').css('display') == 'none')
    {
      $("#primaryJob").prop('required',false);
      $("#shift").prop('required',false);
    } else {
      $("#primaryJob").prop('required',true);
      $("#shift").prop('required',true);
    }
  });

    var activeSystemClass = $('.list-group-item.active');

    //Something is entered into the input
    $('#system-search').keyup( function() {
        var that = this;
        // Look through all table rows
        var tableBody = $('.table-list-search tbody');
        var tableRowsClass = $('.table-list-search tbody tr');
        var collapseClass = $('.collapse-search');

        $('.search-sf').remove();
        tableRowsClass.each( function(i, val) {
            //Avoid case sensitivity
            var rowText = $(val).text().toLowerCase();
            var inputText = $(that).val().toLowerCase();
            if(inputText != '')
            {
                $('.search-query-sf').remove();
            }
            else
            {
                $('.search-query-sf').remove();
            }

            if( rowText.indexOf( inputText ) == -1 )
            {
                //Hide rows
                tableRowsClass.eq(i).hide();
                collapseClass.eq(i).hide();
            }
            else
            {
                $('.search-sf').remove();
                tableRowsClass.eq(i).show();
            }

        });
        //Hide all TR elements if nothing found
        if(tableRowsClass.children(':visible').length == 0)
        {
            tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">No entries found.</td></tr>');
        }
    });
});

$(document).ready(function(){
  $('input[name="emergencycontact"]').mask('(000) 000-0000');
  $('input[name="seniority"]').mask('0000-00-00');
  $('input[name="start_date"]').mask('0000-00-00');

  var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
  $('#start_date').datepicker({
      uiLibrary: 'bootstrap4',
      format: 'yyyy-mm-dd',
      iconsLibrary: 'fontawesome',
      minDate: today,
      maxDate: function () {
          return $('#end_date').val();
      }
  });

  $('#end_date').datepicker({
      uiLibrary: 'bootstrap4',
      format: 'yyyy-mm-dd',
      iconsLibrary: 'fontawesome',
      minDate: function () {
          return $('#start_date').val();
      },
  });

  $('#selected_time').datepicker({
      uiLibrary: 'bootstrap4',
      format: 'yyyy-mm-dd',
      iconsLibrary: 'fontawesome',
      minDate: function () {
          return $('#start_date').val();
      },
  });


  $('#absence_create').click(function() {
      $(function() {
          $.ajax({
              url: '/absence/create',
              type: 'POST',
              data: {
                  'method': 'POST',
                  'clock_number': $('#emp_id').val(),
                  'start_date': $('#start_date').val(),
                  'end_date': $('#end_date').val(),
                  'reason': $('#reason').val()
              },
              success: function(data) {
                $('#modal').modal('hide');
                $("#absence_text").text('Absence added for employee ' + $('#emp_id').val() + ' from ' + $('#start_date').val() + ' to ' + $('#end_date').val());
                $("#added_absence").show();
                $('#modal').on('hidden.bs.modal', function (e) {
                  $(this)
                    .find("input,textarea,select")
                       .val('')
                       .end()
                    .find("input[type=checkbox], input[type=radio]")
                       .prop("checked", "")
                       .end();
                })

              },
              error: function(data) {
                  alert("Please enter a date & reason.");
              }
          });
      });
  });

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

  $('#file').change(function() {
    var i = $(this).prev('label').clone();
    var file = $('#file')[0].files[0].name;
    $(this).prev('label').text(file);
  });

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

  $("#search").keyup(function(){
      var searchText = $(this).val().toLowerCase();
      // Show only matching TR, hide rest of them
      $.each($("#table tbody tr"), function() {
          if($(this).text().toLowerCase().indexOf(searchText) === -1)
             $(this).hide();
          else
             $(this).show();
      });
  });


});
