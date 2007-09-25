<?php

/**
 * Silverstripe i18n API
 *
 * @author Bernat Foj Capell <bernat@silverstripe.com>
 */

class i18n extends Controller {
	
	/**
	 * This static variable is used to store the current defined locale. Default value is 'en_US'
	 */
	static $currentlocale = 'en_US';
	
	/**
	 * This is the locale in which generated language files are (we assume US English)
	 *
	 * @var string
	 */
	static $default_locale = 'en_US';

	/**
	 * An exhaustive list of possible locales (code => language and country)
	 *
	 * @var array
	 */
	static $allLocales = array(
		'aa_DJ' => 'Afar (Djibouti)',
		'ab_GE' => 'Abkhazian (Georgia)',
		'abr_GH' => 'Abron (Ghana)',
		'ace_ID' => 'Achinese (Indonesia)',
		'ady_RU' => 'Adyghe (Russia)',
		'af_ZA' => 'Afrikaans (South Africa)',
		'ak_GH' => 'Akan (Ghana)',
		'am_ET' => 'Amharic (Ethiopia)',
		'ar_AE' => 'Arabic (United Arab Emirates)',
		'ar_BH' => 'Arabic (Bahrain)',
		'ar_DJ' => 'Arabic (Djibouti)',
		'ar_DZ' => 'Arabic (Algeria)',
		'ar_EG' => 'Arabic (Egypt)',
		'ar_EH' => 'Arabic (Western Sahara)',
		'ar_ER' => 'Arabic (Eritrea)',
		'ar_IL' => 'Arabic (Israel)',
		'ar_IQ' => 'Arabic (Iraq)',
		'ar_JO' => 'Arabic (Jordan)',
		'ar_KM' => 'Arabic (Comoros)',
		'ar_KW' => 'Arabic (Kuwait)',
		'ar_LB' => 'Arabic (Lebanon)',
		'ar_LY' => 'Arabic (Libya)',
		'ar_MA' => 'Arabic (Morocco)',
		'ar_MR' => 'Arabic (Mauritania)',
		'ar_OM' => 'Arabic (Oman)',
		'ar_PS' => 'Arabic (Palestinian Territory)',
		'ar_QA' => 'Arabic (Qatar)',
		'ar_SA' => 'Arabic (Saudi Arabia)',
		'ar_SD' => 'Arabic (Sudan)',
		'ar_SY' => 'Arabic (Syria)',
		'ar_TD' => 'Arabic (Chad)',
		'ar_TN' => 'Arabic (Tunisia)',
		'ar_YE' => 'Arabic (Yemen)',
		'ar_IR' => 'Arabic (Iran)',
		'as_IN' => 'Assamese (India)',
		'auv_FR' => 'Auvergnat (France)',
		'av_RU' => 'Avaric (Russia)',
		'awa_IN' => 'Awadhi (India)',
		'ay_BO' => 'Aymara (Bolivia)',
		'ay_PE' => 'Aymara (Peru)',
		'az_AZ' => 'Azerbaijani (Azerbaijan)',
		'az_IR' => 'Azerbaijani (Iran)',
		'ba_RU' => 'Bashkir (Russia)',
		'ban_ID' => 'Balinese (Indonesia)',
		'be_BY' => 'Belarusian (Belarus)',
		'bew_ID' => 'Betawi (Indonesia)',
		'bg_BG' => 'Bulgarian (Bulgaria)',
		'bgc_IN' => 'Haryanvi (India)',
		'bcc_PK' => 'Balochi, Southern (Pakistan)',
		'bgn_PK' => 'Balochi, Western (Pakistan)',
		'bgp_PK' => 'Balochi, Easter (Pakistan)',
		'bhb_IN' => 'Bhili (India)',
		'bhi_IN' => 'Bhilali (India)',
		'bcl_PH' => 'Bicolano, Central (Philippines)',
		'bhk_PH' => 'Bicolano, Albay (Philippines)',
		'bho_IN' => 'Bhojpuri (India)',
		'bho_MU' => 'Bhojpuri (Mauritius)',
		'bho_NP' => 'Bhojpuri (Nepal)',
		'bi_VU' => 'Bislama (Vanuatu)',
		'bjj_IN' => 'Kanauji (India)',
		'bjn_ID' => 'Banjar (Indonesia)',
		'bm_ML' => 'Bambara (Mali)',
		'bn_BD' => 'Bengali (Bangladesh)',
		'bn_IN' => 'Bengali (India)',
		'bo_CN' => 'Tibetan (China)',
		'bqi_IR' => 'Bakhtiari (Iran)',
		'brh_PK' => 'Brahui (Pakistan)',
		'bs_BA' => 'Bosnian (Bosnia and Herzegovina)',
		'btk_ID' => 'Batak (Indonesia)',
		'buc_YT' => 'Bushi (Mayotte)',
		'bug_ID' => 'Buginese (Indonesia)',
		'ca_AD' => 'Catalan (Andorra)',
		'ca_ES' => 'Catalan (Spain)',
		'ce_RU' => 'Chechen (Russia)',
		'ceb_PH' => 'Cebuano (Philippines)',
		'cgg_UG' => 'Chiga (Uganda)',
		'ch_GU' => 'Chamorro (Guam)',
		'chk_FM' => 'Chuukese (Micronesia)',
		'crk_CA' => 'Cree, Plains (Canada)',
		'cwd_CA' => 'Cree, Woods (Canada)',
		'cs_CZ' => 'Czech (Czech Republic)',
		'cy_GB' => 'Welsh (United Kingdom)',
		'da_DK' => 'Danish (Denmark)',
		'da_GL' => 'Danish (Greenland)',
		'dcc_IN' => 'Deccan (India)',
		'de_AT' => 'German (Austria)',
		'de_BE' => 'German (Belgium)',
		'de_CH' => 'German (Switzerland)',
		'de_DE' => 'German (Germany)',
		'de_LI' => 'German (Liechtenstein)',
		'de_LU' => 'German (Luxembourg)',
		'de_BR' => 'German (Brazil)',
		'de_US' => 'German (United States)',
		'dgo_IN' => 'Dogri (India)',
		'dhd_IN' => 'Dhundari (India)',
		'diq_TR' => 'Dimli (Turkey)',
		'dje_NE' => 'Zarma (Niger)',
		'dv_MV' => 'Divehi (Maldives)',
		'dz_BT' => 'Dzongkha (Bhutan)',
		'ee_GH' => 'Ewe (Ghana)',
		'el_CY' => 'Greek (Cyprus)',
		'el_GR' => 'Greek (Greece)',
		'en_AG' => 'English (Antigua and Barbuda)',
		'en_AI' => 'English (Anguilla)',
		'en_AS' => 'English (American Samoa)',
		'en_AU' => 'English (Australia)',
		'en_BB' => 'English (Barbados)',
		'en_BM' => 'English (Bermuda)',
		'en_BS' => 'English (Bahamas)',
		'en_BW' => 'English (Botswana)',
		'en_BZ' => 'English (Belize)',
		'en_CA' => 'English (Canada)',
		'en_CC' => 'English (Cocos Islands)',
		'en_CK' => 'English (Cook Islands)',
		'en_CM' => 'English (Cameroon)',
		'en_CX' => 'English (Christmas Island)',
		'en_DM' => 'English (Dominica)',
		'en_FJ' => 'English (Fiji)',
		'en_FK' => 'English (Falkland Islands)',
		'en_FM' => 'English (Micronesia)',
		'en_GB' => 'English (United Kingdom)',
		'en_GD' => 'English (Grenada)',
		'en_GG' => 'English (Guernsey)',
		'en_GH' => 'English (Ghana)',
		'en_GI' => 'English (Gibraltar)',
		'en_GM' => 'English (Gambia)',
		'en_GU' => 'English (Guam)',
		'en_GY' => 'English (Guyana)',
		'en_HK' => 'English (Hong Kong SAR China)',
		'en_HN' => 'English (Honduras)',
		'en_IE' => 'English (Ireland)',
		'en_IM' => 'English (Isle of Man)',
		'en_JE' => 'English (Jersey)',
		'en_JM' => 'English (Jamaica)',
		'en_KE' => 'English (Kenya)',
		'en_KI' => 'English (Kiribati)',
		'en_KN' => 'English (Saint Kitts and Nevis)',
		'en_KY' => 'English (Cayman Islands)',
		'en_LC' => 'English (Saint Lucia)',
		'en_LR' => 'English (Liberia)',
		'en_MH' => 'English (Marshall Islands)',
		'en_MP' => 'English (Northern Mariana Islands)',
		'en_MS' => 'English (Montserrat)',
		'en_MT' => 'English (Malta)',
		'en_MU' => 'English (Mauritius)',
		'en_MW' => 'English (Malawi)',
		'en_NA' => 'English (Namibia)',
		'en_NF' => 'English (Norfolk Island)',
		'en_NG' => 'English (Nigeria)',
		'en_NR' => 'English (Nauru)',
		'en_NU' => 'English (Niue)',
		'en_NZ' => 'English (New Zealand)',
		'en_PG' => 'English (Papua New Guinea)',
		'en_PH' => 'English (Philippines)',
		'en_PK' => 'English (Pakistan)',
		'en_PN' => 'English (Pitcairn)',
		'en_PR' => 'English (Puerto Rico)',
		'en_PW' => 'English (Palau)',
		'en_RW' => 'English (Rwanda)',
		'en_SB' => 'English (Solomon Islands)',
		'en_SC' => 'English (Seychelles)',
		'en_SG' => 'English (Singapore)',
		'en_SH' => 'English (Saint Helena)',
		'en_SL' => 'English (Sierra Leone)',
		'en_SZ' => 'English (Swaziland)',
		'en_TC' => 'English (Turks and Caicos Islands)',
		'en_TK' => 'English (Tokelau)',
		'en_TO' => 'English (Tonga)',
		'en_TT' => 'English (Trinidad and Tobago)',
		'en_TV' => 'English (Tuvalu)',
		'en_TZ' => 'English (Tanzania)',
		'en_UG' => 'English (Uganda)',
		'en_UM' => 'English (United States Minor Outlying Islands)',
//		'en_US' => 'English (United States)',
		'en_VC' => 'English (Saint Vincent and the Grenadines)',
		'en_VG' => 'English (British Virgin Islands)',
		'en_VI' => 'English (U.S. Virgin Islands)',
		'en_VU' => 'English (Vanuatu)',
		'en_WS' => 'English (Samoa)',
		'en_ZA' => 'English (South Africa)',
		'en_ZM' => 'English (Zambia)',
		'en_ZW' => 'English (Zimbabwe)',
		'en_BE' => 'English (Belgium)',
		'en_DE' => 'English (Germany)',
		'en_ES' => 'English (Spain)',
		'en_FR' => 'English (France)',
		'en_IN' => 'English (India)',
		'en_IT' => 'English (Italy)',
		'en_MY' => 'English (Malaysia)',
		'en_NL' => 'English (Netherlands)',
		'es_AR' => 'Spanish (Argentina)',
		'es_BO' => 'Spanish (Bolivia)',
		'es_CL' => 'Spanish (Chile)',
		'es_CO' => 'Spanish (Colombia)',
		'es_CR' => 'Spanish (Costa Rica)',
		'es_CU' => 'Spanish (Cuba)',
		'es_DO' => 'Spanish (Dominican Republic)',
		'es_EC' => 'Spanish (Ecuador)',
		'es_ES' => 'Spanish (Spain)',
		'es_GQ' => 'Spanish (Equatorial Guinea)',
		'es_GT' => 'Spanish (Guatemala)',
		'es_HN' => 'Spanish (Honduras)',
		'es_MX' => 'Spanish (Mexico)',
		'es_NI' => 'Spanish (Nicaragua)',
		'es_PA' => 'Spanish (Panama)',
		'es_PE' => 'Spanish (Peru)',
		'es_PH' => 'Spanish (Philippines)',
		'es_PR' => 'Spanish (Puerto Rico)',
		'es_PY' => 'Spanish (Paraguay)',
		'es_SV' => 'Spanish (El Salvador)',
		'es_UY' => 'Spanish (Uruguay)',
		'es_VE' => 'Spanish (Venezuela)',
		'es_AD' => 'Spanish (Andorra)',
		'es_BZ' => 'Spanish (Belize)',
		'es_US' => 'Spanish (United States)',
		'et_EE' => 'Estonian (Estonia)',
		'eu_ES' => 'Basque (Spain)',
		'fa_AF' => 'Persian (Afghanistan)',
		'fa_IR' => 'Persian (Iran)',
		'fa_PK' => 'Persian (Pakistan)',
		'fan_GQ' => 'Fang (Equatorial Guinea)',
		'fi_FI' => 'Finnish (Finland)',
		'fi_SE' => 'Finnish (Sweden)',
		'fil_PH' => 'Filipino (Philippines)',
		'fj_FJ' => 'Fijian (Fiji)',
		'fo_FO' => 'Faroese (Faroe Islands)',
		'fon_BJ' => 'Fon (Benin)',
		'fr_BE' => 'French (Belgium)',
		'fr_BF' => 'French (Burkina Faso)',
		'fr_BI' => 'French (Burundi)',
		'fr_BJ' => 'French (Benin)',
		'fr_CA' => 'French (Canada)',
		'fr_CF' => 'French (Central African Republic)',
		'fr_CG' => 'French (Congo - Brazzaville)',
		'fr_CH' => 'French (Switzerland)',
		'fr_CI' => 'French (Ivory Coast)',
		'fr_CM' => 'French (Cameroon)',
		'fr_DJ' => 'French (Djibouti)',
		'fr_DZ' => 'French (Algeria)',
		'fr_FR' => 'French (France)',
		'fr_GA' => 'French (Gabon)',
		'fr_GF' => 'French (French Guiana)',
		'fr_GN' => 'French (Guinea)',
		'fr_GP' => 'French (Guadeloupe)',
		'fr_HT' => 'French (Haiti)',
		'fr_KM' => 'French (Comoros)',
		'fr_LU' => 'French (Luxembourg)',
		'fr_MA' => 'French (Morocco)',
		'fr_MC' => 'French (Monaco)',
		'fr_MG' => 'French (Madagascar)',
		'fr_ML' => 'French (Mali)',
		'fr_MQ' => 'French (Martinique)',
		'fr_MU' => 'French (Mauritius)',
		'fr_NC' => 'French (New Caledonia)',
		'fr_NE' => 'French (Niger)',
		'fr_PF' => 'French (French Polynesia)',
		'fr_PM' => 'French (Saint Pierre and Miquelon)',
		'fr_RE' => 'French (Reunion)',
		'fr_RW' => 'French (Rwanda)',
		'fr_SC' => 'French (Seychelles)',
		'fr_SN' => 'French (Senegal)',
		'fr_SY' => 'French (Syria)',
		'fr_TD' => 'French (Chad)',
		'fr_TG' => 'French (Togo)',
		'fr_TN' => 'French (Tunisia)',
		'fr_VU' => 'French (Vanuatu)',
		'fr_WF' => 'French (Wallis and Futuna)',
		'fr_YT' => 'French (Mayotte)',
		'fr_GB' => 'French (United Kingdom)',
		'fr_US' => 'French (United States)',
		'fuv_NG' => 'Fulfulde (Nigeria)',
		'ga_IE' => 'Irish (Ireland)',
		'ga_GB' => 'Irish (United Kingdom)',
		'gaa_GH' => 'Ga (Ghana)',
		'gbm_IN' => 'Garhwali (India)',
		'gcr_GF' => 'Guianese Creole French (French Guiana)',
		'gd_GB' => 'Scottish Gaelic (United Kingdom)',
		'gil_KI' => 'Gilbertese (Kiribati)',
		'gl_ES' => 'Galician (Spain)',
		'glk_IR' => 'Gilaki (Iran)',
		'gn_PY' => 'Guarani (Paraguay)',
		'gno_IN' => 'Gondi, Northern (India)',
		'gsw_CH' => 'Swiss German (Switzerland)',
		'gsw_LI' => 'Swiss German (Liechtenstein)',
		'gu_IN' => 'Gujarati (India)',
		'guz_KE' => 'Gusii (Kenya)',
		'ha_NG' => 'Hausa (Nigeria)',
		'ha_NE' => 'Hausa (Niger)',
		'haw_US' => 'Hawaiian (United States)',
		'haz_AF' => 'Hazaragi (Afghanistan)',
		'he_IL' => 'Hebrew (Israel)',
		'hi_IN' => 'Hindi (India)',
		'hil_PH' => 'Hiligaynon (Philippines)',
		'hne_IN' => 'Chhattisgarhi (India)',
		'hno_PK' => 'Hindko, Northern (Pakistan)',
		'hoc_IN' => 'Ho (India)',
		'hr_BA' => 'Croatian (Bosnia and Herzegovina)',
		'hr_HR' => 'Croatian (Croatia)',
		'hr_AT' => 'Croatian (Austria)',
		'ht_HT' => 'Haitian (Haiti)',
		'hu_HU' => 'Hungarian (Hungary)',
		'hu_AT' => 'Hungarian (Austria)',
		'hu_RO' => 'Hungarian (Romania)',
		'hu_RS' => 'Hungarian (Serbia)',
		'hy_AM' => 'Armenian (Armenia)',
		'id_ID' => 'Indonesian (Indonesia)',
		'ig_NG' => 'Igbo (Nigeria)',
		'ilo_PH' => 'Iloko (Philippines)',
		'inh_RU' => 'Ingush (Russia)',
		'is_IS' => 'Icelandic (Iceland)',
		'it_CH' => 'Italian (Switzerland)',
		'it_IT' => 'Italian (Italy)',
		'it_SM' => 'Italian (San Marino)',
		'it_FR' => 'Italian (France)',
		'it_HR' => 'Italian (Croatia)',
		'it_US' => 'Italian (United States)',
		'it_VA' => 'Italian (Vatican)',
		'iu_CA' => 'Inuktitut (Canada)',
		'ja_JP' => 'Japanese (Japan)',
		'jv_ID' => 'Javanese (Indonesia)',
		'ka_GE' => 'Georgian (Georgia)',
		'kam_KE' => 'Kamba (Kenya)',
		'kbd_RU' => 'Kabardian (Russia)',
		'kfy_IN' => 'Kumauni (India)',
		'kha_IN' => 'Khasi (India)',
		'khn_IN' => 'Khandesi (India)',
		'ki_KE' => 'Kikuyu (Kenya)',
		'kj_NA' => 'Kuanyama (Namibia)',
		'kk_KZ' => 'Kazakh (Kazakhstan)',
		'kk_CN' => 'Kazakh (China)',
		'kl_GL' => 'Kalaallisut (Greenland)',
		'kl_DK' => 'Kalaallisut (Denmark)',
		'kln_KE' => 'Kalenjin (Kenya)',
		'km_KH' => 'Khmer (Cambodia)',
		'kn_IN' => 'Kannada (India)',
		'ko_KP' => 'Korean (North Korea)',
		'ko_KR' => 'Korean (South Korea)',
		'ko_CN' => 'Korean (China)',
		'koi_RU' => 'Komi-Permyak (Russia)',
		'kok_IN' => 'Konkani (India)',
		'kos_FM' => 'Kosraean (Micronesia)',
		'kpv_RU' => 'Komi-Zyrian (Russia)',
		'krc_RU' => 'Karachay-Balkar (Russia)',
		'kru_IN' => 'Kurukh (India)',
		'ks_IN' => 'Kashmiri (India)',
		'ku_IQ' => 'Kurdish (Iraq)',
		'ku_IR' => 'Kurdish (Iran)',
		'ku_SY' => 'Kurdish (Syria)',
		'ku_TR' => 'Kurdish (Turkey)',
		'kum_RU' => 'Kumyk (Russia)',
		'kxm_TH' => 'Khmer, Northern (Thailand)',
		'ky_KG' => 'Kirghiz (Kyrgyzstan)',
		'la_VA' => 'Latin (Vatican)',
		'lah_PK' => 'Lahnda (Pakistan)',
		'lb_LU' => 'Luxembourgish (Luxembourg)',
		'lbe_RU' => 'Lak (Russia)',
		'lez_RU' => 'Lezghian (Russia)',
		'lg_UG' => 'Ganda (Uganda)',
		'ljp_ID' => 'Lampung (Indonesia)',
		'lmn_IN' => 'Lambadi (India)',
		'ln_CD' => 'Lingala (Congo - Kinshasa)',
		'ln_CG' => 'Lingala (Congo - Brazzaville)',
		'lo_LA' => 'Lao (Laos)',
		'lrc_IR' => 'Luri, Northern (Iran)',
		'lt_LT' => 'Lithuanian (Lithuania)',
		'luo_KE' => 'Luo (Kenya)',
		'luy_KE' => 'Luyia (Kenya)',
		'lv_LV' => 'Latvian (Latvia)',
		'mad_ID' => 'Madurese (Indonesia)',
		'mai_IN' => 'Maithili (India)',
		'mai_NP' => 'Maithili (Nepal)',
		'mak_ID' => 'Makasar (Indonesia)',
		'mdf_RU' => 'Moksha (Russia)',
		'mdh_PH' => 'Maguindanao (Philippines)',
		'mer_KE' => 'Meru (Kenya)',
		'mfa_TH' => 'Malay, Pattani (Thailand)',
		'mfe_MU' => 'Morisyen (Mauritius)',
		'mg_MG' => 'Malagasy (Madagascar)',
		'mh_MH' => 'Marshallese (Marshall Islands)',
		'mi_NZ' => 'Maori (New Zealand)',
		'min_ID' => 'Minangkabau (Indonesia)',
		'mk_MK' => 'Macedonian (Macedonia)',
		'ml_IN' => 'Malayalam (India)',
		'mn_MN' => 'Mongolian (Mongolia)',
		'mn_CN' => 'Mongolian (China)',
		'mni_IN' => 'Manipuri (India)',
		'mr_IN' => 'Marathi (India)',
		'ms_BN' => 'Malay (Brunei)',
		'ms_MY' => 'Malay (Malaysia)',
		'ms_SG' => 'Malay (Singapore)',
		'ms_CC' => 'Malay (Cocos Islands)',
		'ms_ID' => 'Malay (Indonesia)',
		'mt_MT' => 'Maltese (Malta)',
		'mtr_IN' => 'Mewari (India)',
		'mup_IN' => 'Malvi (India)',
		'muw_IN' => 'Mundari (India)',
		'my_MM' => 'Burmese (Myanmar)',
		'myv_RU' => 'Erzya (Russia)',
		'na_NR' => 'Nauru (Nauru)',
		'nb_NO' => 'Norwegian Bokm�l (Norway)',
		'nb_SJ' => 'Norwegian Bokm�l (Svalbard and Jan Mayen)',
		'nd_ZW' => 'North Ndebele (Zimbabwe)',
		'ndc_MZ' => 'Ndau (Mozambique)',
		'ne_NP' => 'Nepali (Nepal)',
		'ne_IN' => 'Nepali (India)',
		'ng_NA' => 'Ndonga (Namibia)',
		'ngl_MZ' => 'Lomwe (Mozambique)',
		'niu_NU' => 'Niuean (Niue)',
		'nl_AN' => 'Dutch (Netherlands Antilles)',
		'nl_AW' => 'Dutch (Aruba)',
		'nl_BE' => 'Dutch (Belgium)',
		'nl_NL' => 'Dutch (Netherlands)',
		'nl_SR' => 'Dutch (Suriname)',
		'nn_NO' => 'Norwegian Nynorsk (Norway)',
		'nod_TH' => 'Thai, Northern (Thailand)',
		'noe_IN' => 'Nimadi (India)',
		'nso_ZA' => 'Northern Sotho (South Africa)',
		'ny_MW' => 'Nyanja (Malawi)',
		'ny_ZM' => 'Nyanja (Zambia)',
		'nyn_UG' => 'Nyankole (Uganda)',
		'om_ET' => 'Oromo (Ethiopia)',
		'or_IN' => 'Oriya (India)',
		'pa_IN' => 'Punjabi (India)',
		'pag_PH' => 'Pangasinan (Philippines)',
		'pap_AN' => 'Papiamento (Netherlands Antilles)',
		'pap_AW' => 'Papiamento (Aruba)',
		'pau_PW' => 'Palauan (Palau)',
		'pl_PL' => 'Polish (Poland)',
		'pl_UA' => 'Polish (Ukraine)',
		'pon_FM' => 'Pohnpeian (Micronesia)',
		'ps_AF' => 'Pashto (Afghanistan)',
		'ps_PK' => 'Pashto (Pakistan)',
		'pt_AO' => 'Portuguese (Angola)',
		'pt_BR' => 'Portuguese (Brazil)',
		'pt_CV' => 'Portuguese (Cape Verde)',
		'pt_GW' => 'Portuguese (Guinea-Bissau)',
		'pt_MZ' => 'Portuguese (Mozambique)',
		'pt_PT' => 'Portuguese (Portugal)',
		'pt_ST' => 'Portuguese (Sao Tome and Principe)',
		'pt_TL' => 'Portuguese (East Timor)',
		'qu_BO' => 'Quechua (Bolivia)',
		'qu_PE' => 'Quechua (Peru)',
		'rcf_RE' => 'R�union Creole French (Reunion)',
		'rej_ID' => 'Rejang (Indonesia)',
		'rif_MA' => 'Tarifit (Morocco)',
		'rjb_IN' => 'Rajbanshi (India)',
		'rm_CH' => 'Rhaeto-Romance (Switzerland)',
		'rmt_IR' => 'Domari (Iran)',
		'rn_BI' => 'Rundi (Burundi)',
		'ro_MD' => 'Romanian (Moldova)',
		'ro_RO' => 'Romanian (Romania)',
		'ro_RS' => 'Romanian (Serbia)',
		'ru_BY' => 'Russian (Belarus)',
		'ru_KG' => 'Russian (Kyrgyzstan)',
		'ru_KZ' => 'Russian (Kazakhstan)',
		'ru_RU' => 'Russian (Russia)',
		'ru_SJ' => 'Russian (Svalbard and Jan Mayen)',
		'ru_UA' => 'Russian (Ukraine)',
		'rw_RW' => 'Kinyarwanda (Rwanda)',
		'sa_IN' => 'Sanskrit (India)',
		'sah_RU' => 'Yakut (Russia)',
		'sas_ID' => 'Sasak (Indonesia)',
		'sat_IN' => 'Santali (India)',
		'sck_IN' => 'Sadri (India)',
		'sco_GB' => 'Scots (United Kingdom)',
		'sd_IN' => 'Sindhi (India)',
		'sd_PK' => 'Sindhi (Pakistan)',
		'se_NO' => 'Northern Sami (Norway)',
		'sg_CF' => 'Sango (Central African Republic)',
		'si_LK' => 'Sinhalese (Sri Lanka)',
		'sid_ET' => 'Sidamo (Ethiopia)',
		'sk_SK' => 'Slovak (Slovakia)',
		'sk_RS' => 'Slovak (Serbia)',
		'sl_SI' => 'Slovenian (Slovenia)',
		'sl_AT' => 'Slovenian (Austria)',
		'sm_AS' => 'Samoan (American Samoa)',
		'sm_WS' => 'Samoan (Samoa)',
		'sn_ZW' => 'Shona (Zimbabwe)',
		'so_SO' => 'Somali (Somalia)',
		'so_DJ' => 'Somali (Djibouti)',
		'so_ET' => 'Somali (Ethiopia)',
		'sou_TH' => 'Thai, Southern (Thailand)',
		'sq_AL' => 'Albanian (Albania)',
		'sr_BA' => 'Serbian (Bosnia and Herzegovina)',
		'sr_ME' => 'Serbian (Montenegro)',
		'sr_RS' => 'Serbian (Serbia)',
		'ss_SZ' => 'Swati (Swaziland)',
		'ss_ZA' => 'Swati (South Africa)',
		'st_LS' => 'Southern Sotho (Lesotho)',
		'st_ZA' => 'Southern Sotho (South Africa)',
		'su_ID' => 'Sundanese (Indonesia)',
		'sv_AX' => 'Swedish (Aland Islands)',
		'sv_FI' => 'Swedish (Finland)',
		'sv_SE' => 'Swedish (Sweden)',
		'sw_KE' => 'Swahili (Kenya)',
		'sw_TZ' => 'Swahili (Tanzania)',
		'sw_UG' => 'Swahili (Uganda)',
		'sw_SO' => 'Swahili (Somalia)',
		'swb_KM' => 'Comorian (Comoros)',
		'swb_YT' => 'Comorian (Mayotte)',
		'swv_IN' => 'Shekhawati (India)',
		'ta_IN' => 'Tamil (India)',
		'ta_LK' => 'Tamil (Sri Lanka)',
		'ta_SG' => 'Tamil (Singapore)',
		'ta_MY' => 'Tamil (Malaysia)',
		'tcy_IN' => 'Tulu (India)',
		'te_IN' => 'Telugu (India)',
		'tet_TL' => 'Tetum (East Timor)',
		'tg_TJ' => 'Tajik (Tajikistan)',
		'th_TH' => 'Thai (Thailand)',
		'ti_ER' => 'Tigrinya (Eritrea)',
		'ti_ET' => 'Tigrinya (Ethiopia)',
		'tk_TM' => 'Turkmen (Turkmenistan)',
		'tk_IR' => 'Turkmen (Iran)',
		'tkl_TK' => 'Tokelau (Tokelau)',
		'tl_PH' => 'Tagalog (Philippines)',
		'tl_US' => 'Tagalog (United States)',
		'tn_BW' => 'Tswana (Botswana)',
		'tn_ZA' => 'Tswana (South Africa)',
		'to_TO' => 'Tonga (Tonga)',
		'tr_CY' => 'Turkish (Cyprus)',
		'tr_TR' => 'Turkish (Turkey)',
		'tr_DE' => 'Turkish (Germany)',
		'tr_MK' => 'Turkish (Macedonia)',
		'ts_ZA' => 'Tsonga (South Africa)',
		'ts_MZ' => 'Tsonga (Mozambique)',
		'tsg_PH' => 'Tausug (Philippines)',
		'tt_RU' => 'Tatar (Russia)',
		'tts_TH' => 'Thai, Northeastern (Thailand)',
		'tvl_TV' => 'Tuvalu (Tuvalu)',
		'tw_GH' => 'Twi (Ghana)',
		'ty_PF' => 'Tahitian (French Polynesia)',
		'tyv_RU' => 'Tuvinian (Russia)',
		'tzm_MA' => 'Tamazight, Central Atlas (Morocco)',
		'udm_RU' => 'Udmurt (Russia)',
		'ug_CN' => 'Uighur (China)',
		'uk_UA' => 'Ukrainian (Ukraine)',
		'uli_FM' => 'Ulithian (Micronesia)',
		'ur_IN' => 'Urdu (India)',
		'ur_PK' => 'Urdu (Pakistan)',
		'uz_UZ' => 'Uzbek (Uzbekistan)',
		'uz_AF' => 'Uzbek (Afghanistan)',
		've_ZA' => 'Venda (South Africa)',
		'vi_VN' => 'Vietnamese (Vietnam)',
		'vi_US' => 'Vietnamese (United States)',
		'vmw_MZ' => 'Waddar (Mozambique)',
		'wal_ET' => 'Walamo (Ethiopia)',
		'war_PH' => 'Waray (Philippines)',
		'wbq_IN' => 'Waddar (India)',
		'wbr_IN' => 'Wagdi (India)',
		'wo_MR' => 'Wolof (Mauritania)',
		'wo_SN' => 'Wolof (Senegal)',
		'wtm_IN' => 'Mewati (India)',
		'xh_ZA' => 'Xhosa (South Africa)',
		'xnr_IN' => 'Kangri (India)',
		'xog_UG' => 'Soga (Uganda)',
		'yap_FM' => 'Yapese (Micronesia)',
		'yo_NG' => 'Yoruba (Nigeria)',
		'za_CN' => 'Zhuang (China)',
		'zh_CN' => 'Chinese (China)',
		'zh_HK' => 'Chinese (Hong Kong SAR China)',
		'zh_MO' => 'Chinese (Macao SAR China)',
		'zh_SG' => 'Chinese (Singapore)',
		'zh_TW' => 'Chinese (Taiwan)',
		'zh_ID' => 'Chinese (Indonesia)',
		'zh_MY' => 'Chinese (Malaysia)',
		'zh_TH' => 'Chinese (Thailand)',
		'zh_US' => 'Chinese (United States)',
		'zu_ZA' => 'Zulu (South Africa)',
	);
	
	/**
	 *  A list of commonly used languages, in the form
	 *  langcode => array( EnglishName, NativeName)
	 */
	static $commonLanguages = array(
		'af' => array('Afrikaans', 'Afrikaans'),
		'sq' => array('Albanian', 'shqip'),
		'ar' => array('Arabic', '&#1575;&#1604;&#1593;&#1585;&#1576;&#1610;&#1577;'),
		'eu' => array('Basque', 'euskera'),
		'be' => array('Belarusian', '&#1041;&#1077;&#1083;&#1072;&#1088;&#1091;&#1089;&#1082;&#1072;&#1103; &#1084;&#1086;&#1074;&#1072;'),
		'bn' => array('Bengali', '&#2476;&#2494;&#2434;&#2482;&#2494;'),
		'bg' => array('Bulgarian', '&#1073;&#1098;&#1083;&#1075;&#1072;&#1088;&#1089;&#1082;&#1080;'),
		'ca' => array('Catalan', 'catal&agrave;'),
		'zh-yue' => array('Chinese (Cantonese)', '&#24291;&#26481;&#35441; [&#24191;&#19996;&#35805;]'),
		'zh-cmn' => array('Chinese (Mandarin)', '&#26222;&#36890;&#35441; [&#26222;&#36890;&#35805;]'),
		'zh-min-nan' => array('Chinese (Min Nan)', '&#21488;&#35486;'),
		'hr' => array('Croatian', 'Hrvatski'),
		'cs' => array('Czech', '&#x010D;e&#353;tina'),
		'da' => array('Danish', 'dansk'),
		'nl' => array('Dutch',  'Nederlands'),
		'en' => array('English', 'English'),
		'eo' => array('Esperanto', 'Esperanto'),
		'et' => array('Estonian', 'eesti keel'),
		'fo' => array('Faroese', 'F&oslash;royska'),
		'fi' => array('Finnish', 'suomi'),
		'fr' => array('French', 'fran&ccedil;ais'),
		'gd' => array('Gaelic', 'Gaeilge'),
		'gl' => array('Galician', 'Galego'),
		'de' => array('German', 'Deutsch'),
		'el' => array('Greek', '&#949;&#955;&#955;&#951;&#957;&#953;&#954;&#940;'),
		'gu' => array('Gujarati', '&#2711;&#2753;&#2716;&#2736;&#2750;&#2724;&#2752;'),
		'ha' => array('Hausa', '&#1581;&#1614;&#1608;&#1618;&#1587;&#1614;'),
		'he' => array('Hebrew', '&#1506;&#1489;&#1512;&#1497;&#1514;'),
		'hi' => array('Hindi', '&#2361;&#2367;&#2344;&#2381;&#2342;&#2368;'),
		'hu' => array('Hungarian', 'magyar'),
		'is' => array('Icelandic', '&Iacute;slenska'),
		'io' => array('Ido', 'Ido'),
		'id' => array('Indonesian', 'Bahasa Indonesia'),
		'ga' => array('Irish', 'Irish'),
		'it' => array('Italian', 'italiano'),
		'ja' => array('Japanese', '&#26085;&#26412;&#35486;'),
		'jv' => array('Javanese', 'basa Jawa'),
		'ko' => array('Korean', '&#54620;&#44397;&#50612; [&#38867;&#22283;&#35486;]'),
		'ku' => array('Kurdish', 'Kurd&iacute;'),
		'lv' => array('Latvian', 'latvie&#353;u'),
		'lt' => array('Lithuanian', 'lietuvi&#353;kai'),
		'lmo' => array('Lombard', 'Lombardo'),
		'mk' => array('Macedonian', '&#1084;&#1072;&#1082;&#1077;&#1076;&#1086;&#1085;&#1089;&#1082;&#1080;'),
		'ms' => array('Malay', 'Bahasa melayu'),
		'mt' => array('Maltese', 'Malti'),
		'mr' => array('Marathi', '&#2350;&#2352;&#2366;&#2336;&#2368;'),
		'ne' => array('Nepali', '&#2344;&#2375;&#2346;&#2366;&#2354;&#2368;'),
		'no' => array('Norwegian', 'Norsk'),
		'om' => array('Oromo', 'Afaan Oromo'),
		'fa' => array('Persian', '&#1601;&#1575;&#1585;&#1587;&#1609;'),
		'pl' => array('Polish', 'polski'),
		'pt-PT' => array('Portuguese (Portugal)', 'portugu&ecirc;s (Portugal)'),
		'pt-BR' => array('Portuguese (Brazil)', 'portugu&ecirc;s (Brazil)'),
		'pa' => array('Punjabi', '&#2602;&#2672;&#2588;&#2622;&#2604;&#2624;'),
		'qu' => array('Quechua', 'Quechua'),
		'rm' => array('Romansh', 'rumantsch'),
		'ro' => array('Romanian', 'rom&acirc;n'),
		'ru' => array('Russian', '&#1056;&#1091;&#1089;&#1089;&#1082;&#1080;&#1081;'),
		'sco' => array('Scots', 'Scoats leid, Lallans'),
		'sr' => array('Serbian', '&#1089;&#1088;&#1087;&#1089;&#1082;&#1080;'),
		'sk' => array('Slovak', 'sloven&#269;ina'),
		'sl' => array('Slovenian', 'sloven&#353;&#269;ina'),
		'es' => array('Spanish', 'espa&ntilde;ol'),
		'sv' => array('Swedish', 'Svenska'),
		'tl' => array('Tagalog', 'Tagalog'),
		'ta' => array('Tamil', '&#2980;&#2990;&#3007;&#2996;&#3021;'),
		'te' => array('Telugu', '&#3108;&#3142;&#3122;&#3137;&#3095;&#3137;'),
		'to' => array('Tonga', 'chiTonga'),
		'ts' => array('Tsonga', 'xiTshonga'),
		'tn' => array('Tswana', 'seTswana'),
		'tr' => array('Turkish', 'T&uuml;rk&ccedil;e'),
		'tk' => array('Turkmen', '&#1090;&#1199;&#1088;&#1082;m&#1077;&#1085;&#1095;&#1077;'),
		'tw' => array('Twi', 'twi'),
		'uk' => array('Ukrainian', '&#1059;&#1082;&#1088;&#1072;&#1111;&#1085;&#1089;&#1100;&#1082;&#1072;'),
		'ur' => array('Urdu', '&#1575;&#1585;&#1583;&#1608;'),
		'uz' => array('Uzbek', '&#1118;&#1079;&#1073;&#1077;&#1082;'),
		've' => array('Venda', 'tshiVen&#x1E13;a'),
		'vi' => array('Vietnamese', 'ti&#7871;ng vi&#7879;t'),
		'wa' => array('Walloon', 'walon'),
		'wo' => array('Wolof', 'Wollof'),
		'xh' => array('Xhosa', 'isiXhosa'),
		'yi' => array('Yiddish', '&#1522;&#1460;&#1491;&#1497;&#1513;'),
		'zu' => array('Zulu', 'isiZulu')
	);

	/**
	 * Get a list of commonly used languages
	 *
	 * @param boolean $native Use native names for languages instead of English ones
	 * @return list of languages in the form 'code' => 'name'
	 */
	static function get_common_languages($native = false) {
		$languages = array();
		foreach (i18n::$commonLanguages as $code => $name) {
			$languages[$code] = ($native ? $name[1] : $name[0]);
		}
		return $languages;
	}
	
	/**
	 * Get a list of locales (code => language and country)
	 *
	 * @return list of languages in the form 'code' => 'name'
	 */
	static function get_locale_list() {
		return i18n::$allLocales;
	}
	
	/**
	 * Get a list of languages with at least one element translated in (including the default language)
	 *
	 * @param string $className Look for languages in elements of this class
	 * @return array Map of languages in the form langCode => langName
	 */
	static function get_existing_languages($className = 'SiteTree', $where = '') {
		if(!Translatable::is_enabled()) return false;
		
		$query = new SQLQuery('Lang',$className.'_lang',$where,"",'Lang');
		$dbLangs = $query->execute()->column();
		$langlist = array_merge((array)Translatable::default_lang(), (array)$dbLangs);
		$returnMap = array();
		$allCodes = array_merge(i18n::$allLocales, i18n::$commonLanguages);
		foreach ($langlist as $langCode) {
			$returnMap[$langCode] = (is_array($allCodes[$langCode]) ? $allCodes[$langCode][0] : $allCodes[$langCode]);
		}
		return $returnMap;
	}
	
	/**
	 * Get a name from a language code
	 *
	 * @param mixed $code Language code
	 * @param boolean $native If true, the native name will be returned
	 * @return Name of the language
	 */
	static function get_language_name($code, $native = false) {
		$langs = i18n::$commonLanguages;
		return ($native ? $langs[$code][1] : $langs[$code][0]);
	}
	
	/**
	 * Get a name from a locale code (xx_YY)
	 *
	 * @param mixed $code locale code
	 * @return Name of the locale
	 */
	static function get_locale_name($code) {
		$langs = i18n::get_locale_list();
		return isset($langs[$code]) ? $langs[$code] : false;
	}
	
	/**
	 * Get a code from an English language name
	 *
	 * @param mixed $name Name of the language
	 * @return Language code (if the name is not found, it'll return the passed name)
	 */
	static function get_language_code($name) {
		$code = array_search($name,i18n::get_common_languages());
		return ($code ? $code : $name);
	}
	
	/**
	 * Searches the root-directory for module-directories
	 * (identified by having a _config.php on their first directory-level
	 * and a language-file with the default locale in the /lang-subdirectory).
	 * 
	 * @return array
	 */
	static function get_translatable_modules() {
		$translatableModules = array();
		
		$baseDir = Director::baseFolder();
		$modules = scandir($baseDir);
		foreach($modules as $module) {
			$moduleDir = $baseDir . DIRECTORY_SEPARATOR . $module;
			if(
				is_dir($moduleDir) 
				&& is_file($moduleDir . DIRECTORY_SEPARATOR . "_config.php")
				&& is_file($moduleDir . DIRECTORY_SEPARATOR . "lang" . DIRECTORY_SEPARATOR . i18n::$default_locale . ".php")
			) {
				$translatableModules[] = $module;
			}
		}
		return $translatableModules;
	}

	/**
	 * Searches for all the files in a given module
	 *
	 * @param string $baseDir Silverstripe's base directory
	 * @param string $module Module's name
	 */
	protected static function process_module($baseDir, $module) {	
    	if(!Translatable::is_enabled()) return false;
    	
    	// Only search for text in folder with a _config.php file (which means they are modules)  
		if(is_dir("$baseDir/$module") && is_file("$baseDir/$module/_config.php") 
		&& !in_array($module, array('sapphire','jsparty')) && substr($module,0,1) != '.') {  

			$fileList = array();
			i18n::get_files_rec("$baseDir/$module/code", $fileList);
			$mst = '';
			foreach($fileList as $file) {
				$mst .= i18n::report_calls_code($file);
			}
			$fileList = NULL;
			
			// Make sure the templates directory exists before trying to open it  
			if (is_dir("$baseDir/$module/templates")) {
				i18n::get_files_rec("$baseDir/$module/templates", $fileList);
				foreach($fileList as $index => $file) {
					$mst .= i18n::report_calls_tpl($index, $file);
				}
			}
			
			if ($mst) {
				// Create folder for lang files
				$langFolder = $baseDir . '/' . $module . '/lang';
				if(!file_exists($baseDir. '/' . $module . '/lang')) {
					mkdir($langFolder, 02775);
					touch($baseDir. '/' . $module . '/lang/_manifest_exclude');
				}
				
				// Open the English file and write the Master String Table
				if($fh = fopen($langFolder . '/en_US.php', "w")) {
					fwrite($fh, "<?php\n\nglobal \$lang;\n\n" . $mst . "\n?>");			
					fclose($fh);
					echo "Created file: $langFolder/en_US.php<br />";
		
				} else {
					user_error("Cannot write language file! Please check permissions of $langFolder/en_US.php", E_USER_ERROR);
				}
			}
		}
	}

	/**
	 * Helper function that searches for potential files to be parsed
	 * 
	 * @param string $folder base directory to scan (will scan recursively)
	 * @param array $fileList Array where potential files will be added to
	 */
	protected static function get_files_rec($folder, &$fileList) {
		$items = scandir($folder);
		if($items) foreach($items as $item) {
			if(substr($item,0,1) == '.') continue;
			if(substr($item,-4) == '.php') $fileList[substr($item,0,-4)] = "$folder/$item";
			else if(substr($item,-3) == '.ss') $fileList[$item] = "$folder/$item";
			else if(is_dir("$folder/$item")) i18n::get_files_rec("$folder/$item", $fileList);
		}
	}
	
	/**
	 * Look for calls to the underscore function in php files and build our MST 
	 * 
	 * @param string $file Path to the file to be parsed
	 * @return string Built Master String Table from this file
	 */
	protected static function report_calls_code($file) {
		static $callMap;
		$content = file_get_contents($file);
		$mst = '';
		while (ereg('_t[[:space:]]*\([[:space:]]*("[^"]*"|\\\'[^\']*\\\')[[:space:]]*,[[:space:]]*("([^"]|\\\")*"|\'([^\']|\\\\\')*\')([[:space:]]*,[[:space:]]*[^,)]*)?([[:space:]]*,[[:space:]]*("([^"]|\\\")*"|\'([^\']|\\\\\')*\'))?[[:space:]]*\)', $content, $regs)) {
			$entityParts = explode('.',substr($regs[1],1,-1));
			$entity = array_pop($entityParts);
			$class = implode('.',$entityParts);
			
			if (isset($callMap[$class.'--'.$entity])) echo "Warning! Redeclaring entity $entity in file $file<br>";

			if (substr($regs[2],0,1) == '"') $regs[2] = addcslashes($regs[2],'\'');
			$mst .= '$lang[\'en_US\'][\'' . $class . '\'][\'' . $entity . '\'] = ';
			if ($regs[5]) {
				$mst .= "array(\n\t'" . substr($regs[2],1,-1) . "',\n\t" . substr($regs[5],1);
				if ($regs[7]) {
					if (substr($regs[7],0,1) == '"') $regs[7] = addcslashes($regs[7],'\'');
					$mst .= ",\n\t'" . substr($regs[7],1,-1) . '\''; 
				}
				$mst .= "\n);";
			} else $mst .= '\'' . substr($regs[2],1,-1) . '\';';
			$mst .= "\n";
			$content = str_replace($regs[0],"",$content);

			$callMap[$class.'--'.$entity] = $regs[2];
		}
		
		return $mst;
	}

	/**
	 * Look for calls to the underscore function in template files and build our MST 
	 * Template version - no "class" argument
	 * 
	 * @param string $index Index used to namespace strings 
	 * @param string $file Path to the file to be parsed
	 * @return string Built Master String Table from this file
	 */
	protected static function report_calls_tpl($index, $file) {
		static $callMap;
		$content = file_get_contents($file);
		$mst = '';
		while (ereg('_t[[:space:]]*\([[:space:]]*("[^"]*"|\\\'[^\']*\\\')[[:space:]]*,[[:space:]]*("([^"]|\\\")*"|\'([^\']|\\\\\')*\')([[:space:]]*,[[:space:]]*[^,)]*)?([[:space:]]*,[[:space:]]*("([^"]|\\\")*"|\'([^\']|\\\\\')*\'))?[[:space:]]*\)',$content,$regs)) {

			$entityParts = explode('.',substr($regs[1],1,-1));
			$entity = array_pop($entityParts);

			// Entity redeclaration check
			if (isset($callMap[$index.'--'.$entity])) echo "Warning! Redeclaring entity $entity in file $file<br>";

			if (substr($regs[2],0,1) == '"') $regs[2] = addcslashes($regs[2],'\'');
			$mst .= '$lang[\'en_US\'][\'' . $index . '\'][\'' . $entity . '\'] = ';
			if ($regs[5]) {
				$mst .= "array(\n\t'" . substr($regs[2],1,-1) . "',\n\t" . substr($regs[5],1);
				if ($regs[7]) {
					if (substr($regs[7],0,1) == '"') $regs[7] = addcslashes($regs[7],'\'\\');
					$mst .= ",\n\t'" . substr($regs[7],1,-1) . '\''; 
				}
				$mst .= "\n);";
			} else $mst .= '\'' . substr($regs[2],1,-1) . '\';';
			$mst .= "\n";
			$content = str_replace($regs[0],"",$content);

			$callMap[$index.'--'.$entity] = $regs[3];
		}
		
		return $mst;
	}

	/**
	 * Set the current locale
	 * See http://unicode.org/cldr/data/diff/supplemental/languages_and_territories.html for a list of possible locales
	 * 
	 * @param string $locale Locale to be set 
	 */
	static function set_locale($locale) {
		if ($locale) i18n::$currentlocale = $locale;
	}

	/**
	 * Get the current locale
	 * 
	 * @return string Current locale in the system
	 */
	static function get_locale() {
		return i18n::$currentlocale;
	}
	
	/**
	 * Include a locale file determined by module name and locale 
	 * 
	 * @param string $module Module that contains the locale file
	 * @param string $locale Locale to be loaded
	 */
	static function include_locale_file($module, $locale) {
		if (file_exists($file = Director::getAbsFile("$module/lang/$locale.php"))) include_once($file);
	}

	/**
	 * Includes all available language files for a certain defined locale
	 * 
	 * @param string $locale All resources from any module in locale $locale will be loaded
	 */
	static function include_by_locale($locale) {
		$topLevel = scandir(Director::baseFolder());
		foreach($topLevel as $module) {
			if (file_exists(Director::getAbsFile("$module/_config.php")) && 
			  file_exists($file = Director::getAbsFile("$module/lang/$locale.php"))) { 
				include_once($file);
			}
		}
	}
	
	/**
	 * Given a class name (a "locale namespace"), will search for its module and, if available,
	 * will load the resources for the currently defined locale.
	 * If not available, the original English resource will be loaded instead (to avoid blanks)
	 * 
	 * @param string $class Resources for this class will be included, according to the set locale.
	 */
	static function include_by_class($class) {
		if (substr($class,-3) == '.ss') {
			global $_TEMPLATE_MANIFEST;
			$path = current($_TEMPLATE_MANIFEST[substr($class,0,-3)]);
			ereg('.*/([^/]+)/templates/',$path,$module);
		}
		else {
			global $_CLASS_MANIFEST;
			$path = $_CLASS_MANIFEST[$class];
			ereg('.*/([^/]+)/code/',$path,$module);
		}
		if (file_exists($file = Director::getAbsFile("{$module[1]}/lang/". i18n::get_locale() . '.php'))) {
			include_once($file);
		} else if (i18n::get_locale() != 'en_US') {
			i18n::set_locale('en_US');
			i18n::include_by_class($class);
		} else {
			user_error("Locale file $file should exist", E_USER_WARNING);
		}
	}
	
	//-----------------------------------------------------------------------------------------------//
	
	/**
	 * This method will delete every SiteTree instance in the given language
	 */
	public function removelang() {
		if (!Permission::check("ADMIN")) user_error("You must be an admin to remove a language", E_USER_ERROR);
		$translatedToDelete = Translatable::get_by_lang('SiteTree',$this->urlParams['ID']);
		foreach ($translatedToDelete as $object) {
			$object->delete();
		}
		echo "Language {$this->urlParams['ID']} successfully removed";
	}


	/**
	 * This is the main method to build the master string tables with the original strings.
	 * It will search for existent modules that use the i18n feature, parse the _() calls
	 * and write the resultant files in the lang folder of each module.
	 */	
	public function textcollector() {
	
		if (!Permission::check("ADMIN")) user_error("You must be an admin to enable text collector mode", E_USER_ERROR);
		echo "Collecting text...<br /><br />";
		
		//Calculate base directory
		$baseDir = Director::baseFolder();

		//Search for and process existent modules, or use the passed one instead
		if (!isset($_GET['module'])) {
			$topLevel = scandir($baseDir);
			foreach($topLevel as $module) {
				i18n::process_module($baseDir, $module);
			}
		} else {
			i18n::process_module($baseDir, $_GET['module']);
		}
		
		echo "Done!";
	}
	
}
?>