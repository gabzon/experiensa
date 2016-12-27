<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
    'lib/assets.php',             // Scripts and stylesheets
    'lib/extras.php',             // Custom functions
    'lib/setup.php',              // Theme setup
    'lib/titles.php',             // Page titles
    'lib/wrapper.php',            // Theme wrapper class
    'lib/customizer.php',         // Theme customizer
    'api',
    'api/routes',
    'conf/customizer',
    'conf',                       // All configurations
    'components',                 // Reusable components
    'models/taxonomy',            // Custom taxonomies
    'models/post-type',           // All custom post types
    'modules',
    'extensions/livecomposer/options',
    'extensions/livecomposer/modules',
    'extensions'
];

foreach ($sage_includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
    }

    if (is_dir($filepath)){
        foreach (glob("$filepath/*.php") as $filename) {
            require_once($filename);
        }
    }else{
        require_once $filepath;
    }
}
unset($file, $filepath);