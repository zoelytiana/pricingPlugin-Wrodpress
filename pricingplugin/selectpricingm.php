<?php

global $wpdb;
$tablename = $wpdb->prefix."pricingplugin";




  // Select records
  $entriesList = $wpdb->get_results("SELECT * FROM ".$tablename." WHERE typeAbonnement='M' order by id desc");
  if(count($entriesList) > 0){
    $count = 1;
    foreach($entriesList as $entry){
      $id = $entry->id;
      $typeAbonnement = $entry->typeAbonnement;
      $free_M = $entry->free;
      $premiumS_M = $entry->premiumS;
      $premiumM_M = $entry->premiumM;
      $premiumL_M = $entry->premiumL;
      $premiumXL_M = $entry->premiumXL;
      $premiumCustom_M = $entry->premiumCustom;
      $premiumAPI_M = $entry->premiumAPI;
      $date_M= $entry->date;
      $count++;
   }
  }