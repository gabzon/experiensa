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
        foreach($showcase_options as $option){
//            echo "<pre>";
//            print_r($option);
//            echo "</pre>";
            $showcase['posttype'] = $option['showcase_posttype'];
            $showcase['category'] = $option['showcase_category'];
            $showcase['component'] = $option['showcase_component'];
            $showcase['color'] = $option['showcase_color'];
            $showcase['inverted'] = $option['showcase_inverted'];
            $showcase['title'] = $option['showcase_title'];
            $showcase['subtitle'] = $option['showcase_subtitle'];
            $showcase['title_alignment'] = $option['showcase_title_alignment'];
            if(isset($option['textimage_options']) && !empty($option['textimage_options']))
                $textimage_options = $option['textimage_options'];
            else
                $textimage_options = array();
            $showcase['textimage_options'] = new Experiensa\Component\Textimage($textimage_options);
            Showcase::displayShowcase($showcase);
        }
    }
}
get_template_part('templates/landing/partners');
