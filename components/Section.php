<?php namespace Experiensa\Component;

use \Experiensa\Component\Textimage;
use \Experiensa\Component\Slider;
use Experiensa\Modules\QueryBuilder;
use \Experiensa\Component\SectionLayout;
class Section
{
    private $sections;
    private $content_settings;
    private $background_settings;
    //
    private $section_options;
    private $options;
    private $segment_options;
    function __construct($page_id,$design_settings, $section_options_name = 'section_options')
    {
//        echo "<pre>";
//        print_r($design_settings);
//        echo "</pre>";
        $this->sections = array();
        $this->content_settings = array();
        $this->background_settings = array();
        if(!empty($design_settings)) {
            if(isset($design_settings[$section_options_name])) {
//                $section_options = $settings[$section_options_name];
                if($section_options_name === 'section_options') {
                    echo "**";
                }else {
                    $this->sections = $design_settings[$section_options_name];
                }
            }
        }
    }
    public function checkExistSections(){
        return (!empty($this->sections)?true:false);
    }
    public function getSections(){
        return $this->sections;
    }

    private function createContentSettings($section){
        $settings = array();
        if(!empty($section)){
            $settings['source_type'] = $section['source_type'];
            $settings['pages'] = $section['pages'];
            $settings['show_template'] = $section['show_template'];
            $settings['template'] = $section['template'];
            $settings['component'] = $section['component'];
            $settings['posttype'] = $section['posttype'];
            $settings['category'] = $section['category'];
            $settings['terms'] = $section['terms'];
            $settings['max'] = (isset($section['max'])&&!empty($section['max'])?$section['max']:'-1');
            $settings['columns'] = (isset($section['columns'])&&!empty($section['columns'])?$section['columns']:'four');
            $settings['slider_type'] = $section['slider_type'];
            $settings['slider_title'] = $section['slider_title'];
            $settings['slider_subtitle'] = $section['slider_subtitle'];
            $settings['show_textimage'] = $section['show_textimage'];
            $settings['display_title'] = $section['display_title'];
            $settings['display_subtitle'] = $section['display_subtitle'];
            $settings['display_overlay'] = $section['display_overlay'];
            $settings['hover_animation'] = (isset($section['hover_animation']) && !empty($section['hover_animation'])?$section['hover_animation']:'imghvr-fade');
            $settings['animation_color'] = (isset($section['animation_color']) && !empty($section['animation_color'])?$section['animation_color']:'#FFFFFF');
            $settings['text_order'] = $section['text_order'];
            $settings['text_position'] = $section['text_position'];
            $settings['text_transform'] = $section['text_transform'];
            $settings['font_size'] = $section['font_size'];
            $settings['text_color'] = $section['text_color'];
            $settings['show_layout'] = $section['show_layout'];
            $settings['container'] = $section['container'];
            $settings['content_color'] = $section['content_color'];
            $settings['title_alignment'] = $section['title_alignment'];
            $settings['title_color'] = $section['title_color'];
            $settings['segment_title'] = $section['segment_title'];
            $settings['segment_subtitle'] = $section['segment_subtitle'];
        }
        return $settings;
    }
    private function createBackgroundSettings($section){
        $settings = array();
        if(!empty($section)){
            $source_type = $section['source_type'];
            $settings['show_background'] = $section['show_background'];
            if($source_type == 'page'){
                $settings['background_type'] = $section['background_type_page'];
                $settings['background_color'] = $section['background_color_page'];
                $settings['color_inverted'] = $section['color_inverted_page'];
                $settings['bg_texture'] = $section['bg_texture_page'];
                $settings['bg_image'] = $section['bg_image_page'];
                $settings['bg_image_size'] = (isset($section['bg_image_size_page'])&&!empty($section['bg_image_size_page'][0])?$section['bg_image_size_page'][0]:'content');
                $settings['opacity'] = (isset($section['opacity_page'])&&!empty($section['opacity_page'])?$section['opacity_page']:'0.01');
                $settings['opacity_color'] = (isset($section['opacity_color_page'])&&!empty($section['opacity_color_page'])?$section['opacity_color_page']:'#FFFFFF');
            }else{
                $settings['background_type'] = $section['background_type_showcase'];
                $settings['background_color'] = $section['background_color_showcase'];
                $settings['color_inverted'] = $section['color_inverted_showcase'];
                $settings['bg_texture'] = $section['bg_texture_showcase'];
                $settings['bg_image'] = $section['bg_image_showcase'];
                $settings['bg_image_size'] = (isset($section['bg_image_size_showcase'])&&!empty($section['bg_image_size_showcase'][0])?$section['bg_image_size_showcase'][0]:"content");
                $settings['opacity'] = (isset($section['opacity_showcase'])&&!empty($section['opacity_showcase'])?$section['opacity_showcase']:'0.01');
                $settings['opacity_color'] = (isset($section['opacity_color_showcase'])&&!empty($section['opacity_color_showcase'])?$section['opacity_color_showcase']:'#FFFFFF');
            }
            $settings['media_category'] = (isset($section['media_category'])?$section['media_category']:'');
        }
        return $settings;
    }
    public function showSection($section){
        $content_settings = $this->createContentSettings($section);
        $background_settings = $this->createBackgroundSettings($section);
        $section_layout = new SectionLayout($content_settings,$background_settings);
        $section_layout->displaySectionLayout();
    }


    public function checkExistSectionOptions(){
        return (!empty($this->section_options)?true:false);
    }

    public function getSectionOptions(){
        return $this->section_options;
    }
}
