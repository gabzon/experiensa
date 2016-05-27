<?php

/**
 * Class Freewall
 */
class Freewall{
    /**
     * Display or return $freewall flex layout
     * @param $args{
     *      @type string $image_url url of the image to display
     * }
     * @return string
     */
    public static function display_flex_layout($args,$return=false){
        $freewall="";
        if(!empty($args)){
            $freewall .= "<div id=\"freewall\" class=\"free-wall\">";
            $images = "";
            foreach($args as $value){
                $image = (isset($value['post_link'])?"<a href=\"".$value['post_link']."\">":"");
                $image .=    "<div class='brick' style='width:{width}px;'>
                                <div class=\"ui image\">
                                    <div class=\"ui dimmer\">
                                        <div class=\"content\">
                                            <div class=\"center\">
                                                <h2 class=\"ui inverted header\">".$value['title']."</h2>
                                                <div class=\"sub header\">".$value['subtitle']."</div>
                                            </div>
                                        </div>
                                    </div>
                                    <img src='".$value['image_url']."' width='100%'>
                                </div>

                            </div>";
                $image .= (isset($value['post_link'])?"</a>":"");
                $px = rand(250,500);
                $images .= str_replace("{width}",$px,$image);
            }
            $freewall .= $images."</div>";
        }
        if($return)
            return $freewall;
        echo $freewall;
    }

    /**
     * Display or return $freewall image layout
     * @param $args {
            @type string $image_url url of the image to display
     * }
     * @param bool $return
     * @return string
     */
    public static function display_image_layout($args,$return=false){
        $freewall="";
        if(!empty($args)){
            $freewall .= "<div id=\"freewall-image\" class=\"free-wall\">";
            $images = "";
            //$height = rand(150,300);
            foreach($args as $value){
                $width = rand(250,500);
                $images .= (isset($value['post_link'])?"<a href=\"".$value['post_link']."\">":"");
                $images .=  "<div class='freewall-cell' style='width:".$width."px; height: 160px;'>";
                $images .=      "<div class=\"ui image\">";
                $images .=          "<div class=\"ui dimmer\">";
                $images .=              "<div class=\"content\">";
                $images .=                  "<div class=\"center\">";
                $images .=                      "<h2 class=\"ui inverted header\">".$value['title']."</h2>";
                $images .=                          "<div class=\"sub header\">".$value['subtitle']."</div>";
                $images .=                  "</div>";
                $images .=              "</div>";
                $images .=          "</div>";
                $images .=          "<img src='".$value['image_url']."'>";
                $images .=      "</div>";
                $images .= "</div>";
                $images .= (isset($value['post_link'])?"</a>":"");
            }
            $freewall .= $images."</div>";

        }
        if($return)
            return $freewall;
        echo $freewall;
    }

    /**
     * Display or return $freewall pinterest layout
     * @param $args {
            @type string $image_url url of the image to display
     * }
     * @param bool $return
     * @return string
     */
    public static function display_pinterest_layout($args,$return = false){
        $freewall="";
        if(!empty($args)){
            $freewall .= "<div id=\"freewall-pinterest\" class=\"free-wall\">";
            $images = "";
            foreach($args as $value){
                $image = (isset($value['post_link'])?"<a href=\"".$value['post_link']."\">":"");
                $image .="<div class='brick-pinterest'>
                            <div class=\"ui image\">
                                <div class=\"ui dimmer\">
                                    <div class=\"content\">
                                        <div class=\"center\">
                                            <h2 class=\"ui inverted header\">".$value['title']."</h2>
                                            <div class=\"sub header\">".$value['subtitle']."</div>
                                        </div>
                                    </div>
                                </div>
                                <img src='".$value['image_url']."' width='100%'>
                            </div>
                            <div class=\"info-pinterest\">
                                <h5>".$value['title']."</h5>
                                <h7>".$value['subtitle']."</h7>
                            </div>
                        </div>";
                $image .= (isset($value['post_link'])?"</a>":"");
                $images .= $image;
            }
            $freewall .= $images."</div>";
        }
        if($return)
            return $freewall;
        echo $freewall;
    }

    /**
     * Display or return $freewall like windows 8 start menu layout
     * @param $args {
     *      @type string $image_url url of the image to display
     *      @type string $title title of the post
     * }
     * @param bool $return
     * @return string
     */
    public static function display_win8_layout($args,$return = false){
        $freewall="";
        if(!empty($args)){
            $freewall .= "<div class=\"win8-layout\">
                            <div id=\"win8-freewall\" class=\"free-wall\">";
            $images = "";
            for($i=0;$i<count($args);$i++){
                if((($i+1)%2)!=0){
                    $image = "<div class=\"item size21 level1\">
                                <div class='win8-wallpaper'>
                                    <img src=\"".$args[$i]['image_url']."\">
                                    <div class=\"win8-title\">
                                        <div class=\"ui black label\"><a href=\"".$args[$i]['post_link']."\">".$args[$i]['title']."</a></div>
                                    </div>
                                </div>
                              </div>";
                    $images .= $image;
                }else{
                    if($i+3<count($args)){
                        $image = "<div class=\"size22 level1\" data-fixSize=0 data-nested=\".size11\" data-cellW=150 data-cellH=150 data-gutterX=10 >";
                        for($j=$i;$j<=$i+3;$j++){
                            $image .= "<div class=\"item size11\">
                                            <div class='win8-wallpaper'>
                                                <img src=\"".$args[$j]['thumbnail_url']."\">
                                                <div class=\"win8-title\">
							                        <div class=\"win8-title\">
                                                        <div class=\"ui black label\"><a href=\"".$args[$j]['post_link']."\">".$args[$j]['title']."</a></div>
						                            </div>
						                        </div>
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
                                                <div class='win8-wallpaper'>
                                                    <img src=\"".$args[$j]['thumbnail_url']."\">
                                                    <div class=\"win8-title\">
                                                        <div class=\"ui black label\"><a href=\"".$args[$j]['post_link']."\">".$args[$j]['title']."</a></div>
						                            </div>
                                                </div>
                                            </div>";
                            }
                            $images .= $image."</div>";
                            $i = $j - 1;
                        }else{
                            $image = "<div class=\"item size21 level1\">
                                <div class='win8-wallpaper'>
                                    <img src=\"".$args[$i]['image_url']."\">
                                    <div class=\"win8-title\">
                                        <div class=\"ui black label\"><a href=\"".$args[$i]['post_link']."\">".$args[$i]['title']."</a></div>
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
        }
        if($return)
            return $freewall;
        echo $freewall;
    }
}
