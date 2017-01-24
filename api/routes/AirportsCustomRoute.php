<?php

use \Experiensa\Modules\CurlRequest;

class AirportsCustomRoute extends WP_REST_Controller
{
    protected $version;
    protected $namespace;
    protected $name;
    protected $catalog;
    protected $location_filter;
    protected $theme_filter;
    protected $api_url;
    protected $api_key;
    protected $lang_var_name;
    public function __construct( ) {
        $this->version = '2';
        $this->namespace = 'wp/v' . $this->version;
        $this->name = 'airports';
        $this->catalog = array();
        $this->location_filter = array();
        $this->theme_filter = array();
        $this->api_url = 'http://iatacodes.org/api/v6/airports';
        $this->api_key = 'f48e20ba-d9bb-477e-855a-694b0c4a0ac9';
    }

    public function register_routes(){
        register_rest_route($this->namespace, '/' . $this->name, array(
            'methods'         => WP_REST_Server::READABLE,
            'callback'        => array( $this, 'response_airports' )
        ));
    }
    public function response_airports(){
        $url = $this->api_url.'?api_key='.$this->api_key;
        $response = CurlRequest::getApiResponse($url);
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

function airports_api_init( $server ) {
    $airports = new AirportsCustomRoute();
    $airports->register_routes();
}
add_action( 'rest_api_init', 'airports_api_init' );