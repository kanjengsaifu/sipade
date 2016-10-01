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
echo "<div class=\"alert alert-danger inner-alert\">
		<span><b>Oops...waktu anda habis</b><br/> Sesi anda terbatas, <a href=\"auth\">muat ulang</a> dan masuk/login terlebih dahulu !</span>
		</div> ";
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
?>
 
 <?php 

if (isset($_GET['no_kk'])){ 
 
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM kk where no_kk='$_GET[no_kk]'"));
	
			  if ($jmldata > 0){} else {header('location:404.php'); }  
				   ?>
	 

  <script>  
  $(document).ready(function() {
    $(".btnPrint").printPage();
  });
  </script> 
		<div class="modal-content" id="myModalcont">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">PENCETAK KARTU KELUARGA</h4>
			</div> 
	   <div class="modal-body">
			<div class="alert alert-info fade in" style="margin-bottom:10px;"  data-dismiss="alert" >
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<span class="glyphicon glyphicon-exclamation-sign"></span> Silahkan klik tombol dibawah ini untuk mulai memproses dokumen.
			</div>
			<br/>
		<p>PRINT/CETAK : 
		<?php  
		
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

  
			  
  $p      = new Listpen; 
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);
  $hasildata  = mysql_query($penduduk);
  $jmldata = mysql_num_rows($hasildata);
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas); 
  
     for ($i=1; $i<=$jmlhalaman; $i++){
     echo " <a class='btnPrint btn btn-primary' href='print-hal-$i-$_GET[no_kk]'>Hal. $i</a> ";
    }
	?>
	</p><br/>
	  </div> 
 <div class="modal-footer">
 
</div>
       </div>
  <?php
}
else {header('location:404.php');}
}
}
?>