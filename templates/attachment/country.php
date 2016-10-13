<!--voy a mostar datos del pais des wiki-->
<?php
    $post_id = $post->ID;
    $title = get_the_title($post->ID);
    $terms = wp_get_post_terms( $post_id, 'country' );
    if ( ! is_wp_error( $terms ) ) {
        echo "todo que mostrar";
        $country_name = $terms[0]->name;
        $formated_counrtry = str_replace(" ","_",$country_name);
        echo "paralabra a buscar: ".$formated_counrtry;
        //print_r($country_name);
    }else{
        echo "nada que mostrar";
    }
    echo "<pre>";
    print_r($terms);
    echo "</pre>";
?>