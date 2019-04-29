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


//    const allEqual = arr => arr.every( v => v === arr[0] );
//    var shiftA = document.getElementById('shiftA').getAttribute('value');
//    var shiftB = document.getElementById('shiftB').getAttribute('value');
//    var shiftC = document.getElementById('shiftC').getAttribute('value');
//    var shiftD = document.getElementById('shiftD').getAttribute('value');
//    var min = Math.min(shiftA, shiftB, shiftC, shiftD);

//    var alphabet = "ABCD".split("");
//    _.each(alphabet, function(letter) {
//      if (document.getElementById('shift'+letter).getAttribute('value') == min && !allEqual([shiftA, shiftB, shiftC, shiftD])){
        //document.getElementById('shift'+letter).style.backgroundColor = "#CCCC00";
//      } else {
        //document.getElementById('shift'+letter).style.backgroundColor = "#4D8C57";
//      }
//    });

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


  (function(){
  var searchTerm, panelContainerId;
  // Create a new contains that is case insensitive
  $.expr[':'].containsCaseInsensitive = function (n, i, m) {
    return jQuery(n).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
  };

  $('#accordion_search_bar').on('change keyup paste click', function () {
    searchTerm = $(this).val();
    $('#accordion > .panel').each(function () {
      panelContainerId = '#' + $(this).attr('id');
      $(panelContainerId + ':not(:containsCaseInsensitive(' + searchTerm + '))').hide();
      $(panelContainerId + ':containsCaseInsensitive(' + searchTerm + ')').show();
    });
  });
}());
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      $(this).$("#EMP44").collapse('show');
    });

  });
});
