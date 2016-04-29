<?php
//Only for images
$post_id = $post->ID;

$img_url = wp_get_attachment_url($post_id);
$filename = basename( get_attached_file( $post_id ) ); // Just the file name
$thumb = wp_get_attachment_thumb_url($post_id);
$medium = wp_get_attachment_image_src($post_id,'medium')[0];
?>
<div id="preview" class="ui container">
    <div class="ui segment">
        <img class="ui fluid rounded image" src="<?= $img_url;?>">
        <div class="three ui buttons">
            <a href="<?= $thumb?>" class="ui orange button" download><?= __('Small Size','sage');?></a>
            <a href="<?= $medium?>" class="ui blue button" download><?= __('Medium Size','sage');?></a>
            <a href="<?= $img_url?>" class="ui green button" download><?= __('Full Size','sage');?></a>
        </div>
    </div>
</div>
