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
    include_once('fungsi/koneksi.php');
//**************************************
//     Page load dropdown results     //
//**************************************
  

function getTierOne()
{
	$result = mysql_query("SELECT DISTINCT rw, id_rw FROM arsip_rw") 
	or die(mysql_error());

	  while($tier = mysql_fetch_array( $result )) 
  
		{
		   echo '<option value="'.$tier['rw'].'">RW. '.$tier['rw'].'</option>';
		}

}

//**************************************
//     First selection results     //
//**************************************
if($_GET['func'] == "drop_1" && isset($_GET['func'])) { 
   
 drop_1($_GET['drop_var']); 
 
}

function drop_1($drop_var)
{  
	$result = mysql_query("SELECT * FROM arsip_rt WHERE id_rw='$drop_var' ORDER BY id_rt") 
	or die(mysql_error()); 
	echo '<select name="tier_two" id="tier_two">
	      <option value="a" disabled="disabled" selected="selected">Pilih RT</option>';

		   while($drop_2 = mysql_fetch_array( $result )) 
			{
			  echo '<option value="'.$drop_2['rt'].'">RT. '.$drop_2['rt'].'</option>';
			}
	
	echo '</select> ';
	
	
}
	
?>

  <?php 
} 
}
?>