<?php

/**
*trigger this file on Plugin uninstall
* @package IqraFchaudhry
*/

if(! defined('WP_UNINSTALL_PLUGIN')){
	die;
}

//clear database store data

global $wpdb;
$wpdb->query("DELETE FROM wp_posts WHERE post_type='chart_size'");
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE post_id NOT IN (SELECT id FROM wp_posts)");
