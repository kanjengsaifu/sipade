	  <div class="container-a clearfix">
		  <div class="container-auth clearfix">
		  <div class="content1 innercont">
		   
		  <div class="htitle clearfix"><img src="images/sipade.gif" style="float:left; margin:-15px 10px 0 0"> Sistem Informasi Pelayanan Desa</div>
		  <div  class="description clearfix">Mendukung Gerakan IT Desa (RakIT Desa) dalam rangka menciptakan pelayanan yang prima dan modern melalui pemanfaatan teknologi tepat guna.</div> <br/>
            
<div class="clear:both"></div> 
		  </div>
		  <div class="content2">
		  <div class="panel panel-primary">
      <div class="panel-heading">
        <h2 class="panel-title"><span class="glyphicon glyphicon-lock"></span> &nbsp;&nbsp;Pintu Masuk Ruang Operator</h2>
      </div>
      <div class="panel-body"> 
  		<span class="alert alert-danger inner-alert" id="alertlogin" style="display:none;width:100%;">
		<button type="button" class="close" onclick="hideAlert('#alertlogin')">&times;</button>
		<span class="glyphicon glyphicon-exclamation-sign"></span> <b>Ops...</b><br/>
		<span id="infologin"></span>
		</span>
	<div class="row user-row-inner"> <hr/> 
	
	  </div>  
	  <div class="input-group">
  <span class="input-group-addon no-shadow"><span class="glyphicon glyphicon-user"></span></span>
  <input data-toggle='tooltip' data-placement='top' title='Nama Pengguna/Username' class="form-control" name="user" id="user" placeholder="Nama Pengguna" required="" autofocus="" type="text">
  </div><br/>
	  <div class="input-group">
  <span class="input-group-addon no-shadow"><span class="glyphicon glyphicon-qrcode"></span></span>
		<input data-toggle='tooltip' data-placement='top' title='Kata Sandi/Password' class="form-control" name="password" id="password" placeholder="Kata Sandi" required="" type="password">
		</div>
		
	<div class="row user-row-inner"> <hr/>
		<button class="btn btn-primary btn-block" style="width:265px;margin:auto;" type="button" onclick="validLogin()" id="btnlogin">
			Masuk
		</button>  
	  </div>
	  </div>
	  </div>
		  </div></div>
		