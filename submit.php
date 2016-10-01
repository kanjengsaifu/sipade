<?php
include "fungsi/fungsi_anti_injection.php";
session_start();
error_reporting(0);
include "inc/timeout.php";

if($_SESSION[login]==1){
if(!cek_login()){
$_SESSION[login] = 0;
}
}
if($_SESSION[login]==0){
  header('location:inc/logout.php');
}
else{
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "Anda harus masuk terlebih dahulu !";
}
else{
?>
<?php

include "fungsi/koneksi.php";
include "fungsi/fungsi_indotgl.php";
include "fungsi/terbilang.php";
include "fungsi/ubahkarakter.php";
include "fungsi/umur.php";

// LEMBAR KTP
	$rule_std = mysql_query("select * from pengaturan where id='2'");
	$rule=mysql_fetch_array($rule_std);
	$rule_cap = mysql_query("select * from pengaturan where id='1'");
	$rulecap=mysql_fetch_array($rule_cap);
	$set_pejabat = mysql_query("select * from pejabat where id='$_POST[ybt]' ");
	$setpejabat=mysql_fetch_array($set_pejabat);
	$RULEDESA = $rule['desa'];
	$RULEKODEDESA = $rule['kodedesa'];
	$RULEKEC = $rule['kecamatan'];
	$RULEKAB = $rule['kabupaten'];
	$RULEKODEKAB = $rule['kodekab'];
	$RULEPROV = $rule['provinsi'];
	$RULEALMT = $rule['alamat'];
	$RULEKODEPOS = $rule['kodepos'];
	
	$RULECAPDESA = $rulecap['desa'];
	$RULECAPKODEDESA = $rulecap['kodedesa'];
	$RULECAPKEC = $rulecap['kecamatan'];
	$RULECAPKAB = $rulecap['kabupaten'];
	$RULECAPKODEKAB = $rulecap['kodekab'];
	$RULECAPPROV = $rulecap['provinsi'];
	$RULECAPALMT = $rulecap['alamat'];
	$RULECAPKODEPOS = $rulecap['kodepos'];
	
  $redaksi_desa = "Desa $RULEDESA Kecamatan $RULEKEC Kabupaten $RULEKAB";
  
		if ($_POST[ybt]=='1'){	// Yang bertandatangan (kades=1) maka nama kepala desa yang dipakai
$AN = "KEPALA DESA $rulecap[desa]";
$KADES = $rulecap['kepaladesa'];
$KECAMATAN = $rulecap['kecamatan'];
		}
		else { // selain kades=1 (kepala desa) maka nama pejabat yang dipilihlah yang dipakai
$AN = "a/n KEPALA DESA $rulecap[desa] \n $setpejabat[ket]";
$KADES = $setpejabat[nama_cap];
$KECAMATAN = $rulecap['kecamatan'];
		}

	$arsip_pekerjaan = mysql_query("select * from arsip_pekerjaan where id_pekerjaan='$_POST[kerja]' ");
	$pekerjaan=mysql_fetch_array($arsip_pekerjaan);
$PEKERJAAN = $pekerjaan[pekerjaan];
	$arsip_status = mysql_query("select * from arsip_status where id_status='$_POST[status]' ");
	$status=mysql_fetch_array($arsip_status);
$STATUS = $status[status];

	$arsip_goldar = mysql_query("select * from arsip_goldar where id_goldar='$_POST[goldar]' ");
	$goldar=mysql_fetch_array($arsip_goldar);
$GOLDAR = $goldar[goldar];

if ($_POST[ket]!==''){ // menentukan kewarganegaraan (1=WNI)
$KET = $_POST['ket'];
		}
		else {
		$KET = "Melengkapi Persyaratan Administrasi";
		}
$KET = ubah_huruf_awal(". ",$KET);
$NAMA = $_POST['nama'];
$NAMA = ubah_huruf_ke_besar($NAMA);
$NAMAYBS = $_POST['nama'];
$NAMAYBS = ubah_huruf_ke_besar($NAMAYBS);
$KOTALAHIR = $_POST['ttl1'];
$KOTALAHIR = ubah_huruf_ke_kecil($KOTALAHIR);
$KOTALAHIR = ubah_huruf_awal(". ",$KOTALAHIR);
$TGLLAHIR = $_POST['ttl2'];


		if ($_POST[jk]=='1'){ // menentukan jenis kelamin (1=laki-laki)
$JK = "Laki-laki";
		}
		else {
$JK = "Perempuan";
			}
			

		if ($_POST[wn]=='1'){ // menentukan kewarganegaraan (1=WNI)
$WN = "WNI";
		}
		else {
$WN = "WNA";
			}
	
	$arsip_agama = mysql_query("select * from arsip_agama WHERE id_agama='$_POST[agm]'");
	$agama=mysql_fetch_array($arsip_agama);$AGAMA = $agama['agama'];
$NOID = preg_replace('/\D/', '', $_POST['noid']);
$NOKK = preg_replace('/\D/', '', $_POST['nokk']);
$RT = $_POST['rt'];
$RW	 = $_POST['rw'];
$ALMT = $_POST['almt'];
$DESA = $_POST['desa'];
$KEC = $_POST['kec'];
$KAB = $_POST['kab'];

	$statusnya = mysql_query("select * from penduduk WHERE no_pen='$NOID'");
	$statnya=mysql_fetch_array($statusnya);
$STATUSNYALAH = $statnya['statusnya'];
if ($_POST[tglbuat]!==''){ // menentukan kewarganegaraan (1=WNI)
$TGLBUAT = $_POST['tglbuat'];
		}
		else {
		$TGLBUAT = date('d-m-Y');
		}
$TGLTHN = tgl_thn($TGLBUAT);
$TGLBLN = tgl_bln($TGLBUAT);
$DBTGLBUAT = tgldb("$TGLBUAT");
$DBTGLLAHIR = tgldb("$TGLLAHIR");
$TGLNAMAFILE = tglnmfile("$TGLBUAT");
	$JWS = $_POST['surat'];
	$JWS = mysql_query("select * from arsip_surat WHERE id_surat='$JWS'");
	$JWS=mysql_fetch_array($JWS);
	$JWS = $JWS['jw'];

	
 function jS($JS){
				switch ($JS){
					case 1: 
						return "RESI";
						break;
					case 2:
						return "DOMISILI";
						break;
					case 3:
						return "SKU";
						break;
					case 4:
						return "SKDU";
						break;
					case 5:
						return "SKTM";
						break;
					case 6:
						return "SKKM";
						break;
					case 7:
						return "SKKB";
						break;
					case 8:
						return "KELAHIRAN";
						break;
					case 9:
						return "SKKK";
						break;
					case 10:
						return "SKW";
						break;
					case 11:
						return "SKPD";
						break;
					case 12:
						return "KTP";
						break; 
					case 13:
						return "NA";
						break; 
					case 14:
						return "SKBM";
						break; 
					case 15:
						return "KK";
						break; 
					case 16:
						return "EKTP";
						break; 
				}
			}
			$JSFile = jS($_POST[surat]);
 
		$TGLFOLDER = date('Y');
		$TGLFOLDER2 = date('m');
		$cachefolder = "arsip_surat/".$TGLFOLDER."/".$TGLFOLDER2;
		$namafile = $TGLNAMAFILE."-".$JSFile."-".$NOID.".rtf";
if (!file_exists($cachefolder)) {
    mkdir($cachefolder, 0777, true);
  	$cachefile = $cachefolder."/".$namafile;
}
	else {
  	$cachefile = $cachefolder."/".$namafile;
	}
	ob_start();  
	
  if ($_POST[surat]=='1'){
  // SKU
  $ALMT = "$ALMT RT. 0$RT / RW. 0$RW Desa $DESA Kecamatan $KEC Kabupaten $KAB";
  $TTL =$KOTALAHIR.', '.$TGLLAHIR;
  $TGLAKHIRRESI = tgl_jw($JWS,$TGLBUAT);  // Menyesuaikan jangka waktu berlaku surat
  $TGLBUAT = tgl_mod1($TGLBUAT);
  // End SKU
  //simpankedb
  mysql_query("INSERT INTO pelayanan(no_pen, tgl, nl, tgl_lhr, jk, agm, kerja, almt, js, ket, uname)
   VALUES('$NOID', '$DBTGLBUAT', '$NAMA', '$DBTGLLAHIR', '$JK', '$AGAMA', '$PEKERJAAN', '$ALMT', '$JSFile', '$KET', '$_SESSION[namauser]')");
  //End simpandb
 
  
  $document = file_get_contents("template_surat/sk_resi.rtf");
  $document = str_replace("%%RULEDESA%%", $RULECAPDESA, $document);
  $document = str_replace("%%RULEKEC%%", $RULECAPKEC, $document);
  $document = str_replace("%%RULEKAB%%", $RULECAPKAB, $document);
  $document = str_replace("%%RULEPROV%%", $RULECAPPROV, $document);
  $document = str_replace("%%RULEALMT%%", $RULEALMT, $document);
  $document = str_replace("%%RULEKODEPOS%%", $RULEKODEPOS, $document);
  $document = str_replace("%%RULEKECA%%", $RULEKEC, $document);
  $document = str_replace("%%RULEKABU%%", $RULEKAB, $document);
  $document = str_replace("%%REDAKSI%%", $redaksi_desa, $document);
  
  $document = str_replace("%%TGLTHN%%", $TGLTHN, $document);
  $document = str_replace("%%NAMA%%", $NAMA, $document);
  $document = str_replace("%%TTL%%", $TTL, $document);
  $document = str_replace("%%JK%%", $JK, $document);
  $document = str_replace("%%WN%%", $WN, $document);
  $document = str_replace("%%ALMT%%", $ALMT, $document);
  $document = str_replace("%%AGAMA%%", $AGAMA, $document);
  $document = str_replace("%%PEKERJAAN%%", $PEKERJAAN, $document);
  $document = str_replace("%%KET%%", $KET, $document);
  $document = str_replace("%%TGLBUAT%%", $TGLBUAT, $document);
  $document = str_replace("%%TGLAKHIR%%", $TGLAKHIRRESI, $document);
  $document = str_replace("%%AN%%", $AN, $document);
  $document = str_replace("%%KADES%%", $KADES, $document);
  header("Content-disposition: inline; filename=".$namafile);
  
  }
  elseif ($_POST[surat]=='2'){
  // DOMISILI
  
$RTID = $_POST['rtid'];
$RWID	 = $_POST['rwid'];
$ALMTID = $_POST['almtid'];
$ALMTID = mysql_query("select * from arsip_alamat WHERE id_alamat='$ALMTID'");
	$ALMTID=mysql_fetch_array($ALMTID);
	$ALMTID = $ALMTID['alamat'];
	
  $ALMTID = "$ALMTID RT. 0$RTID / RW. 0$RWID Desa $RULEDESA Kecamatan $RULEDESA Kabupaten $RULEDESA";
  $ALMT = "$ALMT RT. 0$RT / RW. 0$RW Desa $DESA Kecamatan $KEC Kabupaten $KAB";
  $TTL =$KOTALAHIR.', '.$TGLLAHIR;
  
  $TGLAKHIRDOMISILI = tgl_jw($JWS,$TGLBUAT);  // Menyesuaikan jangka waktu berlaku surat
  $TGLBUAT = tgl_mod1($TGLBUAT);
  // End SKU
  //simpankedb
  mysql_query("INSERT INTO pelayanan(no_pen, tgl, nl, tgl_lhr, jk, agm, kerja, almt, js, ket, uname)
   VALUES('$NOID', '$DBTGLBUAT', '$NAMA', '$DBTGLLAHIR', '$JK', '$AGAMA', '$PEKERJAAN', '$ALMT', '$JSFile', '$KET - $ALMTID', '$_SESSION[namauser]')");
  //End simpandb

   
  
  $document = file_get_contents("template_surat/sk_domisili.rtf");
  $document = str_replace("%%RULEDESA%%", $RULECAPDESA, $document);
  $document = str_replace("%%RULEKEC%%", $RULECAPKEC, $document);
  $document = str_replace("%%RULEKAB%%", $RULECAPKAB, $document);
  $document = str_replace("%%RULEPROV%%", $RULECAPPROV, $document);
  $document = str_replace("%%RULEALMT%%", $RULEALMT, $document);
  $document = str_replace("%%RULEKODEPOS%%", $RULEKODEPOS, $document);
  $document = str_replace("%%RULEKECA%%", $RULEKEC, $document);
  $document = str_replace("%%RULEKABU%%", $RULEKAB, $document);
  $document = str_replace("%%REDAKSI%%", $redaksi_desa, $document);
  
  $document = str_replace("%%TGLTHN%%", $TGLTHN, $document);
  $document = str_replace("%%NAMA%%", $NAMA, $document);
  $document = str_replace("%%NAMAYBS%%", $NAMA, $document);
  $document = str_replace("%%TTL%%", $TTL, $document);
  $document = str_replace("%%JK%%", $JK, $document);
  $document = str_replace("%%WN%%", $WN, $document);
  $document = str_replace("%%NOID%%", $NOID, $document);
  $document = str_replace("%%ALMT%%", $ALMTID, $document);
  $document = str_replace("%%AGAMA%%", $AGAMA, $document);
  $document = str_replace("%%PEKERJAAN%%", $PEKERJAAN, $document);
  $document = str_replace("%%KET%%", $KET, $document);
  $document = str_replace("%%TGLBUAT%%", $TGLBUAT, $document);
  $document = str_replace("%%TGLAKHIR%%", $TGLAKHIRDOMISILI, $document);
  $document = str_replace("%%AN%%", $AN, $document);
  $document = str_replace("%%KADES%%", $KADES, $document);
  header("Content-disposition: inline; filename=".$namafile);
  
  }
  elseif ($_POST[surat]=='3'){
  // SKU
  $ALMT = "$ALMT RT. 0$RT / RW. 0$RW Desa $DESA Kecamatan $KEC Kabupaten $KAB";
  $TTL =$KOTALAHIR.', '.$TGLLAHIR;
  $BU = $_POST['sku_bu'];
  $NP = $_POST['sku_np'];
  $JU = $_POST['sku_ju'];
  $LU = $_POST['almtsku_lu']." RT. 0".$_POST['rtsku_lu']." RW. 0".$_POST['rwsku_lu']." Desa ".$_POST['desasku_lu']." Kecamatan ".$_POST['kecsku_lu']." Kabupaten ".$_POST['kabsku_lu'];
  $DB_LU = $_POST['almtsku_lu']."+".$_POST['rtsku_lu']."+".$_POST['rwsku_lu']."+".$_POST['desasku_lu']."+".$_POST['kecsku_lu']."+".$_POST['kabsku_lu'];
  
  $TGLAKHIRSKU = tgl_jw($JWS,$TGLBUAT);  // Menyesuaikan jangka waktu berlaku surat
  $TGLBUAT = tgl_mod1($TGLBUAT);
  // End SKU
  
  //simpankedb
  mysql_query("INSERT INTO pelayanan(no_pen, tgl, nl, tgl_lhr, jk, agm, kerja, almt, js, ket, uname)
   VALUES('$NOID', '$DBTGLBUAT', '$NAMA', '$DBTGLLAHIR', '$JK', '$AGAMA', '$PEKERJAAN', '$ALMT', '$JSFile', '$KET', '$_SESSION[namauser]')");
  //End simpandb
   
  
  $document = file_get_contents("template_surat/sk_usaha.rtf");
  $document = str_replace("%%RULEDESA%%", $RULECAPDESA, $document);
  $document = str_replace("%%RULEKEC%%", $RULECAPKEC, $document);
  $document = str_replace("%%RULEKAB%%", $RULECAPKAB, $document);
  $document = str_replace("%%RULEPROV%%", $RULECAPPROV, $document);
  $document = str_replace("%%RULEALMT%%", $RULEALMT, $document);
  $document = str_replace("%%RULEKODEPOS%%", $RULEKODEPOS, $document);
  $document = str_replace("%%RULEKECA%%", $RULEKEC, $document);
  $document = str_replace("%%RULEKABU%%", $RULEKAB, $document);
  $document = str_replace("%%REDAKSI%%", $redaksi_desa, $document);
  
  $document = str_replace("%%TGLTHN%%", $TGLTHN, $document);
  $document = str_replace("%%NAMA%%", $NAMA, $document);
  $document = str_replace("%%NAMAYBS%%", $NAMAYBS, $document);
  $document = str_replace("%%TTL%%", $TTL, $document);
  $document = str_replace("%%JK%%", $JK, $document);
  $document = str_replace("%%WN%%", $WN, $document);
  $document = str_replace("%%NOID%%", $NOID, $document);
  $document = str_replace("%%ALMT%%", $ALMT, $document);
  $document = str_replace("%%BU%%", $BU, $document);
  $document = str_replace("%%NP%%", $NP, $document);
  $document = str_replace("%%JU%%", $JU, $document);
  $document = str_replace("%%LU%%", $LU, $document);
  $document = str_replace("%%TGLBUAT%%", $TGLBUAT, $document);
  $document = str_replace("%%TGLAKHIR%%", $TGLAKHIRSKU, $document);
  $document = str_replace("%%AN%%", $AN, $document);
  $document = str_replace("%%KADES%%", $KADES, $document);
  header("Content-disposition: inline; filename=".$namafile);
  
  }
  elseif ($_POST[surat]=='4'){
  // SKDU
  $ALMT = "$ALMT RT. 0$RT / RW. 0$RW Desa $DESA Kecamatan $KEC Kabupaten $KAB";
  $TTL =$KOTALAHIR.', '.$TGLLAHIR;
  $DNP = $_POST['skdu_np'];
  $DJU = $_POST['skdu_ju'];
  $DLTU = $_POST['skdu_ltu'];
  $DLTUBILANG = terbilang($DLTU);
  $DJMLKAR = $_POST['skdu_jk'];
  $DJMLKARBILANG = terbilang($DJMLKAR);
  $DSTATUSTNH = $_POST['skdu_stb'];
  $DLU = $_POST['almtskdu_almt']." RT. 0".$_POST['rtskdu_almt']." RW. 0".$_POST['rwskdu_almt']." Desa $rule[desa] Kecamatan $rule[kecamatan] Kabupaten $rule[kabupaten]";
  $DB_DLU = $_POST['almtskdu_almt']."+".$_POST['rtskdu_almt']."+".$_POST['rwskdu_almt']."+".$rule['desa']."+".$rule['kecamatan']."+".$rule['kabupaten'];
  $DNILAIINVEST = $_POST['skdu_nip'];
  $DNILAIINVESTBILANG = terbilang($DNILAIINVEST);
  $TGLBUAT = tgl_mod1($TGLBUAT);
  // End SKDU
  //simpankedb
  mysql_query("INSERT INTO pelayanan(no_pen, tgl, nl, tgl_lhr, jk, agm, kerja, almt, js, ket, uname)
   VALUES('$NOID', '$DBTGLBUAT', '$NAMA', '$DBTGLLAHIR', '$JK', '$AGAMA', '$PEKERJAAN', '$ALMT', '$JSFile', '$KET', '$_SESSION[namauser]')");
  //End simpandb
  
  
  
  $document = file_get_contents("template_surat/sk_domisili_usaha.rtf");
  $document = str_replace("%%RULEDESA%%", $RULECAPDESA, $document);
  $document = str_replace("%%RULEKEC%%", $RULECAPKEC, $document);
  $document = str_replace("%%RULEKAB%%", $RULECAPKAB, $document);
  $document = str_replace("%%RULEPROV%%", $RULECAPPROV, $document);
  $document = str_replace("%%RULEALMT%%", $RULEALMT, $document);
  $document = str_replace("%%RULEKODEPOS%%", $RULEKODEPOS, $document);
  $document = str_replace("%%RULEKECA%%", $RULEKEC, $document);
  $document = str_replace("%%RULEKABU%%", $RULEKAB, $document);
  $document = str_replace("%%REDAKSI%%", $redaksi_desa, $document);
  
  $document = str_replace("%%TGLTHN%%", $TGLTHN, $document);
  $document = str_replace("%%TGLBLN%%", $TGLBLN, $document);
  $document = str_replace("%%NAMA%%", $NAMA, $document);
  $document = str_replace("%%NAMAYBS%%", $NAMAYBS, $document);
  $document = str_replace("%%TTL%%", $TTL, $document);
  $document = str_replace("%%JK%%", $JK, $document);
  $document = str_replace("%%AGAMA%%", $AGAMA, $document);
  $document = str_replace("%%WN%%", $WN, $document);
  $document = str_replace("%%ALMT%%", $ALMT, $document);
  $document = str_replace("%%DLU%%", $DLU, $document);
  $document = str_replace("%%DNP%%", $DNP, $document);
  $document = str_replace("%%DJU%%", $DJU, $document);
  $document = str_replace("%%DLTU%%", "$DLTU ($DLTUBILANG)", $document);
  $document = str_replace("%%DJMLKAR%%", "$DJMLKAR ($DJMLKARBILANG)", $document);
  $document = str_replace("%%DSTATUSTNH%%", $DSTATUSTNH, $document);
  $document = str_replace("%%DNILAIINVEST%%", "$DNILAIINVEST ($DNILAIINVESTBILANG Rupiah)", $document);
  $document = str_replace("%%KET%%", $KET, $document);
  $document = str_replace("%%TGLBUAT%%", $TGLBUAT, $document);
  $document = str_replace("%%AN%%", $AN, $document);
  $document = str_replace("%%KADES%%", $KADES, $document);
  header("Content-disposition: inline; filename=".$namafile);
  
  }
  elseif ($_POST[surat]=='5'){
  // SKTM
  if ($_POST[sktmgunakannomor]=='1'){
  $NOKTPKK = $NOID;
  }
  else { $NOKTPKK = $NOKK; }
  
  $NAMAORTU = $_POST['ortu'];
  $ALMT = "$ALMT RT. 0$RT / RW. 0$RW Desa $DESA Kecamatan $KEC Kabupaten $KAB";
  $TTL =$KOTALAHIR.', '.$TGLLAHIR;
  $TGLBUAT = tgl_mod1($TGLBUAT);
  // End SKTM
  //simpankedb
  mysql_query("INSERT INTO pelayanan(no_pen, tgl, nl, tgl_lhr, jk, agm, kerja, almt, js, ket, uname)
   VALUES('$NOID', '$DBTGLBUAT', '$NAMA', '$DBTGLLAHIR', '$JK', '$AGAMA', '$PEKERJAAN', '$ALMT', '$JSFile', '$KET', '$_SESSION[namauser]')");
  //End simpandb
  
    
  
  $document = file_get_contents("template_surat/sk_tm.rtf");
  $document = str_replace("%%RULEDESA%%", $RULECAPDESA, $document);
  $document = str_replace("%%RULEKEC%%", $RULECAPKEC, $document);
  $document = str_replace("%%RULEKAB%%", $RULECAPKAB, $document);
  $document = str_replace("%%RULEPROV%%", $RULECAPPROV, $document);
  $document = str_replace("%%RULEALMT%%", $RULEALMT, $document);
  $document = str_replace("%%RULEKODEPOS%%", $RULEKODEPOS, $document);
  $document = str_replace("%%RULEKECA%%", $RULEKEC, $document);
  $document = str_replace("%%RULEKABU%%", $RULEKAB, $document);
  $document = str_replace("%%REDAKSI%%", $redaksi_desa, $document);
  
  $document = str_replace("%%TGLTHN%%", $TGLTHN, $document);
  $document = str_replace("%%NOKTPKK%%", $NOKTPKK, $document);
  $document = str_replace("%%NAMA%%", $NAMA, $document);
  $document = str_replace("%%TTL%%", $TTL, $document);
  $document = str_replace("%%JK%%", $JK, $document);
  $document = str_replace("%%WN%%", $WN, $document);
  $document = str_replace("%%ALMT%%", $ALMT, $document);
  $document = str_replace("%%AGAMA%%", $AGAMA, $document);
  $document = str_replace("%%PEKERJAAN%%", $PEKERJAAN, $document);
  $document = str_replace("%%NAMAORTU%%", $NAMAORTU, $document);
  $document = str_replace("%%KET%%", $KET, $document);
  $document = str_replace("%%TGLBUAT%%", $TGLBUAT, $document);
  $document = str_replace("%%TGLAKHIR%%", $TGLAKHIRRESI, $document);
  $document = str_replace("%%AN%%", $AN, $document);
  $document = str_replace("%%KADES%%", $KADES, $document);
  header("Content-disposition: inline; filename=".$namafile);
  
  }
  elseif ($_POST[surat]=='6'){
  // SKKM
  if ($_POST[skkmgunakannomor]=='1'){
  $NOKTPKK = $NOID;
  }
  else { $NOKTPKK = $NOKK; }
  
  $NAMAORTU = $_POST['ortu'];
  $ALMT = "$ALMT RT. 0$RT / RW. 0$RW Desa $DESA Kecamatan $KEC Kabupaten $KAB";
  $TTL =$KOTALAHIR.', '.$TGLLAHIR;
  $TGLBUAT = tgl_mod1($TGLBUAT);
  // End SKTM
  //simpankedb
  mysql_query("INSERT INTO pelayanan(no_pen, tgl, nl, tgl_lhr, jk, agm, kerja, almt, js, ket, uname)
   VALUES('$NOID', '$DBTGLBUAT', '$NAMA', '$DBTGLLAHIR', '$JK', '$AGAMA', '$PEKERJAAN', '$ALMT', '$JSFile', '$KET', '$_SESSION[namauser]')");
  //End simpandb
  
  
  
  
  $document = file_get_contents("template_surat/sk_km.rtf");
  $document = str_replace("%%RULEDESA%%", $RULECAPDESA, $document);
  $document = str_replace("%%RULEKEC%%", $RULECAPKEC, $document);
  $document = str_replace("%%RULEKAB%%", $RULECAPKAB, $document);
  $document = str_replace("%%RULEPROV%%", $RULECAPPROV, $document);
  $document = str_replace("%%RULEALMT%%", $RULEALMT, $document);
  $document = str_replace("%%RULEKODEPOS%%", $RULEKODEPOS, $document);
  $document = str_replace("%%RULEKECA%%", $RULEKEC, $document);
  $document = str_replace("%%RULEKABU%%", $RULEKAB, $document);
  $document = str_replace("%%REDAKSI%%", $redaksi_desa, $document);
  
  $document = str_replace("%%TGLTHN%%", $TGLTHN, $document);
  $document = str_replace("%%NOKTPKK%%", $NOKTPKK, $document);
  $document = str_replace("%%NAMA%%", $NAMA, $document);
  $document = str_replace("%%TTL%%", $TTL, $document);
  $document = str_replace("%%JK%%", $JK, $document);
  $document = str_replace("%%WN%%", $WN, $document);
  $document = str_replace("%%ALMT%%", $ALMT, $document);
  $document = str_replace("%%AGAMA%%", $AGAMA, $document);
  $document = str_replace("%%PEKERJAAN%%", $PEKERJAAN, $document);
  $document = str_replace("%%STATUS%%", $STATUS, $document);
  $document = str_replace("%%NAMAORTU%%", $NAMAORTU, $document);
  $document = str_replace("%%KET%%", $KET, $document);
  $document = str_replace("%%TGLBUAT%%", $TGLBUAT, $document);
  $document = str_replace("%%TGLAKHIR%%", $TGLAKHIRRESI, $document);
  $document = str_replace("%%AN%%", $AN, $document);
  $document = str_replace("%%KADES%%", $KADES, $document);
  header("Content-disposition: inline; filename=".$namafile);
  
  }
  elseif ($_POST[surat]=='7'){
  // SKKM
  if ($_POST[skkbgunakannomor]=='1'){
  $NOKTPKK = $NOID;
  }
  else { $NOKTPKK = $NOKK; }
  
  $NAMAORTU = $_POST['ortu'];
  $ALMT = "$ALMT RT. 0$RT / RW. 0$RW Desa $DESA Kecamatan $KEC Kabupaten $KAB";
  $TTL =$KOTALAHIR.', '.$TGLLAHIR;
  $TGLBUAT = tgl_mod1($TGLBUAT);
  // End SKTM
  //simpankedb
  mysql_query("INSERT INTO pelayanan(no_pen, tgl, nl, tgl_lhr, jk, agm, kerja, almt, js, ket, uname)
   VALUES('$NOID', '$DBTGLBUAT', '$NAMA', '$DBTGLLAHIR', '$JK', '$AGAMA', '$PEKERJAAN', '$ALMT', '$JSFile', '$KET', '$_SESSION[namauser]')");
  //End simpandb
  
  
  
  
  $document = file_get_contents("template_surat/sk_kb.rtf");
  $document = str_replace("%%RULEDESA%%", $RULECAPDESA, $document);
  $document = str_replace("%%RULEKEC%%", $RULECAPKEC, $document);
  $document = str_replace("%%RULEKAB%%", $RULECAPKAB, $document);
  $document = str_replace("%%RULEPROV%%", $RULECAPPROV, $document);
  $document = str_replace("%%RULEALMT%%", $RULEALMT, $document);
  $document = str_replace("%%RULEKODEPOS%%", $RULEKODEPOS, $document);
  $document = str_replace("%%RULEKECA%%", $RULEKEC, $document);
  $document = str_replace("%%RULEKABU%%", $RULEKAB, $document);
  $document = str_replace("%%REDAKSI%%", $redaksi_desa, $document);
  
  $document = str_replace("%%TGLTHN%%", $TGLTHN, $document);
  $document = str_replace("%%NOKTPKK%%", $NOKTPKK, $document);
  $document = str_replace("%%NAMA%%", $NAMA, $document);
  $document = str_replace("%%TTL%%", $TTL, $document);
  $document = str_replace("%%JK%%", $JK, $document);
  $document = str_replace("%%WN%%", $WN, $document);
  $document = str_replace("%%ALMT%%", $ALMT, $document);
  $document = str_replace("%%AGAMA%%", $AGAMA, $document);
  $document = str_replace("%%PEKERJAAN%%", $PEKERJAAN, $document);
  $document = str_replace("%%STATUS%%", $STATUS, $document);
  $document = str_replace("%%NAMAORTU%%", $NAMAORTU, $document);
  $document = str_replace("%%KET%%", $KET, $document);
  $document = str_replace("%%TGLBUAT%%", $TGLBUAT, $document);
  $document = str_replace("%%TGLAKHIR%%", $TGLAKHIRRESI, $document);
  $document = str_replace("%%AN%%", $AN, $document);
  $document = str_replace("%%KADES%%", $KADES, $document);
  $document = str_replace("%%KECAMATAN%%", $KECAMATAN, $document);
  header("Content-disposition: inline; filename=".$namafile);
  
  }
  elseif ($_POST[surat]=='8'){
  // KELAHIRAN
  $TGLBUAT = tgl_mod1($TGLBUAT);
  
  $ALMTLENGKAP = "$ALMT RT. 0$RT / RW. 0$RW Desa $DESA Kecamatan $KEC Kabupaten $KAB";
  if ($_POST[jamlahir]!==''){ 
  $JAM = $_POST['jamlahir'];
		}
		else {
  $JAM = "........ : ........";
  }
  $ZONA = $_POST['zonawaktu'];
  $JAMLAHIR = $JAM.' '.$ZONA;
   if ($_POST[anakke]!==''){ 
  $ANAKKE = $_POST['anakke'];
  $ANAKKEBILANG = terbilang($_POST['anakke']);
		}
		else {
  $ANAKKE = "................................";
  $ANAKKEBILANG = ".......................................";
  }
  
  if ($_POST[dari]=='1' || $_POST[dari]=='0'){
  
  $DARI = '-';
  $DB_DARI = '-';
  }
  else {
  
   if ($_POST[dari]!==''){ 
  $DARI = terbilang($_POST['dari']).' Bersaudara';
  $DB_DARI = $_POST['dari'];
  }
  else {
  
  $DARI = '...................................................';
  $DB_DARI = 'null';
  }
  }
  $tanggal = strtotime("$_POST[ttl2]");
  $hari_en = date('l', $tanggal);
  $hari_ar = array("Monday"=>"Senin", "Tuesday"=>"Selasa", "Wednesday"=>"Rabu", "Thursday"=>"Kamis", "Friday"=>"Jumat", "Saturday"=>"Sabtu", "Sunday"=>"Minggu");
  $hari_id = $hari_ar[$hari_en];
  $HARILAHIR = $hari_id;
  
  if ($_POST[pupusayah]=='1'){
  
  $NAMAAYAH = $_POST['namaayah'];
  $NAMAAYAH = ubah_huruf_ke_besar($NAMAAYAH). ' (Almarhum)';
  $TTLAYAH = '-';
  $AGAMAAYAH = '-';
  $KTPAYAH = '-';
  $KERJAAYAH =  '-';
  $ALMTAYAH = '-';
  $RTAYAH = '-';
  $RWAYAH =  '-';
  $DESAAYAH = '-';
  $KECAYAH = '-';
  $KABAYAH =  '-';
  $ALMTAYAH = '-';
  }
  else {
  //ayah
  $NAMAAYAH = $_POST['namaayah'];
  $NAMAAYAH = ubah_huruf_ke_besar($NAMAAYAH);
  $TTLAYAH = $_POST['ttl1ayah'].', '.$_POST['ttl2ayah'];
  $arsip_agamaayah = mysql_query("select * from arsip_agama WHERE id_agama='$_POST[agmayah]'");
  $agamaayah=mysql_fetch_array($arsip_agamaayah);
  $AGAMAAYAH = $agamaayah['agama'];
  $KTPAYAH = preg_replace('/\D/', '', $_POST['noidayah']);
  $arsip_pekerjaanayah = mysql_query("select * from arsip_pekerjaan where id_pekerjaan='$_POST[kerjaayah]' ");
  $pekerjaanayah=mysql_fetch_array($arsip_pekerjaanayah);
  $KERJAAYAH = $pekerjaanayah['pekerjaan'];
  $ALMTAYAH = $_POST['almtayah'];
  $RTAYAH = $_POST['rtayah'];
  $RWAYAH = $_POST['rwayah'];
  $DESAAYAH = $_POST['desaayah'];
  $KECAYAH = $_POST['kecayah'];
  $KABAYAH = $_POST['kabayah'];
  $ALMTAYAH = "$ALMTAYAH RT. 0$RTAYAH / RW. 0$RWAYAH Desa $DESAAYAH Kecamatan $KECAYAH Kabupaten $KABAYAH";
  }
  
  if ($_POST[pupusibu]=='1'){
  
  $NAMAIBU = $_POST['namaibu'];
  $NAMAIBU = ubah_huruf_ke_besar($NAMAIBU). ' (Almarhumah)';
  $TTLIBU = '-';
  $AGAMAIBU = '-';
  $KTPIBU = '-';
  $KERJAIBU =  '-';
  $ALMTIBU = '-';
  $RTIBU = '-';
  $RWIBU =  '-';
  $DESAIBU = '-';
  $KECIBU = '-';
  $KABIBU =  '-';
  $ALMTIBU = '-';
  }
  else {
  //ibu
  $NAMAIBU = $_POST['namaibu'];
  $NAMAIBU = ubah_huruf_ke_besar($NAMAIBU);
  $TTLIBU = $_POST['ttl1ibu'].', '.$_POST['ttl2ibu'];
  $arsip_agamaibu = mysql_query("select * from arsip_agama WHERE id_agama='$_POST[agmibu]'");
  $agamaibu=mysql_fetch_array($arsip_agamaibu);
  $AGAMAIBU = $agamaibu['agama'];
  $KTPIBU = preg_replace('/\D/', '', $_POST['noidibu']);
  $arsip_pekerjaanibu = mysql_query("select * from arsip_pekerjaan where id_pekerjaan='$_POST[kerjaibu]' ");
  $pekerjaanibu=mysql_fetch_array($arsip_pekerjaanibu);
  $KERJAIBU = $pekerjaanibu['pekerjaan'];
  $ALMTIBU = $_POST['almtibu'];
  $RTIBU = $_POST['rtibu'];
  $RWIBU = $_POST['rwibu'];
  $DESAIBU = $_POST['desaibu'];
  $KECIBU = $_POST['kecibu'];
  $KABIBU = $_POST['kabibu'];
  $ALMTIBU = "$ALMTIBU RT. 0$RTIBU / RW. 0$RWIBU Desa $DESAIBU Kecamatan $KECIBU Kabupaten $KABIBU";
  }
  
  // End KELAHIRAN
  //simpankedb
  mysql_query("INSERT INTO pelayanan(no_pen, tgl, nl, tgl_lhr, jk, agm, kerja, almt, js, ket, uname)
   VALUES('$NOID', '$DBTGLBUAT', '$NAMA', '$DBTGLLAHIR', '$JK', '$AGAMA', '$PEKERJAAN', '$ALMTLENGKAP', '$JSFile', '$KET', '$_SESSION[namauser]')");
  //End simpandb
  
  
  
  
  $document = file_get_contents("template_surat/sk_kelahiran.rtf");
  $document = str_replace("%%RULEDESA%%", $RULEDESA, $document);
  $document = str_replace("%%RULEKEC%%", $RULEKEC, $document);
  $document = str_replace("%%RULEKAB%%", $RULECAPKAB, $document);
  $document = str_replace("%%REDAKSI%%", $redaksi_desa, $document);
  
  $document = str_replace("%%TGLTHN%%", $TGLTHN, $document);
  $document = str_replace("%%NAMA%%", $NAMA, $document);
  $document = str_replace("%%ANAKKE%%", $ANAKKE, $document);
  $document = str_replace("%%ANAKKEBILANG%%", $ANAKKEBILANG, $document);
  $document = str_replace("%%DARI%%", $DARI, $document);
  $document = str_replace("%%KOTALAHIR%%", $KOTALAHIR, $document);
  $document = str_replace("%%TGLLAHIR%%", $TGLLAHIR, $document);
  $document = str_replace("%%HARILAHIR%%", $HARILAHIR, $document);
  $document = str_replace("%%JAMLAHIR%%", $JAMLAHIR, $document);
  $document = str_replace("%%JK%%", $JK, $document);
  
  $document = str_replace("%%NAMAAYAH%%", $NAMAAYAH, $document);
  $document = str_replace("%%TTLAYAH%%", $TTLAYAH, $document);
  $document = str_replace("%%ALMTAYAH%%", $ALMTAYAH, $document);
  $document = str_replace("%%AGAMAAYAH%%", $AGAMAAYAH, $document);
  $document = str_replace("%%KERJAAYAH%%", $KERJAAYAH, $document);
  $document = str_replace("%%KTPAYAH%%", $KTPAYAH, $document);
  
  $document = str_replace("%%NAMAIBU%%", $NAMAIBU, $document);
  $document = str_replace("%%TTLIBU%%", $TTLIBU, $document);
  $document = str_replace("%%ALMTIBU%%", $ALMTIBU, $document);
  $document = str_replace("%%AGAMAIBU%%", $AGAMAIBU, $document);
  $document = str_replace("%%KERJAIBU%%", $KERJAIBU, $document);
  $document = str_replace("%%KTPIBU%%", $KTPIBU, $document);
  
  $document = str_replace("%%TGLBUAT%%", $TGLBUAT, $document);
  $document = str_replace("%%AN%%", $AN, $document);
  $document = str_replace("%%KADES%%", $KADES, $document);
  header("Content-disposition: inline; filename=".$namafile);
  
  }
  elseif ($_POST[surat]=='9'){
  // SKKK
  $WAKTURAME = $_POST['wakturame'];
  $WAKTURAME = tgl_mod1($WAKTURAME);
  $JENISRAME = $_POST['jenisrame'];
  $MAKSUDRAME = $_POST['maksudrame'];
  $ALMT = "$ALMT RT. 0$RT / RW. 0$RW Desa $DESA Kecamatan $KEC Kabupaten $KAB";
  $TTL =$KOTALAHIR.', '.$TGLLAHIR;
  $TGLBUAT = tgl_mod1($TGLBUAT);
  // End SKU
  //simpankedb
  mysql_query("INSERT INTO pelayanan(no_pen, tgl, nl, tgl_lhr, jk, agm, kerja, almt, js, ket, uname)
   VALUES('$NOID', '$DBTGLBUAT', '$NAMA', '$DBTGLLAHIR', '$JK', '$AGAMA', '$PEKERJAAN', '$ALMT', '$JSFile', '$KET', '$_SESSION[namauser]')");
  //End simpandb
  
  
  
  
  $document = file_get_contents("template_surat/sk_kk.rtf");
  $document = str_replace("%%RULEDESA%%", $RULECAPDESA, $document);
  $document = str_replace("%%RULEKEC%%", $RULECAPKEC, $document);
  $document = str_replace("%%RULEKAB%%", $RULECAPKAB, $document);
  $document = str_replace("%%RULEPROV%%", $RULECAPPROV, $document);
  $document = str_replace("%%RULEALMT%%", $RULEALMT, $document);
  $document = str_replace("%%RULEKODEPOS%%", $RULEKODEPOS, $document);
  $document = str_replace("%%RULEKECA%%", $RULEKEC, $document);
  $document = str_replace("%%RULEKABU%%", $RULEKAB, $document);
  $document = str_replace("%%REDAKSI%%", $redaksi_desa, $document);
  
  $document = str_replace("%%TGLTHN%%", $TGLTHN, $document);
  $document = str_replace("%%NAMA%%", $NAMA, $document);
  $document = str_replace("%%TTL%%", $TTL, $document);
  $document = str_replace("%%JK%%", $JK, $document);
  $document = str_replace("%%WN%%", $WN, $document);
  $document = str_replace("%%NOID%%", $NOID, $document);
  $document = str_replace("%%ALMT%%", $ALMT, $document);
  $document = str_replace("%%AGAMA%%", $AGAMA, $document);
  $document = str_replace("%%PEKERJAAN%%", $PEKERJAAN, $document);
  $document = str_replace("%%KET%%", $KET, $document);
  $document = str_replace("%%TGLBUAT%%", $TGLBUAT, $document);
  $document = str_replace("%%JENISRAME%%", $JENISRAME, $document);
  $document = str_replace("%%WAKTURAME%%", $WAKTURAME, $document);
  $document = str_replace("%%MAKSUDRAME%%", $MAKSUDRAME, $document);
  $document = str_replace("%%AN%%", $AN, $document);
  $document = str_replace("%%KADES%%", $KADES, $document);
  header("Content-disposition: inline; filename=".$namafile);
  
  }
  elseif ($_POST[surat]=='10'){
  if($STATUSNYALAH==3){
  // SKKK
  $TGLWAFAT = $_POST['tglwafat'];
  $UMUR = umur2("$TGLLAHIR","$TGLWAFAT");
  $HARIWAFAT = ketahuihari("$_POST[tglwafat]");
  $TGLWAFAT = tgl_mod1($TGLWAFAT);
  $KOTAWAFAT = $_POST['di'];
  $SEBABWAFAT = $_POST['sebabwafat'];
  $ALMT = "$ALMT RT. 0$RT / RW. 0$RW Desa $DESA Kecamatan $KEC Kabupaten $KAB";
  $TGLBUAT = tgl_mod1($TGLBUAT);
  // End SKU
  //simpankedb
    $insertQuery = "INSERT INTO pelayanan(no_pen, tgl, nl, tgl_lhr, jk, agm, kerja, almt, js, ket, uname)
   VALUES('$NOID', '$DBTGLBUAT', '$NAMA', '$DBTGLLAHIR', '$JK', '$AGAMA', '$PEKERJAAN', '$ALMT', '$JSFile', '$KET', '$_SESSION[namauser]')";
  
  
  
  if(mysql_query($insertQuery)){
  //on success run update query
  
  $updateQuery = "UPDATE penduduk SET statusnya = '3' WHERE no_pen= '$NOID'"; 
  mysql_query($updateQuery);
  }
  //End simpandb
  
  
  $document = file_get_contents("template_surat/sk_w.rtf");
  $document = str_replace("%%RULEDESA%%", $RULECAPDESA, $document);
  $document = str_replace("%%RULEKEC%%", $RULECAPKEC, $document);
  $document = str_replace("%%RULEKAB%%", $RULECAPKAB, $document);
  $document = str_replace("%%RULEPROV%%", $RULECAPPROV, $document);
  $document = str_replace("%%RULEALMT%%", $RULEALMT, $document);
  $document = str_replace("%%RULEKODEPOS%%", $RULEKODEPOS, $document);
  $document = str_replace("%%RULEKECA%%", $RULEKEC, $document);
  $document = str_replace("%%RULEKABU%%", $RULEKAB, $document);
  
  $document = str_replace("%%TGLBLN%%", $TGLTHN, $document);
  $document = str_replace("%%NAMA%%", $NAMA, $document);
  $document = str_replace("%%JK%%", $JK, $document);
  $document = str_replace("%%ALMT%%", $ALMT, $document);
  $document = str_replace("%%PEKERJAAN%%", $PEKERJAAN, $document);
  $document = str_replace("%%TGLBUAT%%", $TGLBUAT, $document);
  $document = str_replace("%%UMUR%%", $UMUR, $document);
  $document = str_replace("%%HARIWAFAT%%", $HARIWAFAT, $document);
  $document = str_replace("%%TGLWAFAT%%", $TGLWAFAT, $document);
  $document = str_replace("%%KOTAWAFAT%%", $KOTAWAFAT, $document);
  $document = str_replace("%%SEBABWAFAT%%", $SEBABWAFAT, $document);
  $document = str_replace("%%KADES%%", $KADES, $document);
  header("Content-disposition: inline; filename=".$namafile);
  }
    else {
  $document = file_get_contents("template_surat/sk_error.rtf");
  $document = str_replace("%%KET%%", "Yang bersangkutan belum wafat/masih hidup, tidak diperbolehkan untuk membuat SK Kematian untuk seorang yang masih hidup, Silahkan Kunjungi Halaman Bantuan / Hubungi http://fb.com/AdeArwans Jika Masalah Tidak Dapat Anda Atasi.", $document);
  
  header("Content-disposition: inline; filename=errorSI_PADE.rtf");
  }
  }
  elseif ($_POST[surat]=='11'){
  // SKPD//

  // End SKU
  //simpankedb
  mysql_query("INSERT INTO pelayanan(no_pen, tgl, nl, tgl_lhr, jk, agm, kerja, almt, js, ket, uname)
   VALUES('$NOID', '$DBTGLBUAT', '$NAMA', '$DBTGLLAHIR', '$JK', '$AGAMA', '$PEKERJAAN', '$ALMT RT. 0$RT / RW. 0$RW', '$JSFile', '$KET', '$_SESSION[namauser]')");
  //End simpandb
  $document = 
  include "template_surat/sk_pd.php";  

  
  header("Content-disposition: inline; filename=".$namafile);
  
  }
  elseif ($_POST[surat]=='12'){ 
  
  // End KTP
  //simpankedb
  mysql_query("INSERT INTO pelayanan(no_pen, tgl, nl, tgl_lhr, jk, agm, kerja, almt, js, ket, uname)
   VALUES('$NOID', '$DBTGLBUAT', '$NAMA', '$DBTGLLAHIR', '$JK', '$AGAMA', '$PEKERJAAN', '$ALMT RT. $RTSAVE / RW. $RWSAVE', '$JSFile', '$KET', '$_SESSION[namauser]')");
  //End simpandb
  $document = 
  include "template_surat/sk_tp.php"; 
    
  header("Content-disposition: inline; filename=".$namafile);
  
  }
  elseif ($_POST[surat]=='13'){
  // NUMPANG AKAD
  $TGLBUAT = tgl_mod1($TGLBUAT);
  
  $ALMTLENGKAP = "$ALMT RT. 0$RT / RW. 0$RW Desa $DESA Kecamatan $KEC Kabupaten $KAB";
  $ALMT = "RT. 0$RT / RW. 0$RW Desa $DESA Kecamatan $KEC Kabupaten $KAB";
  $TTL =$KOTALAHIR.', '.$TGLLAHIR;
  
  
  $NAMACLN = $_POST['namacln'];
  $NAMACLN = ubah_huruf_ke_besar($NAMACLN);
  $TTLCLN = $_POST['ttl1cln'].', '.$_POST['ttl2cln'];
  $arsip_agamaCLN = mysql_query("select * from arsip_agama WHERE id_agama='$_POST[agmcln]'");
  $agamaCLN=mysql_fetch_array($arsip_agamaCLN);
  $AGAMACLN = $agamaCLN['agama'];
  $KTPCLN = $_POST['noidcln'];
  $arsip_pekerjaanCLN = mysql_query("select * from arsip_pekerjaan where id_pekerjaan='$_POST[kerjacln]' ");
  $pekerjaanCLN=mysql_fetch_array($arsip_pekerjaanCLN);
  $KERJACLN = $pekerjaanCLN['pekerjaan'];
  $ALMTCLN = $_POST['almtcln'];
  $RTCLN = $_POST['rtcln'];
  $RWCLN = $_POST['rwcln'];
  $DESACLN = $_POST['desacln'];
  $KECCLN = $_POST['keccln'];
  $KABCLN = $_POST['kabcln'];
  $ALMTCLN = "RT. 0$RTCLN / RW. 0$RWCLN Desa $DESACLN Kecamatan $KECCLN Kabupaten $KABCLN";
  if ($_POST[wncln]=='1'){ // menentukan kewarganegaraan (1=WNI)
  $WNCLN = "WNI";
  }
  else {
  $WNCLN = "WNA";
  }

		if ($_POST[jk]=='1'){ // menentukan jenis kelamin (1=laki-laki)
    $NAMA1 = $NAMA;
    $TTL1 = $TTL;
    $WN1 = $WN;
    $AGAMA1 = $AGAMA;
    $KERJA1 = $PEKERJAAN;
    $ALMT1 = $ALMT;
    
    $NAMA2 = $NAMACLN;
    $TTL2 = $TTLCLN;
    $WN2 = $WNCLN;
    $AGAMA2 = $AGAMACLN;
    $KERJA2 = $KERJACLN;
    $ALMT2 = $ALMTCLN;
    
    
		if ($_POST[status]=='1'){ // menentukan jenis kelamin (1=laki-laki)
    $KETPRIA = 'Jejaka';
    $KETWANITA = '-';
    $NAMAISTRISUAMI = '-';
		}
		if ($_POST[status]=='2'){ // menentukan jenis kelamin (1=laki-laki)
	 $KETPRIA = 'Beristri';
    $KETWANITA = '-';
    $NAMAISTRISUAMI = '-';
		}
		if ($_POST[status]=='3' | $_POST[status]=='4' ){ // menentukan jenis kelamin (1=laki-laki)
	 $KETPRIA = 'Duda';
    $KETWANITA = '-';
    $NAMAISTRISUAMI = '-';
		}
		}
		else {
		$NAMA2 = $NAMA;
    $TTL2 = $TTL;
    $WN2 = $WN;
    $AGAMA2 = $AGAMA;
    $KERJA2 = $PEKERJAAN;
    $ALMT2 = $ALMT;

    $NAMA1 = $NAMACLN;
    $TTL1 = $TTLCLN;
    $WN1 = $WNCLN;
    $AGAMA1 = $AGAMACLN;
    $KERJA1 = $KERJACLN;
    $ALMT1 = $ALMTCLN;
    
		if ($_POST[status]=='1'){ // menentukan jenis kelamin (1=laki-laki)
    $KETPRIA = '-';
    $KETWANITA = 'Perawan';
    $NAMAISTRISUAMI = '-';
		}
		if ($_POST[status]=='3'){ // menentukan jenis kelamin (1=laki-laki)
	 $KETPRIA = '-';
    $KETWANITA = 'Janda';
    $NAMAISTRISUAMI = '-';
		}
		if ($_POST[status]=='4'){ // menentukan jenis kelamin (1=laki-laki)
	 $KETPRIA = '-';
    $KETWANITA = 'Janda';
    $NAMAISTRISUAMI = '-';
		}
			}
  
  if ($_POST[wncln]=='1'){ // menentukan kewarganegaraan (1=WNI)
  $WNCLN = "WNI";
  }
  else {
  $WNCLN = "WNA";
  	}
  
  if ($_POST[pupusayah]=='1'){
  
  $NAMAAYAH = $_POST['namaayah'];
  $NAMAAYAH = ubah_huruf_ke_besar($NAMAAYAH). ' (Almarhum)';
  $TTLAYAH = '-';
  $AGAMAAYAH = '-';
  $KTPAYAH = '-';
  $KERJAAYAH =  '-';
  $ALMTAYAH = '-';
  $RTAYAH = '-';
  $RWAYAH =  '-';
  $DESAAYAH = '-';
  $KECAYAH = '-';
  $KABAYAH =  '-';
  $ALMTAYAH = '-';
  $WNCLN = '-';
  }
  else {
  //ayah
  $NAMAAYAH = $_POST['namaayah'];
  $NAMAAYAH = ubah_huruf_ke_besar($NAMAAYAH);
  $TTLAYAH = $_POST['ttl1ayah'].', '.$_POST['ttl2ayah'];
  $arsip_agamaayah = mysql_query("select * from arsip_agama WHERE id_agama='$_POST[agmayah]'");
  $agamaayah=mysql_fetch_array($arsip_agamaayah);
  $AGAMAAYAH = $agamaayah['agama'];
  $KTPAYAH = preg_replace('/\D/', '', $_POST['noidayah']);
  $arsip_pekerjaanayah = mysql_query("select * from arsip_pekerjaan where id_pekerjaan='$_POST[kerjaayah]' ");
  $pekerjaanayah=mysql_fetch_array($arsip_pekerjaanayah);
  $KERJAAYAH = $pekerjaanayah['pekerjaan'];
  $ALMTAYAH = $_POST['almtayah'];
  $RTAYAH = $_POST['rtayah'];
  $RWAYAH = $_POST['rwayah'];
  $DESAAYAH = $_POST['desaayah'];
  $KECAYAH = $_POST['kecayah'];
  $KABAYAH = $_POST['kabayah'];
  $ALMTAYAH = "RT. 0$RTAYAH / RW. 0$RWAYAH Desa $DESAAYAH Kecamatan $KECAYAH Kabupaten $KABAYAH";
  if ($_POST[wnayah]=='1'){ // menentukan kewarganegaraan (1=WNI)
  $WNAYAH = "WNI";
  }
  else {
  $WNAYAH = "WNA";
  	}
  }
  
  if ($_POST[pupusibu]=='1'){
  
  $NAMAIBU = $_POST['namaibu'];
  $NAMAIBU = ubah_huruf_ke_besar($NAMAIBU). ' (Almarhumah)';
  $TTLIBU = '-';
  $AGAMAIBU = '-';
  $KTPIBU = '-';
  $KERJAIBU =  '-';
  $ALMTIBU = '-';
  $RTIBU = '-';
  $RWIBU =  '-';
  $DESAIBU = '-';
  $KECIBU = '-';
  $KABIBU =  '-';
  $ALMTIBU = '-';
  $WNIBU = '-';
  }
  else {
  //ibu
  $NAMAIBU = $_POST['namaibu'];
  $NAMAIBU = ubah_huruf_ke_besar($NAMAIBU);
  $TTLIBU = $_POST['ttl1ibu'].', '.$_POST['ttl2ibu'];
  $arsip_agamaibu = mysql_query("select * from arsip_agama WHERE id_agama='$_POST[agmibu]'");
  $agamaibu=mysql_fetch_array($arsip_agamaibu);
  $AGAMAIBU = $agamaibu['agama'];
  $KTPIBU = preg_replace('/\D/', '', $_POST['noidibu']);
  $arsip_pekerjaanibu = mysql_query("select * from arsip_pekerjaan where id_pekerjaan='$_POST[kerjaibu]' ");
  $pekerjaanibu=mysql_fetch_array($arsip_pekerjaanibu);
  $KERJAIBU = $pekerjaanibu['pekerjaan'];
  $ALMTIBU = $_POST['almtibu'];
  $RTIBU = $_POST['rtibu'];
  $RWIBU = $_POST['rwibu'];
  $DESAIBU = $_POST['desaibu'];
  $KECIBU = $_POST['kecibu'];
  $KABIBU = $_POST['kabibu'];
  $ALMTIBU = "RT. 0$RTIBU / RW. 0$RWIBU Desa $DESAIBU Kecamatan $KECIBU Kabupaten $KABIBU";
  $WNIBU = $_POST['wnibu'];
  if ($_POST[wnibu]=='1'){ // menentukan kewarganegaraan (1=WNI)
  $WNIBU = "WNI";
  }
  else {
  $WNIBU = "WNA";
  	}
  
  }
  
  // End KELAHIRAN
  //simpankedb
  mysql_query("INSERT INTO pelayanan(no_pen, tgl, nl, tgl_lhr, jk, agm, kerja, almt, js, ket, uname)
   VALUES('$NOID', '$DBTGLBUAT', '$NAMA', '$DBTGLLAHIR', '$JK', '$AGAMA', '$PEKERJAAN', '$ALMTLENGKAP', '$JSFile', '$KET', '$_SESSION[namauser]')");
  
  //End simpandb
  
  
  
  
  $document = file_get_contents("template_surat/sk_na.rtf");
  $document = str_replace("%%RULEDESA%%", $RULECAPDESA, $document);
  $document = str_replace("%%RULEDESAB%%", $RULEDESA, $document);
  $document = str_replace("%%RULEKEC%%", $RULECAPKEC, $document);
  $document = str_replace("%%RULEKAB%%", $RULECAPKAB, $document);
  
  $document = str_replace("%%NAMA%%", $NAMA, $document);
  $document = str_replace("%%TTL%%", $TTL, $document);
  $document = str_replace("%%JK%%", $JK, $document);
  $document = str_replace("%%WN%%", $WN, $document);
  $document = str_replace("%%ALMTSHORT%%", $ALMT, $document);
  $document = str_replace("%%AGAMA%%", $AGAMA, $document);
  $document = str_replace("%%PEKERJAAN%%", $PEKERJAAN, $document);
  $document = str_replace("%%STATUS%%", $STATUS, $document);
  
  $document = str_replace("%%KETPRIA%%", $KETPRIA, $document);
  $document = str_replace("%%KETWANITA%%", $KETWANITA, $document);
  $document = str_replace("%%NAMAISTRISUAMI%%", $NAMAISTRISUAMI, $document);
  
  $document = str_replace("%%NAMA1%%", $NAMA1, $document);
  $document = str_replace("%%TTL1%%", $TTL1, $document);
  $document = str_replace("%%WN1%%", $WN1, $document);
  $document = str_replace("%%ALMT1%%", $ALMT1, $document);
  $document = str_replace("%%AGAMA1%%", $AGAMA1, $document);
  $document = str_replace("%%KERJA1%%", $KERJA1, $document);
  
  $document = str_replace("%%NAMA2%%", $NAMA2, $document);
  $document = str_replace("%%TTL2%%", $TTL2, $document);
  $document = str_replace("%%WN2%%", $WN2, $document);
  $document = str_replace("%%ALMT2%%", $ALMT2, $document);
  $document = str_replace("%%AGAMA2%%", $AGAMA2, $document);
  $document = str_replace("%%KERJA2%%", $KERJA2, $document);
  
  $document = str_replace("%%NAMACALON%%", $NAMACLN, $document);
  $document = str_replace("%%TTLCALON%%", $TTLCLN, $document);
  $document = str_replace("%%ALMTCALON%%", $ALMTCLN, $document);
  $document = str_replace("%%AGAMACALON%%", $AGAMACLN, $document);
  $document = str_replace("%%KERJACALON%%", $KERJACLN, $document);
  $document = str_replace("%%WNCALON%%", $WNCLN, $document);
  
  $document = str_replace("%%NAMAAYAH%%", $NAMAAYAH, $document);
  $document = str_replace("%%TTLAYAH%%", $TTLAYAH, $document);
  $document = str_replace("%%ALMTAYAH%%", $ALMTAYAH, $document);
  $document = str_replace("%%AGAMAAYAH%%", $AGAMAAYAH, $document);
  $document = str_replace("%%KERJAAYAH%%", $KERJAAYAH, $document);
  $document = str_replace("%%WNAYAH%%", $WNAYAH, $document);
  
  $document = str_replace("%%NAMAIBU%%", $NAMAIBU, $document);
  $document = str_replace("%%TTLIBU%%", $TTLIBU, $document);
  $document = str_replace("%%ALMTIBU%%", $ALMTIBU, $document);
  $document = str_replace("%%AGAMAIBU%%", $AGAMAIBU, $document);
  $document = str_replace("%%KERJAIBU%%", $KERJAIBU, $document);
  $document = str_replace("%%WNIBU%%", $WNIBU, $document);
  
  $document = str_replace("%%TGLBUAT%%", $TGLBUAT, $document);
  $document = str_replace("%%AN%%", $AN, $document);
  $document = str_replace("%%KADES%%", $KADES, $document);
  header("Content-disposition: inline; filename=".$namafile);
  
  }
  elseif ($_POST[surat]=='14'){
  	if ($_POST['status']=='1'){ // Jika Status Belum Kawin
  // DOMISILI
  $ALMT = "$ALMT RT. 0$RT / RW. 0$RW Desa $DESA Kecamatan $KEC Kabupaten $KAB";
  $TTL =$KOTALAHIR.', '.$TGLLAHIR;
  
  $TGLAKHIRDOMISILI = tgl_jw($JWS,$TGLBUAT);  // Menyesuaikan jangka waktu berlaku surat
  $TGLBUAT = tgl_mod1($TGLBUAT);
  // End SKU
  //simpankedb
  mysql_query("INSERT INTO pelayanan(no_pen, tgl, nl, tgl_lhr, jk, agm, kerja, almt, js, ket, uname)
   VALUES('$NOID', '$DBTGLBUAT', '$NAMA', '$DBTGLLAHIR', '$JK', '$AGAMA', '$PEKERJAAN', '$ALMT', '$JSFile', '$KET', '$_SESSION[namauser]')");
  //End simpandb
  
  
  
  
  $document = file_get_contents("template_surat/sk_bm.rtf");
  $document = str_replace("%%RULEDESA%%", $RULECAPDESA, $document);
  $document = str_replace("%%RULEKEC%%", $RULECAPKEC, $document);
  $document = str_replace("%%RULEKAB%%", $RULECAPKAB, $document);
  $document = str_replace("%%RULEPROV%%", $RULECAPPROV, $document);
  $document = str_replace("%%RULEALMT%%", $RULEALMT, $document);
  $document = str_replace("%%RULEKODEPOS%%", $RULEKODEPOS, $document);
  $document = str_replace("%%RULEKECA%%", $RULEKEC, $document);
  $document = str_replace("%%RULEKABU%%", $RULEKAB, $document);
  $document = str_replace("%%REDAKSI%%", $redaksi_desa, $document);
  
  $document = str_replace("%%TGLTHN%%", $TGLTHN, $document);
  $document = str_replace("%%NAMA%%", $NAMA, $document);
  $document = str_replace("%%NAMAYBS%%", $NAMA, $document);
  $document = str_replace("%%TTL%%", $TTL, $document);
  $document = str_replace("%%JK%%", $JK, $document);
  $document = str_replace("%%WN%%", $WN, $document);
  $document = str_replace("%%NOID%%", $NOID, $document);
  $document = str_replace("%%ALMT%%", $ALMT, $document);
  $document = str_replace("%%AGAMA%%", $AGAMA, $document);
  $document = str_replace("%%PEKERJAAN%%", $PEKERJAAN, $document);
  $document = str_replace("%%KET%%", $KET, $document);
  $document = str_replace("%%TGLBUAT%%", $TGLBUAT, $document);
  $document = str_replace("%%TGLAKHIR%%", $TGLAKHIRDOMISILI, $document);
  $document = str_replace("%%AN%%", $AN, $document);
  $document = str_replace("%%KADES%%", $KADES, $document);
  header("Content-disposition: inline; filename=".$namafile);
  }
  }
  elseif ($_POST[surat]=='16'){
  $TELP = $_POST['telp'];
  $ALMT = "$ALMT RT. 0$RT / RW. 0$RW";
  $TTL =$KOTALAHIR.', '.$TGLLAHIR;
  
  $TGLAKHIRDOMISILI = tgl_jw($JWS,$TGLBUAT);  // Menyesuaikan jangka waktu berlaku surat
  $TGLBUAT = tgl_mod1($TGLBUAT);
  // End SKU
  //simpankedb
  mysql_query("INSERT INTO pelayanan(no_pen, tgl, nl, tgl_lhr, jk, agm, kerja, almt, js, ket, uname)
   VALUES('$NOID', '$DBTGLBUAT', '$NAMA', '$DBTGLLAHIR', '$JK', '$AGAMA', '$PEKERJAAN', '$ALMT', '$JSFile', '$KET', '$_SESSION[namauser]')");
  //End simpandb
  
  
  
  $document = file_get_contents("template_surat/sk_mohonektp.rtf");
  $document = str_replace("%%DESA%%", $RULEDESA, $document);
  $document = str_replace("%%KEC%%", $RULEKEC, $document);
  $document = str_replace("%%RULEKAB%%", $RULECAPKAB, $document);
  
  
  $document = str_replace("%%NAMA%%", $NAMA, $document);
  $document = str_replace("%%NAMAYBS%%", $NAMA, $document);
  $document = str_replace("%%TTL%%", $TTL, $document);
  $document = str_replace("%%JK%%", $JK, $document);
  $document = str_replace("%%NOID%%", $NOID, $document);
  $document = str_replace("%%GOLDAR%%", $GOLDAR, $document);
  $document = str_replace("%%STATUSKAWIN%%", $STATUS, $document);
  $document = str_replace("%%ALMT%%", $ALMT, $document);
  $document = str_replace("%%AGAMA%%", $AGAMA, $document);
  $document = str_replace("%%PEKERJAAN%%", $PEKERJAAN, $document);
  $document = str_replace("%%TELP%%", $TELP, $document);
  $document = str_replace("%%TGLBUAT%%", $TGLBUAT, $document);
  $document = str_replace("%%AN%%", $AN, $document);
  $document = str_replace("%%KADES%%", $KADES, $document);
  header("Content-disposition: inline; filename=".$namafile);


  }
  
  else {
  $document = file_get_contents("template_surat/sk_error.rtf");
  $document = str_replace("%%KET%%", "Tampaknya Anda Membuat Kesalahan, Pastikan Jenis Surat Sudah Di Pilih, Silahkan Kunjungi Halaman Bantuan / Hubungi http://fb.com/AdeArwans Jika Masalah Tidak Dapat Anda Atasi.", $document);
  
  header("Content-disposition: inline; filename=errorSI_PADE.rtf");
}
header("Content-type: application/msword");
header("Content-length: " . strlen($document));
echo $document;

				$fp = fopen($cachefile, 'w');
				fwrite($fp, ob_get_contents());
				fclose($fp);
				ob_end_flush(); 
?>
 
  <?php
}
}
?>