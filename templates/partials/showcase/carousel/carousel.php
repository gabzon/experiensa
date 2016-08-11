<?php
if(!empty($data)):
?>
    <!-- Carousel Component -->
    <div class="owl-carousel">
    <?php
    foreach($data as $value):
        $textimage_option->setInfo($value['title'], $value['subtitle']);
    ?>
        <div class="carousel-component">
            <a href="<?=$value['post_link'];?>" target="_blank">
<!--                <div class="overlay"></div>-->
                <div class="ui image">
                    <?php $textimage_option->displayTextimage();?>
                    <img src="<?=$value['image_url'];?>" alt=""/>
                </div>
            </a>
        </div>
    <?php
    endforeach;
    ?>
    </div>
<?php
endif;

