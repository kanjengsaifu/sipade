<?php
include "../fungsi/fungsi_anti_injection.php";

session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "6";
}
else{

  $fields = array('id', 'no_kk', 'alamat', 'rw', 'rt', 'catatan');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) { 
    $error = true; //Yup there are errors
  }
  
}

if($error==true){ echo "0"; } //ada field error respon kode = 0
elseif(!$error) { //Only create queries when no error occurs
  //Create queries.... 
  
 		include "../fungsi/koneksi.php"; 	
include "../fungsi/ubahkarakter.php";
		
$queryfields = array('id', 'no_kk', 'alamat', 'rw', 'rt', 'catatan');
foreach($queryfields AS $fieldname) { //Loop trough each field
  		$$fieldname = mysql_real_escape_string($_POST[$fieldname]);
}
		
$catatan = ubah_huruf_ke_besar($catatan);

		$no_lamasql = mysql_query("select * from kk where id_kk='$id'");
		$no_lamacatch = mysql_num_rows($no_lamasql);
		$kklama = mysql_fetch_array($no_lamasql);
		$nokklama = $kklama['no_kk'];
		if ($no_lamacatch=='0'){ echo "1"; } // id kk tidak terverifikasi 
		else { // id kk terverifikasi
	 if ($kklama['no_kk']==$no_kk){ // jika kk tidak berubah 
	 if(mysql_query("UPDATE kk SET alamat = '$alamat',  
									  rt = '$rt',  
									  rw = '$rw', 
									  catatan = '$catatan'  
									  WHERE id_kk= '$id'")){
					 
		 mysql_query("UPDATE penduduk SET alamat_pen = '$alamat',  
									  rt_pen = '$rt',  
									  rw_pen = '$rw' 
									  WHERE no_kk_pen= '$no_kk'");
		  echo "2"; // sukses respon kode = 2
		}
		else {
		  echo "3"; // gagal respon kode 4
		  }
	 }
	 else {
	 
		$no_kkbaru = mysql_query("select * from kk where no_kk='$no_kk'");
		$no_kkbarucek = mysql_num_rows($no_kkbaru);
		if ($no_kkbarucek=='0'){   // no  kk masih tersedia	

	 if(mysql_query("UPDATE kk SET no_kk = '$no_kk',
									  alamat = '$alamat',  
									  rt = '$rt',  
									  rw = '$rw', 
									  catatan = '$catatan'  
									  WHERE id_kk= '$id'")){
					 
		 mysql_query("UPDATE penduduk SET no_kk_pen = '$no_kk',
									  alamat_pen = '$alamat',  
									  rt_pen = '$rt',  
									  rw_pen = '$rw' 
									  WHERE no_kk_pen= '$nokklama'");
		  echo "$no_kk"; // sukses respon kode = 3
		}
		else {
		  echo "3"; // gagal respon kode 4
		  }
	 
	 }
	 else {
	 echo "4";
	 }
	 }
	 
	  }
	  }
          
          
        
}
?>