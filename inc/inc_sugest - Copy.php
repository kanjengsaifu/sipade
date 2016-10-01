<?php
include "../fungsi/fungsi_anti_injection.php";
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
}
else{

include "../fungsi/koneksi.php"; 
include "../fungsi/fungsi_indotgl.php"; 
$kata = trim($_GET['input']);
$limit = trim($_GET['limit']);
echo "{\"results\":[";

if ($_GET[data]=='kk'){
	
  // mencegah XSS
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);

  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata = explode(",",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;
  
  
  $cari = "SELECT * FROM kk WHERE " ; 
    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "catatan LIKE '%$pisah_kata[$i]%' OR no_kk LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    } 
	
  $hasildata  = mysql_query($cari);
  $jmldata = mysql_num_rows($hasildata);
   
 
  $cari .= " ORDER BY id_kk DESC LIMIT $limit";
  $hasilakhir  = mysql_query($cari);
		while($a=mysql_fetch_array($hasilakhir)){ 
  $hasilalmt  = mysql_query("SELECT * FROM arsip_alamat WHERE id_alamat='$a[alamat]'");
  $almtkk=mysql_fetch_array($hasilalmt);
  $kepkk  = mysql_query("SELECT * FROM penduduk WHERE no_kk_pen='$a[no_kk]' AND status_hdk_pen='1'");
  $kkk=mysql_fetch_array($kepkk);
echo "{\"id\":\"$a[no_kk]\",\"value\":\"$a[catatan]\",\"add\": \"$almtkk[alamat]\",\"add2\": \"$kkk[nama_pen]\",\"almt\":\"$a[alamat]\",\"rw\":\"$a[rw]\",\"rt\":\"$a[rt]\",\"info\":\"No. KK : $a[no_kk] - RT. 0$a[rt] RW. 0$a[rw]\"},";
		}
	}
elseif ($_GET[data]=='pen'){
	
  // mencegah XSS
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);

  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata = explode(",",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;
  
	
	if ($_GET[st]=='1'){
	$carian = "status_hdk_pen='1' AND ";
	}
  
	elseif ($_GET[jk]=='1'){
$jk = trim($_GET[jk]);
		$carian = "kelamin_pen='$jk' AND ";
	}
	elseif ($_GET[jk]=='2'){
$jk = trim($_GET[jk]);
		$carian = "kelamin_pen='$jk' AND ";
	}
	
  $cari = "SELECT * FROM penduduk WHERE $carian" ; 
    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "nama_pen LIKE '%$pisah_kata[$i]%' OR no_kk_pen LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    }  
  $cari .= " ORDER BY id_pen DESC LIMIT $limit";
  $hasilakhir  = mysql_query($cari);
		while($a=mysql_fetch_array($hasilakhir)){ 
		
  $kk  = mysql_query("SELECT * FROM kk WHERE no_kk='$a[no_kk_pen]'");
  $kk=mysql_fetch_array($kk);
		echo "{ id: \"$a[no_pen]\", value: \"$a[nama_pen]\", tags: \"$kk[alamat]\", info: \"No. KK : $a[no_kk_pen] - RT. 0$kk[rt] RW. 0$kk[rw]\" },";
		}
	}
	
	

elseif ($_GET[data]=='nopen'){
	
  // mencegah XSS
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);

  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata = explode(",",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;
  
  
  $cari = "SELECT * FROM penduduk WHERE " ; 
    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "nama_pen LIKE '%$pisah_kata[$i]%' OR no_pen LIKE '%$pisah_kata[$i]%' OR no_kk_pen LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    } 
	
  $hasildata  = mysql_query($cari);
  $jmldata = mysql_num_rows($hasildata);
   

  $hasilakhir  = mysql_query($cari);
  $cari .= " ORDER BY id_pen DESC LIMIT $limit";
  $hasilakhir  = mysql_query($cari);
		while($a=mysql_fetch_array($hasilakhir)){ 
  $kk  = mysql_query("SELECT * FROM kk WHERE no_kk='$a[no_kk_pen]'");
  $kk=mysql_fetch_array($kk);
		$tgl = tgl_indo2($a['tanggal_lahir_pen']);
		echo "{ id: \"$a[no_pen]\", value: \"$a[nama_pen]\", tmpt: \"$a[tempat_lahir_pen]\", tgl: \"$tgl\", jk: \"$a[kelamin_pen]\",\"almt\":\"$kk[alamat]\",\"rw\":\"$kk[rw]\",\"rt\":\"$kk[rt]\",\"wn\":\"$a[kewarganegaraan_pen]\",info: \"No. KK : $a[no_kk_pen] - RT. 0$kk[rt] RW. 0$kk[rw]\" },";
		}
	}	
	
	 


elseif ($_GET[data]=='penpelayanan'){
	
  // mencegah XSS
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);

  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata = explode(",",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;
  
  
  $cari = "SELECT DISTINCT no_pen, nl, almt FROM pelayanan WHERE " ; 
    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "nl LIKE '%$pisah_kata[$i]%' OR no_pen LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    } 
	
  $hasildata  = mysql_query($cari);
  $jmldata = mysql_num_rows($hasildata);
   

  $hasilakhir  = mysql_query($cari);
  $cari .= " ORDER BY no_pen DESC LIMIT $limit";
  $hasilakhir  = mysql_query($cari);
		while($a=mysql_fetch_array($hasilakhir)){  
		$tgl = tgl_indo2($a['tgl_lhr']);
		echo "{ id: \"$a[no_pen]\", value: \"$a[nl]\", info: \"$a[no_pen] # $a[almt]\", tgl: \"$tgl\" },";
		}
	}	
	
	 



elseif ($_GET[data]=='nopensurat'){
	
  // mencegah XSS
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);

  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata = explode(",",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;
  
    
	if ($_GET[jk]=='1'){
$jk = trim($_GET[jk]);
		$carian = "kelamin_pen='1' AND ";
	}
	elseif ($_GET[jk]=='2'){
$jk = trim($_GET[jk]);
		$carian = "kelamin_pen='2' AND ";
	}
	
  $cari = "SELECT * FROM penduduk WHERE $carian" ; 

    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "nama_pen LIKE '%$pisah_kata[$i]%' OR no_pen LIKE '%$pisah_kata[$i]%' OR no_kk_pen LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    } 
	
  $hasildata  = mysql_query($cari);
  $jmldata = mysql_num_rows($hasildata);
   

  $hasilakhir  = mysql_query($cari);
  $cari .= " ORDER BY id_pen DESC LIMIT $limit";
  $hasilakhir  = mysql_query($cari);
		while($a=mysql_fetch_array($hasilakhir)){ 
		$tgl = tgl_indo2($a['tanggal_lahir_pen']);
  
  $kk  = mysql_query("SELECT * FROM kk WHERE no_kk='$a[no_kk_pen]'");
  $kk=mysql_fetch_array($kk);
  $hasilalmt  = mysql_query("SELECT * FROM arsip_alamat WHERE id_alamat='$kk[alamat]'");
  $almt=mysql_fetch_array($hasilalmt);
  $hasilagm  = mysql_query("SELECT * FROM arsip_agama WHERE id_agama='$a[agama_pen]'");
  $agm=mysql_fetch_array($hasilagm);
  $hasilkerja  = mysql_query("SELECT * FROM arsip_pekerjaan WHERE id_pekerjaan='$a[pekerjaan_pen]'");
  $kerja=mysql_fetch_array($hasilkerja);
  $kepkk  = mysql_query("SELECT * FROM penduduk WHERE no_kk_pen='$a[no_kk_pen]' AND status_hdk_pen='1'");
  $kkk=mysql_fetch_array($kepkk);
		echo "{ id: \"$a[no_pen]\", value: \"$a[nama_pen]\", tmpt: \"$a[tempat_lahir_pen]\", tgl: \"$tgl\", jk: \"$a[kelamin_pen]\", kerja: \"$kerja[id_pekerjaan]\", status: \"$a[status_pen]\",\"almt\":\"$almt[alamat]\",\"agm\":\"$agm[id_agama]\",\"rw\":\"$kk[rw]\",\"rt\":\"$kk[rt]\",\"wn\":\"$a[kewarganegaraan_pen]\",info: \"No. KTP : $a[no_pen] - RT. 0$kk[rt] RW. 0$kk[rw]\", add: \"$a[no_kk_pen]\", add2: \"$a[ayah_pen]\", add3: \"$kkk[nama_pen]\", add4: \"$a[goldar_pen]\" },";
		}
	}	
	
	
	
elseif ($_GET[data]=='nopenedit'){
	
  // mencegah XSS
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);

  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata = explode(",",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;
  
    
	if ($_GET[jk]=='1'){
$jk = trim($_GET[jk]);
		$carian = "kelamin_pen='$jk' AND ";
	}
	elseif ($_GET[jk]=='2'){
$jk = trim($_GET[jk]);
		$carian = "kelamin_pen='$jk' AND ";
	}
	
  $cari = "SELECT * FROM penduduk WHERE $carian" ; 

    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "nama_pen LIKE '%$pisah_kata[$i]%' OR no_pen LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    } 
	
  $hasildata  = mysql_query($cari);
  $jmldata = mysql_num_rows($hasildata);
   

  $hasilakhir  = mysql_query($cari);
  $cari .= " ORDER BY id_pen DESC LIMIT $limit";
  $hasilakhir  = mysql_query($cari);
		while($a=mysql_fetch_array($hasilakhir)){ 
		$tgl = tgl_indo2($a['tanggal_lahir_pen']);
  
  $kk  = mysql_query("SELECT * FROM kk WHERE no_kk='$a[no_kk_pen]'");
  $kk=mysql_fetch_array($kk);
  $hasilalmt  = mysql_query("SELECT * FROM arsip_alamat WHERE id_alamat='$kk[alamat]'");
  $almt=mysql_fetch_array($hasilalmt);
  $hasilagm  = mysql_query("SELECT * FROM arsip_agama WHERE id_agama='$a[agama_pen]'");
  $agm=mysql_fetch_array($hasilagm);
  $hasilkerja  = mysql_query("SELECT * FROM arsip_pekerjaan WHERE id_pekerjaan='$a[pekerjaan_pen]'");
  $kerja=mysql_fetch_array($hasilkerja);
  $kepkk  = mysql_query("SELECT * FROM penduduk WHERE no_kk_pen='$a[no_kk_pen]' AND status_hdk_pen='1'");
  $kkk=mysql_fetch_array($kepkk);
		echo "{ id: \"$a[no_pen]\", value: \"$a[nama_pen]\", tmpt: \"$a[tempat_lahir_pen]\", tgl: \"$tgl\",  goldar: \"$a[goldar_pen]\", jk: \"$a[kelamin_pen]\", kerja: \"$kerja[id_pekerjaan]\", pendidikan: \"$a[pendidikan_pen]\", status: \"$a[status_pen]\", statushdk: \"$a[status_hdk_pen]\",\"almt\":\"$a[alamat_pen]\",\"agm\":\"$agm[id_agama]\",\"rw\":\"$kk[rw]\",\"rt\":\"$kk[rt]\",\"wn\":\"$a[kewarganegaraan_pen]\",info: \"No. KTP : $a[no_pen] - RT. 0$kk[rt] RW. 0$kk[rw]\", add: \"$a[no_kk_pen]\", add2: \"$a[ayah_pen]\", add3: \"$a[ibu_pen]\" },";
		}
	}	
	
	
elseif ($_GET[data]=='nokkpenedit'){
	
  // mencegah XSS
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);

  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata = explode(",",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;
  
    
	if ($_GET[jk]=='1'){
$jk = trim($_GET[jk]);
		$carian = "kelamin_pen='$jk' AND ";
	}
	elseif ($_GET[jk]=='2'){
$jk = trim($_GET[jk]);
		$carian = "kelamin_pen='$jk' AND ";
	}
	
  $cari = "SELECT * FROM penduduk WHERE $carian" ; 

    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "nama_pen LIKE '%$pisah_kata[$i]%' OR no_kk_pen LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    } 
	
  $hasildata  = mysql_query($cari);
  $jmldata = mysql_num_rows($hasildata);
   

  $hasilakhir  = mysql_query($cari);
  $cari .= " ORDER BY id_pen DESC LIMIT $limit";
  $hasilakhir  = mysql_query($cari);
		while($a=mysql_fetch_array($hasilakhir)){ 
		$tgl = tgl_indo2($a['tanggal_lahir_pen']);
  
  $kk  = mysql_query("SELECT * FROM kk WHERE no_kk='$a[no_kk_pen]'");
  $kk=mysql_fetch_array($kk);
  $hasilalmt  = mysql_query("SELECT * FROM arsip_alamat WHERE id_alamat='$kk[alamat]'");
  $almt=mysql_fetch_array($hasilalmt);
  $hasilagm  = mysql_query("SELECT * FROM arsip_agama WHERE id_agama='$a[agama_pen]'");
  $agm=mysql_fetch_array($hasilagm);
  $hasilkerja  = mysql_query("SELECT * FROM arsip_pekerjaan WHERE id_pekerjaan='$a[pekerjaan_pen]'");
  $kerja=mysql_fetch_array($hasilkerja);
  $kepkk  = mysql_query("SELECT * FROM penduduk WHERE no_kk_pen='$a[no_kk_pen]' AND status_hdk_pen='1'");
  $kkk=mysql_fetch_array($kepkk);
		echo "{ id: \"$a[no_pen]\", value: \"$a[nama_pen]\", tmpt: \"$a[tempat_lahir_pen]\", tgl: \"$tgl\",  goldar: \"$a[goldar_pen]\", jk: \"$a[kelamin_pen]\", kerja: \"$kerja[id_pekerjaan]\", pendidikan: \"$a[pendidikan_pen]\", status: \"$a[status_pen]\", statushdk: \"$a[status_hdk_pen]\",\"almt\":\"$a[alamat_pen]\",\"agm\":\"$agm[id_agama]\",\"rw\":\"$kk[rw]\",\"rt\":\"$kk[rt]\",\"wn\":\"$a[kewarganegaraan_pen]\",info: \"No. KTP : $a[no_pen] - RT. 0$kk[rt] RW. 0$kk[rw]\", add: \"$a[no_kk_pen]\", add2: \"$a[ayah_pen]\", add3: \"$a[ibu_pen]\" },";
		}
	}	
	
	
echo "]}";


}
?>