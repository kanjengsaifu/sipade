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
include "fungsi/class_paging.php";
include "fungsi/fungsi_indotgl.php";
include "fungsi/library.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>SI PA'DE | Sistem Informasi Pelayanan Desa</title>
	<link rel="shortcut icon" href="images/favicon.gif">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">  
	<link type="text/css" href="rakstrap/css/style.css" rel="stylesheet">    
  <link href="rakstrap/css/loadingindicator.css" rel="stylesheet">
</head>

<body class="pace-done">
<?php include "inc/ui_top_panel.php"; ?>

<div class="container clearfix">

     <div class="content clearfix" id="loadnik">
        
			<?php 
	 echo "<div class='searchtool'>";
					if($_GET['query']!==''){$QUERY="!".urlencode($_GET[query]);}	
					else {$QUERY="!";} 
	
//mendeteksi filter statusnya
if(isset($_GET[filterstatusnya])) {$Fst = $_GET[filterstatusnya];}
else {$Fst="0";}	
//mendeteksi filter hdk
if(isset($_GET[filterhdk])) {$Fhdk = $_GET[filterhdk];}
else {$Fhdk="0";}	
//mendeteksi filter rt dan rw
if(isset($_GET[filterrw])) {$Frw = $_GET[filterrw];}
else {$Frw="0";}	
if(isset($_GET[filterrt])) {$Frt = $_GET[filterrt];}
else {$Frt="0";}	
$Fall = "!st".$Fst."!hdk".$Fhdk."!rw".$Frw."!rt".$Frt;
				
//mendeteksi tampilan
if($_GET[tampilan]=='1') {$T = "phlist";}
else {$T="ph";}
//mendeteksi penyortiran
if(isset($_GET[jph])) {$JPH = "-".$_GET[jph]."$T@";}
else {$JPH="-20$T@";}

//mendeteksi tampilan
if($_GET[tampilan]=='1') {$Tk = "ph";}
else {$Tk="phlist";}
//mendeteksi penyortiran
if(isset($_GET[jph])) {$JPHK = "-".$_GET[jph]."$Tk@";}
else {$JPHK="-20$Tk@";}
					echo "<div class='btn-group' style='float:left; position:relative; margin-right:5px; width:355px;'>
  <button type='button' class='btn btn-shadow btn-default'><span class='glyphicon glyphicon-sort'></span></button>
 <button class='btn btn-shadow btn-default"; if(!isset($_GET['by']) | $_GET['by']=='0'){echo " active";} echo "' onclick=\"location.href='data".$Fall.$JPH."1@0".$QUERY."'\">Id</button>

  <div class='btn-group'>
    <button type='button' class='btn btn-shadow btn-default dropdown-toggle "; 	if($_GET['by']=='3' | $_GET['by']=='4'){echo "active";} echo "' data-toggle='dropdown'>
      Nama
      <span class='caret'></span>
    </button>
    <ul class='dropdown-menu'>
      <li class='"; 	if($_GET['by']=='3'){echo "disabled";} echo "'><a href='data".$Fall.$JPH."1@3".$QUERY."'>A &raquo; Z</a></li>
      <li class='"; 	if($_GET['by']=='4'){echo "disabled";} echo "'><a href='data".$Fall.$JPH."1@4".$QUERY."'>Z &raquo; A</a></li>
    </ul>
  </div>
  <div class='btn-group'>
    <button type='button' class='btn btn-shadow btn-default dropdown-toggle "; 	if($_GET['by']=='1' | $_GET['by']=='2'){echo "active";} echo "' data-toggle='dropdown'>
      Jeka  <span class='caret'></span>
    </button>
    <ul class='dropdown-menu'>
      <li class='"; 	if($_GET['by']=='1'){echo "disabled";} echo "''><a href='data".$Fall.$JPH."1@1".$QUERY."'>L &raquo; P</a></li>
      <li class='"; 	if($_GET['by']=='2'){echo "disabled";} echo "''><a href='data".$Fall.$JPH."1@2".$QUERY."'>P &raquo; L</a></li>
    </ul>
  </div>
  <div class='btn-group'>
    <button type='button' class='btn btn-shadow btn-default dropdown-toggle "; 	if($_GET['by']=='5' | $_GET['by']=='6'){echo "active";} echo "' data-toggle='dropdown'>
      Lahir  <span class='caret'></span>
    </button>
    <ul class='dropdown-menu'>
      <li class='"; 	if($_GET['by']=='5'){echo "disabled";} echo "''><a href='data".$Fall.$JPH."1@5".$QUERY."'> "; echo date("Y"); echo " &raquo; lampau </a></li>
      <li class='"; 	if($_GET['by']=='6'){echo "disabled";} echo "''><a href='data".$Fall.$JPH."1@6".$QUERY."'> Lampau &raquo; "; echo date("Y"); echo "</a></li>
    </ul>
  </div>
  <div class='btn-group'>
    <button type='button' class='btn btn-shadow btn-default dropdown-toggle "; 	if($_GET['by']=='7' | $_GET['by']=='8' | $_GET['by']=='9' | $_GET['by']=='10' | $_GET['by']=='11' | $_GET['by']=='12' | $_GET['by']=='13' | $_GET['by']=='14' | $_GET['by']=='15' | $_GET['by']=='16'){echo "active";} echo "' data-toggle='dropdown'>
      Status  <span class='caret'></span>
    </button>
    <ul class='dropdown-menu'>
      <li class='"; 	if($_GET['by']=='7'){echo "disabled";} echo "'><a href='data".$Fall.$JPH."1@7".$QUERY."'>Kep. Keluarga &raquo; ...</a></li>
      <li class='"; 	if($_GET['by']=='8'){echo "disabled";} echo "'><a href='data".$Fall.$JPH."1@8".$QUERY."'>Isteri &raquo; ...</a></li>
      <li class='"; 	if($_GET['by']=='9'){echo "disabled";} echo "'><a href='data".$Fall.$JPH."1@9".$QUERY."'>Anak &raquo; ...</a></li>
      <li class='"; 	if($_GET['by']=='10'){echo "disabled";} echo "'><a href='data".$Fall.$JPH."1@10".$QUERY."'>Menantu &raquo; ...</a></li>
      <li class='"; 	if($_GET['by']=='11'){echo "disabled";} echo "'><a href='data".$Fall.$JPH."1@11".$QUERY."'>Cucu &raquo; ...</a></li>
      <li class='"; 	if($_GET['by']=='12'){echo "disabled";} echo "'><a href='data".$Fall.$JPH."1@12".$QUERY."'>Orang Tua &raquo; ...</a></li>
      <li class='"; 	if($_GET['by']=='13'){echo "disabled";} echo "'><a href='data".$Fall.$JPH."1@13".$QUERY."'>Mertua &raquo; ...</a></li>
      <li class='"; 	if($_GET['by']=='14'){echo "disabled";} echo "'><a href='data".$Fall.$JPH."1@14".$QUERY."'>Famili Lain &raquo; ...</a></li>
      <li class='"; 	if($_GET['by']=='15'){echo "disabled";} echo "'><a href='data".$Fall.$JPH."1@15".$QUERY."'>Pembantu &raquo; ...</a></li>
      <li class='"; 	if($_GET['by']=='16'){echo "disabled";} echo "'><a href='data".$Fall.$JPH."1@16".$QUERY."'>Lainnya &raquo; ...</a></li>
    </ul>
  </div>
  <div class='btn-group'>
    <button type='button' class='btn btn-shadow btn-default dropdown-toggle "; 	if($_GET['by']=='17' | $_GET['by']=='18' | $_GET['by']=='19' | $_GET['by']=='20'){echo "active";} echo "' data-toggle='dropdown'>
      Alamat
      <span class='caret'></span>
    </button>
    <ul class='dropdown-menu'>
      <li class='"; 	if($_GET['by']=='17'){echo "disabled";} echo "'><a href='data".$Fall.$JPH."1@17".$QUERY."'>RT.1 &raquo; 9 - RW. 9 &raquo 1</a></li>
      <li class='"; 	if($_GET['by']=='18'){echo "disabled";} echo "'><a href='data".$Fall.$JPH."1@18".$QUERY."'>RT.1 &raquo; 9 - RW. 1 &raquo 9</a></li> 
      <li class='"; 	if($_GET['by']=='19'){echo "disabled";} echo "'><a href='data".$Fall.$JPH."1@19".$QUERY."'>RT.9 &raquo; 1 - RW. 1 &raquo 9</a></li>  
    </ul>
  </div>
</div>";
					echo "
 <div class='btn-group' style='float:left; position:relative; margin-right:5px; width:200px;'>
  <button type='button' class='btn btn-shadow btn-default' onclick=\"location.href='data!sta!hdk0!rw0!rt0".$JPH."1@0".$QUERY."'\"><span class='glyphicon glyphicon-filter'></span></button>
  <div class='btn-group'>
    <button type='button' class='btn btn-shadow btn-default dropdown-toggle "; 	if(isset($_GET['by'])){if($_GET['filterrw']=='0'){} else {echo "active";}} echo "' data-toggle='dropdown'>
      ALMT 
      <span class='caret'></span>
    </button>
    <ul class='dropdown-menu'>";
	echo "<li class='filter"; if($_GET['filterrw']=='0'){echo " disabled";} echo "'><a href='data!st".$Fst."!hdk".$Fhdk."!rw0!rt0".$JPH."1@0".$QUERY."'>Tak Teratur</a>";

$ar_rw=mysql_query("SELECT * FROM  arsip_rw ");

while($rw = mysql_fetch_array($ar_rw)){
echo "<li class='filter"; if($_GET['filterrw']==$rw[id_rw]){echo " disabled";} echo "'><a href='data!st".$Fst."!hdk".$Fhdk."!rw".$rw[id_rw]."!rt0".$JPH."1@0".$QUERY."'>RW. $rw[rw]</a>";
echo "<ul>";
$ar_rt=mysql_query("SELECT * FROM  arsip_rt WHERE id_rw='$rw[id_rw]' ");
$nort=1; 
while($rt = mysql_fetch_array($ar_rt)){
echo "<li"; if($_GET['filterrw']==$rw[id_rw]){if($_GET['filterrt']==$nort){echo " class=disabled";}} echo "><a href='data!sta!hdk".$Fhdk."!rw".$rw[id_rw]."!rt".$nort.$JPH."1@0".$QUERY."'>RT. $rt[rt] / $rw[rw]</a></li>";
	   
	  $nort++; 
	  }
	  echo "</ul></li>";
	  }
	  echo "
    </ul>
  </div> 
	 <div class='btn-group'>
    <button type='button' class='btn btn-shadow btn-default dropdown-toggle "; 	if(isset($_GET['by'])){if($_GET['filterhdk']=='0'){} else {echo "active";}} echo "' data-toggle='dropdown'>
      HDK <span class='caret'></span>
    </button>
    <ul class='dropdown-menu'>";
	echo "<li class='filter"; if($_GET['filterhdk']=='0'){echo " disabled";} echo "'><a href='data!st".$Fst."!hdk0!rw".$Frw."!rt".$Frt.$JPH."1@0".$QUERY."'>Tak Teratur</a></li>";
	 
$ar_hdk=mysql_query("SELECT * FROM  arsip_status_hdk ");
$nohdk=1;
while($hdk = mysql_fetch_array($ar_hdk)){
echo "<li class='filter"; if($_GET['filterhdk']==$hdk[id_status_hdk]){echo " disabled";} echo "'><a href='data!st".$Fst."!hdk".$nohdk."!rw".$Frw."!rt".$Frt.$JPH."1@0".$QUERY."'>$hdk[status_hdk]</a></li>";
	  $nohdk++;
	  }
	  echo "
    </ul>
  </div> 
  <div class='btn-group'>
    <button type='button' class='btn btn-shadow btn-default dropdown-toggle "; 	if(isset($_GET['by'])){if($_GET['filterstatusnya']=='a' | !isset($_GET['filterstatusnya'])){} else {echo "active";}} echo "' data-toggle='dropdown'>
      DATA <span class='caret'></span>
    </button>
    <ul class='dropdown-menu'>";
	echo "<li class='filter"; if($_GET['filterstatusnya']=='a' | !isset($_GET['filterstatusnya'])){echo " disabled";} echo "'><a href='data!sta!hdk".$Fhdk."!rw".$Frw."!rt".$Frt.$JPH."1@0".$QUERY."'>Tak Teratur</a></li>";
	 
$ar_statusnya=mysql_query("SELECT  DISTINCT statusnya FROM  penduduk ORDER BY statusnya");
$nostatusnya=1;
while($statusnya = mysql_fetch_array($ar_statusnya)){
	if($statusnya[statusnya]=='0') {
		$titlestatusnya = "Masih Menjadi Penduduk";
	}
	if($statusnya[statusnya]=='2') {
		$titlestatusnya = "Sudah Bukan Penduduk";
	}
	if($statusnya[statusnya]=='3') {
		$titlestatusnya = "Sudah Meninggal";
	}
	if($statusnya[statusnya]=='4') {
		$titlestatusnya = "NIK Sementara";
	}
echo "<li class='filter"; if($_GET['filterstatusnya']==$statusnya[statusnya]){echo " disabled";} echo "'><a href='data!st".$statusnya[statusnya]."!hdk".$Fhdk."!rw".$Frw."!rt".$Frt.$JPH."1@0".$QUERY."'>$titlestatusnya</a></li>";
	  $nostatusnya++;
	  }
	  echo "
    </ul>
  </div> 
</div>

  <div class='btn-group' style='float:left; position:relative; margin-right:5px; width:190px;'>
        <button type='button' class='btn btn-shadow btn-default"; 	if($_GET['tampilan']=='1'){echo " active";} echo "' onclick=\"location.href='data".$Fall.$JPHK."";if(!isset($_GET['hal']) | $_GET['hal']==''){echo "1";}else {echo $_GET['hal'];}echo "@0".$QUERY."'\"><span class='glyphicon glyphicon-list-alt'></span> Daftar</button>";
		if($_GET['tampilan']=='1'){
		echo "
  <div class='btn-group'>
    <button data-toggle='dropdown' class='btn btn-shadow btn-default dropdown-toggle' type='button'>
      <span class='caret'></span>
      <span class='glyphicon glyphicon-print'></span>
      <span class='caret'></span>
    </button>
    <ul class='dropdown-menu'>
      <li class=''><a href='#' onclick=\"tableToExcel('listPEN', 'SI PA\'DE - Data Penduduk')\">.xls</a></li>
      
    </ul>
  </div> ";
  }
  else {
	  echo "  
		<button type='button' class='btn btn-shadow btn-default'><span class='glyphicon glyphicon-chevron-left'></span>=<span class='glyphicon glyphicon-chevron-right'></span></button>";
  }
  echo "
        <button type='button' class='btn btn-shadow btn-default"; 	if($_GET['tampilan']!=='1'){echo " active";} echo "' onclick=\"location.href='data".$Fall.$JPHK."";if(!isset($_GET['hal']) | $_GET['hal']==''){echo "1";}else {echo $_GET['hal'];}echo "@0".$QUERY."'\"><span class='glyphicon glyphicon-th-large'></span> Kotak</button> 
  </div>
  
  <div class='btn-group' style='float:right; width:95px; position:relative; margin-right:0;'>
  
    <div class='input-group'>
      <input type='number' id='jmljph' min='1' class='form-control noborder-bottom' style='width:70px; padding:6px 10px' value='"; if(!isset($_GET['jph']) | $_GET['jph']=='20'){echo "20";} else {echo $_GET['jph'];} echo "'>  
  
      <span class='input-group-btn'>
        <button class='btn btn-shadow btn-default' id='getjmljph' type='button' onclick=\"\"><span class='glyphicon glyphicon-zoom-in'></span></button> 
      </span>
    </div> 
    </div>
	</div>
	<div class='clearfix'></div>
<hr/>
"; 
 
		// menghilangkan spasi di kiri dan kanannya
  $kata = $_GET['query']; 

  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata = explode(",",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;
 
  $p      = new Listpen; 
  if(!isset($_GET['jph'])) {$batas  = 20;}
  else {$batas = $_GET['jph'];}
  $posisi = $p->cariPosisi($batas);
  
  
if (($_GET['filterrw'] == '0') | !isset($_GET['filterrw'])){


if ($_GET['filterhdk'] != '0'){ 
$hdkquery = "status_hdk_pen='$_GET[filterhdk]' AND ";
}
if ($_GET['filterstatusnya'] != 'a'){ 
$stquery = "statusnya='$_GET[filterstatusnya]' AND ";
}
$queryfilter = $hdkquery.$stquery;
 
  $cari = "SELECT * FROM penduduk WHERE ".$queryfilter; 
    for ($i=0; $i<=$jml_kata; $i++){
	      $cari .= "nama_pen LIKE '%$pisah_kata[$i]%' ";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    }
}
	 
	
else {

if ($_GET['filterrw'] != '0'){ 
$rwquery = "rw_pen='$_GET[filterrw]' AND ";
}
if ($_GET['filterrt'] != '0'){ 
$rtquery = "rt_pen='$_GET[filterrt]' AND ";
}
if ($_GET['filterhdk'] != '0'){ 
$hdkquery = "status_hdk_pen='$_GET[filterhdk]' AND ";
}
if ($_GET['filterstatusnya'] != 'a'){ 
$stquery = "statusnya='$_GET[filterstatusnya]' AND ";
}
$queryfilter = $rwquery.$rtquery.$hdkquery.$stquery;


  $cari = "SELECT * FROM penduduk WHERE ".$queryfilter; 
    for ($i=0; $i<=$jml_kata; $i++){
	      $cari .= "nama_pen LIKE '%$pisah_kata[$i]%' ";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    } 
	}
	
  $hasildata  = mysql_query($cari);
  $jmldata = mysql_num_rows($hasildata);
  

if ($_GET['by'] == '1'){ 
  $cari .= " ORDER BY kelamin_pen LIMIT $posisi,$batas";} 
elseif ($_GET['by'] == '2'){ 
  $cari .= " ORDER BY kelamin_pen DESC LIMIT $posisi,$batas";} 
elseif ($_GET['by'] == '3'){ 
  $cari .= " ORDER BY nama_pen LIMIT $posisi,$batas";} 
elseif ($_GET['by'] == '4'){ 
  $cari .= " ORDER BY nama_pen DESC LIMIT $posisi,$batas";}   
elseif ($_GET['by'] == '5'){ 
  $cari .= " ORDER BY DATE_FORMAT(tanggal_lahir_pen, '%Y-%m-%d') DESC LIMIT $posisi,$batas";} 
elseif ($_GET['by'] == '6'){ 
  $cari .= " ORDER BY DATE_FORMAT(tanggal_lahir_pen, '%Y-%m-%d') LIMIT $posisi,$batas";} 
elseif ($_GET['by'] == '7'){ 
  $cari .= " ORDER BY status_hdk_pen  LIMIT $posisi,$batas";} 
elseif ($_GET['by'] == '8'){ 
  $cari .= " ORDER BY status_hdk_pen < 3, status_hdk_pen LIMIT $posisi,$batas";} 
elseif ($_GET['by'] == '9'){ 
  $cari .= " ORDER BY status_hdk_pen < 4, status_hdk_pen LIMIT $posisi,$batas";} 
elseif ($_GET['by'] == '10'){ 
  $cari .= " ORDER BY status_hdk_pen < 5, status_hdk_pen LIMIT $posisi,$batas";} 
elseif ($_GET['by'] == '11'){ 
  $cari .= " ORDER BY status_hdk_pen < 6, status_hdk_pen LIMIT $posisi,$batas";} 
elseif ($_GET['by'] == '12'){ 
  $cari .= " ORDER BY status_hdk_pen < 7, status_hdk_pen LIMIT $posisi,$batas";} 
elseif ($_GET['by'] == '13'){ 
  $cari .= " ORDER BY status_hdk_pen < 8, status_hdk_pen LIMIT $posisi,$batas";} 
elseif ($_GET['by'] == '14'){ 
  $cari .= " ORDER BY status_hdk_pen < 9, status_hdk_pen LIMIT $posisi,$batas";} 
elseif ($_GET['by'] == '15'){ 
  $cari .= " ORDER BY status_hdk_pen < 10, status_hdk_pen LIMIT $posisi,$batas";} 
elseif ($_GET['by'] == '16'){ 
  $cari .= " ORDER BY status_hdk_pen < 11, status_hdk_pen LIMIT $posisi,$batas";}   
elseif ($_GET['by'] == '17'){  // rt 1 ke 2 - rw 2 ke 1
  $cari .= " ORDER BY rt_pen > 0, rw_pen DESC LIMIT $posisi,$batas";} 
elseif ($_GET['by'] == '18'){  // rt 1 ke 2 - rw 1 ke 2
  $cari .= " ORDER BY rt_pen > 0, rw_pen LIMIT $posisi,$batas";}    
elseif ($_GET['by'] == '19'){  // rt 2 ke 1 - rw 1 ke 2
  $cari .= " ORDER BY rt_pen DESC, rw_pen LIMIT $posisi,$batas";}        
  else { $cari .= " ORDER BY no_kk_pen > 1, id_pen DESC LIMIT $posisi,$batas";} 
  $hasil  = mysql_query($cari);
  $ketemu = mysql_num_rows($hasil);  
   
  echo "<div class='clearfix' style='color:#999; padding:0 10px 0 0; font-size:10px;'>$ketemu data berhasil dimuat";
  if($_GET['query']==null){echo " dari $jmldata data";
  } 
  else {
  echo " dari $jmldata data dengan kata kunci \"<i>$kata</i>\" "; }
  echo " <hr/></div>";
  if ($ketemu!=''){
	   if ($_GET['tampilan']=='1'){
		 echo "<table width='100%' border='0' class='list' id='listPEN'>
       <thead class='part2'>
            <tr>
              <td>No.</td>
              <td>Nomor KK</td>
              <td>Nomor Induk Penduduk</td>
              <td>Nama</td>
              <td>Kota Lahir</td>
              <td>Tanggal Lahir</td>
              <td>JK</td>
              <td>Agama</td>
              <td>Alamat</td>
              <td>Rt</td>
              <td>Rw</td>
            </tr>
          </thead> 
         <tbody><tr class='subtitle'>
           <td>[1]</td>
           <td>[2]</td>
           <td>[3]</td>
           <td>[4]</td>
           <td>[5]</td>
           <td>[6]</td>
           <td>[7]</td>
           <td>[8]</td>
           <td>[9]</td>
           <td>[10]</td>
           <td>[11]</td>
         </tr>";
		 $nolist=$posisi+1;
	while($r=mysql_fetch_array($hasil)){
		$tgllahir = tgl_indo2($r['tanggal_lahir_pen']);
$kk=mysql_fetch_array(mysql_query("SELECT * FROM  kk WHERE no_kk='$r[no_kk_pen]'"));
$a=mysql_fetch_array(mysql_query("SELECT * FROM  arsip_alamat WHERE id_alamat='$kk[alamat]'"));
	
		if ($r['statusnya']=="3") {
		echo "<tr class='sts2_kuning' title='Info : Sudah Wafat'>";
		}
		elseif ($r['statusnya']=="4") {
		echo "<tr class='sts2_biru' title='Info : NIK Sementara'>";
		}
		elseif ($r['statusnya']=="2") {
		echo "<tr class='sts2_hijau' title='Info : Sudah Pindah'>";
		}
		else {
		echo "<tr class='sts2_std'>";
		}
		echo "
           <td class='nomor'>
		 $nolist</td>
           <td><a href='$r[no_kk_pen]'>$r[no_kk_pen]&nbsp;</a></td>
           <td>$r[no_pen]&nbsp;</td>
           <td><a data-load='modal_ktp.php?id=$r[no_pen]&mode=2' data-toggle='modal' data-target='#myModal'>$r[nama_pen]</a></td>
           <td>$r[tempat_lahir_pen]</td>
           <td>$tgllahir</td>
           <td>";
		   if ($r['kelamin_pen']=='1'){ echo "Laki-laki";}
		   else {echo "Perempuan";}
		   echo "
		   </td>
           <td>Islam</td>
           <td>$a[alamat]</td>
           <td>0$kk[rt]</td>
           <td>0$kk[rw]</td>
         </tr>"; 
		 $nolist++;
	}
		 echo "</tbody></table>";
	   }
	   else {
	while($r=mysql_fetch_array($hasil)){
		$tgllahir = tgl_indo2($r['tanggal_lahir_pen']);
$kk=mysql_fetch_array(mysql_query("SELECT * FROM  kk WHERE no_kk='$r[no_kk_pen]'"));
		if ($r['statusnya']=="4") {
	  echo "<div class='datalist'><span class='statusnya sts_biru' title='Biru : NIK Sementara'>?</span>";
	  }	
	  elseif ($r['statusnya']=="3") {
	  echo "<div class='datalist'><span class='statusnya sts_kuning' title='Kuning : Sudah Wafat'>?</span>";
	  }
		elseif ($r['statusnya']=="2") {
	  echo "<div class='datalist'><span class='statusnya sts_hijau' title='Hijau : Sudah Pindah'>?</span>";
	  } 
	  else {
	  echo "<div class='datalist'>";
	  }
	  echo "<table width='100%' border='0'>
  <tr>
    <td colspan='4'><h3 class='nama'><b><a data-load='modal_ktp.php?id=$r[no_pen]' data-toggle='modal' data-target='#myModal'>$r[nama_pen]</a></b></h3></td>
    </tr>
  <tr>
    <td colspan='4'><b>NIK : $r[no_pen]</b></td>
    </tr>
  <tr>
    <td colspan='4'>$r[tempat_lahir_pen], $tgllahir</td>
    </tr>
  <tr>
    <td width='53%' colspan='4'>RT. $kk[rt] / RW. $kk[rw]</td>
  </tr>
  </table>
  <div class='action'><a href='$r[no_kk_pen]' title='Lihat KK Bersangkutan'>Lihat KK</a> | <a href='arsip?submit=Saring&no_pen=$r[no_pen]' title='Lihat Arsip Pelayanan a/n $r[nama_pen]'>Riwayat</a></div></div>";
		
	   }
	   }
  
  
  }
  else {echo "<div class='alert alert-danger' style='text-align:center;'>!! Tidak dapat menemukan data <b>$kata</b> </div>";}
   
	$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  	$linkHalaman = $p->navHalaman($_GET[hal], $jmlhalaman);
	  echo "<div class='clear clearfix'></div><hr/>
	  <div class='searchtool'>
       <div class='center clearfix'><ul class='pagination'>$linkHalaman </ul>
	   
	   
  <div class='btn-group' style='float:right; position:relative; margin:20px 0 0 0;'>
  
    <div class='input-group' style='width:160px'> Ke Hal. :
      <input type='number' min='1' max='$jmlhalaman'  id='loncathal' class='form-control  noborder-bottom' style='width:70px; float:right; padding:6px 10px;' value='$_GET[hal]'>
      <span class='input-group-btn'>
        <button class='btn btn-shadow btn-default' id='getloncathal' type='button'><span class='glyphicon glyphicon-share-alt'></span></button> 
      </span>
    </div> 
    </div></div></div>
     </div> ";
       ?>
     </div> </div> 

<div class="footer clearfix"><div style="float:left; width:300px; text-align:left;">SI PA'DE v.2.0 &nbsp;&nbsp;&nbsp;&nbsp; | Use updated Internet browser for best performer</div><div style="float:right; width:300px; text-align:right;">© 2014 Ade A S | RakIT Solution <br></div></div>
<br/>


<!-- Modal -->
<?php include "inc/ui_modal.php"; ?>
	
	
<script src="rakstrap/jquery-1.10.2.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script> 
<script src="rakstrap/js/pace.min.js"></script>

<script type="text/javascript" src="rakstrap/js/date_time.js"></script>
<script type="text/javascript">window.onload = date_time('date_time');</script>

<script type="text/javascript">   
$('body').tooltip({
    selector: '[data-toggle=tooltip]'
}); 
$.fn.extend({
    popoverClosable: function (options) {
        var defaults = {
            template:
                '<div class="popover">\
<div class="arrow"></div>\
<div class="popover-header">\
<button type="button" class="close" data-dismiss="popover" aria-hidden="true">&times;</button>\
<h3 class="popover-title"></h3>\
</div>\
<div class="popover-content"></div>\
</div>'
        };
        options = $.extend({}, defaults, options);
        var $popover_togglers = this;
        $popover_togglers.popover(options);
        $popover_togglers.on('click', function (e) {
            e.preventDefault();
            $popover_togglers.not(this).popover('hide');
        });
        $('html').on('click', '[data-dismiss="popover"]', function (e) {
            $popover_togglers.popover('hide');
        });
    }
});

$(function () {
    $('[data-toggle="popover"]').popoverClosable();
}); 
//menampilkan modal  
$('#myModal').on('show.bs.modal', function (e) {
  });
	  
$('#myModal').on('hidden.bs.modal', function (e) {
   $(this).removeData('bs.modal');
   $("#myModal .modal-content").html("<div class='modal-header'>"
+ "<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>"
+ "<h4 class='modal-title' id='myModalLabel'>SEDANG MEMUAT...</h4>"
+ "</div>" 
+ "<div class='modal-body'>"
+ "<div class='progress progress-striped active'>"
+ "<div class='progress-bar'  role='progressbar' aria-valuenow='45' aria-valuemin='0' aria-valuemax='100' style='width: 100%'></div></div></div>");
   
}); 

</script>

<script type='text/javascript'>//<![CDATA[ 

var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
//]]>  

</script>
    <script type="text/javascript">
	    $(document).ready(function() {
        // if text input field value is not empty show the "X" button
        $(".field").keyup(function() {
            $(".x").fadeIn();
            if ($.trim($(".field").val()) == "") {
                $(".x").fadeOut();
            }
        });
        // on click of "X", delete input field value and hide "X"
        $(".x").click(function() {
            $(".field").val("");
            $(this).hide();
        });
    });
$(document).ready(function(){ 	
 $("#getjmljph").click(function(){

       var $val = $("#jmljph").val();
           location.href="<?php echo"data".$Fall; echo "-"; ?>" + $val + "<?php echo"$T@1@";if(!isset($_GET['by']) | $_GET['by']=='0'){echo "0";} else {echo $_GET['by'];} echo $QUERY; ?>";

    });
 $("#getloncathal").click(function(){

       var $valhal = $("#loncathal").val(); 
           location.href="<?php echo"data".$Fall; echo "-"; if(!isset($_GET['jph']) | $_GET['jph']=='0'){echo "20";} else {echo $_GET['jph'];} echo "$T@";?>" + $valhal + "@<?php if(!isset($_GET['by']) | $_GET['by']=='0'){echo "0";} else {echo $_GET['by'];} echo $QUERY; ?>";

    });

});
</script>
   <script type="text/javascript">
$(document).ready(function(){  
    $('.lembar2').hide(); 
   $('.trigger').click(function() {
	this.checked = true;
    $('.lembar2').hide();   
	$('.btn').removeClass('active');
    $('#' + $(this).data('rel')).addClass('active');
    $('.' + $(this).data('rel')).show('');
    $('.surat_' + $(this).data('rel')).show('');
});
   
});
</script>
</body></html> 
  <?php
}
}
?>