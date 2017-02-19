<?php
$images = '';
foreach($data as $img):
    $images .= $img.",";
endforeach;
$images = rtrim($images,',');
$overlay = get_stylesheet_directory_uri() .  '/bower_components/vegas/dist/overlays/07.png';
?>
<div class="vegas-images" data-img="<?=$images;?>" style="display: none;"></div>
<div class="vegas-overlays" data-overlay="<?= $overlay;?>" style="display: none;"></div>
<section id="<?= $name;?>" class="voyage-slider main-slider" style="height:100vh;">
    <div class="ui container">
        <br><br>
        <div id="preview" class="ui container">
            <div class="ui grid stackable">
                <div class="mobile only row">
                    <div class="sixteen wide column">
                        <h1 style="<?=$title_color;?>"><?=$layout['title'];?></h1>
                        <p style="<?=$subtitle_color;?>"><?=$layout['subtitle'];?></p>
                    </div>
                </div>
                <div class="tablet only row">
                    <div class="ui grid">
                        <div class="ten wide column">
                            <h1 style="<?=$title_color;?>"><?=$layout['title'];?></h1>
                            <p style="<?=$subtitle_color;?>"><?=$layout['subtitle'];?></p>
                        </div>
                    </div>
                </div>
                <div class="computer only row">
                    <div class="ui grid">
                        <div class="column">
                            <div class="content">
                                <h1 style="<?=$title_color;?>"><?=$layout['title'];?></h1>
                                <p style="<?=$subtitle_color;?>"><?=$layout['subtitle'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>