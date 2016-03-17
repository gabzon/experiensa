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
    $info .= ($destination==''?'':'<strong>Destination: </strong>'       . $destination  . '<br>');
    $info .= ($departure==''?'':'<strong>Date de départ: </strong>'       . $departure  . '<br>');
    $info .= ($return==''?'':'<strong>Date de retour: </strong>'       . $return  . '<br><hr>');
    $info .= ($budget==''?'':'<strong>Budget: </strong>'       . $budget  . '<br>');
    $info .= ($companion==''?'':'<strong>Companions: </strong>'       . $companion  . '<br>');
    $info .= ($adults==''?'':'<strong>Number of Adults: </strong>'       . $adults  . '<br>');
    $info .= ($kids==''?'':'<strong>Number of kids: </strong>'       . $kids  . '<br><hr>');
    $info .= ($preferences==''?'':'<strong>Preferences: </strong><br>'       . $preferences  . '<br>');

    if(!empty($class)){
        $info .= '<strong>Classe: </strong>';
        foreach ($class as $c) {
            $info .= ucwords($c) . ', ';
        }
    }

    $info .= '<br><strong>Siege: </strong>'        . $seat         . '<br>';

    if ($flight_options != "") {
        $info .= '<strong>Flight options: </strong></ul>';
        foreach ($flight_options as $fo) {
            $info .= '<li>' . ucwords($fo) . '</li>';
        }
        $info.= '</ul>';
    }

    if ($host_options != "") {
        $info .= '<strong>Host options: </strong></ul>';
        foreach ($host_options as $ho) {
            $info .= '<li>' . ucwords($ho) . '</li>';
        }
        $info.= '</ul>';
    }

    if ($host_type != "") {
        $info .= '<strong>Host type: </strong></ul>';
        foreach ($host_type as $ht) {
            $info .= '<li>' . ucwords($ht) . '</li>';
        }
        $info.= '</ul>';
    }

    if ($hotel != "") {
        $info .= '<strong>Hotel stars: </strong></ul>';
        foreach ($hotel as $stars) {
            $info .= '<li>' . ucwords($stars) . '</li>';
        }
        $info.= '</ul>';
    }

    if ($themes != "") {
        $info .= '<strong>Themes: </strong></ul>';
        foreach ($themes as $theme) {
            $info .= '<li>' . ucwords($theme) . '</li>';
        }
        $info.= '</ul>';
    }

    $info .=    '<strong>Type de transport: </strong>'  . $transport_type . '<br>' .
    '<strong>Conducteur: </strong>'         . $driver         . '<br>';
    //$to = 'gabriel@sevinci.com,jacqueline@fiestatravel.ch,'.$email;
    $agency_email  = $_POST['agency_email'];
    $to = $agency_email.','.$email;
    if( wp_mail( $to,'Devis: '. $destination , $info, $headers) === FALSE){
        echo "Error Sending Email:";
    } else{
        echo '<h3 style="color:blue">Email envoyé</h3>';
    }
    die();
}

add_action('wp_ajax_requestQuote', 'requestQuote');
add_action('wp_ajax_nopriv_requestQuote', 'requestQuote');
?>
