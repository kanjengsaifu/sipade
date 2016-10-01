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
$HAL = $_GET['hal'];
$TGLNAMAFILE = tglnmfile("$TGLBUAT");
		$TGLFOLDER = date('Y');
		$TGLFOLDER2 = date('m');
		$cachefolder = "../arsip_surat/".$TGLFOLDER."/".$TGLFOLDER2;
if (!file_exists($cachefolder)) {
    mkdir($cachefolder, 0777, true);
  	$cachefile = $cachefolder."/".$TGLNAMAFILE."-KK-".$_GET['no_kk']."hal".$HAL.".html";
}
	else {
  	$cachefile = $cachefolder."/".$TGLNAMAFILE."-KK-".$_GET['no_kk']."hal".$HAL.".html";	
	}
	ob_start();  
				   ?>
<html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=Generator content="SIPA'DE">
<title>Formulir Kartu Keluarga</title>
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
@font-face
	{font-family:Tahoma;
	panose-1:2 11 6 4 3 5 4 4 2 4;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:10.0pt;
	margin-left:0cm;
	line-height:115%;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
	{mso-style-link:"Balloon Text Char";
	margin:0cm;
	margin-bottom:.0001pt;
	font-size:8.0pt;
	font-family:"Tahoma","sans-serif";}
span.BalloonTextChar
	{mso-style-name:"Balloon Text Char";
	mso-style-link:"Balloon Text";
	font-family:"Tahoma","sans-serif";}
.MsoChpDefault
	{font-family:"Calibri","sans-serif";}
.MsoPapDefault
	{margin-bottom:10.0pt;
	line-height:115%;}
@page WordSection1
	{size:1008.0pt 612.0pt;
	margin:9.35pt 41.65pt 9.65pt 14.2pt;}
div.WordSection1
	{page:WordSection1;}
-->
.tr_small {width:18.0pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0cm 2.85pt 0cm 2.85pt;height:11.35pt}
 .td_no {width:17.95pt;border:double windowtext 1.5pt;border-right:
  solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;height:14.15pt}
  .td_nm {width:171.05pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:14.15pt}
  .td_nik {width:180.0pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:14.15pt}
  .td_almt {width:225.0pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:14.15pt}
  .td_nopas {width:144.0pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:14.15pt}
  .td_tglpas {width:143.95pt;border:double windowtext 1.5pt;
  border-left:none;padding:0cm 2.85pt 0cm 2.85pt;height:14.15pt}
  
  .td_1 {width:17.95pt;border-top:none;border-left:double windowtext 1.5pt;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:5.75pt}
  .td_2 {width:171.05pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:5.75pt}
  .td_3 {width:180.0pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:5.75pt}
  .td_4 {width:225.0pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:5.75pt}
  .td_5 {width:144.0pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:5.75pt}
  .td_6 {width:143.95pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:double windowtext 1.5pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:5.75pt}
  
  .td_1_isi {width:17.95pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0cm 2.85pt 0cm 2.85pt;height:11.35pt}
  .td_2_isi {width:171.05pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:11.35pt}
  .td_3_isi {width:180.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:11.35pt}
  .td_4_isi {width:225.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:11.35pt}
  .td_5_isi {width:144.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:11.35pt}
  .td_6_isi {width:143.95pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:11.35pt}
  
  .td_no2 {width:18.0pt;border:double windowtext 1.5pt;border-right:
  solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;height:14.15pt}
  .td_jk {width:54.0pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:14.15pt}
  .td_tmptlhr {width:117.0pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:14.15pt}
  .td_tgllhr {width:72.0pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:14.15pt}
  .td_umur {width:27.5pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:14.15pt}
  .td_akta {width:36.0pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:14.15pt}
  .td_noakta {width:72.0pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:14.15pt}
  .td_goldar {width:36.0pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:14.15pt}
  .td_agm {width:36.0pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:14.15pt}
  .td_status {width:36.0pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:14.15pt}
  .td_bukunkh {width:36.0pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:14.15pt}
  .td_nobukunkh {width:82.3pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:14.15pt}
  .td_tglnkh {width:72.0pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:14.15pt}
  .td_aktacrai {width:52.2pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:14.15pt}
  .td_noaktacrai {width:72.5pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:14.15pt}
  .td_tglcrai {width:62.5pt;border:double windowtext 1.5pt;border-left:
  none;padding:0cm 0cm 0cm 0cm;height:14.15pt}
  
  .td_1_2 {width:18.0pt;border-top:none;border-left:double windowtext 1.5pt;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:5.75pt}
  .td_7 {width:54.0pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:5.75pt}
  .td_8 {width:117.0pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:5.75pt}
  .td_9 {width:72.0pt;border-top:none;border-left:none;border-bottom:
  double windowtext 1.5pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:5.75pt}
  .td_10 {width:27.5pt;border-top:none;border-left:none;border-bottom:
  double windowtext 1.5pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:5.75pt}
  .td_11 {width:36.0pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:5.75pt}
  .td_12 {width:72.0pt;border-top:none;border-left:none;border-bottom:
  double windowtext 1.5pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:5.75pt}
  .td_13 {width:36.0pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:5.75pt}
  .td_14 {width:36.0pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:5.75pt}
  .td_15 {width:36.0pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:5.75pt}
  .td_16 {width:36.0pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:5.75pt}
  .td_17 {width:82.3pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:5.75pt}
  .td_18 {width:72.0pt;border-top:none;border-left:none;border-bottom:
  double windowtext 1.5pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:5.75pt}
  .td_19 {width:52.2pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:5.75pt}
  .td_20 {width:72.5pt;border-top:none;border-left:none;border-bottom:
  double windowtext 1.5pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:5.75pt}
  .td_21 {width:62.5pt;border-top:none;border-left:none;border-bottom:
  double windowtext 1.5pt;border-right:double windowtext 1.5pt;padding:0cm 0cm 0cm 0cm;
  height:5.75pt}
  
  
  .td_no2_isi {width:18.0pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0cm 0cm 0cm 0cm;height:11.35pt}
  .td_7_side {width:9.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:11.35pt;background:#ddd;}
  .td_7_isi {width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:11.35pt}
  .td_8_isi {width:117.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:11.35pt}
  .td_9_isi {width:72.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:11.35pt}
  .td_10_isi {width:27.5pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:11.35pt}
  .td_11_side {width:9.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:11.35pt;background:#ddd;}
  .td_11_isi {width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:11.35pt}
  .td_12_isi {width:72.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:11.35pt}
  .td_12_isi {width:72.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:11.35pt}
  .td_13_side {width:9.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:11.35pt;background:#ddd;}
  .td_13_isi {width:18pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:11.35pt}
  .td_14_side {width:9.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:11.35pt;background:#ddd;}
  .td_14_isi {width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:11.35pt}
  .td_15_side {width:9.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:11.35pt;background:#ddd;}
  .td_15_isi {width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:11.35pt}
  .td_16_side {width:9.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:11.35pt;background:#ddd;}
  .td_16_isi {width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:11.35pt}
  .td_17_isi {width:82.3pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 0cm 0cm 0cm;height:11.35pt}
  .td_18_isi {width:72.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:11.35pt}
  .td_19_side {width:13.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:11.35pt;background:#ddd;}
  .td_19_isi {width:16.2pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:11.35pt}
  .td_20_isi {width:72.5pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:11.35pt}
  .td_21_isi {width:72.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 0cm 0cm 0cm;
  height:11.35pt}

  .td_no3 {width:18.0pt;border:double windowtext 1.5pt;border-right:
  solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;height:14.15pt}
  .td_hdk {width:72.0pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:14.15pt}
  .td_kfm {width:54.0pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:14.15pt}
  .td_pc {width:54.0pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:14.15pt}
  .td_pt {width:54.0pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:14.15pt}
  .td_p {width:72.0pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:14.15pt}
  .td_ni {width:144.0pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:14.15pt}
  .td_nli {width:135.0pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:14.15pt}
  .td_na {width:144.0pt;border-top:double windowtext 1.5pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:14.15pt}
  .td_nla {width:135.0pt;border:double windowtext 1.5pt;border-left:
  none;padding:0cm 2.85pt 0cm 2.85pt;height:14.15pt}
  
  .td_1_3 {width:18.0pt;border-top:none;border-left:double windowtext 1.5pt;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:5.75pt}
  .td_22 {width:72.0pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:5.75pt}
  .td_23 {width:54.0pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:5.75pt}
  .td_24 {width:54.0pt;border-top:none;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:5.75pt}
  .td_25 {width:54.0pt;border-top:none;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:5.75pt}
  .td_26 {width:72.0pt;border-top:none;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:5.75pt}
  .td_27 {width:144.0pt;border-top:none;border-left:
  none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:5.75pt}
  .td_28 {width:135.0pt;border-top:none;border-left:
  none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:5.75pt}
  .td_29 {width:144.0pt;border-top:none;border-left:
  none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:5.75pt}
  .td_30 {width:135.0pt;border-top:none;border-left:
  none;border-bottom:double windowtext 1.5pt;border-right:double windowtext 1.5pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:5.75pt}
  
  .td_no3_isi {width:18.0pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0cm 2.85pt 0cm 2.85pt;height:11.35pt}
  .td_22_side {width:10pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 1pt 0cm 1pt;height:11.35pt;background:#ddd;}
  .td_22_isi {width:18.55pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:11.35pt}
  .td_23_side {width:10pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 1pt 0cm 1pt;
  height:11.35pt;background:#ddd;}
  .td_23_isi {width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:11.35pt}
  .td_24_side {width:10pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 1pt 0cm 1pt;
  height:11.35pt;background:#ddd;}
  .td_24_isi {width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:11.35pt}
  .td_25_side {width:10pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 1pt 0cm 1pt;
  height:11.35pt;background:#ddd;}
  .td_25_isi {width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:11.35pt}
  .td_26_side {width:10pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 1pt 0cm 1pt;
  height:11.35pt;background:#ddd;}
  .td_26_isi {width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:11.35pt}
  .td_27_isi {width:144.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:11.35pt}
  .td_28_isi {width:135.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:11.35pt}
  .td_29_isi {width:144.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:11.35pt}
  .td_30_isi {width:135.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:11.35pt}
  </style>

</head>

<body lang=IN>

 
<?php 
$hdkpen = mysql_num_rows(mysql_query("SELECT * FROM penduduk where no_kk_pen='$_GET[no_kk]' AND status_hdk_pen='1'"));
	
if ($hdkpen=="1"){ //ada satu pen yang berstatus kep. kk
	
$kepalakeluarga=mysql_query("SELECT * FROM  penduduk,arsip_alamat,arsip_rw 
							where arsip_alamat.id_alamat=penduduk.alamat_pen
							AND arsip_rw.id_rw=penduduk.rw_pen
							AND status_hdk_pen='1'
							AND no_kk_pen='$_GET[no_kk]'");
$k=mysql_fetch_array($kepalakeluarga);

 $nokk = $k['no_kk_pen'];
 $namakk = ubah_huruf_ke_besar($k['nama_pen']);
 $alamatkk = ubah_huruf_ke_besar($k['alamat']);
 $alamatrtkk = "0".$k['rt_pen'];
 $alamatrtkk = split_char1($alamatrtkk);
 $alamatrwkk = "0".$k['rw'];
 $detectRT=mysql_query("SELECT * FROM  penduduk,arsip_rt 
							where arsip_rt.id_rw=penduduk.rw_pen
							AND arsip_rt.rt=penduduk.rt_pen
							AND status_hdk_pen='1'
							AND no_kk_pen='$_GET[no_kk]'");
$rt=mysql_fetch_array($detectRT);
$nama_rt = $rt['nama_ketua_rt'];
							
 $alamatrwkk = split_char1($alamatrwkk);
 $alamatdesakk = ubah_huruf_ke_besar($k['desa']);
 $alamatkeckk = ubah_huruf_ke_besar($k['kecamatan']);
 $alamatkabkk = ubah_huruf_ke_besar($k['kabupaten_kota']);
 $alamatprovkk = ubah_huruf_ke_besar($k['provinsi']);
 $alamatkodedesakk = split_char1($RULEKODEDESA);
 $alamatkodeprovkk = split_char1($RULEKODEPROV);
 $alamatkodekabkk = split_char1($RULEKODEKAB);
 $alamatkodekeckk = split_char1($RULEKODEKEC);
 $alamatkodeposkk = split_char1($k['kode_pos']);
 $kepalakeluarga = "1"; //ada kepala keluarga 
 }
elseif ($hdkpen > 1){ //ada lebih dari satu pen yang berstatus kep. kk
	
$kepalakeluarga=mysql_query("SELECT * FROM  penduduk,arsip_alamat,arsip_rt,arsip_rw 
							where arsip_alamat.id_alamat=penduduk.alamat_pen
							AND arsip_rt.id_rt=penduduk.rt_pen
							AND arsip_rw.id_rw=penduduk.rw_pen
							AND status_hdk_pen='1'
							AND no_kk_pen='$_GET[no_kk]'");
$k=mysql_fetch_array($kepalakeluarga);

 $nokk = $k['no_kk_pen'];
 $namakk = ubah_huruf_ke_besar($k['nama_pen']);
 $alamatkk = ubah_huruf_ke_besar($k['alamat']);
 $alamatrtkk = "0".$k['rt_pen'];
 $alamatrtkk = split_char1($alamatrtkk);
 $alamatrwkk = "0".$k['rw'];
 $detectRT=mysql_query("SELECT * FROM  penduduk,arsip_rt 
							where arsip_rt.id_rw=penduduk.rw_pen
							AND arsip_rt.rt=penduduk.rt_pen
							AND status_hdk_pen='1'
							AND no_kk_pen='$_GET[no_kk]'");
$rt=mysql_fetch_array($detectRT);
$nama_rt = $rt['nama_ketua_rt'];
 $alamatdesakk = ubah_huruf_ke_besar($k['desa']);
 $alamatkeckk = ubah_huruf_ke_besar($k['kecamatan']);
 $alamatkabkk = ubah_huruf_ke_besar($k['kabupaten_kota']);
 $alamatprovkk = ubah_huruf_ke_besar($k['provinsi']);
 $alamatkodedesakk = split_char1($RULEKODEDESA);
 $alamatkodeprovkk = split_char1($RULEKODEPROV);
 $alamatkodekabkk = split_char1($RULEKODEKAB);
 $alamatkodekeckk = split_char1($RULEKODEKEC);
 $alamatkodeposkk = split_char1($k['kode_pos']);
 $kepalakeluarga = "2"; //ada banyak kepala keluarga 
 }
else {
$querycekk=mysql_query("SELECT * FROM kk,arsip_alamat,arsip_rw  WHERE arsip_alamat.id_alamat=kk.alamat
							AND arsip_rw.id_rw=kk.rw
							AND no_kk='$_GET[no_kk]'");
$k=mysql_fetch_array($querycekk);
$rule=mysql_query("SELECT * FROM pengaturan WHERE id='2'");
$rule=mysql_fetch_array($rule);

 $nokk = $k['no_kk'];
 $namakk = "<span style='background:#df5;'>".ubah_huruf_ke_besar($k['catatan'])."</span>";
 $alamatkk = ubah_huruf_ke_besar($k['alamat']);
 $alamatrtkk = "0".$k['rt'];
 $alamatrtkk = split_char1($alamatrtkk);
 $alamatrwkk = "0".$k['rw'];
 $detectRT=mysql_query("SELECT * FROM  kk,arsip_rt 
							where arsip_rt.id_rw=kk.rw
							AND arsip_rt.rt=kk.rt
							AND no_kk='$_GET[no_kk]'");
$rt=mysql_fetch_array($detectRT);
$nama_rt = $rt['nama_ketua_rt'];
 $alamatdesakk = ubah_huruf_ke_besar($rule['desa']);
 $alamatkeckk = ubah_huruf_ke_besar($rule['kecamatan']);
 $alamatkabkk = ubah_huruf_ke_besar($rule['kabupaten']);
 $alamatprovkk = ubah_huruf_ke_besar($rule['provinsi']);
 $alamatkodedesakk = split_char1($RULEKODEDESA);
 $alamatkodeprovkk = split_char1($RULEKODEPROV);
 $alamatkodekabkk = split_char1($RULEKODEKAB);
 $alamatkodekeckk = split_char1($RULEKODEKEC);
 $alamatkodeposkk = split_char1($k['kode_pos']);
 $kepalakeluarga = "0"; //tidak ada kepala keluarga
 }
   
?>
<div class=WordSection1>
<!--table kop  -->
<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
 style='margin-left:5.4pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=341 valign=top style='width:255.6pt;padding:0cm 0cm 0cm 5.4pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><img width=33 height=39 id="Picture 1"
  src="images/image001.jpg"
  alt="Description: Description: Description: Description: LOGO%20BOGOR%20HP"></p>
  </td>
  <td width=529 valign=top style='width:14.0cm;padding:0cm 0cm 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:14.0pt'>PEMERINTAH
  KEBUPATEN <?php echo $alamatkabkk; ?></span></b></p>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:12.0pt'>FORMULIR
  ISIAN BIODATA PENDUDUK UNTUK WNI (PER KELUARGA</span></b><span
  style='font-size:12.0pt'>)</span></p>
  </td>
  <td width=287 valign=top style='width:215.1pt;padding:0cm 0cm 0cm 5.4pt'>
  <div align=right>
  <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
   style='border-collapse:collapse;border:none'>
   <tr style='height:14.2pt'>
    <td width=76 valign=top style='width:57.2pt;border:solid windowtext 1.0pt;
    padding:0cm 5.4pt 0cm 5.4pt;height:14.2pt'>
    <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><b>F-101</b></p>
    </td>
   </tr>
  </table>
  </div>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'></p>
  </td>
 </tr>
</table>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
    
<!--table top  -->
<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=1177
 style='width:882.7pt;margin-left:2.85pt;border-collapse:collapse;border:none'>
 <tr style='height:11.35pt'>
  <td width=12 style='width:9.0pt;border:solid windowtext 1.0pt;border-right:
  none;padding:0cm 2.85pt 0cm 2.85pt;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=684 colspan=20 style='width:513.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 2.85pt 0cm 2.85pt;height:11.35pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'>Perhatian : Isilah Formulir ini dengan
  huruf cetak dan jelas serta mengikuti TATA CARA PENGISIAN FORMULIR pada
  Halaman Sebaliknya</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=41 style='width:30.85pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=14 style='width:10.35pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=378 colspan=8 style='width:10.0cm;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>Diisi
  Oleh Petugas</span></p>
  </td>
 </tr>
 <tr style='height:1.0pt'>
  <td width=12 style='width:9.0pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=684 colspan=20 style='width:513.0pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><b><span style='font-size:7.0pt'>DATA KEPALA KELUARGA</span></b></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;border-bottom:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;border-bottom:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=41 style='width:30.85pt;border:none;border-bottom:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=14 style='width:10.35pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=142 style='width:106.35pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:7.0pt'>Kode-Nama
  Provinsi</span></p>
  </td>
  <td width=24 colspan=2 style='width:18.3pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>:</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt' colspan='2'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'><?php echo $alamatkodeprovkk; ?></span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=116 style='width:86.85pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'><?php echo $alamatprovkk; ?></span></p>
  </td>
 </tr>
 <tr style='height:1.0pt'>
  <td width=12 style='width:9.0pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=132 style='width:99.0pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'>Nama Kepala Keluarga</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>:</span></p>
  </td>
  <td width=617 colspan=21 style='width:462.85pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'><?php echo $namakk; ?></span></p>
  </td>
  <td width=14 style='width:10.35pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=142 colspan=2 style='width:106.65pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:7.0pt'>Kode-Nama
  Kabupaten</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>:</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt' colspan='2'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'><?php echo $alamatkodekabkk; ?></span></p>
  </td>
  
  <td width=24 style='width:18.0pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=116 style='width:86.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'><?php echo $alamatkabkk; ?></span></p>
  </td>
 </tr>
 <tr style='height:1.0pt'>
  <td width=12 style='width:9.0pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=132 style='width:99.0pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'>Alamat</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>:</span></p>
  </td>
  <td width=617 colspan=21 style='width:462.85pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'><?php echo $alamatkk; ?></span></p>
  </td>
  <td width=14 style='width:10.35pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=142 colspan=2 style='width:106.65pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:7.0pt'>Kode-Nama Kecamatan</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>:</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt' colspan='2'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'><?php echo $alamatkodekeckk; ?></span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;border-bottom:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=116 style='width:86.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'><?php echo $alamatkeckk; ?></span></p>
  </td>
 </tr>
 <tr style='height:1.0pt'>
  <td width=12 style='width:9.0pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=132 style='width:99.0pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'>Kode Pos</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>:</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt' colspan='5'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'><?php echo $alamatkodeposkk; ?></span></p>
  </td> 
  <td width=24 style='width:18.0pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:none;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:none;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>RT</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 7pt 0cm 4pt;height:1.0pt' colspan="3">
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:7.0pt'><?php echo $alamatrtkk; ?></span></p>
  </td>
   
  <td width=24 style='width:18.0pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:none;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;border-top:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:none;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>RW</span></p>
  </td>
 
  <td width=24 style='width:18.0pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 7pt 0cm 4pt;height:1.0pt' colspan="3">
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'><?php echo $alamatrwkk; ?></span></p>
  </td> 
  <td width=120 style='width:90.0pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:7.0pt'>Jumlah
  Angg. Keluarga</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=41 style='width:30.85pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>Orang</span></p>
  </td>
  <td width=14 style='width:10.35pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=142 colspan=2 style='width:106.65pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:7.0pt'>Kode-Nama Desa</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>:</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt' colspan='4'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'><?php echo $alamatkodedesakk; ?></span></p>
  </td>
  <td width=116 style='width:86.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'><?php echo $alamatdesakk; ?></span></p>
  </td>
 </tr>
 <tr style='height:1.0pt'>
  <td width=12 style='width:9.0pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=132 style='width:99.0pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'>Telepon</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>:</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=120 style='width:90.0pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=41 style='width:30.85pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=14 style='width:10.35pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=142 colspan=2 style='width:106.65pt;border:none;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span style='font-size:7.0pt'>Kode-Dusun/Dukuh/Kampung</span></p>
  </td>
  <td width=24 style='width:18.0pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>:</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.85pt 0cm 2.85pt;
  height:1.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=116 style='width:86.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 2.85pt 0cm 2.85pt;height:1.0pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'><?php echo $alamatkk; ?></span></p>
  </td>
 </tr>
 <tr height=0>
  <td width=12 style='border:none'></td>
  <td width=132 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=120 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=41 style='border:none'></td>
  <td width=14 style='border:none'></td>
  <td width=142 style='border:none'></td>
  <td width=0 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=24 style='border:none'></td>
  <td width=116 style='border:none'></td>
 </tr>
</table>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:5.0pt'>&nbsp;</span></p>
<!--table 1 -->
<table class="MsoTableGrid" border="1" cellspacing="0" cellpadding="0" width="1176" style="width:881.95pt;margin-left:2.85pt;border-collapse:collapse;border:none">
 <tbody>
 <tr style="height:14.15pt">
  <td width="24" class="td_no">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">No.</span></b></p>
  </td>
  <td width="228" class="td_nm">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Nama
  Lengkap</span></b></p>
  </td>
  <td width="240" class="td_nik">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">No.
  KTP/Nopem</span></b></p>
  </td>
  <td width="300" class="td_almt">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Alamat
  Sebelumnya</span></b></p>
  </td>
  <td width="192" class="td_nopas">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Nomor
  Paspor</span></b></p>
  </td>
  <td width="192" class="td_tglpas">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Tanggal
  Berakhir Paspor</span></b></p>
  </td>
 </tr>
 
 <tr style="height:5.75pt">
  <td width="24" class="td_1">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">1</span></p>
  </td>
  <td width="228" class="td_2">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">2</span></p>
  </td>
  <td width="240" class="td_3">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">3</span></p>
  </td>
  <td width="300" class="td_4">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">4</span></p>
  </td>
  <td width="192" class="td_5">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">5</span></p>
  </td>
  <td width="192" class="td_6">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">6</span></p>
  </td>
 </tr>
    
		<?php 
		
	$cekkk = mysql_num_rows(mysql_query("SELECT * FROM penduduk where no_kk_pen='$_GET[no_kk]'"));
			  if ($cekkk > 0){
  
$penduduk = "SELECT * FROM  penduduk, arsip_agama, arsip_alamat, arsip_kelamin,arsip_goldar, arsip_kewarganegaraan, arsip_pekerjaan, arsip_pendidikan, arsip_rt, arsip_rw, arsip_status, arsip_status_hdk
WHERE arsip_agama.id_agama=penduduk.agama_pen
AND arsip_alamat.id_alamat=penduduk.alamat_pen
AND arsip_kelamin.id_kelamin=penduduk.kelamin_pen
AND arsip_kewarganegaraan.id_kewarganegaraan=penduduk.kewarganegaraan_pen
AND arsip_pekerjaan.id_pekerjaan=penduduk.pekerjaan_pen
AND arsip_pendidikan.id_pendidikan=penduduk.pendidikan_pen
AND arsip_rt.id_rt=penduduk.rt_pen
AND arsip_rw.id_rw=penduduk.rw_pen
AND arsip_status.id_status=penduduk.status_pen
AND arsip_status_hdk.id_status_hdk=penduduk.status_hdk_pen
AND arsip_goldar.id_goldar=penduduk.goldar_pen
AND penduduk.no_kk_pen='$_GET[no_kk]' ";

  
$penduduk1 = " AND penduduk.statusnya='0' ";			  
  $p      = new Listpen; 
  $batas  = 8;
  $posisi = $p->cariPosisi($batas);
  $hasildata  = mysql_query($penduduk.$penduduk1);
  $jmldata = mysql_num_rows($hasildata);
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas); 
$penduduk .= " ORDER BY status_hdk_pen, DATE_FORMAT(tanggal_lahir_pen, '%Y-%m-%d') LIMIT $posisi,$batas";

  $penduduk  = mysql_query($penduduk);
  $jmldatatr = mysql_num_rows($penduduk);
	$no=$posisi+1;
	
	while($p=mysql_fetch_array($penduduk)){
		
		if ($p['statusnya']!="4" AND $p['statusnya']!="0") {
			echo "<tr style='height:11.35pt; display:none;'>";
		}
		else { if ($p['statusnya']=="4"){ $NIK= '';} else { $NIK = $p['no_pen'];}
			echo "<tr style='height:11.35pt;'>"; 
			}
echo "
  <td width='24' class='td_1_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>$no</span></p>
  </td>
  <td width='228' class='td_2_isi'>
  <p class='MsoNormal' style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'>$p[nama_pen]</span></p>
  </td>
  <td width='240' class='td_3_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>$NIK</span></p>
  </td>
  <td width='300' class='td_4_isi'>
  <p class='MsoNormal' style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='192' class='td_5_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='192' class='td_6_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
 </tr>";
$no++;
	}
	
	if ($jmldatatr < $batas) {
	$jmltr = $batas-$jmldatatr;
	$jmltrmulai = $jmldatatr+1;
     for ($i=$jmltrmulai; $i<=$batas; $i++){
     
        echo "<tr style='height:11.35pt'>
  <td width='24' class='td_1_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'></span></p>
  </td>
  <td width='228' class='td_2_isi'>
  <p class='MsoNormal' style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'></span></p>
  </td>
  <td width='240' class='td_3_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'></span></p>
  </td>
  <td width='300' class='td_4_isi'>
  <p class='MsoNormal' style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='192' class='td_5_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='192' class='td_6_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
 </tr>";
    }	
	}
	
	}
	?>
</tbody></table>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:5.0pt'>&nbsp;</span></p>
<!--table 2  -->
<table class="MsoTableGrid" border="1" cellspacing="0" cellpadding="0" width="1176" style="width:882.0pt;margin-left:2.85pt;border-collapse:collapse;border:none">
 <tbody>
 <tr style="height:14.15pt">
  <td width="24" class="td_no2">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">No.</span></b></p>
  </td>
  <td width="72" colspan="3" class="td_jk">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Jenis
  Kelamin</span></b></p>
  </td>
  <td width="156" class="td_tmptlhr">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Tempat
  Lahir</span></b></p>
  </td>
  <td width="96" class="td_tgllhr">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Tanggal/Bulan/Tahun<br>
  Lahir</span></b></p>
  </td>
  <td width="37" class="td_umur">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Umur</span></b></p>
  </td>
  <td width="48" colspan="3" class="td_akta">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Akta
  Lahir<br>
  Surat Lahir</span></b></p>
  </td>
  <td width="96" class="td_noakta">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Nomor
  Akta Kelahiran<br>
  Surat Kenal Lahir</span></b></p>
  </td>
  <td width="48" colspan="3" class="td_goldar">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Golongan<br>
  Darah</span></b></p>
  </td>
  <td width="48" colspan="3" class="td_agm">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Agama</span></b></p>
  </td>
  <td width="48" colspan="3" class="td_status">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Status
  Perkawinan</span></b></p>
  </td>
  <td width="48" colspan="3" class="td_bukunkh">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Akta
  Perk/<br>
  Buku Nikah *)</span></b></p>
  </td>
  <td width="110" class="td_nobukunkh">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Nomor
  Akta Perkawinan<br>
  Buku Nikah *)</span></b></p>
  </td>
  <td width="96" class="td_tglnkh">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Tanggal
  Perkawinan *)</span></b></p>
  </td>
  <td width="70" colspan="3" class="td_aktacrai">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Akta
  Cerai<br>
  Surat Cerai *)</span></b></p>
  </td>
  <td width="97" class="td_noaktacrai">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Nomor
  Akta Perkawinan/<br>
  Surat CeraiI *)</span></b></p>
  </td>
  <td width="83" class="td_tglcrai">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Tanggal
  Perceraian *)</span></b></p>
  </td>
 </tr>
 
 <tr style="height:5.75pt">
  <td width="24" class="td_1_2">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">&nbsp;</span></p>
  </td>
  <td width="72" colspan="3" class="td_7">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">7</span></p>
  </td>
  <td width="156" class="td_8">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">8</span></p>
  </td>
  <td width="96" class="td_9">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">9</span></p>
  </td>
  <td width="37" class="td_10">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">10</span></p>
  </td>
  <td width="48" colspan="3" class="td_11">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">11</span></p>
  </td>
  <td width="96" class="td_12">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">12</span></p>
  </td>
  <td width="48" colspan="3" class="td_13">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">13</span></p>
  </td>
  <td width="48" colspan="3" class="td_14">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">14</span></p>
  </td>
  <td width="48" colspan="3" class="td_15">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">15</span></p>
  </td>
  <td width="48" colspan="3" class="td_16">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">16</span></p>
  </td>
  <td width="110" class="td_17">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">17</span></p>
  </td>
  <td width="96" class="td_18">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">18</span></p>
  </td>
  <td width="70" colspan="3" class="td_19">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">19</span></p>
  </td>
  <td width="97" class="td_20">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">20</span></p>
  </td>
  <td width="83" class="td_21">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">21</span></p>
  </td>
 </tr>
 <?php
			  if ($cekkk > 0){
$penduduk2=mysql_query("SELECT * FROM  penduduk, arsip_agama, arsip_alamat, arsip_kelamin,arsip_goldar, arsip_kewarganegaraan, arsip_pekerjaan, arsip_pendidikan, arsip_rt, arsip_rw, arsip_status, arsip_status_hdk
WHERE arsip_agama.id_agama=penduduk.agama_pen
AND arsip_alamat.id_alamat=penduduk.alamat_pen
AND arsip_kelamin.id_kelamin=penduduk.kelamin_pen
AND arsip_kewarganegaraan.id_kewarganegaraan=penduduk.kewarganegaraan_pen
AND arsip_pekerjaan.id_pekerjaan=penduduk.pekerjaan_pen
AND arsip_pendidikan.id_pendidikan=penduduk.pendidikan_pen
AND arsip_rt.id_rt=penduduk.rt_pen
AND arsip_rw.id_rw=penduduk.rw_pen
AND arsip_status.id_status=penduduk.status_pen
AND arsip_status_hdk.id_status_hdk=penduduk.status_hdk_pen
AND arsip_goldar.id_goldar=penduduk.goldar_pen 
AND penduduk.no_kk_pen='$_GET[no_kk]'  ORDER BY status_hdk_pen, DATE_FORMAT(tanggal_lahir_pen, '%Y-%m-%d') LIMIT  $posisi,$batas");
	$no=$posisi+1;
	while($p=mysql_fetch_array($penduduk2)){		
	$tgllahir = tgl_indo2($p['tanggal_lahir_pen']);
	
		if ($p['statusnya']!="4" AND $p['statusnya']!="0") {
			echo "<tr style='height:11.35pt; display:none;'>";
		}
		else {
			echo "<tr style='height:11.35pt;'>";}
	echo " 
  <td width='24' class='td_no2_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>$no</span></p>
  </td>
  <td width='12' class='td_7_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td> 
  <td width='24' class='td_7_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>$p[kelamin_pen]</span></p>
  </td>
  <td width='12' class='td_7_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'></span></p>
  </td>
  <td width='156' class='td_8_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>$p[tempat_lahir_pen]</span></p>
  </td>
  <td width='96' class='td_9_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>$tgllahir</span></p>
  </td>
  <td width='37' class='td_10_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='12' class='td_11_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_11_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='12' class='td_11_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='96' class='td_12_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='12' class='td_13_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_13_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>$p[goldar_pen]</span></p>
  </td>
  <td width='12' class='td_13_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='12' class='td_14_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_14_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>$p[agama_pen]</span></p>
  </td>
  <td width='12' class='td_14_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='12' class='td_15_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_15_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>$p[status_pen]</span></p>
  </td>
  <td width='12' class='td_15_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='12' class='td_16_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_16_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='12' class='td_16_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='110' class='td_17_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='96' class='td_18_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_19_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='22' class='td_19_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_19_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='97' class='td_20_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='83' class='td_21_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
 </tr>";
 $no++;
	}
	if ($jmldatatr < $batas) {
	$jmltr = $batas-$jmldatatr;
	$jmltrmulai = $jmldatatr+1;
     for ($i=$jmltrmulai; $i<=$batas; $i++){
     
        	echo " <tr style='height:11.35pt'>
  <td width='24' class='td_no2_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='12' class='td_7_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td> 
  <td width='24' class='td_7_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='12' class='td_7_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'></span></p>
  </td>
  <td width='156' class='td_8_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='96' class='td_9_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='37' class='td_10_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='12' class='td_11_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_11_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='12' class='td_11_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='96' class='td_12_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='12' class='td_13_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_13_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='12' class='td_13_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='12' class='td_14_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_14_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='12' class='td_14_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='12' class='td_15_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_15_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='12' class='td_15_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='12' class='td_16_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_16_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='12' class='td_16_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='110' class='td_17_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='96' class='td_18_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_19_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='22' class='td_19_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_19_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='97' class='td_20_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='83' class='td_21_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
 </tr>";
    }	
	}
	
	}
	?>
</tbody></table>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:5.0pt'>&nbsp;</span></p>
<!--table 3  -->
<table class="MsoTableGrid" border="1" cellspacing="0" cellpadding="0" width="1176" style="width:882.0pt;margin-left:2.85pt;border-collapse:collapse;border:none">
 <tbody>
 <tr style="height:14.15pt">
  <td width="24" class="td_no3">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">No.</span></b></p>
  </td>
  <td width="96" colspan="4" class="td_hdk">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Status
  Hubungan<br>
  Dalam Keluarga</span></b></p>
  </td>
  <td width="72" colspan="3" class="td_kfm">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Kelainan
  Fisik<br>
  Mental</span></b></p>
  </td>
  <td width="72" colspan="3" class="td_pc">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Penyandang<br>
  Catat</span></b></p>
  </td>
  <td width="72" colspan="3" class="td_pt">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Pendidikan<br>
  Terakhir</span></b></p>
  </td>
  <td width="96" colspan="3" class="td_p">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Pekerjaan</span></b></p>
  </td>
  <td width="192" class="td_ni">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">NIK
  Ibu</span></b></p>
  </td>
  <td width="180" class="td_nli">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Nama
  Lengkap Ibu</span></b></p>
  </td>
  <td width="192" class="td_na">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">NIK
  Ayah</span></b></p>
  </td>
  <td width="180" class="td_nla">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:7.0pt">Nama
  Lengkap Ayah</span></b></p>
  </td>
 </tr>
 
 <tr style="height:5.75pt">
  <td width="24" class="td_1_3">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">&nbsp;</span></p>
  </td>
  <td width="96" colspan="4" class="td_22">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">22</span></p>
  </td>
  <td width="72" colspan="3" class="td_23">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">23</span></p>
  </td>
  <td width="72" colspan="3" valign="top" class="td_24">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">24</span></p>
  </td>
  <td width="72" colspan="3" valign="top" class="td_25">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">25</span></p>
  </td>
  <td width="96" colspan="3" valign="top" class="td_26">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">26</span></p>
  </td>
  <td width="192" valign="top" class="td_27">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">27</span></p>
  </td>
  <td width="180" valign="top" class="td_28">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">28</span></p>
  </td>
  <td width="192" valign="top" class="td_29">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">29</span></p>
  </td>
  <td width="180" valign="top" class="td_30">
  <p class="MsoNormal" align="center" style="margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:7.0pt">30</span></p>
  </td>
 </tr>
  <?php
			  if ($cekkk > 0){
$penduduk2=mysql_query("SELECT * FROM  penduduk, arsip_agama, arsip_alamat, arsip_kelamin,arsip_goldar, arsip_kewarganegaraan, arsip_pekerjaan, arsip_pendidikan, arsip_rt, arsip_rw, arsip_status, arsip_status_hdk
WHERE arsip_agama.id_agama=penduduk.agama_pen
AND arsip_alamat.id_alamat=penduduk.alamat_pen
AND arsip_kelamin.id_kelamin=penduduk.kelamin_pen
AND arsip_kewarganegaraan.id_kewarganegaraan=penduduk.kewarganegaraan_pen
AND arsip_pekerjaan.id_pekerjaan=penduduk.pekerjaan_pen
AND arsip_pendidikan.id_pendidikan=penduduk.pendidikan_pen
AND arsip_rt.id_rt=penduduk.rt_pen
AND arsip_rw.id_rw=penduduk.rw_pen
AND arsip_status.id_status=penduduk.status_pen
AND arsip_status_hdk.id_status_hdk=penduduk.status_hdk_pen
AND arsip_goldar.id_goldar=penduduk.goldar_pen 
AND penduduk.no_kk_pen='$_GET[no_kk]'  ORDER BY status_hdk_pen, DATE_FORMAT(tanggal_lahir_pen, '%Y-%m-%d') LIMIT  $posisi,$batas");
	$no=$posisi+1;
	while($p=mysql_fetch_array($penduduk2)){	
	
		if ($p['statusnya']!="4" AND $p['statusnya']!="0") {
			echo "<tr style='height:11.35pt; display:none;'>";
		}
		else {
			echo "<tr style='height:11.35pt;'>";}
	echo "
  <td width='24' class='td_no3_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>$no</span></p>
  </td>
  <td width='23' class='td_22_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='25' class='td_22_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>0</span></p>
  </td>
  <td width='24' class='td_22_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>$p[status_hdk_pen]</span></p>
  </td>
  <td width='24' class='td_22_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_23_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_23_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_23_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_24_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_24_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_24_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_25_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_25_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>$p[pendidikan_pen]</span></p>
  </td>
  <td width='24' class='td_25_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_26_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_26_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>$p[pekerjaan_pen]</span></p>
  </td>
  <td width='24' class='td_26_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='192' class='td_27_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='180' class='td_28_isi'>
  <p class='MsoNormal' style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'>$p[ibu_pen]</span></p>
  </td>
  <td width='192' class='td_29_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='180' class='td_30_isi'>
  <p class='MsoNormal' style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'>$p[ayah_pen]</span></p>
 </tr>";
 $no++;
	}
	if ($jmldatatr < $batas) {
	$jmltr = $batas-$jmldatatr;
	$jmltrmulai = $jmldatatr+1;
     for ($i=$jmltrmulai; $i<=$batas; $i++){
     
        echo " <tr style='height:11.35pt'>
  <td width='24' class='td_no3_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'></span></p>
  </td>
  <td width='23' class='td_22_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='25' class='td_22_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_22_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_22_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_23_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_23_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_23_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_24_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_24_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_24_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_25_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_25_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_25_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_26_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_26_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='24' class='td_26_side'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='192' class='td_27_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='180' class='td_28_isi'>
  <p class='MsoNormal' style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='192' class='td_29_isi'>
  <p class='MsoNormal' align='center' style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width='180' class='td_30_isi'>
  <p class='MsoNormal' style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
 </tr>";
    }	
	}
	}
	?>
</tbody></table>

<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:1.0pt'>&nbsp;</span></p>
<!--table 4  -->
<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0 align=left
 width=1190 style='width:892.8pt;border-collapse:collapse;border:none;
 margin-left:6.75pt;margin-right:6.75pt'>
 <tr style='height:11.35pt'>
  <td width=96 style='width:72.0pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'>Nama Ketua RT</span></p>
  </td>
  <td width=24 style='width:18.0pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>:</span></p>
  </td>
  <td width=390 style='width:292.75pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'><?php echo $nama_rt; ?></span></p>
  </td>
  <td width=236 style='width:177.2pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>Petugas
  Registrasi</span></p>
  </td>
  <td width=227 style='width:6.0cm;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>Mengetahui,</span></p>
  </td>
  <td width=217 style='width:162.75pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>Bogor, 
  <?php   if(isset($_GET[tglbuat])){
  echo $_GET['tglbuat'];
  }
  else {
  echo date('d-m-Y');
  }
  ?></span></p>
  </td>
 </tr>
 <tr style='height:11.35pt'>
  <td width=96 style='width:72.0pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'>Nama Ketua RW</span></p>
  </td>
  <td width=24 style='width:18.0pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>:</span></p>
  </td>
  <td width=390 style='width:292.75pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'><?php echo $k[nama_ketua_rw]; ?></span></p>
  </td>
  <td width=236 style='width:177.2pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>Desa
  <?php echo $k['desa']; ?></span></p>
  </td>
  <td width=227 style='width:6.0cm;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>Lurah/Kepala
  Desa <?php echo $k['desa']; ?></span></p>
  </td>
  <td width=217 style='width:162.75pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>Kepala
  Keluarga</span></p>
  </td>
 </tr>
 <tr style='height:11.35pt'>
  <td width=96 style='width:72.0pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=390 style='width:292.75pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=236 style='width:177.2pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=227 style='width:6.0cm;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=217 style='width:162.75pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:11.35pt'>
  <td width=96 style='width:72.0pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=24 style='width:18.0pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=390 style='width:292.75pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=236 style='width:177.2pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=227 style='width:6.0cm;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=217 style='width:162.75pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:11.35pt'>
  <td width=96 style='width:72.0pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'>PERNYATAAN</span></p>
  </td>
  <td width=24 style='width:18.0pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=390 style='width:292.75pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=236 style='width:177.2pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>(..................................................)</span></p>
  </td>
  <td width=227 style='width:6.0cm;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>(................................................)</span></p>
  </td>
  <td width=217 style='width:162.75pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'><u>( <?php echo $namakk; ?> )</u></span></p>
  </td>
 </tr>
 <tr style='height:11.35pt'>
  <td width=747 colspan=4 style='width:559.95pt;padding:0cm 0cm 0cm 0cm;
  height:11.35pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'>Demikian formulir ini saya/kami isi
  dengan sesungguhnya apabila keterangan tersebut tidak sesuai dengan keadaan
  sebenarnya.</span></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt'>saya bersedia dikenakan sanksi sesuai
  ketentuan peraturan perundang-undangan yang berlaku.</span></p>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:7.0pt;display:none;'>Catatan : *) Hanya diisi oleh salah
  satu pasangan keluara tersebut (suami/isteri)</span></p>
  </td>
  <td width=227 style='width:6.0cm;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
  <td width=217 style='width:162.75pt;padding:0cm 0cm 0cm 0cm;height:11.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:7.0pt'>&nbsp;</span></p>
  </td>
 </tr>
</table>


</div>

</body>

</html>
<?php

				$fp = fopen($cachefile, 'w');
				fwrite($fp, ob_get_contents());
				fclose($fp);
				ob_end_flush();
}
else {header('location:404.php');}
}
}
?>