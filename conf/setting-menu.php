<?php

/**
* sub_menu define where to put it in the admin menu (wordpress left sidebar), for more information please visit:
* https://codex.wordpress.org/Administration_Menus
* https://developer.wordpress.org/reference/functions/add_submenu_page/
* examples:
* Dashboard: ‘index.php’
* Posts: ‘edit.php’
* Media: ‘upload.php’
* Pages: ‘edit.php?post_type=page’
* Comments: ‘edit-comments.php’
* Custom Post Types: ‘edit.php?post_type=your_post_type’
* Appearance: ‘themes.php’
* Plugins: ‘plugins.php’
* Users: ‘users.php’
* Tools: ‘tools.php’
* Settings: ‘options-general.php’
* Network Settings: ‘settings.php’
**/

add_filter('piklist_admin_pages', 'default_experiensa_setting_pages');
function default_experiensa_setting_pages($pages){
    $pages[] = array(
        'page_title'    => __('Options','sage'),
        'menu_title'    => __('Options', 'sage'),
        'capability'    => 'manage_options',
        'sub_menu'      => 'themes.php',
        'menu_slug'     => 'experiensa-settings',
        'setting'       => 'agency_settings',
        'menu_icon'     => 'dashicons-editor-kitchensink',
        'page_icon'     => 'dashicons-editor-kitchensink',
        'single_line'   => false,
        'save_text'     => __('Save options','sage'),
    );
    return $pages;
}

add_filter('piklist_admin_pages', 'design_experiensa_setting_page');
function design_experiensa_setting_page($pages){
    $pages[] = array(
        'page_title'    => __('Design Settings'),
        'menu_title'    => __('Design', 'sage'),
        'capability'    => 'manage_options',
        'sub_menu'      => 'themes.php',
        'menu_slug'     => 'experiensa-design-settings',
        'setting'       => 'experiensa_design_settings',
        'single_line'   => false,
        'save_text'     => __('Save Settings','sage'),
    );

    return $pages;
}

add_filter('piklist_admin_pages', 'design_experiensa_segment_page');
function design_experiensa_segment_page($pages){
    $pages[] = array(
        'page_title'    => __('Segment Settings'),
        'menu_title'    => __('Segment', 'sage'),
        'capability'    => 'manage_options',
        'sub_menu'      => 'themes.php',
        'menu_slug'     => 'experiensa-segment-settings',
        'setting'       => 'experiensa-segment-settings',
        'single_line'   => false,
        'save_text'     => __('Save Segment Settings','sage'),
    );

    return $pages;
}
add_filter('piklist_admin_pages', 'design_experiensa_section_page');
function design_experiensa_section_page($pages){
    $pages[] = array(
        'page_title'    => __('Section Settings'),
        'menu_title'    => __('Sections', 'sage'),
        'capability'    => 'manage_options',
        'sub_menu'      => 'themes.php',
        'menu_slug'     => 'experiensa-section-settings',
        'setting'       => 'experiensa-section-settings',
        'single_line'   => false,
        'save_text'     => __('Save Section Settings','sage'),
    );

    return $pages;
}
/*
* This page concerns the service improvements tutorials
*/
add_filter('piklist_admin_pages', 'tutorials_setting_page');
function tutorials_setting_page($pages){
    $pages[] = array(
        'page_title'    => __('Trainning','sage'),
        'menu_title'    => __('Trainning', 'sage'),
        'sub_menu'      => 'index.php',
        'capability'    => 'manage_options',
        'menu_slug'     => 'experiensa-tutorials',
        'setting'       => 'experiensa_tutorials',
        'single_line'   => false,
        'save_text'     => __('Save Tutorials','sage'),
    );

    return $pages;
}
?>
