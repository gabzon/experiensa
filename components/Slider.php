<?php namespace Experiensa\Component;

use Experiensa\Config\RequestMedia;
use Experiensa\Modules\QueryBuilder;

class Slider
{
    private $component;
    private $post_type;
    private $taxonomy;
    private $terms;
    private $message;
    private $images;
    function __construct($component,$post_type=['media'],$taxonomy='media_category',$terms=['landing'],$message=false)
    {
        $this->component = $component;
        $this->post_type = $post_type;
        $this->taxonomy = $taxonomy;
        $this->terms = $terms;
        $this->message = $message;
        $this->setImages();
    }

    private function setImages(){
        $post_type = $this->post_type;
        $taxonomy = $this->taxonomy;
        $terms = $this->terms;
        $images = QueryBuilder::getImagesByPostType($post_type,$taxonomy,$terms);
        $this->images = $images;
    }

    private function checkExistImages(){
        $exist = false;
        if(!empty($this->images))
            $exist = true;
        return $exist;
    }
    public function getImages(){
        return $this->images;
    }
    public function showSlider(){
        if($this->checkExistImages())
            $images = $this->images;
        else{
            $images[] = get_stylesheet_directory_uri() . '/assets/images/mauritius.jpg';
        }
        if($this->component=='vegas'){
            $message = $this->message;
            $overlay = get_stylesheet_directory_uri() .  '/bower_components/vegas/dist/overlays/07.png';
            include(locate_template('templates/partials/slider/vegas.php'));
        }else{
            include(locate_template('templates/partials/slider/superslides.php'));
        }
    }
}