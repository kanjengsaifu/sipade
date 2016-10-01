<?php
  $server = "localhost";
  $database = "sipade_pasireurih";
  $username = "root";
  $password = "root";
  mysql_connect($server,$username,$password) or die("<div style='width:300px; margin:auto; padding:10px; text-align:center;' class='alert alert-danger'>Koneksi Gagal, Server Bermasalah</div>");
  mysql_select_db($database) or die("<div style='width:300px; margin:auto; padding:10px; text-align:center;' class='alert alert-danger'>Koneksi Gagal, Database Tidak Ada</div>");
?>