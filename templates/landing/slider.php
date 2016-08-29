<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;
use \Experiensa\Config\RequestMedia;
$design_options = get_option('experiensa_design_settings');
$display_slider = $design_options['setting_landing_slider'];

if($display_slider=='TRUE'):
    $what_display = $design_options['setting_landing_slider_description'];
    if($what_display=='TRUE'){
        $welcome_msg = $design_options['setting_landing_slider_welcome_message'];
        $welcome_msg = ($welcome_msg != null?$welcome_msg:get_bloginfo('description'));
        $taxonomy = [['taxonomy'=>'media_category','term'=>'landing']];
        $images = RequestMedia::get_media_request_local('media',$taxonomy);
        Landing::display_welcome_msg($welcome_msg,$images);
    }else{
        $args = array(
            'post_type' => array('voyage'),
            'category_name' => 'landing-slider',
            'order' => 'DESC',
        );
        // The Query
        $query = new WP_Query($args);
        Landing::display_voyages($query);
    }
endif;
