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
$NOID = preg_replace('/\D/', '', $_POST['noid']);
if (isset($NOID)){ 
 
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM penduduk where no_pen='$NOID'"));
	
			  if ($jmldata > 0){} else {header('location:404.php'); }   

$TGLBUAT = date('d-m-Y');
		


$TGLNAMAFILE = tglnmfile("$TGLBUAT");
		$TGLFOLDER = date('Y');
		$TGLFOLDER2 = date('m');
		$cachefolder = "../arsip_surat/".$TGLFOLDER."/".$TGLFOLDER2;
if (!file_exists($cachefolder)) {
    mkdir($cachefolder, 0777, true);
  	$cachefile = $cachefolder."/".$TGLNAMAFILE."-SKPD-".$NOID.".rtf";
}
	else {
  	$cachefile = $cachefolder."/".$TGLNAMAFILE."-SKPD-".$NOID.".rtf";	
	}
 

	ob_start();  
 

  header("Content-disposition: inline; filename=".$TGLNAMAFILE."-SKPD-".$NOID.".rtf"); 
header("Content-type: application/msword"); 
include "sk_pd.php";  

$file = fopen($cachefile, 'w');
fwrite($file, ob_get_contents());
fclose($file);
ob_end_flush();


}
else {header('location:404.php');}
}
}
?>

