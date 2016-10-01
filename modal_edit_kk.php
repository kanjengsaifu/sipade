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
  header('location:modal_login.php?ref='.$_GET[kk].'&id='.$_GET[id].'&mode='.$_GET[mode].'&refname=edit_kk');
}
else{
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "Anda harus masuk terlebih dahulu !";
}
else{
?><?php
include "fungsi/koneksi.php";
include "fungsi/fungsi_indotgl.php";
$kk=mysql_query("SELECT * FROM kk WHERE no_kk='$_GET[id]'");
	$kk=mysql_fetch_array($kk);
$alamat=mysql_query("SELECT * FROM arsip_alamat");
$rw=mysql_query("SELECT * FROM arsip_rw");
	
?><div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">PERBAHARUI DATA KK</h4>
      </div> 
	   <div class="modal-body">
<div class="alert alert-info fade in" style="margin-bottom:10px;"  data-dismiss="alert" >
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<span class="glyphicon glyphicon-exclamation-sign"></span> Pengubahan ini juga mempengaruhi data penduduk yang ada didalamnya
			</div>
<br/> 

<form action="inc/edit_kk_simpan.php" method="POST" id="formeditkk">
<table width="100%">
  <tr valign="top">
    <td width="24%" valign="top">Nomor KK</td>
    <td width="2%" valign="top">:</td>
    <td width="74%" valign="top">
<input name="no_kk" type="text" id="ekk_no_kk" value="<?php echo $kk['no_kk']; ?>" style="width:200px" data-validation="number" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" />
<input name="id" id="ekk_id" value="<?php echo $kk['id_kk']; ?>" style="width: 310px;" data-validation="number" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" type="hidden"></td>
  </tr>
  <tr valign="top">
    <td valign="top">Alamat</td>
    <td valign="top">:</td>
    <td valign="top"><select name="alamat" id="ekk_alamat" data-validation="number" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" style="width:200px">
<option value="" selected="selected">Alamat</option>
<?php
while($a=mysql_fetch_array($alamat)){
	echo "<option value='$a[id_alamat]'>$a[alamat]</option>";
}
?> 
</select></td>
  </tr>
  <tr valign="top">
    <td valign="top">RW/RT</td>
    <td valign="top">:</td>
    <td valign="top"><select id="ekk_rw" name="rw" data-validation="number" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;">
<option value="" selected="selected">RW</option>
<?php
while($a=mysql_fetch_array($rw)){
echo "<option value='$a[id_rw]'>$a[rw]</option>";
}
?>
</select> / 
<select id="ekk_rt" name="rt" data-validation="number" data-validation-error-msg="&nbsp;?&nbsp;&nbsp;">
<option value="" selected="selected">RT</option>
</select> </td>
  </tr>
  <tr valign="top">
    <td valign="top">Atas Nama</td>
    <td valign="top">:</td>
    <td valign="top"><input name="catatan" id="ekk_catatan" type="text"  data-validation="custom" data-validation-regexp="^[a-zA-Z\.\(\)\-\s]+$"  data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" placeholder="Nama Kepala Keluarga" style="width:400px;" value="<?php echo $kk[catatan]; ?>"></td>
  </tr>  
  <tr valign="top">
    <td rowspan="2" valign="top"> </td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>   
</table>



 <div class="modal-footer"> 
<div class="btn-group">
		<button  type="submit" name="nokkinputsubmit" id="nokkinputsubmit" value="Simpan" data-loading-text="Memproses..." class="btn  btn-default disabled">
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
</form>    

       </div> 
       </div>  

			
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
$('#aktifkan').click(function(){ // enable submit button via checkbox
         $(this).toggleClass('active');
         $('#nokkinputsubmit').toggleClass('disabled');
         $('#nokkinputsubmit').toggleClass('btn-default');
         $('#nokkinputsubmit').toggleClass('btn-primary');
});
</script>

    <script type="text/javascript">
		$(function(){
  $("#ekk_rw").change(function(){
    $.getJSON("select.php",{id: $(this).val(), ajax: 'true'}, function(j){
      var options = '';
      for (var i = 0; i < j.length; i++) {
        options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
      }
      $("#ekk_rt").html(options);   
    })
  })
})

  </script>
 <script type="text/javascript">
	$(document).ready(function(){ 			
			
	var nokk = <?php echo $kk['no_kk']; ?>;
	var alamat = <?php echo $kk['alamat']; ?>;
	var rw = <?php echo $kk['rw']; ?>;
	var rt = <?php echo $kk['rt']; ?>;
	
		     document.getElementById('ekk_alamat').selectedIndex = alamat;  
		     $('#ekk_no_kk').val(nokk); 		 
		    document.getElementById('ekk_rw').selectedIndex = rw;	
				$.getJSON("select.php",{id: rw}, function(j){
					var options = '';
					for (var i = 0; i < j.length; i++) {
						options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
					}
					$("#ekk_rt").html(options);
					$('#ekk_rt').val(rt);
					
				})  
			 			
			});
			</script>
            
<script type='text/javascript'> 
$("#formeditkk").submit(function (ev) {
	var btn = $("#nokkinputsubmit")
    btn.button('loading')
    if ($('.error').length > 0) {
	modalalert('#alert','warning','Masih ada data yang tidak terisi atau kurang tepat, silahkan periksa lagi !'); 
    btn.button('reset')
        }
		else { 
    var actionurl = $("#formeditkk").attr("action");
    var method = $("#formeditkk").attr("method");
    var values = $("#formeditkk").serialize();
        $.ajax({
            type: method,
            url: actionurl,
            data: values,
            success: function (data) {    
            if(data==0){ modalalert('#alert','warning','Masih ada data yang tidak terisi atau kurang tepat, silahkan periksa lagi !'); }	
            else if(data==1){ modalalert('#alert','danger','Data tidak terverifikasi !'); }		
            else if(data==2){ modalreload('#reload','success','Data Berhasil Diperbaharui, SI PA\'DE Akan Menyegarkan Halaman Untuk Anda'); refresh(1000) }
            else if(data==3){ modalalert('#alert','danger','Data gagal diperbaharui, #serverError !');  }			
            else if(data==4){ modalalert('#alert','warning','Nomor KK Sudah terpakai, gunakan Nomor KK lain !'); }	
            else { modalreload('#reload','success','Data Berhasil Diperbaharui, SI PA\'DE Akan Menyegarkan Halaman Untuk Anda'); refreshto('1000',data) }	
			btn.button('reset')			
            },
        error:function(){
              modalreload('#myModal','#reload','danger','Terjadi Galat Kode #AjaxError, SI PA\'DE Akan Menyegarkan Halaman Dalam 5 dtk'); refresh(5000) 
			btn.button('reset') 
		}
        });		
		}		       
		ev.preventDefault(); 	
	
}); 
</script>
<?php 
} 
}
?>