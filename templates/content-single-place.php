<?php
$agency_options = get_option('agency_settings');
$timezone = $agency_options['agency_timezone'];
date_default_timezone_set($timezone);
?>
<?php while (have_posts()) : the_post(); ?>
    <?php $api_data = (array) json_decode(get_post_meta($post->ID, 'place_api_data', true));?>
    <br/><br/><br/><br/>
    <div class="ui container">
        <h1><?php the_title(); ?></h1>
        <?php
//        echo "<pre>";
//        var_dump($api_data);
//        echo "</pre>";
        ?>
        <br>
        <br>
        <div class="ui stackable two column grid">
            <div class="two column row">
                <?php
                set_query_var('data',$api_data);
                get_template_part('templates/place/content');
                set_query_var('place_id',$api_data['place_id']);
                get_template_part('templates/place/map');
                ?>
            </div>
            <div class="two column row">
                <?php
                set_query_var('photos',$api_data['photos']);
                set_query_var('name',$api_data['name']);
                get_template_part('templates/place/gallery');
                ?>
            </div>
            <div class="two column row">
                <?php
//                set_query_var('latitude',$api_data['location']->latitude);
//                set_query_var('longitude',$api_data['location']->longitude);
//                get_template_part('templates/place/nearby_places');
                ?>
            </div>
            <div class="two column row">
                <?php
                set_query_var('name',$api_data['name']);
                set_query_var('address',$api_data['address']);
                set_query_var('latitude',$api_data['location']->latitude);
                set_query_var('longitude',$api_data['location']->longitude);
                get_template_part('templates/place/weather');
                ?>
            </div>
        </div>
        <br>
        <br>
    </div>
<?php endwhile;
