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
        <div class="ui seven column grid stackable">
            <!-- Copyright Section -->
            <div class="column">
                <br>
                <?php if(\Components\Footer\Footer::getIfDisplayCopyright()): ?>
                <div class="item"><?= __('Copyright © All rights reserved','sage');?></div>
                <?php endif;?>
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
            <!-- Logo Section -->
            <div class="ui center aligned column">
                <?php \Components\Footer\Footer::displayLogoItem(); ?>
            </div>
            <!-- Contact Section -->
            <div class="column">
                <br>
                <div class="ui medium list">
                    <?php \Components\Footer\Footer::displayContactItems(); ?>
                </div>
            </div>
            <!-- Social Network Section -->
            <div class="column center aligned">
                <br><br>
                <?php \Components\Footer\Footer::displaySocialItems(); ?>
            </div>
            <div class="column right ">
                <?php get_template_part('templates/partials/footer/footer','menu');?>
            </div>
        </div>
    </div>
</footer>
