<?php 
// class paging untuk halaman komentar
class Listpen{
function cariPosisi($batas){
if(empty($_GET['hal'])){
	$posisi=0;
	$_GET['hal']=1;
}
else{
	$posisi = ($_GET['hal']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
} 
// Fungsi untuk link halaman 1,2,3 
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";


//mendeteksi filter hdk
if(isset($_GET[filterhdk])) {$Fhdk = $_GET[filterhdk];}
else {$Fhdk="0";}
//mendeteksi filter statusnya
if(isset($_GET[filterstatusnya])) {$Fst = $_GET[filterstatusnya];}
else {$Fst="0";}
//mendeteksi filter rt dan rw
if(isset($_GET[filterrw])) {$Frw = $_GET[filterrw];}
else {$Frw="0";}	
if(isset($_GET[filterrt])) {$Frt = $_GET[filterrt];}
else {$Frt="0";}	
$Fall = "!st".$Fst."!hdk".$Fhdk."!rw".$Frw."!rt".$Frt;
//mendeteksi tampilan
if($_GET[tampilan]=='1') {$T = "phlist";}
else {$T="ph";}
//mendeteksi penyortiran
if(isset($_GET[by])) {$BY = "@".$_GET[by]."!";}
else {$BY="!";}
//mendeteksi penyortiran
if(isset($_GET[jph])) {$JPH = "-".$_GET[jph]."$T@";}
else {$JPH="-20$T@";}


// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<li><a href=data".$Fall.$JPH."1".$BY.urlencode($_GET[query]).">&laquo;&laquo;</a></li> 
                    <li><a href=data$Fall$JPH$prev$BY".urlencode($_GET[query]).">&laquo;</a></li>";
}
else{ 
	$link_halaman .= "<li class='disabled'><a>&laquo;&laquo;</a></li><li class='disabled'><a>&laquo;</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 5 ? " <li><b class='titik'>...</b></li> " : " "); 
for ($i=$halaman_aktif-4; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href=data$Fall$JPH$i$BY".urlencode($_GET[query]).">$i</a></li> ";
  }
	  $angka .= "<li class='active'><a>$halaman_aktif <span class='sr-only'>(current)</span></a></li>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+5); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href=data$Fall$JPH$i$BY".urlencode($_GET[query]).">$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? "<li><b class='titik'>...</b></li> <li><a href=data$Fall$JPH$jmlhalaman$BY".urlencode($_GET[query]).">$jmlhalaman</a></li>" : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<li><a href=data$Fall$JPH$next$BY".urlencode($_GET[query]).">&raquo;</a></li> 
                     <li><a href=data$Fall$JPH$jmlhalaman$BY".urlencode($_GET[query]).">&raquo;&raquo;</a></li>";
}
else{
	$link_halaman .= "<li class='disabled'><a>&raquo;</a></li><li class='disabled'><a>&raquo;&raquo;</a></li>";
}
return $link_halaman;
}
}

?>
