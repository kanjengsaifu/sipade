<?php
include "fungsi/fungsi_anti_injection.php";
if ($_GET['fn']=='login'){
session_start();
include_once('fungsi/koneksi.php');
$message=array();
if(isset($_POST['uname']) && !empty($_POST['uname'])){
     $uname=mysql_real_escape_string($_POST['uname']);
}else{ 
     $message[]='Nama Pengguna Belum Diisi !';
}

if(isset($_POST['password']) && !empty($_POST['password'])){
     $password=mysql_real_escape_string($_POST['password']);
}else{
     $message[]='Kata Sandi Belum Diisi !';
}

$countError=count($message);
if($countError > 0){
     for($i=0;$i<$countError;$i++){
         echo ucwords($message[$i]).'<br/>';
     }
}else{
     $query="select * from users where uname='$uname' and
             password='$password'";
     $res=mysql_query($query);
     $checkUser=mysql_num_rows($res);
     if($checkUser > 0){
         $_SESSION['LOGIN_STATUS']=true;
         $_SESSION['UNAME']=$uname;
         echo 'correct';
    }else{
         echo ucwords('nama pengguna dan kata sandi tidak cocok, silahkan coba lagi');
    }
}
}

elseif ($_GET['fn']=='logout'){
 session_start();
 session_destroy();
 header('location:auth.php#lose');
}
?>