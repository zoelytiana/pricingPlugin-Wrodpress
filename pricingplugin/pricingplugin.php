<?php
/*
   Plugin Name: Pricing plugin
   Plugin URI: https://zoelytiana.github.io/
   description: A pricing custom plugin
   Version: 1.0.0
   Author: Zoely
   Author URI: https://zoelytiana.github.io/
*/

// Create a new table
function pricingplugin_table(){

  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();

  $tablename = $wpdb->prefix."pricingplugin";

  $sql = "CREATE TABLE $tablename (
  id smallint(5) NOT NULL AUTO_INCREMENT,
  typeAbonnement varchar(1) NOT NULL,
  free int(80) NOT NULL,
  premiumS int(80) NOT NULL,
  premiumM int(80) NOT NULL,
  premiumL int(80) NOT NULL,
  premiumXL int(80) NOT NULL,
  premiumCustom int(80) NOT NULL,
  premiumAPI int(80) NOT NULL,
  date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY  (id)
  ) $charset_collate;";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );

}
register_activation_hook( __FILE__, 'pricingplugin_table' );

// Add menu
function pricingplugin_menu() {

    add_menu_page("Pricing Plugin", "Pricing Plugin","manage_options", "Pricing", "displayPricingList",plugins_url('/pricingplugin/img/icon.png'));
    add_submenu_page("Pricing","All Entries", "All entries","manage_options", "allentries", "displayPricingList");
    add_submenu_page("Pricing","Add new Entry", "Add new Entry","manage_options", "addnewentry", "addPricing");

}
add_action("admin_menu", "pricingplugin_menu");

function displayPricingList(){
  include "displaypricinglist.php";
}

function addPricing(){
  include "addpricing.php";
}

function pricingM() {
  include "selectpricingM.php";
  $Content .= '<input type="hidden" id="free_M" name="free_M" value="'.$free_M.'">';
  $Content .= '<input type="hidden" id="premiumS_M" name="premiumS_M" value="'.$premiumS_M.'">';
  $Content .= '<input type="hidden" id="premiumM_M" name="premiumM_M" value="'.$premiumM_M.'">';
  $Content .= '<input type="hidden" id="premiumXL_M" name="premiumXL_M" value="'.$premiumXL_M.'">';
  $Content .= '<input type="hidden" id="premiumCustom_M" name="premiumCustom_M" value="'.$premiumCustom_M.'">';
  $Content .= '<input type="hidden" id="premiumAPI_M" name="premiumAPI_M" value="'.$premiumAPI_M.'">';
	 
    return $Content;
}

add_shortcode('pricingM', 'pricingM');

function pricingY() {
  include "selectpricingY.php";
  $Content .= '<input type="hidden" id="free_Y" name="free_Y" value="'.$free_Y.'">';
  $Content .= '<input type="hidden" id="premiumS_Y" name="premiumS_Y" value="'.$premiumS_Y.'">';
  $Content .= '<input type="hidden" id="premiumM_Y" name="premiumM_Y" value="'.$premiumM_Y.'">';
  $Content .= '<input type="hidden" id="premiumXL_Y" name="premiumXL_Y" value="'.$premiumXL_Y.'">';
  $Content .= '<input type="hidden" id="premiumCustom_Y" name="premiumCustom_Y" value="'.$premiumCustom_Y.'">';
  $Content .= '<input type="hidden" id="premiumAPI_Y" name="premiumAPI_Y" value="'.$premiumAPI_Y.'">';
	 
    return $Content;
}
add_shortcode('pricingY', 'pricingY');