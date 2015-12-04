<?php
use Roots\Sage\Nav;
$agency_options = get_option('agency_settings');
$logo = $agency_options['agency_logo'];
$phone = $agency_options['agency_phone'];
?>

<header id="menu-scroll" class="menu-product" role="banner">
    <div class="ui stackable page grid">
        <div class="six wide column">
            <a href="<?php bloginfo('url'); ?>" class="home">
                <?php if ($logo): ?>
                    <img class="ui image logo" src="<?php echo wp_get_attachment_url($logo);?>" />
                <?php else: ?>
                    <img class="logo" src="//placehold.it/250x100" />
                <?php endif; ?>
            </a>
        </div>
        <div class="ten wide column computer only">
            <div class="ui horizontal list">
                <div class="item">
                    <div class="content">
                        <a href="#details"><?php _e('Details','sage'); ?></a>
                    </div>
                </div>
                <div class="item">
                    <div class="content">
                        <a href="#request"><?php _e('Request a travel','sage'); ?></a>
                    </div>
                </div>
                <div class="item">
                    <div class="content">
                        <a href="tel:<?php echo $phone ?>">
                            <i class="call icon"></i>
                            <?php echo $phone; ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="sixteen wide column tablet mobile only center aligned menu-toggle">
            <div class="three basic fluid ui buttons">
                <a href="tel:<?php echo $phone ?>" class="ui basic button">
                    <?php _e('Phone','sage'); ?>
                </a>
                <a href="#agency-map"  class="ui basic button">
                    <i class="marker icon"></i> <?php _e('Map','sage'); ?>
                </a>
                <a id="sidebar-toggle" class="ui basic button">
                    <i class="big bars icon"></i> <?php _e('Menu','sage'); ?>
                </a>
            </div>
        </div>
    </div>
</header>
