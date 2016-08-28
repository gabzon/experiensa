<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 26/08/16
 * Time: 11:13 AM
 */
?>
<script type="text/javascript">
    jQuery(function() {
        jQuery('.voyage-slider').vegas({
            overlay: '<?= $overlay;?>',
            slides: [
                <?php foreach($images as $img):?>
                { src: '<?=$img;?>' },
                <?php endforeach;?>
            ]
        });
    });
</script>
<div class="voyage-slider main-slider" style="height:100vh;">
    <div class="ui container">
        <br><br>
        <div id="preview" class="ui container">
            <div class="ui grid stackable">
                <div class="computer only row">
                    <div class="ui grid">
                        <div class="ten wide column">
                            <div>
                                <h1 class="font-white">adasdsaas</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>