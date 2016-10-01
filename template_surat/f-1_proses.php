<?php
include "../fungsi/fungsi_anti_injection.php";
session_start();
error_reporting(0);
include "../inc/timeout.php";

if($_SESSION[login]==1){
if(!cek_login()){
$_SESSION[login] = 0;
}
}
if($_SESSION[login]==0){
  echo "Anda harus masuk terlebih dahulu !";
}
else{
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "Anda harus masuk terlebih dahulu !";
}
else{
?>

<?php 
include "../fungsi/koneksi.php";
include "../fungsi/class_paging.php";
include "../fungsi/fungsi_indotgl.php";
include "../fungsi/library.php";
include "../inc/pengaturan.php";
include "../fungsi/ubahkarakter.php";
?>
 
 <?php 

if (isset($_GET['no_kk'])){ 
 
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM kk where no_kk='$_GET[no_kk]'"));
	
			  if ($jmldata > 0){} else {header('location:404.php'); }   

$TGLBUAT = date('d-m-Y');
		
if(isset($_GET['hal'])){
$HAL = $_GET['hal'];
}
else {
	$HAL = "1";
}

$TGLNAMAFILE = tglnmfile("$TGLBUAT");
		$TGLFOLDER = date('Y');
		$TGLFOLDER2 = date('m');
		$cachefolder = "../arsip_surat/".$TGLFOLDER."/".$TGLFOLDER2;
if (!file_exists($cachefolder)) {
    mkdir($cachefolder, 0777, true);
  	$cachefile = $cachefolder."/".$TGLNAMAFILE."-KK-".$_GET['no_kk']."hal".$HAL.".xls";
}
	else {
  	$cachefile = $cachefolder."/".$TGLNAMAFILE."-KK-".$_GET['no_kk']."hal".$HAL.".xls";	
	}
	ob_start();  
 

include "f-1.php";  

$file = fopen($cachefile, 'w');
fwrite($file, ob_get_clean());
fclose($file);
ob_end_flush();


}
else {header('location:404.php');}
}
}
?>
