<?php

class CatalogCustomRoute extends WP_REST_Controller {
	
	protected $version;
	protected $namespace;
	protected $name;
    protected $catalog;

	public function __construct( ) {
		$this->version = '2';
		$this->namespace = 'wp/v' . $this->version;
		$this->name = 'catalog';
        $this->catalog = array();
	}

	public function register_routes() {
		register_rest_route($this->namespace, '/' . $this->name, array(
			array(
				'methods'         => WP_REST_Server::READABLE,
				'callback'        => array( $this, 'get_catalog' ),
				'permission_callback' => array( $this, 'get_items_permissions_check' ),
				'args'            => array(
					'per_page' => array(
						'default' => 10,
						'sanitize_callback' => 'absint',
					),
					'page' => array(
						'default' => 1,
						'sanitize_callback' => 'absint',
					),
				),
			),
		));
        register_rest_route($this->namespace, '/' . $this->name. '/locations', array(
            'methods'         => WP_REST_Server::READABLE,
            'callback'        => array( $this, 'get_location_filter' ),
        ));
        register_rest_route($this->namespace, '/' . $this->name. '/themes', array(
            'methods'         => WP_REST_Server::READABLE,
            'callback'        => array( $this, 'get_theme_filter' ),
        ));
	}

	public function get_catalog($request) {
        $catalog = Catalog::get_catalog();
        $this->catalog = $catalog;
		$data = $catalog;
		return new WP_REST_Response( $data, 200 );
	}

	public function get_location_filter($request){
	    $data = [];
	    if(empty($this->catalog))
	        $this->catalog = Catalog::get_catalog();
        if(!empty($this->catalog)){
            $items = $this->catalog;
            $location_string = '';
            foreach ($items as $item){
                if(!empty($item['location']))
                    $location_string .= $item['location'].',';
            }
            if($location_string != '') {
                $location_string = ltrim($location_string,' ');
                $location_string = rtrim($location_string,',');
                $data = explode(',', $location_string);
            }
        }
        return new WP_REST_Response( $data, 200 );
    }

    public function get_theme_filter($request){
        $data = [];
        if(empty($this->catalog))
            $this->catalog = Catalog::get_catalog();
        if(!empty($this->catalog)){
            $items = $this->catalog;
            $theme_string = '';
            foreach ($items as $item){
                if(!empty($item['theme']))
                    $theme_string .= $item['theme'].',';
            }
            if($theme_string != '') {
                $theme_string = ltrim($theme_string,' ');
                $theme_string = rtrim($theme_string,',');
                $data = explode(',', $theme_string);
            }
        }
        return new WP_REST_Response( $data, 200 );
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

function catalog_api_init( $server ) {
    $catalog = new CatalogCustomRoute();
    $catalog->register_routes();
}
add_action( 'rest_api_init', 'catalog_api_init' );