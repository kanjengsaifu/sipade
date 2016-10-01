<?php
include "fungsi/fungsi_anti_injection.php";
session_start();
error_reporting(0);
include "inc/timeout.php";

if($_SESSION[login]==1){
if(!cek_login()){
$_SESSION[login] = 0;
}
}
if($_SESSION[login]==0){
  header('location:inc/logout.php');
}
else{
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "Anda harus masuk terlebih dahulu !";
}
else{
?>
<?php
include "fungsi/koneksi.php";
if (isset($_GET['id'])) { 
 
    $result = mysql_query("select id_rt, rt from arsip_rt where id_rw='". $_GET['id'] . "' ORDER BY id_rt");      
    //Create an array
    $json_response = array();    
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $row_array['optionValue'] = $row['rt'];
        $row_array['optionDisplay'] = $row['rt'];        
        //push the values in the array
        array_push($json_response,$row_array); }
    echo json_encode($json_response);    
    //Close the database connection
    fclose($db);
}
?>

  <?php 
} 
}
?>