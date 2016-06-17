function requestForm(){
    var currentDate = new Date();
    // Form
    jQuery( "#departure" ).datepicker({
        setDate: currentDate,
        onClose: function( selectedDate ) {
            jQuery( "#return" ).datepicker( "option", "minDate", selectedDate );
        }
    });
    jQuery( "#return" ).datepicker({
        onClose: function( selectedDate ) {
            var departure_date = jQuery( "#departure" ).val();
            /*if(departure_date.length === 0 ) {
                jQuery("#departure").datepicker("option", "maxDate", 0);
            }else {*/
                jQuery("#departure").datepicker("option", "maxDate", selectedDate);
            //}
        }
    });

    jQuery('.ui .checkbox').checkbox();

    jQuery('select.dropdown').dropdown();

    // Slider --------------------
    function collision($div1, $div2) {
        var x1 = $div1.offset().left;
        var w1 = 40;
        var r1 = x1 + w1;
        var x2 = $div2.offset().left;
        var w2 = 40;
        var r2 = x2 + w2;

        if (r1 < x2 || x1 > r2){
            return false;
        }
        return true;
    }
    var currency = 'CHF';
    function get_currency(){
      var result="";
      jQuery.ajax({
        type:"POST",
        url: sage_vars.ajaxurl,
        data: {action: "currency"},
        dataType: "html",
        async: false,
        success:function(data){
            result = data;
        },
        error: function() {
            result = "CHF";
        }
      });
      return result;
    }
    currency = get_currency();
    currency = currency.slice(0, -1);
    // // slider call
    jQuery('#price-slider').slider({
        range: true,
        min: 0,
        max: 8000,
        values: [ 500, 5000 ],
        step: 50,
        slide: function(event, ui) {
            jQuery('#budget').val(currency + ui.values[ 0 ] + " - "+currency + ui.values[ 1 ]);
            jQuery('.ui-slider-handle:eq(0) .price-range-min').html(currency+' ' + ui.values[ 0 ]);
            jQuery('.ui-slider-handle:eq(1) .price-range-max').html(currency+' ' + ui.values[ 1 ]);
            jQuery('.price-range-both').html('<i>'+currency+' ' + ui.values[ 0 ] + ' - </i>'+currency+' ' + ui.values[ 1 ] );

            if ( ui.values[0] === ui.values[1] ) {
                jQuery('.price-range-both i').css('display', 'none');
            } else {
                jQuery('.price-range-both i').css('display', 'inline');
            }

            if (collision(jQuery('.price-range-min'), jQuery('.price-range-max')) === true) {
                jQuery('.price-range-min, .price-range-max').css('opacity', '0');
                jQuery('.price-range-both').css('display', 'block');
            } else {
                jQuery('.price-range-min, .price-range-max').css('opacity', '1');
                jQuery('.price-range-both').css('display', 'none');
            }
        },
    });

    jQuery( "#budget" ).val( currency + jQuery( "#price-slider" ).slider( 'values', 0 ) + " - "+ currency + jQuery( "#price-slider" ).slider( 'values', 1 ) );

    jQuery('.ui-slider-range').append('<span class="price-range-both value"><i>'+currency + jQuery('#price-slider').slider('values', 0 ) + ' - </i>' + jQuery('#price-slider').slider('values', 1 ) + '</span>');

    jQuery('.ui-slider-handle:eq(0)').append('<span class="price-range-min value">'+currency+' ' + jQuery('#price-slider').slider('values', 0 ) + '</span>');

    jQuery('.ui-slider-handle:eq(1)').append('<span class="price-range-max value">'+currency+' ' + jQuery('#price-slider').slider('values', 1 ) + '</span>');

}
