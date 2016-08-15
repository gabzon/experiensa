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
        $this->have_option = false;
        if(!empty($this->segment_settings)){
            $segment_settings = $this->segment_settings;
            foreach( $segment_settings as $setting ){
                if($setting['segment_page_templates'] == $templateName){
                    $this->have_option = true;
                    $this->options = $setting;
                    $this->setContainer($this->options['segment_page_container']);
                    $this->setAlignment($this->options['segment_page_title_alignment']);
                    $this->setBackground();
                    break;
                }
            }
        }
    }

    private function setContainer($container){
        if($this->have_option) {
            if ($container == '') {
                $this->container['class'] = '';
                $this->container['style'] = 'padding: 0px 15px 0 15px;';
            } else {
                $this->container['class'] = 'container';
                $this->container['style'] = '';
            }
        }else{
            $this->container['class'] = '';
            $this->container['style'] = '';
        }
    }

    private function setAlignment($align){
        if($this->have_option) {
            $align_class = get_the_aligment($align);
            $this->align = $align_class;
        }else{
            $this->align = '';
        }
    }

    private function setBackground(){
        if($this->have_option) {
            $bg_type = $this->options['segment_page_background_type'];
            if ($bg_type == 'color') {
                $this->background['style'] = '';
                $this->background['class'] = get_the_color($this->options['segment_page_color'], $this->options['segment_page_inverted']);
            } else {
                if ($bg_type == 'texture') {
                    $texture_image = $this->getBackgroundImage($this->options['segment_page_texture']);
                    $this->background['style'] = ($texture_image ? "background-image: url(" . $texture_image . "); background-repeat:repeat;" : "");
                    $this->background['class'] = '';
                } else {
                    $image = $this->getBackgroundImage($this->options['segment_page_bg_image']);
                    $this->background['style'] = ($image ? "background-image:url('" . $image . "');background-repeat:no-repeat;background-size:100%;background-position:center;" : "");
                    $this->background['class'] = '';
                }
            }
        }else{
            $this->background['style'] = '';
            $this->background['class'] = '';
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
    public function getHaveData(){
        return $this->have_option;
    }
    public function getContainer(){
        return $this->container;
    }
    public function getAlignment(){
        return $this->align;
    }
    public function getBackground(){
        return $this->background;
    }
}