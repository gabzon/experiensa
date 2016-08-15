<?php $contact = \Components\Footer\Footer::getContactInfo(); ?>
<?php if(!empty($contact)):?>
  <?php if($contact['email']): ?>
  <div class="item">
      <i class="mail icon"></i>
      <div class="content">
          <?= $contact['email'];?>
      </div>
  </div>
  <?php endif;?>
  <?php if($contact['phone']): ?>
  <div class="item">
      <i class="call icon"></i>
      <div class="content">
          <?= $contact['phone'];?>
      </div>
  </div>
  <?php endif;?>
  <?php if($contact['fax']): ?>
  <div class="item">
      <i class="fax icon"></i>
      <div class="content">
          <?= $contact['fax'];?>
      </div>
  </div>
  <?php endif;?>
<?php endif;?>
