<?php
include "fungsi/fungsi_anti_injection.php";
session_start();
error_reporting(0);
include "inc/timeout.php";
include "fungsi/koneksi.php";

if($_SESSION[login]==1){ 
	if(!cek_login()){
		$_SESSION[login] = 0;
	} 
$cek_backup=mysql_fetch_array(mysql_query("SELECT auto_backup FROM  pengaturan where id='1' "));
if($cek_backup['auto_backup']=='Y'){
		$TGLFOLDER = date('Y');
		$TGLFOLDER2 = date('m')-1;
		$TGLFOLDER2 = "0".$TGLFOLDER2;
		$cachefolder = "backup/".$TGLFOLDER."/".$TGLFOLDER2;
		$namafile = "Pen-" . date('Y')."_$TGLFOLDER2.csv";
		$namafile2 = "Pel-" . date('Y')."_$TGLFOLDER2.csv";
		if (!file_exists($cachefolder."/".$namafile) | !file_exists($cachefolder."/".$namafile2)) {
		$showbackup = "  $('#myModal').modal({backdrop: 'static'}); $('#myModal').modal('show'); $('#myModal .modal-content').load('modal_backup.php?act=backup&tipe=1');";
							  
							  }
							  }
 $logcont="inc/log_in.php";
  $lognav="   <ul class='nav masthead-nav'>
                <li class='active'><a href='beranda'>Beranda</a></li>
                <li><a href='doc'>Dokumentasi</a></li>
                <li><a href='pengaturan'>Pengaturan</a></li>
                <li><a data-toggle='tooltip' data-placement='bottom' title='Bantuan' href='help'><span class='glyphicon glyphicon-flag'></span></a></li>
              </ul>";
} 
else{
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  $logcont="inc/log_out.php";
  $lognav="   <ul class='nav masthead-nav'>
                <li class='active'><a href='doc'>Dokumentasi</a></li>
                <li><a data-toggle='tooltip' data-placement='bottom' title='Bantuan' href='help'><span class='glyphicon glyphicon-flag'></span></a></li>
              </ul>";
}
else {
$cek_backup=mysql_fetch_array(mysql_query("SELECT auto_backup FROM  pengaturan where id='1' "));
if($cek_backup['auto_backup']=='Y'){
		$TGLFOLDER = date('Y');
		$TGLFOLDER2 = date('m')-1;
		$TGLFOLDER2 = "0".$TGLFOLDER2;
		$cachefolder = "backup/".$TGLFOLDER."/".$TGLFOLDER2;
		$namafile = "Pen-" . date('Y')."_$TGLFOLDER2.csv";
		$namafile2 = "Pel-" . date('Y')."_$TGLFOLDER2.csv";
		if (!file_exists($cachefolder."/".$namafile) | !file_exists($cachefolder."/".$namafile2)) {
		$showbackup = "$('#myModal').modal('show');  $('#myModal .modal-content').load('modal_backup.php?act=backup&tipe=1');";
							  }
							  }
							  
 $logcont="inc/log_in.php";
  $lognav="   <ul class='nav masthead-nav'>
                <li class='active'><a href='beranda'>Beranda</a></li>
                <li><a href='doc'>Dokumentasi</a></li>
                <li><a href='pengaturan'>Pengaturan</a></li>
                <li><a data-toggle='tooltip' data-placement='bottom' title='Bantuan' href='help'><span class='glyphicon glyphicon-flag'></span></a></li>
              </ul>";
}
}

?>

 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content=""> 

    <title>SI PA'DE | RakIT Solution</title>
<link rel="shortcut icon" href="images/favicon.gif" />
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="rakstrap/css/cover.css" rel="stylesheet">
  <link href="rakstrap/css/loadingindicator.css" rel="stylesheet">
  </head>

  <body class="pace-done">

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand"><img src="images/RakIT.png" style="width:120px;"></h3>
			  
	<!--include content -->
<?php echo "$lognav"; ?>
            </div>
          </div>
		  <div></div> 
	<!--include content -->
<?php include "$logcont"; ?>	
	  </div>
          </div>

<?php include "inc/ui_modal.php"; ?>
          <div class="mastfoot">
            <div class="inner" style="margin-bottom: 100px;">
              <p>SI PA'DE v.2.0 - Developed by Ade A S | RakIT Solutions.</p>
            </div>
          </div>

        </div>

      </div>

    </div>
 
 
<script src="rakstrap/jquery-2.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>  
<script src="rakstrap/js/pace.min.js"></script> 
<script type="text/javascript">   
$('body').tooltip({
    selector: '[data-toggle=tooltip]'
}); 
	  
$('[data-toggle=tooltip]').on('hidden.bs.tooltip', function (e) {
   $(this).removeData('bs.tooltip'); 
   
}); 

$.fn.extend({
    popoverClosable: function (options) {
        var defaults = {
            template:
                '<div class="popover">\
<div class="arrow"></div>\
<div class="popover-header">\
<button type="button" class="close" data-dismiss="popover" aria-hidden="true">&times;</button>\
<h3 class="popover-title"></h3>\
</div>\
<div class="popover-content"></div>\
</div>'
        };
        options = $.extend({}, defaults, options);
        var $popover_togglers = this;
        $popover_togglers.popover(options);
        $popover_togglers.on('click', function (e) {
            e.preventDefault();
            $popover_togglers.not(this).popover('hide');
        });
        $('html').on('click', '[data-dismiss="popover"]', function (e) {
            $popover_togglers.popover('hide');
        });
    }
});

$(function () {
    $('[data-toggle="popover"]').popoverClosable();
});
//menampilkan modal  
$('#myModal').on('show.bs.modal', function (e) {
  });
	  
$('#myModal').on('hidden.bs.modal', function (e) {
   $(this).removeData('bs.modal');
   $("#myModal .modal-content").html("<div class='modal-header'>"
+ "<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>"
+ "<h4 class='modal-title' id='myModalLabel'>SEDANG MEMUAT...</h4>"
+ "</div>" 
+ "<div class='modal-body'>"
+ "<div class='progress progress-striped active'>"
+ "<div class='progress-bar'  role='progressbar' aria-valuenow='45' aria-valuemin='0' aria-valuemax='100' style='width: 100%'></div></div></div>");
   
}); 

</script>

<script type="text/javascript">
<?php echo $showbackup; ?>


    function hideAlert(el){
                  $(el).slideUp();
	}
    function validLogout(){
                  window.location='inc/logout.php?fn=logout';
	}
	
    function validLogin(){
		
				$("#alertlogin").hide('');
				$("#btnlogin").addClass("disabled");				
				$("#btnlogin").text("Memproses..."); 
       var uname=$('#user').val();
       var password=$('#password').val();
       var dataString = 'uname='+ uname + '&password='+ password;
       //$("#flash").show();
       //$("#flash").fadeIn(400).html('<img src="image/loading.gif" />');
       $.ajax({
             type: "POST",
             url: "inc/login_cek.php",
             data: dataString,
             cache: false,
             success: function(result){
             var result=trim(result);
             //$("#flash").hide();
             if(result=='1'){	
				$("#infologin").html("Anda Memasukan Karakter Terlarang");
				$("#alertlogin").slideDown('');				
				$("#btnlogin").removeClass("disabled"); 			
				$("#btnlogin").text("Coba Masuk Lagi"); 
             }
             if(result=='2'){
                  window.location='!auth';	
				$("#btnlogin").text("Silahkan Tunggu..."); 
             }
             if(result=='3'){	
				$("#infologin").html("Nama Pengguna dan Password Yang Anda Masukan Salah, Coba Lagi");
				$("#alertlogin").slideDown('');			
				$("#btnlogin").removeClass("disabled"); 				
				$("#btnlogin").text("Coba Masuk Lagi"); 
             }
             else {    

             if(result=='2'){
                  window.location='!auth';		
				$("#btnlogin").text("Silahkan Tunggu..."); 
             }
else {			 
				$("#infologin").html(result);		
				$("#alertlogin").slideDown('');	
				$("#btnlogin").removeClass("disabled"); 					
				$("#btnlogin").text("Coba Masuk Lagi");
}				
             } 
        }
  });
}

	
function trim(str){
var str=str.replace(/^\s+|\s+$/,'');
return str;
}

</script>  
    <script type="text/javascript">	
$(document).ready(function(){ 	 

 $("#searchSubmit").click(function(){

       var $val = $("#query").val();
	   var $str = "data!sta!hdk0!rw0!rt0-20ph@1@0!"+$val;
	   var $url = $str.replace(/\s+/g, '+');
	  location.href=$url;

    }); 
        // if text input field value is not empty show the "X" button
        
        $(".field").keyup(function() {
            $(".x").fadeIn(); 
            if ($.trim($(".field").val()) == "") {
                $(".x").fadeOut(); 
            }
        });
        // on click of "X", delete input field value and hide "X"
        $(".x").click(function() {
            $(".field").val("");
            $(this).hide(); 
        });
    });
		  
		  </script>
 
  </body>
</html>