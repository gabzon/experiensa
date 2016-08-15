<?php

namespace Experiensa\Component;


class Segment
{
    private $segment_settings;
    private $have_option;
    private $options;
    private $container;
    private $align;
    private $background;

    function __construct()
    {
        $settings = get_option('experiensa-segment-settings');
        if(!empty($settings)) {
            $this->segment_settings = $settings['segment_page_options'];
        }else {
            $this->segment_settings = array();
        }
    }

    public function setData($templateName){
        $set = false;
        if(!empty($this->segment_settings)){
            $segment_settings = $this->segment_settings;
            foreach( $segment_settings as $setting ){
                if($setting['segment_page_templates'] == $templateName){
                    $this->options = $setting;
                    $this->setContainer($this->options['segment_page_container']);
                    $this->setAlignment($this->options['segment_page_title_alignment']);
                    $this->setBackground();
                    $set = true;
                    break;
                }
            }
        }
        $this->have_option = $set;
    }

    private function setContainer($container){
        if($container == ''){
            $this->container['class'] = 'ui';
            $this->container['style'] = 'padding: 0px 15px 0 15px;';
        }else{
            $this->container['class'] = 'ui container';
            $this->container['style'] = '';
        }
    }

    private function setAlignment($align){
        $align_class = get_the_aligment($align);
        $this->align = $align_class;
    }

    private function setBackground(){
        $bg_type = $this->options['segment_page_background_type'];
        if($bg_type == 'color'){
            $this->background['style'] = '';
            $this->background['class'] = get_the_color($this->options['segment_page_color'],$this->options['segment_page_inverted']);
        }else{
            if($bg_type == 'texture'){
                $texture_image = $this->getBackgroundImage($this->options['segment_page_texture']);
                $this->background['style'] = ($texture_image?"background-image: url(".$texture_image."); background-repeat:repeat;":"");
                $this->background['class'] = '';
            }else{
                $image = $this->getBackgroundImage($this->options['segment_page_bg_image']);
                $this->background['style'] = ($image?"background-image:url('".$image."');background-repeat:no-repeat;background-size:100%;background-position:center;":"");
                $this->background['class'] = '';
            }
        }
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
    public function getContainer(){
        return ($this->have_option?$this->container:array());
    }
    public function getAlignment(){
        return ($this->have_option?$this->align:"");
    }
    public function getBackground(){
        return ($this->have_option?$this->background:"");
    }
}