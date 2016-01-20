<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
    <!--[if IE]>
    <div class="alert alert-warning">
    <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
</div>
<![endif]-->

<?php do_action('get_header'); ?>
<?php get_template_part('templates/sidebar-menu'); ?>
<?php get_template_part('templates/sidebar-form'); ?>
<div class="pusher">
    <?php get_template_part('templates/header'); ?>
    <div class="content">
        <main class="main">
            <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
        <?php if (Setup\display_sidebar()) : ?>
            <aside class="sidebar">
                <?php include Wrapper\sidebar_path(); ?>
            </aside><!-- /.sidebar -->
        <?php endif; ?>
    </div><!-- /.content -->
</div>

<?php
do_action('get_footer');
get_template_part('templates/footer');
wp_footer();
?>

<script>
var $buoop = {c:2};
function $buo_f(){
    var e = document.createElement("script");
    e.src = "//browser-update.org/update.min.js";
    document.body.appendChild(e);
};
try {document.addEventListener("DOMContentLoaded", $buo_f,false)}
catch(e){window.attachEvent("onload", $buo_f)}
</script>
</body>
</html>
