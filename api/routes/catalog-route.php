<?php

class CatalogCustomRoute extends WP_REST_Controller {

	protected $version;
	protected $namespace;
	protected $name;
    protected $catalog;
    protected $location_filter;
    protected $theme_filter;

	public function __construct( ) {
		$this->version = '2';
		$this->namespace = 'wp/v' . $this->version;
		$this->name = 'catalog';
        $this->catalog = array();
        $this->location_filter = array();
        $this->theme_filter = array();
	}

	public function register_routes() {
		register_rest_route($this->namespace, '/' . $this->name, array(
			array(
				'methods'         => WP_REST_Server::READABLE,
				'callback'        => array( $this, 'response_catalog' ),
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
		    'callback'        => array( $this, 'response_location_filter' ),
		));
		register_rest_route($this->namespace, '/' . $this->name. '/themes', array(
		    'methods'         => WP_REST_Server::READABLE,
		    'callback'        => array( $this, 'response_theme_filter' ),
		));
	}

	public function set_catalog() {
        $catalog = Catalog::get_catalog();
    	$this->catalog = $catalog;
	}
	public function get_catalog(){
		return $this->catalog;
	}
	public function get_unique_array_filter($filters){
	    if(!empty($filters)) {
	        $aux = [];
            $out = [];
            $i = 0;
            foreach ($filters as $item){
                if(!in_array($item['name'],$aux)){
                    $aux[] = $item['name'];
                    $item['id'] = $i;
                    $out[] = $item;
                    $i++;
                }
            }
            return $out;
        }
        return [];
    }
	public function get_location_filter($new = false){
		if(!$new){
			$catalog = $this->get_catalog();
		}else{
			$this->set_catalog();
			$catalog = $this->get_catalog();
		}
		$filters = [];
		if(!empty($catalog)){
			$items = $catalog;
            $location_string = '';
            foreach ($items as $item){
                if(!empty($item['location']))
                    $location_string .= $item['location'].',';
            }
            if($location_string != '') {
                $location_string = ltrim($location_string,' ');
                $location_string = rtrim($location_string,',');
                $filters = explode(',', $location_string);
            }
		}
		if(!empty($filters)){
		    $filters_aux = $filters;
            $filters = [];
		    foreach ($filters_aux as $filter_name){
                $filter['name'] = rtrim(ltrim($filter_name.' '),' ');
                $filter['active'] = false;
                $filters[] = $filter;
            }
        }
		return $this->get_unique_array_filter($filters);
	}

	public function get_theme_filter($new = false){
		if(!$new){
			$catalog = $this->get_catalog();
		}else{
			$this->set_catalog();
			$catalog = $this->get_catalog();
		}
		$filters = [];
		if(!empty($catalog)){
			$items = $catalog;
            $theme_string = '';
            foreach ($items as $item){
                if(!empty($item['theme']))
                    $theme_string .= $item['theme'].',';
            }
            if($theme_string != '') {
                $theme_string = ltrim($theme_string,' ');
                $theme_string = rtrim($theme_string,',');
                $filters = explode(',', $theme_string);
            }
		}
        if(!empty($filters)){
            $filters_aux = $filters;
            $filters = [];
            foreach ($filters_aux as $filter_name){
                $filter['name'] = rtrim(ltrim($filter_name.' '),' ');
                $filter['active'] = false;
                $filters[] = $filter;
            }
        }
        return $this->get_unique_array_filter($filters);

	}
	public function response_catalog(){
		$data = [];
		$this->set_catalog();
        $catalog = $this->get_catalog();
        if(!empty($catalog)){
			$data['catalog'] = $catalog;
			$data['theme_filter'] = $this->get_theme_filter();
			$data['location_filter'] = $this->get_location_filter();
        }
		return new WP_REST_Response( $data, 200 );
	}

	public function response_location_filter($request){
	    $data = $this->get_location_filter(true);
        return new WP_REST_Response( $data, 200 );
    }

    public function response_theme_filter($request){
        $data = $this->get_theme_filter(true);
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
