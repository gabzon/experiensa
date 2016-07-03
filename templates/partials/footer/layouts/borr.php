<?php
$bg_color = Components\Footer\Footer::getBackgroundColor();
$bg = "background-color:".$bg_color.";";
$font_color = \Components\Footer\Footer::getFontColor();
$font = "color:".$font_color.";";
$style = $bg.$font;
$container = \Components\Footer\Footer::getContainer();
?>
<!-- Baldur Footer Template -->
<footer class="ui segment vertical" style="<?=$style;?>">
    <div id="footer-container" class="<?= $container['class'];?>" style="<?= $container['style'];?>">
        <div class="ui five column grid stackable">
            <!-- Social Network Section -->
            <div class="column center aligned">
                <br><br>
                <?php \Components\Footer\Footer::displaySocialItems(); ?>
            </div>
            <!-- Contact Section -->
            <div class="column">
                <br>
                <div class="ui medium list">
                    <?php \Components\Footer\Footer::displayContactItems(); ?>
                </div>
            </div>
            <!-- Logo Section -->
            <div class="ui center aligned column">
                <?php \Components\Footer\Footer::displayLogoItem(); ?>
            </div>
            <!-- Location Section -->
            <div class="column">
                <br>
                <div class="ui medium list">
                    <?php \Components\Footer\Footer::displayLocationItems(); ?>
                </div>
            </div>
            <!-- Schedule Section-->
            <div class="column" id="footer-schedule">
                <br>
                <div class="ui medium list">
                    <?php \Components\Footer\Footer::displayScheduleItems(); ?>
                </div>
            </div>
        </div>
    </div>
</footer>
