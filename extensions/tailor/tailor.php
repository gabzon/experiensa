<?php

if ( ! function_exists( 'tailor_load_experiensa_element' ) ) {
    function tailor_load_experiensa_element()
    {
        $extension_dir = get_template_directory().'/extensions/tailor/';
        $files = [
            $extension_dir."includes/elements/class-custom-news.php",
            $extension_dir."includes/shortcodes/shortcode-custom-news.php"
        ];
        foreach ($files as $file){
            include_once $file;
        }
//        $asd = get_included_files();
//        echo "<pre>";
//        print_r($asd);
//        echo "</pre>";
    }
}

if(! function_exists('tailor_register_experiensa_element')){
    function tailor_register_experiensa_element( $element_manager ){
        $element_manager->add_element( 'tailor_experiensa_news', array(
            'label'             =>  __( 'News!' ),
            'description'       =>  __( 'Contains post news' ),
            'badge'             =>  __( 'Experiensa' ),
            'class_name'        =>  'Tailor_Custom_News_Element',
        ) );
    }
}

function tailor_enqueue_styles() {
    $dist_url = get_template_directory_uri().'/dist/styles/';
    wp_enqueue_style(
        'tailor-custom-styles',
        $dist_url.'frontend.css'
    );
}

function tailor_enqueue_scripts() {
    $dist_url = get_template_directory_uri().'/dist/scripts/';
    wp_enqueue_script(
        'tailor-custom-canvas',
        $dist_url.'canvas.js',
        array( 'tailor-canvas' ),
        '',
        true
    );
}

if ( ! function_exists( 'tailor_experiensa' ) ) {
    function tailor_experiensa() {
//        echo "<h1>me ha llamado tailor_experiensa!!!</h1>";
//        tailor_load_experiensa_element();
        add_action('tailor_load_elements', 'tailor_load_experiensa_element', 20);
        add_action( 'tailor_register_elements', 'tailor_register_experiensa_element' );
        add_action( 'wp_enqueue_scripts', 'tailor_enqueue_styles' );
        add_action( 'tailor_canvas_enqueue_scripts', 'tailor_enqueue_scripts', 99 );
//        $asd = get_included_files();
//        echo "<pre>";
//        print_r($asd);
//        echo "</pre>";
    }
}

if (class_exists( 'Tailor' )){
//    echo "<h1>Se llama a la funcion tailor_experiensa</h1>";
    tailor_experiensa();
}
