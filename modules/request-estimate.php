<?php
  function requestEstimate(){
    echo "por aqui pasoxxxx";
    die();
  }
  add_action('wp_ajax_requestEstimate', 'requestEstimate');
  add_action('wp_ajax_nopriv_requestEstimate', 'requestEstimate');
?>