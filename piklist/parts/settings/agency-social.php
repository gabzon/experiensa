<?php
/*
 Title: Agency Social
 Setting: agency_settings
 Tab: Social
 Tab Order: 10
 */

piklist('field', array(
    'type' => 'text',
    'field' => 'social_facebook',
    'scope' => 'post_meta',
    'label' => __('Facebook'),
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter the agency Facebook')
    ),
    'validate' => array(
        array(
            'type' => 'url'
        )
    )
));

piklist('field', array(
    'type' => 'text',
    'field' => 'social_twitter',
    'scope' => 'post_meta',
    'label' => __('Twitter'),
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter the agency Twitter')
    ),
    'validate' => array(
        array(
            'type' => 'url'
        )
    )
));

piklist('field', array(
    'type' => 'text',
    'field' => 'social_pinterest',
    'scope' => 'post_meta',
    'label' => __('Pinterest'),
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter the agency Pinterest')
    ),
    'validate' => array(
        array(
            'type' => 'url'
        )
    )
));

piklist('field', array(
    'type' => 'text',
    'field' => 'social_linkedin',
    'scope' => 'post_meta',
    'label' => __('LinkedIn'),
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter the agency LinkedIn')
    ),
    'validate' => array(
        array(
            'type' => 'url'
        )
    )
));

piklist('field', array(
    'type' => 'text',
    'field' => 'social_gplus',
    'scope' => 'post_meta',
    'label' => __('Google Plus'),
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter the agency Google Plus')
    ),
    'validate' => array(
        array(
            'type' => 'url'
        )
    )
));

piklist('field', array(
    'type' => 'text',
    'field' => 'social_skype',
    'scope' => 'post_meta',
    'label' => __('Skype'),
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter the agency Skype')
    ),
    'validate' => array(
        array(
            'type' => 'url'
        )
    )
));

piklist('field', array(
    'type' => 'text',
    'field' => 'social_instagram',
    'scope' => 'post_meta',
    'label' => __('Instagram'),
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter the agency Instagram')
    ),
    'validate' => array(
        array(
            'type' => 'url'
        )
    )
));
