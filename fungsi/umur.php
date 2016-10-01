<?php 
function umur($tgl_lahir){
    $tgl=explode("-",$tgl_lahir);
    $cek_jmlhr1=cal_days_in_month(CAL_GREGORIAN,$tgl['1'],$tgl['2']);
    $cek_jmlhr2=cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y'));
    $sshari=$cek_jmlhr1-$tgl['0'];
    $ssbln=12-$tgl['1']-1;
    $hari=0;
    $bulan=0;
    $tahun=0;
//hari+bulan
    if($sshari+date('d')>=$cek_jmlhr2){
        $bulan=1;
        $hari=$sshari+date('d')-$cek_jmlhr2;
    }else{
        $hari=$sshari+date('d');
    }
    if($ssbln+date('m')+$bulan>=12){
        $bulan=($ssbln+date('m')+$bulan)-12;
        $tahun=date('Y')-$tgl['2'];
    }else{
        $bulan=($ssbln+date('m')+$bulan);
        $tahun=(date('Y')-$tgl['2'])-1;
    }

      $selisih=$tahun." Tahun ".$bulan." Bulan ".$hari." Hari";

      $selisih2=$tahun." Tahun ";
    return $selisih2;
}

function umur2($tgl_lahir,$tgl_wafat){
    $tgl=explode("-",$tgl_lahir);
    $tglw=explode("-",$tgl_wafat);
    $cek_jmlhr1=cal_days_in_month(CAL_GREGORIAN,$tgl['1'],$tgl['2']);
    $cek_jmlhr2=cal_days_in_month(CAL_GREGORIAN,$tglw['1'],$tglw['2']);
    $sshari=$cek_jmlhr1-$tgl['0'];
    $ssbln=12-$tgl['1']-1;
    $hari=0;
    $bulan=0;
    $tahun=0;
//hari+bulan
    if($sshari+$tglw['0']>=$cek_jmlhr2){
        $bulan=1;
        $hari=$sshari+$tglw['0']-$cek_jmlhr2;
    }else{
        $hari=$sshari+$tglw['0'];
    }
    if($ssbln+$tglw['1']+$bulan>=12){
        $bulan=($ssbln+$tglw['1']+$bulan)-12;
        $tahun=$tglw['2']-$tgl['2'];
    }else{
        $bulan=($ssbln+$tglw['1']+$bulan);
        $tahun=($tglw['2']-$tgl['2'])-1;
    }

      $selisih=$tahun." Tahun ".$bulan." Bulan ".$hari." Hari";

      $selisih2=$tahun." Tahun ";
    return $selisih2;
}

function ketahuihari($tgl_lahir){
$tanggal = strtotime("$tgl_lahir");
$hari_en = date('l', $tanggal);
$hari_ar = array("Monday"=>"Senin", "Tuesday"=>"Selasa", "Wednesday"=>"Rabu", "Thursday"=>"Kamis", "Friday"=>"Jumat", "Saturday"=>"Minggu", "Sunday"=>"Minggu");
$hari_id = $hari_ar[$hari_en];
return $hari_id;
}
?>