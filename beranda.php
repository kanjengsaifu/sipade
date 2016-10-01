<?php
include "fungsi/fungsi_anti_injection.php";
session_start();
error_reporting(0);
include "inc/timeout.php";

if($_SESSION[login]==1){
	if(!cek_login()){
		$_SESSION[login] = 0;
	} 
?>
<?php 
include "fungsi/koneksi.php";
include "fungsi/class_paging.php";
include "fungsi/fungsi_indotgl.php";
include "fungsi/library.php";
  include"fungsi/fungsi_combobox.php";
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
<div class="content clearfix" style="width:295px; float:right; margin:0;">
     <div class="panel panel-primary">
      <div class="panel-heading">
        <h2 class="panel-title" align="center">JUMLAH PELAYANAN TERKINI</h2>
      </div>
      <div class="panel-body">
	  
    <div class="btn-group-vertical" style="width:241px;">
        
    <label class="btn btn-default" id="resi">
	<span class="badge" title="Surat Keterangan">Ket</span>  Resi (KTP Sementara)
    </label> 
    <div style="display: block;" class="surat_resi info_surat">
	<p align="left">Laki-Laki
  <div class="progress">
  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
    60%
  </div>
  </div>
  </p><p align="left">Perempuan
  <div class="progress">
  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
    40%
  </div>
  </div>
  </p>
	</div><label class="btn btn-default" id="skd">
	<span class="badge" title="Surat Keterangan">Ket</span>
          Domisili
    </label> 
    <div style="display: none;" class="lembar2 surat_skd info_surat">SKD : Menerangkan bahwa seseorang berdomisili di desa (ini).</div><label class="btn btn-default" id="sku">
	<span class="badge" title="Surat Keterangan">Ket</span>
          Usaha
    </label> 
    <div style="display: none;" class="lembar2 surat_sku info_surat">SKU : Menerangkan kegiatan usaha seseorang di desa (ini).</div><label class="btn btn-default" id="skdu">
	<span class="badge" title="Surat Keterangan">Ket</span>
          Domisili Usaha
    </label> 
    <div style="display: none;" class="lembar2 surat_skdu info_surat">SKDU : Menerangkan informasi domisili usaha seseorang di desa (ini), berikut data lainnya.</div><label class="btn btn-default" id="sktm">
	<span class="badge" title="Surat Keterangan">Ket</span>
          Tidak Mampu
    </label> 
    <div style="display: none;" class="lembar2 surat_sktm info_surat">SKTM : menerangkan bahwa seseorang tercatat dalam data penduduk berekonomi lemah di desa (ini).</div><label class="btn btn-default" id="skkm">
	<span class="badge" title="Surat Keterangan">Ket</span>
          Keluarga Miskin
    </label> 
    <div style="display: none;" class="lembar2 surat_skkm info_surat">SKKM : Menerangkan bahwa seseorang/keluargga  tercatat dalam data keluargga berekonomi lemah di desa (ini)</div><label class="btn btn-default" id="skkb">
	<span class="badge" title="Surat Keterangan">Ket</span>
          Kelakuan Baik
    </label> 
    <div style="display: none;" class="lembar2 surat_skkb info_surat">SKKB : Menerangkan bahwa seseorang yang berdomisili di desa (ini) dan berkelakuan baik.</div><label class="btn btn-default" id="skk">
	<span class="badge" title="Surat Keterangan">Ket</span>
         Kelahiran
    </label> 
    <div style="display: none;" class="lembar2 surat_skk info_surat">SKK : Menerangkan informasi kelahiran seseorang, serta beberapa data lain menyangkut peristiwa kelahirannya.</div><label class="btn btn-default" id="skkk">
	<span class="badge" title="Surat Keterangan">Ket</span>
          Kegiatan Keramaian
    </label> 
    <div style="display: none;" class="lembar2 surat_skkk info_surat">SKKK : Menerangkan bahwa pemerintah desa menyetujui kegiatan yang akan diadakan oleh seseorang.</div><label class="btn btn-default" id="skw">
	<span class="badge" title="Surat Keterangan">Ket</span>
          Kematian
    </label> 
    <div style="display: none;" class="lembar2 surat_skw info_surat">SKW : Menerangkan kapan dan sebab meninggalnya seseorang</div><label class="btn btn-default" id="skpd">
	<span class="badge" title="Surat Keterangan">Ket</span>
         Pindah Datang
    </label> 
    <div style="display: none;" class="lembar2 surat_skpd info_surat">SKPD : Surat pengantar pengurusan mutasi penduduk (Pindah)</div><label class="btn btn-default" id="ktp">
	<span class="badge" title="Formulir">For</span>
          Kartu Tanda Penduduk
    </label> 
    <div style="display: none;" class="lembar2 surat_ktp info_surat">KTP : Formulir Kartu Tanda Penduduk</div>	      </div> 
		  
  <div class="panel-footer"> 
  <span class="label label-default">Ket</span> / Keterangan<br>
  <span class="label label-default">For</span> / Formulir</div>
    </div>
    </div>
     </div>
<div class="content clearfix" style="width:570px; float:left; margin:0; position:static;"> 
<div class="well well-sm">
<div class="informasi" align="center">
    Selamat Datang Di Sistem Informasi Pelayanan Desa - SI PA'DE
   
     <div class="clear"></div> 
     </div>
</div>
 
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#all" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-home"></span> Menu</a></li>
  <li><a href="#home" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-hdd"></span> Data</a></li>
  <li><a href="#pelayanan" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-print"></span> Pelayanan</a></li>
  <li><a href="#bantuan" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-question-sign"></span>  Bantuan</a></li>
  <li><a href="#pengaturan" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-cog"></span> Pengaturan</a></li>
</ul> 
<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane fade in active" id="all"><br/>    
	<div class="row">
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail"><img src="images/data_pen.gif" style="height: 100px; width: 100%; display: block;" data-src="holder.js/100%x180" alt="100%x180">
    <div class="caption">
        <h3>Data Penduduk</h3>
	</div></a>
  </div> 
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail"><img src="images/data_kk.gif" style="height: 100px; width: 100%; display: block;" data-src="holder.js/100%x180" alt="100%x180">
    <div class="caption">
        <h3>Data Keluarga</h3>
	</div></a>
  </div> 
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail"><img src="images/data_tmbh.gif" style="height: 100px; width: 100%; display: block;" data-src="holder.js/100%x180" alt="100%x180">
    <div class="caption">
        <h3>Tambah Data</h3>
	</div></a>
  </div> 
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail"><img src="images/data_stat.gif" style="height: 100px; width: 100%; display: block;" data-src="holder.js/100%x180" alt="100%x180">
    <div class="caption">
        <h3>Statistik Data</h3>
	</div></a>
  </div> 
  
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail"><img src="images/pelayanan_mesin.gif" style="height: 100px; width: 100%; display: block;" data-src="holder.js/100%x180" alt="100%x180">
    <div class="caption">
        <h3>Pembuat Surat</h3>
	</div></a>
  </div> 
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail"><img src="images/pelayanan_pencatatan.gif" style="height: 100px; width: 100%; display: block;" data-src="holder.js/100%x180" alt="100%x180">
    <div class="caption">
        <h3>Pencatatan</h3>
	</div></a>
  </div> 
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail"><img src="images/pelayanan_todo.gif" style="height: 100px; width: 100%; display: block;" data-src="holder.js/100%x180" alt="100%x180">
    <div class="caption">
        <h3>Daftar Kerja</h3>
	</div></a>
  </div> 
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail"><img src="images/data_stat.gif" style="height: 100px; width: 100%; display: block;" data-src="holder.js/100%x180" alt="100%x180">
    <div class="caption">
        <h3>Statistik</h3>
	</div></a>
  </div> 
  
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail"><img src="images/pelayanan_profil.gif" style="height: 100px; width: 100%; display: block;" data-src="holder.js/100%x180" alt="100%x180">
    <div class="caption">
        <h3>Profil Desa</h3>
	</div></a>
  </div> 
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail"><img src="images/pengaturan_surat.gif" style="height: 100px; width: 100%; display: block;" data-src="holder.js/100%x180" alt="100%x180">
    <div class="caption">
        <h3>Surat-surat</h3>
	</div></a>
  </div> 
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNzEiIGhlaWdodD0iMTgwIj48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijg1LjUiIHk9IjkwIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTcxeDE4MDwvdGV4dD48L3N2Zz4=" style="height: 100px; width: 100%; display: block;" data-src="holder.js/100%x180" alt="100%x180">
    <div class="caption">
        <h3>Operator</h3>
	</div></a>
  </div>  
	</div>
	</div>

  <div class="tab-pane fade" id="home"><br/>    
	<div class="row">
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail"><img src="images/data_pen.gif" style="height: 100px; width: 100%; display: block;" data-src="holder.js/100%x180" alt="100%x180">
    <div class="caption">
        <h3>Data Penduduk</h3>
	</div></a>
  </div> 
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail"><img src="images/data_kk.gif" style="height: 100px; width: 100%; display: block;" data-src="holder.js/100%x180" alt="100%x180">
    <div class="caption">
        <h3>Data Keluarga</h3>
	</div></a>
  </div> 
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail"><img src="images/data_tmbh.gif" style="height: 100px; width: 100%; display: block;" data-src="holder.js/100%x180" alt="100%x180">
    <div class="caption">
        <h3>Tambah Data</h3>
	</div></a>
  </div> 
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail"><img src="images/data_stat.gif" style="height: 100px; width: 100%; display: block;" data-src="holder.js/100%x180" alt="100%x180">
    <div class="caption">
        <h3>Statistik Data</h3>
	</div></a>
  </div> 
</div>
</div>
  <div class="tab-pane fade" id="pelayanan"><br/>    
	<div class="row">
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail"><img src="images/pelayanan_mesin.gif" style="height: 100px; width: 100%; display: block;" data-src="holder.js/100%x180" alt="100%x180">
    <div class="caption">
        <h3>Pembuat Surat</h3>
	</div></a>
  </div> 
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail"><img src="images/pelayanan_pencatatan.gif" style="height: 100px; width: 100%; display: block;" data-src="holder.js/100%x180" alt="100%x180">
    <div class="caption">
        <h3>Pencatatan</h3>
	</div></a>
  </div> 
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail"><img src="images/pelayanan_todo.gif" style="height: 100px; width: 100%; display: block;" data-src="holder.js/100%x180" alt="100%x180">
    <div class="caption">
        <h3>Daftar Kerja</h3>
	</div></a>
  </div> 
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail"><img src="images/data_stat.gif" style="height: 100px; width: 100%; display: block;" data-src="holder.js/100%x180" alt="100%x180">
    <div class="caption">
        <h3>Statistik</h3>
	</div></a>
  </div> 
</div>
</div>
  <div class="tab-pane fade" id="bantuan">c...</div>
  <div class="tab-pane fade" id="pengaturan"><br/>    
	<div class="row">
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail"><img src="images/pelayanan_profil.gif" style="height: 100px; width: 100%; display: block;" data-src="holder.js/100%x180" alt="100%x180">
    <div class="caption">
        <h3>Profil Desa</h3>
	</div></a>
  </div> 
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail"><img src="images/pengaturan_surat.gif" style="height: 100px; width: 100%; display: block;" data-src="holder.js/100%x180" alt="100%x180">
    <div class="caption">
        <h3>Surat-surat</h3>
	</div></a>
  </div> 
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNzEiIGhlaWdodD0iMTgwIj48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijg1LjUiIHk9IjkwIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTcxeDE4MDwvdGV4dD48L3N2Zz4=" style="height: 100px; width: 100%; display: block;" data-src="holder.js/100%x180" alt="100%x180">
    <div class="caption">
        <h3>Operator</h3>
	</div></a>
  </div>  
</div>
</div>
</div>
<hr/>

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#home" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-info-sign"></span> Sekilas Tentang Desa Tamansari</a></li> 
</ul> 
<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane fade in active" id="home"><br/> 
  <div class="well well-sm">Tamansari adalah sebuah desa yang berada dalam kawasan kecamatan Tamansari kabupaten Bogor provinsi Jawa Barat, Pemerintahan Desa yang berkantor sekretariat di Jl. Taman No. 14 ini, memiliki jumlah penduduk mencapai 13933 jiwa dan saat ini dipimpin oleh seorang kepala desa bernama Gumilar Suteja.
  </div>
  </div>
</div>
  <div class="clearfix"></div>   
              </div>
  </div>
        
    
     <div class="clear"></div>
  </div> 
<div class="footer clearfix"><div style="float:left; width:300px; text-align:left;">SI PA'DE v.2.0 &nbsp;&nbsp;&nbsp;&nbsp; | Use updated Internet browser for best performer</div><div style="float:right; width:300px; text-align:right;">© 2014, RakIT Team | Design by Ade A S  <br></div></div>
<br/>
	 

<!-- Modal -->
<?php include "inc/ui_modal.php"; ?>
	
	
	
<script src="rakstrap/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script> 
<script src="rakstrap/js/pace.min.js"></script>
<script type="text/javascript" src="rakstrap/js/date_time.js"></script>
<script type="text/javascript">window.onload = date_time('date_time');</script>
<script type="text/javascript" src="rakstrap/js/bsn.AutoSuggest_2.1.3.js" charset="utf-8"></script>

<script type="text/javascript">
	var no_pen = { 
		script:"inc/inc_sugest.php?data=penpelayanan&limit=6&",
		varname:"input",
		json:true,
		shownoresults:false,
		maxresults:6,
		callback: function (obj) {  
		document.getElementById('no_pen').value = obj.id;            
		$("#no_pen_cek").html("<img src='images/loading.gif' style='width:20px; height:20px;'/>");
var no_pen = $("#no_pen").val();
	$.ajax({
	type:"GET",
	url:"inc/inc_ceknik.php?mod=nopen",
	data: "no_pen="+no_pen,
		success: function(data){
				if(data==0){ 
	 $("#no_pen_cek").html("<img src='images/error.ico' style='width:20px; height:20px;'/> <sup>Tidak Terverifikasi</sup>"); 
				}
				else{ 
	 $("#no_pen_cek").html("<img src='images/success.png' style='width:20px; height:20px;'/> <sup>Terverifikasi</sup>"); 
				}
		}
	}); 
		    
				  
		}
		   
	};
	var as_json = new bsn.AutoSuggest('no_pen', no_pen); 
		
			 
</script> 
<script type='text/javascript'>//<![CDATA[ 

var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
//]]>  

</script>
<script type="text/javascript">  

		    document.getElementById('tahun').value = <?php if(isset($_GET[tahun])) {echo $_GET[tahun];} ?>; 
		    document.getElementById('bulan').selectedIndex = '<?php if(isset($_GET[bulan])) {echo $_GET[bulan]-1;} ?>'; 
		    document.getElementById('tanggal').selectedIndex = '<?php if(isset($_GET[tanggal])) {echo $_GET[tanggal]-1;} ?>'; 
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
</body></html>  
  <?php } 
else{
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  header('location:auth');
} 
}

?>