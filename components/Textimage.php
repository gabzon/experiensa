<?php

namespace Experiensa\Component;


class Textimage
{
    private $font_size;
    private $text_color;
    private $text_transform;
    private $text_order;
    private $text_position;
    private $display_textimage;
    private $display_title;
    private $display_subtitle;
    private $display_overlay;
    private $hover_animation;
    private $animation_color;

    private $text_style;
    private $vertical_style;
    private $vertical_simple_style;
    private $horizontal_style;

    private $title;
    private $subtitle;
    private $image;
    private $post_link;

    function __construct($options)
    {
        $this->display_textimage = $options['display_textimage'];
        $this->font_size = $options['font_size'];
        $this->text_color = $options['text_color'];
        $this->text_transform = $options['text_transform'];
        $this->text_order = $options['text_order'];
        $this->text_position = $options['text_position'];
        $this->display_title = ($options['display_title']==='yes'?true:false);
        $this->display_subtitle = ($options['display_subtitle']==='yes'?true:false);
        $this->display_overlay = ($options['display_overlay']==='yes'?true:false);
        $this->hover_animation = $options['hover_animation'];
        $this->animation_color = $options['animation_color'];

        $this->setTextStyle();
        $this->setVerticalAlignment();
        $this->setVerticalSimpleAligment();
        $this->setHorizontalAlignment();
    }

    private function setTextStyle(){
        $style = "font-size: ".$this->font_size."em;";
        $style .= "color: ".$this->text_color.";";
        $style .= "text-transform: ".$this->text_transform.";";
        $this->text_style = $style;

    }
    private function setVerticalAlignment(){
        if(strpos($this->text_position,'top') !== false) {
            $this->vertical_style = 'top aligned ';
//            $this->vertical_style = '';
        }else{
            if(strpos($this->text_position,'bottom') !== false) {
                $this->vertical_style = 'bottom aligned ';
//                $this->vertical_style = '';
            }else {
//                $this->vertical_style = '';
                $this->vertical_style = 'middle aligned ';
            }
        }
    }
    private function setVerticalSimpleAligment(){
        if(strpos($this->text_position,'top') !== false)
            $this->vertical_simple_style = 'padding-top: 0%;';
        else{
            if(strpos($this->text_position,'bottom') !== false)
                $this->vertical_simple_style = 'padding-top: 50%;';
            else
                $this->vertical_simple_style = 'padding-top: 25%;';
        }
    }
    public function getVerticalAlignment(){
        return $this->vertical_style;
    }
    public function getVerticalSimpleAlignment(){
        return $this->vertical_simple_style;
    }
    private function setHorizontalAlignment(){
        if(strpos($this->text_position,'left') !== false)
            $this->horizontal_style = 'text-align: left !important;';
        else{
            if(strpos($this->text_position,'right') !== false)
                $this->horizontal_style = 'text-align: right !important;';
            else
                $this->horizontal_style = 'text-align: center !important;';
        }
    }
    public function getHorizontalAlignment(){
        return $this->horizontal_style;
    }
    public function getTextStyle(){
        return $this->text_style;
    }
    public function setInfo($title,$subtitle, $image, $post_link='#'){
        $this->image = $image;
        $title = ( isset($title) && !empty($title)?$title:'');
        $subtitle = ( isset($subtitle) && !empty($subtitle)?$subtitle:'');
        $this->post_link = (isset($post_link)&&!empty($post_link)?$post_link:'#');
        if( $this->text_order === 'title_first'){
            $this->title = $title;
            $this->subtitle = $subtitle;
        }else{
            $this->title = $subtitle;
            $this->subtitle = $title;
        }
        if( ! $this->display_title)
            $this->title = '';
        if( ! $this->display_subtitle)
            $this->subtitle = '';
    }
    public function getTitle(){
        return $this->title;
    }
    public function getSubtitle(){
        return $this->subtitle;
    }
    public function getImage(){
        return $this->image;
    }
    public function getPostLink(){
        return $this->post_link;
    }
    public function getDisplayTextImage(){
        return $this->display_textimage;
    }
    public function getDisplayOverlay(){
        return $this->display_overlay;
    }
    public function getAnimation(){
        return $this->hover_animation;
    }
    public function getAnimationColor(){
        return $this->animation_color;
    }
    public function displayTextimage(){
        $textimage = $this;
        if($this->display_overlay)
            include(locate_template('templates/partials/textimage/overlay.php'));
        else
            include(locate_template('templates/partials/textimage/simple.php'));
    }
}