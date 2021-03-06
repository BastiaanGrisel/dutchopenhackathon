<?php
class CountryCode{
	const URL = "https://www.googleapis.com/freebase/v1/mqlread?indent=2&query=[{%22type%22:%22/aviation/airport%22,%22id%22:null,%22limit%22:%2025,%22name%22:null,%22sort%22:%22name%22,%22iata%22:%20%22<<CODE>>%22,%20%22/location/location/containedby%22:%20[{%22limit%22:6,%22name%22:null,%22optional%22:%20true,%22sort%22:%22name%22,%22/location/country/iso3166_1_alpha2%22:%20[{%20%22limit%22:6,%20%22optional%22:%20false,%20%22sort%22:%22value%22,%20%22value%22:null}]}],%22airport_type%22:%20[{%22limit%22:3,%22name%22:null,%22optional%22:%20true,%22sort%22:%22name%22,%22type%22:%22/aviation/airport_type%22}]}]";

	public static function getCountryCodeForIATA($IATA){
		$url = str_replace("<<CODE>>", $IATA, self::URL);
		$code = self::getCountryCode($url);
		return $code;
	}

	private static function getCountryCode($url){
		$data = file_get_contents($url);
		$json = json_decode($data);
		
		$prop1 = "/location/location/containedby";
		$prop2 = "/location/country/iso3166_1_alpha2";
		$result = $json->result;
		$containedBy = $result[0]->$prop1;
		$iso3166_1_alpha2 = $containedBy[0]->$prop2;
		$code = $iso3166_1_alpha2[0]->value;
		
		return $code;
	}



}

class Countries
{
    /**
     * List of country codes by name
     * 
     * @var array
     */
    protected static $english_list = [
        "Afghanistan" => 'AF',
        "Åland Islands" => 'AX',
        "Albania" => 'AL',
        "Algeria" => 'DZ',
        "American Samoa" => 'AS',
        "Andorra" => 'AD',
        "Angola" => 'AO',
        "Anguilla" => 'AI',
        "Antarctica" => 'AQ',
        "Antigua and Barbuda" => 'AG',
        "Argentina" => 'AR',
        "Armenia" => 'AM',
        "Aruba" => 'AW',
        "Australia" => 'AU',
        "Austria" => 'AT',
        "Azerbaijan" => 'AZ',
        "Bahamas" => 'BS',
        "Bahrain" => 'BH',
        "Bangladesh" => 'BD',
        "Barbados" => 'BB',
        "Belarus" => 'BY',
        "Belgium" => 'BE',
        "Belize" => 'BZ',
        "Benin" => 'BJ',
        "Bermuda" => 'BM',
        "Bhutan" => 'BT',
        "Bolivia" => 'BO',
        "Bolivia, Plurinational State of" => 'BO',
        "Plurinational State of Bolivia" => 'BO',
        "Bonaire, Sint Eustatius and Saba" => 'BQ',
        "Bonaire" => 'BQ',
        "Sint Eustatius" => 'BQ',
        "Saba" => 'BQ',
        "Bosnia and Herzegovina" => 'BA',
        "Botswana" => 'BW',
        "Bouvet Island" => 'BV',
        "Brazil" => 'BR',
        "British Indian Ocean Territory" => 'IO',
        "Brunei Darussalam" => 'BN',
        "Bulgaria" => 'BG',
        "Burkina Faso" => 'BF',
        "Burundi" => 'BI',
        "Cambodia" => 'KH',
        "Cameroon" => 'CM',
        "Canada" => 'CA',
        "Cape Verde" => 'CV',
        "Cayman Islands" => 'KY',
        "Central African Republic" => 'CF',
        "Chad" => 'TD',
        "Chile" => 'CL',
        "China" => 'CN',
        "Christmas Island" => 'CX',
        "Cocos (keeling) Islands" => 'CC',
        "Colombia" => 'CO',
        "Comoros" => 'KM',
        "Congo" => 'CG',
        "Republic of the Congo" => 'CG',
        "The Democratic Republic of the Congo" => 'CD',
        "Congo, The Democratic Republic of The" => 'CD',
        "Cook Islands" => 'CK',
        "Costa Rica" => 'CR',
        "Cte D'ivoire" => 'CI',
        "Croatia" => 'HR',
        "Cuba" => 'CU',
        "Curaao" => 'CW',
        "Cyprus" => 'CY',
        "Czech Republic" => 'CZ',
        "Denmark" => 'DK',
        "Djibouti" => 'DJ',
        "Dominica" => 'DM',
        "Dominican Republic" => 'DO',
        "Ecuador" => 'EC',
        "Egypt" => 'EG',
        "El Salvador" => 'SV',
        "Equatorial Guinea" => 'GQ',
        "Eritrea" => 'ER',
        "Estonia" => 'EE',
        "Ethiopia" => 'ET',
        "Falkland Islands (malvinas)" => 'FK',
        "Faroe Islands" => 'FO',
        "Fiji" => 'FJ',
        "Finland" => 'FI',
        "France" => 'FR',
        "French Guiana" => 'GF',
        "French Polynesia" => 'PF',
        "French Southern Territories" => 'TF',
        "Gabon" => 'GA',
        "Gambia" => 'GM',
        "Georgia" => 'GE',
        "Germany" => 'DE',
        "Ghana" => 'GH',
        "Gibraltar" => 'GI',
        "Greece" => 'GR',
        "Greenland" => 'GL',
        "Grenada" => 'GD',
        "Guadeloupe" => 'GP',
        "Guam" => 'GU',
        "Guatemala" => 'GT',
        "Guernsey" => 'GG',
        "Guinea" => 'GN',
        "Guinea-bissau" => 'GW',
        "Guyana" => 'GY',
        "Haiti" => 'HT',
        "Heard Island and Mcdonald Islands" => 'HM',
        "Vatican" => 'VA',
        "Vatican city state" => 'VA',
        "Holy See" => 'VA',
        "Holy See (Vatican city state)" => 'VA',
        "Honduras" => 'HN',
        "Hong Kong" => 'HK',
        "Hungary" => 'HU',
        "Iceland" => 'IS',
        "India" => 'IN',
        "Indonesia" => 'ID',
        "Iran" => 'IR',
        "Islamic Republic of Iran" => 'IR',
        "Iran, Islamic Republic of" => 'IR',
        "Iraq" => 'IQ',
        "Ireland" => 'IE',
        "Isle of Man" => 'IM',
        "Israel" => 'IL',
        "Italy" => 'IT',
        "Jamaica" => 'JM',
        "Japan" => 'JP',
        "Jersey" => 'JE',
        "Jordan" => 'JO',
        "Kazakhstan" => 'KZ',
        "Kenya" => 'KE',
        "Kiribati" => 'KI',
        "Democratic People's Republic of Korea" => 'KP',
        "Korea, Democratic People's Republic of" => 'KP',
        "North Korea" => 'KP',
        "Korea, Republic of" => 'KR',
        "Republic of Korea" => 'KR',
        "South Korea" => 'KR',
        "Kuwait" => 'KW',
        "Kyrgyzstan" => 'KG',
        "Lao People's Democratic Republic" => 'LA',
        "Latvia" => 'LV',
        "Lebanon" => 'LB',
        "Lesotho" => 'LS',
        "Liberia" => 'LR',
        "Libya" => 'LY',
        "Liechtenstein" => 'LI',
        "Lithuania" => 'LT',
        "Luxembourg" => 'LU',
        "Macao" => 'MO',
        "Macedonia" => 'MK',
        "The Former Yugoslav Republic of Macedonia" => 'MK',
        "Macedonia, The Former Yugoslav Republic Of" => 'MK',
        "Madagascar" => 'MG',
        "Malawi" => 'MW',
        "Malaysia" => 'MY',
        "Maldives" => 'MV',
        "Mali" => 'ML',
        "Malta" => 'MT',
        "Marshall Islands" => 'MH',
        "Martinique" => 'MQ',
        "Mauritania" => 'MR',
        "Mauritius" => 'MU',
        "Mayotte" => 'YT',
        "Mexico" => 'MX',
        "Federated States of Micronesia" => 'FM',
        "Micronesia" => 'FM',
        "Micronesia, Federated States of" => 'FM',
        "Republic of Moldova" => 'MD',
        "Moldova" => 'MD',
        "Moldova, Republic of" => 'MD',
        "Monaco" => 'MC',
        "Mongolia" => 'MN',
        "Montenegro" => 'ME',
        "Montserrat" => 'MS',
        "Morocco" => 'MA',
        "Mozambique" => 'MZ',
        "Myanmar" => 'MM',
        "Namibia" => 'NA',
        "Nauru" => 'NR',
        "Nepal" => 'NP',
        "The Netherlands" => 'NL',
        "Netherlands" => 'NL',
        "New Caledonia" => 'NC',
        "New Zealand" => 'NZ',
        "Nicaragua" => 'NI',
        "Niger" => 'NE',
        "Nigeria" => 'NG',
        "Niue" => 'NU',
        "Norfolk Island" => 'NF',
        "Northern Mariana Islands" => 'MP',
        "Norway" => 'NO',
        "Oman" => 'OM',
        "Pakistan" => 'PK',
        "Palau" => 'PW',
        "Palestine" => 'PS',
        "Palestine, State of" => 'PS',
        "State of Palestine" => 'PS',
        "Panama" => 'PA',
        "Papua New Guinea" => 'PG',
        "Paraguay" => 'PY',
        "Peru" => 'PE',
        "Philippines" => 'PH',
        "Pitcairn" => 'PN',
        "Poland" => 'PL',
        "Portugal" => 'PT',
        "Puerto Rico" => 'PR',
        "Qatar" => 'QA',
        "Runion" => 'RE',
        "Romania" => 'RO',
        "Russian Federation" => 'RU',
        "Rwanda" => 'RW',
        "Saint Barthlemy" => 'BL',
        "Saint Helena, Ascension and Tristan Da Cunha" => 'SH',
        "Saint Kitts and Nevis" => 'KN',
        "Saint Lucia" => 'LC',
        "Saint Martin (french Part)" => 'MF',
        "Saint Pierre and Miquelon" => 'PM',
        "Saint Vincent and The Grenadines" => 'VC',
        "Samoa" => 'WS',
        "San Marino" => 'SM',
        "Sao Tome and Principe" => 'ST',
        "Saudi Arabia" => 'SA',
        "Senegal" => 'SN',
        "Serbia" => 'RS',
        "Seychelles" => 'SC',
        "Sierra Leone" => 'SL',
        "Singapore" => 'SG',
        "Sint Maarten (dutch Part)" => 'SX',
        "Slovakia" => 'SK',
        "Slovenia" => 'SI',
        "Solomon Islands" => 'SB',
        "Somalia" => 'SO',
        "South Africa" => 'ZA',
        "South Georgia and The South Sandwich Islands" => 'GS',
        "South Sudan" => 'SS',
        "Spain" => 'ES',
        "Sri Lanka" => 'LK',
        "Sudan" => 'SD',
        "Suriname" => 'SR',
        "Svalbard and Jan Mayen" => 'SJ',
        "Swaziland" => 'SZ',
        "Sweden" => 'SE',
        "Switzerland" => 'CH',
        "Syrian Arab Republic" => 'SY',
        "Taiwan" => 'TW',
        "Taiwan, Province of China" => 'TW',
        "Tajikistan" => 'TJ',
        "United Republic of Tanzania" => 'TZ',
        "Tanzania" => 'TZ',
        "Tanzania, United Republic of" => 'TZ',
        "Thailand" => 'TH',
        "Timor-leste" => 'TL',
        "Togo" => 'TG',
        "Tokelau" => 'TK',
        "Tonga" => 'TO',
        "Trinidad and Tobago" => 'TT',
        "Tunisia" => 'TN',
        "Turkey" => 'TR',
        "Turkmenistan" => 'TM',
        "Turks and Caicos Islands" => 'TC',
        "Tuvalu" => 'TV',
        "Uganda" => 'UG',
        "Ukraine" => 'UA',
        "United Arab Emirates" => 'AE',
        "United Kingdom" => 'GB',
        "Great Brittan" => 'GB',
        "United States of America" => 'US',
        "United States" => 'US',
        "USA" => 'US',
        "United States Minor Outlying Islands" => 'UM',
        "Uruguay" => 'UY',
        "Uzbekistan" => 'UZ',
        "Vanuatu" => 'VU',
        "Bolivarian Republic of Venezuela" => 'VE',
        "Venezuela" => 'VE',
        "Venezuela, Bolivarian Republic of" => 'VE',
        "Socialist Republic of Vietnam" => 'VN',
        "Vietnam" => 'VN',
        "Vietnam, Socialist Republic of" => 'VN',
        "Virgin Islands, British" => 'VG',
        "British Virgin Islands" => 'VG',
        "Virgin Islands, U.S." => 'VI',
        "U.S. Virgin Islands" => 'VI',
        "Wallis and Futuna" => 'WF',
        "Western Sahara" => 'EH',
        "Yemen" => 'YE',
        "Zambia" => 'ZM',
        "Zimbabwe" => 'ZW',
    ];

    protected static $dutch_list = 
    array(
            'AF' => 'Afghanistan',
            'AL' => 'Albanië',
            'DZ' => 'Algerije',
            'AS' => 'Amerikaans-Samoa',
            'VI' => 'Amerikaanse Maagdeneilanden',
            'AD' => 'Andorra',
            'AO' => 'Angola',
            'AI' => 'Anguilla',
            'AQ' => 'Antarctica',
            'AG' => 'Antigua en Barbuda',
            'AR' => 'Argentinië',
            'AM' => 'Armenië',
            'AW' => 'Aruba',
            'AU' => 'Australië',
            'AZ' => 'Azerbeidzjan',
            'BS' => 'Bahama\'s',
            'BH' => 'Bahrein',
            'BD' => 'Bangladesh',
            'BB' => 'Barbados',
            'BE' => 'België',
            'BZ' => 'Belize',
            'BJ' => 'Benin',
            'BM' => 'Bermuda',
            'BT' => 'Bhutan',
            'BO' => 'Bolivia',
            'BA' => 'Bosnië en Herzegovina',
            'BW' => 'Botswana',
            'BV' => 'Bouvet',
            'BR' => 'Brazilië',
            'IO' => 'Brits Territorium in de Indische Oceaan',
            'VG' => 'Britse Maagdeneilanden',
            'BN' => 'Brunei',
            'BG' => 'Bulgarije',
            'BF' => 'Burkina Faso',
            'BI' => 'Burundi',
            'KH' => 'Cambodja',
            'CA' => 'Canada',
            'CF' => 'Centraal-Afrikaanse Republiek',
            'CL' => 'Chili',
            'CN' => 'China',
            'CX' => 'Christmaseiland',
            'CC' => 'Cocoseilanden',
            'CO' => 'Colombia',
            'KM' => 'Comoren',
            'CG' => 'Congo-Brazzaville',
            'CD' => 'Congo-Kinshasa',
            'CK' => 'Cookeilanden',
            'CR' => 'Costa Rica',
            'CU' => 'Cuba',
            'CY' => 'Cyprus',
            'DK' => 'Denemarken',
            'DJ' => 'Djibouti',
            'DM' => 'Dominica',
            'DO' => 'Dominicaanse Republiek',
            'DE' => 'Duitsland',
            'EC' => 'Ecuador',
            'EG' => 'Egypte',
            'SV' => 'El Salvador',
            'GQ' => 'Equatoriaal-Guinea',
            'ER' => 'Eritrea',
            'EE' => 'Estland',
            'ET' => 'Ethiopië',
            'FO' => 'Faeröer',
            'FK' => 'Falklandeilanden',
            'FJ' => 'Fiji',
            'PH' => 'Filipijnen',
            'FI' => 'Finland',
            'FR' => 'Frankrijk',
            'GF' => 'Frans-Guyana',
            'PF' => 'Frans-Polynesië',
            'TF' => 'Franse Zuidelijke en Antarctische Gebieden',
            'GA' => 'Gabon',
            'GM' => 'Gambia',
            'GE' => 'Georgië',
            'GH' => 'Ghana',
            'GI' => 'Gibraltar',
            'GD' => 'Grenada',
            'GR' => 'Griekenland',
            'GL' => 'Groenland',
            'GP' => 'Guadeloupe',
            'GU' => 'Guam',
            'GT' => 'Guatemala',
            'GG' => 'Guernsey',
            'GN' => 'Guinee',
            'GW' => 'Guinee-Bissau',
            'GY' => 'Guyana',
            'HT' => 'Haïti',
            'HM' => 'Heard en McDonaldeilanden',
            'HN' => 'Honduras',
            'HU' => 'Hongarije',
            'HK' => 'Hongkong',
            'IE' => 'Ierland',
            'IS' => 'IJsland',
            'IN' => 'India',
            'ID' => 'Indonesië',
            'IQ' => 'Irak',
            'IR' => 'Iran',
            'IM' => 'Isle of Man',
            'IL' => 'Israël',
            'IT' => 'Italië',
            'CI' => 'Ivoorkust',
            'JM' => 'Jamaica',
            'JP' => 'Japan',
            'YE' => 'Jemen',
            'JE' => 'Jersey',
            'JO' => 'Jordanië',
            'KY' => 'Kaaimaneilanden',
            'CV' => 'Kaapverdië',
            'CM' => 'Kameroen',
            'KZ' => 'Kazachstan',
            'KE' => 'Kenia',
            'KG' => 'Kirgizië',
            'KI' => 'Kiribati',
            'UM' => 'Kleine Pacifische eilanden van de Verenigde Staten',
            'KW' => 'Koeweit',
            'HR' => 'Kroatië',
            'LA' => 'Laos',
            'LS' => 'Lesotho',
            'LV' => 'Letland',
            'LB' => 'Libanon',
            'LR' => 'Liberia',
            'LY' => 'Libië',
            'LI' => 'Liechtenstein',
            'LT' => 'Litouwen',
            'LU' => 'Luxemburg',
            'MO' => 'Macau',
            'MK' => 'Macedonië',
            'MG' => 'Madagaskar',
            'MW' => 'Malawi',
            'MV' => 'Maldiven',
            'MY' => 'Maleisië',
            'ML' => 'Mali',
            'MT' => 'Malta',
            'MA' => 'Marokko',
            'MH' => 'Marshalleilanden',
            'MQ' => 'Martinique',
            'MR' => 'Mauritanië',
            'MU' => 'Mauritius',
            'YT' => 'Mayotte',
            'MX' => 'Mexico',
            'FM' => 'Micronesia',
            'MD' => 'Moldavië',
            'MC' => 'Monaco',
            'MN' => 'Mongolië',
            'ME' => 'Montenegro',
            'MS' => 'Montserrat',
            'MZ' => 'Mozambique',
            'MM' => 'Myanmar',
            'NA' => 'Namibië',
            'NR' => 'Nauru',
            'NL' => 'Nederland',
            'AN' => 'Nederlandse Antillen',
            'NP' => 'Nepal',
            'NI' => 'Nicaragua',
            'NC' => 'Nieuw-Caledonië',
            'NZ' => 'Nieuw-Zeeland',
            'NE' => 'Niger',
            'NG' => 'Nigeria',
            'NU' => 'Niue',
            'KP' => 'Noord-Korea',
            'MP' => 'Noordelijke Marianen',
            'NO' => 'Noorwegen',
            'NF' => 'Norfolk',
            'UG' => 'Oeganda',
            'UA' => 'Oekraïne',
            'UZ' => 'Oezbekistan',
            'OM' => 'Oman',
            'TL' => 'Oost-Timor',
            'AT' => 'Oostenrijk',
            'PK' => 'Pakistan',
            'PW' => 'Palau',
            'PS' => 'Palestijnse Autoriteit',
            'PA' => 'Panama',
            'PG' => 'Papoea-Nieuw-Guinea',
            'PY' => 'Paraguay',
            'PE' => 'Peru',
            'PN' => 'Pitcairneilanden',
            'PL' => 'Polen',
            'PT' => 'Portugal',
            'PR' => 'Puerto Rico',
            'QA' => 'Qatar',
            'RO' => 'Roemenië',
            'RU' => 'Rusland',
            'RW' => 'Rwanda',
            'RE' => 'Réunion',
            'KN' => 'Saint Kitts en Nevis',
            'LC' => 'Saint Lucia',
            'VC' => 'Saint Vincent en de Grenadines',
            'BL' => 'Saint-Barthélemy',
            'PM' => 'Saint-Pierre en Miquelon',
            'SB' => 'Salomonseilanden',
            'WS' => 'Samoa',
            'SM' => 'San Marino',
            'ST' => 'Sao Tomé en Principe',
            'SA' => 'Saoedi-Arabië',
            'SN' => 'Senegal',
            'RS' => 'Servië',
            'SC' => 'Seychellen',
            'SL' => 'Sierra Leone',
            'SG' => 'Singapore',
            'SH' => 'Sint-Helena',
            'MF' => 'Sint-Maarten',
            'SI' => 'Slovenië',
            'SK' => 'Slowakije',
            'SD' => 'Soedan',
            'SO' => 'Somalië',
            'ES' => 'Spanje',
            'SJ' => 'Spitsbergen en Jan Mayen',
            'LK' => 'Sri Lanka',
            'SR' => 'Suriname',
            'SZ' => 'Swaziland',
            'SY' => 'Syrië',
            'TJ' => 'Tadzjikistan',
            'TW' => 'Taiwan',
            'TZ' => 'Tanzania',
            'TH' => 'Thailand',
            'TG' => 'Togo',
            'TK' => 'Tokelau-eilanden',
            'TO' => 'Tonga',
            'TT' => 'Trinidad en Tobago',
            'TD' => 'Tsjaad',
            'CZ' => 'Tsjechië',
            'TN' => 'Tunesië',
            'TR' => 'Turkije',
            'TM' => 'Turkmenistan',
            'TC' => 'Turks- en Caicoseilanden',
            'TV' => 'Tuvalu',
            'UY' => 'Uruguay',
            'VU' => 'Vanuatu',
            'VA' => 'Vaticaanstad',
            'VE' => 'Venezuela',
            'GB' => 'Verenigd Koninkrijk',
            'AE' => 'Verenigde Arabische Emiraten',
            'US' => 'Verenigde Staten',
            'VN' => 'Vietnam',
            'WF' => 'Wallis en Futuna',
            'EH' => 'Westelijke Sahara',
            'BY' => 'Wit-Rusland',
            'ZM' => 'Zambia',
            'ZW' => 'Zimbabwe',
            'ZA' => 'Zuid-Afrika',
            'GS' => 'Zuid-Georgië en de Zuidelijke Sandwicheilanden',
            'KR' => 'Zuid-Korea',
            'SE' => 'Zweden',
            'CH' => 'Zwitserland',
            'AX' => 'Aland'
        );
    
    /**
     * Get country name by code
     * 
     * @param string $code  Country code or name
     * @return string
     */
    public static function getEnglishName($code)
    {
        return array_search(strtoupper($code), static::$english_list) ?: null;
    }
    
    /**
     * Get country name by code
     * 
     * @param string $code  Country code or name
     * @return string
     */
    public static function getDutchName($code)
    {
        return self::$dutch_list[strtoupper($code)];
    }
}

?>