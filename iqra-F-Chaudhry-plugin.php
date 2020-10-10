<?php
/**
* @package IqraFchaudhry
*
*/
/*
Plugin name: iqra.F Chaudhry
Plugin URI: www.zara.awanpaints.com
Description: for handling chart size issues
Author: habib zulfiqar
Author URI: abc.com
Text Domain: 
Domain Path: /languages/
Version: 1.0
*/
 
defined('ABSPATH') or die('hey, you can/t access this file, you silly human!');

 
if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php';
}



function activate_akforms_plugin() {

	Inc\Base\Activate::activate();
}


  // The code that runs during plugin deactivation
 
function deactivate_akforms_plugin() {

	Inc\Base\Deactivate::deactivate();
}

register_activation_hook( __FILE__, 'activate_akforms_plugin' );


register_deactivation_hook( __FILE__, 'deactivate_akforms_plugin' );


  // Initialize all the core classes of the plugin

if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
} 