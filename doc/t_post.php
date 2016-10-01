<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "6";
}
else{

  $fields = array('jdl', 'kat', 'publis', 'input');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) { 
    $error = true; //Yup there are errors
  }
  
}

if($error==true){ echo "0"; } //ada field error respon kode = 0
elseif(!$error) { //Only create queries when no error occurs
  //Create queries.... 
  
include_once('../fungsi/koneksi.php');
include "../fungsi/fungsi_seo.php";
		
$queryfields = array('jdl', 'kat', 'publis', 'input');
foreach($queryfields AS $fieldname) { //Loop trough each field
  		$$fieldname = $_POST[$fieldname];
}
		
		$cek = mysql_query("select * from post where judul='$jdl'");
		$cek_ada = mysql_num_rows($cek);
		if ($cek_ada=='0'){ //judul masih tersedia
		$jdlseo = seo_title("$jdl");
		$tanggal = date("Y-m-d");
	 if(mysql_query("INSERT INTO post (judul, judul_seo, kategori, publis, tanggal, konten)	
				 VALUES('$jdl', '$jdlseo', '$kat', '$publis', '$tanggal', '$_POST[input]')")){
				echo "1";	 // sukses
		}
		
		else {
		  echo "2"; // gagal respon kode 4
		  }
	 
}
else { echo "3"; } // judul tidak tersedia
		
	  }
          
          
        
}
?>