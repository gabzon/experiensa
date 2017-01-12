<?php

use \Experiensa\LiveComposer\Options\VillaBlanca;

if ( defined( 'DS_LIVE_COMPOSER_URL' ) ) {
    class AboutPageVB_LC_Module extends DSLC_Module
    {
        var $module_id = 'AboutPageVB_LC_Module';
        var $module_title = 'About Page';
        var $module_icon = 'question';
        var $module_category = 'Villa Blanca';

        // Module Options
        function options()
        {
            // The options array
            $options = array(
                VillaBlanca::mainTitle('about_title','Title','About'),
                VillaBlanca::mainSubTitle('about_subtitle','Subtitle','At the heart of beautiful Catalonia: enjoy the elegance of the mansion, romantic gardens, calm and prestige, sports facilities fun, clear sea of Costa Brava, charms of Barcelona, in exclusivity for your family and friends'),
                VillaBlanca::content('first_content','First Column',''),
                VillaBlanca::content('second_content','Second Column',''),
            );
            // Return the array
            return apply_filters('dslc_module_options', $options, $this->module_id);
        }

        // Module Output
        function output($options)
        {
            $title = (!empty($options['about_title'])?$options['about_title']:'About');
            $subtitle = (!empty($options['about_subtitle'])?$options['about_subtitle']:'At the heart of beautiful Catalonia: enjoy the elegance of the mansion, romantic gardens, calm and prestige, sports facilities fun, clear sea of Costa Brava, charms of Barcelona, in exclusivity for your family and friends');
            $first_content = (!empty($options['first_content'])
                ?$options['first_content']
                :
                'Villa Blanca is a manorial mansion with views over the Mediterranean Sea. It is located in the Maresme Coast, where the approximate minimum temperature between spring and autumn is 10 degrees Celsius, and the approximate maximum temperature is 30 degrees Celsius.

                The house is found inside a family-owned property of an area of 5 hectare, located 40 km away from Barcelona. It was built by a stock market agent, Marcelino Coll, and was later sold to Juan Pich i Pon, mayor of Barcelona and president of the Generalitat de Catalunya (Catalonia’s regional government).

                It is surrounded by magnificent and romantic gardens designed by the famous architect Jean-Baptiste Nicolas Forestier. The house was built in 1909 and it is catalogued as a “protected building” by the Autonomous Regional Government of Catalonia.');
            $second_content = (!empty($options['second_content'])
                ?$options['second_content']
                :'The property is well connected by both train and car with Barcelona and la Costa Brava. The Foundation for Environmental Education granted many years ago the Blue Flag to the wonderful beaches of Sant Vicenç de Montalt and Caldes d’Estrac for their high environmental and quality standards. These beaches are within walking distance.');
            set_query_var('about_title',$title);
            set_query_var('about_subtitle',$subtitle);
            set_query_var('second_content',$second_content);
            set_query_var('first_content',$first_content);

            ob_start();
            get_template_part("templates/villa_blanca/about");
            $html = ob_get_clean();
            $this->module_start( $options );
            echo $html;
            // REQUIRED
            $this->module_end( $options );
        }
    }
    // Register Module
    add_action('dslc_hook_register_modules',
        create_function('', 'return dslc_register_module( "AboutPageVB_LC_Module" );')
    );
}