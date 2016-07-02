<?php
$display_logo = \Components\Footer\Footer::getIfDisplayLogo();
$agency_options = get_option('agency_settings');
$logo = $agency_options['agency_logo'];

if($logo && $display_logo == 'true'):?>
<div class="item">
  <br>
  <img class="ui <?= \Components\Footer\Footer::getLogoSize();?> image logo" src="<?= wp_get_attachment_url($logo);?>"/>
<?php else: ?>
  <div class="content">
    <h1><?= bloginfo('name'); ?></h1>
    <?php if(\Components\Footer\Footer::getIfDisplayTagline()): ?>
    <div class="meta">
      <span><?= get_bloginfo('description');?></span>
    </div>
    <?php endif; ?>
  </div>
<?php endif; ?>
</div>
