<?php
function ubah_huruf_awal($pemisah, $paragrap) {  
//pisahkan $paragraf berdasarkan $pemisah dengan fungsi explode  
$pisahkalimat=explode($pemisah, $paragrap);  
$kalimatbaru = array();  
  
//looping dalam array  
foreach ($pisahkalimat as $kalimat) {  
//jadikan awal huruf masing2 array menjadi huruf besar dengan fungsi ucfirst  
$kalimatawalhurufbesar=ucwords(strtolower($kalimat));  
$kalimatbaru[] = $kalimatawalhurufbesar;  
}  
  
//kalo udah gabungin lagi dengan fungsi implode  
$textgood = implode($pemisah, $kalimatbaru);  
return $textgood;  
}  
   
   
function ubah_huruf_ke_besar($paragrap) {  
//pisahkan $paragraf berdasarkan $pemisah dengan fungsi explode  
$kalimat = strtoupper($paragrap);  
return $kalimat;  
}  
   
function ubah_huruf_ke_kecil($paragrap) {  
//pisahkan $paragraf berdasarkan $pemisah dengan fungsi explode  
$kalimat = strtolower($paragrap);  
return $kalimat;  
}  
   

function split_char($split) {  
$split_text = (string)$split; // convert into a string
$arr = str_split($split_text, "1"); // break string in 3 character sets
$newtext = implode("   |   ", $arr);  // implode array with comma
return $newtext; 
}

function split_char1($split) {  
$split_text = (string)$split; // convert into a string
$arr = str_split($split_text, "1"); // break string in 3 character sets
$newtext = implode("<span style='font-size:8pt; border-right: 1px solid #000;margin: 0 9pt;'></span>", $arr);  // implode array with comma
return $newtext; 
}


function split_onchar($split,$char1,$char2) {  
			$newtext = substr($split,'$char1','$char2');
return $newtext; 
}


function spliting($split) {  
$pisah = (string)$split; // convert into a string
$arr = str_split($pisah, "1"); // pisah setiap 1 huruf 
$new = implode("|", $arr);  // tambahkan (|)
$pisah=explode("|", $new);  // pisahkan setelah (|)
return $pisah; 
}
function spliting2($split) {  
$pisah = (string)$split; // convert into a string
$arr = str_split($pisah, "2"); // pisah setiap 2 huruf 
$new = implode("|", $arr);  // tambahkan (|)
$pisah=explode("|", $new);  // pisahkan setelah (|)
return $pisah; 
}
?>