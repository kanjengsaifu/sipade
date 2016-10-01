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
include "fungsi/class_paging.php";
include "fungsi/fungsi_indotgl.php";
include "fungsi/library.php";
?> 
<?php  
  
	$rule_std = mysql_query("select * from pengaturan where id='2'"); 
	$rule=mysql_fetch_array($rule_std);
	$rule_cap = mysql_query("select * from pengaturan where id='1'"); 
	$rulecap=mysql_fetch_array($rule_cap);	  
				   ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>SI PA'DE | Sistem Informasi Pelayanan Desa</title>
	<link rel="shortcut icon" href="images/favicon.gif">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">  
	<link type="text/css" href="rakstrap/css/style.css" rel="stylesheet">    
<link rel="stylesheet" href="rakstrap/css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
  <link href="rakstrap/css/loadingindicator.css" rel="stylesheet">
</head>

<body class="pace-done">
<?php include "inc/ui_top_panel.php"; ?>
<div class="container clearfix">
<div class="header clearfix"> 
     
<div class="row">
  <div class="col-md-4"><h2> No. <input name="no_kk" data-get="no_kk" value="" style="width: 200px; border-bottom:1px dotted #aaa;" id="no_kk" type="text"><span id="no_kk_cek">&nbsp;</span></h2></div>
  <div class="col-md-4" style="text-align:center;"><h1>KARTU KELUARGA</h1></div>
  <div class="col-md-4" style="text-align:right;">
<div class="btn-group">
    <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">
      <span class="glyphicon glyphicon-tasks"></span> Kelola
      <span class="caret"></span>
    </button>
    <ul class='dropdown-menu pull-right'>
      <li><a data-load='edit_kk.php?id=<?php echo "$k[no_kk_pen]";?>' data-toggle='modal' data-target='#myModal'>Perbaharui Data KK</a></li>
	  <li><a href='td_pen?nomorkk=<?php echo "$k[no_kk_pen]-";?>'>Tambah Anggota</a></li>
	</ul>
	</div>
</div> 
</div> 
  
    
    <div class="clear"> </div><hr>
<div class="informasi">
    <div class="headl2"><table border="0" width="100%">
  <tbody><tr>
    <td width="9%">&nbsp;</td>
    <td width="39%">Nama Kepala Keluarga</td>
    <td width="4%">:</td>
    <td width="48%"><span id="namakk"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Alamat</td>
    <td>:</td>
    <td><span id="alamatkk"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>RT/RW</td>
    <td>:</td>
    <td><span id="rtrwkk"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Desa/Keluarahan</td>
    <td>:</td>
    <td><span id="desakk"></span></td>
  </tr>
</table>
</div>
    <div class="headc2"><br>
</div>
    <div class="headr2">
   
    <table width="100%" border="0">
  <tr>
    <td width="20%">&nbsp;</td>
    <td width="36%">Kecamatan</td>
    <td width="4%">:</td>
    <td width="40%"><span id="keckk"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Kabupaten/Kota</td>
    <td>:</td>
    <td><span id="kabkk"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Kode Pos</td>
    <td>:</td>
    <td><span id="poskk"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Provinsi</td>
    <td>:</td>
    <td><span id="provkk"></span></td>
  </tr>
</table>
    </div> 
     <div class="clear"></div> 
     </div>
    
     <div class="clear"></div>
     <hr> 
	 </div>
     <div class="content"><form id="editstatus">
       <table class="list" border="0" width="100%">
       <thead>
            <tr>
            
           <td width="3%">No.</td> 
           <td width="20%">Nama Lengkap</td>
           <td width="10%">NIK</td>
           <td width="9%">Jns Kelamin</td>
           <td width="9%">Tpt Lahir</td>
           <td width="8%">Tgl Lahir</td>
           <td width="8%">Agama</td>
           <td width="13%">Pendidikan</td>
           <td width="17%">Jenis Pekerjaan</td>
            </tr>
          </thead> 
         <tbody><tr class="subtitle">
           <td>-</td> 
           <td>(1)</td>
           <td>(2)</td>
           <td>(3)</td>
           <td>(4)</td>
           <td>(5)</td>
           <td>(6)</td>
           <td>(7)</td>
           <td>(8)</td>
         </tr>
         </tbody>
		 <tbody id="dataanggota">  
<tr><td colspan='9'><div class='alert alert-warning'><p align='center'>[?] Silahkan isi Nomor KK di sebelah kiri atas.</p></div></td></tr>		 
         </tbody>
		 <tbody id="inputdataanggota">                
         </tbody>
       </table><hr>
       <div id="btnstatusnya" style="display:none;">
        <span id="jmlch"></span> Orang diatas : <select name="set" id="set">
       <option value="" style="background:#999;">Tentukan Status </option>
       <option value="2" style="background:#5f5;">Sudah tidak di desa ini (Pindah)</option>
       <option value="3" style="background:#ff5;">Sudah Meninggal (Wafat)</option>
       <option value="1" style="background:#fff;">Masih berdomisili di desa ini</option>
       </select>
    <button class="btn btn-default" type="submit" id="submitstatus">
      <span class="glyphicon glyphicon-refresh"></span> Perbaharui 
    </button>  
    <button type="reset" id="resetstatusnya" hidden=""></button>
    </div>   
    <div class="clearfix"></div></form>
       </div>
       <div class="center"><br></div>
       <div class="content">
       <table class="list" border="0" width="100%">
       <thead class="part2">
            <tr> 
              <td rowspan="2" width="3%"><br>
              No.</td>
              <td rowspan="2" width="15%"><br>
              Status Perkawinan</td>
              <td rowspan="2" width="13%"><br>
              Status HDK</td>
              <td rowspan="2" width="13%"><br>
              Kewarganegaraan</td>
              <td colspan="2">Dokumen Imigrasi</td>
              <td colspan="2">Nama Orang Tua</td>
            </tr>
            <tr>
            
           <td width="12%">No. Paspor</td>
           <td width="12%">No. KITAS/KITAP</td>
           <td width="15%">Ayah</td>
           <td width="15%">Ibu</td>
           </tr>
          </thead> 
         <tbody><tr class="subtitle"> 
           <td>-</td>
           <td>(9)</td>
           <td>(10)</td>
           <td>(11)</td>
           <td>(12)</td>
           <td>(13)</td>
           <td>(14)</td>
           <td>(15)</td>
         </tr>
         </tbody>
		 <tbody id="dataanggota2">		 
<tr><td colspan='8'><div class='alert alert-warning'><p align='center'>[?] Silahkan isi Nomor KK di sebelah kiri atas.</p></div></td></tr>
         </tbody>
		 <tbody id="inputdataanggota2">		  	  
         </tbody>
	   </table>
     </div>   
  </div> 
<div class="footer clearfix"><div style="float:left; width:300px; text-align:left;">SI PA'DE v1 &nbsp;&nbsp;&nbsp;&nbsp; | Use updated Internet browser for best performer</div><div style="float:right; width:300px; text-align:right;">Copyright © 2014 All Right Reserved | Design by Ade A S  <br></div></div>
<br/>
	 

<!-- Modal -->
<?php include "inc/ui_modal.php"; ?>
	
	
	
<script src="rakstrap/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script> 
<script src="rakstrap/js/pace.min.js"></script>
<script type="text/javascript" src="rakstrap/js/date_time.js"></script>
<script type="text/javascript">window.onload = date_time('date_time');</script>
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
$(document).ready(function(){  
    $('.lembar2').hide(); 
   $('.trigger').click(function() {
	this.checked = true;
    $('.lembar2').hide();   
	$('.btn').removeClass('active');
    $('#' + $(this).data('rel')).addClass('active');
    $('.' + $(this).data('rel')).show('');
    $('.surat_' + $(this).data('rel')).show('');
});
   
});
</script> 
<script type="text/javascript">  
// menandai semua checkbox
   $(function() {
    $("#idpenselectall").on("click", function() {
        $("input#idpenselect").prop("checked", this.checked);
            $("#jmlch").html($("input#idpenselect[type=checkbox]:checked").length);
        if ($("input#idpenselect:checked").length == 0 ) {

            $("#btnstatusnya").fadeOut("medium") ;

        }else {
            
            // without visibility verification, it is unnecesary :)
            $("#btnstatusnya").fadeIn ("medium") ; 
        }
    });
});

// menandai checkbox satu per satu 
   $(function() { 
    $("#idpenselect").live('change', function () {

        if ($("input#idpenselect:checked").length == 0 ) {

        $("#resetstatusnya").click();
            $("#btnstatusnya").fadeOut("medium") ;

        } else {
            
            // without visibility verification, it is unnecesary :)
            $("#btnstatusnya").fadeIn("medium");
            $("#jmlch").html($("input#idpenselect[type=checkbox]:checked").length);
        }

    });
     
    
});
</script> 
 

    <script type="text/javascript">
$(document).ready(function(){ 
  
   
    $("#editstatus").submit(function (ev) {
		
				$("#submitstatus").addClass("disabled");
				$("#submitstatus").html("<span class='glyphicon glyphicon-refresh'></span> Memproses...");
	    var frm = $("#editstatus");	 
	var values = frm.serialize();
    var settype = $("#btneditstatus").attr("data-id");
        $.ajax({
            type: "post",
            url: "inc/edit_status_simpan.php?set="+settype,
            data: values,
            success: function (data) {  	
				$("#submitstatus").html("<span class='glyphicon glyphicon-refresh'></span> Berhasil !");
		  window.location.reload()
            },
        error:function(){
            alert("GAGAL");
		}
        });

        ev.preventDefault(); 	
	
    });
});
    
	</script>        

<script type="text/javascript" src="rakstrap/js/bsn.AutoSuggest_2.1.3.js" charset="utf-8"></script>

<script type="text/javascript"> 
	var no_kk = { 
		script:"inc/inc_sugest.php?data=kk&limit=20&st=1&",
		varname:"input",
		json:true,
		shownoresults:false,
		maxresults:6,
		callback: function (obj) {  
		document.getElementById('no_kk').value = obj.id;    
		
	 $("#no_kk_cek").html("<img src='images/loading.gif' style='width:20px; height:20px;'/>");
var no_kk = $("#no_kk").val();
	$.ajax({
	type:"GET",
	url:"inc/inc_ceknik.php?mod=nokk",
	data: "no_kk="+no_kk,
		success: function(data){
				if(data==0){ 
	 $("#no_kk_cek").html("<img src='images/error.ico' style='width:20px; height:20px;'/>");  
				}
				else{ 
	 $("#no_kk_cek").html("<img src='images/success.png' style='width:20px; height:20px;'/>"); 
				}
		}
	});
		    $("#namakk").html(obj.value);  
		    $("#alamatkk").html(obj.add);  
		    $("#rtrwkk").html(obj.rt + "/" + obj.rw);	
		    $("#desakk").html("<?php echo $rule['desa']; ?>");  
		    $("#keckk").html("<?php echo $rule['kecamatan']; ?>");  
		    $("#kabkk").html("<?php echo $rule['kabupaten']; ?>");  
		    $("#provkk").html("<?php echo $rule['provinsi']; ?>");  
		    $("#poskk").html("<?php echo $rule['kodepos']; ?>");  
				  
		$("#dataanggota").html("<tr><td colspan='10' style='padding:5px;'><div class='alert alert-info'><p align='center'><img src='images/loading.gif' style='width:20px; height:20px;'/> loading...</p></div></td></tr>");
                 var nokk = $("#no_kk").val();
                 $.ajax({
                    type:"post",
                    url:"inc/inc_anggota_add.php?lembar=1",
                    data:"nokk="+nokk,
                    success: function(data) {
                      $("#dataanggota").html(data);
                    }
                 });
		$("#dataanggota2").html("<tr><td colspan='10' style='padding:5px;'><div class='alert alert-info'><p align='center'><img src='images/loading.gif' style='width:20px; height:20px;'/> loading...</p></div></td></tr>");
                 var nokk = $("#no_kk").val();
                 $.ajax({
                    type:"post",
                    url:"inc/inc_anggota_add.php?lembar=2",
                    data:"nokk="+nokk,
                    success: function(data) {
                      $("#dataanggota2").html(data);
                    }
                 });
		}
		 		
		   
	};
	var as_json = new bsn.AutoSuggest('no_kk', no_kk);

	</script>
	
</body></html> 

  <?php 
} 
}
?>