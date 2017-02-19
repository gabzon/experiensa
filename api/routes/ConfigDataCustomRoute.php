<?php

/**
 * Created by PhpStorm.
 * User: victor
 * Date: 25/01/17
 * Time: 07:41 AM
 */
class ConfigDataCustomRoute extends WP_REST_Controller
{
    protected $version;
    protected $namespace;
    protected $name;

    public function __construct( ) {
        $this->version = '2';
        $this->namespace = 'wp/v' . $this->version;
        $this->name = 'configdata';
    }

    public function register_routes(){
        register_rest_route($this->namespace, '/' . $this->name, array(
            'methods'         => WP_REST_Server::READABLE,
            'callback'        => array( $this, 'response_config_data' )
        ));
    }
    public function response_config_data(){
        $response = Helpers::getConfigData();
        return new WP_REST_Response( $response, 200 );
    }
    /**
     * Check if a given request has access to get items
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|bool
     */
    public function get_items_permissions_check($request) {
        return true;
    }
}
function config_data_api_init( $server ) {
    $config_data = new ConfigDataCustomRoute();
    $config_data->register_routes();
}
add_action( 'rest_api_init', 'config_data_api_init' );