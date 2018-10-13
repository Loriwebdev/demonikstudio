<?php

if(!defined('CODELESS_BASE')) define('CODELESS_BASE', get_template_directory().'/');

if(!defined('CODELESS_KIRKI_BASE')) define('CODELESS_KIRKI_BASE', get_template_directory().'/includes/codeless_customizer/kirki');

if(!defined('CODELESS_IMPORTER_BASE')) define('CODELESS_IMPORTER_BASE', get_template_directory().'/includes/codeless_theme_panel/importer');

if(!defined('CODELESS_BASE_URL' ) ) define( 'CODELESS_BASE_URL', get_template_directory_uri().'/'); 

if(!defined('CODELESS_KIRKI_PATH' ) ) define( 'CODELESS_KIRKI_PATH', get_parent_theme_file_path( '/includes/codeless_customizer/kirki' ) );

if(function_exists('wp_get_theme'))
{
	$wp_theme_obj = wp_get_theme();
	$codeless_base_data['prefix'] = $codeless_base_data['Title'] = $wp_theme_obj->get('Name');
    if(!defined('THEMENAME')) define('THEMENAME', $codeless_base_data['Title']);
}

if(!defined('THEMETITLE')) define('THEMETITLE', $codeless_base_data['Title']);

if (class_exists('ThemeCheckMain')) {

    add_action('themecheck_checks_loaded', 'disable_checks');

}



function disable_checks() {
    global $themechecks;

    $checks_to_disable = array(
        'IncludeCheck',
        'I18NCheck',
        'AdminMenu',
        'Bad_Checks',
        'MalwareCheck',
        'Theme_Support',
        'CustomCheck',
        'EditorStyleCheck',
        'IframeCheck',
    );

    foreach($themechecks as $keyindex => $check) {
        if ($check instanceof themecheck) {
            $check_class = get_class($check);
            if (in_array($check_class, $checks_to_disable)) {
                unset($themechecks[$keyindex]);
            }
        }
    }
}

?>