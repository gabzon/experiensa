<?php
use Roots\Sage\Nav;
$menu_name = 'primary_navigation';

$layout_options = get_option('layout_settings');
$agency_options = get_option('agency_settings');

$logo = $agency_options['agency_logo'];
$phone = $agency_options['agency_phone'];

$display_phone = $layout_options['setting_header_phone'];
$request_btn = $layout_options['setting_header_request'];
$language = $layout_options['setting_header_language'];
?>

<header class="ui borderless small menu grid stackable">
    <div class="mobile only row">

    </div>
    <div class="tablet only row">

    </div>
    <div class="computer only row">
        <a class="item" href="<?= esc_url(home_url('/')); ?>">
            <?php if ($logo): ?>
                <img class="ui tiny image logo" src="<?php echo wp_get_attachment_url($logo);?>" width="120"/>
            <?php else: ?>
                <?php bloginfo('name'); ?>
            <?php endif; ?>
        </a>
        <div class="right menu">
            <?php  if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) :
                $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                $menu_items = wp_get_nav_menu_items($menu->term_id);
                foreach ( (array) $menu_items as $key => $menu_item ) :
                    $class = $menu_item->classes; ?>
                    <a href="<?php echo $menu_item->url; ?>" class="item <?php if(get_the_ID() == $menu_item->object_id){echo 'active';}else{echo 'bla';}?>">
                        <?php echo $menu_item->title; ?>
                    </a>
                    <?php
                endforeach;
            endif;
            ?>
            <?php if ($display_phone === 'yes'): ?>
                <?php if ($phone): ?>
                    <div class="item">
                        <a href="tel:<?php echo $phone ?>" class="ui inverted button">
                            <i class="call icon"></i><?php echo $phone; ?>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php if ($request_btn === 'yes'): ?>
                <div class="item">
                    <a href="tel:<?php echo $phone ?>" class="ui inverted button">
                        <i class="call icon"></i> <?php _e('Make a request','sage'); ?>
                    </a>
                </div>
            <?php endif; ?>
            <div class="item">
                <a href="#">red</a>
            </div>
        </div>
    </div>
</header>
