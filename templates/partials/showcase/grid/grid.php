<?php
if(!empty($data)):
?>
    <!-- Grid Component -->
    <div class="ui grid">
    <?php
    foreach($data as $value):
    ?>
        <div class="four wide column">
            <a href="<?=$value['post_link'];?>" target="_blank">
                <div class="ui raised segments">
                    <div class="ui segment"><?=$value['title'];?></div>
                    <div class="ui secondary segment">
                        <img src="<?=$value['thumbnail_url'];?>">
                    </div>
                </div>
            </a>
        </div>
    <?php
    endforeach;
    ?>
    </div>
<?php
endif;