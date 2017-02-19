<?php
//$header_style = Header::get_header_layout();
//$page_id = get_the_ID();
//Header::get_header($header_style);
//$body_class = get_body_class();
//if(in_array('single',$body_class)){
    if ( function_exists( 'dslc_hf_get_header' ) ) {
        echo dslc_hf_get_header();
    }
//}
