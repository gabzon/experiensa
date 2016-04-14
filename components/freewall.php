<?php

/**
 * Class Freewall
 */
class Freewall{
    /**
     * @param $args
     */
    public static function display_flex_layout($args){
        $freewall="";
        if(empty($args)){
            echo $freewall;
        }else {
            $freewall .= "<div id=\"freewall\" class=\"free-wall\">";
            $images = "";
            foreach($args as $value){
                $image ="<div class='brick' style='width:{width}px;'><img src='".$value['image_url']."' width='100%'></div>";
                $px = rand(250,500);
                $images .= str_replace("{width}",$px,$image);
            }
            $freewall .= $images."</div>";
            echo $freewall;
        }
    }

    public static function display_image_layout($args){
        $freewall="";
        if(empty($args)){
            echo $freewall;
        }else {
            $freewall .= "<div id=\"freewall-image\" class=\"free-wall\">";
            $images = "";
            $height = rand(150,300);
            foreach($args as $value){
                $image ="<div class='freewall-cell' style='width:{width}px; height: {height}px; background-image: url(".$value['image_url'].")'></div>";
                $width = rand(250,500);
                $images .= str_replace("{height}",$height,str_replace("{width}",$width,$image));
            }
            $freewall .= $images."</div>";
            echo $freewall;
        }
    }
    public static function display_pinterest_layout($args){
        $freewall="";
        if(empty($args)){
            echo $freewall;
        }else {
            $freewall .= "<div id=\"freewall-pinterest\" class=\"free-wall\">";
            $images = "";
            foreach($args as $value){
                $image ="<div class='brick-pinterest'><img src='".$value['image_url']."' width='100%'><div class=\"info-pinterest\"><h5>Freewall</h5><h7>Pinterest layout</h7></div></div>";
                $images .= $image;
            }
            $freewall .= $images."</div>";
            echo $freewall;
        }
    }

    public static function display_win8_layout($args){
        $freewall="";
        if(empty($args)){
            echo $freewall;
        }else {
            $freewall .= "<div class=\"win8-layout\">
                            <div id=\"win8-freewall\" class=\"free-wall\">";
            $images = "";
            for($i=0;$i<count($args);$i++){
                if((($i+1)%2)!=0){
                    $image = "<div class=\"item size21 level1\">
                                <div class='win8-wallpaper' style='background: url(".$args[$i]['image_url'].") no-repeat center;'>
                                    <div class=\"win8-title\">
							            <h5><a href=\"http://vnjs.net/www/project/freewall/\">".$args[$i]['title']."</a></h5>
						            </div>
                                </div>
                              </div>";
                    $images .= $image;
                }else{
                    if($i+3<count($args)){
                        $image = "<div class=\"size22 level1\" data-fixSize=0 data-nested=\".size11\" data-cellW=150 data-cellH=150 data-gutterX=10 >";
                        for($j=$i;$j<=$i+3;$j++){
                            $image .= "<div class=\"item size11\">
                                            <div class='win8-wallpaper' style='background: url(".$args[$j]['thumbnail_url'].") no-repeat center;'>
                                            </div>
                                        </div>";
                        }
                        $images .= $image."</div>";
                        $i = $j - 1;
                    }else{
                        if($i+1<count($args)){
                            $image = "<div class=\"size21 level1\" data-fixSize=0 data-nested=\".size11\" data-cellW=150 data-cellH=150 data-gutterX=10 >";
                            for($j=$i;$j<=$i+1;$j++){
                                $image .= "<div class=\"item size11\">
                                                <div class='win8-wallpaper' style='background: url(".$args[$j]['thumbnail_url'].") no-repeat center;'>
                                                </div>
                                            </div>";
                            }
                            $images .= $image."</div>";
                            $i = $j - 1;
                        }else{
                            $image = "<div class=\"item size21 level1\">
                                <div class='win8-wallpaper' style='background: url(".$args[$i]['image_url'].") no-repeat center;'>
                                    <div class=\"win8-title\">
							            <h5><a href=\"http://vnjs.net/www/project/freewall/\">".$args[$i]['title']."</a></h5>
						            </div>
                                </div>
                              </div>";
                            $images .= $image;
                        }
                    }
                }

            }
            $freewall .= $images;
            $freewall .= "</div></div>";
            echo $freewall;
        }
    }
}
