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
      $free = $entry->free;
      $premiumS = $entry->premiumS;
      $premiumM = $entry->premiumM;
      $premiumL = $entry->premiumL;
      $premiumXL = $entry->premiumXL;
      $premiumCustom = $entry->premiumCustom;
      $premiumAPI = $entry->premiumAPI;
      $date = $entry->date;
      $count++;
   }
  }