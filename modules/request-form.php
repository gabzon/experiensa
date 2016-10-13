<?php

function requestQuote(){
    $error = true;
    $msg = '';
    $body = '';
    $headers = array('Content-Type: text/html; charset=UTF-8');

    if ( function_exists( 'gglcptch_check' ) ){
		$validate = gglcptch_check();
		if($validate['response']===false && $validate['reason']!='VERIFICATION_FAILED'){
            $msg .= "Error checking captcha. ";
            header('Content-Type: application/json');
            echo json_encode(['error'=>$error,"msg"=>$msg]);
			die();
		}
    }else{
        $msg .= 'Need to install captcha plugin. ';
        header('Content-Type: application/json');
        echo json_encode(['error'=>$error,"msg"=>$msg]);
		die();
	}
    $fullname       = $_POST['fullname'];
    $email          = $_POST['email'];
    $phone          = $_POST['phone'];

    $destination    = $_POST['destination'];
    $departure      = $_POST['departure'];
    $return         = $_POST['return'];
    $flexibility    = $_POST['flexibility'];

    $budget         = $_POST['budget'];
    $companion      = $_POST['companion'];
    $adults         = $_POST['adults'];
    $kids           = $_POST['kids'];
    $babies           = $_POST['babies'];

    $preferences    = $_POST['preferences'];

    $class           = $_POST['class'];
    $seat            = $_POST['seat'];

    if (isset($_POST['flight-options'])) {
        $flight_options  = $_POST['flight-options'];
    } else {
        $flight_options = array();
    }

    if (isset($_POST['host-options'])) {
        $host_options = $_POST['host-options'];
    } else{
        $host_options = array();
    }

    if (isset($_POST['host-type'])) {
        $host_type = $_POST['host-type'];
    } else{
        $host_type= array();
    }

    if (isset($_POST['hotel'])) {
        $hotel = $_POST['hotel'];
    } else{
        $hotel = array();
    }

    if (isset($_POST['theme'])) {
        $themes = $_POST['theme'];
    } else{
        $themes = array();
    }
    $transport_type = $_POST['transport-type'];
    $driver = $_POST['driver'];
    //Contact Info
    $contact = '<strong>Nom complet: </strong>'.$fullname.'<br>';
    $contact .= '<strong>Email: </strong>'. $email .'<br>';
    $contact .= '<strong>Téléphone: </strong>'. $phone .'<br>';
    $contact .= '<hr>';
    //Destination, Companions, Budget and Preferences
    $body .= ($destination==''?'':'<strong>Destination: </strong>'. $destination  .'<br>');
    $body .= ($departure==''?'':'<strong>Date de départ: </strong>'. $departure .'<br>');
    $body .= ($return==''?'':'<strong>Date de retour: </strong>'. $return  . '<br>');
    $body .= ($flexibility==''?'':'<strong>Flexibility: </strong>'. $flexibility. '<br><hr>');
    $body .= ($companion==''?'':'<strong>Companions: </strong>'. $companion . '<br>');
    $body .= ($adults==''?'':'<strong>Number of Adults: </strong>'. $adults  . '<br>');
    $body .= ($kids==''?'':'<strong>Number of kids: </strong>'. $kids . '<br><hr>');
    $body .= ($babies==''?'':'<strong>Number of babies: </strong>'. $babies . '<br><hr>');
    $body .= ($budget==''?'':'<strong>Budget: </strong>'. $budget  . '<br><hr>');
    $body .= ($preferences==''?'':'<strong>Preferences: </strong><br>'. $preferences  .'<br><hr>');

    $body .= '<strong>Flight Options: </strong><br>';
    if(!empty($class)){
        $body .= '<strong>Classe: </strong>';
        $class_info = '';
        foreach ($class as $c) {
            $class_info .= ucwords($c) . ', ';
        }
        if($class_info == ''){
            $body .= 'No class type selected';
        }else{
            $body .= $class_info;
        }
    }

    $body .= '<br><strong>Siege: </strong>'        . $seat         . '<br>';
    if (!empty($flight_options)) {
        $body .= '<strong>Flight Preferences: </strong>';
        $finfo = '';
        foreach ($flight_options as $fo) {
            $finfo .= '<li>' . ucwords($fo) . '</li>';
        }
        if($finfo == ''){
            $finfo .= 'No flight preferences selected.';
        }else{
            $finfo = '<ul>'.$finfo.'</ul>';
        }
        $body .= $finfo;
    }

    if (!empty($host_options)) {
        $body .= '<hr><br><strong>Host options: </strong>';
        $hinfo = '';
        foreach ($host_options as $ho) {
            $hinfo .= '<li>' . ucwords($ho) . '</li>';
        }
        if($hinfo == ''){
            $hinfo .= 'No host options selected.';
        }else{
            $hinfo = '<ul>'.$hinfo.'</ul>';
        }
        $body .= $hinfo;
    }

    if (!empty($host_type)) {
        $body .= '<hr><br><strong>Host type: </strong>';
        $htinfo = '';
        foreach ($host_type as $ht) {
            $htinfo .= '<li>' . ucwords($ht) . '</li>';
        }
        if($htinfo == ''){
            $htinfo .= 'No host type selected.';
        }else{
            $htinfo = '<ul>'.$htinfo.'</ul>';
        }
        $body .= $htinfo;
    }

    if (!empty($hotel)) {
        $body .= '<hr><br><strong>Hotel stars: </strong>';
        $hinfo = '';
        foreach ($hotel as $stars) {
            $hinfo .= '<li>' . ucwords($stars) . '</li>';
        }
        if($hinfo == ''){
            $hinfo .= 'No hotel stars selected.';
        }else{
            $hinfo = '<ul>'.$hinfo.'</ul>';
        }
        $body .= $hinfo;
    }

    if (!empty($themes)) {
        $body .= '<hr><br><strong>Themes: </strong>';
        $tinfo = '';
        foreach ($themes as $theme) {
            $tinfo .= '<li>' . ucwords($theme) . '</li>';
        }
        if($tinfo == ''){
            $tinfo .= 'No themes selected.';
        }else{
            $tinfo = '<ul>'.$tinfo.'</ul>';
        }
        $body .= $tinfo;
    }

    $body .= '<strong>Transport type: </strong>' . $transport_type . '<br>';
    $body .= '<strong>Conducteur: </strong>' . $driver . '<br>';
    $partner_body = $body;
    $body = $contact.$body;
    $agency_email  = $_POST['agency_email'];
    $to = $agency_email.','.$email;
    $mail_status=false;
    if( wp_mail( $to,'Devis: '. $destination , $body, $headers) === FALSE){
        $msg .= "Error Sending Email. ";
    } else{
        $error = false;
        $mail_status = true;
        $msg .= "Email envoyé. ";
    }
    if($mail_status){
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
            $pmail = get_post_meta( $the_query->post->ID, 'partner_email',true);
            if(!empty($pmail))
                $partners_mail .= $pmail.", ";
        }
        if($partners_mail!== "") {
            $partners_mail = rtrim($partners_mail);
            $partners_mail = rtrim($partners_mail, ',');
            if (wp_mail($partners_mail, 'Devis: ' . $destination, $partner_body, $headers) === FALSE) {
                $msg .= " Mail sended to partners.";
                $error = false;
            } else {
                $msg .= " Error sending email to partners.";
                $error = true;
            }
        }
      }
    }
    header('Content-Type: application/json');
    echo json_encode(['error'=>$error,"msg"=>$msg,"body"=>$body]);
    die();
}

add_action('wp_ajax_requestQuote', 'requestQuote');
add_action('wp_ajax_nopriv_requestQuote', 'requestQuote');
?>
