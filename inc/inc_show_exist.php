<?php
include "../fungsi/fungsi_anti_injection.php";
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
}
else{

include "../fungsi/koneksi.php"; 
include "../fungsi/fungsi_indotgl.php";

if ($_GET[mod]=='nopen'){
	
 if(!isset($_GET[no_pen]) || empty($_GET[no_pen])) {
echo '1';
}
else {
$penduduk=mysql_query("SELECT * FROM penduduk, arsip_agama, arsip_alamat, arsip_kelamin,arsip_goldar, arsip_kewarganegaraan, arsip_pekerjaan, arsip_pendidikan, arsip_status 
WHERE arsip_agama.id_agama=penduduk.agama_pen
AND arsip_alamat.id_alamat=penduduk.alamat_pen
AND arsip_kelamin.id_kelamin=penduduk.kelamin_pen
AND arsip_kewarganegaraan.id_kewarganegaraan=penduduk.kewarganegaraan_pen
AND arsip_pekerjaan.id_pekerjaan=penduduk.pekerjaan_pen
AND arsip_pendidikan.id_pendidikan=penduduk.pendidikan_pen 
AND arsip_status.id_status=penduduk.status_pen
AND arsip_goldar.id_goldar=penduduk.goldar_pen
AND penduduk.no_pen='$_GET[no_pen]'");
	$p=mysql_fetch_array($penduduk);
	$tgllahir = tgl_indo2($p['tanggal_lahir_pen']);
	$mirip = $p['nama_pen'];
	$mirippisah =  explode(" ",$mirip);	
	$mirippisah = implode(",", $mirippisah);  
	$rule_std = mysql_query("select * from pengaturan where id='1'"); 
	$rule=mysql_fetch_array($rule_std);
$catch = mysql_num_rows($rule_std);
	if ($catch=='0'){
	echo '0';
	}
	else {
	
	?>
	<table width="100%" border="0">
  <tr>
    <td colspan="4"><h4>NIK : <?php echo"$_GET[no_pen]"; ?></h4></td>
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
 <?php
}
}
}
}
?>