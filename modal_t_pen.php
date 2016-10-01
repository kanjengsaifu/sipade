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
  header('location:modal_login.php?ref='.$_GET[kk].'&id='.$_GET[id].'&mode='.$_GET[mode].'&refname=t_pen');
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
$kk=mysql_query("SELECT * FROM kk WHERE no_kk='$_GET[id]'");
$k=mysql_fetch_array($kk); 
$rule=mysql_query("SELECT * FROM pengaturan WHERE id='2'");
$rule=mysql_fetch_array($rule); 
$arsip_alamat=mysql_query("SELECT * FROM arsip_alamat");
$arsip_rw = mysql_query("select * from arsip_rw"); 
$arsip_agama = mysql_query("select * from arsip_agama"); 
$arsip_status = mysql_query("select * from arsip_status"); 
$arsip_status_hdk = mysql_query("select * from arsip_status_hdk"); 
$arsip_pendidikan = mysql_query("select * from arsip_pendidikan"); 
$arsip_pekerjaan = mysql_query("select * from arsip_pekerjaan"); 
$arsip_goldar = mysql_query("select * from arsip_goldar"); 

	
?> 
<form action="inc/t_pen_simpan.php?no_kk=<?php echo $k['no_kk']; ?>" method="POST" class="input has-validation-callback" id="t_pen">
	<div class="modal-content" id="myModalcont">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">PENAMBAHAN DATA PENDUDUK (ANGGOTA KELUARGA)</h4>
			</div> 
	   <div class="modal-body">
			<div class="alert alert-info fade in" style="margin-bottom:10px;"  data-dismiss="alert" >
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<span class="glyphicon glyphicon-exclamation-sign"></span> Lebih teliti dengan melakukan pemeriksaan setiap kolom isian yang ada.
			</div>
	    
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#new_input" role="tab" data-toggle="tab">Input Baru</a></li>
  <li><a href="#use_exist" id="ambil" role="tab" data-toggle="tab">Ambil Yang Tersedia</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
<div class="tab-pane active" id="new_input">
<hr/>
  <p align='center'><div class='btn-group'><label class='btn btn-default'><input name='ambil' id='ambil1' value='1' class='trigger' type='radio' checked='checked'> <span class='badge' title='Gunakan Data Dibawah Ini Sebagai Kepala Keluarga'>Gunakan Data Dibawah Ini</span></label></div></p><hr/>
 
 <table border="0" width="100%">

<tbody>
<tr>
<td><b>NKK </b></td>
<td width="0%">:</td>
<td colspan="3">  
<input id="no_kk" value="<?php echo $k['no_kk']; ?>" style="width: 310px;" type="text" class="disabled" disabled>
<span id="no_kk_cek">&nbsp;</span>  <span id="no_pen_tbh"></span>
</td>
</tr>
<tr>
<td><b>Status NIK</b></td>
<td width="0%">:</td>
<td colspan="3">
  <div class="btn-group">
  <label class=""> 
    <input name="sementara" id="sementara2" value="N" class="sementara trigger" type="radio" checked="">
    <span class="badge">Ada</span></label>
</div>
  <div class="btn-group">
  <label class="">
    <input name="sementara" id="sementara" value="Y" class="sementara trigger" type="radio">
    <span class="badge" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sistem Akan Membuatkan NIK Sementara">Belum Ada</span></label>
</div>
</td>
</tr>
<tr id="NIKnya">
<td><b>NIK </b></td>
<td width="0%">:</td>
<td colspan="3"  id="ceksementara"> <input name="no" id="no" placeholder="<?php echo $rule['kodekab']; ?>" style="width: 310px;" data-validation="number" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" type="text">
<span id="no_pen_cek">&nbsp;</span>  <span id="no_pen_tbh"></span></td>
</tr>
 

<tr>
<td colspan="3">&nbsp;</td>
<td colspan="2"></td>
</tr>
<tr>
<td>Nama</td>
<td width="0%">:</td>
<td colspan="3"><input name="nama" id="t_nama" value="<?php echo $p['nama_pen']; ?>" style="width:310px;" data-validation="custom" data-validation-regexp="^[a-zA-Z\.\(\)\-\s]+$" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" type="text"></td>
</tr>
<tr>
<td>Tempat/Tgl Lahir</td>
<td>:</td>
<td colspan="3"><input name="tempat_lahir" id="t_ttl1" value="<?php echo $p['tempat_lahir_pen']; ?>" data-validation="custom" data-validation-regexp="^[a-zA-Z\.\-\s]+$" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" style="width:200px;" type="text">,<input size="16" id="t_ttl2" data-date-format="dd-mm-yyyy"  name="tanggal_lahir" style="width:105px;" data-validation="date" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" data-validation-format="dd-mm-yyyy" maxlength="10" type="text">
</td>
</tr>
<tr>
<td>Jenis Kelamin</td>
<td>:</td>
<td width="52%"><select name="kelamin" id="t_kelamin" data-validation="number" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" style="width:105px;">
<option value="a" selected="selected"> </option>
<option value="1">Laki-Laki</option>
<option value="2">Perempuan</option>
</select></td>
<td width="1%">&nbsp;</td>
<td width="17%">&nbsp;</td>
</tr>
<tr>
<td>Agama</td>
<td>:</td>
<td><select name="agama" id="t_agama" data-validation="number" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" style="width:105px;">
<option value="a" selected="selected"> </option>
<?php 
while($agama=mysql_fetch_array($arsip_agama)){
echo "<option value='$agama[id_agama]'>$agama[agama]</option>";
}
?>
</select>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>Alamat</td>
<td>:</td>
<td><select id="t_alamat" name="alamat" data-validation="number" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" class="disabled"  style="width:310px;" disabled>
<option value="a" selected="selected">Alamat</option>

<?php 
while($alamat=mysql_fetch_array($arsip_alamat)){
echo "<option value='$alamat[id_alamat]'>$alamat[alamat]</option>";
}
?>
</select></td>
<td rowspan="2"></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>RW/RT</td>
<td>:</td>
<td><select id="t_rw" name="rw" data-validation="number" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" class="disabled" disabled>
<option value="a" selected="selected">RW</option>

<?php 
while($rw=mysql_fetch_array($arsip_rw)){
	echo "<option value='$rw[id_rw]'>$rw[rw]</option>";
}
	?>
</select>/<select id="t_rt" name="rt" class="disabled" data-validation="number" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" disabled><option value="a">RT</option></select> 
</td>
<td></td>
</tr>
<tr>
<td>Pendidikan</td>
<td>:</td>
<td><select name="pendidikan" id="t_pendidikan" data-validation="number" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" style="width:310px;">
<option value="a"> </option>    

<?php 
while($didik=mysql_fetch_array($arsip_pendidikan)){
echo "<option value='$didik[id_pendidikan]'>$didik[pendidikan]</option>";
}
?>
</select></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>Pekerjaan</td>
<td>:</td>
<td><select name="pekerjaan" id="t_pekerjaan" data-validation="number" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" style="width:310px;">
<option value="a"> </option>    

<?php 
while($kerja=mysql_fetch_array($arsip_pekerjaan)){
echo "<option value='$kerja[id_pekerjaan]'>$kerja[pekerjaan]</option>";
}
?>
</select></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>Status Nikah</td>
<td>:</td>
<td><select name="status" id="t_status" data-validation="number" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" style="width:105px;">
<option value="a"> </option>	
<?php 
while($status=mysql_fetch_array($arsip_status)){
echo "<option value='$status[id_status]'>$status[status]</option>";
}
?>
</select></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>Status Dalam Kel</td>
<td>:</td>
<td><select name="status_hdk" id="t_status_hdk" data-validation="number" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" style="width:200px;">
<option value="a"> </option>

<?php 
while($hdk=mysql_fetch_array($arsip_status_hdk)){
	echo "<option value='$hdk[id_status_hdk]'>$hdk[status_hdk]</option>";
}
	?>
</select></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>Nama AYAH</td>
<td>:</td>
<td colspan="3"><input name="ayah" id="t_ayah" style="width:310px;"  value="<?php echo $p['ayah_pen']; ?>" data-validation="custom" data-validation-regexp="^[a-zA-Z\.\(\)\-\s]+$" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" type="text"></td>
</tr>
<tr>
<td>Nama IBU</td>
<td>:</td>
<td colspan="3"><input name="ibu" id="t_ibu" style="width:310px;"  value="<?php echo $p['ibu_pen']; ?>" data-validation="custom" data-validation-regexp="^[a-zA-Z\.\(\)\-\s]+$" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" type="text"></td>
</tr>  
<tr>
<td>Gol Darah</td>
<td>:</td>
<td><select name="goldar" id="t_goldar" data-validation="number" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;">
<option value="13"> -</option>
<?php 
while($goldar=mysql_fetch_array($arsip_goldar)){
echo "<option value='$goldar[id_goldar]'>$goldar[goldar]</option>";
}
?>
</select></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr>
<td colspan="5"></td>
</tr>
<tr>
<td colspan="5"><hr/>
<div id="accordion">
<div>
<div align="center"> 
<a data-toggle="collapse" data-parent="#accordion" href="#collapseTpen">
<span id="tooltip" data-toggle="tooltip" data-placement="top" title="Klik Untuk Menampilkan">[Data Tambahan]</span>
</a> 
</div>
<div id="collapseTpen" class="panel-collapse collapse">
<div><hr/>
<table width="100%" border="none">
<tr>
<td width="25%">Kewarganegaraan</td>
<td width="1%">:</td>
<td><select name="kewarganegaraan" id="t_kewarganegaraan" data-validation="number" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" style="width:105px;">
<option value="a"> </option>
<option value="1" selected>WNI</option>
<option value="2">WNA</option>
</select></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>	
<tr>
<td>No. Paspor</td>
<td width="0%">:</td>
<td colspan="3"><input name="paspor" id="t_paspor" value="-" style="width:310px;" data-validation="custom" data-validation-regexp="^[a-zA-Z\.\(\)\-\s]+$" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" type="text"></td>
</tr>
<tr>
<td>No. KITAS/KITAP</td>
<td width="0%">:</td>
<td colspan="3"><input name="kitas_kitap" id="t_kitas_kitap" value="-" style="width:310px;" data-validation="custom" data-validation-regexp="^[a-zA-Z\.\(\)\-\s]+$" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" type="text"></td>
</tr>
</table>
</div>
</div>
</div>
</div>
</td> 
</tr>
</tbody>
</table> 
</div>

  <div class="tab-pane" id="use_exist">
  <table border="0" width="100%">
  <tbody>
		<tr>
		<td><b>Masukan NIK </b></td>
		<td width="0%">:</td>
		<td colspan="3"> <input name="no_exist" id="no_exist" class="required_input" placeholder="<?php echo $rule['kodekab']; ?>" value="<?php echo $rule['kodekab']; ?>" style="width: 310px;" data-validation="number" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" type="text">
		 <button type="button" class='btn btn-xs btn-default toggle_fitur' id="btn_fetch1" data-toggle="tooltip"data-original-title="Verifikasi NIK" data-placement="top" title=""><span class="glyphicon glyphicon-edit"></span> Cek</button> &nbsp;&nbsp;<span class="no_cek" id="no_pen_cek">&nbsp;</span></td>
		</tr> 
		<tr>
		<td colspan="5"> 
		<hr/><p align='center'><div class='btn-group'><label class='btn btn-default'><input name='ambil' id='ambil2' value='2' class='trigger' type='radio'> <span class='badge' title='Gunakan Data Dibawah Ini Sebagai Kepala Keluarga'>Ambil Data Dibawah Ini</span></label></div></p><hr/>
		<div id="show_exist"> Menunggu input NIK ...</div>
		</td>
		</tr> 
	</tbody>
	</table>
  </div>
</div>
	  </div>
 <div class="modal-footer">
<div class="btn-group">
		<button  type="submit" id="t_pen_cek" data-loading-text="Memproses..." class="btn  btn-default disabled">
		<span class="glyphicon glyphicon-floppy-open"></span> PROSES</button>

<div class="btn-group"> 
<label class="btn btn-default"> 
<span class="label">
<input type="checkbox" class="active" id="aktifkan">
<span class="badge">Saklar Tombol</span>
</span></label>
</div>
		</div>
        <button type="button" class="btn btn-default" style="float:right;" data-dismiss="modal">Tutup</button>
</div>
       </div> 
</form>    

 
	   
  <script src="rakstrap/js/jquery.form-validator.js"></script>

<script>
  $.validate({ 
    validateOnBlur : true // disable validation when input looses focus 
 
  });
  
</script>  
	   
<script type='text/javascript'>
$(document).ready(function() {
  $(window).keydown(function(event){ 
    if(event.keyCode == 13) { //menonaktifkan submit via enter
      event.preventDefault();
      return false;
    }
  });
});

	$('input[name="sementara"]').click(function(){ 	
	var lop = $(this).val();
	if(lop =='Y'){
        $('#no').removeAttr('data-validation');
        $('#no').removeAttr('data-validation-current-error');
        $('#no').removeAttr('data-validation-error-msg');	
        $('#no').attr('class', 'disabled');	
        $('#no').attr('disabled', 'disabled');	
        $('#NIKnya').hide();	
		
	}
	else {
        $('#no').attr('data-validation', 'number');
         $('#no').attr('data-validation-error-msg', ' ?  ');		
        $('#no').removeAttr('class', 'disabled');	
        $('#no').removeAttr('disabled', 'disabled');	
        $('#NIKnya').show();	
	}
	})
	
$('#aktifkan').click(function(){ // enable submit button via checkbox
         $(this).toggleClass('active');
         $('#t_pen_cek').toggleClass('disabled');
         $('#t_pen_cek').toggleClass('btn-default');
         $('#t_pen_cek').toggleClass('btn-primary');
});
</script>
<script type='text/javascript'> 
$("#t_pen").submit(function (ev) {
	var btn = $("#t_pen_cek")
    btn.button('loading')
   /* if ($('.error').length > 0) {
	modalalert('#alert','warning','Masih ada data yang tidak terisi atau kurang tepat, silahkan periksa lagi !'); 
    btn.button('reset')
        }
		else {*/
    var actionurl = $("#t_pen").attr("action");
    var method = $("#t_pen").attr("method");
    var values = $("#t_pen").serialize();
        $.ajax({
            type: method,
            url: actionurl,
            data: values,
            success: function (data) {    
            if(data==0){ modalalert('#alert','warning','Masih ada data yang tidak terisi atau kurang tepat, silahkan periksa lagi !'); }	
            else if(data==1){ modalalert('#alert','danger','Data tidak terverifikasi !'); }	
            else if(data==2){ modalreload('#reload','success',"Data Berhasil Diperbaharui, SI PA'DE Akan Menyegarkan Halaman Untuk Anda"); <?php if (isset($_GET['id'])){ echo "refreshto(1000, '".$k['no_kk']."') "; } ?> }	
            else if(data==3){ modalalert('#alert','danger','Data gagal diperbaharui, #serverError !'); }		
            else if(data==4){ modalalert('#alert','warning','NIK Sudah terpakai, gunakan NIK lain !'); }
            else if(data==5){ modalalert('#alert','warning','NIK tidak dikenal !'); }	
			else { modalalert('#alert','warning','SIPA\'DE tidak mengerti !'); }
			btn.button('reset')	
            },
        error:function(){
              modalreload('#myModal','#reload','danger','Terjadi Galat Kode #AjaxError, SI PA\'DE Akan Menyegarkan Halaman Dalam 5 dtk'); refresh('5000') 
			btn.button('reset') 
		}
        }); 
		/*}*/		      
		ev.preventDefault(); 	
	
}); 


$('a[href="#use_exist"]').click(function (e) {
  e.preventDefault()
              $("#ambil1").prop("checked", false);
              $("#ambil2").prop("checked", true);
})
$('a[href="#new_input"]').click(function (e) {
  e.preventDefault()
              $("#ambil1").prop("checked", true);
              $("#ambil2").prop("checked", false);
})
</script>

<script type="text/javascript" src="bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="bootstrap/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
      
<script type='text/javascript'>   
	$('#t_ttl2').datetimepicker({
        language:  'id',  
		autoclose: 1,
		todayHighlight: 1, 
		minView: 2, 
		weekStart: 1, 
		pickerPosition: "bottom-right",
		forceParse: 0
    });
</script>  

 <script type="text/javascript">
	$(document).ready(function(){ 			
	 	
	var t_alamat ="<?php echo $k['alamat']; ?>";
	var t_rw ="<?php echo $k['rw']; ?>"; 
	var t_rt ="<?php echo $k['rt']; ?>"; 
	 
		    document.getElementById('t_alamat').selectedIndex = t_alamat;   		 
		    document.getElementById('t_rw').selectedIndex = t_rw; 		  
				$.getJSON("select.php",{id: t_rw}, function(j){
					var options = '';
					for (var i = 0; i < j.length; i++) {
						options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
					}
					$("#t_rt").html("<option value='a'>RT</option>" + options);
					$('#t_rt').val(t_rt);
					
				})
});				

  </script>

	<link rel="stylesheet" type="text/css" href="rakstrap/css/jquery.coolautosuggest.css" />
	<script language="javascript"  type="text/javascript" src="rakstrap/js/jquery.coolautosuggest.js"></script>
<script language="javascript" type="text/javascript">
	$("#no").change(function(){ //cek input 
			cekNIK('pen','no','nopen')
			});
	$("#no_exist").keydown(function(){ //cek input 
			$("#show_exist").html("Menunggu Input NIK ..."); 
			});
	$("#no_exist").coolautosuggest({ //Suggest
		url:"inc/inc_sugest.php?data=pen&limit=5&chars=", 
		showThumbnail:false,
		showDescription:true,
		minChars:2,
		onSelected:function(result){
		  // Check if the result is not null
			if(result!=null){
				$("#no_exist").val(result.id);						
				$(".toggle_fitur").click();
	
			
		}
		
		
	}
	});
	$(".toggle_fitur").click(function(){ //fetch data
	var btn = $("#btn_fetch1")
     btn.button('loading')
		var chars= $("#no_exist").val();
		if (chars.length>=16){
		$.ajax({
			type:"GET",
			url:"inc/inc_sugest.php?data=pen&limit=1",
			data: "chars="+chars,
			success: function(result){ 
			if(result!=="[]"){
							try{
									var arr = $.parseJSON(result);
							
									if(arr==null){  modalalert('#alert','warning','Tidak menemukan data sesuai NIK : ' +chars);  }
									else{
											if(arr.length>0){
												for(i=0;i<arr.length;i++){													
													$.ajax({
													type:"GET",
													url:"inc/inc_show_exist.php?mod=nopen",
													data: "no_pen="+arr[i].no,
													success: function(data){

													if(data==1){}
													else {
													$("#show_exist").html(data); 
													btn.button('reset');
													}
													}
});
												}								
											
											}
											else { 
											modalalert('#alert','warning','Tidak menemukan data sesuai NIK : ' +chars);
											btn.button('reset'); 
											
											}
										}
							}
							catch(e){
											 modalalert('#alert','warning','SI PA\'DE Mengalami Sedikit Masalah, silahkan segarkan halaman'); 
											 btn.button('reset'); 
											$(".required_input").val(""); 
											$(".required_input").removeClass('btn disabled');
										
									}
									}
									else {  modalalert('#alert','warning','Tidak menemukan data sesuai NIK : ' +chars); btn.button('reset'); 
											btn.button('reset'); 
											$(".required_input").val(""); 
											$(".required_input").removeClass('btn disabled');
											
											}
						},
						error: function(xhr, status, ex){							
											 modalalert('#alert','warning','SI PA\'DE Mengalami Sedikit Masalah, silahkan segarkan halaman'); 
											 btn.button('reset'); 
											$(".required_input").val(""); 
											$(".required_input").removeClass('btn disabled');
											
						}
		
  		});
			}	
			else { //input kurang dr 16 karakter
				modalalert('#alert','warning','Pastikan NIK sudah benar (Min. 16 Digit) !'); 
				btn.button('reset'); 
			}	
	});
</script>
<script type="text/javascript">
 function cekNIK (cont,id,mod){ 
	 $("#no_"+cont+"_cek").html("<img src='images/loading.gif' style='width:20px; height:20px;'/>");
var no = $("#"+id).val();
	$.ajax({
	type:"GET",
	url:"inc/inc_ceknik.php?mod="+mod,
	data: "no="+no,
		success: function(data){
				if(data==0){
				  $("#no_"+cont+"_cek").html("<img src='images/success.png' style='width:20px; height:20px;'/>");
				}
				else{
				  $("#no_"+cont+"_cek").html("<img src='images/error.ico'  style='width:20px; height:20px;'/>");
				}
		}
	});
}
</script>
 
<?php 
} 
}
?>