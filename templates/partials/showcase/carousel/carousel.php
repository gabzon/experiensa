<?php
if(!empty($data)):
?>
    <!-- Carousel Component -->
    <div class="owl-carousel">
    <?php
    foreach($data as $value):
    ?>
        <div class="carousel-component">
            <a href="<?=$value['post_link'];?>" target="_blank">
                <div class="overlay"></div>
                <div class="ui image">
                    <h2 class="carousel-title"><?=$value['title'];?></h2>
                    <div class="ui dimmer">
                        <div class="content">
                            <div class="center">
                                <div class="sub header"><?=$value['subtitle'];?></div>
                            </div>
                        </div>
                    </div>
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

