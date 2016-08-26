<?php

class Accommodations{

    public static function display_accommodations( $accommodations ){
        $display = '';
        if(!empty($accommodations)){
            foreach ($accommodations as $accommodation){
                if(isset($accommodation['establishment_name']) && !empty($accommodation['establishment_name'])){
                    $display .= "<div class=\"content\"><br>";
                    $display .=     "<strong>".__('Accommodation','sage')."</strong><br><br>";
                    $display .=     "<div class=\"meta right floated\">";
                    $display .=         $accommodation['establishment_rating'].' '.__('Stars','sage').'<br>';
                    $display .=     "</div>";


                    $display .=     $accommodation['establishment_name'] . '<br>';
                    $display .=     "<strong>".__('Type','sage').": </strong>".$accommodation['establishment_type'] . '<br>';

                    if($accommodation['establishment_checkout_date']):
                        $display .= "<div class=\"meta right floated\">";
                        $display .=     "<strong>". __('Check-out','sage')."</strong><br>";
                        $display .=     $accommodation['establishment_checkout_date'] . '<br>';
                        $display .=     $accommodation['establishment_checkout_time'];
                        $display .= "</div>";
                    endif;
                    if($accommodation['establishment_checkin_date']):
                        $display .= "<div class=\"meta\">";
                        $display .=     "<strong>". __('Check-in','sage')."</strong><br>";
                        $display .=     $accommodation['establishment_checkin_date'] . '<br>';
                        $display .=     $accommodation['establishment_checkin_time'];
                        $display .= "</div>";
                    endif;
                    if(!empty($accommodation['establishment_gallery']) && !empty($accommodation['establishment_gallery'][0])) {
                        $display .= "<div class=\"image\">";
                        $display .= Gallery::show_gallery($accommodation['establishment_gallery'], true);
                        $display .= "</div>";
                    }
                    $display .=     "<div class=\"content\">";
                    $display .=         "<a class=\"header\"></a>";
                    $display .=         "<div class=\"meta\">";
                    $display .=             "<span class=\"date\">".$accommodation['establishment_comments']."</span>";
                    $display .=         "</div>";
                    $display .=     "</div>";
                    $display .= "</div>";
                }

            }
        }
        echo $display;
    }
}