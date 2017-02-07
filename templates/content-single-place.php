<?php
$agency_options = get_option('agency_settings');
$timezone = $agency_options['agency_timezone'];
date_default_timezone_set($timezone);
?>
<?php while (have_posts()) : the_post(); ?>
    <?php $api_data = (array) json_decode(get_post_meta($post->ID, 'place_api_data', true));?>
    <h1><?php the_title(); ?></h1>
    <div class="ui container">
        <br>
        <br>
        <div class="ui stackable two column grid">
            <div class="two column row">
                <?php
                set_query_var('data',$api_data);
                get_template_part('templates/place/content');
                ?>
                <div class="column">
                    <iframe
                            width="600"
                            height="450"
                            frameborder="0" style="border:0"
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAVNQzi_QzaPGAk-w6d4mq6Qe6lIQ1U6Rk
    &q=place_id:<?= $api_data['place_id'];?>" allowfullscreen>
                    </iframe>
                </div>
            </div>
            <div class="two column row">
                <div class="sixteen wide column">
                    <div class="grid-masonry">
                        <div class="grid-sizer"></div>
                        <div class="grid-item">
                            <?php foreach ($api_data['photos'] as $photo):?>
                                <img src="<?=$photo?>" width="100%" alt="<?= $api_data['name'];?>">
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>
<?php endwhile;
