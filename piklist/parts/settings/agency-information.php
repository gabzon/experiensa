<?php
/*
 Title: Agency Information
 Setting: agency_settings
 */

piklist('field',array(
    'type'      => 'select',
    'field'     => 'website_use',
    'label'     => __('This website will be used as:','sage'),
    'columns'   => 3,
    'value'     => 'travel',
    'choices'   => array(
        'travel'         => __('Travel Agency','sage'),
        'hotel'          => __('Hotel','sage'),
        'tourist'        => __('Tourist Office','sage')
    ),
));
//Travel Agency Post Types
piklist('field',array(
    'type' => 'checkbox',
    'field' => 'travel_agency_posttypes',
    'label' => __('Travel Agency Modules','sage'),
    'choices' => array(
        'host'      => __('Hosts','sage'),
        'estimate'  => __('Estimates','sage'),
        'brochure'  => __('Brochure','sage'),
        'partner'   => __('Partners','sage'),
        'feedback'  => __('Feedback','sage'),
        'voyage'    => __('Voyages','sage'),
        'service'   => __('Services','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'website_use',
            'value' => 'travel'
        )
    )
));
//Hotel Post Types
piklist('field',array(
    'type' => 'checkbox',
    'field' => 'hotel_posttypes',
    'label' => __('Hotel Modules','sage'),
    'choices' => array(
        'host'      => __('Hosts','sage'),
        'estimate'  => __('Estiamtes','sage'),
        'feedback'  => __('Feedback','sage'),
        'services'  => __('Services','sage'),
        'room'      => __('Rooms','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'website_use',
            'value' => 'hotel'
        )
    )
));
//Tourist Office Post Types
piklist('field',array(
    'type' => 'checkbox',
    'field' => 'tourist_office_posttypes',
    'label' => __('Tourist Office Modules','sage'),
    'choices' => array(
        'host' => __('Hosts','sage'),
        'voyage' => __('Voyages','sage'),
        'sites' => __('Sites','sage'),
        'festivals' => __('Festivals','sage')
    ),
    'conditions' => array(
        array(
            'field' => 'website_use',
            'value' => 'tourist'
        )
    )
));
piklist('field', array(
    'type'      => 'file',
    'field'     => 'agency_logo',
    'scope'     => 'post_meta',
    'label'     => __('Logo','sage'),
    'options'   => array(
        'modal_title'   => __('Add Logo','sage'),
        'button'        => __('Add Logo','sage')
    )
));

piklist('field', array(
    'type'      => 'textarea',
    'field'     => 'agency_description',
    'scope'     => 'post_meta',
    'label'     => __('Agency Description','sage'),
    'attributes' => array(
        'rows' => 5,
        'cols' => 50,
        'class' => 'regular-text',
        'placeholder' => __('Enter the agency description')
    )
));

piklist('field', array(
    'type' => 'text',
    'field' => 'agency_address',
    'scope' => 'post_meta',
    'label' => __('Address','sage'),
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter the agency address','sage')
    )
));

piklist('field', array(
    'type' => 'text',
    'field' => 'agency_postal_code',
    'scope' => 'post_meta',
    'label' => __('Postal Code'),
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter the agency postal code','sage')
    )
));

piklist('field', array(
    'type' => 'text',
    'field' => 'agency_city',
    'scope' => 'post_meta',
    'label' => __('City'),
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter the agency city','sage')
    )
));

piklist('field', array(
    'type' => 'text',
    'field' => 'agency_country',
    'scope' => 'post_meta',
    'label' => __('Country'),
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter the agency country','sage')
    )
));

piklist('field', array(
    'type' => 'text',
    'field' => 'agency_email',
    'scope' => 'post_meta',
    'label' => __('Email'),
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter the agency email','sage')
    )
));

piklist('field', array(
    'type' => 'text',
    'field' => 'agency_phone',
    'scope' => 'post_meta',
    'label' => __('Phone'),
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter the agency phone','sage')
    )
));

piklist('field', array(
    'type' => 'text',
    'field' => 'agency_fax',
    'scope' => 'post_meta',
    'label' => __('Fax','sage'),
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter the agency fax','sage')
    )
));

piklist('field', array(
    'type' => 'textarea',
    'field' => 'agency_schedule',
    'scope' => 'post_meta',
    'label' => __('Schedule','sage'),
    'attributes' => array(
        'rows' => 5,
        'cols' => 50,
        'class' => 'regular-text',
        'placeholder' => __('Enter the agency schedule','sage')
    )
));

piklist('field', array(
    'type' => 'textarea',
    'field' => 'agency_google_map',
    'scope' => 'post_meta',
    'columns'=> 12,
    'label' => __('Agency Map','sage'),
));

piklist('field', array(
    'type' => 'radio',
    'field' => 'agency_insurance',
    'value' => 'yes',
    'label' => 'Travel Agency Insurance',
    'attributes' => array(
        'class' => 'text'
    ),'choices' => array(
        'yes' => __('Yes'),
        'no' => __('No')
    )
));
