<?php
function combotgl($awal, $akhir, $var, $terpilih, $class){
  echo "<select id='$var' name='$var' class='$class'>";
  for ($i=$awal; $i<=$akhir; $i++){
    $lebar=strlen($i);
    switch($lebar){
      case 1:
      {
        $g="0".$i;
        break;     
      }
      case 2:
      {
        $g=$i;
        break;     
      }      
    }  
    if ($i==$terpilih)
      echo "<option value='$g' selected>$g</option>";
    else
      echo "<option value='$g'>$g</option>";
  }
         echo "<option value='32'>--</option>";
  echo "</select> ";
}

function combobln($awal, $akhir, $var, $terpilih, $class){
  echo "<select id='$var' name='$var' class='$class'>";
  for ($bln=$awal; $bln<=$akhir; $bln++){
    $lebar=strlen($bln);
    switch($lebar){
      case 1:
      {
        $b="0".$bln;
        break;     
      }
      case 2:
      {
        $b=$bln;
        break;     
      }      
    }  
      if ($bln==$terpilih)
         echo "<option value=$b selected>$b</option>";
      else
        echo "<option value=$b>$b</option>";
  }
         echo "<option value='13'>--</option>";
  echo "</select> ";
}

function combothn($awal, $akhir, $var, $terpilih, $class){
  echo "<select id='$var' name='$var' class='$class'>";
  for ($i=$awal; $i<=$akhir; $i++){
    if ($i==$terpilih)
      echo "<option value=$i selected>$i</option>";
    else
      echo "<option  value=$i>$i</option>";
  }
         echo "<option value='0'>--</option>";
  echo "</select> ";
}

function combonamabln($awal, $akhir, $var, $terpilih, $class){
  $nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                      "Juni", "Juli", "Agustus", "September", 
                      "Oktober", "November", "Desember");
  echo "<select name='$var' id='$var' class='$class'>";
  for ($bln=$awal; $bln<=$akhir; $bln++){
      if ($bln==$terpilih)
         echo "<option value=$bln selected>$nama_bln[$bln]</option>";
      else
        echo "<option value=$bln>$nama_bln[$bln]</option>";
  }
         echo "<option value='13'>----------------</option>";
  echo "</select> ";
}


	function getBulantok($bln){
				switch ($bln){
					case 1: 
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break; 
				}
			} 	

function blntok($split) {  
$pisah = (string)$split; // convert into a string
$arr = str_split($pisah, "2"); // pisah setiap 2 huruf 
$new = implode("|", $arr);  // tambahkan (|)
$pisah=explode("|", $new);  // pisahkan setelah (|)
return $pisah; 
}


function combotglarsip($awal, $akhir, $var, $terpilih, $class, $style){
  echo "<select id='$var' name='$var' class='$class' style='$style'>";
  for ($i=$awal; $i<=$akhir; $i++){
    $lebar=strlen($i);
    switch($lebar){
      case 1:
      {
        $g="0".$i;
        break;     
      }
      case 2:
      {
        $g=$i;
        break;     
      }      
    }  
    if ($i==$terpilih)
      echo "<option value='$g' selected>$g</option>";
    else
      echo "<option value='$g'>$g</option>";
  }
         echo "<option value='32'>--</option>";
  echo "</select> ";
}

function combonamabln1($var, $terpilih, $class, $style){

	 
  $nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                      "Juni", "Juli", "Agustus", "September", 
                      "Oktober", "November", "Desember");
					  
  echo "<select name='$var' id='$var' class='$class' style='$style'>";
 
$PISAH = blntok("010203040506070809101112"); //setiap dua digit menyimbolkan satu bulan (saat ini diset hingga 12 bulan)
//looping dalam array
$nobln=1;  
foreach ($PISAH as $BLN) {   
	 $blnindo = getBulantok(substr($BLN,0,2));
      if ($BLN==$terpilih)
         echo "<option value=$BLN selected>$blnindo</option>";
      else
        echo "<option value=$BLN>$blnindo</option>";
  }
         echo "<option value='13'>----------------</option>";
  echo "</select> ";
}


?>