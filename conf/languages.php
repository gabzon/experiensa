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
//------------------------------------------------------------------------------

?>
