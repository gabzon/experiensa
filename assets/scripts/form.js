function requestForm(){
    // Form
    var frominput = $('#departure').pickadate({
        min: 1
    });
    var toinput = $('#return').pickadate();

    var frompicker = frominput.pickadate('picker');
    var topicker = toinput.pickadate('picker');

    if (frompicker.get('value')) {
        topicker.set('min', frompicker.get('select'));
    }
    if (topicker.get('value')) {
        frompicker.set('max', topicker.get('select'));
    }

    frompicker.on('set', function (event) {
        console.log(event);
        if (event.select) {
            topicker.set('min', frompicker.get('select'));
        }
    });

    topicker.on('set', function (event) {
        if (event.select) {
            frompicker.set('max', topicker.get('select'));
        }
    });

    $('.ui .checkbox').checkbox();

    $('select.dropdown').dropdown();
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

    // // slider call
    $('#price-slider').slider({
        range: true,
        min: 0,
        max: 8000,
        values: [ 500, 5000 ],
        step: 50,
        slide: function(event, ui) {
            $('#budget').val("CHF" + ui.values[ 0 ] + " - CHF" + ui.values[ 1 ]);
            $('.ui-slider-handle:eq(0) .price-range-min').html('CHF ' + ui.values[ 0 ]);
            $('.ui-slider-handle:eq(1) .price-range-max').html('CHF ' + ui.values[ 1 ]);
            $('.price-range-both').html('<i>CHF ' + ui.values[ 0 ] + ' - </i>CHF ' + ui.values[ 1 ] );

            if ( ui.values[0] === ui.values[1] ) {
                $('.price-range-both i').css('display', 'none');
            } else {
                $('.price-range-both i').css('display', 'inline');
            }

            if (collision($('.price-range-min'), $('.price-range-max')) === true) {
                $('.price-range-min, .price-range-max').css('opacity', '0');
                $('.price-range-both').css('display', 'block');
            } else {
                $('.price-range-min, .price-range-max').css('opacity', '1');
                $('.price-range-both').css('display', 'none');
            }
        },
    });

    $( "#budget" ).val( "CHF" + $( "#price-slider" ).slider( 'values', 0 ) + " - CHF" + $( "#price-slider" ).slider( 'values', 1 ) );

    $('.ui-slider-range').append('<span class="price-range-both value"><i>CHF' + $('#price-slider').slider('values', 0 ) + ' - </i>' + $('#price-slider').slider('values', 1 ) + '</span>');

    $('.ui-slider-handle:eq(0)').append('<span class="price-range-min value">CHF ' + $('#price-slider').slider('values', 0 ) + '</span>');

    $('.ui-slider-handle:eq(1)').append('<span class="price-range-max value">CHF ' + $('#price-slider').slider('values', 1 ) + '</span>');

}
