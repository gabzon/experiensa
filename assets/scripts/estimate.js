
function ajaxSubmitEstimate(estimate_number) {
    var form = jQuery('#payment-form'+estimate_number);
    var estimate_form = jQuery('#payment-form'+estimate_number).serialize();
    console.log(estimate_form);
    jQuery.ajax({
        type:"POST",
        url: sage_vars.ajaxurl,
        data: estimate_form,
        success:function(data){
            form.find('.payment-response'+estimate_number).text(data);
            //jQuery(".payment-response"+estimate_number).html(data);
        },
        error:function(){
          form.find('.payment-response'+estimate_number).text('Error');
        }
    });
    //return false;
  }

function estimate(estimate_number){
  Stripe.setPublishableKey('pk_test_7pBECRvdmV0Ocb5iBdMXlHjX');
    
  var stripeResponseHandler = function(status, response) {
    var form = jQuery('#payment-form'+estimate_number);
    if (response.error) {
      // Show the errors on the form
      //form.find('.payment-errors').text(response.error.message);
      form.find('#payment-estimate-error').text(response.error.message);
      form.find('#payment-estimate-error-msg').show(1000).delay(3000).fadeOut();
      form.find('button').prop('disabled', false);
    } else {
      // token contains id, last4, and card type
      var token = response.id;
      // Insert the token into the form so it gets submitted to the server
      form.append(jQuery('<input type="hidden" name="stripeToken" />').val(token));
      // and re-submit
      //console.log("vamos a mandar el formulario");
      ajaxSubmitEstimate(estimate_number);
      //form.submit(ajaxSubmitEstimate);
    }
  };
  
  jQuery('#payment-form'+estimate_number).submit(function(event) {
    var form = jQuery('#payment-form'+estimate_number);
    // Disable the submit button to prevent repeated clicks
    form.find('button').prop('disabled', true);
    //alert("enviaste el pago");
    Stripe.card.createToken(form, stripeResponseHandler);
    // Prevent the form from submitting with the default action
    return false;
  });
  
}