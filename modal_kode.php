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
  header('location:modal_login.php?refname=kode');
}
else{
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "Anda harus masuk terlebih dahulu !";
}
else{
?>
<?php
include "fungsi/koneksi.php"; 
	 
?>  
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">TIPS SIPA'DE | NOMOR / KODE ISIAN</h4>
      </div>
      <div class="modal-body">
	  <div class="alert alert-info"><b>Perhatikan :</b> Daftar Nomor / Kode dibawah ini sesuai dengan panduan yang tercantum pada bagian belakang <u>Formulir Kartu Keluarga</u> atau [<code>F-101</code>].</div>
	  <table>
	  <tr>
	  <td style="width:50%;"></td><td style="width:50%;"></td>
	  </tr>
	  <tr>
	  <td></td><td></td>
	  </tr>
	  <tbody>
	  <tr>
	  <td>
	  <hr/>
	  <b>LEMBAGA PEMERINTAHAN</b>
	  <hr/>
	  <ul>
	  <?php 
$pengaturan=mysql_query("SELECT * FROM pengaturan where id='2'");
	$pe=mysql_fetch_array($pengaturan);
	echo "<li>Kode Desa $pe[desa] : $pe[kodedesa]</li>";
	echo "<li>Kode Prov+Kab+Kec : $pe[kodekab]</li>";
	
	?>
	</ul>
	  <hr/>
	  <b>PENDIDIKAN</b>
	  <hr/>
	  <ol>
	  <?php 
$pendidikan=mysql_query("SELECT * FROM arsip_pendidikan");
	while($p=mysql_fetch_array($pendidikan)){
	echo "<li>$p[pendidikan]</li>";
	}
	?>
	</ol>
	<hr/>
	<b>STATUS PERNIKAHAN</b>
	<hr/>
	<ol>
	  <?php 
$status=mysql_query("SELECT * FROM arsip_status");
	while($p=mysql_fetch_array($status)){
	echo "<li>$p[status]</li>";
	}
	?>
	</ol>
	<hr/>
	<b>STATUS HDK</b>
	<hr/>
	<ol>
	  <?php 
$statushdk=mysql_query("SELECT * FROM arsip_status_hdk");
	while($p=mysql_fetch_array($statushdk)){
	echo "<li>$p[status_hdk]</li>";
	}
	?>
	</ol>
	<hr/>
	<b>AGAMA</b>
	<hr/>
	<ol>
	  <?php 
$agama=mysql_query("SELECT * FROM arsip_agama");
	while($p=mysql_fetch_array($agama)){
	echo "<li>$p[agama]</li>";
	}
	?>
	</ol>
	<hr/>
	<b>GOLONGAN DARAH</b>
	<hr/>
	<ol>
	  <?php 
$goldar=mysql_query("SELECT * FROM arsip_goldar");
	while($p=mysql_fetch_array($goldar)){
	echo "<li>$p[goldar]</li>";
	}
	?>
	</ol>
	<hr/>
	<b>JENIS KELAMIN</b>
	<hr/>
	<ol>
	  <?php 
$kelamin=mysql_query("SELECT * FROM arsip_kelamin");
	while($p=mysql_fetch_array($kelamin)){
	echo "<li>$p[kelamin]</li>";
	}
	?>
	</ol>
	<hr/>
	<b>KEWARGANEGARAAN</b>
	<hr/>
	<ol>
	  <?php 
$kewarganegaraan=mysql_query("SELECT * FROM arsip_kewarganegaraan");
	while($p=mysql_fetch_array($kewarganegaraan)){
	echo "<li>$p[kewarganegaraan]</li>";
	}
	?>
	</ol></td>
	  <td><hr/><b>PEKERJAAN</b><hr/>
	  <ol>
	  <?php 
$pekerjaan=mysql_query("SELECT * FROM arsip_pekerjaan");
	while($p=mysql_fetch_array($pekerjaan)){
	echo "<li>$p[pekerjaan]</li>";
	}
	?>
	</ol>
	  </td>
	  </tr>
	  </tbody>
	  </table>
	  </div>
 <div class="modal-footer"> 
  
        <button type="button" class="btn btn-default" style="float:right;" data-dismiss="modal">Tutup</button>

       </div>

<?php 
} 
}
?>