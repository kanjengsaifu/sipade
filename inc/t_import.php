<?php
include "../fungsi/fungsi_anti_injection.php";

session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "6";
}
else{ 

if(isset($_POST['csv']))
{

$file=$_POST['csv']; 
include_once('../fungsi/koneksi.php'); 
$cons= mysqli_connect("$server", "$username","$password","$database") or die(mysql_error());

$result1=mysqli_query($cons,"select count(*) count from penduduk");
$r1=mysqli_fetch_array($result1);
$count1=(int)$r1['count']; 

if (!file_exists($file)){ //File tidak ada
echo "Sumber Data Tidak Ditemukan, Silahkan cek dan coba lagi.";
}
else { //file ada

  $file_extension = strtolower(substr(strrchr($file,"."),1));
  
  if ($file_extension=='csv'){
 
if(mysqli_query($cons, '
    LOAD DATA LOCAL INFILE "'.$file.'"
        INTO TABLE kk
        FIELDS TERMINATED by \';\'
        LINES TERMINATED BY \'\r\n\'
		IGNORE 2 LINES
')){
mysqli_query($cons, '
    LOAD DATA LOCAL INFILE "'.$file.'"
        INTO TABLE penduduk
        FIELDS TERMINATED by \';\'
        LINES TERMINATED BY \'\r\n\'
		IGNORE 2 LINES
');
$result2=mysqli_query($cons,"select count(*) count from penduduk");
$r2=mysqli_fetch_array($result2);
$count2=(int)$r2['count'];
$count=$count2-$count1;
if($count>0)
echo "Success";
echo "<b> Berhasil Menyimpan $count Data Kedalam Database Penduduk </b> ";

}
else {
echo "3";
}

}
else {
echo "4";
}
}

}
else{
echo "1";
}
}
	  
 
?>