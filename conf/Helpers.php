<?php

class Helpers {

    public static function get_currency(){
        $agency_options = get_option('agency_settings');
        return $agency_options['agency_currency'];
    }

    /**
     * Get agency email
     * @return mixed
     */
    public static function get_email(){
        $agency_options = get_option('agency_settings');
        return $agency_options['agency_email'];
    }

    /**
     * Get all no empty menus created on wp-admin
     * @return mixed
     */
    public static function get_all_menus_list(){
        return get_terms( 'nav_menu', array( 'hide_empty' => true ) );
    }
}
