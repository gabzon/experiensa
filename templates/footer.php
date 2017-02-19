<?php
//    \Components\Footer\Footer::displayFooter();
//$body_class = get_body_class();
//if(in_array('single',$body_class)){
    if ( function_exists( 'dslc_hf_get_footer' ) ) {
        echo dslc_hf_get_footer();
    }
//}