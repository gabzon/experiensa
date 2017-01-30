<!-- React component to show Catalog-->
<?php

    if(!isset($type)){
        $type = 'minimalist';
    }
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
        ></div>
<?php
    endif;
?>
<div id="catalog-app"></div>