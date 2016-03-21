<?php

function requestQuote(){
    $headers = array('Content-Type: text/html; charset=UTF-8');

    $fullname       = $_POST['fullname'];
    $email          = $_POST['email'];
    $phone          = $_POST['phone'];

    $destination    = $_POST['destination'];
    $departure      = $_POST['departure'];
    $return         = $_POST['return'];

    $budget         = $_POST['budget'];
    $companion      = $_POST['companion'];
    $adults         = $_POST['adults'];
    $kids           = $_POST['kids'];

    $preferences    = $_POST['preferences'];

    $class           = $_POST['class'];
    $seat            = $_POST['seat'];

    if (isset($_POST['flight-options'])) {
        $flight_options  = $_POST['flight-options'];
    } else {
        $flight_options = "";
    }

    if (isset($_POST['host-options'])) {
        $host_options = $_POST['host-options'];
    } else{
        $host_options = "";
    }

    if (isset($_POST['host-type'])) {
        $host_type = $_POST['host-type'];
    } else{
        $host_type= "";
    }

    if (isset($_POST['hotel'])) {
        $hotel = $_POST['hotel'];
    } else{
        $hotel = "";
    }

    if (isset($_POST['theme'])) {
        $themes = $_POST['theme'];
    } else{
        $themes = "";
    }

    $transport_type = $_POST['transport-type'];
    $driver = $_POST['driver'];

    $info = '<strong>Nom complet: </strong>'       . $fullname     . '<br>'.
    '<strong>Email: </strong>'             . $email        . '<br>'.
    '<strong>Téléphone: </strong>'         . $phone        . '<br><hr>';
    $pinfo="";
    $pinfo .= ($destination==''?'':'<strong>Destination: </strong>'       . $destination  . '<br>');
    $pinfo .= ($departure==''?'':'<strong>Date de départ: </strong>'       . $departure  . '<br>');
    $pinfo .= ($return==''?'':'<strong>Date de retour: </strong>'       . $return  . '<br><hr>');
    $pinfo .= ($budget==''?'':'<strong>Budget: </strong>'       . $budget  . '<br>');
    $pinfo .= ($companion==''?'':'<strong>Companions: </strong>'       . $companion  . '<br>');
    $pinfo .= ($adults==''?'':'<strong>Number of Adults: </strong>'       . $adults  . '<br>');
    $pinfo .= ($kids==''?'':'<strong>Number of kids: </strong>'       . $kids  . '<br><hr>');
    $pinfo .= ($preferences==''?'':'<strong>Preferences: </strong><br>'       . $preferences  . '<br>');
    $info.=$pinfo;
    if(!empty($class)){
        $pinfo .= '<strong>Classe: </strong>';
        foreach ($class as $c) {
            $pinfo .= ucwords($c) . ', ';
        }
        $info.=$pinfo;
    }

    $pinfo .= '<br><strong>Siege: </strong>'        . $seat         . '<br>';
    $info.=$pinfo;
    if ($flight_options != "") {
        $pinfo .= '<strong>Flight options: </strong></ul>';
        foreach ($flight_options as $fo) {
            $pinfo .= '<li>' . ucwords($fo) . '</li>';
        }
        $pinfo.= '</ul>';
        $info.=$pinfo;
    }

    if ($host_options != "") {
        $pinfo .= '<strong>Host options: </strong></ul>';
        foreach ($host_options as $ho) {
            $pinfo .= '<li>' . ucwords($ho) . '</li>';
        }
        $pinfo.= '</ul>';
        $info.=$pinfo;
    }

    if ($host_type != "") {
        $pinfo .= '<strong>Host type: </strong></ul>';
        foreach ($host_type as $ht) {
            $pinfo .= '<li>' . ucwords($ht) . '</li>';
        }
        $pinfo.= '</ul>';
        $info.=$pinfo;
    }

    if ($hotel != "") {
        $pinfo .= '<strong>Hotel stars: </strong></ul>';
        foreach ($hotel as $stars) {
            $pinfo .= '<li>' . ucwords($stars) . '</li>';
        }
        $pinfo.= '</ul>';
        $info.=$pinfo;
    }

    if ($themes != "") {
        $pinfo .= '<strong>Themes: </strong></ul>';
        foreach ($themes as $theme) {
            $pinfo .= '<li>' . ucwords($theme) . '</li>';
        }
        $pinfo.= '</ul>';
        $info.=$pinfo;
    }

    $pinfo .=    '<strong>Type de transport: </strong>'  . $transport_type . '<br>' .
    '<strong>Conducteur: </strong>'         . $driver         . '<br>';
    $info.=$pinfo;
    //$to = 'gabriel@sevinci.com,jacqueline@fiestatravel.ch,'.$email;
    $agency_email  = $_POST['agency_email'];
    $to = $agency_email.','.$email;
    $mail_status=array();;
    if( wp_mail( $to,'Devis: '. $destination , $info, $headers) === FALSE){
        $mail_status=["status"=>0,"msg"=>"Error Sending Email"];
    } else{
        $mail_status=["status"=>1,"msg"=>'<h3 style="color:blue">Email envoyé</h3> '];
    }
    if($mail_status['status']==0){
      echo $mail_status['msg'];
    }else{
      $args = array (
        'posts_per_page' => -1,
        'post_type'     => array( 'partner' ),
        'post_status'   => array( 'publish', 'inherit' ),
        'meta_key'		=> 'partner_request_form',
        'meta_value'	=> 'TRUE'
      );
      $the_query = new WP_Query( $args );
      $partners_mail="";
      if( $the_query->have_posts() ){
        while( $the_query->have_posts() ){
            $the_query->the_post();
            $mail = get_post_meta( $the_query->post->ID, 'partner_email',true);
            $partners_mail .= $mail.", ";
        }
        $partners_mail = rtrim($partners_mail);
        $partners_mail = rtrim($partners_mail,',');
        if( wp_mail( $partners_mail,'Devis: '. $destination , $pinfo, $headers) === FALSE){
          echo $mail_status['msg'].'and to partners too...'
        }else{
          echo $mail_status['msg'];
        }
      }
    }
    die();
}

add_action('wp_ajax_requestQuote', 'requestQuote');
add_action('wp_ajax_nopriv_requestQuote', 'requestQuote');
?>
