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
  header('location:modal_login.php?ref='.$_GET[kk].'&id='.$_GET[id].'&mode='.$_GET[mode].'&refname=ktp');
}
else{
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "Anda harus masuk terlebih dahulu !";
}
else{
?>
<?php
include "fungsi/koneksi.php";
include "fungsi/fungsi_indotgl.php";
$penduduk=mysql_query("SELECT * FROM penduduk, arsip_agama, arsip_alamat, arsip_kelamin,arsip_goldar, arsip_kewarganegaraan, arsip_pekerjaan, arsip_pendidikan, arsip_status 
WHERE arsip_agama.id_agama=penduduk.agama_pen
AND arsip_alamat.id_alamat=penduduk.alamat_pen
AND arsip_kelamin.id_kelamin=penduduk.kelamin_pen
AND arsip_kewarganegaraan.id_kewarganegaraan=penduduk.kewarganegaraan_pen
AND arsip_pekerjaan.id_pekerjaan=penduduk.pekerjaan_pen
AND arsip_pendidikan.id_pendidikan=penduduk.pendidikan_pen 
AND arsip_status.id_status=penduduk.status_pen
AND arsip_goldar.id_goldar=penduduk.goldar_pen
AND penduduk.no_pen='$_GET[id]'");
	$p=mysql_fetch_array($penduduk);
	$tgllahir = tgl_indo2($p['tanggal_lahir_pen']);
	$mirip = $p['nama_pen'];
	$mirippisah =  explode(" ",$mirip);	
	$mirippisah = implode(",", $mirippisah);  

	$rule_std = mysql_query("select * from pengaturan where id='1'"); 
	$rule=mysql_fetch_array($rule_std);
?>  
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><?php 
	
		if ($p['statusnya']=="2") {
		echo "<span style='text-decoration:line-through;'>PROVINSI $rule[provinsi] KABUPATEN $rule[kabupaten]</span> (<span style='background:#5F5'>Sudah Pindah</span>)";
		}
		if ($p['statusnya']=="3") {
		echo "<span style='text-decoration:line-through;'>PROVINSI $rule[provinsi] KABUPATEN $rule[kabupaten]</span> (<span style='background:#ff5'>Sudah Wafat</span>)";
		}
		if ($p['statusnya']=="0") {		
		echo "PROVINSI $rule[provinsi] KABUPATEN $rule[kabupaten]";
		}
		if ($p['statusnya']=="4") {		
		echo "PROVINSI $rule[provinsi] KABUPATEN $rule[kabupaten]  (<span style='background:#5ff'>NIK Sementara</span>)";
		}
		?></h4>
      </div>
      <div class="modal-body">
<table width="100%" border="0">
  <tr>
    <td colspan="4"><h4>NIK : <?php echo"$_GET[id]"; ?></h4></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="26%" rowspan="8"><br/><div style="float:right; margin-right:30px; width:92px; height:100px; border:2px solid #fff; box-shadow:0 0 5px #eee; background: url('images/avatar.jpg') <?php if ($p[kelamin_pen]=='1') {echo "-92px 0";} else {echo "0 0";} ?>;" /></td>
  </tr>
  <tr>
    <td colspan="2">Nama</td>
    <td width="2%">:</td>
    <td colspan="3"><?php echo"$p[nama_pen]"; ?></td>
    </tr>
  <tr>
    <td colspan="2">Tempat/Tgl Lahir</td>
    <td>:</td>
    <td><?php echo"$p[tempat_lahir_pen], $tgllahir"; ?></td>
    <td>Gol Darah</td>
    <td>: <?php echo"$p[goldar]"; ?></td>
    </tr>
  <tr>
    <td colspan="2">Jenis Kelamin</td>
    <td>:</td>
    <td><?php echo"$p[kelamin]"; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2">Alamat</td>
    <td>:</td>
    <td><?php 
	
		if ($p['statusnya']=="2") {
		echo "<span style='text-decoration:line-through;'>$p[alamat]</span>";
		}
		else {		
		echo "$p[alamat]";
		} ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="17%">RT/RW</td>
    <td>:</td>
    <td><?php 
	
		if ($p['statusnya']=="2") {
		echo "<span style='text-decoration:line-through;'>$p[rt_pen]/$p[rw_pen]</span>";
		}
		else {		
		echo "$p[rt_pen]/$p[rw_pen]";
		} ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Kel/Desa</td>
    <td>:</td>
    <td><?php 
	
		if ($p['statusnya']=="2") {
		echo "<span style='text-decoration:line-through;'>$p[desa]</span>";
		}
		else {		
		echo "$p[desa]";
		} ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Kecamatan</td>
    <td>:</td>
    <td><?php 
	
		if ($p['statusnya']=="2") {
		echo "<span style='text-decoration:line-through;'>$p[kecamatan]</span>";
		}
		else {		
		echo "$p[kecamatan]";
		} ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2">Agama</td>
    <td>:</td>
    <td><?php echo"$p[agama]"; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">Status Perkawinan</td>
    <td>:</td>
    <td><?php echo"$p[status]"; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">Pekerjaan</td>
    <td>:</td>
    <td><?php echo"$p[pekerjaan]"; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">Kewarganegaraan</td>
    <td>:</td>
    <td><?php echo"$p[kewarganegaraan]"; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
 <div class="modal-footer"> 
 
<!-- Single button -->
<div class="btn-group dropup">
      <a href="ts@<?php echo"$p[no_pen]"; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> Pelayanan</a>
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
       <span class="glyphicon glyphicon-plus"></span>
        <span class="sr-only">Toggle Dropdown</span>
      </button> 
  <ul class="dropdown-menu" role="menu"> 
    <li><a href="<?php echo"$p[no_kk_pen]"; ?>"><span class="glyphicon glyphicon-folder-open"></span> Kartu Keluarga</a></li>
    <li><a href="data?query=<?php echo "$mirip"; ?>&filterstatusnya=a&filterhdk=0&filterrw=0&filterrt=0&tampilan=2&jph=20&hal=1&by=0"><span class="glyphicon glyphicon-screenshot"></span> Cari Kemiripan</a></li>
    <li><a href="data?query=<?php echo "$mirippisah"; ?>&filterstatusnya=a&filterhdk=0&filterrw=0&filterrt=0&tampilan=2&jph=20&hal=1&by=0"><span class="glyphicon glyphicon-screenshot"></span> Gunakan Sebagai Kata Kunci</a></li>
    <li class="divider"></li>
    <li><a href="arsip?submit=Saring&no_pen=<?php echo "$p[no_pen]"; ?>"><span class="glyphicon glyphicon-book"></span> Riwayat Pelayanan</a></li> 
  </ul>
</div>
        <button type="button" class="btn btn-default" style="float:right;" data-dismiss="modal">Tutup</button>

       </div>

<?php 
} 
}
?>