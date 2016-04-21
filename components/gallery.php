<?php

class Gallery{
    public static function display_gallery($id, $gallery,$i = NULL){

        ?>
        <?php if ( $gallery[$i] > 1 ) : ?>
            <div class="owl-carousel" style="margin-bottom:0">
                <?php foreach ($gallery[$i] as $image): ?>
                    <?php if (!($image == "undefined")): ?>
                        <div>
                            <img src="<?= wp_get_attachment_url($image); ?>" class="ui image" alt="" />
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <?php $image = $gallery[$i][0]; ?>
            <?php if (!($image == "undefined")): ?>
                <div>
                    <img src="<?= wp_get_attachment_url($image); ?>" class="ui image" alt="" />
                </div>
            <?php endif; ?>
        <?php endif ?>

        <?php
    }
    public static function show_gallery($photos){
      $gallery="";
      if(!empty($photos)){
        $gallery.="<div class=\"owl-carousel\" style=\"margin-bottom:0\">";
        foreach($photos as $image){
          if (!($image == "undefined")){
            $gallery.="<div>";
            $url=wp_get_attachment_url($image);
            $gallery.="<img src=\"".$url."\" class=\"ui image\" alt=\"\" />";
            $gallery.="</div>";
          }
        }
        $gallery.="</div>";
      }
      echo $gallery;
    }

    /**
     * @param $images images array list
     * @param bool $return to check if $gallery will be returned or just echo
     * @param bool $full to check if image size used will be full size
     * @return string
     */
    public static function show_gallery_from_list($images,$return=false,$full=true){
        $gallery="";
        if(!empty($images)){
            $gallery.="<div class=\"owl-carousel\" style=\"margin-bottom:0\">";
            foreach($images as $image){
                $gallery.="<div>";
                if($full===true)
                    $url=$image['full_size'];
                else
                    $url=$image['thumbnail_size'];
                $gallery.="<img src=\"".$url."\" class=\"ui image\" alt=\"\" />";
                $gallery.="</div>";
            }
            $gallery.="</div>";
        }
        if($return===true)
            return $gallery;
        else
            echo $gallery;
    }
    // Display owl-carousel with only one image
    public static function display_slider($id, $gallery,$i = NULL){
        ?>
        <?php if ( $gallery[$i] > 1 ) : ?>
            <div class="owl-carousel owl-slider" style="margin-bottom:0">
                <?php foreach ($gallery[$i] as $image): ?>
                    <?php if (!($image == "undefined")): ?>
                        <div>
                            <img src="<?= wp_get_attachment_url($image); ?>" class="ui image" alt="" />
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <?php $image = $gallery[$i][0]; ?>
            <?php if (!($image == "undefined")): ?>
                <div>
                    <img src="<?= wp_get_attachment_url($image); ?>" class="ui image" alt="" />
                </div>
            <?php endif; ?>
        <?php endif ?>

        <?php
    }
}
