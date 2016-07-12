<?php
/**
 * Header Callbacks
 */
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
function display_background_colorpicker_callback( $control ) {
    if ( $control->manager->get_setting('header_background_type')->value() == 'color' ) {
        return true;
    } else {
        return false;
    }
}
function display_background_image_callback( $control ) {
    if ( $control->manager->get_setting('header_background_type')->value() == 'image' ) {
        return true;
    } else {
        return false;
    }
}
/**
 * Footer Callbacks
 */
function display_footer_logo_callback($control){
    $value = $control->manager->get_setting('display_footer_logo')->value();
    $id = $control->id;
    if ( $id == 'footer_logo_size' && $value == 'true' ) return true;
    if ( $id == 'footer_company_tagline' && $value == 'false' ) return true;
    return false;
}