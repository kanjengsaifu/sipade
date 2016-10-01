 <?php
session_start();
error_reporting(0); 
if($_SESSION[login]==0){
  header("location:inc/logout.php");
} 
include "../fungsi/koneksi.php"; 

 $rule_std = mysql_query("select * from pengaturan where id='2'"); 
	$rule=mysql_fetch_array($rule_std);
	$rule_cap = mysql_query("select * from pengaturan where id='1'"); 
	$rulecap=mysql_fetch_array($rule_cap);	
	$set_pejabat = mysql_query("select * from pejabat where id='$_POST[ybt]' "); 
	$setpejabat=mysql_fetch_array($set_pejabat);
	
	$RULEKODEPKK = $rule['kodekab'];
	
	$RULEDESA = $rule['desa'];
	$RULEKODEDESA = $rule['kodedesa'];
	$RULEKAB = $rule['kabupaten'];
	$RULEKODEKAB = $rule['kodekab'];
	$RULEKEC = $rule['kecamatan']; 
	$RULEKODEKEC = substr($RULEKODEKAB,4,2);
	$RULEPROV = $rule['provinsi'];
	$RULEKODEPROV = substr($RULEKODEKAB,0,2);
	$RULEKODEKAB = substr($RULEKODEKAB,2,2);
	$RULEALMT = $rule['alamat'];
	$RULEKODEPOS = $rule['kodepos'];
	$RULEKEPDESA = $rule['kepaladesa'];
	$RULEINSTALL = $rule['install'];
	
	$RULECAPDESA = $rulecap['desa'];
	$RULECAPKODEDESA = $rulecap['kodedesa'];
	$RULECAPKAB = $rulecap['kabupaten'];
	$RULECAPKODEKAB = $rulecap['kodekab'];
	$RULECAPKEC = $rulecap['kecamatan']; 
	$RULECAPKODEKEC = substr($RULEKODEKAB,4,2);
	$RULECAPPROV = $rulecap['provinsi'];
	$RULECAPKODEPROV = $rulecap['kodeprov'];
	$RULECAPKODEPROV = substr($RULEKODEKAB,0,2);
	$RULECAPALMT = $rulecap['alamat'];
	$RULECAPKODEPOS = $rulecap['kodepos'];
	$RULECAPKEPDESA = $rulecap['kepaladesa'];
	$RULECAPINSTALL = $rulecap['install'];
	
	?>
 