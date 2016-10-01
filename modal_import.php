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
  header('location:modal_login.php?ref='.$_GET[kk].'&id='.$_GET[id].'&mode='.$_GET[mode].'&refname=t_kk');
}
else{
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "Anda harus masuk terlebih dahulu !";
}
else{
?><?php 
?><div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">PENAMBAHAN DATA PENDUDUK</h4>
      </div> 
	   <div class="modal-body">
<div class="alert alert-info fade in clearfix" style="margin-bottom:10px;"  data-dismiss="alert" >
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<span class="glyphicon glyphicon-exclamation-sign"></span> Hindari kesalahan dengan cek/verifikasi isi dari data file yang akan di Import.
			</div>

<form action="imported/t_import.php" enctype="multipart/form-data" method="POST" id="formimport" class="has-validation-callback">
<div class="alert alert-success"><b>Pilih File Yang Akan Di Import</b>

<a data-toggle="collapse" data-parent="#accordion" href="#collapseTpen" class="collapsed">
<sup style="float:right" id="tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Info">[?]</sup>
</a>
<div id="collapseTpen" class="panel-collapse collapse" style="height: 0px;">
<hr/>Selain dapat menyimpan data penduduk secara masal dalam waktu sekejap, fitur ini juga mampu secara otomatis mengidentifikasi nomor KK yang belum tersimpan untuk disisipkan sebagai data KK Baru.<br/>
Untuk Data Penduduk dengan Nomor KK Lama, otomatis akan ditambahkan sebagai anggota keluarga baru sesuai kecocokan Nomor KK yang tercantum. 
</div>

 <hr>
<a onclick="window.location='imported/form_penduduk.xlsx';" class="btn-sm btn-success">Unduh Formulir</a>
<hr>
<table>
<tr>
<td>
<sub><code><?php echo getenv('HOME'); ?>\www\sipaderw2\imported\</code></sub> 
</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td>
<select name='csv' data-validation="required"  data-validation-error-msg="&nbsp;?&nbsp;&nbsp;" style='width:255px;'>
<option>&nbsp;</option>
<?php $n = 0; foreach (scandir("./imported") as $file){
    if (strtolower(strrchr($file, '.'))==".csv" && strtolower(strrchr($file, '.'))!==".php"){
        $n++;
        echo ("<option value=".$file.">" . $file . "</option>");
    }
  }
  ?>
  </select>
  <td>
  </tr>
  </table>
   <hr>

 </div>
 <div class="modal-footer"> 
	<div class="btn-group">
		<button type="submit" name="nokkinputsubmit" id="nokkinputsubmit" value="Simpan" data-loading-text="Memproses..." class="btn  btn-default disabled">
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
    

       </div></form>
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
 
            
<script type='text/javascript'> 
$("#formimport").submit(function (ev) {
	var btn = $("#nokkinputsubmit")
    btn.button('loading')
    if ($('.error').length > 0) {
	modalalert('#alert','warning','Sepertinya kolom File Belum terisi ? '); 
    btn.button('reset')
        }
		else { 
    var actionurl = $("#formimport").attr("action");
    var method = $("#formimport").attr("method");
    var values = $("#formimport").serialize();
        $.ajax({
            type: method,
            url: actionurl,
            data: values,
            success: function (data) {    
            if(data==0){ modalalert('#alert','warning','Sepertinya kolom File Belum terisi ? '); }	
            else if(data==1){ modalalert('#alert','danger','File tidak ditemukan silahkan cek dan coba lagi !'); }		 
            else if(data==3){ modalalert('#alert','danger','Data gagal disimpan, #serverError !');  }			
            else if(data==4){ modalalert('#alert','warning','Gagal !! File harus berakhiran .CSV'); }	
            else { modalalert('#alert','success',data); /*refreshto('5000',data)*/ }	
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