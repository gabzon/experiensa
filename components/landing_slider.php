<?php

class Landing{

    public static function display_welcome_msg($welcome_msg,$images){
        $slider = "";
        $overlay = get_stylesheet_directory_uri() .  '/bower_components/vegas/dist/overlays/07.png';
        $slider .= "<script type=\"text/javascript\">
                        jQuery(function() {
                            jQuery('.voyage-slider').vegas({";
        $slider .= "overlay: '".$overlay."',
                        slides: [";
        if(!empty($images)){
            foreach($images as $img){
                $slider .= "{ src: '".$img['full_size']."' },";
            }
        }else{
            $default_img =get_stylesheet_directory_uri() . '/assets/images/mauritius.jpg';
            $slider .= "{ src: '".$default_img."' },";
        }
        $slider .= " ]
                });
            });
            </script>";
        $slider .= "<div class=\"voyage-slider main-slider\" style=\"height:100vh;\">
                        <div class=\"ui container\">
                            <br><br>
                            <div id=\"preview\" class=\"ui container\">
                                <div class=\"ui grid stackable\">";
                        //Only for phone size
                        $slider .= "<div class=\"mobile only row\">
                                        <div class=\"sixteen wide column\">
                                            <h1 class=\"font-white\">".get_bloginfo('name')."</h1>
                                                <p class=\"font-white\">".$welcome_msg."</p>
                                        </div>
                                    </div>";
                        //Only for tablet size
                        $slider .= "<div class=\"tablet only row\">
                                        <div class=\"ui grid\">
                                            <div class=\"ten wide column\">
                                                <h1 class=\"font-white\">".get_bloginfo('name')."</h1>
                                                <p class=\"font-white\">".$welcome_msg."</p>
                                            </div>
                                        </div>
                                    </div>";
                        //Only for computer size
                        $slider .= "<div class=\"computer only row\">
                                        <div class=\"ui grid\">
                                            <div class=\"ten wide column\">
                                                <div>
                                                    <h1 class=\"font-white\">".get_bloginfo('name')."</h1>
                                                    <p>".$welcome_msg."</p>
                                                </div>
                                            </div>
                                            <div class=\"one wide column\"></div>
                                            <div class=\"five wide column\">
                                                <?php get_template_part('templates/voyage/preview-table'); ?>
                                            </div>
                                        </div>
                                    </div>";

            $slider .= "        </div>
                            </div>
                        </div>
                    </div>";
        echo $slider;
    }

    public static function display_voyages($query){
        $voyages = "";
        if ($query->have_posts()) :
            $voyages .= "<div id=\"slides\" class='main-slider'>";
                $voyages .= "<ul class=\"slides-container\">";
                while ($query->have_posts()):
                    $query->the_post();
                    $voyages .= " <li>";
                    $id = $query->post->ID;
                    $post = get_post($id);
                    $feature_image = wp_get_attachment_url(get_post_thumbnail_id($id));
                    $voyages .= "<img src=\"$feature_image\" alt=\"\" class=\"ui image\"/>";
                    $voyages .= "<div class=\"ui container\">
                                    <div class=\"ui grid\">
                                        <div class=\"twelve wide column\" id=\"slider-text\">
                                            <h1 class=\"fitText\" style=\"text-transform:uppercase\">".get_the_title ($id)."</h1>
                                            <h4>".get_the_excerpt()."</h4>
                                            <br>
                                            <a href=\"".get_permalink ($id)."\" class=\"ui huge animated fade inverted button\" tabindex=\"0\">
                                                <div class=\"visible content\">".
                                                    Voyage::price($id)
                                                ."</div>
                                                <div class=\"hidden content\">
                                                    ".__('More info', 'sage')."
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>";
                    $voyages .= " </li>";
                endwhile;
                $voyages .= "</ul>";
            $voyages .= "</div>";
        else:
            $voyages .= "<h3>".__("Sorry, No voyages","sage")."</h3>";
        endif;
        echo $voyages;
        wp_reset_postdata();
    }
}