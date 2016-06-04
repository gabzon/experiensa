<?php

Class Masonry{
    public static function display_masonry($args,$return = false){
        $masonry="";
        if(!empty($args)){
            $masonry .= "<div class=\"grid-masonry\">";
            $masonry .= "<div class=\"grid-sizer\"></div>";
            foreach($args as $value){
                $masonry .= "<div class=\"grid-item\">";
                    $masonry .= "<a href=\"".$value['post_link']."\">";
                        $masonry .= "<img src=\"".$value['image_url']."\">";
                        $masonry .= "<div class=\"grid-item-overlay\">";
                            $masonry .= "<div class=\"grid-item-overlay-background\"></div>";
                            $masonry .= "<div class=\"grid-item-title\">";
                                $masonry .= "<h4>" . ucwords($value['title']) ."</h4><span>".ucwords($value['subtitle'])."</span>";
                            $masonry .= "</div>";
                        $masonry .= "</div>";
                    $masonry .= "</a>";
                $masonry .= "</div>";
            }
            $masonry .= "</div>";
        }
        if($return === true)
            return $masonry;
        else
            echo $masonry;
    }
}
?>
