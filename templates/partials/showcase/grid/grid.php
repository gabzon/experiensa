<?php
if(!empty($data)):
?>
    <!-- Grid Component -->
    <div class="ui grid">
    <?php
    foreach($data as $value):
        $textimage_option->setInfo($value['title'], $value['subtitle'],$value['image_url']);
    ?>
        <div class="four wide column">
            <div class="ui raised segments">
            <?php
            if($textimage_option->getDisplayTextImage()):?>
                <div class="ui secondary segment" style="padding: 0;background-color: transparent;">
                    <a href="<?=$value['post_link'];?>" class="image" target="_blank">
                        <?php $textimage_option->displayTextimage();?>
                    </a>
                </div>
            <?php
            else:
            ?>
                <div class="ui center aligned segment">
                    <div class="content">
                        <div class="header" style="color:#000;">
                            <?=$value['title'];?>
                        </div>
                    </div>
                </div>
                <div class="ui secondary segment" style="padding: 0;background-color: transparent;">
                    <a href="<?=$value['post_link'];?>" class="image" target="_blank">
                        <img src="<?=$value['image_url'];?>" style="width: 100%;height: 100%;">
                    </a>
                </div>
                <?php
                if (!empty($value['subtitle'])):
                ?>
                <div class="ui secondary center aligned segment">
                    <div class="content">
                        <?=$value['subtitle'];?>
                    </div>
                </div>
                <?php
                endif;
                ?>
            <?php
            endif;
            ?>
            </div>
        </div>
    <?php
    endforeach;
    ?>
    </div>
<?php
endif;