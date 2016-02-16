<?php

class Agency{

    public static function get_email(){
        $agency_options = get_option('agency_settings');
        return $agency_options['agency_email'];
    }

    public static function get_address(){
        $agency_options = get_option('agency_settings');        
    }
}
