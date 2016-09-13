function reservation_datepicker(){
    jQuery('#reservation_datepicker').datepicker({
        inline : true,
        changeMonth: true,
        changeYear: true,
        showAnim: 'slideDown',
        minDate: -20,
        altField : '#reservation_date',
        dateFormat: 'dd/mm/yy'
    });
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

                