<?php
if(!empty($data)):
?>
    <!-- Grid Component -->
    <div class="ui grid">
    <?php
    foreach($data as $value):
    ?>
        <div class="four wide column">
            <div class="ui raised segments">
                <div class="ui center aligned segment">
                    <div class="content">
                        <div class="header" style="color:#000;">
                            <?=$value['title'];?>
                        </div>
                    </div>
                </div>
                <div class="ui secondary segment">
                    <a href="<?=$value['post_link'];?>" class="image" target="_blank">
                        <img src="<?=$value['thumbnail_url'];?>" style="width: 100%;height: 100%;">
                    </a>
                </div>
                <div class="ui secondary center aligned segment">
                    <div class="content">
                        <?=$value['subtitle'];?>
                    </div>
                </div>
            </div>
            
        </div>
    <?php
    endforeach;
    ?>
    </div>
<?php
endif;