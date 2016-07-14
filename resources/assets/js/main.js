
var fundedDates = [
  "2016-06-14",
  "2016-06-15",
  "2016-06-16",
  "2016-07-14",
  "2016-07-15",
  "2016-07-16",
  "2016-07-01",
  "2016-07-03",
  "2016-07-21",
  "2016-07-01",
  "2016-07-07",
  "2016-07-21",
  "2016-07-25",
  "2016-08-20",
  "2016-08-02",
  "2016-08-25",
];





// onSelect: function(date, obj){
//   $('#date-input').val(date); 
// }

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

var currentTime = new Date();
var month = currentTime.getMonth() + 1;
var day = currentTime.getDate();
var year = currentTime.getFullYear();
var today = month + "/" + day + "/" + year;
// test dates
// var today = "10/1/2016";

if(dateCheck("1/1/1900","08/1/2016", today))
  $(".WeNeedYourHelp").html("Next month, we open our Emergency Care Center and we need your help.");

if(dateCheck("8/1/2016","08/31/2016", today))
  $(".WeNeedYourHelp").html("This month, we opened our Emergency Care Center and we need your help.");

if(dateCheck("8/31/16","9/30/2016", today))
  $(".WeNeedYourHelp").html("Last month, we opened our Emergency Care Center and we need your help.");

if(dateCheck("9/30/16","1/1/3000", today))
  $(".WeNeedYourHelp").html("This August, we opened our Emergency Care Center and we need your help.");

function dateCheck(from,to,check) {
  var fDate,lDate,cDate;
  fDate = Date.parse(from);
  lDate = Date.parse(to);
  cDate = Date.parse(check);
  if((cDate <= lDate && cDate >= fDate)) {
      return true;
  }
  return false;
}

function displayChosenDay(chosenDay) {
  var chosenDayMsg = '<h2 class="SansSerif mb2 mt1">You’ve chosen <br>' + chosenDay + '.</h2><p class="SansSerif op50">This day is currently unfunded.</p>';
  $(".ChosenDay").html(chosenDayMsg);
}

$('.DateDiv').datepicker({
  beforeShowDay: function(date){
    var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
    return [ fundedDates.indexOf(string) == -1,"" ];
    console.log(string);
  },
  dateFormat:'MM dd, yy',
  onSelect: function(dateText, obj){
    $('#date-input').val(dateText); 
  },
  onSelect: function(dateText, obj){
    var date = $(this).val();
    displayChosenDay(date);
    var woahdate = $('.DateDiv').datepicker({ dateFormat: 'mm-dd-yy' }).val();
    console.log(woahdate);
  }
});


// PHOTO CAROUSEL

$('.ERCGallery').slick({
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  centerMode: false,
  variableWidth: true
});
