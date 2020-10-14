<?php
/**
 * @package  AlecadddPlugin
 */
namespace Inc\Base;

class Activate
{
	public static function activate() {
		
		flush_rewrite_rules();


 		 $default = array(); 		 

		if ( ! get_option( 'habib_plugin' ) ) {

 			update_option( 'habib_plugin', $default );
		}

		if( ! get_option( 'habib_plugin_cpt' ) ) {

 		 update_option( 'habib_plugin_cpt', $default );

		 }
 	}
}