<?php
include "../fungsi/fungsi_anti_injection.php";
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){

echo "<tr><td colspan='5'><br/><div class='alert alert-danger'><p align='center'>[<span class='glyphicon glyphicon-remove'></span>]  Tidak ditemukan satupun data, Silahkan periksa kembali...</p></div></td></tr>"; }

else{

include "../fungsi/koneksi.php";
$nokk =$_POST['nokk'];
$noid =$_POST['noid'];
$no=1;
  $anggota  = mysql_query("SELECT * FROM penduduk, arsip_status_hdk 
									WHERE penduduk.status_hdk_pen=arsip_status_hdk.id_status_hdk
									AND no_kk_pen='$nokk'");
  
  $ketemu = mysql_num_rows($anggota);  
  if ($ketemu!=''){  
 while($a=mysql_fetch_array($anggota)){
	echo " <tr>
        <td class='nomor'>$no</td>
        <td><input name='anggkk[]' type='checkbox' value='$a[no_pen]'"; if ($a['no_pen']==$noid){echo " class='anggkk_cur btn disabled btn-default' checked=''";} else { echo " class='anggkk btn btn-default' "; } echo "/></td>
        <td>$a[no_pen]</td>
        <td>$a[nama_pen]</td>
        <td width='8%' class='nomor'><span style='cursor:help;' data-placement='left' data-toggle='tooltip' title='$a[status_hdk]'>$a[status_hdk_pen]</span></td>
        </tr>
      <tr>";
	  
	  
	  $no++;
	}
	  }

else { echo "<tr><td colspan='5'><br/><div class='alert alert-danger'><p align='center'>[<span class='glyphicon glyphicon-remove'></span>]  Tidak ditemukan satupun data dengan nomor KK $nokk, Silahkan periksa kembali...</p></div></td></tr>"; }

}

?>
    <script type="text/javascript">
	$(".anggkk").change(function(){ 
        if($(".anggkk").length == $(".anggkk:checked").length) {
		
		    document.getElementById('skpdnokktp').selectedIndex = "3"; 
        }
		
		else {
		
		    document.getElementById('skpdnokktp').selectedIndex = "4";
        }
		});
		</script>
		<script type="text/javascript">
       $(".anggkk").change(function (){
        if($(".anggkk:checked").length > 5) {
		$(".anggkk").addClass("disabled");
		$(".anggkk:checked").removeClass("disabled");
        } 
		if($(".anggkk:checked").length < 6) {
		$(".anggkk").removeClass("disabled");
		}
		});
		
	</script>