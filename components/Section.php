<?php namespace Experiensa\Component;

use \Experiensa\Component\Textimage;
use \Experiensa\Component\Slider;

class Section
{
    private $section_options;
    private $options;
    private $segment_options;
    function __construct($page_id,$settings)
    {
        if(!empty($settings)) {
            if(isset($settings['section_options'])) {
                $section_options = $settings['section_options'];
                $this->section_options = $this->getPageSectionOptions($page_id, $section_options);
                if (!empty($this->section_options))
                    $this->segment_options = $this->section_options['segment_options'];
                else
                    $this->segment_options = array();
            }else{
                $this->section_options = array();
                $this->segment_options = array();
            }
        }else {
            $this->section_options = array();
            $this->segment_options = array();
        }
    }
    public function checkExistSectionOptions(){
        return (!empty($this->section_options)?true:false);
    }
    public function getPageSectionOptions($page_id,$settings){
        $options = array();
//        $section_options = $settings['section_options'];
        foreach ($settings as $option){
            if($option['pages'] == $page_id){
                $options = $option;
                break;
            }
        }
        return $options;
    }
    public function getSectionOptions(){
        return $this->section_options;
    }
    public function getSegmentList(){
        return $this->segment_options;
    }
    public function getSegmentOptions($segment){
        $options['container'] = $segment['container'];
        $options['title_alignment'] = $segment['title_alignment'];
        $options['segment_title'] = $segment['segment_title'];
        $options['segment_subtitle'] = $segment['segment_subtitle'];
        $options['background_type'] = $segment['background_type'];
        $options['background_color'] = $segment['background_color'];
        $options['color_inverted'] = $segment['color_inverted'];
        $options['bg_texture'] = $segment['bg_texture'];
        $options['bg_image'] = $segment['bg_image'];
        return $options;
//        $segment_options = array();
//        if(!empty($this->segment_options)) {
//            $options = $this->segment_options;
//            foreach ($options as $option){
//                $row['container'] = $option['container'];
//                $row['title_alignment'] = $option['title_alignment'];
//                $row['segment_title'] = $option['segment_title'];
//                $row['segment_subtitle'] = $option['segment_subtitle'];
//                $row['background_type'] = $option['background_type'];
//                $row['background_color'] = $option['background_color'];
//                $row['color_inverted'] = $option['color_inverted'];
//                $row['bg_texture'] = $option['bg_texture'];
//                $row['bg_image'] = $option['bg_image'];
//                $segment_options[] = $row;
//            }
//        }
//        return $segment_options;
    }
    public function getSegmentSourceType($segment){
        return $segment['content_source_options']['source_type'];
    }
    public function getSegmentPageID($segment){
        return $segment['content_source_options']['pages'];
    }
    public function getSegmentTitle($segment){
        if(!empty($segment['segment_title']))
            $title = $segment['segment_title'];
        else{
            if($this->getSegmentSourceType($segment)=='page'){
                $title = get_the_title($this->getSegmentPageID($segment));
            }else{
                $title = ucfirst($segment['content_source_options']['showcase_options']['category']);
            }
        }
        return $title;
    }
    public function getSegmentSubtitle($segment){
        return $segment['segment_subtitle'];
    }
    public function displaySegmentShowcase($segment){
        $showcase_options = $segment['content_source_options']['showcase_options'];
        $showcase['posttype'] = $showcase_options['posttype'];
        $showcase['category'] = $showcase_options['category'];
        $component = $showcase_options['component'];
        $data = \Showcase::getData($showcase);
        $textimage = array();
        $textimage_options = $segment['content_source_options']['showcase_options']['textimage_options'];
        if(isset($textimage_options) && !empty($textimage_options))
            $textimage = $textimage_options;
        $textimage_object = new Textimage($textimage);
        \Showcase::displayComponent($component,$data,$textimage_object);
    }
    public function displaySegmentSlider($segment){
        $slider_options = $segment['content_source_options']['slider_options'];
        $slider_terms = explode(',',$slider_options['terms']);
        if($slider_options['slider_type'] == 'message') {
            $slider_type = 'vegas';
            $post_type = ['attachment'];
            $taxonomy = $slider_options['taxonomy'];
            $message = $slider_options['message'];
        }else {
            $slider_type = 'superslides';
            $post_type = [$slider_options['post_type']];
            $taxonomy = $slider_options['taxonomy'];
            $message = '';
        }
        $slider = new Slider($slider_type,$post_type,$taxonomy,$slider_terms,$message);
        $slider->showSlider();
    }
}
