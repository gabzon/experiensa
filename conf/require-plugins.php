<?php
//http://www.paulund.co.uk/theme-users-required-plugins
function showRequirePlugins()
{
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    $plugin_messages = array();
    $msg = __('This theme requires you to install the ');

    $piklist = [
        'name'      => 'Piklist',
        'folder'    => 'piklist',
        'file'      => 'piklist.php',
        'url'       => 'https://wordpress.org/plugins/piklist/'
    ];

    $api = [
        'name'      => 'WP API 2',
        'folder'    => 'rest-api',
        'file'      => 'plugin.php',
        'url'       => 'http://v2.wp-api.org/'
    ];

    $wpml = [
        'name'      => 'WPML',
        'folder'    => 'sitepress-multilingual-cms',
        'file'      => 'sitepress.php',
        'url'       => 'https://wpml.org/'
    ];

    $plugins = [$piklist, $api, $wpml];

    foreach ($plugins as $key => $value) {
        $plugin = $value['folder'] . '/' . $value['file'];
        if (!is_plugin_active( $plugin )) {
            $plugin_messages[] = $msg . $value['name'] . ' <a href="'. $value['url'] .'">'.__('Download') . '</a>';
        }
    }

    if(count($plugin_messages) > 0){
        echo '<div id="message" class="error">';
        foreach($plugin_messages as $message){
            echo '<p><strong>'.$message.'</strong></p>';
        }
        echo '</div>';
    }
}

add_action('admin_notices', 'showRequirePlugins');
?>
