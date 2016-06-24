<?php
function header_background(){
    $background_color = get_theme_mod('header_background_color');
    echo $background_color;
}
add_action('wp_ajax_header_background', 'header_background');
add_action('wp_ajax_nopriv_header_background', 'header_background');
?>