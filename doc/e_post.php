<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "6";
}
else{

  $fields = array('jdl', 'kat', 'publis', 'input', 'id');

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
		
$queryfields = array('jdl', 'kat', 'publis', 'input', 'id');
foreach($queryfields AS $fieldname) { //Loop trough each field
  		$$fieldname = $_POST[$fieldname];
}
		
		$cek = mysql_query("select * from post where id='$id'");
		$cek_ada = mysql_num_rows($cek);
		if ($cek_ada=='1'){ // id  ada
		$jdlseo = seo_title("$jdl");
		$tanggal = date("Y-m-d");
				if(mysql_query("UPDATE post SET judul		='$jdl',
																judul_seo='$jdlseo', 
																kategori	='$kat', 
																publis		='$publis', 
																konten	='$_POST[input]'
														WHERE id='$id'")){
					echo "1";	 // sukses
				}

				else {
				echo "2"; // gagal respon kode 4
				}
		}
		else {
		echo "3"; //gagal id tidak ada

		}
		
		
	  }
          
          
        
}
?>