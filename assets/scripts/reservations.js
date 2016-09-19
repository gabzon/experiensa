function reservation_datepicker(){
    //var now = moment();
    //jQuery('#reservation_date').val(now.format('DD/MM/YYYY'));

    /*var rs_datepicker = jQuery('#reservation_datepicker');
     rs_datepicker.datetimepicker({
         inline: true,
         format: 'DD/MM/YYYY',
         icons: {
            previous: 'chevron circle left icon',
            next: 'chevron circle right icon',
         }
     });
     jQuery('th.prev').html('<i class="chevron circle left icon" title="Previous Month"></i>');
     jQuery('th.next').html('<i class="chevron circle right icon" title="Next Month"></i>');
    rs_datepicker.on("dp.change", function (e) {
        var date = e.date;
        jQuery('#reservation_date').val(date.format('DD/MM/YYYY'));
            //$('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
     var dt_class = rs_datepicker.find('.datepicker');
     if(dt_class.length>0){
         dt_class.addClass('bt-datepicker');
     }
     var body_class = jQuery('body').attr('class');
     */
     /*if(body_class.indexOf('page-template-villa-blanca') !== -1){
         console.log('entro aqui');
         jQuery('.month.active').addClass('pink-active');
         jQuery('.day.active').addClass('pink-active');
     }*/
    
    jQuery('#reservation_datepicker').datepicker({
        inline : true,
        // changeMonth: true,
        // changeYear: true,
        // showAnim: 'slideDown',
        firstDay: 1,
        minDate: -20,
        altField : '#reservation_date',
        dateFormat: 'dd/mm/yy'
    });
    //jQuery('#checkin_timepicker').datetimepicker({format: 'LT'});
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

                