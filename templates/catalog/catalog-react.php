<!-- React component to show Catalog-->
<?php

    if(!isset($type)){
        $type = 'minimalist';
    }
    $button_bg_color = (isset($button_bg_color)?$button_bg_color:'#fff');
    $button_bg_hover_color = (isset($button_bg_hover_color)?$button_bg_hover_color:'#fff');
    $button_bg_active_color = (isset($button_bg_active_color)?$button_bg_active_color:'#fff');
    if(isset($elements)):
        $title = (strpos($elements,'title')!==false?'title':'');
        $price = (strpos($elements,'price')!==false?'price':'');
        $button = (strpos($elements,'button')!==false?'button':'');
        $location = (strpos($elements,'location')!==false?'location':'');
        $duration = (strpos($elements,'duration')!==false?'duration':'');
        $themes = (strpos($elements,'themes')!==false?'themes':'');
        $country = (strpos($elements,'country')!==false?'country':'');

    ?>
        <div id="catalog-props"
             style="display: none"
             data-type="<?=$type?>"
             data-title="<?= $title?>"
             data-price="<?= $price?>"
             data-button="<?= $button?>"
             data-location="<?= $location?>"
             data-duration="<?= $duration?>"
             data-themes="<?= $themes?>"
             data-country="<?= $country?>"
             data-button_bg_color="<?=$button_bg_color?>"
             data-button_bg_hover_color="<?=$button_bg_hover_color?>"
             data-button_bg_active_color="<?=$button_bg_active_color?>"
        ></div>
<?php
    endif;
?>
<div id="catalog-app"></div>