<?php
use Roots\Sage\Nav;
$menu_name = 'primary_navigation';
?>
<div id="main-menu" class="ui sidebar inverted vertical menu">
    <br>
    <?php  if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) :
        $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        foreach ( (array) $menu_items as $key => $menu_item ) :
            $class = $menu_item->classes; ?>
            <a href="<?php echo $menu_item->url; ?>" class="item menu-link <?= scroll_menu(); ?> <?php if (get_the_ID() == $menu_item->object_id) { echo 'active'; } ?>">
                <?php echo $menu_item->title; ?>
            </a>
            <?php
        endforeach;
    endif;
    ?>
    <?php get_phone_button(); ?>
</div>
