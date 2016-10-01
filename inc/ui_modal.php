 <?php
session_start();
error_reporting(0); 
if($_SESSION[login]==0){
  //header("location:inc/logout.php");
} 
?>
<div class="modal fade" id="myModal" tabindex="-1" data-keyboard="false" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="myModalcont">
      <div class='modal-header'>
		<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
		<h4 class='modal-title' id='myModalLabel'>SEDANG MEMUAT...</h4>
		</div>
		<div class='modal-body'>
		<div class='progress progress-striped active'>
		<div class='progress-bar'  role='progressbar' aria-valuenow='45' aria-valuemin='0' aria-valuemax='100' style='width: 100%'></div>
		</div>
		</div>
    </div>
  </div>
</div>
 
<div class="modal fade" id="myModal2" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="myModalcont">
      <div class='modal-header'>
		<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
		<h4 class='modal-title' id='myModalLabel'>SEDANG MEMUAT...</h4>
		</div>
		<div class='modal-body'>
		<div class='progress progress-striped active'>
		<div class='progress-bar'  role='progressbar' aria-valuenow='45' aria-valuemin='0' aria-valuemax='100' style='width: 100%'></div>
		</div>
		</div>
    </div>
  </div>
</div>
 
 <div class="modal fade" id="reload" tabindex="-1" data-keyboard="false" role="dialog" aria-labelledby="reloadLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="reloadcont">
      <div class='modal-header'>
		<h4 class='modal-title' id='reloadLabel'><span class="glyphicon glyphicon-comment"></span> SI PA'DE Bilang ...</h4>
		</div>
		<div class='modal-body'>
		<div class='alert-cont'></div><br/>
		<div class='progress progress-striped active'>
		<div class='progress-bar'  role='progressbar' aria-valuenow='45' aria-valuemin='0' aria-valuemax='100' style='width: 100%'></div>
		</div>
		</div>
		<div class="modal-footer"> 	 
		</div>
    </div>
  </div>
</div>

 <div class="modal fade" id="alert" tabindex="-1" data-keyboard="false" role="dialog" aria-labelledby="reloadLabel" aria-hidden="true">
  <div class="modal-dialog  modal-sm">
    <div class="modal-content" id="reloadcont">
      <div class='modal-header'>
		<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
		<h4 class='modal-title' id='reloadLabel'><span class="glyphicon glyphicon-comment"></span> SI PA'DE Bilang ...</h4>
		</div>
		<div class='modal-body'>
		<div class='alert-cont'></div><br/>
		</div>
		<div class="modal-footer"> 
        <button type="button" class="btn btn-default" style="float:right;" data-dismiss="modal">Oke</button>			 
		</div>
    </div>
  </div>
</div>
 