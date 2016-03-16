<?php
/*
 Title: Agency defaults
 Setting: agency_settings
 Tab: Defaults
 Tab Order: 10
 */

piklist('field',array(
    'type'      => 'select',
    'field'     => 'agency_currency',
    'label'     => __('Currency','sage'),
    'columns'   => 3,
    'value'     => 'CHF',
    'choices'   => array(
        'CHF'   =>  'CHF',
        'USD'   =>  'USD',
        'EUR'   =>  'EUR',
    ),
));


function get_timezone_array(){
    $timezoneIdentifiers = DateTimeZone::listIdentifiers();
    $utcTime = new DateTime('now', new DateTimeZone('UTC'));

    $tempTimezones = array();
    foreach ($timezoneIdentifiers as $timezoneIdentifier) {
        $currentTimezone = new DateTimeZone($timezoneIdentifier);

        $tempTimezones[] = array(
            'offset' => (int)$currentTimezone->getOffset($utcTime),
            'identifier' => $timezoneIdentifier
        );
    }

    // Sort the array by offset,identifier ascending
    usort($tempTimezones, function($a, $b) {
        return ($a['offset'] == $b['offset'])
            ? strcmp($a['identifier'], $b['identifier'])
            : $a['offset'] - $b['offset'];
    });

    $timezoneList = array();
    foreach ($tempTimezones as $tz) {
        $sign = ($tz['offset'] > 0) ? '+' : '-';
        $offset = gmdate('H:i', abs($tz['offset']));
        $timezoneList[$tz['identifier']] = '(UTC ' . $sign . $offset . ') ' .
            $tz['identifier'];
    }

    return $timezoneList;
}
$timezone_list = get_timezone_array();

/*$tz = new Timezone();
$vector = $tz->get_timezone_array();*/
piklist('field', array(
    'type' => 'select',
    'field' => 'agency_timezone',
    'scope' => 'post_meta',
    'label' => __('Timezone'),
    'attributes' => array(
        'class' => 'text'
    ),
    'choices' => $timezone_list
));
