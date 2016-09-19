<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 26/08/16
 * Time: 11:14 AM
 */
?>
<script type="text/javascript">
    jQuery(function() {
        jQuery('#<?= $id;?>').superslides({play:'8000'});
    });
</script>
<section id="<?= $id;?>" class='main-slider'>
    <ul class="slides-container">
        <?php foreach($data as $info):?>
        <li>
            <img src="<?= $info['image'];?>" alt="" class="ui image"/>
            <div class="ui container">
                <div class="ui grid">
                    <div class="twelve wide column" id="slider-text">
                        <h1 class="fitText" style="text-transform:uppercase"><?= $info['title'];?></h1>
                        <h4><?= $info['excerpt'];?></h4>
                        <br>
                        <a href="<?= $info['url'];?>" class="ui huge animated fade inverted button" tabindex="0">
                            <div class="visible content">
                                <?=__('More info', 'sage');?>
                            </div>
                            <div class="hidden content">
                                <?=__('More info', 'sage');?>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </li>
        <?php endforeach;?>
    </ul>
</section>