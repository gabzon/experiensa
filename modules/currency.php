<?php
  function currency(){
    $settings = get_option('agency_settings');
    $currency = ($settings['agency_currency']) ? $settings['agency_currency'] : 'CHF';
    echo $currency;
  }
  add_action('wp_ajax_currency', 'currency');
  add_action('wp_ajax_nopriv_currency', 'currency');
?>