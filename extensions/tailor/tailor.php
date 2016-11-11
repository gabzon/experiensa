<?php

if ( ! function_exists( 'tailor_load_experiensa_elements' ) ) {
    function tailor_load_experiensa_elements()
    {
        $extension_dir = get_template_directory().'/extensions/tailor/';
        $files = [
            "includes/elements/class-custom-news.php",
            "includes/elements/class-grid-container.php",
            "includes/elements/class-grid.php",

            "includes/shortcodes/shortcode-custom-news.php",
            "includes/shortcodes/shortcode-grid-container.php",
            "includes/shortcodes/shortcode-grid.php"
        ];
        foreach ($files as $file){
            $path = $extension_dir.$file;
            if(file_exists($path))
                include_once $path;
        }
    }
}

if(! function_exists('tailor_register_experiensa_elements')){
    function tailor_register_experiensa_elements( $element_manager ){
        $element_manager->add_element( 'tailor_experiensa_news', array(
            'label'             =>  __( 'News' ),
            'description'       =>  __( 'Contains post news' ),
            'type'              =>  'content',
            'badge'             =>  __( 'Experiensa' ),
            'class_name'        =>  'Tailor_Custom_News_Element',
        ) );

        $element_manager->add_element( 'tailor_experiensa_grid_container', array(
            'label'             =>  __( 'Grid Component' ),
            'description'       =>  __( 'Customizable Grid' ),
            'type'              =>  'container',
            'badge'             =>  __( 'Experiensa' ),
            'class_name'        =>  'Tailor_Custom_Grid_Container_Element',
            'child'             =>  'tailor_experiensa_grid',
        ) );
        $element_manager->add_element( 'tailor_experiensa_grid', array(
            'label'             =>  __( 'Grid' ),
            'type'              =>  'child',
            'class_name'        =>  'Tailor_Custom_Grid_Element',
        ) );
    }
}
if(! function_exists('register_experiensa_partial_path')){
    function register_experiensa_partial_path($paths){
        $partials = get_template_directory() . '/templates/partials/';
        $paths[] = $partials;
        $paths[] = $partials.'showcase/grid/';
        return $paths;
    }
}
if(! function_exists('tailor_experiensa_enqueue_styles')) {
    function tailor_experiensa_enqueue_styles()
    {
        $dist_url = get_template_directory_uri() . '/dist/styles/';
        wp_enqueue_style(
            'tailor-custom-styles',
            $dist_url . 'frontend.css'
        );
    }
}
if(! function_exists('tailor_experiensa_enqueue_scripts')) {
    function tailor_experiensa_enqueue_scripts()
    {
        $dist_url = get_template_directory_uri() . '/dist/scripts/';
//    echo "<h1>".$dist_url."canvas.js</h1>";
        wp_enqueue_script(
            'tailor-custom-canvas',
            $dist_url . 'canvas.js',
            array('tailor-canvas'),
            '',
            true
        );
    }
}
if ( ! function_exists( 'tailor_experiensa' ) ) {
    function tailor_experiensa() {
//        tailor_load_experiensa_element();
        add_action('tailor_load_elements', 'tailor_load_experiensa_elements', 20);
        add_action( 'tailor_register_elements', 'tailor_register_experiensa_elements' );
        add_filter( 'tailor_plugin_partial_paths','register_experiensa_partial_path' );
        add_action( 'wp_enqueue_scripts', 'tailor_experiensa_enqueue_styles' );
        add_action( 'tailor_canvas_enqueue_scripts', 'tailor_experiensa_enqueue_scripts', 99 );

//        $asd = get_included_files();
//        echo "<pre>";
//        print_r($asd);
//        echo "</pre>";
    }
}

if (class_exists( 'Tailor' )){
    tailor_experiensa();
}
