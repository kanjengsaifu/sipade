<?php
include "../fungsi/fungsi_anti_injection.php";
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "6";
}
else{

  $fields = array('idpenselect', 'set', 'set_tgl');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) { 
    $error = true; //Yup there are errors
  }
  
}

if($error==true){ echo "Masih ada data yang tidak terisi atau kurang tepat, silahkan periksa lagi !"; } //ada field error respon kode = 0
elseif(!$error) { //Only create queries when no error occurs
  //Create queries.... 
		
		include "../fungsi/koneksi.php"; 	
include "../fungsi/fungsi_indotgl.php";
		
		foreach ($_POST['idpenselect'] as $selectedOption){	  
		$sql = mysql_query("select * from penduduk where no_pen='$selectedOption'");
		$catch = mysql_num_rows($sql);
		$kep = mysql_fetch_array($sql);
			if ($catch=='0'){
			echo "NIK $selectedOption Tidak dikenali, ";
			}
			else {
				
$tgl_data = tgldb($_POST[set_tgl]);
			 
					 if ($_POST[set]=='1'){$set = '0';} 
					 else {$set = $_POST[set];}
					 
					 
					 if ($kep[status_hdk_pen]=='1'){ //jika yg diubah adlh kep. kk
					 	  if (($_POST[set]=='2') || ($_POST[set]=='3')){
		$sqla = mysql_query("select * from penduduk where no_kk_pen='$kep[no_kk_pen]' AND status_hdk_pen = '3'");
		$catcha = mysql_num_rows($sqla);
		$istri = mysql_fetch_array($sqla);
					 
			if ($catcha=='1'){ // cek jika ada istri ubah status_hdk menjadi 2 ( suami )
			
			mysql_query("UPDATE penduduk SET statusnya = '$set', tgl_data= '$tgl_data', status_hdk_pen = '2' 
									  WHERE no_pen= '$selectedOption'");
									  
			mysql_query("UPDATE penduduk SET status_hdk_pen = '1' 
									  WHERE no_pen= '$istri[no_pen]'");
			
			}
			if ($catcha=='0'){// jika tidak ada istri ubah status_hdk menjadi 7 (orang tua)
			
			mysql_query("UPDATE penduduk SET statusnya = '$set', tgl_data= '$tgl_data', status_hdk_pen = '7' 
									  WHERE no_pen= '$selectedOption'");
									  }
					 }
}

					 else {
			mysql_query("UPDATE penduduk SET statusnya = '$set' , tgl_data= '$tgl_data'
									  WHERE no_pen= '$selectedOption'");
									  }
					 
			echo "Data $selectedOption Berhasil Diperbaharui<br/>";
			
			} 
		}
}
		 
  else { 
		  echo " Sistem tidak mengerti perintah anda, silahkan coba lagi. ";
		  }
          
       
}
?>