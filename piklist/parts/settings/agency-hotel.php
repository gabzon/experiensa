<?php
/*
 Title: Hotel Settings
 Setting: agency_settings
 Tab: Hotel Settings
 Flow: Options
 */
$low_season_start_date = array(
    'type' => 'datepicker',
    'field' => 'low_season_start_date',
    'columns'   => 6,
    'label' => __('Start date', 'sage')
);
$low_season_end_date = array(
    'type' => 'datepicker',
    'field' => 'low_season_end_date',
    'columns'   => 6,
    'label' => __('End date', 'sage')
);
$low_html_title = array(
    'type'      => 'html',
    'template'  => 'field',
    'columns'   => 12,
    'field'     => 'low_html_title',
    'value'     => '<h4>'.__('Low Season','sage').'</h4><hr>'
);
$high_season_start_date = array(
    'type' => 'datepicker',
    'field' => 'high_season_start_date',
    'columns'   => 6,
    'label' => __('Start date', 'sage')
);
$high_season_end_date = array(
    'type' => 'datepicker',
    'field' => 'high_season_end_date',
    'columns'   => 6,
    'label' => __('End date', 'sage')
);
$high_html_title = array(
    'type'      => 'html',
    'template'  => 'field',
    'columns'   => 12,
    'field'     => 'high_html_title',
    'value'     => '<h4>'.__('High Season','sage').'</h4><hr>'
);

piklist('field',array(
    'type' => 'group',
    'field' => 'seasons',
    'label' => __('Seasons','sage'),
    'fields' => array(
        $low_html_title,
        $low_season_start_date,
        $low_season_end_date,
        $high_html_title,
        $high_season_start_date,
        $high_season_end_date
    )
));
$unable_start_date = array(
    'type' => 'datepicker',
    'field' => 'unable_start_date',
    'columns'   => 6,
    'label' => __('Start date', 'sage')
);
$unable_end_date = array(
    'type' => 'datepicker',
    'field' => 'unable_end_date',
    'columns'   => 6,
    'label' => __('End date', 'sage')
);
piklist('field',array(
    'type' => 'group',
    'field' => 'unable_dates',
    'add_more' => true,
    'label' => __('Unable Dates','sage'),
    'fields' => array(
        $unable_start_date,
        $unable_end_date,
    )
));