<?php $social = \Components\Footer\Footer::getSocialNetwork(); ?>
<?php if(!empty($social)):?>
<div class="ui horizontal list">
    <?php if($social['facebook']): ?>
      <a class="ui circular facebook icon button" href="<?= $social['facebook'];?>" target="_blank">
          <i class="facebook icon"></i>
      </a>
    <?php endif;?>
    <?php if($social['gplus']): ?>
      <a class="ui circular google plus icon button" href="<?= $social['gplus'];?>" target="_blank">
          <i class="google plus icon"></i>
      </a>
    <?php endif;?>
    <?php if($social['twitter']): ?>
      <a class="ui circular twitter icon button" href="<?= $social['twitter'];?>" target="_blank">
          <i class="twitter icon"></i>
      </a>
    <?php endif;?>
    <?php if($social['instagram']): ?>
      <a class="ui circular instagram icon button" href="<?= $social['instagram'];?>" target="_blank">
          <i class="instagram icon"></i>
      </a>
    <?php endif;?>
    <?php if($social['linkedin']): ?>
      <a class="ui circular linkedin icon button" href="<?= $social['linkedin'];?>" target="_blank">
          <i class="linkedin icon"></i>
      </a>
    <?php endif;?>
    <?php if($social['pinterest']): ?>
      <a class="ui circular pinterest icon button" href="<?= $social['pinterest'];?>" target="_blank" style="background-color:#CB2027;">
          <i class="pinterest icon"></i>
      </a>
    <?php endif;?>
    <?php if($social['skype']): ?>
      <a class="ui circular skype icon button" href="<?= $social['skype'];?>" target="_blank" style="background-color:#3E9DD7;color:#ffffff;">
          <i class="skype icon"></i>
      </a>
    <?php endif;?>
</div>
<?php endif;?>
