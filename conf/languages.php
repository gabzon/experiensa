<?php

function display_languages_button($option,$style){
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if(!empty($languages)){
        echo '<div id="select-language" class="ui languages floating dropdown labeled icon link '. $style . ' ' . $option['header_language_button_color'][0] . ' button">';
        echo '<i class="translate icon"></i>';
        echo '<span class="text">'. __('Languages','sage') .'</span>';
        echo '<div class="menu">';
        foreach($languages as $l){
            echo '<div class="item">';
            if(!$l['active']) echo '<a href="'.$l['url'].'">';
            echo icl_disp_language($l['native_name'], $l['translated_name']);
            if(!$l['active']) echo '</a>';
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
    }
}
function display_language_menu($color=null){
    $background = (!$color || $color==''?'black':$color);
  $menu = "";
  $languages = icl_get_languages('skip_missing=0&orderby=code');
  if(!empty($languages)){
    $menu .= "<div id=\"language-menu\" class=\"ui dropdown item\" style='background:".$background.";'>";
    $menu .=    '<i class="translate icon"></i>';
    $menu .=    "<div class=\"text\">".__('Languages','sage')."</div>";
    $menu .=    '<i class="dropdown icon"></i>';
    $menu .=    "<div class=\"menu\" style='background:".$background.";'>";
    foreach($languages as $l){
      if(!$l['active']){
        $menu .=    '<div class="item">';
        $menu .=        "<a class=\"item\" href=\"".$l['url']."\">";
        $menu .=            icl_disp_language($l['native_name'], $l['translated_name']);
        $menu .=        '</a>';
        $menu .=    "</div>";
      }else{
        $menu .=    '<div class="item active">';
        $menu .=        "<a class=\"item\" href=\"#\">";
        $menu .=            icl_disp_language($l['native_name'], $l['translated_name']);
        $menu .=        '</a>';
        $menu .=    "</div>";
      }
    }
    $menu .=    "</div>";
    $menu .= "</div>";
    echo $menu;
  }
}
function display_language_menu_accordion(){
  $menu = "";
  $languages = icl_get_languages('skip_missing=0&orderby=code');
  if(!empty($languages)){
    $menu .= '<div class="ui inverted accordion">';
    $menu .= '<div class="active title">';
    $menu .= '<i class="dropdown icon"></i>';
    $menu .= __('Languages','sage');
    $menu .= '<i class="translate icon"></i>';
    $menu .= '</div>';
    $menu .= '<div class="active content">';
    foreach($languages as $l){
      if(!$l['active']){
      $menu .= "<a class=\"item\" href=\"".$l['url']."\">";
      $menu .= icl_disp_language($l['native_name'], $l['translated_name']);
      $menu .= '</a>';
      }else{
        $menu .= "<a class=\"item\" href=\"#\">";
        $menu .= icl_disp_language($l['native_name'], $l['translated_name']);
        $menu .= '</a>';
      }
    }
    $menu .= "</div>";
    $menu .= "</div>";
  }
  echo $menu;
}
//------------------------------------------------------------------------------

?>
