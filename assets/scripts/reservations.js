function getReservationUnableDates(callback){
    jQuery.ajax({
        type:"POST",
        url: sage_vars.ajaxurl,
        data:{
            'action': 'get_reservation_unable_dates'
        },
        async: false,
        success:function(response){
            callback(response.dates);
        },
        error: function(request, error) {
            console.log("Request: " + JSON.stringify(request));
            console.log("Error: " + JSON.stringify(error));
        }
    });
}
function getDisabledDates(dates){
    var dateRange = [];
    var tam = dates.length;
    var end_date;
    var new_date;
    for(var i = 0; i<tam; i++){
        end_date = new Date(dates[i].end_date);
        for(var d = new Date(dates[i].start_date); d <= end_date; d.setDate(d.getDate() + 1)){
            new_date = jQuery.datepicker.formatDate('yy-mm-dd', d);
            dateRange.push(new_date);
        }
    }
    return dateRange;
}
function reservation_datepicker(){
    var unable_dates = [];
    getReservationUnableDates(function(response){
        unable_dates = response;
    });
    var dates_to_disable = getDisabledDates(unable_dates);
    jQuery('#reservation_datepicker').datepicker({
        inline : true,
        // changeMonth: true,
        // changeYear: true,
        firstDay: 1,
        minDate: -20,
        altField : '#reservation_date',
        dateFormat: 'dd/mm/yy',
        beforeShowDay: function (date) {
            var dateString = jQuery.datepicker.formatDate('yy-mm-dd', date);
            return [dates_to_disable.indexOf(dateString) === -1];
        }
    });
    jQuery('#reservation_start').datepicker({
        // changeMonth: true,
        // changeYear: true,
        firstDay: 1,
        minDate: -20,
        dateFormat: 'dd/mm/yy',
        beforeShowDay: function (date) {
            var dateString = jQuery.datepicker.formatDate('yy-mm-dd', date);
            return [dates_to_disable.indexOf(dateString) === -1];
        },
	onSelect: function () {
	    var dt2 = jQuery('#reservation_end');
            var startDate = jQuery(this).datepicker('getDate');
	    dt2.datepicker('setDate', startDate);
	    dt2.datepicker('option', 'minDate', startDate);
	}
    });
    jQuery('#reservation_end').datepicker({
        // changeMonth: true,
        // changeYear: true,
        firstDay: 1,
        minDate: -20,
        dateFormat: 'dd/mm/yy',
        beforeShowDay: function (date) {
            var dateString = jQuery.datepicker.formatDate('yy-mm-dd', date);
            return [dates_to_disable.indexOf(dateString) === -1];
        }
    });
    if(jQuery('.villa-blanca').length>0){
        jQuery("#ui-datepicker-div").addClass("villa-blanca");

    }
    jQuery('#checkin_timepicker').wickedpicker({title:'Check-In'});
    jQuery('#checkout_timepicker').wickedpicker({
        title:'Check-Out'
    });
}
function ajaxSubmitReservation(){
  var newRequest = jQuery(this).serialize();
  jQuery.ajax({
      type:"POST",
      url: sage_vars.ajaxurl,
      data: newRequest,
      success:function(data){
          jQuery("#reservationFeedback").html(data);
          jQuery("#reservationFeedback").show(1000).delay(2000).fadeOut();
      },
      error: function(request, error) {
          console.log("Request: " + JSON.stringify(request));
          console.log("Error: " + JSON.stringify(error));
      }
  });
  return false;
}
function sendReservation(){
  ajaxSubmitReservation();
  jQuery('#newReservation').submit(ajaxSubmitReservation);
}
                
