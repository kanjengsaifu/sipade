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
include "../sipade/fungsi/koneksi.php";
include "../sipade/fungsi/class_paging.php";
include "../sipade/fungsi/fungsi_indotgl.php";
include "../sipade/fungsi/library.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>SI PA'DE | Sistem Informasi Pelayanan Desa</title>
	<link rel="shortcut icon" href="images/favicon.gif">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">  
	<link type="text/css" href="rakstrap/css/style.css" rel="stylesheet">    
  <link href="rakstrap/css/loadingindicator.css" rel="stylesheet">
  
<link rel="stylesheet" href="rakstrap/css/editor.css" />
</head>

<body class="pace-done">
<?php include "inc/ui_top_panel.php"; ?>

<div class="container clearfix">
<h1 class="pull-left">SIPA'DE |  &nbsp;</h1> <h3 class="pull-left"> Dokumentasi <span class="label label-success">RW2</span></h3>

<div class="clearfix"></div>
<hr/>
<div class="clearfix">
<div class="breadcumb clearfix"><b>POSISI ANDA  //</b> <a>Depan</a> &raquo; introduction</div>
<hr/>
<div class="clearfix"><br/></div>
			<div class="pull-left sidebar">

                
<ul>
                    <li class="section">Getting Started</li>
                            <li class="current"><a href="/about">Introduction</a>
                    </li>
                            <li><a href="/requirements">Requirements</a>
                    </li>
                            <li><a href="/installation">Installation</a>
                    </li>
                            <li><a href="/updating">Updating</a>
                    </li>
                            <li><a href="/screenshots">Screenshots</a>
                    </li>
            </ul>
<ul>
                    <li class="section">Working with Bolt</li>
                            <li><a href="/content">Contenttypes and Records</a>
                    </li>
                            <li><a href="/content-in-templates">Content in templates</a>
                    </li>
                            <li><a href="/taxonomies">Relations and Taxonomies</a>
                    </li>
                            <li><a href="/menus">Using menus</a>
                    </li>
                            <li><a href="/permissions">Permissions</a>
                    </li>
            </ul>
<ul>
                    <li class="section">Templating</li>
                            <li><a href="/templates-routes">Templates and Routes</a>
                    </li>
                            <li><a href="/templates">Building templates</a>
                    </li>
                            <li><a href="/record-and-records">Record and Records</a>
                    </li>
                            <li><a href="/content-fetching">Fetching content</a>
                    </li>
                            <li><a href="/content-paging">Paging content</a>
                    </li>
                            <li><a href="/content-search">Implementing Search</a>
                    </li>
                            <li><a href="/templatetags">Bolt template tags</a>
                    </li>
            </ul>
<ul>
                    <li class="section">Extending Bolt</li>
                            <li><a href="/extensions">Creating Bolt Extensions</a>
                    </li>
                            <li><a href="/internals">Bolt Internals</a>
                    </li>
                            <li><a href="/contributing">Contributing to Bolt</a>
                    </li>
                            <li><a href="/code-quality">Code Quality</a>
                    </li>
            </ul>
<ul>
                    <li class="section">Other Information</li>
                            <li><a href="/locales">Locales</a>
                    </li>
                            <li><a href="/nut">Nut (command line utility)</a>
                    </li>
                            <li><a href="/maintenancemode">Maintenance (offline) mode</a>
                    </li>
                            <li><a href="/credits">Credits and Contributing</a>
                    </li>
                            <li><a href="/roadmap">Roadmap</a>
                    </li>
            </ul>

            </div>

			<div class="pull-left content-detail">
				
				<h2>About Bolt</h2>

<p>Bolt is a tool for Content Management, which strives to be as simple and
straightforward as possible. It is quick to set up, easy to configure, uses
elegant templates, and above all: It’s a joy to use. Bolt is created using
modern Open Source libraries, and is best suited to build sites in HTML5, with
modern markup.</p>
<code>Bolt is a tool</code> for Content Management, which strives to be as simple and
straightforward as possible.

<ul>
<li>End users (read ‘editors’) that want to focus on producing and editing
content, and not on clicking buttons in the CMS.</li>
<li>Front-end designers and developers who like to write clean markup, and who
want to build websites where the CMS doesn’t dictate what the templates or
site should look like.</li>
<li>Developers who need a system that’s easy to set up and configure, that’s easy
to manage and maintain, but is also flexible and versatile.</li>
</ul>

<p>Using Bolt as a content editor: you don’t have to know anything about HTML, CSS,
PHP or any of the other technical stuff we used to build Bolt. Using Bolt should
be about writing and editing content, so that’s the focus of Bolt’s user
interface. Far more information about how Bolt works can be found in the <a href="http://manual.bolt.cm/">User
manual</a>.</p>

<p>Building a website with Bolt: we assume you have the usual Frontender skills.
You know HTML/CSS, and have working knowledge about JavaScript so you can
implement things like Google Analytics trackers, jQuery plugins and such. To
create a working site out of your static HTML, you’ll need to know about how
Bolt uses Content and Contenttypes, and how to make templates using Twig.
Information about those topics can be found in the chapters <a href="/content">Working with
Content and Content types</a> and <a href="/templates">Building templates</a>.</p>

<p>With creating Bolt we wanted to focus on creating something simple,
straightforward and enjoyable. If you need to build a site with ‘enterprise’
features, you’ll quickly find that there are better tools. If you need something
like this, you might look into Drupal or Expression Engine. If, however, you
need to build a site without a billion modules or huge datastructures, nothing
beats Bolt for ease of use.</p>

<textarea id="input"></textarea>

				<hr style="margin-top: 30px;">
 
			</div>

        </div>
 </div>
 <div class="footer clearfix"><div style="float:left; width:300px; text-align:left;">SI PA'DE v1 &nbsp;&nbsp;&nbsp;&nbsp; | Use updated Internet browser for best performer</div><div style="float:right; width:300px; text-align:right;">Copyright © 2014 All Right Reserved | Design by Ade A S  <br></div></div>
 <br>


<!-- Modal -->
<?php include "inc/ui_modal.php"; ?>
	
	
<script src="rakstrap/jquery-1.10.2.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script> 
<script src="rakstrap/js/pace.min.js"></script>
<script type="text/javascript" src="rakstrap/js/date_time.js"></script>
<script type="text/javascript">window.onload = date_time('date_time');</script>
<script type="text/javascript" src="rakstrap/js/tinyeditor.js"></script>
<script type="text/javascript">
new TINY.editor.edit('editor',{
	id:'input',
	width:570,
	height:130,
	cssclass:'te',
	controlclass:'tecontrol',
	rowclass:'teheader',
	dividerclass:'tedivider',
	controls:['bold','italic','underline','strikethrough','|','subscript','superscript','|',
			  'orderedlist','unorderedlist','|','outdent','indent','|','leftalign',
			  'centeralign','rightalign','|','unformat','|','undo','redo','n',
			  'image','hr','link','unlink','|'],
	footer:true,
	xhtml:true,
	cssfile:'editor.css',
	bodyid:'editor',
	footerclass:'tefooter',
	toggle:{text:'source',activetext:'wysiwyg',cssclass:'toggle'},
	resize:{cssclass:'resize'}
});
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
	    $(document).ready(function() {
        // if text input field value is not empty show the "X" button
        $(".field").keyup(function() {
            $(".x").fadeIn();
            if ($.trim($(".field").val()) == "") {
                $(".x").fadeOut();
            }
        });
        // on click of "X", delete input field value and hide "X"
        $(".x").click(function() {
            $(".field").val("");
            $(this).hide();
        });
    });
$(document).ready(function(){ 	
 $("#getjmljph").click(function(){

       var $val = $("#jmljph").val();
           location.href="data-" + $val + "<?php echo"$T@1@";if(!isset($_GET['by']) | $_GET['by']=='0'){echo "0";} else {echo $_GET['by'];} echo $QUERY; ?>";

    });
 $("#getloncathal").click(function(){

       var $valhal = $("#loncathal").val(); 
           location.href="<?php echo"data-";if(!isset($_GET['jph']) | $_GET['jph']=='0'){echo "20";} else {echo $_GET['jph'];} echo "$T@";?>" + $valhal + "@<?php if(!isset($_GET['by']) | $_GET['by']=='0'){echo "0";} else {echo $_GET['by'];} echo $QUERY; ?>";

    });

});
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
          
</body></html>
  <?php 
} 
}
?>