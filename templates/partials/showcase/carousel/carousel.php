<?php
if(!empty($data)):
?>
    <!-- Carousel Component -->
    <div class="owl-carousel">
    <?php
    foreach($data as $value):
        $textimage_option->setInfo($value['title'], $value['subtitle'],$value['image_url']);
    ?>
        <div class="carousel-component">
            <a href="<?=$value['post_link'];?>" target="_blank">
                <?php $textimage_option->displayTextimage();?>
            </a>
        </div>
    <?php
    endforeach;
    ?>
    </div>
<?php
endif;

