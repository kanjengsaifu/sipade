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
  header('location:auth');
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
include "inc/pengaturan.php";
?>
 
 <?php 

if (isset($_GET['no_kk'])){ 
 
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM kk where no_kk='$_GET[no_kk]'"));
	
			  if ($jmldata > 0){} else {header('location:404.php'); }  
				   ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>SI PA'DE | Sistem Informasi Pelayanan Desa</title>
	<link rel="shortcut icon" href="images/favicon.gif">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">  
  <link href="rakstrap/css/loadingindicator.css" rel="stylesheet">
	<link type="text/css" href="rakstrap/css/style.css" rel="stylesheet">     
</head>
<body class="pace-done">
<div style="margin:0 auto; width:90%; min-width:900px;">
<div style="width: 90%; font-size: 80px; opacity: 0.1; text-align: center; z-index: 99999999; color: rgb(000, 000, 000); position: absolute; height: 450px; line-height: 85px; top: 150px;"><span style="font-size:50px;">BUKAN KARTU IDENTITAS</span><br>
!!!<br/>DIBUAT OLEH PETUGAS DESA <?php echo $RULEDESA; ?><br/><sup style="font-size:24px; line-height:30px;">MELALUI SI PA'DE - <?php echo $tgl_skrg."/".$bln_sekarang."/".$thn_sekarang; ?></sup></div>

<div class="header clearfix">
<?php

	$cekkk = mysql_num_rows(mysql_query("SELECT * FROM penduduk where no_kk_pen='$_GET[no_kk]'"));
	
			  if ($cekkk > 0){
			  
	$hdkpen = mysql_num_rows(mysql_query("SELECT * FROM penduduk where no_kk_pen='$_GET[no_kk]' AND status_hdk_pen='1'"));
	
			  if ($hdkpen=="1"){ //ada satu pen yang berstatus kep. kk
	
$kepalakeluarga=mysql_query("SELECT * FROM  penduduk,arsip_alamat,arsip_rw 
							where arsip_alamat.id_alamat=penduduk.alamat_pen
							AND arsip_rw.id_rw=penduduk.rw_pen
							AND status_hdk_pen='1'
							AND no_kk_pen='$_GET[no_kk]'");
$k=mysql_fetch_array($kepalakeluarga);

 $nokk = $k['no_kk_pen'];
 $namakk = $k['nama_pen'];
 $alamatkk = $k['alamat'];
 $alamatrtkk = $k['rt_pen']; 
 $alamatrwkk = $k['rw'];
 $detectRT=mysql_query("SELECT * FROM  penduduk,arsip_rt 
							where arsip_rt.id_rw=penduduk.rw_pen
							AND arsip_rt.rt=penduduk.rt_pen
							AND status_hdk_pen='1'
							AND no_kk_pen='$_GET[no_kk]'");
$rt=mysql_fetch_array($detectRT);
$nama_rt = $rt['nama_ketua_rt'];
 $alamatdesakk = $k['desa'];
 $alamatkeckk = $k['kecamatan'];
 $alamatkabkk = $k['kabupaten_kota'];
 $alamatprovkk = $k['provinsi'];
 $alamatkodeposkk = $k['kode_pos'];
 $kepalakeluarga = "1"; //ada kepala keluarga 
 }
			  elseif ($hdkpen > 1){ //ada lebih dari satu pen yang berstatus kep. kk
	
$kepalakeluarga=mysql_query("SELECT * FROM  penduduk,arsip_alamat,arsip_rw 
							where arsip_alamat.id_alamat=penduduk.alamat_pen
							AND arsip_rw.id_rw=penduduk.rw_pen
							AND status_hdk_pen='1'
							AND no_kk_pen='$_GET[no_kk]'");
$k=mysql_fetch_array($kepalakeluarga);

 $nokk = $k['no_kk_pen'];
 $namakk = $k['nama_pen'];
 $alamatkk = $k['alamat'];
 $alamatrtkk = $k['rt_pen']; 
 $alamatrwkk = $k['rw'];
 $detectRT=mysql_query("SELECT * FROM  penduduk,arsip_rt 
							where arsip_rt.id_rw=penduduk.rw_pen
							AND arsip_rt.rt=penduduk.rt_pen
							AND status_hdk_pen='1'
							AND no_kk_pen='$_GET[no_kk]'");
$rt=mysql_fetch_array($detectRT);
$nama_rt = $rt['nama_ketua_rt'];
 $alamatdesakk = $k['desa'];
 $alamatkeckk = $k['kecamatan'];
 $alamatkabkk = $k['kabupaten_kota'];
 $alamatprovkk = $k['provinsi'];
 $alamatkodeposkk = $k['kode_pos'];
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
 $namakk = "<span style='background:#df5;'>".$k['catatan']."</span>";
 $alamatkk = $k['alamat'];
 $alamatrtkk = $k['rt']; 
 $alamatrwkk = $k['rw'];
 $detectRT=mysql_query("SELECT * FROM  kk,arsip_rt 
							where arsip_rt.id_rw=kk.rw
							AND arsip_rt.rt=kk.rt
							AND no_kk='$_GET[no_kk]'");
$rt=mysql_fetch_array($detectRT);
$nama_rt = $rt['nama_ketua_rt'];
 $alamatdesakk = $rule['desa'];
 $alamatkeckk = $rule['kecamatan'];
 $alamatkabkk = $rule['kabupaten'];
 $alamatprovkk = $rule['provinsi'];
 $alamatkodeposkk = $rule['kodepos'];
 $kepalakeluarga = "0"; //tidak ada kepala keluarga
 }
}   
?>
     
<div class="row">
  <div class="col-md-4"><img src="images/logoloading.png" style="width:100px; margin:0 5px 5px 0"></div>
  <div class="col-md-4" style="text-align:center;"><h2>KARTU KELUARGA</h2></div>
  <div class="col-md-4" style="text-align:right;">
<h2> No. <?php echo "$nokk";?></h2>
</div> 
</div> 
  
    
    <div class="clear"> </div>
<div class="informasi" style="padding:5px 10px;">
    <div class="headl2"><table border="0" width="100%">
  <tbody><tr>
    <td width="9%">&nbsp;</td>
    <td width="39%">Nama Kepala Keluarga</td>
    <td width="4%">:</td>
    <td width="48%"><?php echo "$namakk";?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Alamat</td>
    <td>:</td>
    <td><?php echo "$alamatkk";?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>RT/RW</td>
    <td>:</td>
    <td><?php echo "$alamatrtkk / $alamatrwkk";?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Desa/Keluarahan</td>
    <td>:</td>
    <td><?php echo "$alamatdesakk";?></td>
  </tr>
</table>
</div>
    <div class="headc2"><br>
</div>
    <div class="headr2" style="float:right;">
   
    <table width="100%" border="0">
  <tr>
    <td width="20%">&nbsp;</td>
    <td width="36%">Kecamatan</td>
    <td width="4%">:</td>
    <td width="40%"><?php echo "$alamatkeckk";?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Kabupaten/Kota</td>
    <td>:</td>
    <td><?php echo "$alamatkabkk";?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Kode Pos</td>
    <td>:</td>
    <td><?php echo "$alamatkodeposkk";?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Provinsi</td>
    <td>:</td>
    <td><?php echo "$alamatprovkk";?></td>
  </tr>
</table>
    </div> 
     <div class="clear"></div> 
     </div>
    
     <div class="clear"></div>
      <?php if($kepalakeluarga == "0"){ //tidak ada kepala keluarga
	 echo "<div class='alert alert-danger' style='text-align:center;'><span class='glyphicon glyphicon-info-sign'></span> Tidak ada satupun yang berstatus <b>kepala keluarga</b>, tetapkan salah satu data dibawah ini sebagai <b>kepala keluarga</b></div><hr/>";} 
	 if($kepalakeluarga == "2"){ //ada lebih dari satu kepala keluarga 
	 echo "<div class='alert alert-danger' style='text-align:center;'><span class='glyphicon glyphicon-info-sign'></span> Ada lebih dari satu yang berstatus <b>kepala keluarga</b>, ubah dan sisakan satu data dibawah ini sebagai <b>kepala keluarga</b></div><hr/>";} 
	  ?>
	 </div>
	  
       <table class="list" border="0" width="100%">
  
            <tr class="subtitle">
            
           <td width="3%">No.</td> 
           <td>Nama Lengkap</td>
           <td>NIK</td>
           <td>Jns Kelamin</td>
           <td>Tpt Lahir</td>
           <td>Tgl Lahir</td>
           <td>Agama</td>
           <td>Pendidikan</td>
           <td>Jenis Pekerjaan</td>
            </tr>
         <tbody><tr class="subtitle">
           <td>-</td>
           <td>(1)</td>
           <td>(2)</td>
           <td>(3)</td>
           <td>(4)</td>
           <td>(5)</td>
           <td>(6)</td>
           <td>(7)</td>
           <td>(8)</td>
         </tr>
         </tbody><tbody id="dataanggota">
         <?php 
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

  
			  
  $p      = new Listpen; 
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);
  $hasildata  = mysql_query($penduduk);
  $jmldata = mysql_num_rows($hasildata);
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas); 
$penduduk .= " ORDER BY status_hdk_pen, DATE_FORMAT(tanggal_lahir_pen, '%Y-%m-%d') LIMIT $posisi,$batas";

  $penduduk  = mysql_query($penduduk);
  $jmldatatr = mysql_num_rows($penduduk);
	$no=1;
	
	while($p=mysql_fetch_array($penduduk)){	
	$tgllahir = tgl_indo2($p['tanggal_lahir_pen']);
	
		if ($p['statusnya']!="4") {
			$NIK = $p['no_pen'];
		}
		else { $NIK = ""; }
	
		if ($p['statusnya']=="3") {
		echo "<tr class='sts2_kuning' data-id='$no' id='datafirst$no' onmouseover=\"document.getElementById('datasecond$no').className='sts2_kuning highlight';\"
            onmouseout=\"document.getElementById('datasecond$no').className='sts2_kuning';\" title='Info : Sudah Wafat'>";
		}
		elseif ($p['statusnya']=="2") {
		echo "<tr class='sts2_hijau' data-id='$no' id='datafirst$no' onmouseover=\"document.getElementById('datasecond$no').className='sts2_hijau highlight';\"
            onmouseout=\"document.getElementById('datasecond$no').className='sts2_hijau';\" title='Info : Sudah Pindah'>";
		}
		else {
		echo "<tr class='sts2_std' data-id='datasecond$no' id='datafirst$no' onmouseover=\"document.getElementById('datasecond$no').className='sts2_std highlight';\"
            onmouseout=\"document.getElementById('datasecond$no').className='sts2_std';\">";
		}
		 echo "
           <td class='nomor'>$no</td>
           <td>$p[nama_pen]</td>
           <td>$NIK</td>
           <td>$p[kelamin]</td>
           <td>$p[tempat_lahir_pen]</td>
           <td>$tgllahir</td>
           <td>$p[agama]</td>
           <td>$p[pendidikan]</td>
           <td>$p[pekerjaan]</td>
         </tr>";
		 	
	$no++;
	}
	
	if ($jmldatatr < $batas) {
	$jmltr = $batas-$jmldatatr;
	$jmltrmulai = $jmldatatr+1;
     for ($i=$jmltrmulai; $i<=$batas; $i++){
     
        echo "<tr>
           <td class='nomor'>$i</td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
         </tr>";
    }	
	}
	
	}
	else { echo "<tr><td colspan='10'><div class='alert alert-warning'><p align='center'>Tidak ada satupun data dalam [ kk ] ini, silahkan tambahkan data. awali dengan menambahkan data (kepala keluarga), lanjutkan dengan menambah data (anggota).</p></div></td></tr>";}
	
         ?>  
         <tr>
          
         </tbody>
       </table>
	   
	<hr/>
    <div class="clearfix"></div>
       <table class="list" border="0" width="100%">
            <tr class="subtitle"> 
              <td rowspan="2" width="3%"><br>
              No.</td>
              <td rowspan="2" width="15%"><br>
              Status Perkawinan</td>
              <td rowspan="2" width="13%"><br>
              Status HDK</td>
              <td rowspan="2" width="13%"><br>
              Kewarganegaraan</td>
              <td colspan="2">Dokumen Imigrasi</td>
              <td colspan="2">Nama Orang Tua</td>
            </tr>
            <tr class="subtitle">
            
           <td width="12%">No. Paspor</td>
           <td width="12%">No. KITAS/KITAP</td>
           <td width="15%">Ayah</td>
           <td width="15%">Ibu</td>
           </tr>
         <tbody><tr class="subtitle"> 
           <td>-</td>
           <td>(9)</td>
           <td>(10)</td>
           <td>(11)</td>
           <td>(12)</td>
           <td>(13)</td>
           <td>(14)</td>
           <td>(15)</td>
         </tr>
		 </tbody>
		 <tbody id="dataanggota2">
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
	$no=1;
	while($p=mysql_fetch_array($penduduk2)){	
	$tgllahir = tgl_indo($p['tanggal_lahir_pen']);
	
		if ($p['statusnya']=="3") {
		echo "<tr class='sts2_kuning' id='datasecond$no' onmouseover=\"document.getElementById('datafirst$no').className='sts2_kuning highlight';\"
            onmouseout=\"document.getElementById('datafirst$no').className='sts2_kuning';\" title='Info : Sudah Wafat'>";
		}
		elseif ($p['statusnya']=="2") {
		echo "<tr class='sts2_hijau' id='datasecond$no' onmouseover=\"document.getElementById('datafirst$no').className='sts2_hijau highlight';\"
            onmouseout=\"document.getElementById('datafirst$no').className='sts2_hijau';\" title='Info : Sudah Pindah'>";
		}
		else {
		echo "<tr class='sts2_std' id='datasecond$no' onmouseover=\"document.getElementById('datafirst$no').className='sts2_std highlight';\"
            onmouseout=\"document.getElementById('datafirst$no').className='sts2_std';\">";
		}
	echo " 
           <td class='nomor'><span class='casesecond'>$no</span></td>
           <td>$p[status]</td>
           <td>$p[status_hdk]</td>
           <td>$p[kewarganegaraan]</td>
           <td>$p[paspor_pen]</td>
           <td>$p[kitas_kitap_pen]</td>
		   <td>$p[ayah_pen]</td>
		   <td>$p[ibu_pen]</td>
          </tr>";
		  $no++;
	}
	
	
	if ($jmldatatr < $batas) {
	$jmltr = $batas-$jmldatatr;
	$jmltrmulai = $jmldatatr+1;
     for ($i=$jmltrmulai; $i<=$batas; $i++){
     
        echo "<tr>
           <td class='nomor'>$i</td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td> 
         </tr>";
    }	
	}
	}
	else { echo "<tr><td colspan='10'><div class='alert alert-warning'><p align='center'>Tidak ada satupun data dalam [ kk ] ini, silahkan tambahkan data. awali dengan menambahkan data (kepala keluarga), lanjutkan dengan menambah data (anggota).</p></div></td></tr>";}
	
	?>
		  	   
       </tbody></table>
	   <div class="clearfix"></div> 
<div class="footer clearfix" style="margin-top:0px;"><div style="float:left; width:300px; text-align:left;">Bagian : 
<div class="btn-group dropup">
    <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" style="height:25px; padding:2px; font-size:12px;">
    &nbsp;&nbsp; <?php echo $_GET['hal']; ?>  &nbsp;&nbsp;
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu pull-right">
	<?php  
     for ($i=1; $i<=$jmlhalaman; $i++){
     
        echo "<li class='"; 	if($_GET['hal']==$i){echo "filter disabled";} echo "'><a href='print-hal-$i-$_GET[no_kk]'>$i</a></li>";
    }
	?>
	</ul>
	</div> dari : <span class="btn btn-default" style="height:25px; padding:2px; font-size:12px;">&nbsp;&nbsp; <?php echo $jmlhalaman; ?> &nbsp;&nbsp;&nbsp;</span> | <?php echo " Per-Tanggal : ".date("d / m / Y"); ?> </div><div style="float:right; width:300px; text-align:right;">SI PA'DE | Sistem Informasi Pelayanan Desa <br></div></div>

	 

	
<script src="rakstrap/jquery-2.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script> 
<script src="rakstrap/js/pace.min.js"></script>
	
</body></html>
  <?php
}
else {header('location:404.php');}
}
}
?>