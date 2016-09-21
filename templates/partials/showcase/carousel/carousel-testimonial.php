<?php
if(!empty($data)):
?>
<script type="text/javascript">
    jQuery(function() {
        jQuery(".testimonial-carousel").owlCarousel({
            autoPlay: 3000,
            loop:true,
            items: 1,
            stopOnHover:true,
            nav : true,
            navText: [
                "<i class='angle left big icon'></i>",
                "<i class='angle right big icon'></i>"
            ]
        });
    });
</script>
    <!-- Testimonial Carousel Component -->
    <div class="owl-carousel owl-theme testimonial-carousel">
        <?php
        foreach($data as $value):
        ?>
        <div class="item">
            <div class="ui two column centered grid">
                <div class="row">
                    <div class="center aligned column">
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
<?php
endif;
