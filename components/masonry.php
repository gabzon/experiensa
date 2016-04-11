<?php

Class Masonry{
    public static function display_masonry($args){
        $masonry="";
        if(empty($args)){
            echo $masonry;
        }else{
            $masonry .= "<div class=\"grid-masonry\">";
            $masonry .= "<div class=\"grid-sizer\"></div>";
            foreach($args as $value){
                $masonry .= "<div class=\"grid-item\">";
                    $masonry .= "<a href=\"".$value['post_link']."\">";
                        $masonry .= "<img src=\"".$value['image_url']."\">";
                        $masonry .= "<div class=\"grid-item-overlay\">";
                            $masonry .= "<div class=\"grid-item-overlay-background\"></div>";
                            $masonry .= "<div class=\"grid-item-title\" style=\"text-transform:uppercase\">";
                                $masonry .= "<h4>" . $value['title'] ."</h4><span>".$value['subtitle']."</span>";
                            $masonry .= "</div>";
                        $masonry .= "</div>";
                    $masonry .= "</a>";
                $masonry .= "</div>";
            }
            $masonry .= "</div>";
            echo $masonry;
        }
    }
}
?>
