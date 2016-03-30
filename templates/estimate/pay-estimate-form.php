<div class="ui grid">
      <div class="row">
        <div class="column">
          <div class="ui raised segment">
            <a class="ui red ribbon label"><?= __('Estimate Information','sage');?></a>
            <p>
              <strong><?= $titles[$i].': ';?></strong><?= $slogans[$i];?>
              <br>
              <?= 'Conditions: '.$conditions[$i];?>
              <br>
              <?= 'Peoples by offer: '.$peoples[$i].' Days: '.$number_days[$i]." <i class=\"sun icon\"></i> Nights: ".$number_days[$i]." <i class=\"moon icon\"></i>";?>
              <br>
              <?= '<strong>Price: '.$prices[$i] . ' ' . $currencies[$i].'</strong>';?>
            </p>
            <!--<a class="ui blue ribbon label"><?= __('Flight & Accommodation','sage');?></a>
            <p>
              
            </p>-->
          </div>
        </div>
        
      </div>
    </div>
<form action="" class="ui form" method="POST" id="payment-form<?= $i;?>">
  <div id="payment-estimate-error-msg" class="ui negative message" style="display: none;">
    <div class="header">
      <?= __('We\'re sorry we can\'t process your payment','sage');?>
    </div>
    <div id="payment-estimate-error<?= $i;?>">
    </div>
  </div>
    <span class="payment-response<?= $i;?>"></span>
    
    <h4 class="ui dividing header"><?= __('Contact Information','sage');?></h4>
    <div class="fields">
      <div class="seven wide field">
          <div class="ui left icon input fluid">
              <input name="fullname" type="text" placeholder="Full name" required="">
              <i class="user icon"></i>
          </div>
      </div>
      <div class="five wide field">
          <div class="ui left icon input fluid">
              <input name="email" type="text" placeholder="Email" required="">
              <i class="envelope icon"></i>
          </div>
      </div>
      <div class="four wide field">
          <div class="ui left icon input fluid">
              <input name="phone" type="text" placeholder="Phone" required="">
              <i class="call icon"></i>
          </div>
      </div>
    </div>
    <h4 class="ui dividing header"><?= __('Billing Information','sage');?></h4>
    <div class="fields">
      <div class="seven wide field">
        <label>Card Number</label>
        <input type="text" name="card-number" maxlength="20" placeholder="Card #" data-stripe="number">
      </div>
      <div class="three wide field">
        <label>CVC</label>
        <input type="text" name="card-cvc" maxlength="4" placeholder="CVC" data-stripe="cvc">
      </div>
      <div class="six wide field">
        <label>Expiration</label>
        <div class="two fields">
          <div class="field">
            <select class="ui fluid search dropdown" name="card-expire-month" data-stripe="exp-month">
              <option value=""><?= __('Month','sage');?></option>
              <option value="1"><?= __('January','sage');?></option>
              <option value="2"><?= __('February','sage');?></option>
              <option value="3"><?= __('March','sage');?></option>
              <option value="4"><?= __('April','sage');?></option>
              <option value="5"><?= __('May','sage');?></option>
              <option value="6"><?= __('June','sage');?></option>
              <option value="7"><?= __('July','sage');?></option>
              <option value="8"><?= __('August','sage');?></option>
              <option value="9"><?= __('September','sage');?></option>
              <option value="10"><?= __('October','sage');?></option>
              <option value="11"><?= __('November','sage');?></option>
              <option value="12"><?= __('December','sage');?></option>
            </select>
          </div>
          <div class="field">
            <input type="text" name="card-expire-year" maxlength="4" placeholder="Year" data-stripe="exp-year">
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" name="action" value="requestEstimate"/>
    <input type="hidden" name="estimate_voyage" value="<?= $titles[$i];?>"/>
    <input type="hidden" name="price" value="<?= $prices[$i];?>"/>
    <input type="hidden" name="currency" value="<?= $currencies[$i];?>"/>
    <input type="hidden" name="estimate_url" value="<?= get_permalink($post->ID);?>"/>
    <input type="hidden" name="agency_email" value="<?= $agency_email;?>"/>
    <button type="submit" class="ui positive right labeled icon button">
      <?= __('Pay it!','sage');?>
      <i class="checkmark icon"></i>
    </button>
  </form>