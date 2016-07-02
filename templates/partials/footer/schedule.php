<?php
  $schedule = \Components\Footer\Footer::getScheduleInfo();
  if($schedule):
?>
<div class="item">
    <?= $schedule; ?>
</div>
<?php endif; ?>
