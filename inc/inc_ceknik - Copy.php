<?php
include "../fungsi/fungsi_anti_injection.php";
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
}
else{

include "../fungsi/koneksi.php"; 

if ($_GET[mod]=='nokk'){
$sql = mysql_query("select * from kk where no_kk='$_GET[no_kk]'");
$catch = mysql_num_rows($sql);
echo $catch;
}
elseif ($_GET[mod]=='nopen'){
	
 if(!isset($_GET[no_pen]) || empty($_GET[no_pen])) {
echo '2';
}
else {
$sql = mysql_query("select * from penduduk where no_pen='$_GET[no_pen]'");
$catch = mysql_num_rows($sql);
echo $catch;
}
}

elseif ($_GET[mod]=='hdk'){
if ($_GET[status]=='1'){
	
$sql = mysql_query("select * from penduduk where no_kk_pen='$_GET[no_kk]' AND status_hdk_pen='1'");
$catch = mysql_num_rows($sql);
echo $catch;
}

elseif ($_GET[status]=='a'){
echo '1';
	
}
else {
echo '0';
}
} 
}
?>