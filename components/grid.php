<?php
//Semantic UI grid
Class Grid {
  public static function display_grid($args){
    $grid = "";
    if(empty($args)){
      echo $grid;
    }else{
      $grid .= "<div class=\"ui grid\">";
      foreach($args as $value){
        $grid .= "<div class=\"four wide column\">";
        $grid .= "<a href=\"".$value['post_link']."\" target=\"_blank\">";
        $grid .= "<div class=\"ui raised segments\">";
        $grid .= "<div class=\"ui segment\">".$value['title']."</div>";
        $grid .= "<div class=\"ui secondary segment\"><img src=\"".$value['thumbnail_url']."\"></div>";
        $grid .= "</div>";
        $grid .= "</a>";
        $grid .= "</div>";
      }
      $grid .= "</div>";
      echo $grid;
    }
  }
}
