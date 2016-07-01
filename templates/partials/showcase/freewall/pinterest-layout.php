<?php
if(!empty($data)):
?>
    <!-- Freewall Pinterest Layout Component -->
    <div id="freewall-pinterest" class="free-wall">
        <?php
        foreach($data as $value):
            $width = rand(250,500);
            if(isset($value['post_link'])):
        ?>
                <a href="<?=$value['post_link'];?>">
            <?php
            endif;
            ?>
            <div class="brick-pinterest">
                <div class="ui image">
                    <div class="ui dimmer">
                        <div class="content">
                            <div class="center">
                                <h2 class="ui inverted header"><?=$value['title'];?></h2>
                                <div class="sub header"><?=$value['subtitle'];?></div>
                            </div>
                        </div>
                    </div>
                    <img src="<?=$value['image_url'];?>" width="100%">
                </div>
                <div class="info-pinterest">
                    <h5><?= $value['title']; ?></h5>
                    <h7><?= $value['subtitle']; ?></h7>
                </div>
            </div>
            <?php
            if(isset($value['post_link'])):
            ?>
                </a>
            <?php
            endif;
            ?>
        <?php
        endforeach;
        ?>
    </div>
<?php
endif;
