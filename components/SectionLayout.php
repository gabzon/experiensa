<?php namespace Experiensa\Component;

use Experiensa\Modules\QueryBuilder;

class SectionLayout
{
    private $background_settings;
    private $background = array();
    private $content_settings;
    private $slider = array();
    private $slider_obj;
    private $layout;
    private $textimage;
    private $showcase_data;
    private $page_data;
    private $source = 'page';

    function __construct($content_settings,$background_settings){
        $this->source = $content_settings['source_type'];
        $this->background_settings = $background_settings;
        $this->content_settings = $content_settings;
        $this->setSectionBackground($background_settings,$this->source);
        $this->setSectionLayout();
        $this->setTextImage();
        $this->setShowcaseData();
    }
    public function displaySectionLayout(){
        //Showcase
        if($this->source == 'showcase'){
            if($this->content_settings['component'] == 'slider'){
                $this->setSectionShowcaseSlider();
                $this->slider_obj = new Slider($this->slider['component'],
                    $this->slider['post_type'],
                    $this->slider['taxonomy'],
                    $this->slider['terms'],
                    $this->slider['message']);
                $show_layout = ($this->content_settings['show_layout']=='TRUE'?true:false);
                $background = $this->background;
                $layout = $this->layout;
                include(locate_template('templates/partials/section/component_slider.php'));
            }else{
                $component = $this->content_settings['component'];
                $background = $this->background;
                $showcase_data = $this->showcase_data;
//                print_r($showcase_data);
                $textimage_obj = new Textimage($this->textimage);
                $layout = $this->layout;
                include(locate_template('templates/partials/section/component.php'));
            }
        }else{//Page
            $this->setSectionPageSlider($this->background_settings,$this->source);
            $this->setPageData();
            //Show Page with Slider
            if(!empty($this->slider)){
                $message = '<h1>'.$this->page_data['title'].'</h1>'.$this->page_data['content'];
                $this->slider_obj = new Slider($this->slider['component'],
                    $this->slider['post_type'],
                    $this->slider['taxonomy'],
                    $this->slider['terms'],
                    $message);
                $this->slider_obj->showSlider();
            }else{
                $background = $this->background;
                $layout = $this->layout;
                $page = $this->page_data;
                include(locate_template('templates/partials/section/single_page.php'));
            }
        }
    }
    public function setSectionBackground($background_settings, $source = 'page'){
        $background['style'] = '';
        $background['class'] = '';
        $background['type'] = 'none';
        if($background_settings['show_background'] == 'TRUE' && ( $source == 'showcase' || ($source == 'page' && $background_settings['background_type_page'] != 'slider')) ){
            $type = $this->getBackgroundType($background_settings,$source);
            if($type == 'color'){
                $background['style'] = '';
                $background['class'] = $this->getBgColor($background_settings,$source);
                $background['type'] = 'color';
            }else{
                if($type == 'texture'){
                    $background['style'] = $this->getBgTexture($background_settings,$source);
                    $background['class'] = '';
                    $background['type'] = 'texture';
                }else{
                    $background['style'] = $this->getBgImage($background_settings,$source);
                    $background['class'] = '';
                    $background['type'] = 'image';
                }
            }
        }
        $this->background = $background;
    }
    public function getBackgroundType($background_settings, $source = 'page'){
        if($source == 'page'){
            return $background_settings['background_type_page'];
        }
        return $background_settings['background_type_showcase'];
    }
    public function getBgColor($background_settings,$source){
        if($source == 'page'){
            return get_the_color($background_settings['background_color_page'], $background_settings['color_inverted_page']);
        }
        return get_the_color($background_settings['background_color_showcase'], $background_settings['color_inverted_showcase']);
    }
    public function getBgTexture($background_settings,$source){
        if($source == 'page'){
            $texture_image = $this->getBackgroundImage($background_settings['bg_texture_page']);
        }else{
            $texture_image = $this->getBackgroundImage($background_settings['bg_texture_showcase']);
        }
        return ($texture_image ? "background-image: url(" . $texture_image . "); background-repeat:repeat;" : "");
    }
    public function getBgImage($background_settings,$source){
        if($source == 'page'){
            $image = $this->getBackgroundImage($background_settings['bg_image_page']);
        }else{
            $image = $this->getBackgroundImage($background_settings['bg_image_showcase']);
        }
        return ($image ? "background:url('" . $image . "') no-repeat center center fixed; background-size: cover; height:100vh;" : "");
    }
    private function getBackgroundImage($images){
        $bg_img = false;
        foreach($images as $img){
            if(isset($img)){
                $bg_img = wp_get_attachment_url($img);
                break;
            }
        }
        return $bg_img;
    }
    private function checkShowPageBgSlider($background_settings,$source){
        if($source == 'page' && $background_settings['show_background'] == 'TRUE' && $background_settings['background_type_page'] == 'slider')
            return true;
        return false;
    }
    private function setSectionPageSlider($background_settings, $source){
        if($this->checkShowPageBgSlider($background_settings,$source)){
            $slider['component'] = 'vegas';
            $slider['post_type'] = ['attachment'];
            $slider['taxonomy'] = 'media_category';
            $slider_terms = explode(',',$background_settings['media_category']);
            $slider['terms'] = (!empty($slider_terms)?$slider_terms:['landing']);
            $this->slider = $slider;
        }
    }
    private function setSectionShowcaseSlider(){
        $type = $this->content_settings['slider_type'];
        if($type == 'posts'){
            $slider['component'] = 'superslides';
            $slider['post_type'] = [$this->content_settings['posttype']];
            $slider['taxonomy'] = $this->content_settings['category'];
            $slider['terms'] = explode(',',$this->content_settings['terms']);
            $slider['message'] = '';
            $this->slider = $slider;
        }else{
            $slider['component'] = 'vegas';
            $slider['post_type'] = ['attachment'];
            $slider['taxonomy'] = $this->content_settings['category'];
            $slider['terms'] = explode(',',$this->content_settings['terms']);
            $slider['message'] = (!empty($this->content_settings['message'])?$this->content_settings['message']:ucwords(str_replace('_',' ',$slider['taxonomy'])));
            $this->slider = $slider;
        }
    }
    private function setSectionLayout(){
        $layout['container_class'] = '';
        $layout['container_style'] = 'padding: 0px 15px 0 15px;';
        
        if($this->background['type'] == 'color' || $this->background['type'] == 'none'){
          $layout['content_color'] = 'color:#000000;';
          $layout['title_color'] = 'color:#000000;';
        }
        else{
          $layout['content_color'] = 'color:#FFFFFF;';
          $layout['title_color'] = 'color:#FFFFFF;';
        }
        $layout['title_alignment'] = 'center aligned';
        $layout['title'] = ucwords(str_replace('_',' ',$this->content_settings['category']));
        $layout['subtitle'] = '';
        if($this->source == 'showcase' && $this->content_settings['show_layout'] == 'TRUE'){
            if ($this->content_settings['container'] == 'container') {
                $layout['container_class'] = 'container';
                $layout['container_style'] = '';
            }
            if(!empty($this->content_settings['content_color'] ))
                $layout['content_color'] = 'color:'.$this->content_settings['content_color'].';';
            if(!empty($this->content_settings['title_color'] ))
                $layout['title_color'] = 'color:'.$this->content_settings['title_color'].';';
            if(!empty($this->content_settings['title_alignment'] ))
                $layout['title_alignment'] = get_the_aligment($this->content_settings['title_alignment']);
            if(!empty($this->content_settings['segment_title']))
                $layout['title'] = $this->content_settings['segment_title'];
            if(!empty($this->content_settings['segment_subtitle']))
                $layout['subtitle'] = $this->content_settings['segment_subtitle'];
        }
        $this->layout = $layout;
    }
    private function setTextImage(){
        $textimage['display_title'] = 'yes';
        $textimage['display_subtitle'] = 'yes';
        $textimage['display_overlay'] = 'yes';
        $textimage['text_order'] = 'title_first';
        $textimage['text_position'] = 'top_left';
        $textimage['text_transform'] = 'uppercase';
        $textimage['font_size'] = '1';
        $textimage['text_color'] = '#FFFFFF';
        if($this->source == 'showcase' && $this->content_settings['show_textimage'] == 'TRUE'){
            $textimage['display_title'] = (!empty($this->content_settings['display_title'])?$this->content_settings['display_title']:$textimage['display_title']);
            $textimage['display_subtitle'] = (!empty($this->content_settings['display_subtitle'])?$this->content_settings['display_subtitle']:$textimage['display_subtitle']);
            $textimage['display_overlay'] = (!empty($this->content_settings['display_overlay'])?$this->content_settings['display_overlay']:$textimage['display_overlay']);
            $textimage['text_order'] = (!empty($this->content_settings['text_order'])?$this->content_settings['text_order']:$textimage['text_order']);
            $textimage['text_position'] = (!empty($this->content_settings['text_position'])?$this->content_settings['text_position']:$textimage['text_position']);
            $textimage['text_transform'] = (!empty($this->content_settings['text_transform'])?$this->content_settings['text_transform']:$textimage['text_transform']);
            $textimage['font_size'] = (!empty($this->content_settings['font_size'])?$this->content_settings['font_size']:$textimage['font_size']);
            $textimage['text_color'] = (!empty($this->content_settings['text_color'])?$this->content_settings['text_color']:$textimage['text_color']);

        }
        $this->textimage = $textimage;
    }
    private function setShowcaseData(){
        $showcase['posttype'] = $this->content_settings['posttype'];
        $showcase['category'] = $this->content_settings['category'];
        $this->showcase_data = \Showcase::getData($showcase);
    }
    private function setPageData(){
        $page_id = $this->content_settings['pages'];
        $page_data['title'] = get_the_title($page_id);
        $page_data['content'] = QueryBuilder::getPostContent($page_id);
        $this->page_data = $page_data;
    }
}
