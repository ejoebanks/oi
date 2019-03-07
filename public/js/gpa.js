// Resets term form
function resetform() {
  $("#myform")[0].reset();
  $("#show_box").text("0.00");
  $("#cred_box").hide();
  $("#proj_box").hide();
  //$(".grds").toggleClass("show", false);
  var gpa = 0;
  var pastgpa = 0;
  var credtaken = 0;
  var termGPA = 0;
  var credithours = 5;
  var grade = 5;
  var previousgrade = null;
}

// Main function when page is opened
$(document).ready(function() {
  // Adding a new row for the term calculator
  var rowid = 1;
  var rowlimit = 1;

  // Automatically appends 5 courses
  for (rowid = 1; rowid < 4; rowid++) {
    $('#t1').append('<tr id="row' + rowid + '" class="item"><td class="text-center"><div class = "wrapper"><button type="button" name="remove" id="' + rowid + '" class="btn_remove btn">X</button></div></td><td><input name="course" class="form-control" value="" placeholder="Class Name"/></td><td><select id="currentgrade" class="currentgrade amount form-control" ><option id="def1" value="default">Grade</option><option value="4">A</option><option value="3">B</option><option value="2">C</option><option value="1">D</option><option value="0">F</option><option value="0">NCR</option><option value="100">I</option><option value="100">W</option><option value="100">X</option><option value="100">CR</option></select></td><td><select id="credithours" name="credithours" class="amount form-control" type="dropdown"><option id="def" value="default" selected>Hours</option><option value = ".5">.5</option><option value = "1">1</option><option value = "2">2</option><option value = "3">3</option><option value = "4">4</option><option value = "5">5</option><option value = "6">6</option><option value = "7">7</option></select></td><td class="rpt" style="text-align:center;"><input type="checkbox" class="btn_repeat" id="' + rowid + '"><select id="g' + rowid + '" class="grds amount"></select></td><td><input name="total" class="total form-control" id="total1" value="" readonly="readonly" /></td>');
  }

  // Function for adding a row
  $('.addRow').click(function() {
    // Limits the amount of rows that can be added to 8
    if (rowlimit < 4) {
      rowid++;
      rowlimit++;
      var credithours = 0;
      $('#t1').append('<tr id="row' + rowid + '" class="item"><td class="text-center"><div class = "wrapper"><button type="button" name="remove" id="' + rowid + '" class="btn_remove btn">X</button></div></td><td><input name="course" class="form-control" value="" placeholder="Class Name"/></td><td><select id="currentgrade" class="currentgrade amount form-control" ><option id="def1" value="default">Grade</option><option value="4">A</option><option value="3">B</option><option value="2">C</option><option value="1">D</option><option value="0">F</option><option value="0">NCR</option><option value="100">I</option><option value="100">W</option><option value="100">X</option><option value="100">CR</option></select></td><td><select id="credithours" name="credithours" class="amount form-control" type="dropdown"><option id="def" value="default" selected>Hours</option><option value = ".5">.5</option><option value = "1">1</option><option value = "3">3</option><option value = "4">4</option><option value = "5">5</option><option value = "6">6</option><option value = "7">7</option></select></td><td class="rpt" style="text-align:center;"><input type="checkbox" class="btn_repeat" id="' + rowid + '"><select id="g' + rowid + '" class="grds amount"></select></td><td><input name="total" class="total form-control" id="total1" value="" readonly="readonly" /></td>');
      if ($("#cumulative_button").hasClass("focusCumulative")) {
        $('td:nth-child(5),th:nth-child(5)').show();
      }
    } else {
      alert("Maximum course load is limited to 8.");
    }
  });

  // Button to display or hide repeat course dropdown
  $(document).on('click', '.btn_repeat', function() {
    var btnid = $(this).attr("id");
    $("#g" + btnid + '').toggleClass('show');
    $(this).toggleClass("btn_pressed");
    var $select = $("#g" + btnid);
    for (i = 1; i <= 1; i++) {
      $select.empty();
      $select.append($('<option></option>').val("").html("Previous Grade"));
      $select.append($('<option></option>').val("3").html("B"));
      $select.append($('<option></option>').val("2").html("C"));
      $select.append($('<option></option>').val("1").html("D"));
      $select.append($('<option></option>').val("0").html("F"));
      $select.append($('<option></option>').val("NCR").html("NCR"));
      //$select.append($('<option></option>').val("CR").html("CR"));
    }
    calcAll();
  });

  // Removing a specific row for term calculator
  $(document).on('click', '.btn_remove', function() {
    var button_id = $(this).attr("id");
    $('#row' + button_id + '').remove();
    rowlimit--;
    calcAll();
  });

  // Event triggers (change) for the main calculations
  $(document).on("change", ".amount", calcAll);
  $(document).on("change", ".amt", calcCourse);
});

// Function for the term, cumulative, and projection calculator
function calcAll() {

  // Variables for term calculation
  var gpa = 0;
  var grade = 5;
  var credithours = 5;
  var previousgrade = null;
  var tempGrade = 5;

  // Variables for the cumulative calculation
  var pastgradeval = 0;
  var pastgpa = 0;
  var credtaken = 0;

  // Variables for the projection calculation
  var credleft = 0;
  var targetgpa = 0;
  var totcreds = 0;

  // Variables for output
  var rowTotal = 1;
  var totalcredits = 0;
  var termCredits = 0;
  var termGPA = 0;
  var testerNum = 500;
  var work = null;
  var termSum = 0;

  if (!isNaN(parseFloat($('#pastgpa').val()))) {
    pastgpa = parseFloat($('#pastgpa').val());
  }

  if (!isNaN(parseFloat($('#credtaken').val()))) {
    credtaken = parseFloat($('#credtaken').val());
  }

  if (!isNaN(parseFloat($('#targetgpa').val()))) {
    targetgpa = parseFloat($('#targetgpa').val());
  }
  if (!isNaN(parseFloat($('#credleft').val()))) {
    credleft = parseFloat($('#credleft').val());
  }

  $(".item").each(function() {
    if (!isNaN(parseFloat($(this).find("#credithours").val()))) {
      credithours = parseFloat($(this).find("#credithours").val());
    }

    if (!isNaN(parseFloat($(this).find("#currentgrade").val()))) {
      tempGrade = parseFloat($(this).find("#currentgrade").val());
      testerNum = $(this).find(".btn_repeat").attr('id');

      if (!isNaN(parseFloat($("#g" + testerNum + '').val()))) {
        previousgrade = parseFloat($("#g" + testerNum + '').val());
      }
      if (previousgrade > tempGrade && previousgrade !== 5) {
        grade = parseFloat($(this).find("#g" + testerNum + '').val());
      }

      if (tempGrade > previousgrade || previousgrade == null) {
        grade = parseFloat($(this).find("#currentgrade").val());
      }

      if (tempGrade == previousgrade) {
        grade = parseFloat($(this).find("#currentgrade").val());
      }

      //Trigger calculation of minimum for repeat course function,
      //so that the minimum grade is removed between two repeated
      //courses.
      if (previousgrade !== null) {
        work = 50;
      }
    }

    // If values are not set, display nothing
    if (grade == 5 || credithours == 5 || tempGrade == 5 || previousgrade == null) {
      $(this).find(".total").val("");
    }

    //Marks I, W, X, and CR courses as not used in GPA calculation
    if (grade == 100) {
      $(this).find(".total").val("Not used in calculation.");
      credithours = 5;
      grade = 5;
    }

    if (grade !== 5 && credithours !== 5) {

      //Totals credit hours
      if (credtaken == 0 && pastgpa == 0 || credtaken == "foo") {
        totalcredits += credithours;

      //If credits were set in the cumulative function, total
      //it then return to the if, so past credits aren't added repeatedly
      } else {
        totalcredits += (credithours + credtaken);
        pastgradeval = pastgpa * credtaken;
        credtaken = "foo";
      }

      //Total the term credits separate from cumulative
      termCredits += credithours;


      //Remove minimum grade and credit hours from a repeated course
      //so GPA and total credits are displayed correctly.
      if (work == 50 && pastgpa !== 0 && credtaken !== 0) {
        pastgradeval -= (Math.min(tempGrade, previousgrade) * credithours);
        totalcredits -= credithours;
      }

      //Total each row to display quality points at the last column
      rowTotal = grade * credithours;
      $(this).find(".total").val(rowTotal.toFixed(2));

      //Re-set the variables
      credithours = 5;
      grade = 5;
      tempGrade = 5;
      previousgrade = null;
      work = null;
    }
  });

  // Calculates the totals and GPA
  var sum = 0;
  $(".total").each(function() {
    if (!isNaN(this.value) && this.value.length != 0) {
      //  Prevents cumulative credits being added for each new row
      if (pastgpa != "stop") {

        //Cumulative Calculation
        sum += parseFloat(this.value) + pastgradeval;
        gpa = sum / totalcredits;

        // Term Calculation
        termSum += parseFloat(this.value);
        termGPA = termSum / termCredits;

        pastgpa = "stop";
      } else {
        // Cumulative Calculation
        sum += parseFloat(this.value);
        gpa = sum / totalcredits;

        // Term Calculation
        termSum += parseFloat(this.value);
        termGPA = termSum / termCredits;
      }
    }
  });

  //Limit GPA to 4.0
  if (gpa > 4.0) {
    gpa = 4.0;
  }
  // Display the calculated GPA
  if (grade == "x" || credithours == "x") {
    $("#show_box").text(" 0.00");
  } else {
    $("#show_box").text(termGPA.toFixed(2));
    $("#term_cred").text(termCredits.toFixed(2));
    if (!isNaN(parseFloat($('#pastgpa').val()).toFixed(2)) && !isNaN(parseFloat($('#credtaken').val()).toFixed(2)) && termSum !== 0) {
      $("#cred_box").show();
      $("#cred_box").text("Combined with your current term GPA of " + termGPA.toFixed(2) + " and current cumulative GPA of " + parseFloat($('#pastgpa').val()).toFixed(2) + ", your new cumulative GPA will be " + gpa.toFixed(2) + " over " + totalcredits.toFixed(2) + " total credits.");
    } else {
      $("#cred_box").hide();
    }
  }

  // Projection calculation
  if (targetgpa > 0) {
    if (totalcredits !== 0) {
      totcreds += totalcredits + credleft;
      currentgradeval = gpa * totalcredits;
    } else {
      totcreds += credtaken + credleft;
      currentgradeval = pastgpa * credtaken;
    }
    projectedgradeval = totcreds * targetgpa;
    target = targetgpa * credleft;
    achievedgoal = (projectedgradeval - currentgradeval) / credleft;

    // If appplicable values are set, continue
    if (totcreds !== 0 && targetgpa !== 0 && credleft !== 0 && currentgradeval !== 0) {
      $("#proj_box").show();
      if (achievedgoal.toFixed(2) <= 4.0 && achievedgoal.toFixed(2) > 0) {
        if (achievedgoal.toFixed(2) == gpa.toFixed(2)) {
          $("#proj_box").text("To achieve a GPA of " + achievedgoal.toFixed(2) + " you need to maintain your current GPA.  Keep it up!");
          //proj_box.style.background = '#93C572';
          //proj_box.style.borderColor = '#00467f';
        } else {
          $("#proj_box").text("To achieve a GPA of " + targetgpa.toFixed(2) + " you need to maintain a GPA of " + achievedgoal.toFixed(2) + " in your remaining " + credleft + " credits.");
          //proj_box.style.background = '#93C572';
          //proj_box.style.borderColor = '#00467f';
        }
      } else if (achievedgoal.toFixed(2) > 4) {
        $("#proj_box").text("It is not possible to reach a GPA of " + targetgpa.toFixed(2) + ". You would need a GPA of " + achievedgoal.toFixed(2) + ".");
        //proj_box.style.background = '#e6adad';
        //proj_box.style.borderColor = '#00467f';
      } else if (achievedgoal.toFixed(2) < 0) {
        $("#proj_box").text("It is not possible to lower your GPA that much.");
      } else {
        $("#proj_box").text("Something went wrong.");
      }
    }
  }
}

// Course Calculator Functions
$("#err_box").hide(); // Hides the weight warning by default

// Resets course form
function resetCourseForm() {
  document.getElementById("courseForm").reset();
  $("#course_box").text("0.00");
  $("#points_box").text("0.00");
  $("#err_box").hide();
  ctrl = 10;
  tot, points, weight, totalpoints, courseTotal, totweight, final = 0;
}

// Adding a new row
var courseRow = 5;
$('.addRowCourse').click(function() {

  // Limits the amount of rows that can be added to 10
  if (courseRow < 14) {
    courseRow++;
    $('#tcourse').append('<tr id="row' + courseRow + '" class="assignments"><td class="text-center"><div class="wrapper"><button type="button" name="remove" id="' + courseRow + '" class="crs_remove btn">X</button></div></td><td><input class="form-control" name="assignment" id="assignment" placeholder="Assignment Type"></td><td><input name="points" class="points amt form-control" value="" /></td><td><input name="totalpoints" class="totalpoints amt form-control" value="" /></td><td><input name="courseTotal" class="courseTotal form-control" id="courseTotal1" value="" readonly="readonly" /></td>');
    //<td><input name="weight" class="weight amt form-control" value="" /></td>
  } else {
    alert("Maximum amount is limited to 10.");
  }
});

// Removing a specific row
$(document).on('click', '.crs_remove', function() {
  var rmv_id = $(this).attr("id");
  $('#row' + rmv_id + '').remove();
  courseRow--;
  calcCourse();
});

function calcCourse() {
  var tot = 0;
  var ctrl = 10;
  var stop = "yeah";
  //var weight = 0;
  //var totweight = 0;
  var courseTotal = 0;
  var points = 0;
  var totalpoints = 0;

  $(".assignments").each(function() {
    if (!isNaN(parseFloat($(this).find(".points").val()))) {
      points += parseFloat($(this).find(".points").val());
      ctrl = 1;
    }
    if (!isNaN(parseFloat($(this).find(".totalpoints").val())) || stop != "yeah") {
      totalpoints += parseFloat($(this).find(".totalpoints").val());
      ctrl += 4;
      stop = "continue"
    }
    //if (!isNaN(parseFloat($(this).find(".weight").val()))) {
    //weight = parseFloat($(this).find(".weight").val());
    //totweight += weight;
    //  ctrl = 5;
    //}
    if (ctrl == 10 || stop == "yeah") {
      $(this).find(".courseTotal").val("");
    }
    if (ctrl == 5 && stop == "continue") {
      //tot = (points / totalpoints) * weight / 100;
      tot = (points / totalpoints);
      $(this).find(".courseTotal").val(tot.toFixed(2));
    }
    ctrl = 10;

  });

  // Sums the weighted grade then sets it to a percentage
  var summ = 0;
  $(".courseTotal").each(function() {
    if (!isNaN(this.value) && this.value.length != 0 /*&& weight != false*/ ) {
      summ += parseFloat(this.value);
      final = (points / totalpoints) * 100;
    }
    ctrl = 10;
  });

  // Display the calculated course grade
  if (points == "x" || totalpoints == "x") {
    $("#course_box").text("0.00");
    //} else if (totweight > 100) {
    //  $("#err_box").show();
    //  $("#course_box").text("0.0");
  } else {
    //alert("Variable " + points);
    $("#course_box").text(final.toFixed(2) + "%");
    $("#err_box").hide();
    $("#points_box").text(points.toFixed(2) + "/" + totalpoints.toFixed(2));
    ctrl = 10;
    stop = "yeah";
  }

}
