<?php
include "fungsi/fungsi_anti_injection.php";

session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "6";
}
else{
if ($_GET[act]=="rule") {
  $fields = array('desa', 'kec', 'kab', 'prov', 'kodedesa', 'kodekab', 'kodepos', 'kades');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
    $error = true; //Yup there are errors
  }
  
}

if(!$error) { //Only create queries when no error occurs
  //Create queries.... 
  
 		include "fungsi/koneksi.php"; 
 		include "fungsi/ubahkarakter.php"; 	
				
		$desa = ubah_huruf_awal(" ",$_POST['desa']); 
		$kec = ubah_huruf_awal(" ",$_POST['kec']); 
		$kab = ubah_huruf_awal(" ",$_POST['kab']);
		$prov = ubah_huruf_awal(" ",$_POST['prov']);
		$kodedesa = $_POST['kodedesa'];
		$kodekab = $_POST['kodekab'];
		$kodepos = $_POST['kodepos'];
		$kades = ubah_huruf_awal(" ",$_POST['kades']);  
		$almt = ubah_huruf_awal(" ",$_POST['almt']);  
$sql = mysql_query("select * from pengaturan");
$catch = mysql_num_rows($sql);
if ($catch=='0'){
echo "Belum ada peraturan dasar";
}
else {
		 	
		if(mysql_query("UPDATE pengaturan SET desa = '$desa',  
									  kecamatan = '$kec',  
									  kabupaten = '$kab',  
									  provinsi = '$prov',
									  kodedesa = '$kodedesa', 
									  kodekab = '$kodekab', 
									  kodepos = '$kodepos', 
									  kepaladesa = '$kades', 
									  alamat = '$almt'  
									  WHERE id= '2'")){
		if(mysql_query("UPDATE arsip_alamat SET desa = '$desa',  
									  kecamatan = '$kec',  
									  kabupaten_kota = '$kab',  
									  provinsi = '$prov',
									  kode_pos = '$kodepos'")){}
									  
																
		$desa = ubah_huruf_ke_besar($_POST['desa']); 
		$kec = ubah_huruf_ke_besar($_POST['kec']); 
		$kab = ubah_huruf_ke_besar($_POST['kab']);
		$prov = ubah_huruf_ke_besar($_POST['prov']); 
		$kades = ubah_huruf_ke_besar($_POST['kades']);
		$almt = ubah_huruf_ke_besar($_POST['almt']);   
			mysql_query("UPDATE pengaturan SET desa = '$desa',  
									  kecamatan = '$kec',  
									  kabupaten = '$kab',  
									  provinsi = '$prov',
									  kodedesa = '$kodedesa', 
									  kodekab = '$kodekab', 
									  kodepos = '$kodepos', 
									  kepaladesa = '$kades',  
									  alamat = '$almt' 
									  WHERE id= '1'");							  
		  echo "SUKSES, Data Berhasil Diperbaharui";
		}
		else {
		  echo "GAGAL, Silahkan Ulangi Lagi";}
 
 }
}
  else { 
		  echo "Anda Belum Mengisi Semua Data Yang Dibutuhkan, Periksa dan Ulangi Lagi";
		  }
          
}

elseif ($_GET[act]=="surat") {
  $fields = array('id', 'nama', 'ket', 'jw');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || $_POST[$fieldname]=='') {
    $error = true; //Yup there are errors
  }
  
}

if(!$error) { //Only create queries when no error occurs
  //Create queries.... 
  
 		include "fungsi/koneksi.php"; 	
		$nama = $_POST['nama']; 
		$ket = $_POST['ket'];
		$jw = $_POST['jw'];
		$id = $_POST['id']; 
$sql = mysql_query("select * from arsip_surat where id_surat='$id'");
$catch = mysql_num_rows($sql);
if ($catch=='0'){
echo "Surat berinisial [$id] Tidak Ada";
}
else {
		 	
		if(mysql_query("UPDATE arsip_surat SET nama_surat = '$nama',  
									  ket_surat = '$ket',  
									  jw = '$jw'  
									  WHERE id_surat= '$id'")){
		  echo "SUKSES, Data [$singkat] Berhasil Diperbaharui";
		}
		else {
		  echo "GAGAL, Silahkan Ulangi Lagi";}
 
 }
}
  else { 
		  echo "Anda Belum Mengisi Semua Data Yang Dibutuhkan, Periksa dan Ulangi Lagi";
		  }
          
}


elseif ($_GET[act]=="pejabat") {
  $fields = array('id', 'nama', 'teken', 'ket');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
    $error = true; //Yup there are errors
  }
  
}

if(!$error) { //Only create queries when no error occurs
  //Create queries.... 
  
 		include "fungsi/koneksi.php"; 	
 		include "fungsi/ubahkarakter.php"; 	
		$nama = $_POST['nama']; 	
		$namacap = ubah_huruf_ke_besar($_POST['nama']); 
		$teken = $_POST['teken']; 
		$ket = $_POST['ket'];
		$id = $_POST['id']; 
$sql = mysql_query("select * from pejabat where id='$id'");
$catch = mysql_num_rows($sql);
if ($catch=='0'){
echo "Surat berinisial [$id] Tidak Ada";
}
else {
		 	
		if(mysql_query("UPDATE pejabat SET nama = '$nama',  
									  nama_cap = '$namacap', 
									  teken = '$teken',  
									  ket = '$ket'
									  WHERE id= '$id'")){
		  echo "SUKSES, Data [$id] Berhasil Diperbaharui";
		}
		else {
		  echo "GAGAL, Silahkan Ulangi Lagi";}
 
 }
}
  else { 
		  echo "Anda Belum Mengisi Semua Data Yang Dibutuhkan, Periksa dan Ulangi Lagi";
		  }
          
}

elseif ($_GET[act]=="alamat") {
  $fields = array('id', 'nama');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
    $error = true; //Yup there are errors
  }
  
}

if(!$error) { //Only create queries when no error occurs
  //Create queries.... 
  
 		include "fungsi/koneksi.php"; 	 	
$queryfields = array('id', 'nama');
foreach($queryfields AS $fieldname) { //Loop trough each field
  		$$fieldname = $_POST[$fieldname];
}
$sql = mysql_query("select * from arsip_alamat where id_alamat='$id'");
$catch = mysql_num_rows($sql);
if ($catch=='0'){
echo "Alamat tidak terverifikasi";
}
else {
		 	
		if(mysql_query("UPDATE arsip_alamat SET alamat='$nama'  WHERE id_alamat='$id'")){
		  echo "SUKSES, Data [$id] Berhasil Diperbaharui";
		}
		else {
		  echo "GAGAL, Silahkan Ulangi Lagi";}
 
 }
}
  else { 
		  echo "Anda Belum Mengisi Semua Data Yang Dibutuhkan, Periksa dan Ulangi Lagi";
		  }
          
}

elseif ($_GET[act]=="rt") {
  $fields = array('id', 'nama', 'idrw');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
    $error = true; //Yup there are errors
  }
  
}

if(!$error) { //Only create queries when no error occurs
  //Create queries.... 
  
 		include "fungsi/koneksi.php"; 	 	
$queryfields = array('id', 'nama', 'idrw');
foreach($queryfields AS $fieldname) { //Loop trough each field
  		$$fieldname = $_POST[$fieldname];
}
$sql = mysql_query("select * from arsip_rt where id_rt='$id'");
$catch = mysql_num_rows($sql);
if ($catch=='0'){
echo "RT tidak terverifikasi";
}
else {
		 	
		if(mysql_query("UPDATE arsip_rt SET nama_ketua_rt='$nama'  WHERE id_rt='$id'")){
		  echo "SUKSES, Data [$id] Berhasil Diperbaharui";
		}
		else {
		  echo "GAGAL, Silahkan Ulangi Lagi";}
 
 }
}
  else { 
		  echo "Anda Belum Mengisi Semua Data Yang Dibutuhkan, Periksa dan Ulangi Lagi";
		  }
          
}

elseif ($_GET[act]=="rw") {
  $fields = array('id', 'nama');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
    $error = true; //Yup there are errors
  }
  
}

if(!$error) { //Only create queries when no error occurs
  //Create queries.... 
  
 		include "fungsi/koneksi.php"; 	 	
$queryfields = array('id', 'nama');
foreach($queryfields AS $fieldname) { //Loop trough each field
  		$$fieldname = $_POST[$fieldname];
}
$sql = mysql_query("select * from arsip_rw where id_rw='$id'");
$catch = mysql_num_rows($sql);
if ($catch=='0'){
echo "RT tidak terverifikasi";
}
else {
		 	
		if(mysql_query("UPDATE arsip_rw SET nama_ketua_rw='$nama'  WHERE id_rw='$id'")){
		  echo "SUKSES, Data [$id] Berhasil Diperbaharui";
		}
		else {
		  echo "GAGAL, Silahkan Ulangi Lagi";}
 
 }
}
  else { 
		  echo "Anda Belum Mengisi Semua Data Yang Dibutuhkan, Periksa dan Ulangi Lagi";
		  }
          
}
elseif ($_GET[act]=="backup") {
  $fields = array('bck');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
    $error = true; //Yup there are errors
  }
  
}

if(!$error) { //Only create queries when no error occurs
  //Create queries.... 
  
 		include "fungsi/koneksi.php"; 	 	
$queryfields = array('bck');
foreach($queryfields AS $fieldname) { //Loop trough each field
  		$$fieldname = $_POST[$fieldname];
}

if($bck=='Y' | $bck=='N'){
	
		if(mysql_query("UPDATE pengaturan SET auto_backup='".$bck."'")){
		  echo "SUKSES, Pengaturan backup Berhasil Diperbaharui";
		}
		else {
		  echo "GAGAL, Silahkan Ulangi Lagi";}
}
		 else { echo "GAGAL, SI PA\'DE Tidak Mengerti Perintah"; }
}
  else { 
		  echo "Anda Belum Mengisi Semua Data Yang Dibutuhkan, Periksa dan Ulangi Lagi";
		  }
          
}


elseif ($_GET[act]=="akun") {
  $fields = array('id', 'nama');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
    $error = true; //Yup there are errors
  }
  
}

if(!$error) { //Only create queries when no error occurs
  //Create queries.... 
  
 		include "fungsi/koneksi.php"; 	 	
$queryfields = array('id', 'nama', 'pass', 'izin');
foreach($queryfields AS $fieldname) { //Loop trough each field
  		$$fieldname = $_POST[$fieldname];
}
$sql = mysql_query("select * from users where id='$id'");
$catch = mysql_num_rows($sql);
if ($catch=='0'){
echo "Akun tidak terverifikasi";
}
else {

  if(!isset($pass) || empty($pass)) {
		if(mysql_query("UPDATE users SET nama_lengkap='$nama',
															type='$izin'
															WHERE id='$id'")){
		  echo "SUKSES, Akun [$id] Berhasil Diperbaharui";
		}
		else {
		  echo "GAGAL, Silahkan Ulangi Lagi";}
 }
 else {
 
		 	$pass = md5($pass);
		if(mysql_query("UPDATE users SET nama_lengkap='$nama',
															password='$pass',
															type='$izin'
															WHERE id='$id'")){
		  echo "SUKSES, Akun [$id] Berhasil Diperbaharui";
		}
		else {
		  echo "GAGAL, Silahkan Ulangi Lagi";}
		  }
 
 }
}
  else { 
		  echo "Anda Belum Mengisi Semua Data Yang Dibutuhkan, Periksa dan Ulangi Lagi";
		  }
          
}

else {
	echo "act no set";
	}
         
}
 ?>