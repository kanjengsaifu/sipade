<?php
include "../fungsi/fungsi_anti_injection.php";
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
echo "Anda Harus Login";
}
else{
if ($_GET["act"]=="usia"){
 
  $fields = array('tgllahir', 'tglakhir');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) { 
    $error = true; //Yup there are errors
  }
  
}

if(!$error) { //Only create queries when no error occurs
  //Create queries....
  
function umur($tgl_lahir,$tgl_wafat){
    $tgl=explode("-",$tgl_lahir);
    $tglw=explode("-",$tgl_wafat);
    $cek_jmlhr1=cal_days_in_month(CAL_GREGORIAN,$tgl['1'],$tgl['2']);
    $cek_jmlhr2=cal_days_in_month(CAL_GREGORIAN,$tglw['1'],$tglw['2']);
    $sshari=$cek_jmlhr1-$tgl['0'];
    $ssbln=12-$tgl['1']-1;
    $hari=0;
    $bulan=0;
    $tahun=0;
//hari+bulan
    if($sshari+$tglw['0']>=$cek_jmlhr2){
        $bulan=1;
        $hari=$sshari+$tglw['0']-$cek_jmlhr2;
    }else{
        $hari=$sshari+$tglw['0'];
    }
    if($ssbln+$tglw['1']+$bulan>=12){
        $bulan=($ssbln+$tglw['1']+$bulan)-12;
        $tahun=$tglw['2']-$tgl['2'];
    }else{
        $bulan=($ssbln+$tglw['1']+$bulan);
        $tahun=($tglw['2']-$tgl['2'])-1;
    }

      $selisih=$tahun." Thn ".$bulan." Bln ".$hari." hr";

      $selisih2=$tahun." Thn ";
    return $selisih;
}

$tgllahir = $_POST["tgllahir"];
$tglakhir = $_POST["tglakhir"];
echo umur("$tgllahir","$tglakhir");
}
else {
	echo "Mohon Isi Tanggal";
	}
}
elseif ($_GET["act"]=="hari"){
  $fields = array('tgl');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) { 
    $error = true; //Yup there are errors
  }
  
}

if(!$error) { //Only create queries when no error occurs
  //Create queries....
  

function ketahuihari($tgl_lahir){
$tanggal = strtotime("$tgl_lahir");
$hari_en = date('l', $tanggal);
$hari_ar = array("Monday"=>"Senin", "Tuesday"=>"Selasa", "Wednesday"=>"Rabu", "Thursday"=>"Kamis", "Friday"=>"Jumat", "Saturday"=>"Sabtu", "Sunday"=>"Minggu");
$hari_id = $hari_ar[$hari_en];
return $hari_id;
}

$tgl = $_POST["tgl"];
$hari=ketahuihari("$tgl");
echo $hari;

}
else {
	echo "Mohon Isi Tanggal";}
}
	
	elseif ($_GET["act"]=="nik"){
		
	  $fields = array('tgl', 'jk');
	
	$error = false; //No errors yet
	foreach($fields AS $fieldname) { //Loop trough each field
	  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) { 
		$error = true; //Yup there are errors
	  }
	  
	}
	
	if(!$error) { //Only create queries when no error occurs
	  //Create queries....
	  
	
	include "../fungsi/koneksi.php";
	
	
	$set = mysql_query("SELECT kodekab FROM pengaturan where id='1'");
	while ($set = mysql_fetch_array($set))
	$kodekab = $set["kodekab"]; 
	$tgl = $_POST["tgl"]; 
	$jk = $_POST["jk"];
	function tgldb($tgl){ //(YYYY-MM-DD) angka
			$echo = explode("-",$tgl); 
			$echotgl = $echo[0]+40;
			$echobln = $echo[1];
			$th = $echo[2];
			$echothn = substr($th,2,2);
			
	if ($_POST["jk"]=="2"){		
	return $echotgl."".$echobln."".$echothn;		 
		}
	else {
	return $echo[0]."".$echobln."".$echothn;	
		}
	}
	
	$tgl = tgldb("$tgl"); 
	echo $kodekab."".$tgl.""."000";
	
	}
	
	else {
		echo "Mohon Isi Tanggal";}
	}
  
  
	elseif ($_GET["act"]=="pecahnik"){
		
	  $fields = array('id', 'jk');
	
	$error = false; //No errors yet
	foreach($fields AS $fieldname) { //Loop trough each field
	  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) { 
		$error = true; //Yup there are errors
	  }
	  
	}
	
	if(!$error) { //Only create queries when no error occurs
	  //Create queries....
	  
	
	include "../fungsi/koneksi.php";
	
	$id = $_POST["id"]; 
	$jk = $_POST["jk"];
	
			$tanggalcek = substr($id,6,2);
			
	if($jk=='1'){
	if($tanggalcek > 30){
	echo "NIK tidak teridentifikasi";
	}
	else {
	$now = date('Y');
			$now = substr($now,2,2);
			$prov = substr($id,0,2);
			$kab = substr($id,2,2);
			$kec = substr($id,4,2);
			$tanggal = substr($id,6,2);
			$bulan = substr($id,8,2);
			$tahun = substr($id,10,2);
			$nourut = substr($id,12,4);
			if ($tahun>"$now"){
			$tahun = "19".$tahun;
			}
			else {
			$tahun = "20".$tahun;}
			
	echo "<table style='width:95%;'><tr><td style='border:1px solid #666;'>Prov</td><td style='border:1px solid #666;'>Kab</td><td style='border:1px solid #666;'>Kec</td></tr>
	<tr><td style='border:1px solid #666;'>".$prov."</td><td style='border:1px solid #666;'>".$kab. "</td><td style='border:1px solid #666;'>".$kec."</td></tr>
	<tr><td colspan='3'  style='border:1px solid #666;'> Tanggal Lahir </td></tr>
	<tr><td colspan='3'  style='border:1px solid #666;'>".$tanggal." - ".$bulan." - ".$tahun."</td></tr>
	<tr><td colspan='3'  style='border:1px solid #666;'> Nomor Urut </td></tr>
	<tr><td colspan='3'  style='border:1px solid #666;'>".$nourut."</td></tr></table>";
	}
	}
	else {
	if($tanggalcek < 41){
	echo "NIK tidak teridentifikasi";
	}
	else {
	$now = date('Y');
			$now = substr($now,2,2);
			$prov = substr($id,0,2);
			$kab = substr($id,2,2);
			$kec = substr($id,4,2);
			$tanggal = substr($id,6,2)-40;
			$bulan = substr($id,8,2);
			$tahun = substr($id,10,2);
			$nourut = substr($id,12,4);
			if ($tanggal<9){
			$tanggal = "0".$tanggal;
			} 
			if ($tahun>"$now"){
			$tahun = "19".$tahun;
			}
			else {
			$tahun = "20".$tahun;}
			
	echo "<table style='width:95%;'><tr><td style='border:1px solid #666;'>Prov</td><td style='border:1px solid #666;'>Kab</td><td style='border:1px solid #666;'>Kec</td></tr>
	<tr><td style='border:1px solid #666;'>".$prov."</td><td style='border:1px solid #666;'>".$kab. "</td><td style='border:1px solid #666;'>".$kec."</td></tr>
	<tr><td colspan='3'  style='border:1px solid #666;'> Tanggal Lahir </td></tr>
	<tr><td colspan='3'  style='border:1px solid #666;'>".$tanggal." - ".$bulan." - ".$tahun."</td></tr>
	<tr><td colspan='3'  style='border:1px solid #666;'> Nomor Urut </td></tr>
	<tr><td colspan='3'  style='border:1px solid #666;'>".$nourut."</td></tr></table>";
	
	}
	}
	
	}
	
	else {
		echo "Mohon Isi NIK";}
	}
	}
  
?>