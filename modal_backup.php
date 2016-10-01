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
if ($_GET['act']=="backup"){

if (!isset($_GET['tipe'])){
echo "1";
}
else {
include "fungsi/koneksi.php";
include "fungsi/fungsi_indotgl.php";
if ($_GET['tipe']=="1"){ // Backup Data

?>
<div class="modal-header">
        <h4 class="modal-title">BACKUP DATA OTOMATIS</h4>
      </div> 
	   <div class="modal-body">
		<div class="alert alert-warning fade in clearfix" id="alertwarning" style="margin-bottom:10px;">
			<span class="glyphicon glyphicon-exclamation-sign"></span><b> SIPA'DE MENGABARKAN</B><br/>SIPA'DE telah melakukan Backup otomatis, dengan begitu SIPA'DE  Dapat membantu anda kembali dalam melayani Masyarakat. 
		</div>
		<div class="alert alert-success" id="alertdata">
		<?php
		$TGLFOLDER = date('Y');
		$TGLFOLDER2 = date('m')-1;
		$TGLFOLDER2 = "0".$TGLFOLDER2;
		$cachefolder = "backup/".$TGLFOLDER."/".$TGLFOLDER2;
		$cachefolderdis = "backup\\".$TGLFOLDER."\\".$TGLFOLDER2;
		$namafile = "Pen-" . date('Y')."_$TGLFOLDER2.csv";
	if (!file_exists($cachefolder)) {
		mkdir($cachefolder, 0777, true);
		$cachefile = $cachefolder."/".$namafile;
	}
	else {
		$cachefile = $cachefolder."/".$namafile;
	}
	ob_start();  
		
		$arr = null;
		$result = mysql_query("SELECT * FROM penduduk ORDER BY id_pen");
		if(mysql_num_rows($result) > 0){
		$arr .="Id_pen;Noomor KK;Alamat;RT;RW;Nama Lengkap;Nomor Induk Kependudukan;Jenis Kelamin;Golongan Darah;Tempat Lahir;Tanggal Lahir;Agama;Pendidikan;Pekerjaan;Status;Status Dalam Keluarga;Kewarganegaraan;Paspor;Kitas - Kitap;Nama Lengkap Ayah;Nama Lengkap Ibu;Wafat;Status Data \n";
		$arr .="1;2;3;4;5;6;7;8;9;10;11;12;13;14;15;16;17;18;19;20;21;22;23 \n";
		while($a=mysql_fetch_array($result)){
		 $arr .=$a['id_pen'].";".$a['no_kk_pen'].";".$a['alamat_pen'].";".$a['rt_pen'].";".$a['rw_pen'].";".$a['nama_pen'].";".$a['no_pen'].";".$a['kelamin_pen'].";".$a['goldar_pen'].";".$a['tempat_lahir_pen'].";".
		 $a['tanggal_lahir_pen'].";".$a['agama_pen'].";".$a['pendidikan_pen'].";".$a['pekerjaan_pen'].";".$a['status_pen'].";".$a['status_hdk_pen'].";".$a['kewarganegaraan_pen'].";".$a['paspor_pen'].";".
		 $a['kitas_kitap_pen'].";".$a['ayah_pen'].";".$a['ibu_pen'].";".$a['wafat'].";".$a['statusnya']."\n"; 

		}
		}
		
  $document = file_get_contents("backup/template.csv");
  $document = str_replace("%%DATA%%", $arr, $document);
			

	$fp = fopen($cachefile, 'w');
	fwrite($fp, $document);
	fclose($fp);
	ob_end_flush(); 
	
	echo "<b>Data Berhasil Di Backup</b><hr/>	Lokasi penyimpanan data Penduduk : <code>".getenv('HOME')."\\www\\sipaderw2\\".$cachefolderdis."\\".$namafile."</code>";
		$TGLFOLDER = date('Y');
		$TGLFOLDER2 = date('m')-1;
		$TGLFOLDER2 = "0".$TGLFOLDER2;
		$cachefolder = "backup/".$TGLFOLDER."/".$TGLFOLDER2;
		$cachefolderdis = "backup\\".$TGLFOLDER."\\".$TGLFOLDER2;
		$namafile = "Pel-" . date('Y')."_$TGLFOLDER2.csv";
	if (!file_exists($cachefolder)) {
		mkdir($cachefolder, 0777, true);
		$cachefile = $cachefolder."/".$namafile;
	}
	else {
		$cachefile = $cachefolder."/".$namafile;
	}
	ob_start();  
		
		$arr = null;
		$result = mysql_query("SELECT * FROM pelayanan ORDER BY id");
		if(mysql_num_rows($result) > 0){
		$arr .="Id;No;No_pen;Tanggal;Jam;Nama Lengkap;Tanggal Lahir;Jenis Kelamin;Agama;Pekerjaan;Alamat;Jenis surat;Keterangan;Pembuat \n";
		$arr .="1;2;3;4;5;6;7;8;9;10;11;12;13;14 \n";
		while($a=mysql_fetch_array($result)){
		 $arr .=$a['id'].";".$a['no'].";".$a['no_pen'].";".$a['tgl'].";".$a['jam'].";".$a['nl'].";".$a['tgl_lhr'].";".$a['jk'].";".$a['agm'].";".$a['kerja'].";".
		 $a['almt'].";".$a['js'].";".$a['ket'].";".$a['uname']."\n"; 

		}
		}
		
  $document = file_get_contents("backup/template.csv");
  $document = str_replace("%%DATA%%", $arr, $document);
			

	$fp = fopen($cachefile, 'w');
	fwrite($fp, $document);
	fclose($fp);
	ob_end_flush(); 
	
	echo "<br/>Lokasi penyimpanan data Pelayanan : <code>".getenv('HOME')."\\www\\sipaderw2\\".$cachefolderdis."\\".$namafile."</code>";
	
	?>
			</div>
 <br/>
		<div class="alert alert-info">
		*) Fitur ini dapat dinonaktifkan melalui pengaturan Backup.
		</div>
 <div class="modal-footer"> 
		<button type="button" class="btn btn-default" data-dismiss="modal" style="float:right; clear:both;">Tutup</button> 
		
       </div> 
	   <?php
}	
}
	
	
	}
	else {
	
	echo "SIPA'DE Tidak Mengerti Perintah Yang Digunakan";
}
}
}
?>