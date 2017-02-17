<?php
  
  Class Common{
    /**
     *  Returns a list of common currencies
     * @return array
     */
    public static function currency_list(){
      $currency = array (
            'ALL' => 'Albania Lek',
            'AFN' => 'Afghanistan Afghani',
            'ARS' => 'Argentina Peso',
            'AWG' => 'Aruba Guilder',
            'AUD' => 'Australia Dollar',
            'AZN' => 'Azerbaijan New Manat',
            'BSD' => 'Bahamas Dollar',
            'BBD' => 'Barbados Dollar',
            'BDT' => 'Bangladeshi taka',
            'BYR' => 'Belarus Ruble',
            'BZD' => 'Belize Dollar',
            'BMD' => 'Bermuda Dollar',
            'BOB' => 'Bolivia Boliviano',
            'BAM' => 'Bosnia and Herzegovina Convertible Marka',
            'BWP' => 'Botswana Pula',
            'BGN' => 'Bulgaria Lev',
            'BRL' => 'Brazil Real',
            'BND' => 'Brunei Darussalam Dollar',
            'KHR' => 'Cambodia Riel',
            'CAD' => 'Canada Dollar',
            'KYD' => 'Cayman Islands Dollar',
            'CLP' => 'Chile Peso',
            'CNY' => 'China Yuan Renminbi',
            'COP' => 'Colombia Peso',
            'CRC' => 'Costa Rica Colon',
            'HRK' => 'Croatia Kuna',
            'CUP' => 'Cuba Peso',
            'CZK' => 'Czech Republic Koruna',
            'DKK' => 'Denmark Krone',
            'DOP' => 'Dominican Republic Peso',
            'XCD' => 'East Caribbean Dollar',
            'EGP' => 'Egypt Pound',
            'SVC' => 'El Salvador Colon',
            'EEK' => 'Estonia Kroon',
            'EUR' => 'Euro Member Countries',
            'FKP' => 'Falkland Islands (Malvinas) Pound',
            'FJD' => 'Fiji Dollar',
            'GHC' => 'Ghana Cedis',
            'GIP' => 'Gibraltar Pound',
            'GTQ' => 'Guatemala Quetzal',
            'GGP' => 'Guernsey Pound',
            'GYD' => 'Guyana Dollar',
            'HNL' => 'Honduras Lempira',
            'HKD' => 'Hong Kong Dollar',
            'HUF' => 'Hungary Forint',
            'ISK' => 'Iceland Krona',
            'INR' => 'India Rupee',
            'IDR' => 'Indonesia Rupiah',
            'IRR' => 'Iran Rial',
            'IMP' => 'Isle of Man Pound',
            'ILS' => 'Israel Shekel',
            'JMD' => 'Jamaica Dollar',
            'JPY' => 'Japan Yen',
            'JEP' => 'Jersey Pound',
            'KZT' => 'Kazakhstan Tenge',
            'KPW' => 'Korea (North) Won',
            'KRW' => 'Korea (South) Won',
            'KGS' => 'Kyrgyzstan Som',
            'LAK' => 'Laos Kip',
            'LVL' => 'Latvia Lat',
            'LBP' => 'Lebanon Pound',
            'LRD' => 'Liberia Dollar',
            'LTL' => 'Lithuania Litas',
            'MKD' => 'Macedonia Denar',
            'MYR' => 'Malaysia Ringgit',
            'MUR' => 'Mauritius Rupee',
            'MXN' => 'Mexico Peso',
            'MNT' => 'Mongolia Tughrik',
            'MZN' => 'Mozambique Metical',
            'NAD' => 'Namibia Dollar',
            'NPR' => 'Nepal Rupee',
            'ANG' => 'Netherlands Antilles Guilder',
            'NZD' => 'New Zealand Dollar',
            'NIO' => 'Nicaragua Cordoba',
            'NGN' => 'Nigeria Naira',
            'NOK' => 'Norway Krone',
            'OMR' => 'Oman Rial',
            'PKR' => 'Pakistan Rupee',
            'PAB' => 'Panama Balboa',
            'PYG' => 'Paraguay Guarani',
            'PEN' => 'Peru Nuevo Sol',
            'PHP' => 'Philippines Peso',
            'PLN' => 'Poland Zloty',
            'QAR' => 'Qatar Riyal',
            'RON' => 'Romania New Leu',
            'RUB' => 'Russia Ruble',
            'SHP' => 'Saint Helena Pound',
            'SAR' => 'Saudi Arabia Riyal',
            'RSD' => 'Serbia Dinar',
            'SCR' => 'Seychelles Rupee',
            'SGD' => 'Singapore Dollar',
            'SBD' => 'Solomon Islands Dollar',
            'SOS' => 'Somalia Shilling',
            'ZAR' => 'South Africa Rand',
            'LKR' => 'Sri Lanka Rupee',
            'SEK' => 'Sweden Krona',
            'CHF' => 'Switzerland Franc',
            'SRD' => 'Suriname Dollar',
            'SYP' => 'Syria Pound',
            'TWD' => 'Taiwan New Dollar',
            'THB' => 'Thailand Baht',
            'TTD' => 'Trinidad and Tobago Dollar',
            'TRY' => 'Turkey Lira',
            'TRL' => 'Turkey Lira',
            'TVD' => 'Tuvalu Dollar',
            'UAH' => 'Ukraine Hryvna',
            'GBP' => 'United Kingdom Pound',
            'UGX' => 'Uganda Shilling',
            'USD' => 'United States Dollar',
            'UYU' => 'Uruguay Peso',
            'UZS' => 'Uzbekistan Som',
            'VEF' => 'Venezuela Bolivar',
            'VND' => 'Viet Nam Dong',
            'YER' => 'Yemen Rial',
            'ZWD' => 'Zimbabwe Dollar'
        );
      return $currency;
    }

    /**
     * Generates and returns an associative array where
     * key is the abbreviation of the currency and value
     * is the combination of the abbreviation with the name of the currency
     * @return array
     */
    public static function currency_name_description_list(){
      $list = array();
      $currency = self::currency_list();
      foreach($currency as $key => $value){
        $list[$key] = $key.' - '.$value;
      }
      return $list;
    }

    /**
     * Returns an array with currency symbols
     * @return array
     */
    public static function currency_symbols(){
      $currency_symbols = array(
        'AED' => '&#1583;.&#1573;', // ?
        'AFN' => '&#65;&#102;',
        'ALL' => '&#76;&#101;&#107;',
        'AMD' => '',
        'ANG' => '&#402;',
        'AOA' => '&#75;&#122;', // ?
        'ARS' => '&#36;',
        'AUD' => '&#36;',
        'AWG' => '&#402;',
        'AZN' => '&#1084;&#1072;&#1085;',
        'BAM' => '&#75;&#77;',
        'BBD' => '&#36;',
        'BDT' => '&#2547;', // ?
        'BGN' => '&#1083;&#1074;',
        'BHD' => '.&#1583;.&#1576;', // ?
        'BIF' => '&#70;&#66;&#117;', // ?
        'BMD' => '&#36;',
        'BND' => '&#36;',
        'BOB' => '&#36;&#98;',
        'BRL' => '&#82;&#36;',
        'BSD' => '&#36;',
        'BTN' => '&#78;&#117;&#46;', // ?
        'BWP' => '&#80;',
        'BYR' => '&#112;&#46;',
        'BZD' => '&#66;&#90;&#36;',
        'CAD' => '&#36;',
        'CDF' => '&#70;&#67;',
        'CHF' => '&#67;&#72;&#70;',
        'CLF' => '', // ?
        'CLP' => '&#36;',
        'CNY' => '&#165;',
        'COP' => '&#36;',
        'CRC' => '&#8353;',
        'CUP' => '&#8396;',
        'CVE' => '&#36;', // ?
        'CZK' => '&#75;&#269;',
        'DJF' => '&#70;&#100;&#106;', // ?
        'DKK' => '&#107;&#114;',
        'DOP' => '&#82;&#68;&#36;',
        'DZD' => '&#1583;&#1580;', // ?
        'EGP' => '&#163;',
        'ETB' => '&#66;&#114;',
        'EUR' => '&#8364;',
        'FJD' => '&#36;',
        'FKP' => '&#163;',
        'GBP' => '&#163;',
        'GEL' => '&#4314;', // ?
        'GHS' => '&#162;',
        'GIP' => '&#163;',
        'GMD' => '&#68;', // ?
        'GNF' => '&#70;&#71;', // ?
        'GTQ' => '&#81;',
        'GYD' => '&#36;',
        'HKD' => '&#36;',
        'HNL' => '&#76;',
        'HRK' => '&#107;&#110;',
        'HTG' => '&#71;', // ?
        'HUF' => '&#70;&#116;',
        'IDR' => '&#82;&#112;',
        'ILS' => '&#8362;',
        'INR' => '&#8377;',
        'IQD' => '&#1593;.&#1583;', // ?
        'IRR' => '&#65020;',
        'ISK' => '&#107;&#114;',
        'JEP' => '&#163;',
        'JMD' => '&#74;&#36;',
        'JOD' => '&#74;&#68;', // ?
        'JPY' => '&#165;',
        'KES' => '&#75;&#83;&#104;', // ?
        'KGS' => '&#1083;&#1074;',
        'KHR' => '&#6107;',
        'KMF' => '&#67;&#70;', // ?
        'KPW' => '&#8361;',
        'KRW' => '&#8361;',
        'KWD' => '&#1583;.&#1603;', // ?
        'KYD' => '&#36;',
        'KZT' => '&#1083;&#1074;',
        'LAK' => '&#8365;',
        'LBP' => '&#163;',
        'LKR' => '&#8360;',
        'LRD' => '&#36;',
        'LSL' => '&#76;', // ?
        'LTL' => '&#76;&#116;',
        'LVL' => '&#76;&#115;',
        'LYD' => '&#1604;.&#1583;', // ?
        'MAD' => '&#1583;.&#1605;.', //?
        'MDL' => '&#76;',
        'MGA' => '&#65;&#114;', // ?
        'MKD' => '&#1076;&#1077;&#1085;',
        'MMK' => '&#75;',
        'MNT' => '&#8366;',
        'MOP' => '&#77;&#79;&#80;&#36;', // ?
        'MRO' => '&#85;&#77;', // ?
        'MUR' => '&#8360;', // ?
        'MVR' => '.&#1923;', // ?
        'MWK' => '&#77;&#75;',
        'MXN' => '&#36;',
        'MYR' => '&#82;&#77;',
        'MZN' => '&#77;&#84;',
        'NAD' => '&#36;',
        'NGN' => '&#8358;',
        'NIO' => '&#67;&#36;',
        'NOK' => '&#107;&#114;',
        'NPR' => '&#8360;',
        'NZD' => '&#36;',
        'OMR' => '&#65020;',
        'PAB' => '&#66;&#47;&#46;',
        'PEN' => '&#83;&#47;&#46;',
        'PGK' => '&#75;', // ?
        'PHP' => '&#8369;',
        'PKR' => '&#8360;',
        'PLN' => '&#122;&#322;',
        'PYG' => '&#71;&#115;',
        'QAR' => '&#65020;',
        'RON' => '&#108;&#101;&#105;',
        'RSD' => '&#1044;&#1080;&#1085;&#46;',
        'RUB' => '&#1088;&#1091;&#1073;',
        'RWF' => '&#1585;.&#1587;',
        'SAR' => '&#65020;',
        'SBD' => '&#36;',
        'SCR' => '&#8360;',
        'SDG' => '&#163;', // ?
        'SEK' => '&#107;&#114;',
        'SGD' => '&#36;',
        'SHP' => '&#163;',
        'SLL' => '&#76;&#101;', // ?
        'SOS' => '&#83;',
        'SRD' => '&#36;',
        'STD' => '&#68;&#98;', // ?
        'SVC' => '&#36;',
        'SYP' => '&#163;',
        'SZL' => '&#76;', // ?
        'THB' => '&#3647;',
        'TJS' => '&#84;&#74;&#83;', // ? TJS (guess)
        'TMT' => '&#109;',
        'TND' => '&#1583;.&#1578;',
        'TOP' => '&#84;&#36;',
        'TRY' => '&#8356;', // New Turkey Lira (old symbol used)
        'TTD' => '&#36;',
        'TWD' => '&#78;&#84;&#36;',
        'TZS' => '',
        'UAH' => '&#8372;',
        'UGX' => '&#85;&#83;&#104;',
        'USD' => '&#36;',
        'UYU' => '&#36;&#85;',
        'UZS' => '&#1083;&#1074;',
        'VEF' => '&#66;&#115;',
        'VND' => '&#8363;',
        'VUV' => '&#86;&#84;',
        'WST' => '&#87;&#83;&#36;',
        'XAF' => '&#70;&#67;&#70;&#65;',
        'XCD' => '&#36;',
        'XDR' => '',
        'XOF' => '',
        'XPF' => '&#70;',
        'YER' => '&#65020;',
        'ZAR' => '&#82;',
        'ZMK' => '&#90;&#75;', // ?
        'ZWL' => '&#90;&#36;',
      );
      return $currency_symbols;
    }

    /**
     * Get the selected currency from Agency Settigns page
     * @return string
     */
    public static function get_settled_currency(){
      $settings = get_option('agency_settings');
      $currency = ($settings['agency_currency']) ? $settings['agency_currency'] : 'CHF';
      return $currency;
    }

    /**
     * Get timezone list
     * @return array
     */
    public static function get_timezone_array(){
      $timezoneIdentifiers = DateTimeZone::listIdentifiers();
      $utcTime = new DateTime('now', new DateTimeZone('UTC'));
      $tempTimezones = array();
      
      foreach ($timezoneIdentifiers as $timezoneIdentifier) {
          $currentTimezone = new DateTimeZone($timezoneIdentifier);
  
          $tempTimezones[] = array(
              'offset' => (int)$currentTimezone->getOffset($utcTime),
              'identifier' => $timezoneIdentifier
          );
      }
      // Sort the array by offset,identifier ascending
      usort($tempTimezones, function($a, $b) {
          return ($a['offset'] == $b['offset'])
              ? strcmp($a['identifier'], $b['identifier'])
              : $a['offset'] - $b['offset'];
      });
  
      $timezoneList = array();
      foreach ($tempTimezones as $tz) {
          $sign = ($tz['offset'] > 0) ? '+' : '-';
          $offset = gmdate('H:i', abs($tz['offset']));
          $timezoneList[$tz['identifier']] = '(UTC ' . $sign . $offset . ') ' .
              $tz['identifier'];
      }
  
      return $timezoneList;
    }

    /**
     * Get list with all countries
     * @return array
     */
    public static function country_list(){
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
      return $countrylist;
    }

    /**
     * Get all custom taxonomies from a post type name and exclude taxonomies on the list($excluded) param
     * @param $post_type
     * @param null $excluded
     * @return array|null
     */
    public static function get_custom_taxonomies_by_pt($post_type,$excluded = null){
        $taxs = get_object_taxonomies( $post_type );
        $taxonomies = array();
        if(!empty($taxs)){
          if($excluded!=null || !empty($excluded)){
            for($i=0;$i<count($taxs);$i++){
              $sw = 0;
              for($j=0;$j<count($excluded);$j++){
                if($taxs[$i]==$excluded[$j]){
                  $sw = 1;
                  break;
                }
              }
              if($sw == 0){
                $taxonomies[]=$taxs[$i];
              }
            }
            return $taxonomies;
          }else{
            return $taxs;
          }
        }else
          return null;
    }

    /**
     * Get terms from a post id and taxonomy list. All of them on default language
     * @param $id => Post ID
     * @param $taxonomies
     * @return array
     */
    public static function get_terms_by_id_taxonomies($id,$taxonomies){
        $WPML_active = Helpers::checkWPMLactive();
        if($WPML_active) {
            global $sitepress;
            $default_language = $sitepress->get_default_language();
            $actual_language = ICL_LANGUAGE_CODE;
            if ($default_language != $actual_language)
                $sitepress->switch_lang($default_language, true);
        }
        $terms = array();
        foreach($taxonomies as $taxonomy){
            $result = get_the_terms($id ,$taxonomy);
            if(!empty($result)){
                $terms = array_merge($terms,$result);
            }
        }
        if($WPML_active) {
//            global $sitepress;
            $sitepress->switch_lang($actual_language, true);
        }
        if(!empty($terms)){
            $result = array();
            foreach($terms as $term){
                if($term->taxonomy == 'theme')
                    $row['taxonomy'] = 'themes';
                else
                    $row['taxonomy'] = $term->taxonomy;
                $row['term'] = $term->name;
                $row['post_id'] = $id;
                $result[] = $row;
            }
            return $result;
        }else
            return $terms;
    }

    /**
     * Get all media terms
     * @param $id
     * @param $post_type
     * @return array
     */
    public static function get_media_terms($id,$post_type){
      $excluded = ['category ','post_tag ','excluded ','included ','category','theme'];
      $taxonomies = self::get_custom_taxonomies_by_pt($post_type,$excluded);
      if($taxonomies!=null && !empty($taxonomies)){
        $terms = self::get_terms_by_id_taxonomies($id,$taxonomies);
        return $terms;
      }else{
        return array();
      }
    }

    /**
     * Get the post id from a translated post id
     * @param $postid
     * @param string $posttype
     * @return mixed
     */
    public static function get_original_post_id($postid,$posttype='post'){
      $original_id = $postid;
      if ( function_exists('icl_object_id') ) {
        global $sitepress;
        $default_lenguaje = $sitepress->get_default_language();
        $original_id = icl_object_id($postid,$posttype,true,$default_lenguaje);
      }
      return $original_id;
    }
  }
