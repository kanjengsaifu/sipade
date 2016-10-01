
<?php
 function time_ago($date)
 
{
 
  date_default_timezone_set('Asia/Jakarta');
if(empty($date)) {
 
return "No date provided";
 
}
 
$periods = array("detik", "menit", "jam", "hari", "minggu", "bulan", "tahun", "dekade");
 
$lengths = array("60","60","24","7","4.35","12","10");
 
$now = time();
 
$unix_date = strtotime($date);
 
// check validity of date
 
if(empty($unix_date)) {
 
return "Usia kiriman tidak diketahui.";
 
}
 
// is it future date or past date
 
if($now > $unix_date) {
 
$difference = $now - $unix_date;
 
$tense = "lalu";
 
} else {
 
$difference = $unix_date - $now;
$tense = "lalu";}
 
for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
 
$difference /= $lengths[$j];
 
}
 
$difference = round($difference);
 
if($difference != 1) {
 
$periods[$j].= " yang";
 
}
  if ($difference=='0'){
  
return "beberapa $periods[$j] {$tense}";

  }
  else {
return "$difference $periods[$j] {$tense}";
 }
}
?>