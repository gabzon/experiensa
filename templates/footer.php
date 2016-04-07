<?php
$agency_options = get_option('agency_settings');
$logo = $agency_options['agency_logo'];
$design_options = get_option('experiensa_design_settings');
$section = $design_options['footer_section_group'];
$color = $section['footer_section_color'][0];
$inverted = $section['footer_section_inverted'][0];
?>

<footer class="ui segment <?= get_the_color($color, $inverted[0]); ?> vertical">
    <div class="ui container">
        <div class="ui five column grid stackable">
            <div class="ui center aligned column">
                <?php if ($logo): ?>
                    <br>
                    <img class="ui image" src="<?php echo wp_get_attachment_url($logo);?>" width="150" />
                <?php else: ?>
                    <img src="//placehold.it/200x100" />
                <?php endif; ?>
            </div>

            <div class="column">
                <br>
                <div class="ui medium list">
                    <div class="item">
                        <i class="top aligned home icon"></i>
                        <div class="content">
                            <?php echo $agency_options['agency_address']; ?><br/>
                            <?php echo $agency_options['agency_postal_code']; ?> <?php echo $agency_options['agency_city']; ?><br/>
                            <?php echo $agency_options['agency_country']; ?><br/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <br>
                <div class="ui medium list">
                    <?php if ($agency_options['agency_email']): ?>
                        <div class="item">
                            <i class="mail icon"></i>
                            <div class="content">
                                <?php echo $agency_options['agency_email']; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($agency_options['agency_phone']): ?>
                        <div class="item">
                            <i class="call icon"></i>
                            <div class="content">
                                <?php echo $agency_options['agency_phone']; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($agency_options['agency_fax']):?>
                        <div class="item">
                            <i class="fax icon"></i>
                            <div class="content">
                                <?php echo $agency_options['agency_fax']; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="column" id="footer-schedule">
                <br>
                <div class="ui medium list">
                    <div class="item">
                        <?php echo $agency_options['agency_schedule']; ?>
                    </div>
                </div>
            </div>
            <div class="column center aligned">
                <br><br>
                <div class="ui horizontal list">
                    <?php if($agency_options['social_facebook'] && $agency_options['social_facebook']!='') : ?>
                        <a class="ui circular facebook icon button" href="<?php echo $agency_options['social_facebook']; ?>" target="_blank">
                            <i class="facebook icon"></i>
                        </a>
                    <?php endif; ?>
                    <?php if($agency_options['social_twitter'] && $agency_options['social_twitter']!='') : ?>
                        <a class="ui circular twitter icon button" href="<?php echo $agency_options['social_twitter']; ?>" target="_blank">
                            <i class="twitter icon"></i>
                        </a>
                    <?php endif; ?>
                    <?php if($agency_options['social_instagram'] && $agency_options['social_instagram']!='') : ?>
                        <a class="ui circular instagram icon button" href="<?php echo $agency_options['social_instagram']; ?>" target="_blank">
                            <i class="instagram icon"></i>
                        </a>
                    <?php endif; ?>
                    <?php if($agency_options['social_linkedin'] && $agency_options['social_linkedin']!='') : ?>
                        <a class="ui circular linkedin icon button" href="<?php echo $agency_options['social_linkedin']; ?>" target="_blank">
                            <i class="linkedin icon"></i>
                        </a>
                    <?php endif; ?>
                    <?php if($agency_options['social_gplus'] && $agency_options['social_gplus']!='') : ?>
                        <a class="ui circular google plus icon button" href="<?php echo $agency_options['social_gplus']; ?>" target="_blank">
                            <i class="google plus icon"></i>
                        </a>
                    <?php endif; ?>
                    <?php if($agency_options['social_skype'] && $agency_options['social_skype']!='') : ?>
                        <a class="ui circular skype icon button" href="<?php echo $agency_options['social_skype']; ?>" target="_blank">
                            <i class="skype icon"></i>
                        </a>
                    <?php endif; ?>
                    <?php if($agency_options['social_pinterest'] && $agency_options['social_pinterest']!='') : ?>
                        <a class="ui circular pinterest icon button" href="<?php echo $agency_options['social_pinterest']; ?>" target="_blank">
                            <i class="pinterest icon"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
    <br>
</footer>
