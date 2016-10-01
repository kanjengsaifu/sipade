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

if (!isset($_POST['tipe'])){
echo "1";
}
else {
include "fungsi/koneksi.php";
include "fungsi/fungsi_indotgl.php";
if ($_POST['tipe']=="1"){ // Backup Data Penduduk = 1

		$TGLFOLDER = date('Y');
		$TGLFOLDER2 = date('m');
		$cachefolder = "backup/".$TGLFOLDER."/".$TGLFOLDER2;
		$cachefolderdis = "backup\\".$TGLFOLDER."\\".$TGLFOLDER2;
		$namafile = "Pen-" . date('Y_m_d').".csv";
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
		$arr .="Id_pen;Noomor KK;Alamat;RT;RW;Nama Lengkap;Nomor Induk Kependudukan;Jenis Kelamin;Golongan Darah;Tempat Lahir;Tanggal Lahir;Agama;Pendidikan;Pekerjaan;Status;Status Dalam Keluarga;Kewarganegaraan;Paspor;Kitas - Kitap;Nama Lengkap Ayah;Nama Lengkap Ibu;Wafat;Status Data;Tanggal Data \n";
		$arr .="1;2;3;4;5;6;7;8;9;10;11;12;13;14;15;16;17;18;19;20;21;22;23 \n";
		while($a=mysql_fetch_array($result)){
		 $arr .=$a['id_pen'].";".$a['no_kk_pen'].";".$a['alamat_pen'].";".$a['rt_pen'].";".$a['rw_pen'].";".$a['nama_pen'].";".$a['no_pen'].";".$a['kelamin_pen'].";".$a['goldar_pen'].";".$a['tempat_lahir_pen'].";".
		 $a['tanggal_lahir_pen'].";".$a['agama_pen'].";".$a['pendidikan_pen'].";".$a['pekerjaan_pen'].";".$a['status_pen'].";".$a['status_hdk_pen'].";".$a['kewarganegaraan_pen'].";".$a['paspor_pen'].";".
		 $a['kitas_kitap_pen'].";".$a['ayah_pen'].";".$a['ibu_pen'].";".$a['wafat'].";".$a['statusnya'].";".$a['tgl_data']."\n"; 

		}
		}
		
  $document = file_get_contents("backup/template.csv");
  $document = str_replace("%%DATA%%", $arr, $document);
			

	$fp = fopen($cachefile, 'w');
	fwrite($fp, $document);
	fclose($fp);
	ob_end_flush(); 
	
	echo "<b>Data Berhasil Di Backup</b><hr/>	Lokasi penyimpanan : <code>".getenv('HOME')."\\www\\sipaderw2\\".$cachefolderdis."\\".$namafile."</code>";
	}
elseif($_POST['tipe']=="2"){ // Backup Data Pelayanan = 2
 // Backup Data Penduduk = 1

		$TGLFOLDER = date('Y');
		$TGLFOLDER2 = date('m');
		$cachefolder = "backup/".$TGLFOLDER."/".$TGLFOLDER2;
		$cachefolderdis = "backup\\".$TGLFOLDER."\\".$TGLFOLDER2;
		$namafile = "PeL-" . date('Y_m_d').".csv";
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
		$arr .="%%DATA%%";
		}
		
  $document = file_get_contents("backup/template.csv");
  $document = str_replace("%%DATA%%", $arr, $document);
			

	$fp = fopen($cachefile, 'w');
	fwrite($fp, $document);
	fclose($fp);
	ob_end_flush(); 
	
	echo "<b>Data Berhasil Di Backup</b><hr/>	Lokasi penyimpanan : <code>".getenv('HOME')."\\www\\sipaderw2\\".$cachefolderdis."\\".$namafile."</code>";
	
}	
}
	
	
	}
	else {
	?>
	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">EKSPOR / BACKUP DATA</h4>
      </div> 
	   <div class="modal-body">
		<div class="alert alert-warning fade in clearfix" style="margin-bottom:10px;"  data-dismiss="alert" >
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<span class="glyphicon glyphicon-exclamation-sign"></span> File hasil Ekspor/Backup juga dapat digunakan untuk impor data masal.
		</div>
		<div class="alert alert-info" id="alertdata">
		<form action="backup.php?act=backup" id="formbackup" method="POST">
		<b>Silahkan Pilih Data : </b> 
		
		
		<select name="tipe" style="width:300px;" data-validation="number" data-validation-error-msg="&nbsp;?&nbsp;&nbsp; : Pilih salah satu !">
		<option disabled selected>  </option>
		<option value="1"> Data Penduduk </option>
		<option value="2"> Data Pelayanan</option>
		</select>
		<button type="submit" class="btn btn-primary" id="btnbackup">Backup</button>		
		</form>
		<hr/>Fitur ini dapat  di set untuk mengingatkan Backup Data secara otomatis (/tanggal 01) setiap bulannya melalui pengaturan Backup.
			</div>
 <div class="modal-footer"> 
		<button type="button" class="btn btn-default" data-dismiss="modal" style="float:right; clear:both;">Tutup</button> 
       </div> 
	   
			
  <script src="rakstrap/js/jquery.form-validator.js"></script>
<script>
  $.validate({ 
    validateOnBlur : true // disable validation when input looses focus 
 
  });
  
</script> 
	   <script ='text/javascript'> 
$("#formbackup").submit(function (ev) {
	var btn = $("#btnbackup")
    btn.button('loading')
    if ($('.error').length > 0) {
	modalalert('#alert','warning','Data yang akan di Export belum di tentukan, silahkan periksa lagi !'); 
    btn.button('reset')
        }
		else { 
    var actionurl = $("#formbackup").attr("action");
    var method = $("#formbackup").attr("method");
    var values = $("#formbackup").serialize();
        $.ajax({
            type: method,
            url: actionurl,
            data: values,
            success: function (data) {    
			
            if(data==0){ modalalert('#alert','warning','Data yang akan di Export belum di tentukan, silahkan periksa lagi !'); }	
			else {
			$("#alertdata").html(data);    
			$("#alertdata").removeClass("alert alert-info");
			$("#alertdata").addClass("alert alert-success");
			}
			
			btn.button('reset')			
            },
        error:function(){
              modalreload('#myModal','#reload','danger','Terjadi Galat Kode #AjaxError, SI PA\'DE Akan Menyegarkan Halaman Dalam 5 dtk'); refresh(5000) 
			btn.button('reset') 
		}
        });		
		}		       
		ev.preventDefault(); 	
	
});
</script>
	   <?php
}
}
}
?>