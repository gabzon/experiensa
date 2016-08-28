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
        jQuery('#slides').superslides({play:'8000'});
    });
</script>
<div id="slides" class='main-slider'>
    <ul class="slides-container">
        <?php foreach($images as $image):?>
        <li>
            <img src="<?= $image;?>" alt="" class="ui image"/>
            <div class="ui container">
                <div class="ui grid">
                    <div class="twelve wide column" id="slider-text">
                        <h1 class="fitText" style="text-transform:uppercase">xxxxxxxxxx</h1>
                        <h4>mmmmmmmmmmmmmmmmmmmmmmm</h4>
                        <br>
                    </div>
                </div>
            </div>
        </li>
        <?php endforeach;?>
    </ul>
</div>