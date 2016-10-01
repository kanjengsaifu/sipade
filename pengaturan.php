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
include "fungsi/ubahkarakter.php"; 
include "inc/pengaturan.php"; 
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>SI PA'DE | Sistem Informasi Pelayanan Desa</title>
	<link rel="shortcut icon" href="images/favicon.gif">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">  
	<link type="text/css" href="rakstrap/css/style.css" rel="stylesheet">    
<link rel="stylesheet" href="rakstrap/css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
  <link href="rakstrap/css/loadingindicator.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
</head>

<body class="pace-done">
<?php include "inc/ui_top_panel.php"; ?>
<?php if($_SESSION[leveluser]=='0'){ ?>
<div class="container clearfix">
<div class="header clearfix">

<div class="row">
  <div class="col-md-4"><h2>#Pengaturan</h2></div>
  <div class="col-md-4" style="text-align:center;"><h1>PENGATURAN SI PA'DE</h1></div>
  <div class="col-md-4" style="text-align:right;"> 
</div> 

</div>
    
    <div class="clear"> </div><hr>
<div class="informasi" align="center"> [?] Tips Pelayanan : Hindari kesalahan data dengan lebih teliti dan waspada. Ikuti prosedur yang berlaku. 
     <div class="clear"></div> 
     </div>
    
     <div class="clear"></div>
     <hr> 
	 </div>
	  
     <div class="content clearfix" style="width:295px; float:left; margin:0;">
     <div class="panel panel-primary">
      <div class="panel-heading">
        <h2 class="panel-title" align="center">PILIH LEMBAR PENGATURAN</h2>
      </div>
      <div class="panel-body">
    <div class="btn-group-vertical"  style="width:100%;">
        
   <label class='btn btn-default' id='profil'> 
        <input type='radio' name='surat' value='profil' class='trigger'  data-rel='profil'/> Pengaturan Profil Desa
    </label> 
    <div style='display: none;' class='lembar2 surat_profil info_surat'>Cek dan pastikan pengisian Profil Desa terisi dengan benar.</div> 
	       
   <label class='btn btn-default' id='surat'> 
        <input type='radio' name='surat' value='surat' class='trigger'  data-rel='surat'/> Pelayanan Surat
    </label> 
    <div style='display: none;' class='lembar2 surat_surat info_surat'>Cek dan pastikan pengaturan diset dengan benar.</div> 
   
   <label class='btn btn-default' id='pejabat'> 
        <input type='radio' name='surat' value='pejabat' class='trigger'  data-rel='pejabat'/> Aparatur Desa
    </label> 
    <div style='display: none;' class='lembar2 surat_pejabat info_surat'>Cek dan pastikan data terisi dengan benar.</div> 
   
   <label class='btn btn-default' id='kampung'> 
        <input type='radio' name='surat' value='kampung' class='trigger'  data-rel='kampung'/> Data Kampung
    </label> 
    <div style='display: none;' class='lembar2 surat_kampung info_surat'>Cek dan pastikan data terisi dengan benar.</div> 
	      
		  
   <label class='btn btn-default' id='rtrw'> 
        <input type='radio' name='surat' value='rtrw' class='trigger'  data-rel='rtrw'/> Data RT / RW
    </label> 
    <div style='display: none;' class='lembar2 surat_rtrw info_surat'>Cek dan pastikan data terisi dengan benar.</div> 
		  
   <label class='btn btn-default' id='akun'> 
        <input type='radio' name='surat' value='akun' class='trigger'  data-rel='akun'/> Data Akun
    </label> 
    <div style='display: none;' class='lembar2 surat_akun info_surat'>Cek dan pastikan data terisi dengan benar.</div> 
  
  <label class='btn btn-default' id='backup'> 
        <input type='radio' name='surat' value='backup' class='trigger'  data-rel='backup'/> Backup
    </label> 
    <div style='display: none;' class='lembar2 surat_backup info_surat'>Fitur Backup otomatis.</div> 
	      </div> 
		  
  <div class="panel-footer"> 
  </div>
    </div>
    </div>
     </div>
	 
     <div class="content clearfix" style="width:570px; float:right; margin:0; position:static;"> 

      <table width="100%" style="display: none;" class="list profil lembar2"> <caption>
  <h4>PROFIL DESA TAMANSARI</h4><hr></caption>
       <tbody><tr class="subtitle">
          <td width="18%">&nbsp;</td>
          <td width="3%">&nbsp;</td>
          <td width="27%">&nbsp;</td>
          <td width="22%">&nbsp;</td>
          <td width="3%">&nbsp;</td>
          <td width="27%">&nbsp;</td>
         </tr>
         </tbody><tbody>
           <tr>
             <td>&nbsp;&nbsp;Nama Desa</td>
             <td class="nomor">:</td> 
             <td><input name="desa" id="r_desa" value="<?php echo $RULEDESA; ?>" type="text"></td>
             <td>Kode Desa</td>
             <td>:</td>
             <td><input name="kodedesa" id="r_kodedesa" value="<?php echo $RULEKODEDESA; ?>" type="text"></td>
           </tr>
           <tr>
             <td>&nbsp;&nbsp;Kecamatan</td>
             <td class="nomor">:</td> 
             <td><input name="kecamatan" id="r_kecamatan" value="<?php echo $RULEKEC; ?>" type="text"></td>
             <td>Kode Prov+Kab+Kec</td>
             <td>:</td>
             <td><input name="kodekabupaten" id="r_kodekabupaten" value="<?php echo $RULEKODEPKK; ?>" type="text"></td>
           </tr>
           <tr>
             <td>&nbsp;&nbsp;Kabupaten</td>
             <td class="nomor">:</td> 
             <td><input name="kabupaten" id="r_kabupaten" value="<?php echo $RULEKAB; ?>" type="text"></td>
             <td>Kode Pos</td>
             <td>:</td>
             <td><input name="kodepos" id="r_kodepos" value="<?php echo $RULEKODEPOS; ?>" type="text"></td>             
           </tr>
           <tr>
             <td>&nbsp;&nbsp;Provinsi</td>
             <td class="nomor">:</td> 
             <td><input name="provinsi" id="r_provinsi" value="<?php echo $RULEPROV; ?>" type="text"></td>
             <td>Kepala Desa</td>
             <td>:</td>
             <td><input name="kades" id="r_kades" value="<?php echo $RULEKEPDESA; ?>" type="text"></td>
           </tr>
           <tr>
             <td>&nbsp;&nbsp;Alamat</td>
             <td class="nomor">:</td> 
             <td colspan="4">
             <input name="alamat" id="r_alamat" value="<?php echo $RULEALMT; ?>" style="width:99%;" type="text"></td></tr>
 
		   <tr class="subtitle">
          <td colspan="6">
		  
		<div class="btn-group">
		<button type="submit" name="submit" value="PROSES" id="submitsurat" value="Simpan" data-loading-text="Memproses..." class="btn btn-default r-btn disabled" type="button" id="r_btn">
		<span class="glyphicon glyphicon-floppy-open"></span> PROSES</button> 
		</div>  <input type="checkbox" class="btn btn-primary" id="aktifkan"> Cek Jika Data Sudah Benar
		</td>
         </tr>        
         <tr><td colspan="6"><br>
<hr>
<h3>Profil Desa</h3>
<hr>
    <p><?php echo $RULEDESA; ?> adalah sebuah desa yang berada dalam kawasan kecamatan  <?php echo $RULEKEC; ?> kabupaten <?php echo $RULEKAB; ?> provinsi <?php echo $RULEPROV; ?>, Pemerintahan Desa yang berkantor di <?php echo $RULEALMT; ?> Kec. <?php echo $RULEKEC; ?> ini, memiliki jumlah penduduk mencapai  
	<?php 
$penduduk=mysql_query("SELECT * FROM  penduduk");
  $jmldata = mysql_num_rows($penduduk); 
  echo $jmldata;
  ?>
   jiwa dan saat ini dipimpin oleh seorang kepala desa bernama <?php echo $RULEKEPDESA; ?>. </p>
    </td></tr>

  </tbody></table>
  
  
    <div class="clearfix"></div> 
<table style="display:none;" border="0" class="list surat lembar2"><caption>
  <h4>PENGATURAN SURAT PELAYANAN</h4><hr /></caption>
       <thead>
            <tr>
              <td align="center" valign="middle">No</td>
              <td align="center" valign="middle">Nama Surat</td>
              <td align="center" valign="middle">Singkat</td>
              <td align="center" valign="middle">Keterangan</td>
              <td align="center" valign="middle">JW/bln</td>
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
		 $srt =mysql_query("SELECT * FROM arsip_surat where aktif='Y'");
		 $no=1;
			while ($s = mysql_fetch_array($srt)){
				echo "<tr height='30'>
           				<td class='nomor' width='20'>$no</td>
						<td width='100'><input name='nama_surat' type='text' value='$s[nama_surat]' id='s_$s[id_surat]_nama' style='width:120px;' /></td>
						<td width='30'><input name='singkat_surat' type='text' value='$s[singkat_surat]' id='s_$s[id_surat]_singkat' style='width:30px;' readonly='' data-toggle='tooltip' title='tidak dapat diubah'/></td> 
						<td width='200'><div class='datahide'><textarea name='ket_surat' id='s_$s[id_surat]_ket' style='width:200px; height:80px; border: medium none; font-size:10px; font-family: Tahoma;font-size: 8pt;'>$s[ket_surat]</textarea></div></td>
           				<td class='nomor' width='20'><input name='jw' type='text' value='$s[jw]' id='s_$s[id_surat]_jw' style='width:30px;' /></td>
						<td><button class='btn btn-default btn-xs s-btn' type='button' id='s_btn' data-id='$s[id_surat]'><span class='glyphicon glyphicon-edit'></span>Save</button></td>
					  </tr>";
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
    <div class="clearfix"></div> 
<table style="display:none;" border="0" class="list pejabat lembar2"><caption>
  <h4>PENGATURAN PEJABAT</h4><hr /></caption>
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
           				<td class='nomor' width='20'><input maxlength='1' name='teken' type='text' value='$s[teken]' id='p_$s[id]_teken' style='width:30px;' /></td>
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
  
  
    <div class="clearfix"></div> 
<table style="display:none;" border="0" class="list kampung lembar2"><caption>
  <h4>PENGATURAN KAMPUNG</h4><hr /></caption>
       <thead>
            <tr>
              <td align="center" valign="middle">No</td>
              <td align="center" valign="middle">Nama Kampung</td>
              <td align="center" valign="middle">KODE</td>
              <td align="center" valign="middle">#</td>
           </tr>
        </thead> 
         <tr class="subtitle">
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
                    </tr>
         <tbody>
         <?php 
		 $srt =mysql_query("SELECT * FROM arsip_alamat");
		 $no=1;
			while ($s = mysql_fetch_array($srt)){
				echo "<tr height='30'>
           				<td class='nomor' width='20'>$no</td>
						<td width='100'><input name='nama_alamat' type='text' value='$s[alamat]' id='a_$s[id_alamat]_nama' style='width:220px;' /></td>
           				<td class='nomor' width='20'>$s[id_alamat]</td>
						<td><button class='btn btn-default btn-xs a-btn' type='button' id='a_btn' data-id='$s[id_alamat]'><span class='glyphicon glyphicon-edit'></span>Save</button></td>
					  </tr>
           ";
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
  
    <div class="clearfix"></div> 
<table style="display:none;" border="0" class="list rtrw lembar2"><caption>
  <h4>PENGATURAN RT & RW</h4><hr /></caption>
      <thead>         <tr> 
           <td>RW</td>
           <td>Nama Ketua RW</td>
           <td>KODE</td>
           <td>#</td>
		   <td></td>
                    </tr></thead>
         <tbody>
         <?php 
		 $srw =mysql_query("SELECT * FROM arsip_rw");
		 $no=1;
			while ($s = mysql_fetch_array($srw)){
				echo "<tr height='40'> 
						<td width='50px' style='text-align:center;'>$s[rw]</td>
						<td width='200px'><input name='nama_ketua_rw' type='text' value='$s[nama_ketua_rw]' id='rw_$s[id_rw]_nama' style='width:260px;' /></td>
						<td width='50px' style='text-align:center;'>$s[id_rw]</td>
						<td width='180px'><button class='btn btn-default btn-xs rw-btn' type='button' id='rw_btn' data-id='$s[id_rw]'><span class='glyphicon glyphicon-edit'></span>Save</button></td>
						
					  </tr>";
					  $no++;
					  
					    echo "<tr height='30'> 
						<td width='10%'></td>
						<td width='30%' colspan='2'>
							<table>
							<tr class='subtitle'>
							<td width='35px'>RT</td>
							<td width='240'>Nama Ketua RT</td>
							<td width='35px'>KODE</td>
							<td width='55px'>#</td>
							</tr>";
							
							 $srwrt =mysql_query("SELECT * FROM arsip_rt where id_rw='$s[id_rw]' ORDER BY id_rt");
		 $noa=1;
			while ($d = mysql_fetch_array($srwrt)){
					  echo "
							<tr>
							<td style='text-align:center;'  width='50px'>$d[rt]</td>
							<td  width='230px'><input name='nama_ketua_rt' type='text' value='$d[nama_ketua_rt]' id='rt_$d[id_rt]_nama' style='width:200px;' /></td>
							<td style='text-align:center;'  width='50px'>$d[id_rt]</td>
							<td  width='50px'><button class='btn btn-default btn-xs rt-btn' type='button' id='rt_btn' data-idrw='$s[id_rw]' data-id='$d[id_rt]'><span class='glyphicon glyphicon-edit'></span>Save</button></td>
							</tr>";
					  }
					  $noa++;
					  
					  echo "
							</table>
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
  
    <div class="clearfix"></div> 
<table style="display:none;" class="list backup lembar2">
          <tbody>
		  <tr>
		  <td colspan="2"><br/><div class="alert alert-info">Aktifkan Fitur Auto Backup / Backup Otomatis agar SI PA'DE melakukan backup data setiap bulan secara otomatis (direkomendasikan), sehingga lupa melakukan backup tidak lagi terjadi.</div></br/></td>
		  </tr>
		  <tr>
		  <td colspan="2"><b>Atur Fitur Backup Otomatis</b></td>
		  </tr>
         <?php 
		 $bck =mysql_query("SELECT auto_backup FROM pengaturan where id='1'");
	
		$b = mysql_fetch_array($bck);
		if ($b['auto_backup']=='Y'){ $selectedy=' selected'; }
		if ($b['auto_backup']=='N'){ $selectedx=' selected'; }
				echo "<tr height='30'>
           				<td width='100px'> Auto Backup </td>
						<td><select name='bck' id='bck' style='width:150px;'><option value='Y' ".$selectedy.">Aktif</option><option value='N' ".$selectedx.">Mati</option></select>
						<button class='btn btn-default btn-xs backup-btn' type='button' id='backup_btn'><span class='glyphicon glyphicon-edit'></span>Save</button></td>
						</tr>           ";
		   ?>
           
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td> 

           </tr>
           
         </tbody>
       </table>      
  
    <div class="clearfix"></div> 
<table style="display:none;" class="list akun lembar2">
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
  
      <table width="100%" style="display:block;" class="lembar2" id="info">
      <tbody>
	  <tr>
        <td colspan="5" style="padding:5px;"><div class="alert alert-info" style="width:545px;">Silahkan Pilih Terlebih Dahulu Lembar Pengaturan Di Panel Sebelah Kiri.</div></td> 
      </tr>
	  </tbody>
	  </table>
  </div>
  
  <!--// modal bersihkan // -->
	<div class="modal fade" id="alertbersihkan" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    
    <div class="modal-content" id="reloadcont">
      <div class='modal-header'>
		<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
		<h4 class='modal-title' id='reloadLabel'><span class="glyphicon glyphicon-comment"></span> SI PA'DE Bilang ...</h4>
		</div>
		<div class='modal-body'>
		Apakah anda yakin untuk membersihkan semua isian ?
    </div>
		<div class="modal-footer"> 
     <button type="reset" id="bersihkan" onclick="tutupmodal(bersihkantutup)"  style="float:left;" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-trash"></span> BERSIHKAN</button>&nbsp;
	 <button type="button" id="bersihkantutup" style="float:right;" class="btn btn-default"  data-dismiss="modal"> TIDAK</button>&nbsp;
	 <div class="clearfix"></div>		 
		</div>
  </div>
</div>
	 
     </div> </div> 

<div class="footer clearfix"><div style="float:left; width:300px; text-align:left;">SI PA'DE v.2.0 &nbsp;&nbsp;&nbsp;&nbsp; | Use updated Internet browser for best performer</div><div style="float:right; width:300px; text-align:right;">Developed by Ade A S | RakIT Solutions <br></div></div>
<br/>

	 
<!-- Modal -->
<?php include "inc/ui_modal.php"; ?>
	
	
<script src="rakstrap/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script> 
<script src="rakstrap/js/pace.min.js"></script>
 
<script type="text/javascript" src="rakstrap/js/date_time.js"></script>
<script type="text/javascript">window.onload = date_time('date_time');</script>

<script type="text/javascript">   
$('body').tooltip({
    selector: '[data-toggle=tooltip]'
}); 
	  
$('[data-toggle=tooltip]').on('hidden.bs.tooltip', function (e) {
   $(this).removeData('bs.tooltip'); 
   
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

	    
  <script src="rakstrap/js/jquery.form-validator.js"></script>

<script>
  $.validate({ 
    validateOnBlur : true // disable validation when input looses focus 
 
  });
  
</script>  
 <script type="text/javascript">
	function refresh (timeoutPeriod){ 
		refresh = setTimeout(function(){window.location.reload(true);},timeoutPeriod); 
	} 
	function refreshto (timeoutPeriod,to){ 
		refresh = setTimeout(function(){location.href="" + to + "";},timeoutPeriod); 
	} 
	function modalreload (eleshow,alert,text) {
	if (alert=="success") { $(eleshow + " .modal-body .alert-cont").html("<div class='alert alert-success'>" + text + "</div>"); }
	if (alert=="warning") { $(eleshow + " .modal-body .alert-cont").html("<div class='alert alert-warning'>" + text + "</div>"); }
	if (alert=="danger") { $(eleshow + " .modal-body .alert-cont").html("<div class='alert alert-danger'>" + text + "</div>"); }
	if (alert=="info") { $(eleshow + " .modal-body .alert-cont").html("<div class='alert alert-info'>" + text + "</div>"); }
	
	$(eleshow).modal({ backdrop: 'static', keyboard: false })
	}	
	function modalalert (eleshow,alert,text) { 
	if (alert=="success") { $(eleshow + " .modal-body .alert-cont").html("<div class='alert alert-success'>" + text + "</div>"); }
	if (alert=="warning") { $(eleshow + " .modal-body .alert-cont").html("<div class='alert alert-warning'>" + text + "</div>"); }
	if (alert=="danger") { $(eleshow + " .modal-body .alert-cont").html("<div class='alert alert-danger'>" + text + "</div>"); }
	if (alert=="info") { $(eleshow + " .modal-body .alert-cont").html("<div class='alert alert-info'>" + text + "</div>"); }
	
	$(eleshow).modal({ backdrop: 'static', keyboard: false })
	}	
	
	
		
</script>

<script type='text/javascript'>

	function tutupmodal (dismiss){ 
		$(dismiss).click();		
    $('.lembar2').hide();   
	$('.btn').removeClass('active'); 
	$('#info').show(); 
	$('.no_cek').html(""); 
	} 
</script>
<script type='text/javascript'>
		$("#aktifkan").prop("checked", false);
$('#aktifkan').click(function(){ // enable submit button via checkbox
         $(this).toggleClass('active');
         $('#submitsurat').toggleClass('disabled');
         $('#submitsurat').toggleClass('btn-default');
         $('#submitsurat').toggleClass('btn-primary');
});
</script>
   <script type="text/javascript">
$(document).ready(function(){ 
<?php if($_GET['lembar']=='pelayanan'){
?>
$('#surat').click();
    $('.lembar2').hide();   
	$('.btn').removeClass('active');
    $('#surat').addClass('active');
    $('.surat').slideDown('');
    $('.surat_surat').slideDown('');
<?php 
}
?>
  
   $('.trigger').click(function() {
	this.checked = true;
    $('.lembar2').hide();   
	$('.btn').removeClass('active');
    $('#' + $(this).data('rel')).addClass('active');
    $('.' + $(this).data('rel')).slideDown('');
    $('.surat_' + $(this).data('rel')).slideDown('');
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
	url:"edit_rule.php?act=pejabat",
	data: "id="+id+"&nama="+nama+"&teken="+teken+"&ket="+ket,
		success: function(data){ 
	 
	modalalert('#alert','success',data);  
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
	url:"edit_rule.php?act=alamat",
	data: "id="+id+"&nama="+nama,
		success: function(data){ 
	 
	modalalert('#alert','success',data);  
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
	url:"edit_rule.php?act=rt",
	data: "id="+id+"&nama="+nama+"&idrw="+rw,
		success: function(data){ 
	 
	modalalert('#alert','success',data);  
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
	url:"edit_rule.php?act=rw",
	data: "id="+id+"&nama="+nama,
		success: function(data){ 
	 
	modalalert('#alert','success',data);  
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
	url:"edit_rule.php?act=akun",
	data: "id="+id+"&nama="+nama+"&pass="+pass+"&izin="+izin,
		success: function(data){ 
	 
	modalalert('#alert','success',data);  
	$(".akun-btn").removeAttr("disabled");
		}
	});
	});
	
$(".backup-btn").live("click",function(){
	$(this).attr("disabled", "disabled"); 
var ab = $("#bck").val();
	 $.ajax({
	type:"POST",
	url:"edit_rule.php?act=backup",
	data: "bck="+ab,
		success: function(data){ 
	 
	modalalert('#alert','success',data);  
	$(".backup-btn").removeAttr("disabled");
		}
	});
	});	
	
	$(".s-btn").live("click",function(){
	$(this).attr("disabled", "disabled"); 
var id = $(this).data("id");
var nama = $("#s_"+ id +"_nama").val();
//var singkat = $("#s_"+ id +"_singkat").val();
var jw = $("#s_"+ id +"_jw").val();
var ket = $("#s_"+ id +"_ket").val();
	 $.ajax({
	type:"POST",
	url:"edit_rule.php?act=surat",
	//data: "id="+id+"&nama="+nama+"&singkat="+singkat+"&jw="+jw+"&ket="+ket,
	data: "id="+id+"&nama="+nama+"&jw="+jw+"&ket="+ket,
		success: function(data){ 
	 
	modalalert('#alert','success',data);  
	$(".s-btn").removeAttr("disabled");
		}
	});
	});
	
$(".r-btn").live("click",function(){
	$(this).attr("disabled", "disabled");  
var desa = $("#r_desa").val();
var kecamatan = $("#r_kecamatan").val();
var kabupaten = $("#r_kabupaten").val();
var provinsi = $("#r_provinsi").val();
var kodedesa = $("#r_kodedesa").val();
var kodekab = $("#r_kodekabupaten").val();
var kodepos = $("#r_kodepos").val();
var kades = $("#r_kades").val();
var almt = $("#r_alamat").val();
	 $.ajax({
	type:"POST",
	url:"edit_rule.php?act=rule",
	data: "desa="+desa+"&kec="+kecamatan+"&kab="+kabupaten+"&prov="+provinsi+"&kodedesa="+kodedesa+"&kodekab="+kodekab+"&kodepos="+kodepos+"&kades="+kades+"&almt="+almt,
		success: function(data){ 
	modalalert('#alert','success',data);  
	$(".r-btn").removeAttr("disabled");
		}
	});
	});
});
</script>

    
    
    <script type="text/javascript">
$('.number').on('keypress', function(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    return !(charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57));
});

$('.number').on('focusout', function() {
    var value = $(this).val();
    
    $(this).val(value.replace(/[^0-9]/g, ''));
}); 
    </script>
	
	<?php //Level User
	} 
	else {
	echo "<div class='container clearfix'><div class='content clearfix'><div class='alert alert-danger'><h1>Oops...</h1><hr/>Maaf, anda tidak memiliki izin untuk menggunakan fitur (Pengaturan) ini.</div></div></div>";	
	}
	?>
          
</body></html> 
  <?php 
} 
}
?>