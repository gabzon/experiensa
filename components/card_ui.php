<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 15-04-2016
 * Time: 05:34 AM
 */
class Card{
    /**
     * @param bool $return
     * @param null $title
     * @param array $images
     * @param null $excerpt
     * @param null $price
     * @param array $contact
     * @param array $locations
     * @param null $all_data
     * @return string
     */
    public static function display_card_full($return = false,$title=null,$images=[],$excerpt=null, $price=null, $contact=[],$locations=[],$all_data=null){
        //$card = "<div class='simple_card'>";
        $card = "<div class=\"ui card\">";
        if(!empty($images)){
            $card .=    "<div class=\"image\">";
            if($price){
                $card .= "<div class=\"ui blue ribbon label\">
                            ".$price."
                        </div>";
            }
            $card .= Gallery::show_gallery_from_list($images,true);
            $card .=    "</div>";
        }else{
            if($price){
                $card .=    "<div class=\"extra content\">
                                ";
                $card .=        "<div class=\"ui blue ribbon label\">
                                    ".$price."
                                 </div>";
                $card .=    "</div>";
            }
        }
        if($title){
            $card .=    "<div class=\"content\">
                            ";
            if($price) {
                $card .=    "<div class=\"right floated\">
                            $price
                            </div>";
            }
            $card .=    "    <div class=\"header\">".$title."</div>
                        </div>";
        }
        if($excerpt ){
            $card .=    "<div class=\"extra content\">
                            <p>".$excerpt."</p>
                        </div>";
        }
        if(!empty($locations)){
            $card .= "<div class='content'>";
            $card .= "<i class=\"map marker icon\"></i> <strong>".__('Locations','sage')."</strong><br>";
            $card .= "<div class=\"meta right floated\">";
            foreach($locations as $location){
                $card .= "$location <br>";
            }
            $card .= "</div>";
            $card .= "</div>";
        }
        if(!empty($contact)){
            if(isset($contact['mail']) && isset($contact["modal"])){
                $card .= "<div class=\"ui two bottom attached buttons\">";
                $card .=    "<a href=\"".$contact['mail']."\" class=\"ui blue button\">
                                <i class=\"mail outline icon\"></i>"
                                . __('Contact us','sage').
                            "</a>";
                $card .=    "<div class=\"right floated\">
                                <button id=\"".$contact["modal"]."\" class=\"ui green button\" type=\"submit\" name=\"select\">
                                    <i class=\"eye icon\"></i>"
                                    . __('Details','sage').
                                "</button>
                            </div>";
                $card .= "</div>";
            }else{
                if(isset($contact['mail'])){
                    $card .=    "<a class=\"ui blue button\" href=\"".$contact['mail']."\">
                                    <i class=\"mail outline icon\"></i>
                                    ".__("Contact us","sage")."
                                </a>";
                }else{
                    $card .=    "<button id=\"".$contact["modal"]."\" class=\"ui green button\" type=\"submit\" name=\"select\">
                                    <i class=\"eye icon\"></i>"
                                    . __('Details','sage').
                                "</button>";
                }
            }
        }
        if(!empty($contact) && isset($contact["modal"])){
            $card .= Catalog::display_trip_detail($all_data,true);
        }
        $card .= "</div>";
        if(!empty($contact) && isset($contact["modal"])){
            $card .= Catalog::display_trip_detail($all_data,true);
        }
        //$card .= "</div>";
        if(!$return)
            echo $card;
        else
            return $card;
    }

}