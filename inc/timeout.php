<?php
session_start();
function timer(){
$time=60*60; //60dtk * 60 = 1 jam / 360dtk
$_SESSION[timeout]=time()+$time;
}
function cek_login(){
$timeout=$_SESSION[timeout];
if(time()<$timeout){
timer();
return true;
}else{
unset($_SESSION[timeout]);
session_destroy();  
return false;
}
}
?>