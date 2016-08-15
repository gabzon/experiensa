<?php
    $bg_color = Components\Footer\Footer::getBackgroundColor();
    $bg = "background-color:".$bg_color.";";
    $font_color = \Components\Footer\Footer::getFontColor();
    $font = "color:".$font_color.";";
    $style = $bg.$font;
    $container = \Components\Footer\Footer::getContainer();
?>
<!-- Yggdrasil Footer Template -->
<footer class="ui segment vertical" style="<?=$style;?>">
    <div id="footer-container" class="<?= $container['class'];?>" style="<?= $container['style'];?>">
        <div class="ui four column grid stackable">
            <!-- Location Section -->
            <div class="column">
                <br>
                <div class="ui medium list">
                    <?php \Components\Footer\Footer::displayLocationItems(); ?>
                </div>
            </div>
            <!-- Contact Section -->
            <div class="column">
                <br>
                <div class="ui medium list">
                    <?php \Components\Footer\Footer::displayContactItems(); ?>
                </div>
            </div>
            <!-- Schedule Section-->
            <div class="column" id="footer-schedule">
                <br>
                <div class="ui medium list">
                    <?php \Components\Footer\Footer::displayScheduleItems(); ?>
                </div>
            </div>
            <!-- Social Network Section -->
            <div class="column center aligned">
                <br><br>
                <?php \Components\Footer\Footer::displaySocialItems(); ?>
            </div>

        </div>
        <div class="ui centered grid">
        <!-- Logo Section -->
            <?php \Components\Footer\Footer::displayLogoItem(); ?>
        </div>
    </div>
</footer>