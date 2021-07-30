<?php
/*
   Plugin Name: Custom plugin
   Plugin URI: https://makitweb.com
   description: A simple custom plugin
   Version: 1.0.0
   Author: Yogesh Singh
   Author URI: https://makitweb.com/about
*/

// Create a new table
function customplugin_table(){

  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();

  $tablename = $wpdb->prefix."customplugin";

  $sql = "CREATE TABLE $tablename (
  id mediumint(11) NOT NULL AUTO_INCREMENT,
  name varchar(80) NOT NULL,
  username varchar(80) NOT NULL,
  email varchar(80) NOT NULL,
  PRIMARY KEY  (id)
  ) $charset_collate;";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );

}
register_activation_hook( __FILE__, 'customplugin_table' );

// Add menu
function customplugin_menu() {

    add_menu_page("Custom Plugin", "Custom Plugin","manage_options", "myplugin", "displayList",plugins_url('/customplugin/img/icon.png'));
    add_submenu_page("myplugin","All Entries", "All entries","manage_options", "allentries", "displayList");
    add_submenu_page("myplugin","Add new Entry", "Add new Entry","manage_options", "addnewentry", "addEntry");

}
add_action("admin_menu", "customplugin_menu");

function displayList(){
  include "displaylist.php";
}

function addEntry(){
  include "addentry.php";
}