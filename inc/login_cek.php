<?php
include "../fungsi/fungsi_anti_injection.php";
$message=array();
if(isset($_POST['uname']) && !empty($_POST['uname'])){ 
}else{ 
     $message[]='Nama Pengguna Belum Diisi !';
}

if(isset($_POST['password']) && !empty($_POST['password'])){ 
}else{
     $message[]='Kata Sandi Belum Diisi !';
}

$countError=count($message);
if($countError > 0){
     for($i=0;$i<$countError;$i++){
         echo ucwords($message[$i]).'<br/>';
     }
}
else{
include "../fungsi/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['uname']);
$pass     = anti_injection(md5($_POST['password']));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
  $result="1";
}
else{
$login=mysql_query("SELECT * FROM users WHERE uname='$username' AND password='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  include "timeout.php"; 
  include "../fungsi/library.php"; 

  $_SESSION[namauser]     = $r[uname]; 
  $_SESSION[namalengkap]  = $r[nama_lengkap]; 
  $_SESSION[passuser]     = $r[password];
  $_SESSION[leveluser]    = $r[type];
  $_SESSION[log]    	  = $r[log_akhir];
  
  // session timeout
  $_SESSION[login] = 1;
  timer();

	$sid_lama = session_id();
	
	session_regenerate_id();

	$sid_baru = session_id();
	$datetime = date('Y-m-d H:i:s');

  mysql_query("UPDATE users SET id_session='$sid_baru', log_akhir='$datetime' WHERE uname='$username'");
 $result="2";} 
else { $result="3";}
}
}
echo  $result;
?>
