<?php

global $wpdb;

// Add record
if(isset($_POST['but_submit'])){

  $typeAbonnement = $_POST['txt_type'];
  $free = $_POST['txt_free'];
  $premiumS = $_POST['txt_premiumS'];
  $premiumM = $_POST['txt_premiumM'];
  $premiumL = $_POST['txt_premiumL'];
  $premiumXL = $_POST['txt_premiumXL'];
  $premiumCustom = $_POST['txt_premiumCustom'];
  $premiumAPI = $_POST['txt_premiumAPI'];
  $tablename = $wpdb->prefix."pricingplugin";

  if($typeAbonnement != '' && $free != '' && $premiumS != '' && $premiumM != '' && $premiumL != '' && $premiumXL != '' && $premiumCustom != '' && $premiumAPI != ''){
     $check_data = $wpdb->get_results("SELECT * FROM ".$tablename." WHERE username='".$uname."' ");
     if(count($check_data) == 0){
       $insert_sql = "INSERT INTO ".$tablename."(typeAbonnement, free, premiumS, premiumM, premiumL, premiumXL, premiumCustom, premiumAPI) values('".$typeAbonnement."','.$free.','.$premiumS.','.$premiumM.','.$premiumL.','.$premiumXL.','.$premiumCustom.','.$premiumAPI.') ";
       $wpdb->query($insert_sql);
       echo "Save sucessfully.";
     }
   }
   else{
     echo "Enough Data";
   }
}

?>
<h1>Add New Entry</h1>
<form method='post' action=''>
  <table>
    <tr>
      <td>Type Abonnement</td>
      <td><select name="txt_type" id="type-select">
    <option value="">--Please choose an option--</option>
    <option value="M">Mensuel</option>
    <option value="Y">Annuel</option>
</select></td>
    </tr>
    <tr>
     <td>FREE</td>
     <td><input type='text' name='txt_free'></td>
    </tr>
    <tr>
     <td>PREMIUM S</td>
     <td><input type='text' name='txt_premiumS'></td>
    </tr>
    <tr>
     <td>PREMIUM M</td>
     <td><input type='text' name='txt_premiumM'></td>
    </tr>
    <tr>
     <td>PREMIUM L</td>
     <td><input type='text' name='txt_premiumL'></td>
    </tr>
    <tr>
     <td>PREMIUM XL</td>
     <td><input type='text' name='txt_premiumXL'></td>
    </tr>
    <tr>
     <td>PREMIUM CUSTOM</td>
     <td><input type='text' name='txt_premiumCustom'></td>
    </tr>
    <tr>
     <td>PREMIUM API</td>
     <td><input type='text' name='txt_premiumAPI'></td>
    </tr>
    <tr>
     <td>&nbsp;</td>
     <td><input type='submit' name='but_submit' value='Submit'></td>
    </tr>
 </table>
</form>