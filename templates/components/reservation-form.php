<form class="ui stackable form" type="post" action="" id="newReservation">
    <div class="field">
      <div class="ui left icon input fluid">
        <input type="text" name="fullname" placeholder="<?php _e('Full name','sage'); ?>" required>
        <i class="user icon"></i>
      </div>
    </div>
    <div class="field">
      <div class="ui left icon input fluid">
        <input name="email" type="email" placeholder="<?php _e('Email','sage'); ?>" required/>
        <i class="envelope icon"></i>
      </div>
    </div>
    <div class="fields">
        <div class="field" style="width: 50%;">
            <div class="ui left icon input">
                <input name="reservation_start" id="reservation_start" type="text" class="villa-blanca" placeholder="<?php _e('Start Date','sage'); ?>" required/>
                <i class="calendar icon"></i>
            </div>
        </div>
        <div class="field" style="width: 50%;">
            <div class="ui left icon input">
                <input name="reservation_end" id="reservation_end" type="text" class="villa-blanca" placeholder="<?php _e('End Date','sage'); ?>" required/>
                <i class="calendar icon"></i>
            </div>
        </div>
    </div>
    <div class="field">
      <textarea rows="4" name="comments" placeholder="<?= __('Comments','sage'); ?>"></textarea>
    </div>
    <input type="hidden" name="action" value="requestReservation"/>
    <?php 
    $agency_options = get_option('agency_settings');
    $agency_email = (isset($agency_options['agency_email'])?$agency_options['agency_email']:"");
    $agency_email = ($agency_email=="" || $agency_email==null? "gabriel@sevinci.com":$agency_email);
    $recaptcha = Helpers::getRecaptchaData();
    ?>
    <input type="hidden" name="agency_email" value="<?php echo $agency_email; ?>"/>
    <input type="hidden" id="reservation_date" name="reservation_date">
    <div class="field">
        <div class="g-recaptcha" data-sitekey="<?= $recaptcha['site_key']?>"></div>
    </div>
    <div class="field">
        <input id="form-submit" type="submit" class="ui button pink" value="<?= __('Send a Reservation','sage'); ?>">
    </div>
</form>