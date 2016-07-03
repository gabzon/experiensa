<?php
use Roots\Sage\Nav;
$menu_name = 'primary_navigation';

$agency_options = get_option('agency_settings');
$design_options = get_option('experiensa_design_settings');
$header_style = get_theme_mod('header_style');
$logo   = Helpers::getWebsiteLogo();
$phone  = $agency_options['agency_phone'];

if($header_style!=null):
    if ($header_style == 'fixed_') {
        echo "fixed_top_nav_bar";
    }
    Header::get_header($header_style,get_the_ID(),true);
endif;
?>
