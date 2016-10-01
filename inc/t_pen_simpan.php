 <?php
include "../fungsi/fungsi_anti_injection.php";

session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "6";
}
else{

if ($_POST['ambil']=='1') {
if ($_POST['sementara']=='Y') {
include_once('../fungsi/koneksi.php');
include "../fungsi/fungsi_indotgl.php";
include "../fungsi/ubahkarakter.php";
$fields = array('nama', 'tempat_lahir', 'tanggal_lahir', 'kelamin', 'agama', 'status', 'status_hdk', 'pekerjaan', 'pendidikan', 'ayah', 'ibu', 'goldar', 'kewarganegaraan', 'paspor', 'kitas_kitap');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
    $error = true; //Yup there are errors
  }
}
 
if($error==true){ echo "0"; } //ada field error respon kode = 0
elseif(!$error) { //tidak ada error dan mulai membuat query
  
$queryfields = array('nama', 'tempat_lahir', 'tanggal_lahir', 'kelamin', 'agama', 'status', 'status_hdk', 'pekerjaan', 'pendidikan', 'ayah', 'ibu', 'goldar', 'kewarganegaraan', 'paspor', 'kitas_kitap');
 
foreach($queryfields AS $fieldname) { //Loop trough each field
  		$$fieldname = mysql_real_escape_string($_POST[$fieldname]);
}

	
	$set = mysql_query("SELECT kodekab FROM pengaturan where id='1'");
	while ($set = mysql_fetch_array($set))
	$kodekab = $set["kodekab"]; 
	$tgl = $tanggal_lahir; 
	$jk = $kelamin;
	
	$rand = substr(rand(00000,99999),-4,4);
	if ($kelamin==2){		
	$tgl = tgldbnik1("$tgl"); 
		}
	else {
	$tgl = tgldbnik2("$tgl"); 
		}
	$NIK= $kodekab."".$tgl."".$rand;
	
	
$nama = ubah_huruf_ke_besar($nama);
$tempat_lahir = ubah_huruf_ke_besar($tempat_lahir);
$ayah = ubah_huruf_ke_besar($ayah);
$ibu = ubah_huruf_ke_besar($ibu);
$no_kk = $_GET['no_kk'];
$tgllahir = tgldb($_POST['tanggal_lahir']);
	
$cekkkquery = mysql_query("select * from kk where no_kk='$no_kk'");
$cekkk = mysql_num_rows($cekkkquery);
if ($cekkk=='0'){ //nomor kk tidak ada di database
echo "1"; // tidak ada kk kode = 1
}
else {
		$kk=mysql_fetch_array($cekkkquery);
		$sql = mysql_query("select * from penduduk where no_pen='$NIK'");
		$catch = mysql_num_rows($sql);
		if ($catch=='0'){ //nomor pen masih tersedia
				if(mysql_query("INSERT INTO penduduk(no_kk_pen, no_pen, nama_pen, kelamin_pen, goldar_pen, tempat_lahir_pen, tanggal_lahir_pen, agama_pen, pendidikan_pen, pekerjaan_pen, status_pen, status_hdk_pen, kewarganegaraan_pen, paspor_pen, kitas_kitap_pen, ayah_pen, ibu_pen, alamat_pen, rt_pen, rw_pen, statusnya)	
				 VALUES('$no_kk', '$NIK', '$nama', '$kelamin', '$goldar', '$tempat_lahir', '$tgllahir', '$agama', '$pendidikan', '$pekerjaan', '$status', '$status_hdk', '$kewarganegaraan', '$paspor', '$kitas_kitap', '$ayah', '$ibu', '$kk[alamat]', '$kk[rt]', '$kk[rw]', '4')")){
				  echo "2"; // berhasil menyimpan respon = 2
				 }
				else {
				  echo "3"; //gagal menyimpan respon = 3
				}
		}
		else {
		echo "4";
		} //nomor pen tidak tersedia respon = 4
	}
	
	
}
}
else {
	
include_once('../fungsi/koneksi.php');
include "../fungsi/fungsi_indotgl.php";
include "../fungsi/ubahkarakter.php";
$fields = array('no', 'nama', 'tempat_lahir', 'tanggal_lahir', 'kelamin', 'agama', 'status', 'status_hdk', 'pekerjaan', 'pendidikan', 'ayah', 'ibu', 'goldar', 'kewarganegaraan', 'paspor', 'kitas_kitap');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
    $error = true; //Yup there are errors
  }
}
 
if($error==true){ echo "0"; } //ada field error respon kode = 0
elseif(!$error) { //tidak ada error dan mulai membuat query
  
$queryfields = array('no', 'nama', 'tempat_lahir', 'tanggal_lahir', 'kelamin', 'agama', 'status', 'status_hdk', 'pekerjaan', 'pendidikan', 'ayah', 'ibu', 'goldar', 'kewarganegaraan', 'paspor', 'kitas_kitap');
 
foreach($queryfields AS $fieldname) { //Loop trough each field
  		$$fieldname = mysql_real_escape_string($_POST[$fieldname]);
}

$nama = ubah_huruf_ke_besar($nama);
$tempat_lahir = ubah_huruf_ke_besar($tempat_lahir);
$ayah = ubah_huruf_ke_besar($ayah);
$ibu = ubah_huruf_ke_besar($ibu);
$no_kk = $_GET['no_kk'];
$tgllahir = tgldb($_POST['tanggal_lahir']);
	
$cekkkquery = mysql_query("select * from kk where no_kk='$no_kk'");
$cekkk = mysql_num_rows($cekkkquery);
if ($cekkk=='0'){ //nomor kk tidak ada di database
echo "1"; // tidak ada kk kode = 1
}
else {
		$kk=mysql_fetch_array($cekkkquery);
		$sql = mysql_query("select * from penduduk where no_pen='$no'");
		$catch = mysql_num_rows($sql);
		if ($catch=='0'){ //nomor pen masih tersedia
				if(mysql_query("INSERT INTO penduduk(no_kk_pen, no_pen, nama_pen, kelamin_pen, goldar_pen, tempat_lahir_pen, tanggal_lahir_pen, agama_pen, pendidikan_pen, pekerjaan_pen, status_pen, status_hdk_pen, kewarganegaraan_pen, paspor_pen, kitas_kitap_pen, ayah_pen, ibu_pen, alamat_pen, rt_pen, rw_pen)	
				 VALUES('$no_kk', '$no', '$nama', '$kelamin', '$goldar', '$tempat_lahir', '$tgllahir', '$agama', '$pendidikan', '$pekerjaan', '$status', '$status_hdk', '$kewarganegaraan', '$paspor', '$kitas_kitap', '$ayah', '$ibu', '$kk[alamat]', '$kk[rt]', '$kk[rw]')")){
				  echo "2"; // berhasil menyimpan respon = 2
				 }
				else {
				  echo "3"; //gagal menyimpan respon = 3
				}
		}
		else {
		echo "4";
		} //nomor pen tidak tersedia respon = 4
	}
}	
	
}
}
  


elseif ($_POST['ambil']=='2') {


include_once('../fungsi/koneksi.php');

$queryfields = array('no_exist');
foreach($queryfields AS $fieldname) { //Loop trough each field
  		$$fieldname = $_POST[$fieldname];
}
$no_kk = $_GET['no_kk'];

$cekkkquery = mysql_query("select * from kk where no_kk='$no_kk'");
$cekkk = mysql_num_rows($cekkkquery);
		if ($cekkk=='0'){ //nomor kk tidak ada di database
		echo "1"; // tidak ada kk kode = 1
		}
		
		else { // Nomor KK Terferifikasi
		$penduduk=mysql_query("SELECT * FROM penduduk WHERE no_pen='$no_exist'");
		$nopen_lamacatch = mysql_num_rows($penduduk);
		if ($nopen_lamacatch=='1'){ //id kk masih tersedia
			$kk=mysql_fetch_array($cekkkquery);

			if (mysql_query("UPDATE penduduk SET no_kk_pen = '$no_kk', 
									  alamat_pen = '$kk[alamat]',  
									  rt_pen = '$kk[rt]',  
									  rw_pen = '$kk[rw]'									  
									  WHERE no_pen= '$no_exist'")){
									  
			echo "2"; // sukses respon kode = 2
			}

		else {
		  echo "3"; // gagal respon kode 4
		  }
		
			  }
			  else { echo "5"; }
			  }

        
}
  
  
}
  ?> 