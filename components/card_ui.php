<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 15-04-2016
 * Time: 05:34 AM
 */
class Card{
    public static function display_card_full($title,$image,$excerpt, $contact){
        $card = "<div class=\"ui card\">";
        if($title){
            $card .=    "<div class=\"content\">
                            <div class=\"header\">".$title."</div>
                        </div>";
        }
        if($image ){
            $card .=    "<div class=\"image\">
                            <img src=\"".$image."\">
                        </div>";
        }
        if($excerpt ){
            $card .=    "<div class=\"extra content\">
                            <p>".$excerpt."</p>
                        </div>";
        }
        if($contact){
            $card .=    "<div class=\"ui bottom blue button\">
                            <a href=\"".$contact."\">
                            <i class=\"mail outline icon\"></i>
                                ".__("Contact us","sage")."
                            </a>
                        </div>";
        }
        $card .= "</div>";
        echo $card;
    }
}