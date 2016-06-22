<?php

function choice_display_phonebutton_callback( $control ) {
    if ( $control->manager->get_setting('header_display_phone_number')->value() == 'TRUE' ) {
        return true;
    } else {
        return false;
    }
}
function choice_display_quotebutton_callback( $control ) {
    if ( $control->manager->get_setting('header_display_quote_button')->value() == 'TRUE' ) {
        return true;
    } else {
        return false;
    }
}
function choice_display_languagebutton_callback( $control ) {
    if ( $control->manager->get_setting('header_language_display')->value() == 'TRUE' ) {
        return true;
    } else {
        return false;
    }
}