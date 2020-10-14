<?php
global $jal_db_version;
$jal_db_version = '1.0';

function jal_install() {
    global $wpdb;
    global $jal_db_version;

    $table_name = $wpdb->prefix . 'iqrafchaudhry';
    
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        name tinytext NOT NULL,
        text text NOT NULL,
        url varchar(55) DEFAULT '' NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    add_option( 'jal_db_version', $jal_db_version );
}

function jal_install_data() {
    global $wpdb;
    
    $welcome_name = 'Mr. WordPress';
    $welcome_text = 'Congratulations, you just completed the installation!';
    
    $table_name = $wpdb->prefix . 'iqrafchaudhry';
    
    $wpdb->insert( 
        $table_name, 
        array( 
            'time' => current_time( 'mysql' ), 
            'name' => $welcome_name, 
            'text' => $welcome_text, 
        ) 
    );
}
register_activation_hook( __FILE__, 'jal_install' );
register_activation_hook( __FILE__, 'jal_install_data' );




// function iqra_chart_db_table_create(){
// global $wpdb;

// $tablename=$wpdb->prefix.'iqrachartsize';
// $charset_collate = $wpdb->get_charset_collate();

// $sql = "CREATE TABLE $table_name (
//         id mediumint(9) NOT NULL AUTO_INCREMENT,
//         time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
//         chart_name varchar (100) DEFAULT '',
//         user_id varchar (100) DEFAULT '',
//         shoulder varchar (100) DEFAULT '',
//         waist varchar (100) DEFAULT '',
//         bust varchar (100) DEFAULT '',
//         hip varchar (100) DEFAULT '',
//         shirt_length varchar (100) DEFAULT '',
//         armhole varchar (100) DEFAULT '',
//         sleve_hole varchar (100) DEFAULT '',
//         wrist varchar (100) DEFAULT '',
//         PRIMARY KEY  (id)
//     ) $charset_collate;";

//     require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
//     dbDelta( $sql );
//     }


//working mothod

global $jal_db_version;
$jal_db_version = '1.0';

function jal_install() {
    global $wpdb;
    global $jal_db_version;

    $table_name = $wpdb->prefix . 'iqrafchaudhry';
    
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        chart_name tinytext NOT NULL,
        user_id tinytext NOT NULL,
        shoulder tinytext NOT NULL,
        waist tinytext NOT NULL,
        bust tinytext NOT NULL,
        hip tinytext NOT NULL,
        shirt_length tinytext NOT NULL,
        armhole tinytext NOT NULL,
        sleve_hole tinytext NOT NULL,
        wrist tinytext NOT NULL,
        addnote text NOT NULL,
         PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    add_option( 'jal_db_version', $jal_db_version );
}

register_activation_hook( __FILE__, 'jal_install' );
