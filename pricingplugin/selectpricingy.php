<?php

global $wpdb;
$tablename = $wpdb->prefix."pricingplugin";




  // Select records
  $entriesList = $wpdb->get_results("SELECT * FROM ".$tablename." WHERE typeAbonnement='Y' order by id desc");
  if(count($entriesList) > 0){
    $count = 1;
    foreach($entriesList as $entry){
      $id = $entry->id;
      $typeAbonnement = $entry->typeAbonnement;
      $free_Y = $entry->free;
      $premiumS_Y = $entry->premiumS;
      $premiumM_Y = $entry->premiumM;
      $premiumL_Y = $entry->premiumL;
      $premiumXL_Y = $entry->premiumXL;
      $premiumCustom_Y = $entry->premiumCustom;
      $premiumAPI_Y = $entry->premiumAPI;
      $date_Y = $entry->date;
      $count++;
   }
  }