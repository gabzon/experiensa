<?php

function product_contact(){
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $email          = $_POST['email'];
    $phone          = $_POST['phone'];

    $info   = '<br><strong>Email: </strong>' . $email .'<br>';
    $info  .= '<br><strong>Phone: </strong>' . $phone .'<br>';

    $info .=    '<strong>Type de transport: </strong>'  . $transport_type . '<br>' .
                '<strong>Conducteur: </strong>'         . $driver         . '<br>';

    $to = 'gab.zambrano@gmail.com';

    if( wp_mail( $to,'Devis pour moi', $info, $headers) === FALSE){
        echo "Error Sending Email";
    } else{
        echo '<h3 style="color:blue">Email envoyé</h3>';
    }
    die();
}

add_action('wp_ajax_product_contact', 'product_contact');
add_action('wp_ajax_nopriv_product_contact', 'product_contact');
?>
