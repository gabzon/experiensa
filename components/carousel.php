<?php // carousel
class Carousel{
    public static function display_carousel($args){
      $carousel="";
      if(empty($args)){
        echo $carousel;
      }else{
        $carousel .= "<div class=\"owl-carousel\">";
        foreach($args as $value){
          $carousel .= "<div class=\"item promotion-item\">";
          $carousel .= "<a href=\"".$value['post_link']."\">";
          $carousel .= "<div class=\"overlay\"></div>";
          $carousel .= "<div class=\"ui image\">";
          $carousel .= "<div class=\"ui dimmer\"><div class=\"content\"><div class=\"center\">";
          $carousel .= "<h2 class=\"ui inverted header\">".$value['title']."</h2>";
          $carousel .= "<div class=\"sub header\">".$value['subtitle']."</div>";
          $carousel .= "</div></div></div>";
          $carousel .= "<img src=\"".$value['image_url']."\" alt=\"\"/>";
          $carousel .= "</div>";
          $carousel .= "</a>";
          $carousel .= "</div>";
        }
        $carousel .= "</div>";
        echo $carousel;
      }
    }
    
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
          //$carousel .= "<div class=\"overlay\"></div>";
          /*$carousel .= "<div class=\"ui image\">";
          $carousel .= "<div class=\"ui dimmer\"><div class=\"content\"><div class=\"center\">";
          $carousel .= "<h2 class=\"ui inverted header\">".$value['title']."</h2>";
          $carousel .= "<div class=\"sub header\">".$value['subtitle']."</div>";
          $carousel .= "</div></div></div>";
          $carousel .= "<img src=\"".$value['image_url']."\" alt=\"\"/>";
          $carousel .= "</div>";*/
          $carousel .= "</a>";
          $carousel .= "</div>";
        }
        $carousel .= "</div>";
        echo $carousel;
      }
    }
}
?>
