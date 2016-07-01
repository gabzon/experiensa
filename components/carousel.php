<?php // carousel
class Carousel{
    public static function display_carousel2($args){
        get_template_part('templates/partials/showcase/carousel/carousel');
    }
    /**
     * Create and display carousel component with images from $args param
     * @param $args
     * @param bool $return
     * @return string
     */
    public static function display_carousel($args,$return = false){
        $carousel="";
        if(!empty($args)){
            $carousel .= "<div class=\"owl-carousel\">";
            foreach($args as $value){
                $carousel .= "<div class=\"carousel-component\">";
                $carousel .=    "<a href=\"".$value['post_link']."\" target=\"_blank\">";
                $carousel .=    "<div class=\"overlay\"></div>";
                $carousel .=        "<div class=\"ui image\">";
                $carousel .=            "<h2 class=\"carousel-title\">" .$value['title'] ."</h2>";
                $carousel .=            "<div class=\"ui dimmer\">
                                            <div class=\"content\">
                                                <div class=\"center\">";
                //$carousel .=                        "<h2 class=\"ui inverted header\">" .$value['title'] ."</h2>";
                $carousel .=                        "<div class=\"sub header\">".$value['subtitle']."</div>";
                $carousel .=                    "</div>
                                            </div>
                                        </div>";
                $carousel .=            "<img src=\"".$value['image_url']."\" alt=\"\"/>";
                $carousel .=        "</div>";
                $carousel .=    "</a>";
                $carousel .= "</div>";
            }
            $carousel .= "</div>";
        }
        if($return === true)
            return $carousel;
        else
            echo $carousel;
    }

    /**
     * Create and display carousel component only with text from $args param
     * @param $args
     */
    public static function display_casousel_text($args){
        $carousel="";
        if(empty($args)){
            echo $carousel;
        }else{
            $carousel .= "<div class=\"owl-carousel\">";
            foreach($args as $value){
                $carousel .= "<div class=\"item\">";
                $carousel .= "<a href=\"".$value['post_link']."\">";
                $carousel .= "<h4>".$value['title']."</h4><br>";
                $carousel .= "<p>".$value['subtitle']."</p><br>";
                $carousel .= "</a>";
                $carousel .= "</div>";
            }
            $carousel .= "</div>";
            echo $carousel;
        }
    }
}
?>
