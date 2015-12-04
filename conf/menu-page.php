<?php

add_filter('piklist_admin_pages', 'default_experiensa_setting_pages');
function default_experiensa_setting_pages($pages){
    $pages[] = array(
        'page_title'    => __('General','sage'),
        'menu_title'    => __('Experiensa', 'sage'),
        'capability'    => 'manage_options',
        'menu_slug'     => 'experiensa-settings',
        'setting'       => 'my_theme_settings',
        'menu_icon'     => 'dashicons-editor-kitchensink',
        'page_icon'     => 'dashicons-editor-kitchensink',
        'single_line'   => true,
        'position'      => 59,
        'save_text'     => __('Save Settings','sage'),
    );
    return $pages;
}


add_filter('piklist_admin_pages', 'layout_experiensa_setting_page');
function layout_experiensa_setting_page($pages){
    $pages[] = array(
        'page_title'    => __('Layout Settings'),
        'menu_title'    => __('Layout', 'sage'),
        'capability'    => 'manage_options',
        'sub_menu'      => 'experiensa-settings',
        'menu_slug'     => 'layout_settings',
        'setting'       => 'layout_settings',
        'default_tab'   => 'Header',
        'single_line'   => true,
        'save_text'     => __('Save Settings','sage'),
    );

    return $pages;
}

add_filter('piklist_admin_pages', 'design_experiensa_setting_page');
function design_experiensa_setting_page($pages){
    $pages[] = array(
        'page_title'    => __('Design Settings'),
        'menu_title'    => __('Design', 'sage'),
        'capability'    => 'manage_options',
        'sub_menu'      => 'experiensa-settings',
        'menu_slug'     => 'design_settings',
        'setting'       => 'design_settings',
        'single_line'   => true,
        'save_text'     => __('Save Settings','sage'),
    );

    return $pages;
}

?>
