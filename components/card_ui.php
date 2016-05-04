<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 15-04-2016
 * Time: 05:34 AM
 */
class Card{
    /**
     * Display or return semantic ui card component layout
     * @param bool $return to check if $card string will be returned or just shown
     * @param null $title title to show
     * @param array $images list of images to show
     * @param null $excerpt content to show
     * @param null $price price to show
     * @param null $url link to website
     * @param null $url_name website name
     * @param array $contact{
     *      @type string $mail contact mail
     *      @type string $modal class name to open datail modal
     * }
     * @param array $locations list of all locations to show
     * @param null $all_data list all data obtained from apim this is for show detail modal data
     * @return string $card semantic ui card component layout
     */
    public static function display_card_full($return = false,$title=null,$images=[],$excerpt=null, $price=null, $url=null,$url_name=null,$contact=[],$locations=[],$all_data=null){
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
        if($url && $url_name){
            $card .= "<div class=\"extra content\">";
            $card .=    "<div class=\"right floated author\">";
            $card .=        "<a href=\"".$url."\">".__('Offered by','sage').' '.$url_name."</a>";
            $card .=    "</div>";
            $card .= "</div>";
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
        if(!$return)
            echo $card;
        else
            return $card;
    }

    public static function display_card_simple($args,$return=false){
        $card = "";
        if(!empty($args)){
            $card .= "<div class=\"ui four stackable cards\">";
            foreach($args as $value){
                $card .= "<a href='".$value['post_link']."' target=\"_blank\">";
                $card .= "<div class=\"ui card\">";
                $card .=    "<div class=\"image\">";
                $card .=        "<img src='".$value['image_url']."'>";
                $card .=    "</div>";
                $card .=    "<div class=\"content\">";
                $card .=        "<div class=\"header\">".$value['title']."</div>";
                $card .=    "</div>";
                if(isset($value['subtitle']) && !empty($value['subtitle'])) {
                    $card .= "<div class=\"extra content\">";
                    $card .=    $value['subtitle'];
                    $card .= "</div>";
                }
                $card .= "</div>";
                $card .= "</a>";
            }
            $card .= "</div>";
        }
        if(!$return)
            echo $card;
        else
            return $card;
    }
}
