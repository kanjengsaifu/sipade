<?php
include "../fungsi/fungsi_anti_injection.php";

    if(isset($_POST['start'])) {
        //Open/Create file.
        $datei = fopen("../fungsi/koneksi.php", "w+");
            
        //Write file.
        $content = '<?php'."\n";
        $content = $content.'  $server = "'.$_POST['db_host'].'";'."\n";
        $content = $content.'  $database = "'.$_POST['db_name'].'";'."\n";
        $content = $content.'  $username = "'.$_POST['db_user'].'";'."\n";
        $content = $content.'  $password = "'.$_POST['db_pass'].'";'."\n";
		$content = $content.'  mysql_connect($server,$username,$password) or die("<div style=\'width:300px; margin:auto; padding:10px; text-align:center;\' class=\'alert alert-danger\'>Koneksi Gagal, Server Bermasalah</div>");'."\n";
		$content = $content.'  mysql_select_db($database) or die("<div style=\'width:300px; margin:auto; padding:10px; text-align:center;\' class=\'alert alert-danger\'>Koneksi Gagal, Database Tidak Ada</div>");'."\n";
        $content = $content.'?>';
        fwrite($datei, $content);
        fclose($datei);
    }

if ($_GET[act]=="1") {
  $fields = array('nd', 'nkec', 'nk', 'np', 'kd', 'kk', 'kp', 'kep', 'a');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
    $error = true; //Yup there are errors
  }
  
}

if(!$error) { //Only create queries when no error occurs
  //Create queries....
  
 		include "../fungsi/koneksi.php";
 		include "../fungsi/ubahkarakter.php";
				
		$desa = ubah_huruf_awal(" ",$_POST['nd']);
		$kec = ubah_huruf_awal(" ",$_POST['nkec']);
		$kab = ubah_huruf_awal(" ",$_POST['nk']);
		$prov = ubah_huruf_awal(" ",$_POST['np']);
		$kodedesa = $_POST['kd'];
		$kodekab = $_POST['kk'];
		$kodepos = $_POST['kp'];
		$kades = ubah_huruf_awal(" ",$_POST['kep']);
		$almt = ubah_huruf_awal(" ",$_POST['a']);
$sql = mysql_query("select * from pengaturan");
$catch = mysql_num_rows($sql);
if ($catch=='0'){
echo "0"; //belum ada data
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
									  alamat = '$almt',
									  install = 'N'
									  WHERE id= '2'")){
									  
																
		$desa = ubah_huruf_ke_besar($_POST['nd']);
		$kec = ubah_huruf_ke_besar($_POST['nkec']);
		$kab = ubah_huruf_ke_besar($_POST['nk']);
		$prov = ubah_huruf_ke_besar($_POST['np']);
		$kades = ubah_huruf_ke_besar($_POST['kep']);
		$almt = ubah_huruf_ke_besar($_POST['a']);
			mysql_query("UPDATE pengaturan SET desa = '$desa',
									  kecamatan = '$kec',
									  kabupaten = '$kab',
									  provinsi = '$prov',
									  kodedesa = '$kodedesa',
									  kodekab = '$kodekab',
									  kodepos = '$kodepos',
									  kepaladesa = '$kades',
									  alamat = '$almt',
									  install = 'N'
									  WHERE id= '1'");
		  echo "1"; //sukses
		}
		else {
		  echo "2";} //gagal
 
 }
}
  else {
		  echo "3"; //belum terisi semua
		  }
          
}

elseif($_GET[act]=="2") {

 		include "../fungsi/koneksi.php";
				 if(mysql_query("TRUNCATE TABLE arsip_rw")){
				 
				$jml = $_POST['jml'];
				
				$sql="INSERT INTO arsip_rw(rw, nama_ketua_rw)
				 VALUES ('1', 'nama ketua rw 1')";
				 
     for ($i=2; $i<=$jml; $i++){
				 $sql.=", ('$i', 'nama ketua rw $i')";
				 }
				 
				 mysql_query($sql);
				 }
	echo "menambah kan RW";
}

elseif($_GET[act]=="2a") {

 		include "../fungsi/koneksi.php";
				$rw = $_POST['rw'];
				 if(mysql_query("DELETE FROM arsip_rt WHERE id_rw='$rw'")){
				 
				$jml = $_POST['jml'];
				
				$sql="INSERT INTO arsip_rt(id_rw, rt, nama_ketua_rt)
				 VALUES ('$rw', '1', 'nama ketua rt 1 / rw $rw')";
				 
     for ($i=2; $i<=$jml; $i++){
				 $sql.=", ('$rw', '$i', 'nama ketua rt $i / rw $rw')";
				 }
				 
				 mysql_query($sql);
				 }
	echo "menambah data RT untuk RW $rw";
}

elseif ($_GET[act]=="2b") {
  $fields = array('id', 'nama', 'idrw');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
    $error = true; //Yup there are errors
  }
  
}

if(!$error) { //Only create queries when no error occurs
  //Create queries....
  
 		include "../fungsi/koneksi.php";
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

elseif ($_GET[act]=="2c") {

  $fields = array('id', 'nama');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
    $error = true; //Yup there are errors
  }
  
}

if(!$error) { //Only create queries when no error occurs
  //Create queries....
  
 		include "../fungsi/koneksi.php";
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

elseif($_GET[act]=="3") {
	
 		include "../fungsi/koneksi.php";
				 if(mysql_query("TRUNCATE TABLE arsip_alamat")){
				 
				$jml = $_POST['jml'];
				$rule =mysql_query("SELECT * FROM pengaturan where id='2'");
				$rule = mysql_fetch_array($rule);
				
				$sql="INSERT INTO arsip_alamat(id_alamat, alamat, desa, kecamatan, kabupaten_kota, kode_pos, provinsi)
												VALUES ('1', 'Alamat 1', '$rule[desa]', '$rule[kecamatan]', '$rule[kabupaten]', '$rule[kodepos]', '$rule[provinsi]')";
				 
     for ($i=2; $i<=$jml; $i++){
				 $sql.=", ('$i', 'Alamat $i', '$rule[desa]', '$rule[kecamatan]', '$rule[kabupaten]', '$rule[kodepos]', '$rule[provinsi]')";
				 }
				 
				 mysql_query($sql);
				 }
	echo "menambah kan RW";
}

elseif ($_GET[act]=="3a") {
  $fields = array('id', 'nama');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
    $error = true; //Yup there are errors
  }
  
}

if(!$error) { //Only create queries when no error occurs
  //Create queries....
  
 		include "../fungsi/koneksi.php";
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

elseif($_GET[act]=="4") {

  $fields = array('id', 'nama', 'teken', 'ket');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
    $error = true; //Yup there are errors
  }
  
}

if(!$error) { //Only create queries when no error occurs
  //Create queries....
  
 		include "../fungsi/koneksi.php";
 		include "../fungsi/ubahkarakter.php";
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
		  echo "GAGAL, Silahkan Ulangi Lagi"; }
 
 }
}
  else {
		  echo "Anda Belum Mengisi Semua Data Yang Dibutuhkan, Periksa dan Ulangi Lagi";
		  }
          

}

elseif($_GET[act]=="5") {

 		include "../fungsi/koneksi.php";
				 if(mysql_query("TRUNCATE TABLE users")){
				 
				$jml = $_POST['jml'];
				$pass =  md5('admin');
				$passop =  md5('operator');
				$sql="INSERT INTO users(uname, nama_lengkap, type, password)
				 VALUES ('admin', 'Nama Lengkap Admin', '0', '$pass'), ('operator', 'Nama Lengkap Operator', '1', '$passop')";
				
     for ($i=3; $i<=$jml; $i++){
				 $sql.=", ('operator$i', 'Nama Lengkap Operator $i', '1',  '".md5("operator".$i)."')";
				 }
				 
				 mysql_query($sql);
				 }
	echo "Memproses Struktur Akun";
}

elseif ($_GET[act]=="5a") {
  $fields = array('id', 'nama');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
    $error = true; //Yup there are errors
  }
  
}

if(!$error) { //Only create queries when no error occurs
  //Create queries....
  
 		include "../fungsi/koneksi.php";
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

elseif ($_GET[act]=="5b") {
  $fields = array('id');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
    $error = true; //Yup there are errors
  }
  
}

if(!$error) { //Only create queries when no error occurs
  //Create queries....
  
 		include "../fungsi/koneksi.php";
		$install = $_POST['id'];
$sql = mysql_query("select * from pengaturan");
$catch = mysql_num_rows($sql);
if ($catch=='0'){
echo "0"; //belum ada data
}
else {
		 	
		if(mysql_query("UPDATE pengaturan SET install = 'Y'
									  WHERE id= '2'")){
			mysql_query("UPDATE pengaturan SET install = 'Y'
									  WHERE id= '1'");
		  echo "1"; //sukses
		}
		else {
		  echo "2";} //gagal
 
 }
}
  else {
		  echo "3"; //belum terisi semua
		  }
          
}

else {

?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>SI PA'DE | Sistem Informasi Pelayanan Desa</title>
	<link rel="shortcut icon" href="../images/favicon.gif">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link type="text/css" href="../rakstrap/css/style.css" rel="stylesheet">
  <link href="../rakstrap/css/loadingindicator.css" rel="stylesheet">
</head>

<body class="pace-done">
<div class="container clearfix">
    <!-- <div class="content clearfix" style="width:395px; float:left; margin:0;">
	 <button class="btn btn-default btn-block">Tambah RW</button>
	 <button class="btn btn-default btn-block">Tambah RT</button><br/>
	 <div class="alert alert-warning">
	 
	 <table stye="width:200px;">
	 <tbody>
	 <tr>
    <td><b>RW. 001  </b></td>
    <td style="width:30px; text-align:center;">#</td>
    <td style="text-align:right;">  Jumlah RT : </td>
    <td>
	<select name="2_jrt" id="2_jrw" style="width:50px">
	<option value="0"></option>
	<option value="1">1</option>
	</select>
	</td>
  </tr>
  </tbody>
  </table>
	 <table stye="width:200px;">
	 <tbody>
	 <tr>
    <td style="width:20px;"></td>
    <td>+ 001</td>
    <td style="width:30px; text-align:center;">&raquo;</td>
    <td><input type="text" name="2_jrt" id="2_jrw" style="width:250px"></td>
  </tr>
	 <tr>
    <td style="width:20px;"></td>
    <td>+ 002</td>
    <td style="width:30px; text-align:center;">&raquo;</td>
    <td><input type="text" name="2_jrt" id="2_jrw" style="width:250px"></td>
  </tr>
  </tbody>
  </table>
	 </div>  <hr/>
	
	 </div>
     -->
	 <div class="content clearfix" style="width:570px; margin:0 auto; position:static;">
	 <?php if($_GET[sec]=='start'){
	 ?>
	 <div class="alert alert-info"> <h1>Selamat Datang...</h1> <hr/>Di mesin instalasi SIPA'DE, Silahkan isi Kolom-kolom dibawah ini.</div>
     <hr/>
	 
	  <form action="index.php?sec=starting" method="post">
	 <div class="alert alert-warning">
	 Buatlah sebuah database (MySql) baru dan isi kolom-kolom dibawah ini sesuai database yang telah dibuat tersebut, Lalu klik pada tombol <code>Lanjut</code> berwarna biru.
	 </div><hr/>
	 <div class="alert alert-danger">
	 <table>
	 <tbody>
	 <tr>
    <td width="25%">Server Database</td>
    <td width="1%">:</td>
    <td width="50%"><input type="text" placeholder="Database Host" name="db_host" style="width:320px"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
	 <tr>
    <td width="25%">Nama Database</td>
    <td width="1%">:</td>
    <td width="50%"><input type="text" placeholder="Database Name" name="db_name" style="width:320px"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
	 <tr>
    <td width="25%">Nama Pengguna</td>
    <td width="1%">:</td>
    <td width="50%"><input type="text" placeholder="Username" name="db_user" style="width:320px"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
	 <tr>
    <td width="25%">Kata Sandi</td>
    <td width="1%">:</td>
    <td width="50%"><input type="password" placeholder="Password" name="db_pass" style="width:320px; padding-left:2px; border-bottom:1px dotted #333;"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tbody>
  </table>
	 </div>  <hr/>
	 <button type="submit" value="Selanjutnya" name="start" class="btn btn-primary pull-right">Selanjutnya</button>
  </form>
	 <?php } ?>
	 	 <?php if($_GET[sec]=='finish'){
	 ?>
	 <div class="alert alert-success"> <h1>Instalasi SIPA'DE Selesai...</h1> <hr/>Selamat !! SIPA'DE RW2 telah dapat digunakan, silahkan ikuti petunjuk dibawah ini.</div>
     <hr/>
	 
	 <div class="alert alert-info"> Gunakan daftar Akun dibawah ini untuk masuk ke Ruang Operator<br/>
	 
	 <?php
	 include "../fungsi/koneksi.php";
		 $usr =mysql_query("SELECT * FROM users");
		 $no=1;
			while ($s = mysql_fetch_array($usr)){
				echo "
		   <blockquote><b>$s[nama_lengkap]</b><br/>
	 Nama Pengguna : $s[uname]<br/>
	 Kata Sandi : $s[password]</blockquote>
           ";
					  $no++;
		 }
		   ?>
	<br/>
	 </div>  <hr/>
	 <div class="alert alert-warning">Selebihnya dapat diatur ulang via halaman Pengaturan.</div><hr/>
	 <div class="alert alert-danger">Hapus File ini <code>[...]/install.php</code></div><hr/>
	 <a class="btn btn-primary pull-right" href="../auth">Buka SI PA'DE</a>
	 <?php } ?>
	  <?php if($_GET[sec]=='starting'){
	 ?>
	 <div class="alert alert-info"> <h1>Instalasi SIPA'DE</h1> Hasil Cek Koneksi yang telah dibuat</div>
     <hr/>
	 <?php
 $ppp = mysql_connect($_POST['db_host'],$_POST['db_user'],$_POST['db_pass']);
 $pppdata = mysql_select_db($_POST['db_name']);
 
if($ppp){
echo "<div style='width:300px; margin:auto; padding:10px; text-align:center;' class='alert alert-success'>Akses Ke Server Lancar</div>";

if(!$pppdata){

echo "<hr/><div style='width:300px; margin:auto; padding:10px; text-align:center;' class='alert alert-danger'>Akses <i>Database</i> Bermasalah</div>";
}

if($pppdata){
echo "<hr/><div style='width:300px; margin:auto; padding:10px; text-align:center;' class='alert alert-success'>Akses Ke <i>Database</i> Lancar</div>";
}

if($pppdata){
echo "<hr/><a class='btn btn-primary' href='index.php?sec=1'>LANJUTKAN</a>";
}
if(!$pppdata){
echo "<hr/><a class='btn btn-primary' href='index.php?sec=start'>ATUR ULANG</a>";}
}

 
if(!$ppp){

echo "<div style='width:300px; margin:auto; padding:10px; text-align:center;' class='alert alert-danger'>Akses Ke Server Bermasalah</div><hr/><a class='btn btn-primary' href='index.php?sec=start'>ATUR ULANG</a>";
}
}

 if($_GET[sec]=='1'){
	 ?>
	 <div class="alert alert-info"> <h1>Instalasi SIPA'DE | Tahap 1</h1> <hr/>Ditahap ini silahkan isi data profil desa anda.</div>
     <hr/>
	 <?php
include "../fungsi/koneksi.php";
?>
	 <div class="alert alert-warning">
	 <table>
	 <tbody>
	 <tr>
    <td width="34%">Nama Desa</td>
    <td width="1%">:</td>
    <td width="50%"><input name="1_nd" id="1_nd" type="text" style="width:320px"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
	 <tr>
    <td width="34%">Nama Kecamatan</td>
    <td width="1%">:</td>
    <td width="50%"><input name="1_nkec" id="1_nkec" type="text" style="width:320px"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
	 <tr>
    <td width="34%">Nama Kabupaten</td>
    <td width="1%">:</td>
    <td width="50%"><input name="1_nk" id="1_nk" type="text" style="width:320px"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
	 <tr>
    <td width="34%">Nama Provinsi</td>
    <td width="1%">:</td>
    <td width="50%"><input name="1_np" id="1_np" type="text" style="width:320px"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
	 <tr>
    <td width="34%">Alamat Kantor</td>
    <td width="1%">:</td>
    <td width="50%"><input name="1_a" id="1_a" type="text" style="width:320px"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
	 <tr>
    <td width="34%">Kode Pos</td>
    <td width="1%">:</td>
    <td width="50%"><input name="1_kp" id="1_kp" type="text" style="width:100px"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
	 <tr>
    <td width="34%">Kode Desa</td>
    <td width="1%">:</td>
    <td width="50%"><input name="1_kd" id="1_kd" type="text" style="width:100px"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
	 <tr>
    <td width="34%">Kode Prov+Kab+Kec</td>
    <td width="1%">:</td>
    <td width="50%"><input name="1_kk" id="1_kk" type="text" style="width:100px"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
	 <tr>
    <td width="34%">Nama Kepala Desa</td>
    <td width="1%">:</td>
    <td width="50%"><input name="1_kep" id="1_kep" type="text" style="width:300px"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </tbody>
  </table>
	 </div>  <hr/>
	 <button id="sec1" class="btn btn-primary pull-right">Selanjutnya</button>

	
	<?php } ?>
	 <?php if($_GET[sec]=='2'){
	 ?>
	 <div class="alert alert-info"> <h1>Instalasi SIPA'DE | Tahap 2</h1> <hr/>Ditahap ini silahkan isi data RW berikut RT yang ada.</div>
   
	<hr/><?php
include "../fungsi/koneksi.php"; ?>
Jumlah RW :
	 <div class="btn-group" style="width:90px;">
  
    <div class="input-group">
      <input type="number" id="jmldatarw" min="1" class="form-control noborder-bottom" style="width:70px; padding:6px 10px" value="1">
  
      <span class="input-group-btn">
        <button id="tmbhrw"  class="btn btn-shadow btn-default" type="button" onclick=""><span class="glyphicon glyphicon-floppy-disk"></span></button>
      </span>
    </div>
    </div>
	  <hr/>
<table style="" border="0" class="list rtrw lembar2">
      <thead>         <tr>
           <td>RW</td>
           <td>Nama Ketua RW</td>
           <td>#</td>
		   <td></td>
                    </tr></thead>
					
         <tr class="subtitle">
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
                    </tr>
         <tbody>
         <?php
		 $srw =mysql_query("SELECT * FROM arsip_rw");
		 $no=1;
			while ($s = mysql_fetch_array($srw)){
				echo "<tr height='40'>
						<td width='50px' style='text-align:center;'>$s[rw]</td>
						<td width='200px'><input name='nama_ketua_rw' type='text' value='$s[nama_ketua_rw]' id='rw_$s[id_rw]_nama' style='width:260px;' /></td>
						<td width='180px'><button class='btn btn-default btn-xs rw-btn' type='button' id='rw_btn' data-id='$s[id_rw]'><span class='glyphicon glyphicon-edit'></span>Ubah</button></td>
						<td></td>
					  </tr>";
					  $no++;
					  
					    echo "<tr height='30'>
						<td width='10%'></td>
						<td width='30%' colspan='2'>
							<table>
							<tr class='subtitle'>
							<td width='35px'>RT</td>
							<td width='240'>Nama Ketua RT</td>
							<td width='55px'>#</td>
							</tr>
							</table>
								<td>
								
								Jumlah RT :
								<div class='btn-group' style='width:80px;'>
  
    <div class='input-group'>
      <input type='number' id='jmldatart_$s[rw]' min='1' class='form-control noborder-bottom' style='width:60px; padding:6px 10px' value='1'>
  
      <span class='input-group-btn'>
        <button id='tmbhrt' data-rw='$s[rw]'  class='btn btn-shadow btn-default rtbtn' type='button' onclick=''><span class='glyphicon glyphicon-floppy-disk'></span></button>
      </span>
    </div>
    </div>
	
	</td>
						</td>
						
					  </tr>";
					  
		 $srwrt =mysql_query("SELECT * FROM arsip_rt where id_rw='$s[id_rw]' ORDER BY rt");
		 $noa=1;
			while ($d = mysql_fetch_array($srwrt)){
					  echo "<tr height='30'>
						<td width='10%'></td>
						<td width='30%' colspan='2'>
							<table>
							<tr>
							<td style='text-align:center;'  width='50px'>$d[rt]</td>
							<td  width='230px'><input name='nama_ketua_rt' type='text' value='$d[nama_ketua_rt]' id='rt_$d[id_rt]_nama' style='width:200px;' /></td>
							<td  width='50px'><button class='btn btn-default btn-xs rt-btn' type='button' id='rt_btn' data-idrw='$s[id_rw]' data-id='$d[id_rt]'><span class='glyphicon glyphicon-edit'></span>Ubah</button></td>
							</tr>
							</table>
								<td></td>
						</td>
						
					  </tr>";
					  }
					  $noa++;
					  
					    echo "<tr height='30'>
						<td width='10%'></td>
						<td width='30%' colspan='2'>
							
								<td></td>
						</td>
						
					  </tr>";
					  
					  
		 }
		   ?>
           
           <tr>
             <td>&nbsp;</td>
           <td>&nbsp;</td>
             <td>&nbsp;</td>
			 <td></td>
           </tr>
           
         </tbody>
       </table>
  
  	
<hr/>
	<a class="btn btn-primary pull-left" href="index.php?sec=1">Sebelumnya</a><?php
	
			$usra =mysql_query("SELECT * FROM arsip_rw");
			$catcha = mysql_num_rows($usra);
			$usraw =mysql_query("SELECT * FROM arsip_rt");
			$catchaw = mysql_num_rows($usraw);
			if ($catcha=='0'){ }
			else {
			if ($catchaw=='0'){ }
			else {
			echo "<a class='btn btn-primary pull-right' href='index.php?sec=3'>Selanjutnya</a>";
			}
			}
			
			  } ?>
	  <?php if($_GET[sec]=='3'){
	 ?>
	 <div class="alert alert-info"> <h1>Instalasi SIPA'DE | Tahap 3</h1> <hr/>Ditahap ini silahkan isi data Kampung yang ada.</div>
     <hr/>
	 <?php
include "../fungsi/koneksi.php"; ?>
Jumlah Kampung :
	 <div class="btn-group" style="width:90px;">
  
    <div class="input-group">
      <input type="number" id="jmldataalamat" min="1" class="form-control noborder-bottom" style="width:70px; padding:6px 10px" value="1">
  
      <span class="input-group-btn">
        <button id="tmbhalamat"  class="btn btn-shadow btn-default" type="button" onclick=""><span class="glyphicon glyphicon-floppy-disk"></span></button>
      </span>
    </div>
    </div>
	  <hr/>

<table border="0" class="list kampung lembar2">
       <thead>
            <tr>
              <td align="center" valign="middle">No</td>
              <td align="center" valign="middle">Nama Kampung</td>
              <td align="center" valign="middle">#</td>
           </tr>
        </thead>
         <tr class="subtitle">
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
                    </tr>
         <tbody>
         <?php
		 $kp =mysql_query("SELECT * FROM arsip_alamat");
		 $no=1;
			while ($s = mysql_fetch_array($kp)){
				echo "<tr height='30'>
           				<td class='nomor' width='50'>$no</td>
						<td width='100'><input name='nama_alamat' type='text' value='$s[alamat]' id='a_$s[id_alamat]_nama' style='width:220px;' /></td>
						<td><button class='btn btn-default btn-xs a-btn' type='button' id='a_btn' data-id='$s[id_alamat]'><span class='glyphicon glyphicon-edit'></span>Save</button></td>
					  </tr>";
					  $no++;
		 }
		   ?>
           
           <tr>
             <td class="nomor">&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           
         </tbody>
       </table>
  
  	
<hr/>
	<a class="btn btn-primary pull-left" href="index.php?sec=2">Sebelumnya</a>
	<?php
	
			$usra =mysql_query("SELECT * FROM arsip_alamat");
			$catcha = mysql_num_rows($usra);
			if ($catcha=='0'){ }
			else {
			echo "<a class='btn btn-primary pull-right' href='index.php?sec=4'>Selanjutnya</a>";
			}
			
			 } ?>
	 <?php if($_GET[sec]=='4'){
	 ?>
	 <div class="alert alert-info"> <h1>Instalasi SIPA'DE | Tahap 4</h1> <hr/>Ditahap ini silahkan isi data pejabat yang ada.</div>
     <hr/>
	 <?php
include "../fungsi/koneksi.php"; ?>
<table  border="0" class="list pejabat lembar2">
       <thead>
            <tr>
              <td align="center" valign="middle">No</td>
              <td align="center" valign="middle">Nama Lengkap</td>
              <td align="center" valign="middle">Keterangan</td>
              <td align="center" valign="middle">Teken</td>
              <td align="center" valign="middle">#</td>
           </tr>
        </thead>
         <tr class="subtitle">
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
                    </tr>
         <tbody>
         <?php
		 $srt =mysql_query("SELECT * FROM pejabat");
		 $no=1;
			while ($s = mysql_fetch_array($srt)){
				echo "<tr height='30'>
           				<td class='nomor' width='20'>$no</td>
						<td width='100'><input name='nama_pejabat' type='text' value='$s[nama]' id='p_$s[id]_nama' style='width:120px;' /></td>
						<td width='200'><input name='ket_pejabat' type='text' id='p_$s[id]_ket' value='$s[ket]' style='width:200px;'></td>
           				<td class='nomor' width='20'>
						<select name='teken' type='text'  id='p_$s[id]_teken' style='width:40px;'>";
						if ($s[teken]=="Y"){
						echo "<option value='Y' selected>Ya</option>
								<option value='N'>Tidak</option>";
						}
						else {
						echo "<option value='Y'>Ya</option>
								<option value='N' selected>Tidak</option>";
								}
								echo "
						</select></td>
						<td><button class='btn btn-default btn-xs p-btn' type='button' id='p_btn' data-id='$s[id]'><span class='glyphicon glyphicon-edit'></span>Save</button></td>
					  </tr>
           ";
					  $no++;
		 }
		   ?>
           
           <tr>
             <td class="nomor">&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           
         </tbody>
       </table>
  
  

  	
<hr/>
	<a class="btn btn-primary pull-left" href="index.php?sec=3">Sebelumnya</a>
	<a class="btn btn-primary pull-right" href="index.php?sec=5">Selanjutnya</a>
	 <?php } ?>
 
	 <?php if($_GET[sec]=='5'){
	 ?>
	 <div class="alert alert-info"> <h1>Instalasi SIPA'DE | Tahap 5</h1> <hr/>Ditahap ini silahkan isi data operator yang ada.</div>
     <hr/>
	 Jumlah Akun :
	 <div class="btn-group" style="width:90px;">
  
    <div class="input-group">
      <input type="number" id="jmldataakun" min="2" class="form-control noborder-bottom" style="width:70px; padding:6px 10px" value="2">
  
      <span class="input-group-btn">
        <button id="tmbhakun"  class="btn btn-shadow btn-default" type="button" onclick=""><span class="glyphicon glyphicon-floppy-disk"></span></button>
      </span>
    </div>
    </div>
	  <hr/>

	 <?php
include "../fungsi/koneksi.php"; ?>
<table  border="0" class="list pejabat lembar2">
       <thead>
            <tr>
              <td align="center" valign="middle">No</td>
              <td align="center" valign="middle">Nama Akun</td>
              <td align="center" valign="middle">Nama Lengkap</td>
              <td align="center" valign="middle">Perizinan</td>
              <td align="center" valign="middle">Password</td>
              <td align="center" valign="middle">#</td>
           </tr>
        </thead>
         <tr class="subtitle">
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
                    </tr>
         <tbody>
         <?php
		 $usr =mysql_query("SELECT * FROM users");
		 $no=1;
			while ($s = mysql_fetch_array($usr)){
				echo "<tr height='30'>
           				<td class='nomor'> $no </td>
						<td width='100'><input name='uname' type='text' value='$s[uname]' id='akun_$s[id]_uname' style='width:80px;' /></td>
						<td width='200'><input name='nama' type='text' id='akun_$s[id]_nama' value='$s[nama_lengkap]' style='width:150px;'></td>
           				<td width='50'>
						<select name='type' type='text'  id='akun_$s[id]_izin' style='width:70px;'>";
						if ($s[type]=="0"){
						echo "<option value='0' selected>Semua Fitur</option>
								<option value='1'>Terbatas</option>";
						}
						else {
						echo "<option value='0'>Semua Fitur</option>
								<option value='1' selected>Terbatas</option>";
								}
								echo "
						</select></td>
						<td width='200'><input name='pass' type='password' id='akun_$s[id]_pass'  placeholder='******' style='width:120px; border-bottom:1px dotted #333;'></td>
						<td><button class='btn btn-default btn-xs akun-btn' type='button' id='akun_btn' data-id='$s[id]'><span class='glyphicon glyphicon-edit'></span>Save</button></td>
					  </tr>
           ";
					  $no++;
		 }
		   ?>
           
           <tr>
             <td class="nomor">&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           
         </tbody>
       </table>
  
  

  	
<hr/>
	<a class="btn btn-primary pull-left" href="index.php?sec=4">Sebelumnya</a>
	<?php
	
			$usra =mysql_query("SELECT * FROM users");
			$catcha = mysql_num_rows($usra);
			if ($catcha=='0'){ }
			else {
			echo "<button class='btn btn-primary pull-right finish' data-id='Y'>Selanjutnya</button>";
			}
			
			} ?>
	 
	 </div>
  </div>
<div class="footer clearfix"><div style="float:left; width:300px; text-align:left;">SI PA'DE v2.0 &nbsp;&nbsp;&nbsp;&nbsp; | Use updated Internet browser for best performer</div><div style="float:right; width:300px; text-align:right;">© 2014 Ade A S | RakIT Solution  <br></div></div>
<br/>



<script src="../rakstrap/jquery.min.js"></script>
<script src="../rakstrap/js/pace.min.js"></script>
 <script type="text/javascript">
	function refresh (timeoutPeriod){
		refresh = setTimeout(function(){window.location.reload(true);},timeoutPeriod);
	}
	function refreshto (timeoutPeriod,to){
		refresh = setTimeout(function(){location.href="" + to + "";},timeoutPeriod);
	}
	</script>
  <script type="text/javascript">
$(document).ready(function(){
$("#sec1").live("click",function(){
	$(this).attr("disabled", "disabled");
var nd = $("#1_nd").val();
var nkec = $("#1_nkec").val();
var nk = $("#1_nk").val();
var np = $("#1_np").val();
var a = $("#1_a").val();
var kp = $("#1_kp").val();
var kd = $("#1_kd").val();
var kk = $("#1_kk").val();
var kep = $("#1_kep").val();
	 $.ajax({
	type:"POST",
	url:"index.php?act=1",
	data: "nd="+nd+"&nkec="+nkec+"&nk="+nk+"&np="+np+"&a="+a+"&kp="+kp+"&kd="+kd+"&kk="+kk+"&kep="+kep,
		success: function(data){
		
            if(data==0){ alert('Gagal Data Tidak Dapat Ditemukan!') }
			 else if(data==1){ refreshto('500',"index.php?sec=2"); }
			 else if(data==2){ alert("Gagal, Cek File [fungsi/koneksi.php] !") }
			 else if(data==3){ alert('Lengkapi Semua Data !') }
			
	$("#sec1").removeAttr("disabled");
		},
        error:function(){
              alert('Ada kesalahan !');
		}
	});
	});
	});
	</script>
  <script type="text/javascript">
$(document).ready(function(){
$("#tmbhrw").live("click",function(){
	$(this).attr("disabled", "disabled");
	
var id = $("#jmldatarw").val();
	 $.ajax({
	type:"POST",
	url:"index.php?act=2",
	data: "jml="+id,
		success: function(data){
		alert(data);
		refresh(1000);
	$("#tmbhrw").removeAttr("disabled");
		},
        error:function(){
              alert('Ada kesalahan !');
		}
	});
	});
	});
	</script>
          
  <script type="text/javascript">
$(document).ready(function(){
$("#tmbhalamat").live("click",function(){
	$(this).attr("disabled", "disabled");
	
var id = $("#jmldataalamat").val();
	 $.ajax({
	type:"POST",
	url:"index.php?act=3",
	data: "jml="+id,
		success: function(data){
		alert(data);
		refresh(1000);
	$("#tmbhalamat").removeAttr("disabled");
		},
        error:function(){
              alert('Ada kesalahan !');
		}
	});
	});
	});
	</script>
          
  <script type="text/javascript">
$(document).ready(function(){
$("#tmbhrt").live("click",function(){
	$(this).attr("disabled", "disabled");
	
var rw = $(this).data('rw');
var id = $("#jmldatart_"+rw).val();
	 $.ajax({
	type:"POST",
	url:"index.php?act=2a",
	data: "jml="+id+"&rw="+rw,
		success: function(data){
		alert(data);
		refresh(1000);
	$(".rtbtn").removeAttr("disabled");
		},
        error:function(){
              alert('Ada kesalahan !');
		}
	});
	});
	});
	</script>
          
        
  <script type="text/javascript">
$(document).ready(function(){
$("#tmbhakun").live("click",function(){
	$(this).attr("disabled", "disabled");
	
var id = $("#jmldataakun").val();
	 $.ajax({
	type:"POST",
	url:"index.php?act=5",
	data: "jml="+id,
		success: function(data){
		alert(data);
		refresh(1000);
	$("#tmbhakun").removeAttr("disabled");
		},
        error:function(){
              alert('Ada kesalahan !');
		}
	});
	});
	});
	</script>
		  
		  
    <script type="text/javascript">
$(document).ready(function(){
$(".p-btn").live("click",function(){
	$(this).attr("disabled", "disabled");
var id = $(this).data("id");
var nama = $("#p_"+ id +"_nama").val();
var teken = $("#p_"+ id +"_teken").val();
var ket = $("#p_"+ id +"_ket").val();
	 $.ajax({
	type:"POST",
	url:"index.php?act=4",
	data: "id="+id+"&nama="+nama+"&teken="+teken+"&ket="+ket,
		success: function(data){
	 alert(data);
	$(".p-btn").removeAttr("disabled");
		}
	});
	});
	

	
$(".a-btn").live("click",function(){
	$(this).attr("disabled", "disabled");
var id = $(this).data("id");
var nama = $("#a_"+ id +"_nama").val();
	 $.ajax({
	type:"POST",
	url:"index.php?act=3a",
	data: "id="+id+"&nama="+nama,
		success: function(data){
	 
	alert(data);
	$(".a-btn").removeAttr("disabled");
		}
	});
	});
$(".rt-btn").live("click",function(){
	$(this).attr("disabled", "disabled");
var id = $(this).data("id");
var nama = $("#rt_"+ id +"_nama").val();
var rw = $(this).data("idrw");
	 $.ajax({
	type:"POST",
	url:"index.php?act=2b",
	data: "id="+id+"&nama="+nama+"&idrw="+rw,
		success: function(data){
	 
	alert(data);
	$(".rt-btn").removeAttr("disabled");
		}
	});
	});
	
$(".rw-btn").live("click",function(){
	$(this).attr("disabled", "disabled");
var id = $(this).data("id");
var nama = $("#rw_"+ id +"_nama").val();
	 $.ajax({
	type:"POST",
	url:"index.php?act=2c",
	data: "id="+id+"&nama="+nama,
		success: function(data){
	 
	alert(data);
	$(".rw-btn").removeAttr("disabled");
		}
	});
	});
	
$(".akun-btn").live("click",function(){
	$(this).attr("disabled", "disabled");
var id = $(this).data("id");
var nama = $("#akun_"+ id +"_nama").val();
var pass = $("#akun_"+ id +"_pass").val();
var izin = $("#akun_"+ id +"_izin").val();
	 $.ajax({
	type:"POST",
	url:"index.php?act=5a",
	data: "id="+id+"&nama="+nama+"&pass="+pass+"&izin="+izin,
		success: function(data){
	 
	alert(data);
	$(".akun-btn").removeAttr("disabled");
		}
	});
	});
	
$(".finish").live("click",function(){
	$(this).attr("disabled", "disabled");
var id = $(this).data("id");
	 $.ajax({
	type:"POST",
	url:"index.php?act=5b",
	data: "id="+id,
		success: function(data){

            if(data==0){ alert('Gagal Data Tidak Dapat Ditemukan!') }
			 else if(data==1){ refreshto('500',"index.php?sec=finish"); }
			 else if(data==2){ alert("Gagal, Cek File [fungsi/koneksi.php] !") }
			 else if(data==3){ alert('Lengkapi Semua Data !') }
			
	$(".finish").removeAttr("disabled");
		}
	});
	});
	
	});
	</script>
</body></html>

<?php }

?>