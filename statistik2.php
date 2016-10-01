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
include "fungsi/ubahkarakter.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>SI PA'DE | Sistem Informasi Pelayanan Desa</title>
	<link rel="shortcut icon" href="images/favicon.gif">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link type="text/css" href="rakstrap/css/style.css" rel="stylesheet">
  <link href="rakstrap/css/loadingindicator.css" rel="stylesheet">
</head>

<body class="pace-done">
<?php include "inc/ui_top_panel.php"; ?>
<div class="container clearfix">
<div class="header clearfix">
     
<div class="row">
  <div class="col-md-4"><h2>#Penghitung </h2></div>
  <div class="col-md-4" style="text-align:center;"><h1>STATISTIK DATA</h1></div>
  <div class="col-md-4" style="text-align:right;">
</div>
</div>
  
    
    <div class="clear"> </div><hr>
<div class="informasi" align="center">
    [!] Statistik terhitung berdasarkan informasi yang tersimpan dalam data dasar SI PA'DE
   
     <div class="clear"></div>
     </div>
    
     <div class="clear"></div>
     <hr>
	 </div>
     <div class="content">
	  <?php 
	  
		 $tgl_ini = date('d');
		 $bln_ini = date('m');
		 $thn_ini = date('Y');
		 $bln_ini_indo = blnindo($bln_ini);
		 
		 ?>
            <table border="0" class="list" id="DPTTable"><caption><h4 >DATA PENDUDUK TERKINI</h4 ><hr /></caption>
       <thead>
        <tr valign="middle" align="center">
            <td colspan="3" align="center" valign="middle">BULAN <?php echo $bln_ini_indo; ?></td>
              <td colspan="12" align="center" valign="middle"><?php echo "$tgl_ini - $bln_ini - $thn_ini"; ?></td>
            <td colspan="2" align="center" valign="middle">TAHUN <?php echo $thn_ini; ?></td>
         </tr>
            <tr>
              <td colspan="3" align="center" valign="middle">Data Penduduk Bulan ini</td>
            <td colspan="3" align="center" valign="middle">Meninggal</td>
            <td colspan="3" align="center" valign="middle">Pindah</td>
            <td colspan="3" align="center" valign="middle">Lahir</td>
              <td colspan="3" align="center" valign="middle">Data Penduduk Tersimpan</td>
              <td  align="center" valign="middle">Kartu Keluarga</td>
              <td align="center" valign="middle">Kartu Penduduk</td>
           </tr>
         </thead>
         <tr class="subtitle">
           <td>L</td>
           <td>P</td>
           <td>JML</td>
           <td>L</td>
           <td>P</td>
           <td>JML</td>
           <td>L</td>
           <td>P</td>
           <td>JML</td>
           <td>L</td>
           <td>P</td>
           <td>JML</td>
           <td>L</td>
           <td>P</td>
           <td>JML</td>
           <td>W</td>
           <td>W</td> 
         </tr>
         <tbody>
         <?php
		 $blnthnini = "$bln_ini $thn_ini";

		 
  
//penduduk berstatus = 0 / masih didesa
	$pen1=mysql_query("SELECT * FROM  penduduk WHERE kelamin_pen='1' AND  statusnya='0'  ");
	$pen2=mysql_query("SELECT * FROM  penduduk WHERE kelamin_pen='2' AND  statusnya='0' ");
	$col1_l = mysql_num_rows($pen1);  
	$col1_p = mysql_num_rows($pen2);
	$col1_jml = $col1_l+$col1_p;
  
//penduduk berstatus = 3 / wafat
	$wft1=mysql_query("SELECT * FROM  penduduk WHERE statusnya='3' AND kelamin_pen='1' AND date_format(tgl_data, '%m %Y') = '$blnthnini'");
	$wft2=mysql_query("SELECT * FROM  penduduk WHERE statusnya='3' AND kelamin_pen='2' AND date_format(tgl_data, '%m %Y') = '$blnthnini'");
	$col2_l= mysql_num_rows($wft1);
	$col2_p = mysql_num_rows($wft2);
	$col2_jml = $col2_l+$col2_p;
  
  
//penduduk berstatus = 2 / pindah  
	$pin1=mysql_query("SELECT * FROM  penduduk WHERE statusnya='2' AND kelamin_pen='1' AND date_format(tgl_data, '%m %Y') = '$blnthnini'");
	$pin2=mysql_query("SELECT * FROM  penduduk WHERE statusnya='2' AND kelamin_pen='2' AND date_format(tgl_data, '%m %Y') = '$blnthnini'");
	$col3_l = mysql_num_rows($pin1);
	$col3_p = mysql_num_rows($pin2);
	$col3_jml = $col3_l+$col3_p;
  
//penduduk baru lahir
	$lhr1=mysql_query("SELECT * FROM  penduduk WHERE  kelamin_pen='1' AND date_format(tanggal_lahir_pen, '%m %Y') = '$blnthnini'");
	$lhr2=mysql_query("SELECT * FROM  penduduk WHERE  kelamin_pen='2' AND date_format(tanggal_lahir_pen, '%m %Y') = '$blnthnini'");
	$col4_l= mysql_num_rows($lhr1);
	$col4_p = mysql_num_rows($lhr2);
	$col4_jml = $col4_l+$col4_p;
  
 
  
$pen_tot1=mysql_query("SELECT * FROM  penduduk WHERE kelamin_pen='1'");
$pen_tot2=mysql_query("SELECT * FROM  penduduk WHERE kelamin_pen='2'");
  $col5_l = mysql_num_rows($pen_tot1);
  $col5_p = mysql_num_rows($pen_tot2);
  $col5_jml = $col5_l+$col5_p;
  
$kk=mysql_query("SELECT * FROM  kk");
  $jmldatakk = mysql_num_rows($kk);
         ?>
         <tr valign="middle" align="center">
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td> 
         </tr>
         <tr valign="middle" align="center" height="50px">
           <td><?php echo $col1_l; ?></td>
           <td><?php echo $col1_p; ?></td>
           <td><?php echo $col1_jml; ?></td>
           <td><?php echo $col2_l; ?></td>
           <td><?php echo $col2_p; ?></td>
           <td><?php echo $col2_jml; ?></td>
           <td><?php echo $col3_l; ?></td>
           <td><?php echo $col3_p; ?></td>
           <td><?php echo $col3_jml; ?></td>
           <td><?php echo $col4_l; ?></td>
           <td><?php echo $col4_p; ?></td>
           <td><?php echo $col4_jml; ?></td>
           <td><?php echo $col5_l; ?></td>
           <td><?php echo $col5_p; ?></td>
           <td><?php echo $col5_jml; ?></td>
           <td><?php echo $jmldatakk; ?></td>
           <?php
$diumuran = mysql_query("SELECT * FROM statistik where tipe='wajibktp'");
$u = mysql_fetch_array($diumuran);

    $diumur=explode("-",$u['data']);
$data ="SELECT nama_pen, DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(tanggal_lahir_pen)), '%Y')+0 AS Umur FROM penduduk where statusnya='0' AND DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(tanggal_lahir_pen, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(tanggal_lahir_pen, '00-%m-%d')) between ".$diumur['0']." and ".$diumur['1']."";
$data = mysql_query($data);
$jmlwajibktp = mysql_num_rows($data);
$jmlblmktp = $jmldataak-$jmlwajibktp;
?>
           <td><?php echo $jmlwajibktp; ?></td> 
           </tr>
         <tr>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td> 
         </tr>
         </tbody>
       </table>
       <hr/>
      <div class="btn-group">
  <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-print"></span></button>

  <div class="btn-group">
    <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">
      <span class="glyphicon glyphicon-file"></span> Ekspor DPT
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
      <li class=""><a href="#" onclick="tableToExcel('DPTTable', 'Data Penduduk Terkini')">.xls</a></li>
      
    </ul>
  </div>
</div>
      
<div class="clearfix"></div>
<hr />
   <div id="grafikpelayanan"></div>
   </div>
  </div>

<div class="footer clearfix"><div style="float:left; width:300px; text-align:left;">SI PA'DE v.2.0 &nbsp;&nbsp;&nbsp;&nbsp; | Use updated Internet browser for best performer</div><div style="float:right; width:300px; text-align:right;">Developed by Ade A S | RakIT Solutions <br></div></div>
<br/>
	 

<!-- Modal -->
<?php include "inc/ui_modal.php"; ?>
	
	
	
<script src="rakstrap/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="rakstrap/js/pace.min.js"></script>
<script type="text/javascript" src="rakstrap/js/date_time.js"></script>
<script type="text/javascript">window.onload = date_time('date_time');</script>

 
<script type="text/javascript">
$('body').tooltip({
    selector: '[data-toggle=tooltip]'
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

</body></html>
  
  <?php
}
}
?>