<?php
if(!empty($args)):
?>
    <!-- Carousel Text Component -->
    <div class="owl-carousel">
    <?php
    foreach($args as $value):
    ?>
        <div class="item">
            <a href="<?=$value['post_link'];?>">
                <h4><?=$value['title'];?></h4><br>
                <p><?=$value['subtitle']?></p><br>

            </a>
        </div>
    <?php
    endforeach;
    ?>
    </div>
<?php
endif;