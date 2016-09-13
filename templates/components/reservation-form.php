<form class="ui form" type="post" action="" id="newReservation">
    <div class="field">
      <div class="ui left icon input fluid">
        <input type="text" name="fullname" placeholder="<?php _e('Full name','sage'); ?>" required>
        <i class="user icon"></i>
      </div>
    </div>
    <div class="field">
      <div class="ui left icon input fluid">
        <input name="email" type="text" placeholder="<?php _e('Email','sage'); ?>" required/>
        <i class="envelope icon"></i>
      </div>
    </div>
    <div class="fields">
      <div class="field">
        <input name="checkin" id="checkin_timepicker" type="text" placeholder="<?php _e('Check-In','sage'); ?>" required/>
      </div>
      <div class="field">
        <input name="checkout" id="checkout_timepicker" type="text" placeholder="<?php _e('Check-Out','sage'); ?>" required/>
      </div>
    </div>
    <div class="field">
      <textarea rows="4" name="comments" placeholder="<?= __('Comments','sage'); ?>"></textarea>
    </div>
    <input type="hidden" name="action" value="requestReservation"/>
    <?php 
    $agency_options = get_option('agency_settings');
    $agency_email = $agency_options['agency_email'];
    $agency_email = ($agency_email=="" || $agency_email==null? "gabriel@sevinci.com":$agency_email);
    ?>
    <input type="hidden" name="agency_email" value="<?php echo $agency_email; ?>"/>
    <input type="hidden" id="reservation_date" name="reservation_date">
    <input id="form-submit" type="submit" class="ui button pink" value="<?= __('Send a Reservation','sage'); ?>">
</form>