<?php
  
  Class Masonry{
    public static function display_masonry($args){
      $masonry="";
      if(empty($args)){
        echo $masonry;
      }else{
        $masonry .= "<div class=\"grid-masonry\">";
        foreach($args as $value){
          $masonry .= "<div class=\"grid-item\">";
          $masonry .= "<div class=\"grid-sizer\"></div>";
          $masonry .= "<a href=\"".$value['post_link']."\">";
          $masonry .= "<div class=\"overlay\"></div>";
          $masonry .= "<div class=\"ui image\">";
          $masonry .= "<div class=\"ui dimmer\"><div class=\"content\"><div class=\"center\">";
          $masonry .= "<h2 class=\"ui inverted header\">".$value['title']."</h2>";
          $masonry .= "<div class=\"sub header\">".$value['subtitle']."</div>";
          $masonry .= "</div></div></div>";
          $masonry .= $value['thumbnail_image'];
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