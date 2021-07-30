<?php

global $wpdb;
$tablename = $wpdb->prefix."pricingplugin";

// Delete record
if(isset($_GET['delid'])){
  $delid = $_GET['delid'];
  $wpdb->query("DELETE FROM ".$tablename." WHERE id=".$delid);
}
?>
<h1>All Entries</h1>

<table width='100%' border='1' style='border-collapse: collapse;'>
  <tr>
   <th>Num</th>
   <th>TYPE</th>
   <th>FREE</th>
   <th>PREMIUM S</th>
   <th>PREMIUM M</th>
   <th>PREMIUM L</th>
   <th>PREMIUM XL</th>
   <th>PREMIUM CUSTOM</th>
   <th>PREMIUM API</th>
   <th>Date</th>
   <th>&nbsp;</th>
  </tr>
  <?php
  // Select records
  $entriesList = $wpdb->get_results("SELECT * FROM ".$tablename." order by id desc");
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

      echo "<tr>
      <td>".$count."</td>
      <td>".$typeAbonnement."</td>
      <td>".$free."</td>
      <td>".$premiumS."</td>
      <td>".$premiumM."</td>
      <td>".$premiumL."</td>
      <td>".$premiumXL."</td>
      <td>".$premiumCustom."</td>
      <td>".$premiumAPI."</td>
      <td>".$date."</td>
      <td><a href='?page=allentries&delid=".$id."'>Delete</a></td>
      </tr>
      ";
      $count++;
   }
 }else{
   echo "<tr><td colspan='10'>No record found</td></tr>";
 }
 echo "<tr><td colspan='10'>[pricingFreeM]</td></tr>";
?>
</table>