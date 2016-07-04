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
]

$('#date-input').datepicker({
    beforeShowDay: function(date){
        var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
        return [ fundedDates.indexOf(string) == -1 ]
    }
  
});

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

$("input[data-type='date']").datepicker({
  showButtonPanel: false,
  autoclose: true,
  closeText: 'OK',
  onSelect: function(date, inst) {
    changeMaterialHeader(headerHtml,moment(date, 'MM/DD/YYYY'));
  },
});

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



