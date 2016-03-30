<?php
  function requestEstimate(){
    require_once(get_template_directory().'/components/stripe-php/init.php');
    \Stripe\Stripe::setApiKey("sk_test_A5Lh3QEC082XBFC6OVBjVpOU");
    $stripeToken = $_POST['stripeToken'];
    $expire_year = $_POST['card-expire-year'];
    $expire_month = $_POST['card-expire-month'];
    $cvc = $_POST['card-cvc'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $agency_email = $_POST['agency_email'];
    $fullname = $_POST['fullname'];
    $estimate_voyage = $_POST['estimate_voyage'];
    $price = $_POST['price'];
    $currency = $_POST['currency'];
    $estimate_url = $_POST['estimate_url'];
    $status = array();
    $status['status'] = 0;
    $status['msg']="";
    try {
      $charge = \Stripe\Charge::create(array(
        "amount" => $price*100, // amount in cents, again
        "currency" => $currency,
        "source" => $stripeToken,
        "description" => "Estimate Voyage: ".$estimate_voyage.' From: '.$estimate_url
      ));
      $status['msg'] = "Payment made.";
      $status['status'] = 1;
      
    } catch(\Stripe\Error\Card $e) {
      // The card has been declined
      $status['msg'] = "The card has been declined.";
      $status['status'] = 0;
      die();
    }
    if($status['status']==1){
      $headers = array('Content-Type: text/html; charset=UTF-8');
      $body = "";
      $body .= "<strong>Nom complet: </strong>".$fullname."<br>";
      $body .= '<strong>Email: </strong>'             . $email        . '<br>';
      $body .= '<strong>Téléphone: </strong>'         . $phone        . '<br><hr>';
      $body .= "<strong> Estimate Voyage: </strong>"."<a href=\"".$estimate_url."\">".$estimate_voyage."</a><br>";
      $body .= "<strong>Price: </strong>".$price." ".$currency;
      $to = $agency_email.','.$email;
      if( wp_mail( $to,'Devis: '. $estimate_voyage , $body, $headers) === FALSE){
        $msg = $status['msg'];
        $status['msg'] = $msg." Error Sending Email.";
      } else{
        $msg = $status['msg'];
        $status['msg'] = $msg." Email envoyé.";
      }
    }
    echo $status['msg'];
    die();
  }
  add_action('wp_ajax_requestEstimate', 'requestEstimate');
  add_action('wp_ajax_nopriv_requestEstimate', 'requestEstimate');
?>