<?php $location = \Components\Footer\Footer::getLocationInfo(); ?>
<?php if(!empty($location)):?>
<div class="item">
    <i class="top aligned home icon"></i>
    <div class="content">
        <?= ($location['address']?$location['address']."<br/>":"");?>
        <?= ($location['postal_code']?$location['postal_code']." ":"");?>
        <?= ($location['city']?$location['city']."<br/>":"");?>
        <?= ($location['country']?$location['country']."<br/>":"");?>
    </div>
</div>
<?php endif;?>
