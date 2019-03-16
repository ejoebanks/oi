$.ajaxSetup({
     headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });

/*
$( document ).ready(function() {
  $('input[name="scheduledtime"]').mask('0000-00-00');
  $('#scheduledtime').datepicker({
      format: 'yyyy-mm-dd',
      uiLibrary: 'bootstrap4'
  });
});
*/

$(document).ready(function() {
    const allEqual = arr => arr.every( v => v === arr[0] );
    var shiftA = document.getElementById('shiftA').getAttribute('value');
    var shiftB = document.getElementById('shiftB').getAttribute('value');
    var shiftC = document.getElementById('shiftC').getAttribute('value');
    var shiftD = document.getElementById('shiftD').getAttribute('value');
    var min = Math.min(shiftA, shiftB, shiftC, shiftD);

    var alphabet = "ABCD".split("");
    _.each(alphabet, function(letter) {
      if (document.getElementById('shift'+letter).getAttribute('value') == min && !allEqual([shiftA, shiftB, shiftC, shiftD])){
        //document.getElementById('shift'+letter).style.backgroundColor = "#CCCC00";
      } else {
        //document.getElementById('shift'+letter).style.backgroundColor = "#4D8C57";
      }
    });

    var activeSystemClass = $('.list-group-item.active');

    //Something is entered into the input
    $('#system-search').keyup( function() {
       var that = this;
        // Look through all table rows
        var tableBody = $('.table-list-search tbody');
        var tableRowsClass = $('.table-list-search tbody tr');
        $('.search-sf').remove();
        tableRowsClass.each( function(i, val) {

            //Avoid case sensitivity
            var rowText = $(val).text().toLowerCase();
            var inputText = $(that).val().toLowerCase();
            if(inputText != '')
            {
                $('.search-query-sf').remove();

                //tableBody.prepend('<tr class="search-query-sf"><td colspan="6"><strong>Searching for: "'
                //    + $(that).val()
                //    + '"</strong></td></tr>');
            }
            else
            {
                $('.search-query-sf').remove();
            }

            if( rowText.indexOf( inputText ) == -1 )
            {
                //Hide rows
                tableRowsClass.eq(i).hide();

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

$.ajaxSetup({
     headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
