<?php

add_filter('piklist_admin_pages', 'default_experiensa_setting_pages');
function default_experiensa_setting_pages($pages){
    $pages[] = array(
        'page_title'    => __('General','sage'),
        'menu_title'    => __('Experiensa', 'sage'),
        'capability'    => 'manage_options',
        'menu_slug'     => 'experiensa-settings',
        'setting'       => 'agency_settings',
        'menu_icon'     => 'dashicons-editor-kitchensink',
        'page_icon'     => 'dashicons-editor-kitchensink',
        'single_line'   => false,
        'position'      => 59,
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
        'menu_slug'     => 'experiensa-design-settings',
        'setting'       => 'experiensa_design_settings',
        'single_line'   => false,
        'save_text'     => __('Save Settings','sage'),
    );

    return $pages;
}

add_filter('piklist_admin_pages', 'layout_experiensa_setting_page');
function layout_experiensa_setting_page($pages){
    $pages[] = array(
        'page_title'    => __('Howto\'s','sage'),
        'menu_title'    => __('Howto\'s', 'sage'),
        'capability'    => 'manage_options',
        'sub_menu'      => 'experiensa-settings',
        'menu_slug'     => 'experiensa-tutorials',
        'setting'       => 'experiensa_tutorials',
        'single_line'   => false,
        'save_text'     => __('Save Settings','sage'),
    );

    return $pages;
}

?>
