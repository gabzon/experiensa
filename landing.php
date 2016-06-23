<?php
/**
* Template Name: Landing page
*/

$design_options = get_option('experiensa_design_settings');
get_template_part('templates/landing/slider');

$display_showcase = ( isset($design_options['display_showcase']) ? $design_options['display_showcase']:false );

if($display_showcase!==false && $display_showcase=='TRUE'){
    $showcase_options = (isset($design_options['showcase_options'])?$design_options['showcase_options']:false);
    if($showcase_options !== false && !empty($showcase_options)){
        $showcase_posttype = $showcase_options['showcase_posttype'];
        $showcase_category = $showcase_options['showcase_category'];
        $showcase_component = $showcase_options['showcase_component'];
        $showcase_color = $showcase_options['showcase_color'];
        $showcase_inverted = $showcase_options['showcase_inverted'];
        $showcase_title = $showcase_options['showcase_title'];
        $showcase_subtitle = $showcase_options['showcase_subtitle'];
        $showcase_title_alignment = $showcase_options['showcase_title_alignment'];
        for($i=0;$i < count($showcase_category);$i++){
            $showcase['posttype'] = $showcase_posttype[$i];
            $showcase['category'] = $showcase_category[$i];
            $showcase['component'] = $showcase_component[$i];
            $showcase['color']= $showcase_color[$i];
            $showcase['inverted'] = $showcase_inverted[$i];
            $showcase['title'] = $showcase_title[$i];
            $showcase['subtitle'] = $showcase_subtitle[$i];
            $showcase['title_alignment'] = $showcase_title_alignment[$i];
            Showcase::display_showcase($showcase);
        }
    }
}
get_template_part('templates/landing/partners');
