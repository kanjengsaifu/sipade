<?php
include "../fungsi/fungsi_anti_injection.php";
session_start();
error_reporting(0);
include "../inc/timeout.php";

if($_SESSION[login]==1){
if(!cek_login()){
$_SESSION[login] = 0;
}
}
if($_SESSION[login]==0){
  header('location:../inc/logout.php');
}
else{
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "Anda harus masuk terlebih dahulu !";
}
else{
?>
<?php 
include "../fungsi/koneksi.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>SI PA'DE | Sistem Informasi Pelayanan Desa</title>
	<link rel="shortcut icon" href="../images/favicon.gif">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">  
	<link type="text/css" href="../rakstrap/css/style.css" rel="stylesheet">    
  <link href="../rakstrap/css/loadingindicator.css" rel="stylesheet">
  
<link type="text/css" rel="stylesheet" href="../rakstrap/css/jquery-te-1.4.0.css">
</head>

<body class="pace-done">

 <?php if($_GET[mod]=="post"){
 ?>
 
<div class="container clearfix" style="width:620px">
<h1 class="pull-left">SIPA'DE |  &nbsp;</h1> <h3 class="pull-left"> Dokumentasi <span class="label label-success">RW2</span></h3>

<div class="clearfix"></div>
<hr/>
<div class="clearfix">
				<h3>Membuat Dokumen Baru</h3>
				<hr/>
<div class="clearfix"></div>

			<div class="content-detail">
				<?php 
				if($_GET[act]=="edit"){
					$action = "e_post.php"; //ex : help_viewer.php?mod=post&act=edit&id=1
					
		$edt= mysql_query("select * from post where id='$_GET[id]'");
	$e=mysql_fetch_array($edt);
					}
					else {
					$action = "t_post.php"; }
				?>
				<form id="formpost" action="<?php echo $action;?>" method="POST">
				<div class="input-group">
  <span class="input-group-addon no-shadow"><b>Judul</b></span>
  <input type="hidden" value="<?php echo $e[id]; ?>" name="id">
  <input class="form-control" name="jdl" id="jdl" required="" type="text" value="<?php echo "$e[judul]"; ?>">
  </div><hr/>
				<div class="input-group pull-left" style="width:250px;">
  <span class="input-group-addon no-shadow">Kategori</span>
  <select class="form-control" name="kat" id="kat" required="">
  <option disabled></option>
  <?php 
  $tampil=mysql_query("SELECT * FROM kategori WHERE sub='0'");

          while($w=mysql_fetch_array($tampil)){		  
	echo "<option value=$w[id]>[ $w[kategori] ]</option>";
	
		$kata = mysql_query("select * from kategori where sub='$w[id]'");
	while($ka=mysql_fetch_array($kata)){
            if ($e[kategori]==$ka[id]){
              echo "<option value=$ka[id] selected>$ka[kategori]</option>";
            }
            else{
              echo "<option value=$ka[id]>$ka[kategori]</option>";
            }
			}
			
          }
		  
		  
	?></select>
  </div>
				<div class="input-group pull-right" style="width:250px;">
  <span class="input-group-addon no-shadow">Publis</span>
  <div class="form-control">
  <?php 
   
    if ($e[publis]=='Y'){
      echo "<input type=radio name='publis' id='publis' value='Y' checked> Ya  
                                        <input type=radio name='publis' value='N'> Tidak";
    }
    else{
      echo "<input type=radio name='publis' id='publis'  value='Y'> Ya  
                                        <input type=radio name='publis' value='N' checked> Tidak";
    }
	?></div>
  </div>
 
<div class="clearfix"></div><hr/>
<textarea id="input" name="input"><?php if($_GET[act]==edit){ echo "$e[konten]"; } else { echo "<p>...</p>"; }?></textarea>
<hr/>
<button class="btn btn-sm btn-default" id="formpostbtn" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
</form>

			</div>

        </div>
 </div>
 
 <?php } 
elseif($_GET[mod]=="read"){
 ?>
 
<div class="container clearfix" style="width:620px">
<h1 class="pull-left">SIPA'DE |  &nbsp;</h1> <h3 class="pull-left"> Dokumentasi <span class="label label-success">RW2</span></h3>

<div class="clearfix"></div>
<hr/>
<?php

		$katff = mysql_query("select * from post, kategori where post.kategori=kategori.id AND post.id='$_GET[id]'");
	$kf=mysql_fetch_array($katff);
	?>
<div class="clearfix">
<div class="breadcumb clearfix"> <a href="../doc">Depan</a> &raquo; <?php echo "$kf[kategori]"; ?></div>
<hr/>
<div class="clearfix"></div>

			<div class="content-detail">
				
 <?php 
	echo "<b>$kf[kategori]</b><h2>$kf[judul]</h2><br/>";
	echo "$kf[konten]";
	?>
				
				<hr style="margin-top: 30px;">
 
			</div>

        </div>
 </div>
 
 <?php
 }

else{
 ?>
 
<div class="container clearfix" style="width:620px">
<h1 class="pull-left">SIPA'DE |  &nbsp;</h1> <h3 class="pull-left"> Dokumentasi <span class="label label-success">RW2</span></h3>

<div class="clearfix"></div>
<hr/>
<div class="clearfix">
<div class="breadcumb clearfix"> <a href="../doc">Depan</a> &raquo; introduction</div>
<hr/>
<div class="clearfix"></div>

			<div class="content-detail"><?php if($_GET[type]==1){ 
		$katff = mysql_query("select * from post  order by id");
	
	while($kf=mysql_fetch_array($katff)){
	echo "<b><a href=\"read!$kf[id]\">$kf[judul]</a></b><br/>";
	}

	} else { ?>
			<div class="sidebar">	
 <?php 
		$katlist = mysql_query("select * from kategori where sub='0'");
		echo "<ul>";
	while($a=mysql_fetch_array($katlist)){ 
	echo "<li class='section'><h2>$a[kategori]</h2></li>";
	
		$katf = mysql_query("select * from post where kategori='$a[id]'");
	
	while($k=mysql_fetch_array($katf)){
	echo "<li><a href=\"help_viewer.php?mod=read&id=$k[id]\">$k[judul]</a></li>";
	}
	
		$katsub = mysql_query("select * from kategori where sub='$a[id]'");
		
	while($b=mysql_fetch_array($katsub)){
	
	echo "<b>$b[kategori]</b>";
	
		$katff = mysql_query("select * from post where kategori='$b[id]'");
	
	while($kf=mysql_fetch_array($katff)){
	echo "<li><a href=\"read!$kf[id]\">$kf[judul]</a></li>";
	}
	echo "<br/>";
	} 
	
	}
	echo "</ul>";
	
	
	?>
	</div>
	<?php } ?>
				
				<hr style="margin-top: 30px;">
 
			</div>

        </div>
 </div>
 
 <?php } ?>

<div class="footer clearfix"><div style="float:left; width:300px; text-align:left;">SI PA'DE v.2.0 &nbsp;&nbsp;&nbsp;&nbsp; | Use updated Internet browser for best performer</div><div style="float:right; width:300px; text-align:right;">Developed by Ade A S | RakIT Solutions <br></div></div>
<br/>

<!-- Modal -->
<?php include "../inc/ui_modal.php"; ?>
	
	
<script src="../rakstrap/jquery-1.10.2.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script> 
<script src="../rakstrap/js/pace.min.js"></script>

 
<script type="text/javascript" src="../rakstrap/js/jquery-te-1.4.0.min.js" charset="utf-8"></script>


<script>
	$('#input').jqte();
	
</script>


<script type="text/javascript">  
//menampilkan modal
$('#myModal').on('show.bs.modal', function (e) {
   $(".modal-content").html("<div class=\"modal-header\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button><h4 class=\"modal-title\" id=\"myModalLabel\">INFORMASI</h4></div><div class=\"modal-body\"><div class=\"progress progress-striped active\"><div class=\"progress-bar\"  role=\"progressbar\" aria-valuenow=\"45\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 100%\"><span class=\"sr-only\">Memuat</span></div></div></div>");
})
	  
$('#myModal').on('hidden.bs.modal', function (e) {
   $(this).removeData('bs.modal');
})
</script>

 <script type="text/javascript">
	function refresh (timeoutPeriod){ 
		refresh = setTimeout(function(){window.location.reload(true);},timeoutPeriod); 
	} 
	function refreshto (timeoutPeriod,to){ 
		refresh = setTimeout(function(){location.href="" + to + "";},timeoutPeriod); 
	} 
	function modalreload (eleshow,alert,text) {
	if (alert=="success") { $(eleshow + " .modal-body .alert-cont").html("<div class='alert alert-success'>" + text + "</div>"); }
	if (alert=="warning") { $(eleshow + " .modal-body .alert-cont").html("<div class='alert alert-warning'>" + text + "</div>"); }
	if (alert=="danger") { $(eleshow + " .modal-body .alert-cont").html("<div class='alert alert-danger'>" + text + "</div>"); }
	if (alert=="info") { $(eleshow + " .modal-body .alert-cont").html("<div class='alert alert-info'>" + text + "</div>"); }
	
	$(eleshow).modal({ backdrop: 'static', keyboard: false })
	}	
	function modalalert (eleshow,alert,text) { 
	if (alert=="success") { $(eleshow + " .modal-body .alert-cont").html("<div class='alert alert-success'>" + text + "</div>"); }
	if (alert=="warning") { $(eleshow + " .modal-body .alert-cont").html("<div class='alert alert-warning'>" + text + "</div>"); }
	if (alert=="danger") { $(eleshow + " .modal-body .alert-cont").html("<div class='alert alert-danger'>" + text + "</div>"); }
	if (alert=="info") { $(eleshow + " .modal-body .alert-cont").html("<div class='alert alert-info'>" + text + "</div>"); }
	
	$(eleshow).modal({ backdrop: 'static', keyboard: false })
	}	
	
	
		
</script>
<script type='text/javascript'> 
$("#formpost").submit(function (ev) {
	var btn = $("#formpostbtn")
    btn.button('loading')
    var actionurl = $("#formpost").attr("action");
    var method = $("#formpost").attr("method");
    var values = $("#formpost").serialize();
        $.ajax({
            type: method,
            url: actionurl,
            data: values,
            success: function (data) {    
            if(data==0){ modalalert('#alert','warning','Masih ada data yang tidak terisi atau kurang tepat, silahkan periksa lagi !'); }	
            else if(data==1){ modalreload('#reload','success','Data Berhasil Disimpan, SI PA\'DE Akan Menyegarkan Halaman Untuk Anda'); refresh(3000) }
			else if(data==2){ modalalert('#alert','danger','Data gagal disimpan, #serverError !');  }		
            else if(data==3){ modalalert('#alert','danger','ID atau mungkin Judul Sudah Digunakan, silahkan periksa lagi ! !'); }			
            else { modalreload('#reload','success','Data Berhasil Disimpan, SI PA\'DE Akan Menyegarkan Halaman Untuk Anda'); refreshto('3000',data) }	
			btn.button('reset')			
            },
        error:function(){
              modalreload('#myModal','#reload','danger','Terjadi Galat Kode #AjaxError, SI PA\'DE Akan Menyegarkan Halaman Dalam 5 dtk'); refresh(5000) 
			btn.button('reset') 
		}
        });		       
		ev.preventDefault(); 	
	
}); 
</script>
</body></html>
  <?php 
} 
}
?>