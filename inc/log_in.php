 <?php
session_start();
error_reporting(0); 
if($_SESSION[login]==0){
 ?>
 
<script src="../rakstrap/jquery-2.1.1.min.js"></script>
<script type="text/javascript">  
top.window.location.href='http://localhost/sipaderw2/auth';
</script>
<?php
}  
else { 

	  include "../fungsi/koneksi.php"; 
 $rule_std = mysql_query("select * from pengaturan where id='2'"); 
	$rule=mysql_fetch_array($rule_std);
	$RULEDESA = $rule['desa'];
?>
  <div class="container-a clearfix">
		  <div class="container-auth clearfix">
		  <div class="content1 innercont">
		  
		  <img src="images/logoloading.png" style="float:left; margin:5px 10px 0 0">  <span data-toggle="tooltip" data-placement="top" title="Filosifi RakIT - Desa" style="color: #000;    text-shadow: 1px 0px 20px #fff;"> Goresan Pena pada kanvas untuk mengawali aksi nyata lukiskan panorama Desa yang lebih baik melalui pemanfaatan teknologi informasi dan sumber daya manusia.</span>
		  <div class="clearfix"><br/></div>
           <hr/>
		  <div class="clearfix">
		  
		  <div class="box-menu">
    <a href="ts" class="thumbnail"><img src="images/pelayanan_mesin.gif" style="height: 100px; width: 100%; display: block;" alt="Data Penduduk"></a>
	Pembuat Surat</div>
		  <div class="box-menu">
    <a href="arsip" class="thumbnail"><img src="images/pelayanan_pencatatan.gif" style="height: 100px; width: 100%; display: block;" alt="Data Penduduk"></a>
	Pencatatan</div>
		  <div class="box-menu">		  
    <a href="beranda" class="thumbnail"><img src="images/data_pen.gif" style="height: 100px; width: 100%; display: block;" alt="Data Penduduk"></a>
		  Data Penduduk</div>
		  <div class="box-menu">
    <a href="data!sta!hdk1!rw0!rt0-20phlist@1@0!" class="thumbnail"><img src="images/data_kk.gif" style="height: 100px; width: 100%; display: block;" alt="Data Penduduk"></a>
	Data Keluarga</div>
		  <div class="box-menu">
    <a href="statistik" class="thumbnail"><img src="images/data_stat.gif" style="height: 100px; width: 100%; display: block;" alt="Data Penduduk"></a>
	Data Statistik</div>
	</div>
	<hr/>
<div class="clear:both"></div>
	<div class="searchcont">
	<br/>
			<div id="searchContainer">
     <noscript>
	 <form name="search" action="data" method="get">
	 </noscript>
            <input class="field" name="query" id="query" data-toggle="tooltip" data-placement="top" title="Gunakan tanda koma untuk memisahkan kata pencarian" placeholder="Ketik NIP/NKK/NAMA sebagai kata kunci disini..." value="" type="text">
            <div class="delete"><span class="x">x</span></div>
            <button id="searchSubmit" class="submit" name="submit" type="submit" value="Cari">Cari</button> 
     <noscript>
	 <input name="filterhdk" value="0" type="hidden"><input name="filterrw" value="0" type="hidden"><input name="filterrt" value="0" type="hidden"><input name="tampilan" value="2" type="hidden"><input name="jph" value="20" type="hidden"><input name="hal" value="1" type="hidden"><input name="by" value="0" type="hidden">
	 </form>
	 </noscript>
    </div> 
	
        
    </div>
	
		  </div>
		  <div class="content2">
		  <div class="panel panel-primary" style="width:300px;">
      <div class="panel-heading">
        <h2 class="panel-title"><span class="glyphicon glyphicon-user"></span> &nbsp;&nbsp;<?php echo "Desa ".$RULEDESA; ?></h2><div class="pull-right action-buttons">
                        <div class="btn-group pull-right no-shadow">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-cog" style="margin-right: 0px;"></span>
                            </button>
                            <ul class="dropdown-menu slidedown"> 
                                <li><a href="javascript::" onclick='validLogout()'><span class="glyphicon glyphicon-flag"></span> Keluar / Akhiri Sesi</a></li>
                            </ul>
                        </div>
                    </div>
      </div>
      <div class="panel-body"> 
	<div class="row user-row-inner">
  		 <div class='user-left'>
			<img class='thumbnail' src='images/padeid.gif' style='width:100%;'>
			</div>
			<div class='user-right'>
			<b style="font-family: Oswald;font-weight: 600;font-size: 16px;"><?php echo $_SESSION[namalengkap]; ?></b><br/>
			Terakhir kali masuk tanggal <?php echo $_SESSION[log]; ?> WIB
			</div>
			<div class='clearfix'></div><hr/>
			 
	  </div>   
	  <ul class="list-group no-shadow todolist">
	  <?php  
	  include "fungsi/library.php";
	  include "fungsi/ubahkarakter.php";
	  $blnth = "$thn_sekarang $bln_sekarang";
	  $log  = mysql_query("SELECT * FROM pelayanan
									WHERE uname='$_SESSION[namauser]' AND date_format(tgl, '%Y %m') = '$blnth' order by id DESC");
  
  $ketemu = mysql_num_rows($log);  
  if ($ketemu!=''){  
 while($a=mysql_fetch_array($log)){
 $namadb = ubah_huruf_ke_kecil("$a[nl]");
 $nama = ubah_huruf_awal(" ", "$namadb");
 echo "
                        <li class='list-group-item'>
                            <div class='todolistcont celarfix'>
							<span class='label label-default'>$a[js]</span> <sup>a/n</sup> $nama    
							<button class='btn pull-right todo-option' onclick=\"location.href='arsip?tanggal=32&bulan=$bln_sekarang&tahun=$thn_sekarang&no_pen=$a[no_pen]&submit=Saring'\">
									<span class='glyphicon glyphicon-zoom-in'></span>
							</button>
                            </div>
                        </li>";
						}
						}
			else {
 echo "
                        <li class='list-group-item'> <hr/>
						<div class='alert alert-warning'>Tampaknya Anda belum menggunakan <a href='ts'>Pembuat Surat</a> di bulan ini.</div><hr/>
                        </li>";}
						?> 
                    </ul>
	  </div>
	  </div>
	  </div>
		  </div></div>
		
 <?php } ?>