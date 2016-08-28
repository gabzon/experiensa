<?php namespace Experiensa\Component;

use Experiensa\Config\RequestMedia;

class Slider
{
    private $component;
    private $post_type;
    private $taxonomy;
    private $terms;
    private $images;
    function __construct($component,$post_type='media',$taxonomy='media_category',$terms=['landing'])
    {
        $this->component = $component;
        $this->post_type = $post_type;
        $this->taxonomy = $taxonomy;
        $this->terms = $terms;
        $this->getImages();
    }

    private function getImages(){
        $taxonomy = $this->taxonomy;
        $terms = $this->terms;
        $term_list = array();
        foreach ($terms as $term){
            $row['taxonomy'] = $taxonomy;
            $row['term'] = $term;
            $term_list[] = $row;
        }
        $images = array();
        if(!empty($term_list)){
            $images = RequestMedia::get_media_request_local($this->post_type,$term_list);
        }
        $this->images = $images;
    }

    private function checkExistImages(){
        $exist = false;
        if(!empty($this->images))
            $exist = true;
        return $exist;
    }
    public function getImagenes(){
        return $this->images;
    }
}