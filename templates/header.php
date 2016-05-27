<?php
use Roots\Sage\Nav;
$menu_name = 'primary_navigation';

$agency_options = get_option('agency_settings');
$design_options = get_option('experiensa_design_settings');
/*echo "<pre>";
print_r($design_options);
echo "</pre>";*/
$logo   = $agency_options['agency_logo'];
$phone  = $agency_options['agency_phone'];
?>

<header class="ui <?= get_menu_style(); ?> menu grid">
    <div class="mobile only row">
        <a class="item" href="<?= esc_url(home_url('/')); ?>">
            <?php
            if ($logo):
                echo '<img class="ui mini image logo" src="' . wp_get_attachment_url($logo) . '"  />';
            else:
                bloginfo('name');
            endif;
            ?>
        </a>
        <div class="menu right">
            <a class="item mobile-menu ui button">
                <i class="sidebar icon"></i>
            </a>
        </div>
    </div>
    <div class="tablet only row">

    </div>
    <div class="computer only row">
        <a class="item menu-link <?= scroll_menu(); ?>" href="<?= esc_url(home_url('/')); ?>">
            <?php if ($logo): ?>
                <img class="ui <?= $design_options['header_logo_size']; ?> image logo" src="<?php echo wp_get_attachment_url($logo);?>" /> &nbsp;
                <?php if ($design_options['header_company_name'] === 'TRUE'): ?>
                    <?php bloginfo('name'); ?>
                <?php endif; ?>
            <?php else: ?>
                <?php bloginfo('name'); ?>
            <?php endif; ?>
        </a>
        <div class="right menu">
            <?php get_phone_button(); ?>
            <?php get_quote_button(); ?>
            <?php Menu::display_all_menus(get_the_ID()); ?>
            <?php get_language_menu(); ?>

        </div>
    </div>
</header>
