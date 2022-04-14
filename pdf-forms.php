<?php
/*
Plugin Name: PDF for WPForms Lite
Plugin URI: 
Description: Database for WPForms Submissions and export to PDF
Author: Chris Kolonas
Author URI: 
Version: 0.1
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Plugin version.
if ( ! defined( 'PDF_FORMS_VERSION' ) ) {
	define( 'PDF_FORMS_VERSION', '0.1' );
}

// Plugin Folder Path.
if ( ! defined( 'PDF_FORMS_PLUGIN_DIR' ) ) {
	define( 'PDF_FORMS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

// Plugin Folder URL.
if ( ! defined( 'PDF_FORMS_PLUGIN_URL' ) ) {
	define( 'PDF_FORMS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

// Plugin Root File.
if ( ! defined( 'PDF_FORMS_PLUGIN_FILE' ) ) {
	define( 'PDF_FORMS_PLUGIN_FILE', __FILE__ );
}

//WPForms Plugin Folder Path
if(!defined('PARENT_PLUGIN_DIR')){
    define('PARENT_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins/wpforms-lite/');
}

//Include plugin functions file
include_once ABSPATH . 'wp-admin/includes/plugin.php';

//Check if WPForms Plugin is active
if(!is_plugin_active('wpforms-lite/wpforms.php')){
    wp_die(esc_html('This plugin requires WPForms to run'));
}

require_once dirname(__FILE__) . '/src/PDF-Forms.php';

add_action( 'plugins_loaded','pdfforms' ,10 );

