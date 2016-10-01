 <?php
session_start();
error_reporting(0); 
if($_SESSION[login]==0){
  header("location:inc/logout.php");
} 
?>
	<div class="search-panel">
		<div class="container clearfix">
			<nav>
				<a href="beranda" data-info="Kembali" id="tooltip" data-toggle="tooltip" data-placement="bottom" title="Ke Beranda"><span class="glyphicon glyphicon-chevron-left"></span></a>
				<a href="javascript::" data-info="Muat Ulang" id="tooltip" onclick="window.location.reload()" data-toggle="tooltip" data-placement="bottom" title="Muat Ulang"><span class="glyphicon glyphicon-refresh"></span></a>
				<a href="doc" data-info="Info" id="tooltip" data-toggle="tooltip" data-placement="bottom" title="Bantuan"><span class="glyphicon glyphicon-flag"></span></a>
			</nav> 
			<span  id="date_time" class="clock"></span>
			
			<div class="searchbox pull-right">
			
        <form id="searchForm" onsubmit="onSearchSubmit(event)" action="data?filterstatusnya=0&filterhdk=0&filterrw=0&filterrt=0&tampilan=2&jph=20&hal=1&by=0" method="get">
			 <div class="input-group">
      <input type="text" name="query" class="form-control" placeholder="Pencarian cepat..." value="<?php if(isset($_GET['query'])) {echo $_GET['query'];}?>">
      <input name="filterstatusnya" value="a" type="hidden">
      <input name="filterhdk" value="0" type="hidden"><input name="filterrw" value="0" type="hidden"><input name="filterrt" value="0" type="hidden"><input name="tampilan" value="2" type="hidden"><input name="jph" value="20" type="hidden"><input name="hal" value="1" type="hidden"><input name="by" value="0" type="hidden">
	  <span class="input-group-btn">
        <button class="btn btn-default" id="searchSubmit" type="submit"><span class="glyphicon glyphicon-search"></span></button>
      </span>
	 
    </div><!-- /input-group -->
		 </form>
		 </div>
		</div>
	</div>
