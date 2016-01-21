<?php

class Helpers {

    public static function get_currency(){
        $agency_options = get_option('agency_settings');
        return $agency_options['agency_currency'];
    }

    public static function get_email(){
        $agency_options = get_option('agency_settings');
        return $agency_options['agency_email'];
    }
}
