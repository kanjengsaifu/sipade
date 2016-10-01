<?php 
include "fungsi/fungsi_anti_injection.php";
?>
      <div class="modal-content"> <div class="modal-header"> 
        <h4 class="modal-title"><span class="glyphicon glyphicon-lock"></span> &nbsp;&nbsp;Pemeriksaan Keamanan SI PA'DE - sebelum memuat <?php echo $_GET[refname]; ?> </h4>
		
      </div>
		
		
      <div class="panel-body"> 
	  
  		<div class="alert alert-danger inner-alert" id="alertlogin">
		<button type="button" class="close" onclick="hideAlert('#alertlogin')">&times;</button>
		<span id="infologin">Memverifikasi ulang, Silahkan masuk kembali dengan akun resmi anda.</span>
		</div> 
		<br/>
 
	  <div class="input-group">
  <span class="input-group-addon no-shadow"><span class="glyphicon glyphicon-user"></span></span>
  <input data-original-title="Nama Pengguna/Username" data-toggle="tooltip" data-placement="top" title="" class="form-control" name="user" id="user" placeholder="Nama Pengguna" required="" autofocus="" type="text">
  </div><br>
	  <div class="input-group">
  <span class="input-group-addon no-shadow"><span class="glyphicon glyphicon-qrcode"></span></span>
		<input data-toggle="tooltip" data-placement="top" title="Kata Sandi/Password" class="form-control" name="password" id="password" placeholder="Kata Sandi" required="" type="password">
		</div><br/>
		
	<div class="row user-row-inner"> <hr>  
	  </div> 
		<button class="btn btn-primary pull-left" type="button" onclick="validLogin()" id="btnlogin">
			Masuk Kembali
		</button>  
		<button class="btn btn-danger pull-right" type="button" onclick="validLogout()" id="btnlogout">
			Keluar Saja
		</button>
	  </div>
	  </div>
	  
<script type="text/javascript">
    function hideAlert(el){
                  $(el).slideUp();
	}
    function validLogout(){
                  window.location='inc/logout.php';
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
             if(result=='3'){	
				$("#infologin").html("Nama Pengguna dan Password Yang Anda Masukan Salah, Coba Lagi");
				$("#alertlogin").slideDown('');			
				$("#btnlogin").removeClass("disabled"); 				
				$("#btnlogin").text("Coba Masuk Lagi"); 
             }
             else {    

             if(result=='2'){ 
    $("#myModalcont").load("modal_<?php echo $_GET[refname]; ?>.php?ref=<?php echo $_GET[kk]; ?>&id=<?php echo $_GET[id]; ?>&mode=<?php echo $_GET[mode]; ?>&refname=eKTP");
				 
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