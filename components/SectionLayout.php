<?php namespace Experiensa\Component;

use WP_Query;
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
        $this->setSectionBackground($background_settings);
        $this->setSectionLayout();
        $this->setTextImage();
        $this->setShowcaseData();
    }
    public function displaySectionLayout(){
        //Showcase
        if($this->source == 'showcase'){
            //Showcase component is a Slider
            if($this->content_settings['component'] == 'slider'){
                $this->setSectionShowcaseSlider();
                $this->slider_obj = new Slider($this->slider['component'],
                    $this->slider['post_type'],
                    $this->slider['taxonomy'],
                    $this->slider['terms'],
                    $this->slider['message']);
                set_query_var('slider_obj',$this->slider_obj);
                set_query_var('show_layout',($this->content_settings['show_layout']=='TRUE'?true:false));
                set_query_var('background',$this->background);
                set_query_var('layout',$this->layout);
                set_query_var('name',"section_slider_".str_replace(' ', '_', strtolower($this->layout['title'])));
                get_template_part("templates/partials/section/component_slider");
//                include(locate_template('templates/partials/section/component_slider.php'));
            }else{// Showcase is a single component
                set_query_var('component',$this->content_settings['component']);
                set_query_var('background',$this->background);
                set_query_var('showcase_data',$this->showcase_data);
                set_query_var('textimage_obj',new Textimage($this->textimage));
                set_query_var('layout',$this->layout);
                set_query_var('name',"section_component_".str_replace(' ', '_', strtolower($this->layout['title'])));
                get_template_part("templates/partials/section/component");
                //include(locate_template('templates/partials/section/component.php'));
            }
        }else{//Page
            if($this->source == 'page') {
                if($this->content_settings['show_template']==='FALSE') {
                    $this->setSectionPageSlider($this->background_settings, $this->source);
                    $this->setPageData();
                    //Show Page with Slider
                    if (!empty($this->slider)) {
                        $message = '<h1>' . $this->page_data['title'] . '</h1>' . $this->page_data['content'];
                        $this->slider_obj = new Slider($this->slider['component'],
                            $this->slider['post_type'],
                            $this->slider['taxonomy'],
                            $this->slider['terms'],
                            $message);
                        $title = $this->page_data['title'];
                        $name = "section_slider_" . str_replace(' ', '_', strtolower($title));
                        $this->slider_obj->showSlider($name);
                    } else {//Single Page
                        set_query_var('background',$this->background);
                        set_query_var('layout',$this->layout);
                        set_query_var('page',$this->page_data);
                        set_query_var('name',"section_page_" . str_replace(' ', '_', strtolower($this->page_data['title'])));
                        get_template_part('templates/partials/section/single_page');
                    }
                }else {//Page with Template
                    $page_id = $this->content_settings['pages'];
                    $template_path = \Helpers::getTemplatePathByID($page_id);
                    //$template_path = \Helpers::getTemplatePath($template_name);
                    $args = array(
                        'p'         => $page_id,
                        'post_type' => 'any');
                    global $wp_query;
                    $wp_query = new WP_Query($args);
                    set_query_var('background',$this->background);
                    get_template_part(str_replace('.php', '', $template_path));
                }
            }else{//Single Template
                $template = str_replace('.php','',$this->content_settings['template']);
                get_template_part($template);
            }
        }
    }
    public function setSectionBackground($background_settings){
        $background['style'] = '';
        $background['class'] = '';
        $background['type'] = 'none';
        if($background_settings['show_background'] == 'TRUE' && $background_settings['background_type'] != 'slider'){
            $type = $background_settings['background_type'];
            if($type == 'color'){
                $background['style'] = '';
                $background['class'] = $this->getBgColor($background_settings);
                $background['type'] = 'color';
            }else{
                if($type == 'texture'){
                    $background['style'] = $this->getBgTexture($background_settings['bg_texture']);
                    $background['class'] = '';
                    $background['type'] = 'texture';
                }else{
                    $background['style'] = $this->getBackgroundImage($background_settings['bg_image'],
                        $background_settings['bg_image_size'],
                        $background_settings['opacity'],
                        $background_settings['opacity_color']);
                    $background['class'] = '';
                    $background['type'] = 'image';
                }
            }
        }
        $this->background = $background;
    }

    public function getBgColor($background_settings){
        return get_the_color($background_settings['background_color'], $background_settings['color_inverted']);
    }
    public function getBgTexture($texture_list){
        $texture_image = $this->getBackgroundImageURL($texture_list);
        return ($texture_image ? "background-image: url(" . $texture_image . "); background-repeat:repeat;" : "");
    }
    public function getBackgroundImage($image_list,$size_list,$opacity,$opacity_color){
        $image = $this->getBackgroundImageURL($image_list);
        $size = $this->getBackgroundSize($size_list);
        $opacity_style = $this->getBackgroundOpacity($opacity,$opacity_color);
        return ($image ? "background:".$opacity_style."url('" . $image . "') no-repeat center center fixed;".$size : "");
    }
    private function getBackgroundImageURL($images){
        $bg_img = false;
        foreach($images as $img){
            if(isset($img)){
                $bg_img = wp_get_attachment_url($img);
                break;
            }
        }
        return $bg_img;
    }
    private function getBackgroundSize($size_list){
        $size = "background-size: cover;";
        $s = (isset($size_list)?$size_list:[0=>'content']);
        if(!empty($s[0]) && $s[0]==='full')
            $size .= 'height:100vh;';
        return $size;
    }
    private function getBackgroundOpacity($opacity,$color){
        $style = "";
        if($opacity !== '0.01'){
            $rgb = \Helpers::hex2rgb($color);
            $style = "linear-gradient(rgba(".$rgb.",". $opacity."),rgba(".$rgb.",". $opacity.")),";
        }
        return $style;
    }
    private function checkShowPageBgSlider($background_settings,$source){
        if($source == 'page' && $background_settings['show_background'] == 'TRUE' && $background_settings['background_type'] == 'slider')
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
        $textimage['display_textimage'] = false;
        $textimage['display_title'] = 'yes';
        $textimage['display_subtitle'] = 'yes';
        $textimage['display_overlay'] = 'yes';
        $textimage['text_order'] = 'title_first';
        $textimage['text_position'] = 'top_left';
        $textimage['text_transform'] = 'uppercase';
        $textimage['font_size'] = '1';
        $textimage['text_color'] = '#FFFFFF';
        if($this->source == 'showcase' && $this->content_settings['show_textimage'] == 'TRUE'){
            $textimage['display_textimage'] = true;
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
        /*echo "<pre>";
        print_r($this->content_settings);
        echo "</pre>";*/
        $post_type = $this->content_settings['posttype'];
        $category = $this->content_settings['category'];
        $terms = $this->content_settings['terms'];
        $terms = explode(',',$terms);
        $max = $this->content_settings['max'];
        $this->showcase_data = \Showcase::getData($post_type,$category,$terms,$max);
    }
    private function setPageData(){
        $page_id = $this->content_settings['pages'];
        $page_data['title'] = get_the_title($page_id);
        $page_data['content'] = QueryBuilder::getPostContent($page_id);
        $this->page_data = $page_data;
    }
}
