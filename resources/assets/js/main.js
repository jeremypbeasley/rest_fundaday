var headerHtml = $("#material-header-holder .ui-datepicker-material-header");

var changeMaterialHeader = function(header, date) {
  var year   = date.format('YYYY');
  var month  = date.format('MMM');
  var dayNum = date.format('D');
  var isoDay = date.isoWeekday();
  var weekday = new Array(7);
  weekday[1] = "Monday";
  weekday[2] = "Tuesday";
  weekday[3] = "Wednesday";
  weekday[4] = "Thursday";
  weekday[5] = "Friday";
  weekday[6] = "Saturday";
  weekday[7]=  "Sunday";
  $('.ui-datepicker-material-day', header).text(weekday[isoDay]);
  $('.ui-datepicker-material-year', header).text(year);
  $('.ui-datepicker-material-month', header).text(month);
  $('.ui-datepicker-material-day-num', header).text(dayNum);
};


$.datepicker._selectDateOverload = $.datepicker._selectDate;
$.datepicker._selectDate = function(id, dateStr) {
  var target = $(id);
  var inst = this._getInst(target[0]);
  inst.inline = true;
  $.datepicker._selectDateOverload(id, dateStr);
  inst.inline = false;
  this._updateDatepicker(inst);
  headerHtml.remove();
  $(".ui-datepicker").prepend(headerHtml);
};

$("input[data-type='date']").on("focus", function() {
  $(".ui-datepicker").prepend(headerHtml);
});

changeMaterialHeader(headerHtml, moment());

// changeMaterialHeader(headerHtml, moment());
// $('#date-input').datepicker('show');

// LABEL ANIMATIONS

// $('#date-input').on('click', function() {
//   alert("Ewrty")
// });

$(document).ready(function() {
  $('input').each(function() {
    $(this).on('focus', function() {
      $(this).parent('.FormRow').addClass('active');
    });
    $(this).on('blur', function() {
      if ($(this).val().length == 0) {
        $(this).parent('.FormRow').removeClass('active');
      }
    });
    if ($(this).val() != '') $(this).parent('.FormRow').addClass('active');
  });
});

$(document).ready(function() {
  $(".ui-datepicker").css('margin-left', '0px', 'margin-top', '0px');
});

$('#date-input').bind('focusin focus', function(e){
  e.preventDefault();
})

$.extend($.datepicker, { _checkOffset: function(inst, offset, isFixed) { return offset } });

// DYNAMIC HEADLINE:

// var currentTime = new Date();
// var month = currentTime.getMonth() + 1;
// var day = currentTime.getDate();
// var year = currentTime.getFullYear();
// var today = month + "/" + day + "/" + year;

// if(dateCheck("1/1/1900","10/1/2016", today))
//   $(".WeNeedYourHelp").html("Next month, we open our Emergency Receiving Center and we need your help.");

// if(dateCheck("10/1/2016","10/31/2016", today))
//   $(".WeNeedYourHelp").html("This month, we opened our Emergency Receiving Center and we need your help.");

// if(dateCheck("10/31/16","11/30/2016", today))
//   $(".WeNeedYourHelp").html("Last month, we opened our Emergency Receiving Center and we need your help.");

// if(dateCheck("11/30/16","1/1/3000", today))
//   $(".WeNeedYourHelp").html("This August, we opened our Emergency Receiving Center and we need your help.");

// function dateCheck(from,to,check) {
//   var fDate,lDate,cDate;
//   fDate = Date.parse(from);
//   lDate = Date.parse(to);
//   cDate = Date.parse(check);
//   if((cDate <= lDate && cDate >= fDate)) {
//       return true;
//   }
//   return false;
// }

function displayChosenDay(chosenDay) {
  var chosenDate = moment(chosenDay,'YYYY-MM-DD');
  var chosenDayMsg = '<div class="SansSerif DayDesc ml3 mt3 mr3 mb0">You’ve chosen ' + chosenDate.format('MMMM D, YYYY') + '</div>';
  $(".ChosenDay").html(chosenDayMsg);
}

// PHOTO CAROUSEL

$('.ERCGallery').slick({
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  centerMode: false,
  variableWidth: true
});

/**************************************
  API and DONATE FORM
***************************************/

// Load the API
function getOrdinal(n) {
  var s=["th","st","nd","rd"],
     v=n%100;
  return n+(s[(v-20)%10]||s[v]||s[0]);
}

function api_has_loaded(response){
  //console.log(response);

  // Set the # days have been funded text
  var total = response.total_days;
  $('#js-total-days-funded').text(total);
  $('#js-total-days-funded-next').text(getOrdinal(total+1));

  // build the fundedDates array
  var fundedDates = [];
  var donorNames = {};
  $.each(response.days,function(i,day){
    fundedDates.push(day.day);
    donorNames[day.day] = day.donor_name;
  });

  // start the Datepicker
  $('.DateDiv').datepicker({
    beforeShowDay: function(date){
      var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
      var donor_name = null;
      var is_selectable = true;
      if(fundedDates.indexOf(string) != -1){
        is_selectable = false;
        donor_name = donorNames[string];
      }
      return [is_selectable,"",donor_name];
    },
    dateFormat:'yy-mm-dd',
    minDate:'2016-11-03',
    maxDate:'2017-09-30',
    onChangeMonthYear:function(){
      ga('send','event','Calendar','changed-month');
    },
    onSelect: function(dateText, obj){
      var date = $(this).val();
      $('#date-input').val(date); 
      displayChosenDay(date);
      ga('send','event','Calendar','date-selected',date);
    }
  });

  // Set the next unfunded date
  // if(response.next_unfunded_date){
  //   // get the date from the api response and translate it into moment object
  //   var next_unfunded_date = moment(response.next_unfunded_date,'YYYY-MM-DD');
  //   // set the formatted text string like July 25, 2016
  //   $('#js-next-unfunded-date-formatted').text("The next unfunded day is " + next_unfunded_date.format('MMMM D, YYYY'));
  //   // Set the datepicker date
  //   $('.DateDiv').datepicker('setDate',next_unfunded_date.format('YYYY-MM-DD'));
  //   // Set the input
  //   $('#date-input').val(next_unfunded_date.format('YYYY-MM-DD'));
  // }


}

// Donate Form
var DonateForm = {
  init:function(){
    $('#form-donate').validate({
      errorElement:'div',
      invalidHandler: function(event, validator) {
        // 'this' refers to the form
        var errors = validator.numberOfInvalids();
        /*
        if (errors) {
          var message = errors == 1
            ? 'You missed 1 field. It has been highlighted'
            : 'You missed ' + errors + ' fields. They have been highlighted';
          $("div.error span").html(message);
          $("div.error").show();
        } else {
          $("div.error").hide();
        }*/
        ga('send','event','DonateForm','client-side-invalid','Validation',errors);
      },
      submitHandler:function(f,e){
        DonateForm.submitForm(e);
      }
    });
    this.bindEvents();
  },
  bindEvents:function(){
    $('#form-donate').on('blur','input',this.checkAutofill);
    $('#form-donate').on('change','input',this.checkAutofill);
    $('#form-donate').on('change','#js-checkbox-is-anonymous',this.clickedAnonymous);
  },
  checkAutofill:function(){
    $('#form-donate').find(':-webkit-autofill').each(function(){
      $(this).closest('.FormRow').addClass('active');
    });
  },
  clickedAnonymous:function(){
    var event_name = $(this).is(':checked') ? 'checked' : 'unchecked';
    ga('send','event','Hide my name checkbox',event_name);
  },
  submitForm:function(e){
    e.preventDefault();
    ga('send','event','Donate Form','valid-submission');
    var $form = $('#form-donate');
    $form.addClass('form-is-loading');
    var form_data = $form.serialize();
    $.post('/api/days',form_data,function(response){
      window.location.href = "/thank-you/"+response.id;
    }).fail(function(response){
      //console.log(response);
      $form.removeClass('form-is-loading');
      var error = "There was an error";
      if(response.status == 422){
        // validation errors
        error = "All fields are required";
      }
      if('message' in response.responseJSON){
        error = response.responseJSON.message;
      }
      $('#js-form-response').text(error);
    });
  }
};


$(document).ready(function() {
  // get total num days from API
  $.get('/api/days',null,api_has_loaded);

  // Initialize the Donate Form
  DonateForm.init();
});




