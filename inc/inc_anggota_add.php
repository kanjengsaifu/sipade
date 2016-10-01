<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){

if (($_GET['lembar']=="1") | ($_GET['lembar']=="2")) {
echo "<tr><td colspan='9'><br/><div class='alert alert-danger'><p align='center'>[<span class='glyphicon glyphicon-remove'></span>]  Tidak Dapat Memuat Data, Anda Harus Masuk Terlebih Dahulu...</p></div></td></tr>"; }

}

else{


if (($_GET['lembar']=="1") | ($_GET['lembar']=="2")) {
include "../fungsi/koneksi.php";
include "../fungsi/fungsi_indotgl.php";
$nokk =$_POST['nokk'];
}

if ($_GET['lembar']=="1") {
$penduduk=mysql_query("SELECT * FROM  penduduk, arsip_agama, arsip_alamat, arsip_kelamin,arsip_goldar, arsip_kewarganegaraan, arsip_pekerjaan, arsip_pendidikan, arsip_rt, arsip_rw, arsip_status, arsip_status_hdk
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
AND penduduk.no_kk_pen='$nokk' ORDER BY status_hdk_pen ");

  $ketemu = mysql_num_rows($penduduk);  
  if ($ketemu!=''){  
	$no=1;
	while($p=mysql_fetch_array($penduduk)){	
	$tgllahir = tgl_indo2($p['tanggal_lahir_pen']);
	
		if ($p['statusnya']=="3") {
		echo "<tr class='sts2_kuning' title='Info : Sudah Wafat'>";
		}
		elseif ($p['statusnya']=="2") {
		echo "<tr class='sts2_hijau' title='Info : Sudah Pindah'>";
		}
		else {
		echo "<tr class='sts2_std'>";
		}
		 echo "
           <td class='nomor'>$no</td> 
           <td><a data-load='ktp.php?id=$p[no_pen]' data-toggle='modal' data-target='#myModal'>$p[nama_pen]</a></td>
           <td>$p[no_pen]</td>
           <td>$p[kelamin]</td>
           <td>$p[tempat_lahir_pen]</td>
           <td>$tgllahir</td>
           <td>$p[agama]</td>
           <td>$p[pendidikan]</td>
           <td>$p[pekerjaan]</td>
         </tr>";
		 	
	$no++;
	}
}
else { echo "<tr><td colspan='9'><br/><div class='alert alert-danger'><p align='center'>[<span class='glyphicon glyphicon-remove'></span>]  Tidak ditemukan satupun data dengan nomor KK $nokk, Silahkan periksa kembali...</p></div></td></tr>"; }
}

elseif ($_GET['lembar']=="2") {
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
AND penduduk.no_kk_pen='$nokk'  ORDER BY status_hdk_pen ");

  $ketemu = mysql_num_rows($penduduk2);  
  if ($ketemu!=''){  
	$no=1;
	while($p=mysql_fetch_array($penduduk2)){	
	$tgllahir = tgl_indo($p['tanggal_lahir_pen']);
	
		if ($p['statusnya']=="3") {
		echo "<tr class='sts2_kuning' title='Info : Sudah Wafat'>";
		}
		elseif ($p['statusnya']=="2") {
		echo "<tr class='sts2_hijau' title='Info : Sudah Pindah'>";
		}
		else {
		echo "<tr class='sts2_std'>";
		}
	echo " 
           <td class='nomor'>$no</td>
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
	}
	
else { echo "<tr><td colspan='8'><br/><div class='alert alert-danger'><p align='center'>[<span class='glyphicon glyphicon-remove'></span>]  Tidak ditemukan satupun data dengan nomor KK $nokk, Silahkan periksa kembali...</p></div></td></tr>"; }
}


}
?>