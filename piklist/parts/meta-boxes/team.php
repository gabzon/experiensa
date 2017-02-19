<?php
/*
Title: Team Member information
Post Type: team
*/
$job_title = array(
    'type'      => 'text',
    'label'     => __('Title','sage'),
    'field'     => 'job_title',
    'columns'   => 12
);
piklist('field', array(
    'type'      => 'group',
    'field'     => 'job_info',
    'label'     => __('Job Information','sage'),
    'fields'    => array(
        $job_title
    )
));
$website = array(
    'type'      => 'url',
    'label'     => __('Website','sage'),
    'field'     => 'website',
    'columns'   => 12
);

$email = array(
    'type'      => 'email',
    'label'     => __('Email','sage'),
    'field'     => 'email',
    'columns'   => 6
);
$linkedin = array(
    'type'      => 'text',
    'label'     => __('Linkedin','sage'),
    'field'     => 'linkedin',
    'columns'   => 6
);
$github = array(
    'type'      => 'text',
    'label'     => __('Github','sage'),
    'field'     => 'github',
    'columns'   => 6
);
$skype = array(
    'type'      => 'text',
    'label'     => __('Skype','sage'),
    'field'     => 'skype',
    'columns'   => 6
);
piklist('field', array(
    'type'      => 'group',
    'field'     => 'contact_info',
    'label'     => __('Contact Information','sage'),
    'fields'    => array(
        $website,
        $email,
        $linkedin,
        $github,
        $skype
    )
));

