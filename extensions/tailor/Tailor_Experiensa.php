<?php namespace Experiensa\Extension;


class Tailor_Experiensa
{
    private static $extension_dir;
    private static $instance;

    public function __construct() {
        echo "<h1>me ha llamado __construct!!!</h1>";
        self::$extension_dir = trailingslashit(trailingslashit(get_template_directory()).'extension/tailor/');
        echo "<h1>".self::$extension_dir."</h1>";

        add_action( 'plugins_loaded', array( $this, 'init' ) );
    }

    public static function instance(){
        echo "<h1>me ha llamado instance!!!</h1>";
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function init() {
        echo "<h1>me ha llamado init!!!</h1>";
//        $this->add_actions();
//        $this->includes();
    }

    protected function add_actions() {
        echo "<h1>Estoy en add_actions</h1>";
        // Load element definitions
        add_action( 'tailor_load_elements', array( $this, 'load_elements' ), 20 );
        // Register custom elements
        add_action( 'tailor_register_elements', array( $this, 'register_elements' ), 99 );
        // Register custom template partials director
        add_filter( 'tailor_plugin_partial_paths', array( $this, 'register_partial_path' ) );
        // Enqueue scripts and styles
//        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
//
//        add_action( 'tailor_canvas_enqueue_scripts', array( $this, 'enqueue_scripts' ), 99 );
    }

    protected function includes() {
        require_once $this->extesion_dir() . 'includes/functions.php';
    }

    public function load_elements() {
        echo "<h1>Estoy en load_elements</h1>";
        require_once $this->extesion_dir().'includes/elements/class-custom-news.php';

        require_once $this->extesion_dir().'includes/shortcodes/shortcode-custom-news.php';
    }

    public function register_elements( $element_manager ) {

        $element_manager->add_element( 'tailor_custom_news', array(
            'label'             =>  __( 'News!' ),
            'description'       =>  __( 'Contains post news' ),
            'badge'             =>  __( 'Experiensa' ),
        ) );
    }

    public function register_partial_path( $paths ) {
        $paths[] = $this->plugin_dir() . 'partials/';
        return $paths;
    }

//    public function enqueue_styles() {
//        wp_enqueue_style(
//            'tailor-custom-styles',
//            $this->plugin_url() . 'assets/css/frontend' . ( SCRIPT_DEBUG ? '.css' : '.min.css' ),
//            array(),
//            $this->version()
//        );
//    }
//    public function enqueue_scripts() {
//        wp_enqueue_script(
//            'tailor-custom-canvas',
//            $this->plugin_url() . 'assets/js/dist/canvas' . ( SCRIPT_DEBUG ? '.js' : '.min.js' ),
//            array( 'tailor-canvas' ),
//            $this->version(),
//            true
//        );
//    }

    public function version() {
        return self::$version;
    }
    public function plugin_basename() {
        return self::$plugin_basename;
    }
    public function plugin_name() {
        return self::$plugin_name;
    }
    public function plugin_dir() {
        return self::$plugin_dir;
    }
    public function plugin_url() {
        return self::$plugin_url;
    }
    public function extesion_dir(){
        return self::$extension_dir;
    }
}