<?php
use Roots\Sage\Nav;
$menu_name = 'primary_navigation';
$agency_options = get_option('agency_settings');
$logo = $agency_options['agency_logo'];
$phone = $agency_options['agency_phone'];
?>



<div id="mobile-sidebar" class="ui left vertical inverted labeled sidebar menu">
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
    endif;?>
</div>

<section id="header-menu">
    <div class="desktop-menu">
        <div class="ui borderless secondary menu">
            <div class="ui page vertically padded grid">
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
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-menu">
        <div class="ui fluid button">
            <i class="align justify icon"></i>
            Menu
        </div>
    </div>
</section>
