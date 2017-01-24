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

    $jetpack = [
        'name'      => 'JetPack',
        'folder'    => 'jetpack',
        'file'      => 'jetpack.php',
        'url'       => 'https://jetpack.com/'
    ];

    $live_composer = [
        'name'      => 'Live Composer',
        'folder'    => 'live-composer-page-builder',
        'file'      => 'ds-live-composer.php',
        'url'       => 'https://livecomposerplugin.com/downloads/live-composer-page-builder/'
    ];

    $plugins = [$piklist, $api, $wpml, $jetpack, $live_composer];

    foreach ($plugins as $key => $value) {
        $plugin = $value['folder'] . '/' . $value['file'];
        if (!is_plugin_active( $plugin )) {
            if($value['name']=='WP API 2'){
                $wp_version = get_bloginfo('version');
                $version = explode('.',$wp_version);
                if(!empty($version) && ((int)$version[0]<4) && (int)$version[1]<7){
                    $plugin_messages[] = $msg . $value['name'] . ' <a href="'. $value['url'] .'">'.__('Download') . '</a> '.__('Or install a Wordpress version over ','sage').' '.$wp_version;
                }
            }else{
                $plugin_messages[] = $msg . $value['name'] . ' <a href="'. $value['url'] .'">'.__('Download') . '</a>';
            }
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
