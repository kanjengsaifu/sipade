<?php
include "../fungsi/fungsi_anti_injection.php";
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "6";
}
else{
include_once('../fungsi/koneksi.php');
include "../fungsi/fungsi_indotgl.php";
include "../fungsi/ubahkarakter.php";
$fields = array('kolom', 'id', 'value');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
    $error = true; //Yup there are errors
  }
}
 
if($error==true){ echo "0"; } //ada field error respon kode = 0
elseif(!$error) { //tidak ada error dan mulai membuat query
  
$queryfields = array('kolom', 'id', 'value');
 
foreach($queryfields AS $fieldname) { //Loop trough each field
  		$$fieldname = $_POST[$fieldname];
}
	   if ($kolom=='kelamin_pen'){
		$row_arsip= mysql_query("select * from arsip_kelamin where id_kelamin='".$value."'");
		$row = mysql_fetch_array($row_arsip);
		$data = $row['kelamin'];
		}
	   elseif ($kolom=='pendidikan_pen'){
		$row_arsip= mysql_query("select * from arsip_pendidikan where id_pendidikan='".$value."'");
		$row = mysql_fetch_array($row_arsip);
		$data = $row['pendidikan'];
		}
	   elseif ($kolom=='pekerjaan_pen'){
		$row_arsip= mysql_query("select * from arsip_pekerjaan where id_pekerjaan='".$value."'");
		$row = mysql_fetch_array($row_arsip);
		$data = $row['pekerjaan'];
		}
	   elseif ($kolom=='ayah_pen' | $kolom=='ibu_pen'){
		$data = ubah_huruf_ke_besar($value);
		$value = ubah_huruf_ke_besar($value);
		}
		$no_lamasql = mysql_query("select * from penduduk where no_pen='".$id."'");
		$no_lamacatch = mysql_num_rows($no_lamasql);
		$penlama = mysql_fetch_array($no_lamasql);
		if ($no_lamacatch=='0'){ echo "1"; } // id pen tidak terverifikasi
	 else { // id pen terverifikasi
	  
				
	 if(mysql_query("UPDATE penduduk SET 	".$kolom." = '".$value."'
									  WHERE id_pen= '".$penlama['id_pen']."' ")){
				  echo $data; // berhasil menyimpan respon = 2
				 
				 }
	
	
}
	
}
}
  
?>