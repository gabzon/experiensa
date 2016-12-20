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
    private $data;
    function __construct($component,$post_type=['media'],$taxonomy='media_category',$terms=['landing'],$message=false)
    {
        $this->component = $component;
        $this->post_type = $post_type;
        $this->taxonomy = $taxonomy;
        $this->terms = $terms;
        $this->message = $message;
        $this->setData();
    }

    private function setData(){
        $post_type = $this->post_type;
        $taxonomy = $this->taxonomy;
        $terms = $this->terms;
        file_put_contents("debug_prueba.txt", $this->post_type);
        file_put_contents("debug_prueba.txt", $this->taxonomy,FILE_APPEND);
        file_put_contents("debug_prueba.txt", $this->terms,FILE_APPEND);
        if($this->component=='vegas') {
            file_put_contents("debug_prueba.txt","**vegas**",FILE_APPEND);
            $data = QueryBuilder::getImagesByPostType($post_type, $taxonomy, $terms);
        }else {
            $data = QueryBuilder::getPostBasicInfo($post_type, $taxonomy, $terms, false);
            file_put_contents("debug_prueba.txt","SUPERslider",FILE_APPEND);
        }
        $debug_export = var_export($data, true);
        file_put_contents("debug_prueba.txt",$debug_export,FILE_APPEND);
        $this->data = $data;
    }

    public function checkExistData(){
        $exist = false;
        if(!empty($this->data))
            $exist = true;
        return $exist;
    }
    public function getImages(){
        return $this->data;
    }
    public function showSlider($id = false){
        if($id === false){
            if($this->component=='vegas')
                $id = 'vegas';
            else
                $id = 'slides';
        }
        if($this->checkExistData())
            $data = $this->data;
        else{
            if($this->component=='vegas')
                $data[] = get_stylesheet_directory_uri() . '/assets/images/mauritius.jpg';
            else{
                $row['id'] = '-1';
                $row['title'] = __('Posts no found','sage');
                $row['content'] = '';
                $row['excerpt'] = '';
                $row['url'] = '#';
                $row['image'] = get_stylesheet_directory_uri() . '/assets/images/mauritius.jpg';
                $data[] = $row;
            }
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