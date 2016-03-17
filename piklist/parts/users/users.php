<?php
/*
 Title: Social Networks
 Meta box: true
 Capability: manage_options
 */
piklist('field', array(
    'type' => 'text',
    'field' => 'user_facebook',
    
    'label' => __('Facebook'),
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter your Facebook')
    ),
    'validate' => array(
        array(
            'type' => 'url'
        )
    )
));

piklist('field', array(
    'type' => 'text',
    'field' => 'user_twitter',
    
    'label' => __('Twitter'),
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter your Twitter')
    ),
    'validate' => array(
        array(
            'type' => 'url'
        )
    )
));

piklist('field', array(
    'type' => 'text',
    'field' => 'user_google_plus',
    
    'label' => __('Google Plus'),
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter your Google Plus')
    ),
    'validate' => array(
        array(
            'type' => 'url'
        )
    )
));

piklist('field', array(
    'type' => 'text',
    'field' => 'user_linkedin',
    
    'label' => __('LinkedIn'),
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter your LinkedIn')
    ),
    'validate' => array(
        array(
            'type' => 'url'
        )
    )
));

piklist('field', array(
    'type' => 'text',
    'field' => 'user_instagram',
    
    'label' => __('Instagram'),
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter your Instagram')
    ),
    'validate' => array(
        array(
            'type' => 'url'
        )
    )
));

piklist('field', array(
    'type' => 'text',
    'field' => 'user_pinterest',
    
    'label' => __('Pinterest'),
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter your Pinterest')
    ),
    'validate' => array(
        array(
            'type' => 'url'
        )
    )
));

piklist('field', array(
    'type' => 'text',
    'field' => 'user_skype',
    
    'label' => __('Skype'),
    'attributes' => array(
        'class' => 'regular-text',
        'placeholder' => __('Enter your Skype')
    ),
    'validate' => array(
        array(
            'type' => 'url'
        )
    )
));

piklist('field', array(
	'type' => 'checkbox',
	'field' => 'user_language',
	'label' => __('Language Spoken','sage'),
	'list' => false,
	'attributes' => array(
		'class' => 'text'
	),
	'choices' => array(
		'user_language_arabic' => 'Arabic',
		'user_language_mandarin' => 'Chinese (Mandarin)',
		'user_language_cantonese' => 'Chinese (Cantonese)',
		'user_language_english' => 'English',
		'user_language_farsi' => 'Farsi (Persian)',
		'user_language_french' => 'French',
		'user_language_german' => 'German',
		'user_language_hindi' => 'Hindi',
		'user_language_italian' => 'Italian',
		'user_language_japanese' => 'Japanese',
		'user_language_korean' => 'Korean',
		'user_language_polish' => 'Polish',
		'user_language_portuguese' => 'Portuguese',
		'user_language_russian' => 'Russian',
		'user_language_spanish' => 'Spanish',
		'user_language_thai' => 'Thai',
		'user_language_turkish' => 'Turkish',
		'user_language_vietnamese' => 'Vietnamese'
	)
));

piklist('field', array(
    'type' => 'file',
    'field' => 'user_profile_photo',
    
    'label' => __('Profile Picture','piklist'),
    'options' => array(
      'modal_title' => __('Add Picture','sage'),
      'button' => __('Add Picture','piklist')
    ),
    'validate' => array(
  		array(
        	'type' => 'limit',
        	'options' => array(
          		'min' => 0,
          		'max' => 1
        )
      )
    )
));

piklist('field', array(
    'type' => 'text',
    'field' => 'user_phone',
    'add_more' => true,
    'label' => __('Phone(s)','sage')
));	

piklist('field', array(
	'type' => 'datepicker',
	'field' => 'user_birthday',
	'label' => __('Birthday','sage'),
	'attributes' => array(
		'class' => 'text'
	),
	'options' => array(
		'dateFormat' => 'd-mm-yy',
		'firstDay' => '0'
	)
));

piklist('field', array(
	'type' => 'textarea',
	'field' => 'user_hobbies',
	'label' => __('Hobbies','sage'),
	'attributes' => array(
		'rows' => 10,
		'cols' => 50,
		'class' => 'large-text',
		'placeholder' => __('Enter your hobbies')
	)
 ));

$countrylist = array(
"Afghanistan"=>"Afghanistan",
"Albania"=>"Albania",
"Algeria"=>"Algeria",
"Algeria"=>"Algeria",
"Algeria"=>"Algeria",
"Antigua and Barbuda"=>"Antigua and Barbuda",
"Argentina"=>"Argentina",
"Armenia"=>"Armenia",
"Australia"=>"Australia",
"Austria"=>"Austria",
"Azerbaijan"=>"Azerbaijan",
"Bahamas"=>"Bahamas",
"Bahrain"=>"Bahrain",
"Bangladesh"=>"Bangladesh",
"Barbados"=>"Barbados",
"Belarus"=>"Belarus",
"Belgium"=>"Belgium",
"Belize"=>"Belize",
"Benin"=>"Benin",
"Bhutan"=>"Bhutan",
"Bolivia"=>"Bolivia",
"Bosnia and Herzegovina"=>"Bosnia and Herzegovina",
"Botswana"=>"Botswana",
"Brazil"=>"Brazil",
"Brunei"=>"Brunei",
"Bulgaria"=>"Bulgaria",
"Burkina Faso"=>"Burkina Faso",
"Burundi"=>"Burundi",
"Cambodia"=>"Cambodia",
"Cameroon"=>"Cameroon",
"Canada"=>"Canada",
"Cape Verde"=>"Cape Verde",
"Central African Republic"=>"Central African Republic",
"Chad"=>"Chad",
"Chile"=>"Chile",
"China"=>"China",
"Colombi"=>"Colombi",
"Comoros"=>"Comoros",
"Congo (Brazzaville)"=>"Congo (Brazzaville)",
"Congo"=>"Congo",
"Costa Rica"=>"Costa Rica",
"Cote d'Ivoire"=>"Cote d'Ivoire",
"Croatia"=>"Croatia",
"Cuba"=>"Cuba",
"Cyprus"=>"Cyprus",
"Czech Republic"=>"Czech Republic",
"Denmark"=>"Denmark",
"Djibouti"=>"Djibouti",
"Dominica"=>"Dominica",
"Dominican Republic"=>"Dominican Republic",
"East Timor (Timor Timur)"=>"East Timor (Timor Timur)",
"Ecuador"=>"Ecuador",
"Egypt"=>"Egypt",
"El Salvador"=>"El Salvador",
"Equatorial Guinea"=>"Equatorial Guinea",
"Eritrea"=>"Eritrea",
"Estonia"=>"Estonia",
"Ethiopia"=>"Ethiopia",
"Fiji"=>"Fiji",
"Finland"=>"Finland",
"France"=>"France",
"Gabon"=>"Gabon",
"Gambia, The"=>"Gambia, The",
"Georgia"=>"Georgia",
"Germany"=>"Germany",
"Ghana"=>"Ghana",
"Greece"=>"Greece",
"Grenada"=>"Grenada",
"Guatemala"=>"Guatemala",
"Guinea"=>"Guinea",
"Guinea-Bissau"=>"Guinea-Bissau",
"Guyana"=>"Guyana",
"Haiti"=>"Haiti",
"Honduras"=>"Honduras",
"Hungary"=>"Hungary",
"Iceland"=>"Iceland",
"India"=>"India",
"Indonesia"=>"Indonesia",
"Iran"=>"Iran",
"Iraq"=>"Iraq",
"Ireland"=>"Ireland",
"Israel"=>"Israel",
"Italy"=>"Italy",
"Jamaica"=>"Jamaica",
"Japan"=>"Japan",
"Jordan"=>"Jordan",
"Kazakhstan"=>"Kazakhstan",
"Kenya"=>"Kenya",
"Kiribati"=>"Kiribati",
"Korea, North"=>"Korea, North",
"Korea, South"=>"Korea, South",
"Kuwait"=>"Kuwait",
"Kyrgyzstan"=>"Kyrgyzstan",
"Laos"=>"Laos",
"Latvia"=>"Latvia",
"Lebanon"=>"Lebanon",
"Lesotho"=>"Lesotho",
"Liberia"=>"Liberia",
"Libya"=>"Libya",
"Liechtenstein"=>"Liechtenstein",
"Lithuania"=>"Lithuania",
"Luxembourg"=>"Luxembourg",
"Macedonia"=>"Macedonia",
"Madagascar"=>"Madagascar",
"Malawi"=>"Malawi",
"Malaysia"=>"Malaysia",
"Maldives"=>"Maldives",
"Mali"=>"Mali",
"Malta"=>"Malta",
"Marshall Islands"=>"Marshall Islands",
"Mauritania"=>"Mauritania",
"Mauritius"=>"Mauritius",
"Mexico"=>"Mexico",
"Micronesia"=>"Micronesia",
"Moldova"=>"Moldova",
"Monaco"=>"Monaco",
"Mongolia"=>"Mongolia",
"Morocco"=>"Morocco",
"Mozambique"=>"Mozambique",
"Myanmar"=>"Myanmar",
"Namibia"=>"Namibia",
"Nauru"=>"Nauru",
"Nepa"=>"Nepa",
"Netherlands"=>"Netherlands",
"New Zealand"=>"New Zealand",
"Nicaragua"=>"Nicaragua",
"Niger"=>"Niger",
"Nigeria"=>"Nigeria",
"Norway"=>"Norway",
"Oman"=>"Oman",
"Pakistan"=>"Pakistan",
"Palau"=>"Palau",
"Panama"=>"Panama",
"Papua New Guinea"=>"Papua New Guinea",
"Paraguay"=>"Paraguay",
"Peru"=>"Peru",
"Philippines"=>"Philippines",
"Poland"=>"Poland",
"Portugal"=>"Portugal",
"Qatar"=>"Qatar",
"Romania"=>"Romania",
"Russia"=>"Russia",
"Rwanda"=>"Rwanda",
"Saint Kitts and Nevis"=>"Saint Kitts and Nevis",
"Saint Lucia"=>"Saint Lucia",
"Saint Vincent"=>"Saint Vincent",
"Samoa"=>"Samoa",
"San Marino"=>"San Marino",
"Sao Tome and Principe"=>"Sao Tome and Principe",
"Saudi Arabia"=>"Saudi Arabia",
"Senegal"=>"Senegal",
"Serbia and Montenegro"=>"Serbia and Montenegro",
"Seychelles"=>"Seychelles",
"Sierra Leone"=>"Sierra Leone",
"Singapore"=>"Singapore",
"Slovakia"=>"Slovakia",
"Slovenia"=>"Slovenia",
"Solomon Islands"=>"Solomon Islands",
"Somalia"=>"Somalia",
"South Africa"=>"South Africa",
"Spain"=>"Spain",
"Sri Lanka"=>"Sri Lanka",
"Sudan"=>"Sudan",
"Suriname"=>"Suriname",
"Swaziland"=>"Swaziland",
"Sweden"=>"Sweden",
"Switzerland"=>"Switzerland",
"Syria"=>"Syria",
"Taiwan"=>"Taiwan",
"Tajikistan"=>"Tajikistan",
"Tanzania"=>"Tanzania",
"Thailand"=>"Thailand",
"Togo"=>"Togo",
"Tonga"=>"Tonga",
"Trinidad and Tobago"=>"Trinidad and Tobago",
"Tunisia"=>"Tunisia",
"Turkey"=>"Turkey",
"Turkmenistan"=>"Turkmenistan",
"Tuvalu"=>"Tuvalu",
"Uganda"=>"Uganda",
"Ukraine"=>"Ukraine",
"United Arab Emirates"=>"United Arab Emirates",
"United Kingdom"=>"United Kingdom",
"United States"=>"United States",
"Uruguay"=>"Uruguay",
"Uzbekistan"=>"Uzbekistan",
"Vanuatu"=>"Vanuatu",
"Vatican City"=>"Vatican City",
"Venezuela"=>"Venezuela",
"Vietnam"=>"Vietnam",
"Yemen"=>"Yemen",
"Zambia"=>"Zambia",
"Zimbabwe"=>"Zimbabwe"
);


$passport_country = array(
	'type'      => 'select',
    'field'     => 'user_passport_country',
    'label'     => __('Country','sage'),
    'columns'   => 4,
    'choices'   => $countrylist
);

$passport_number = array(
    'type'      => 'text',
    'field'     => 'user_passport_number',
    'columns'   => 3,
    'label'     => __('Passport number','sage')
);

$passport_expiry_date = array(
	'type'      => 'datepicker',
	'field'     => 'user_passport_expiry_date',
	'columns'   => 2,
	'label'     => __('Expiry date','sage'),
	'options'   => array('dateFormat' => 'd/m/yy'),
);

$passport_place_issue = array(
    'type'      => 'text',
    'field'     => 'user_passport_place_issue',
    'columns'   => 3,
    'label'     => __('Place of issue','sage')
);

piklist('field', array(
    'type'      => 'group',
    'label' => __('Passport','sage'),
    'add_more'  => true,
    'fields'    => array(
        $passport_country,
        $passport_number,
        $passport_expiry_date,
        $passport_place_issue
    )
));


$user_work_occupation = array(
    'type' => 'text',
    'field' => 'user_work_occupation',
    'label' => __('Occupation','sage')
);

$work_sectors = array(
	"Aerospace, defense and security" => "Aerospace, defense and security",
	"Airline industry" => "Airline industry",
	"Banking" => "Banking",
	"Chemistry & pharma" => "Chemistry & pharma",
	"Consumer goods" => "Consumer goods",
	"Health" => "Health",
	"Insurance" => "Insurance",
	"Manufacturing" => "Manufacturing",
	"Mining industry" => "Mining industry",
	"Public sector" => "Public sector",
	"Services" => "Services",
	"Telecom" => "Telecom",
	"Tourism" => "Tourism",
	"Transport" => "Transport",
	"Utilities & energy" => "Utilities & energy"
);

$user_work_sectors =  array(
	'type' => 'select',
	'field' => 'user_work_sector',
	'label' => __('Sector','sage'),
	'attributes' => array(
	  'class' => 'text'
	),
	'choices' => $work_sectors
);

piklist('field', array(
    'type' => 'group',
    'label' => __('Work','sage'),
    'fields' => array(
		$user_work_occupation,
		$user_work_sectors
	)
));

piklist('field', array(
	'type' => 'checkbox',
	'field' => 'user_airplane_preferences',
	'label' => __('Airplane preferences','sage'),
	'list' => false,
	'attributes' => array(
		'class' => 'text'
	),
	'choices' => array(
		'user_airplane_preferences_economy' => 'Economy',
		'user_airplane_preferences_business' => 'Business Class',
		'user_airplane_preferences_first' => 'First Class',
		'user_airplane_preferences_aile' => 'Aile',
		'user_airplane_preferences_window' => 'Window',
		'user_airplane_preferences_middle' => 'Middle seat',
		'user_airplane_preferences_chicken' => 'Chicken',
		'user_airplane_preferences_pasta' => 'Pasta',
		'user_airplane_preferences_vegetarian' => 'Vegetarian',
		'user_airplane_preferences_especial' => 'Special / Gluten free'
	)
));

$status = array(
	"single" => "Single",
	"in couple" => "In Couple",
	"married" => "Married",
	"divorced" => "Divorced",
	"widow" => "Widow/Widower",
	"complicated" => "Complicated"
);

piklist('field',array(
	'type'      => 'select',
    'field'     => 'user_marital_status',
    'label'     => __('Marital Status','sage'),
    'columns'   => 4,
    'choices'   => $status
));

piklist('field', array(
	'type' => 'checkbox',
	'field' => 'user_color',
	'label' => __('Favorite color','sage'),
	'list' => false,
	'attributes' => array(
		'class' => 'text'
	),
	'choices' => array(
		'user_color_red' => 'Red',
		'user_color_green' => 'Green',
		'user_color_yellow' => 'Yellow',
		'user_color_blue' => 'Blue',
		'user_color_pink' => 'Pink',
		'user_color_brown' => 'Brown',
		'user_color_purple' => 'Purple',
		'user_color_black' => 'Black',
		'user_color_grey' => 'Grey',
		'user_color_violet' => 'Violet',
		'user_color_white' => 'White',
		'user_color_orange' => 'Orange'
	)
));
