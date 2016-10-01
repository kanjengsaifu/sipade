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
 echo '
<div class="modal-content" id="myModalcont">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">PENCETAK FORMULIR KARTU KELUARGA</h4>
			</div> 
	   <div class="modal-body">
			<div class="alert alert-danger fade in" style="margin-bottom:10px;">
			<span class="glyphicon glyphicon-exclamation-sign"></span> Anda tidak dalam keadaan login, silahkan masuk/login terlebih dahulu. 
			</div>
		
	  </div> 
 <div class="modal-footer">
    <a href="inc/logout.php" style="float:right;" class="btn btn-primary"> LOGIN</a>&nbsp;
	 <div class="clearfix"></div>
		</div>
       </div>';
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
if ($_GET['no_kk']=='N'){ 
?>
<div class="modal-content" id="myModalcont">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">PENCETAK FORMULIR KARTU KELUARGA</h4>
			</div> 
	   <div class="modal-body">
			<div class="alert alert-warning fade in" style="margin-bottom:10px;">
			<span class="glyphicon glyphicon-exclamation-sign"></span> Ada data wajib yang belum terisi / tidak terverifikasi, silahkan cek dan coba lagi. 
			</div>
		
	  </div> 
 <div class="modal-footer">
    <button type="button" style="float:right;" class="btn btn-default"  data-dismiss="modal"> TUTUP</button>&nbsp;
	 <div class="clearfix"></div>
		</div>
       </div>
<?php
}
else {
 
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM kk where no_kk='$_GET[no_kk]'"));
	
			  if ($jmldata > 0){} else {echo '<div class="modal-content" id="myModalcont">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">PENCETAK FORMULIR KARTU KELUARGA</h4>
			</div> 
	   <div class="modal-body">
			<div class="alert alert-warning fade in" style="margin-bottom:10px;">
			<span class="glyphicon glyphicon-exclamation-sign"></span> Nomor KK tidak terverifikasi, silahkan cek dan coba lagi. 
			</div>
		
	  </div> 
 <div class="modal-footer">
    <button type="button" style="float:right;" class="btn btn-default"  data-dismiss="modal"> TUTUP</button>&nbsp;
	 <div class="clearfix"></div>
		</div>
       </div>'; }  
				   ?>
	 

  <script>  
  $(document).ready(function() {
    $(".btnPrint").printPage();
  });
  $('.ifload').on('load', function(){
   $('#ifloading').hide();
        $('#ifload').slideDown();
    });
  </script> 
		<div class="modal-content" id="myModalcont">
			<div class="modal-header"> 
			<h4 class="modal-title">PENCETAK FORMULIR KARTU KELUARGA</h4>
			</div> 
	   <div class="modal-body">
			<div class="alert alert-info fade in" style="margin-bottom:10px;"  data-dismiss="alert" >
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<span class="glyphicon glyphicon-exclamation-sign"></span> Silahkan klik tombol dibawah ini untuk mulai memproses dokumen.
			</div>
			<br/>
			
			<p>
			<div  id="ifloading" class='progress progress-striped active'>
		<div class='progress-bar'  role='progressbar' aria-valuenow='45' aria-valuemin='0' aria-valuemax='100' style='width: 100%'></div>
		</div>
		</p>
		<p id="ifload" style="display:none">PRINT/CETAK : 
		<?php  
			$hdkpen = mysql_num_rows(mysql_query("SELECT * FROM penduduk where no_kk_pen='$_GET[no_kk]' AND status_hdk_pen='1'"));
	
			  if ($hdkpen=="1"){ //ada satu pen yang berstatus kep. kk
	
$kepalakeluarga=mysql_query("SELECT * FROM  penduduk,arsip_alamat,arsip_rw,arsip_kelamin,arsip_agama 
							where arsip_alamat.id_alamat=penduduk.alamat_pen
							AND arsip_rw.id_rw=penduduk.rw_pen
							AND arsip_kelamin.id_kelamin=penduduk.kelamin_pen
							AND arsip_agama.id_agama=penduduk.agama_pen
							AND status_hdk_pen='1'
							AND no_kk_pen='$_GET[no_kk]'");
$k=mysql_fetch_array($kepalakeluarga);

 $nokk = $k['no_kk_pen'];
 $noid = $k['no_pen'];
 $namakk = $k['nama_pen'];
 $alamatkk = $k['alamat'];
 $alamatrtkk = $k['rt_pen']; 
 $alamatrwkk = $k['rw'];
 $tgllhrkk = $k['tanggal_lahir_pen'];
 $jkkk = $k['kelamin'];
 $agmkk = $k['agama'];
 $kerjakk = $k['pekerjaan_pen'];
 $kepalakeluarga = "1"; //ada kepala keluarga 
 }
			  elseif ($hdkpen > 1){ //ada lebih dari satu pen yang berstatus kep. kk
	
$kepalakeluarga=mysql_query("SELECT * FROM  penduduk,arsip_alamat,arsip_rw,arsip_kelamin,arsip_agama 
							where arsip_alamat.id_alamat=penduduk.alamat_pen
							AND arsip_rw.id_rw=penduduk.rw_pen
							AND arsip_kelamin.id_kelamin=penduduk.kelamin_pen
							AND arsip_agama.id_agama=penduduk.agama_pen
							AND status_hdk_pen='1'
							AND no_kk_pen='$_GET[no_kk]'");
$k=mysql_fetch_array($kepalakeluarga);

 $nokk = $k['no_kk_pen'];
 $noid = $k['no_pen'];
 $namakk = $k['nama_pen'];
 $alamatkk = $k['alamat'];
 $alamatrtkk = $k['rt_pen']; 
 $alamatrwkk = $k['rw'];
 $tgllhrkk = $k['tanggal_lahir_pen'];
 $jkkk = $k['kelamin'];
 $agmkk = $k['agama'];
 $kerjakk = $k['pekerjaan_pen'];
 $kepalakeluarga = "2"; //ada banyak kepala keluarga 
 }
 
else {
$querycekk=mysql_query("SELECT * FROM kk,arsip_alamat,arsip_rw  WHERE arsip_alamat.id_alamat=kk.alamat
							AND arsip_rw.id_rw=kk.rw
							AND no_kk='$_GET[no_kk]'");
$k=mysql_fetch_array($querycekk);

 $nokk = $k['no_kk'];
 $noid = '-';
 $namakk = $k['catatan'];
 $alamatkk = $k['alamat'];
 $alamatrtkk = $k['rt']; 
 $alamatrwkk = $k['rw'];
 $tgllhrkk = '0000-00-00';
 $jkkk = '-';
 $agmkk = '-';
 $kerjakk = '-';
 $kepalakeluarga = "0"; //tidak ada kepala keluarga
 }
   
$DBTGLBUAT = date('y-m-d');

  $ALMT = "$alamatkk RT. 0$alamatrtkk / RW. 0$alamatrwkk";
	//simpankedb
if(mysql_query("INSERT INTO pelayanan(no_pen, tgl, nl, tgl_lhr, jk, agm, kerja, almt, js, ket, uname)
   VALUES('$noid', '$DBTGLBUAT', '$namakk', '$tgllhrkk', '$jkkk', '$agmkk', '$kerjakk', '$ALMT', 'KK', '$_GET[no_kk]', '$_SESSION[namauser]')")){
   
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
  	 
	 
		$TGLBUAT = date('d-m-Y');
		
$TGLNAMAFILE = tglnmfile("$TGLBUAT");
		$TGLFOLDER = date('Y');
		$TGLFOLDER2 = date('m');
		$cachefolder = "arsip_surat/".$TGLFOLDER."/".$TGLFOLDER2;
     for ($i=1; $i<=$jmlhalaman; $i++){
	?>
	<iframe class="ifload" style="display:none;" src="template_surat/f-1_proses.php?no_kk=<?php echo $_GET['no_kk']; ?>&hal=<?php echo $i; ?>" name="printkk<?php echo $i; ?>"></iframe>
	<?php
	$cachefile = $cachefolder."/".$TGLNAMAFILE."-KK-".$_GET['no_kk']."hal".$i.".xls";
	 
			  $link = "$cachefile";
		 
     echo " <a class='btn btn-primary' href='$link'>Hal. $i</a> ";
    }
	
	}
	?>
	</p><br/>
	  </div> 

 <div class="modal-footer">
    <button type="reset"  onclick="refresh(1000)"  style="float:right;" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-trash"></span> SELESAI</button>&nbsp;
	 <div class="clearfix"></div>
		</div>
       </div>
  <?php
}
}
else { echo '<div class="modal-content" id="myModalcont">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">PENCETAK FORMULIR KARTU KELUARGA</h4>
			</div> 
	   <div class="modal-body">
			<div class="alert alert-warning fade in" style="margin-bottom:10px;">
			<span class="glyphicon glyphicon-exclamation-sign"></span> Ada data wajib yang belum terisi / tidak terverifikasi, silahkan cek dan coba lagi. 
			</div>
		
	  </div> 
 <div class="modal-footer">
    <button type="button" style="float:right;" class="btn btn-default"  data-dismiss="modal"> TUTUP</button>&nbsp;
	 <div class="clearfix"></div>
		</div>
       </div>';
	   }
}
}
?>