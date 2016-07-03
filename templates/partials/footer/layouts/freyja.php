<?php
$bg_color = Components\Footer\Footer::getBackgroundColor();
$bg = "background-color:".$bg_color.";";
$font_color = \Components\Footer\Footer::getFontColor();
$font = "color:".$font_color.";";
$style = $bg.$font;
$container = \Components\Footer\Footer::getContainer();
?>
<!-- Thor Footer Template -->
<footer class="ui segment vertical" style="<?=$style;?>">
    <div id="footer-container" class="<?= $container['class'];?>" style="<?= $container['style'];?>">
        <div class="ui two column grid stackable">
            <!-- Logo Section -->
            <div class="left floated column">
                <?php \Components\Footer\Footer::displayLogoItem(); ?>
            </div>
            <!-- Social Network Section -->
            <div class="right floated right aligned column" style="margin-top: auto;">
                <?php \Components\Footer\Footer::displaySocialItems(); ?>
            </div>
        </div>
        <div class="ui five column grid stackable">
            <!-- Contact Section -->
            <div class="column">
                <br>
                <div class="ui medium list">
                    <?php \Components\Footer\Footer::displayContactItems(); ?>
                </div>
            </div>
            <!-- Location Section -->
            <div class="right floated column">
                <br>
                <div class="ui medium list">
                    <?php \Components\Footer\Footer::displayLocationItems(); ?>
                </div>
            </div>
            <!-- Schedule Section-->
            <div class="right floated column" id="footer-schedule">
                <br>
                <div class="ui medium list">
                    <?php \Components\Footer\Footer::displayScheduleItems(); ?>
                </div>
            </div>
        </div>
    </div>
</footer>