<?php
session_start();
error_reporting(0);
include "inc/timeout.php";
include "fungsi/koneksi.php";

 $rule_std = mysql_query("select * from pengaturan where id='1'");
	$rule=mysql_fetch_array($rule_std);
	$RULEINSTALL = $rule['install'];

if($RULEINSTALL=="N"){

  header('location:install/index.php?sec=start');
}
else {
if($_SESSION[login]==1){
if(!cek_login()){
$_SESSION[login] = 0;
}
}
if($_SESSION[login]==0){
session_destroy();
  header('location:auth');
}
else{
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
session_destroy();
  header('location:auth');
}
else{
  header('location:!auth');
}
}
}
?>