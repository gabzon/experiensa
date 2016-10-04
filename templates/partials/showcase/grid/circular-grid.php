<?php
if(!empty($data)):
?>
<div class="ui grid container">
<?php
foreach($data as $value):
    $textimage_option->setInfo($value['title'], $value['subtitle'],$value['image_url']);
?>
  <div class="four wide column">
    <div class="ui center aligned vertical segment">
        <div class="ui small circular image">
        <?php
        if($textimage_option->getDisplayOverlay()):
        ?>
            <div class="ui dimmer" style="padding: 5px 5px 5px 5px;">
                <div class="<?= $textimage_option->getVerticalAlignment();?> content" style="<?= $textimage_option->getHorizontalAlignment();?>">
                    <div class="center">
                        <div class="header" style="<?= $textimage_option->getTextStyle();?>"><?= $textimage_option->getTitle();?></div>
                        <br>
                        <div class="description"><?= $textimage_option->getSubtitle();?></div>
                    </div>
                </div>
            </div>
        <?php
        endif;
        ?>
            <img src="<?= $value['image_url'];?>" style="margin: auto;" alt="<?= $textimage_option->getTitle();?>">
        </div>
        
    </div>
    <?php
    if(!$textimage_option->getDisplayOverlay()):
    ?>
    <div class="ui  vertical segment">
        <div class="ui center aligned header" style="<?= $textimage_option->getTextStyle();?>"><?= $value['title'];?></div>
    </div>
    <div class="ui vertical center aligned segment"><?= $value['subtitle'];?></div>
    <?php
    endif;
    ?>
  </div>
<?php
endforeach;
?>
</div>
<?php
endif;