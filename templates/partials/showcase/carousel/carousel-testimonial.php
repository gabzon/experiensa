<?php
if(!empty($data)):
?>
<!-- Testimonial Carousel Component -->
<section id="<?= $name;?>" class="ui vertical segment custom-section <?= $background['color'];?>" style="<?= $background['size'];?>">
    <div class="section-background <?= $background['class'];?>" style="<?= $background['style'];?>"></div>
    <div class="ui <?= $layout['container_class'];?> vertical segment section-content" style="<?= $layout['content_color'];?>">
        <div class="ui <?= $layout['title_alignment']?> header" style="<?= $layout['title_color'];?>">
            <div class="page-header">
                <h1><?= $layout['title'];?></h1>
                <?= (!empty($layout['subtitle'])?"<h3>".$layout['subtitle']."</h3><br>":"");?>
            </div>
        </div>
        <div class="owl-carousel owl-theme testimonial-carousel">
            <?php
            foreach($data as $value):
            ?>
            <div class="item">
                <div class="ui two column middle aligned centered grid">
                    <div class="row">
                        <div class="fifteen wide center aligned column">
                            <br><br>
                            <div class="ui pointing below basic label" style="padding: 1em;">
                                <p>
                                    <em><?=$value['subtitle'];?></em>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="four column centered row">
                        <div class="right aligned column">
                            <div class="ui tiny circular image">
                                <img src="<?=$value['image_url'];?>">
                            </div>
                        </div>
                        <div class="column">
                            <div class="content">
                                <div class="header"><strong><?=$value['title'];?></strong></div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
            </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</section>
<?php
endif;
