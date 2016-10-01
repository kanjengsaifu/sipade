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
<!DOCTYPE html>
<html>
    <meta charset="utf-8" lang="en" class="no-js">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
    <title>SI PA'DE | RakIT Solutions</title>
		<meta name="description" content="Pemuat Laman SI PA'DE" /> 
		<meta name="author" content="Adeas" />
<link rel="shortcut icon" href="images/favicon.gif" />
		<link rel="stylesheet" type="text/css" href="rakstrap/css/loader_css/default.css" />
		<link rel="stylesheet" type="text/css" href="rakstrap/css/loader_css/component.css" />
  <link href="rakstrap/css/loader_css/loadingindicatorcover.css" rel="stylesheet" /> 
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet"> 
 
  </head>
	<body style="margin:0; overflow:hidden;">
	
<div class="container">
			<header class="clearfix"> 
			
			</header><?php 
include "fungsi/koneksi.php";
include "inc/pengaturan.php";
?>
			<ul class="cbp-vimenu">
				<li><a href="!auth" title="Halaman Depan" class="icon-logo">Sipade</a></li>
				<li><a href="beranda"  title="Beranda Data" class="glyphicon-home" target="sipadeframe"><span>Beranda</span></a></li>
				<li><a href="ts@<?php echo $RULEKODEPKK; ?>"  title="Mesin Pembuat Surat"class="glyphicon-print" target="sipadeframe">Pelayanan</a></li>
				<li><a href="tkk" title="Penambahan Data" class="glyphicon-briefcase" target="sipadeframe">Tambah Data</a></li>
				<!-- Example for active item:
				<li class="cbp-vicurrent"><a href="#" class="icon-pencil">Pencil</a></li>
				-->
				<li><a href="arsip?submit=Saring"  title="Mesin Pencatat" class="glyphicon-book" target="sipadeframe">Pencatatan</a></li>
				<li><a href="statistik" title="Statistik Data" class="glyphicon-stats" target="sipadeframe">Statistik</a></li>
				<li><a href="javascript::" title="Alat Tambahan" class="glyphicon-wrench"  onclick="return champtoggle();" id="champtoggle">Perkakas</a></li>
				<li><a href="pengaturan" title="Pengaturan Sistem" class="glyphicon-cog" target="sipadeframe">Pengaturan</a></li>
				
				<li><a title="Fullscreen Mode" class="glyphicon-fullscreen"  onclick="toggleFullScreen()">Fullscreen</a></li>
				<li class="logout"><a href="inc/logout.php" title="Pintu Keluar" class="glyphicon-off">Keluar</a></li>
			</ul>
			<ul class="cbp-vimenu-sub">  <ul>
<li class="toggleli" id="pu" data-rel="pu"><a><span class="glyphicon glyphicon-indent-left"></span> Penghitung Usia</a></li>
<div style="display: none;" class="showli clearfix pu"> 
<hr/>
<form id="formusia">
<input name="tgl" id="tgllahir" maxlength="10" data-type="date" placeholder="dd-mm-yyyy" class="input datepickerpu" style="width:155px;" type="text"> 
<p class="clearfix" style="font-size:10px; line-height:12px; margin:10px 0 5px 0; font-family:Arial, Helvetica, sans-serif;" align="center">sampai</p>
<input name="tgl" id="tglakhir" maxlength="10" data-type="date" placeholder="dd-mm-yyyy" class="input datepickerpu2" value="<?php echo date(d.'-'.m.'-'.Y); ?>" style="width:155px;" type="text"><div class="disabled" title="Dubble Click"></div><div class="clearfix"></div><hr/>
 
<button class="btn btn-default btn-xs" type="button" id="btnformusia">
  <span class="glyphicon glyphicon-edit"></span> Hitung Usia
</button> 
</form>
<div class="output" id="outputusia">Menunggu...</div><br>
</div>

<li class="toggleli" id="ph" data-rel="ph"><a><span class="glyphicon glyphicon-indent-left"></span> Penebak Hari</a></li>
<div style="display: none;" class="showli clearfix ph">
<hr/>
<input name="tglhari" id="tglhari" maxlength="10" placeholder="dd-mm-yyyy" data-type="date" class="input datepickerph" data-validation="alphanumeric" data-validation-allowing="-" data-validation-error-msg="&nbsp;?&nbsp;&nbsp; :  Tanggal Harus di isi !" data-validation-format="dd-mm-yyyy" data-date-format="dd-mm-yyyy" data-date="" type="text" style="width:155px;"><br/><hr/> <button class="btn btn-default btn-xs" type="button" id="btnformhari">
  <span class="glyphicon glyphicon-edit"></span> Cek Hari
</button>  
<div class="output" id="outputhari">Menunggu...</div><br>
</div>

<li class="toggleli" id="nik" data-rel="nik"><a><span class="glyphicon glyphicon-indent-left"></span> Pembuat NIK</a></li>
<div style="display: none;" class="showli clearfix nik">
<hr/>
<input name="niktgl" id="niktgl" maxlength="10" placeholder="dd-mm-yyyy" data-type="date" class="input datepickernik" style="width:155px;" data-validation="alphanumeric" data-validation-allowing="-" data-validation-error-msg="&nbsp;?&nbsp;&nbsp; :  Tanggal Harus di isi !" data-validation-format="dd-mm-yyyy" type="text"><br>

<select name="nikjk" id="nikjk" class="input" style="width:155px;">
<option value="1"> Laki-laki</option>
<option value="2"> Perempuan</option>
</select><br/><br/> 
<hr/>  
<button class="btn btn-default btn-xs" type="button" id="btnformnik">
   &nbsp;<span class="glyphicon glyphicon-edit"></span> Proses NIK &nbsp;
</button> 
<div class="output" id="outputnik">Menunggu...</div><br>
</div>

<li class="toggleli" id="pecahnik" data-rel="pecahnik"><a><span class="glyphicon glyphicon-indent-left"></span> Pemecah NIK</a></li>
<div style="display: none;" class="showli clearfix pecahnik">
<hr/>
<input name="pecahnikid" id="pecahnikid" placeholder="<?php echo $RULEKODEPKK; ?>..." maxlength="18" class="input" style="width:155px;" data-validation="numeric"  data-validation-error-msg="&nbsp;?&nbsp;&nbsp; :  Tanggal Harus di isi !" type="text"><br>

<select name="pecahnikjk" id="pecahnikjk" class="input" style="width:155px;">
<option value="1"> Laki-laki</option>
<option value="2"> Perempuan</option>
</select><br/><br/> <hr/>  
<button class="btn btn-default btn-xs" type="button" id="btnformpecahnik">
   &nbsp;<span class="glyphicon glyphicon-edit"></span> Proses NIK &nbsp;
</button> 
<div class="output" id="outputpecahnik">Menunggu...</div><br>
</div>

<li class="toggleli" id="bukakk" data-rel="bukakk"><a><span class="glyphicon glyphicon-indent-left"></span> Peluncur KK</a></li>
<div style="display: none;" class="showli clearfix bukakk">
<hr/>
<input name="bukakkid" id="bukakkid" placeholder="<?php echo $RULEKODEPKK; ?>..." maxlength="18" class="input" style="width:155px;" data-validation="numeric"  data-validation-error-msg="&nbsp;?&nbsp;&nbsp; :  Tanggal Harus di isi !" type="text"><br>
  <hr/>  
<button class="btn btn-default btn-xs" type="button" id="btnformbukakk">
   &nbsp;<span class="glyphicon glyphicon-edit"></span> Buka KK &nbsp;
</button>  
</div>
</ul>
			</ul>

<style>
:-webkit-full-screen {
  background: pink;
}

:-moz-full-screen {
  background: pink;
}

:-ms-fullscreen {
  background: pink;
}

:full-screen { /*pre-spec */
  background: pink;
}

:fullscreen { /* spec */
  background: pink;
}
</style>
<script>function toggleFullScreen() {
  if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if (document.documentElement.requestFullScreen) {  
      document.documentElement.requestFullScreen();  
    } else if (document.documentElement.mozRequestFullScreen) {  
      document.documentElement.mozRequestFullScreen();  
    } else if (document.documentElement.webkitRequestFullScreen) {  
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
    }  
  } else {  
    if (document.cancelFullScreen) {  
      document.cancelFullScreen();  
    } else if (document.mozCancelFullScreen) {  
      document.mozCancelFullScreen();  
    } else if (document.webkitCancelFullScreen) {  
      document.webkitCancelFullScreen();  
    }  
  }  
}
// Add different events for fullscreen
</script>
<iframe src="<?php if(!isset($_GET['page']) | $_GET['page']=="") {echo "beranda";} else {echo $_GET['page'];}?>" name="sipadeframe"></iframe>				
			 
		</div>
	</body>
    
    
	<script src="rakstrap/jquery.min.js" type="text/javascript"> </script>
	
	<script type="text/javascript">
	  
$('[data-type=date]').keyup(function(e){
    this.value = this.value.replace(/[^0-9\-]/g, '');	 
            if (e.keyCode != 193 && e.keyCode != 111) {
                console.log(e.keyCode);
                if (e.keyCode != 8) {
                    if ($(this).val().length == 2) {
                        $(this).val($(this).val() + "-");
                    } else if ($(this).val().length == 5) {
                        $(this).val($(this).val() + "-");
                    }
                } else {
                    var temp = $(this).val();
                    if ($(this).val().length == 5) {
                        $(this).val(temp.substring(0, 4));
                    } else if ($(this).val().length == 2) {
                        $(this).val(temp.substring(0, 1));
                    }
                }
            } else {
                var temp = $(this).val();
                var tam = $(this).val().length;
                $(this).val(temp.substring(0, tam-1));
            }
    });
	</script>
	<script src="rakstrap/js/pace.min.js"></script>
	<script type="text/javascript">
$(document).ready(function(){ 

$("#tglakhir").attr("disabled",true);
$(".disabled").dblclick(function(){  
$(this).hide();
$("#tglakhir").attr("disabled",false);
$("#tglakhir").focus();
});
$("#tglakhir").dblclick(function(){   
$(".disabled").show(); 
$("#tglakhir").attr("disabled",true);

});
$("#btnformusia").click(function(){
	 $("#outputusia").html("<img src='images/loading.gif' style='width:20px; height:20px;'/>");
var tgllahir = $("#tgllahir").val();
var tglakhir = $("#tglakhir").val();
	$.ajax({
	type:"POST",
	url:"inc/inc_usia.php?act=usia",
	data: "tgllahir="+tgllahir+"&tglakhir="+tglakhir,
		success: function(data){ 
	 $("#outputusia").html(data); 
		}
	});
});

$("#btnformhari").click(function(){
	 $("#outputhari").html("<img src='images/loading.gif' style='width:20px; height:20px;'/>");
var tgl = $("#tglhari").val();
	$.ajax({
	type:"POST",
	url:"inc/inc_usia.php?act=hari",
	data: "tgl="+tgl,
		success: function(data){ 
	 $("#outputhari").html(data); 
		}
	});
}); 

$("#btnformnik").click(function(){
	 $("#outputnik").html("<img src='images/loading.gif' style='width:20px; height:20px;'/>");
var tgl = $("#niktgl").val();
var jk = $("#nikjk").val();
	$.ajax({
	type:"POST",
	url:"inc/inc_usia.php?act=nik",
	data: "tgl="+tgl+"&jk="+jk,
		success: function(data){ 
	 $("#outputnik").html(data); 
		}
	});
});

$("#btnformpecahnik").click(function(){
	 $("#outputpecahnik").html("<img src='images/loading.gif' style='width:20px; height:20px;'/>");
var id = $("#pecahnikid").val();
var jk = $("#pecahnikjk").val();
	$.ajax({
	type:"POST",
	url:"inc/inc_usia.php?act=pecahnik",
	data: "id="+id+"&jk="+jk,
		success: function(data){ 
	 $("#outputpecahnik").html(data); 
		}
	});
}); 
});
</script>
<script type="text/javascript">
/*$(document).ready(function(){
$('.showli').hide();
$('.toggleli').click(function() {  
$('.showli').slideUp('slow');
$('.showli').removeClass('active'); 
$('.toggleli').removeClass('active');
$('#' + $(this).data('rel')).addClass('active');
$('.' + $(this).data('rel')).slideDown().addClass('active'); 
});
}); 
*/
/*jQuery time*/
$(document).ready(function(){
	$(".toggleli").click(function(){
		//slide up all the link lists
		$(".showli").slideUp();
		//slide down the link list below the h3 clicked - only if its closed
		if(!$(this).next().is(":visible"))
		{
			$(this).next().slideDown();
		}
	})
})
	function champtoggle () {   
$(".cbp-vimenu-sub").slideToggle('slow').toggleClass('cbp-vimenu-sub-show');
$("#champtoggle").toggleClass('active');
    } 
	
</script>

    <script type="text/javascript">	
$(document).ready(function(){ 	 

 $("#btnformbukakk").click(function(){

       var $val = $("#bukakkid").val();
	   var $str = "!"+$val;
	   var $url = $str.replace(/\s+/g, '+');
	  location.href=$url;

    });  
    });
		  
		  </script>
		  
  <?php 
  } 
  }
?>