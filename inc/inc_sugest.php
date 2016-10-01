<?php
include "../fungsi/fungsi_anti_injection.php";
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
}
else{


include "../fungsi/koneksi.php"; 
include "../fungsi/fungsi_indotgl.php"; 
if ($_GET[data]=='pen'){
$kata = trim($_GET['chars']);
$limit = trim($_GET['limit']);
$arr=array();

  // mencegah XSS
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);

  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata = explode(",",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;
  
	
	if ($_GET['com']==1){ //ayah
	$carian = "status_hdk_pen='1' AND ";
			
  $cari = "SELECT *  FROM penduduk WHERE ". $carian; 
    for ($i=0; $i<=$jml_kata; $i++){
	      $cari .= "no_kk_pen LIKE '%$pisah_kata[$i]%'  OR no_pen LIKE '%$pisah_kata[$i]%'  ";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    }
	}
	elseif ($_GET['com']==2){ //ibu
	$carian = "status_hdk_pen='3' AND ";
			
  $cari = "SELECT *  FROM penduduk WHERE ". $carian; 
    for ($i=0; $i<=$jml_kata; $i++){
	      $cari .= "no_kk_pen LIKE '%$pisah_kata[$i]%'  OR no_pen LIKE '%$pisah_kata[$i]%'  ";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    }
	}
	elseif ($_GET['com']==3){ //jk
$jk = trim($_GET[jk]);
		$carian = "kelamin_pen='$jk' AND ";
			
  $cari = "SELECT * FROM penduduk WHERE ".$carian; 
    for ($i=0; $i<=$jml_kata; $i++){
	      $cari .= "nama_pen LIKE '%$pisah_kata[$i]%' OR no_kk_pen LIKE '%$pisah_kata[$i]%' ";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    }
	}
else {	
  $cari = "SELECT * FROM penduduk WHERE  " ; 
    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "nama_pen LIKE '%$pisah_kata[$i]%' OR no_pen LIKE '%$pisah_kata[$i]%' OR no_kk_pen LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    }
}	
  $cari .= " ORDER BY id_pen DESC LIMIT $limit";
  $hasilakhir  = mysql_query($cari);
		while($a=mysql_fetch_array($hasilakhir)){ 		
		$tgl = tgl_indo2($a['tanggal_lahir_pen']);
		  $kk  = mysql_query("SELECT * FROM kk,arsip_alamat WHERE kk.alamat=arsip_alamat.id_alamat AND no_kk='$a[no_kk_pen]'");
  $kk=mysql_fetch_array($kk);
  $kepkk  = mysql_query("SELECT * FROM penduduk WHERE no_kk_pen='$a[no_kk_pen]' AND status_hdk_pen='1'");
  $kkk=mysql_fetch_array($kepkk);
   $arr[]=array(  "id" => $a['no_pen'], "data" => $a['nama_pen'],  "namakk" => $kkk['nama_pen'], "nokk" => $a['no_kk_pen'], "alamat_id" => $a['alamat_pen'],  "alamat" => $kk['alamat'],  "rt" => $kk['rt'],  "rw" => $kk['rw'],  "nama" => $a['nama_pen'],  "no" => $a['no_pen'],  "kelamin" => $a['kelamin_pen'],  "goldar" => $a['goldar_pen'],  "tempat_lahir" => $a['tempat_lahir_pen'],  "tanggal_lahir" => $tgl,  "agama" => $a['agama_pen'],  "pendidikan" => $a['pendidikan_pen'],  "pekerjaan" => $a['pekerjaan_pen'],  "status" => $a['status_pen'],  "status_hdk" => $a['status_hdk_pen'],  "kewarganegaraan" => $a['kewarganegaraan_pen'],  "paspor" => $a['paspor_pen'],  "kitas_kitap" => $a['kitas_kitap_pen'],  "ayah" => $a['ayah_pen'],  "ibu" => $a['ibu_pen'], "description" => 'RT. '.$kk['rt'].' / RW. '.$kk['rw']);
  }
  
// Encode it with JSON format
echo json_encode($arr);

	}
	
elseif ($_GET[data]=='logpen'){
$kata = trim($_GET['chars']);
$limit = trim($_GET['limit']);
$arr=array();
	
  // mencegah XSS
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);

  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata = explode(",",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;
  
  
  $cari = "SELECT DISTINCT no_pen, nl, almt , tgl_lhr FROM pelayanan WHERE " ; 
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
		$arr[]=array(  "id" => $a['no_pen'], "data" => $a['nl'], "value" => $a['nl'], "description" => $a['almt'].' - '.$tgl);
		}

  
// Encode it with JSON format
echo json_encode($arr);
}
}
?>