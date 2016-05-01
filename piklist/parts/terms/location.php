<?php
/*
Title: Location options
Description: My cool new metabox
Taxonomy: location
Capability: manage_options
New: true
Collapse: true
*/

// Let's create a text box field
 piklist('field', array(
   'type' => 'text'
   ,'field' => 'field_name'
   ,'label' => __('Example Field')
   ,'description' => __('Field Description')
   ,'attributes' => array(
     'class' => 'text'
   )
 ));
 ?>
