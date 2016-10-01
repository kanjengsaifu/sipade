MIME-Version: 1.0
X-Document-Type: Workbook
Content-Type: multipart/related; boundary="----=_NextPart_01D1BB37.BA791D70"

This document is a Single File Web Page, also known as a Web Archive file.  If you are seeing this message, your browser or editor doesn't support Web Archive files.  Please download a browser that supports Web Archive, such as Windows® Internet Explorer®.

------=_NextPart_01D1BB37.BA791D70
Content-Location: file:///C:/B133D8F3/TES.htm
Content-Transfer-Encoding: quoted-printable
Content-Type: text/html; charset="us-ascii"
<?php

		function changeCell($jmlkolom,$text,$attr1,$attr2,$attr3){
			$nm = "$text";
			$count = mb_strlen($nm);
			$nm = (string)$nm; // convert into a string
			$arr = str_split($nm, "1"); // break string in 3 character sets
			$ino=1;
			foreach ($arr as $hrf) {   
				if ($ino<2){
				$hrf=ucwords(strtolower($hrf));  
				$echo.= "<td".$attr1.">".$hrf."</td>";
				}
				else {
				$echo.="<td".$attr2.">".$hrf."</td>";
				}
				$ino++;		
				} 

			if ($count< $jmlkolom){
			$jml = $jmlkolom-$count;
			}
			for ($i=1; $i<=$jml; $i++){
			$echo.= "<td".$attr3.">&nbsp;</td>";		 
			}
		return $echo; 
		}
		
		
		
?>

<?php 
$hdkpen = mysql_num_rows(mysql_query("SELECT * FROM penduduk where no_kk_pen='$_GET[no_kk]' AND status_hdk_pen='1'"));
	
if ($hdkpen=="1"){ //ada satu pen yang berstatus kep. kk
	
$kepalakeluarga=mysql_query("SELECT * FROM  penduduk,arsip_alamat,arsip_rw 
							where arsip_alamat.id_alamat=penduduk.alamat_pen
							AND arsip_rw.id_rw=penduduk.rw_pen
							AND status_hdk_pen='1'
							AND no_kk_pen='$_GET[no_kk]'");
$k=mysql_fetch_array($kepalakeluarga);

 $nokk = $k['no_kk_pen'];
 $namakk = ubah_huruf_ke_besar($k['nama_pen']);
 $alamatkk = ubah_huruf_ke_besar($k['alamat']);
 $alamatrtkk = "0".$k['rt_pen'];
 $alamatrwkk = "0".$k['rw'];
 $detectRT=mysql_query("SELECT * FROM  penduduk,arsip_rt 
							where arsip_rt.id_rw=penduduk.rw_pen
							AND arsip_rt.rt=penduduk.rt_pen
							AND status_hdk_pen='1'
							AND no_kk_pen='$_GET[no_kk]'");
$rt=mysql_fetch_array($detectRT);
$nama_rt = $rt['nama_ketua_rt'];
							
 $alamatrwkk = $alamatrwkk;
 $alamatdesakk = ubah_huruf_ke_besar($k['desa']);
 $alamatkeckk = ubah_huruf_ke_besar($k['kecamatan']);
 $alamatkabkk = ubah_huruf_ke_besar($k['kabupaten_kota']);
 $alamatprovkk = ubah_huruf_ke_besar($k['provinsi']); 
 $alamatdesakk2 = "Desa ".$k['desa'];
 $alamatkeckk2 =  "Camat ".$k['kecamatan'];
 $alamatkabkk2 =  "Kabupaten ".$k['kabupaten_kota'];
 $alamatkodedesakk = $RULEKODEDESA;
 $alamatkodeprovkk = $RULEKODEPROV;
 $alamatkodekabkk = $RULEKODEKAB;
 $alamatkodekeckk = $RULEKODEKEC;
 $alamatkodeposkk = $k['kode_pos'];
 $kepalakeluarga = "1"; //ada kepala keluarga 
 }
elseif ($hdkpen > 1){ //ada lebih dari satu pen yang berstatus kep. kk
	
$kepalakeluarga=mysql_query("SELECT * FROM  penduduk,arsip_alamat,arsip_rt,arsip_rw 
							where arsip_alamat.id_alamat=penduduk.alamat_pen
							AND arsip_rt.id_rt=penduduk.rt_pen
							AND arsip_rw.id_rw=penduduk.rw_pen
							AND status_hdk_pen='1'
							AND no_kk_pen='$_GET[no_kk]'");
$k=mysql_fetch_array($kepalakeluarga);

 $nokk = $k['no_kk_pen'];
 $namakk = ubah_huruf_ke_besar($k['nama_pen']);
 $alamatkk = ubah_huruf_ke_besar($k['alamat']);
 $alamatrtkk = "0".$k['rt_pen']; 
 $alamatrwkk = "0".$k['rw'];
 $detectRT=mysql_query("SELECT * FROM  penduduk,arsip_rt 
							where arsip_rt.id_rw=penduduk.rw_pen
							AND arsip_rt.rt=penduduk.rt_pen
							AND status_hdk_pen='1'
							AND no_kk_pen='$_GET[no_kk]'");
$rt=mysql_fetch_array($detectRT);
$nama_rt = $rt['nama_ketua_rt'];
 $alamatdesakk = ubah_huruf_ke_besar($k['desa']);
 $alamatkeckk = ubah_huruf_ke_besar($k['kecamatan']);
 $alamatkabkk = ubah_huruf_ke_besar($k['kabupaten_kota']);
 $alamatprovkk = ubah_huruf_ke_besar($k['provinsi']);
 $alamatdesakk2 = "Desa ".$k['desa'];
 $alamatkeckk2 =  "Camat ".$k['kecamatan'];
 $alamatkabkk2 =  "Kabupaten ".$k['kabupaten_kota'];
 $alamatkodedesakk = $RULEKODEDESA;
 $alamatkodeprovkk = $RULEKODEPROV;
 $alamatkodekabkk = $RULEKODEKAB;
 $alamatkodekeckk = $RULEKODEKEC;
 $alamatkodeposkk = $k['kode_pos'];
 $kepalakeluarga = "2"; //ada banyak kepala keluarga 
 }
else {
$querycekk=mysql_query("SELECT * FROM kk,arsip_alamat,arsip_rw  WHERE arsip_alamat.id_alamat=kk.alamat
							AND arsip_rw.id_rw=kk.rw
							AND no_kk='$_GET[no_kk]'");
$k=mysql_fetch_array($querycekk);
$rule=mysql_query("SELECT * FROM pengaturan WHERE id='2'");
$rule=mysql_fetch_array($rule);

 $nokk = $k['no_kk'];
 $namakk = "<span style='background:#df5;'>".ubah_huruf_ke_besar($k['catatan'])."</span>";
 $alamatkk = ubah_huruf_ke_besar($k['alamat']);
 $alamatrtkk = "0".$k['rt']; 
 $alamatrwkk = "0".$k['rw'];
 $detectRT=mysql_query("SELECT * FROM  kk,arsip_rt 
							where arsip_rt.id_rw=kk.rw
							AND arsip_rt.rt=kk.rt
							AND no_kk='$_GET[no_kk]'");
$rt=mysql_fetch_array($detectRT);
$nama_rt = $rt['nama_ketua_rt'];
 $alamatdesakk = ubah_huruf_ke_besar($rule['desa']);
 $alamatkeckk = ubah_huruf_ke_besar($rule['kecamatan']);
 $alamatkabkk = ubah_huruf_ke_besar($rule['kabupaten']);
 $alamatprovkk = ubah_huruf_ke_besar($rule['provinsi']);
 $alamatdesakk2 = "Desa ".$rule['desa'];
 $alamatkeckk2 =  "Camat ".$rule['kecamatan'];
 $alamatkabkk2 =  "Kabupaten ".$rule['kabupaten_kota'];
 $alamatkodedesakk = $RULEKODEDESA;
 $alamatkodeprovkk = $RULEKODEPROV;
 $alamatkodekabkk = $RULEKODEKAB;
 $alamatkodekeckk = $RULEKODEKEC;
 $alamatkodeposkk = $k['kode_pos'];
 $kepalakeluarga = "0"; //tidak ada kepala keluarga
 }
   
?>

<html xmlns:v=3D"urn:schemas-microsoft-com:vml"
xmlns:o=3D"urn:schemas-microsoft-com:office:office"
xmlns:x=3D"urn:schemas-microsoft-com:office:excel"
xmlns=3D"http://www.w3.org/TR/REC-html40">

<head>
<meta name=3D"Excel Workbook Frameset">
<meta http-equiv=3DContent-Type content=3D"text/html; charset=3Dus-ascii">
<meta name=3DProgId content=3DExcel.Sheet>
<meta name=3DGenerator content=3D"Microsoft Excel 15">
<link rel=3DFile-List href=3D"TES_files/filelist.xml">
<![if !supportTabStrip]>
<link id=3D"shLink" href=3D"TES_files/sheet001.htm">

<link id=3D"shLink">

<script language=3D"JavaScript">
<!--
 var c_lTabs=3D1;

 var c_rgszSh=3Dnew Array(c_lTabs);
 c_rgszSh[0] =3D "Form KK";



 var c_rgszClr=3Dnew Array(8);
 c_rgszClr[0]=3D"window";
 c_rgszClr[1]=3D"buttonface";
 c_rgszClr[2]=3D"windowframe";
 c_rgszClr[3]=3D"windowtext";
 c_rgszClr[4]=3D"threedlightshadow";
 c_rgszClr[5]=3D"threedhighlight";
 c_rgszClr[6]=3D"threeddarkshadow";
 c_rgszClr[7]=3D"threedshadow";

 var g_iShCur;
 var g_rglTabX=3Dnew Array(c_lTabs);

function fnGetIEVer()
{
 var ua=3Dwindow.navigator.userAgent
 var msie=3Dua.indexOf("MSIE")
 if (msie>0 && window.navigator.platform=3D=3D"Win32")
  return parseInt(ua.substring(msie+5,ua.indexOf(".", msie)));
 else
  return 0;
}

function fnBuildFrameset()
{
 var szHTML=3D"<frameset rows=3D\"*,18\" border=3D0 width=3D0 frameborder=
=3Dno framespacing=3D0>"+
  "<frame src=3D\""+document.all.item("shLink")[0].href+"\" name=3D\"frShee=
t\" noresize>"+
  "<frameset cols=3D\"54,*\" border=3D0 width=3D0 frameborder=3Dno framespa=
cing=3D0>"+
  "<frame src=3D\"\" name=3D\"frScroll\" marginwidth=3D0 marginheight=3D0 s=
crolling=3Dno>"+
  "<frame src=3D\"\" name=3D\"frTabs\" marginwidth=3D0 marginheight=3D0 scr=
olling=3Dno>"+
  "</frameset></frameset><plaintext>";

 with (document) {
  open("text/html","replace");
  write(szHTML);
  close();
 }

 fnBuildTabStrip();
}

function fnBuildTabStrip()
{
 var szHTML=3D
  "<html><head><style>.clScroll {font:8pt Courier New;color:"+c_rgszClr[6]+=
";cursor:default;line-height:10pt;}"+
  ".clScroll2 {font:10pt Arial;color:"+c_rgszClr[6]+";cursor:default;line-h=
eight:11pt;}</style></head>"+
  "<body onclick=3D\"event.returnValue=3Dfalse;\" ondragstart=3D\"event.ret=
urnValue=3Dfalse;\" onselectstart=3D\"event.returnValue=3Dfalse;\" bgcolor=
=3D"+c_rgszClr[4]+" topmargin=3D0 leftmargin=3D0><table cellpadding=3D0 cel=
lspacing=3D0 width=3D100%>"+
  "<tr><td colspan=3D6 height=3D1 bgcolor=3D"+c_rgszClr[2]+"></td></tr>"+
  "<tr><td style=3D\"font:1pt\">&nbsp;<td>"+
  "<td valign=3Dtop id=3DtdScroll class=3D\"clScroll\" onclick=3D\"parent.f=
nFastScrollTabs(0);\" onmouseover=3D\"parent.fnMouseOverScroll(0);\" onmous=
eout=3D\"parent.fnMouseOutScroll(0);\"><a>&#171;</a></td>"+
  "<td valign=3Dtop id=3DtdScroll class=3D\"clScroll2\" onclick=3D\"parent.=
fnScrollTabs(0);\" ondblclick=3D\"parent.fnScrollTabs(0);\" onmouseover=3D\=
"parent.fnMouseOverScroll(1);\" onmouseout=3D\"parent.fnMouseOutScroll(1);\=
"><a>&lt</a></td>"+
  "<td valign=3Dtop id=3DtdScroll class=3D\"clScroll2\" onclick=3D\"parent.=
fnScrollTabs(1);\" ondblclick=3D\"parent.fnScrollTabs(1);\" onmouseover=3D\=
"parent.fnMouseOverScroll(2);\" onmouseout=3D\"parent.fnMouseOutScroll(2);\=
"><a>&gt</a></td>"+
  "<td valign=3Dtop id=3DtdScroll class=3D\"clScroll\" onclick=3D\"parent.f=
nFastScrollTabs(1);\" onmouseover=3D\"parent.fnMouseOverScroll(3);\" onmous=
eout=3D\"parent.fnMouseOutScroll(3);\"><a>&#187;</a></td>"+
  "<td style=3D\"font:1pt\">&nbsp;<td></tr></table></body></html>";

 with (frames['frScroll'].document) {
  open("text/html","replace");
  write(szHTML);
  close();
 }

 szHTML =3D
  "<html><head>"+
  "<style>A:link,A:visited,A:active {text-decoration:none;"+"color:"+c_rgsz=
Clr[3]+";}"+
  ".clTab {cursor:hand;background:"+c_rgszClr[1]+";font:9pt Arial;padding-l=
eft:3px;padding-right:3px;text-align:center;}"+
  ".clBorder {background:"+c_rgszClr[2]+";font:1pt;}"+
  "</style></head><body onload=3D\"parent.fnInit();\" onselectstart=3D\"eve=
nt.returnValue=3Dfalse;\" ondragstart=3D\"event.returnValue=3Dfalse;\" bgco=
lor=3D"+c_rgszClr[4]+
  " topmargin=3D0 leftmargin=3D0><table id=3DtbTabs cellpadding=3D0 cellspa=
cing=3D0>";

 var iCellCount=3D(c_lTabs+1)*2;

 var i;
 for (i=3D0;i<iCellCount;i+=3D2)
  szHTML+=3D"<col width=3D1><col>";

 var iRow;
 for (iRow=3D0;iRow<6;iRow++) {

  szHTML+=3D"<tr>";

  if (iRow=3D=3D5)
   szHTML+=3D"<td colspan=3D"+iCellCount+"></td>";
  else {
   if (iRow=3D=3D0) {
    for(i=3D0;i<iCellCount;i++)
     szHTML+=3D"<td height=3D1 class=3D\"clBorder\"></td>";
   } else if (iRow=3D=3D1) {
    for(i=3D0;i<c_lTabs;i++) {
     szHTML+=3D"<td height=3D1 nowrap class=3D\"clBorder\">&nbsp;</td>";
     szHTML+=3D
      "<td id=3DtdTab height=3D1 nowrap class=3D\"clTab\" onmouseover=3D\"p=
arent.fnMouseOverTab("+i+");\" onmouseout=3D\"parent.fnMouseOutTab("+i+");\=
">"+
      "<a href=3D\""+document.all.item("shLink")[i].href+"\" target=3D\"frS=
heet\" id=3DaTab>&nbsp;"+c_rgszSh[i]+"&nbsp;</a></td>";
    }
    szHTML+=3D"<td id=3DtdTab height=3D1 nowrap class=3D\"clBorder\"><a id=
=3DaTab>&nbsp;</a></td><td width=3D100%></td>";
   } else if (iRow=3D=3D2) {
    for (i=3D0;i<c_lTabs;i++)
     szHTML+=3D"<td height=3D1></td><td height=3D1 class=3D\"clBorder\"></t=
d>";
    szHTML+=3D"<td height=3D1></td><td height=3D1></td>";
   } else if (iRow=3D=3D3) {
    for (i=3D0;i<iCellCount;i++)
     szHTML+=3D"<td height=3D1></td>";
   } else if (iRow=3D=3D4) {
    for (i=3D0;i<c_lTabs;i++)
     szHTML+=3D"<td height=3D1 width=3D1></td><td height=3D1></td>";
    szHTML+=3D"<td height=3D1 width=3D1></td><td></td>";
   }
  }
  szHTML+=3D"</tr>";
 }

 szHTML+=3D"</table></body></html>";
 with (frames['frTabs'].document) {
  open("text/html","replace");
  charset=3Ddocument.charset;
  write(szHTML);
  close();
 }
}

function fnInit()
{
 g_rglTabX[0]=3D0;
 var i;
 for (i=3D1;i<=3Dc_lTabs;i++)
  with (frames['frTabs'].document.all.tbTabs.rows[1].cells[fnTabToCol(i-1)])
   g_rglTabX[i]=3DoffsetLeft+offsetWidth-6;
}

function fnTabToCol(iTab)
{
 return 2*iTab+1;
}

function fnNextTab(fDir)
{
 var iNextTab=3D-1;
 var i;

 with (frames['frTabs'].document.body) {
  if (fDir=3D=3D0) {
   if (scrollLeft>0) {
    for (i=3D0;i<c_lTabs&&g_rglTabX[i]<scrollLeft;i++);
    if (i<c_lTabs)
     iNextTab=3Di-1;
   }
  } else {
   if (g_rglTabX[c_lTabs]+6>offsetWidth+scrollLeft) {
    for (i=3D0;i<c_lTabs&&g_rglTabX[i]<=3DscrollLeft;i++);
    if (i<c_lTabs)
     iNextTab=3Di;
   }
  }
 }
 return iNextTab;
}

function fnScrollTabs(fDir)
{
 var iNextTab=3DfnNextTab(fDir);

 if (iNextTab>=3D0) {
  frames['frTabs'].scroll(g_rglTabX[iNextTab],0);
  return true;
 } else
  return false;
}

function fnFastScrollTabs(fDir)
{
 if (c_lTabs>16)
  frames['frTabs'].scroll(g_rglTabX[fDir?c_lTabs-1:0],0);
 else
  if (fnScrollTabs(fDir)>0) window.setTimeout("fnFastScrollTabs("+fDir+");"=
,5);
}

function fnSetTabProps(iTab,fActive)
{
 var iCol=3DfnTabToCol(iTab);
 var i;

 if (iTab>=3D0) {
  with (frames['frTabs'].document.all) {
   with (tbTabs) {
    for (i=3D0;i<=3D4;i++) {
     with (rows[i]) {
      if (i=3D=3D0)
       cells[iCol].style.background=3Dc_rgszClr[fActive?0:2];
      else if (i>0 && i<4) {
       if (fActive) {
        cells[iCol-1].style.background=3Dc_rgszClr[2];
        cells[iCol].style.background=3Dc_rgszClr[0];
        cells[iCol+1].style.background=3Dc_rgszClr[2];
       } else {
        if (i=3D=3D1) {
         cells[iCol-1].style.background=3Dc_rgszClr[2];
         cells[iCol].style.background=3Dc_rgszClr[1];
         cells[iCol+1].style.background=3Dc_rgszClr[2];
        } else {
         cells[iCol-1].style.background=3Dc_rgszClr[4];
         cells[iCol].style.background=3Dc_rgszClr[(i=3D=3D2)?2:4];
         cells[iCol+1].style.background=3Dc_rgszClr[4];
        }
       }
      } else
       cells[iCol].style.background=3Dc_rgszClr[fActive?2:4];
     }
    }
   }
   with (aTab[iTab].style) {
    cursor=3D(fActive?"default":"hand");
    color=3Dc_rgszClr[3];
   }
  }
 }
}

function fnMouseOverScroll(iCtl)
{
 frames['frScroll'].document.all.tdScroll[iCtl].style.color=3Dc_rgszClr[7];
}

function fnMouseOutScroll(iCtl)
{
 frames['frScroll'].document.all.tdScroll[iCtl].style.color=3Dc_rgszClr[6];
}

function fnMouseOverTab(iTab)
{
 if (iTab!=3Dg_iShCur) {
  var iCol=3DfnTabToCol(iTab);
  with (frames['frTabs'].document.all) {
   tdTab[iTab].style.background=3Dc_rgszClr[5];
  }
 }
}

function fnMouseOutTab(iTab)
{
 if (iTab>=3D0) {
  var elFrom=3Dframes['frTabs'].event.srcElement;
  var elTo=3Dframes['frTabs'].event.toElement;

  if ((!elTo) ||
   (elFrom.tagName=3D=3DelTo.tagName) ||
   (elTo.tagName=3D=3D"A" && elTo.parentElement!=3DelFrom) ||
   (elFrom.tagName=3D=3D"A" && elFrom.parentElement!=3DelTo)) {

   if (iTab!=3Dg_iShCur) {
    with (frames['frTabs'].document.all) {
     tdTab[iTab].style.background=3Dc_rgszClr[1];
    }
   }
  }
 }
}

function fnSetActiveSheet(iSh)
{
 if (iSh!=3Dg_iShCur) {
  fnSetTabProps(g_iShCur,false);
  fnSetTabProps(iSh,true);
  g_iShCur=3DiSh;
 }
}

 window.g_iIEVer=3DfnGetIEVer();
 if (window.g_iIEVer>=3D4)
  fnBuildFrameset();
//-->
</script>
<![endif]><!--[if gte mso 9]><xml>
 <x:ExcelWorkbook>
  <x:ExcelWorksheets>
   <x:ExcelWorksheet>
    <x:Name>Form KK</x:Name>
    <x:WorksheetSource HRef=3D"TES_files/sheet001.htm"/>
   </x:ExcelWorksheet>
  </x:ExcelWorksheets>
  <x:Stylesheet HRef=3D"TES_files/stylesheet.css"/>
  <x:WindowHeight>7530</x:WindowHeight>
  <x:WindowWidth>20490</x:WindowWidth>
  <x:WindowTopX>0</x:WindowTopX>
  <x:WindowTopY>360</x:WindowTopY>
  <x:ProtectStructure>False</x:ProtectStructure>
  <x:ProtectWindows>False</x:ProtectWindows>
 </x:ExcelWorkbook>
</xml><![endif]-->
</head>

<frameset rows=3D"*,39" border=3D0 width=3D0 frameborder=3Dno framespacing=
=3D0>
 <frame src=3D"TES_files/sheet001.htm" name=3D"frSheet">
 <frame src=3D"TES_files/tabstrip.htm" name=3D"frTabs" marginwidth=3D0 marg=
inheight=3D0>
 <noframes>
  <body>
   <p>This page uses frames, but your browser doesn't support them.</p>
  </body>
 </noframes>
</frameset>
</html>

------=_NextPart_01D1BB37.BA791D70
Content-Location: file:///C:/B133D8F3/TES_files/stylesheet.css
Content-Transfer-Encoding: quoted-printable
Content-Type: text/css; charset="us-ascii"

 

------=_NextPart_01D1BB37.BA791D70
Content-Location: file:///C:/B133D8F3/TES_files/sheet001.htm
Content-Transfer-Encoding: quoted-printable
Content-Type: text/html; charset="us-ascii"

<html xmlns:v=3D"urn:schemas-microsoft-com:vml"
xmlns:o=3D"urn:schemas-microsoft-com:office:office"
xmlns:x=3D"urn:schemas-microsoft-com:office:excel"
xmlns=3D"http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=3DContent-Type content=3D"text/html; charset=3Dus-ascii">
<meta name=3DProgId content=3DExcel.Sheet>
<meta name=3DGenerator content=3D"Microsoft Excel 15">
<link id=3DMain-File rel=3DMain-File href=3D"../TES.htm">
<link rel=3DFile-List href=3Dfilelist.xml>
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
x\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]--><![if IE]> 
<![endif]>
<link rel=3DStylesheet href=3Dstylesheet.css>
<style id=3D"89formulir-biodata-wni-per-keluarga-f1-01-terbaru_12278_Styles=
">

<!--table
	{mso-displayed-decimal-separator:"\,";
	mso-displayed-thousand-separator:"\.";}
	td {text-align:center;vertical-align:middle;}
.xl1512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
	
.xl70
	{mso-style-parent:style0;
	color:windowtext;
	font-size:14.0pt;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;}
.xl71
	{mso-style-parent:style0;
	color:windowtext;
	font-size:26.0pt;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;}
.xl7112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
	
.xl76
	{mso-style-parent:style0;
	color:windowtext;
	font-size:20.0pt;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	white-space:normal;}
	white-space:normal;}
.xl7612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl8212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:2.0pt double windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	background:silver;
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl8712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:12.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	background:silver;
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl9012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:underline;
	text-underline-style:single;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:20.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl9512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl9612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl9712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border:.5pt solid windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl9812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:.5pt solid windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:.5pt solid windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl10912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl11012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl11112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl11212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl11312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl11512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl11612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl11712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl11912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:2.0pt double windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl12912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:.5pt solid windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:2.0pt double windowtext;
	background:silver;
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl13212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl13512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl13612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:2.0pt double windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl13712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:2.0pt double windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl13912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl14012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl14112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl14212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl14312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:2.0pt double windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl14412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:2.0pt double windowtext;
	border-bottom:none;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl14512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:2.0pt double windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl14612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl14712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	
	border-top:2.0pt double windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl14812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:.5pt solid windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl14912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl15012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl15112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:2.0pt double windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl15212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:2.0pt double windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	background:silver;
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl15312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:2.0pt double windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl15412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:8.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl15512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl15612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl15712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl15812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:2.0pt double windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl15912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:none;
	border-left:2.0pt double windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl16012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:2.0pt double windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl16112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:2.0pt double windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl16212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:2.0pt double windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:none;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl16312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:.5pt solid windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl16412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl16512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl16612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl16712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl16812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl16912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl17012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl17112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:2.0pt double windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl17212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl17312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl17412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl17512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl17612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl17712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl17812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:2.0pt double windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl17912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl18012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:2.0pt double windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl18112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl18212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl18312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl18412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl18512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl18612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:2.0pt double windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl18712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl18812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl18912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:2.0pt double windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl19012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl19112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl19212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl19312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl19412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl19512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:none;
	border-left:2.0pt double windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl19612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}

.xl19712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:top;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl19812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl19912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl20012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl20112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl20212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl20312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl20412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl20512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl20612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl20712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl20812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl20912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl21012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl21112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl21212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	background:silver;
	mso-pattern:#1E1E1E none;
	white-space:normal;}
.xl21312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	background:silver;
	mso-pattern:#1E1E1E none;
	white-space:normal;}
.xl21412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl21512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl21612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:2.0pt double windowtext;
	background:silver;
	mso-pattern:#1E1E1E none;
	white-space:normal;}
.xl21712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	background:silver;
	mso-pattern:#1E1E1E none;
	white-space:normal;}
.xl21812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	background:silver;
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl21912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	background:silver;
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl22012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:2.0pt double windowtext;
	background:silver;
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl22112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	background:silver;
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl22212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	background:silver;
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl22312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl22412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl22512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl22612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl22712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl22812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl22912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl23012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl23112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl23212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl23312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl23412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl23512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl23612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl23712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl23812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl23912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl24012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:none;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl24112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl24212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl24312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl24412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl24512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:none;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl24612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	background:silver;
	mso-pattern:#1E1E1E none;
	white-space:normal;}
.xl24712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl24812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl24912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl25012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl25112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:none;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl25212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl25312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:7.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl25412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:7.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl25512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl25612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl25712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl25812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl25912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl26012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl26112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:2.0pt double windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl26212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:2.0pt double windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl26312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:2.0pt double windowtext;
	background:silver;
	mso-pattern:#1E1E1E none;
	white-space:normal;}
.xl26412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl26512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl26612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl26712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl26812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:none;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl26912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl27012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl27112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl27212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl27312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl27412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:7.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl27512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:7.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl27612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl27712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl27812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	border-top:none;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl27912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:2.0pt double windowtext;
	background:silver;
	mso-pattern:#1E1E1E none;
	white-space:normal;}
.xl28012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	background:silver;
	mso-pattern:#1E1E1E none;
	white-space:normal;}
.xl28112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl28212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl28312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl28412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl28512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:2.0pt double windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl28612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:none;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl28712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
	.xl29512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:22.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl28812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:2.0pt double windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl28912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:2.0pt double windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl29012278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl29112278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:2.0pt double windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl29212278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:24.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl29312278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:24.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl29412278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:24.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	
	mso-pattern:#1E1E1E none;
	white-space:nowrap;}
.xl29512278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:22.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl29612278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl29712278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl29812278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl29912278
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
	.code {font-size:18.0pt;font-family:"Wingdings 2", serif;}
	td.code {vertical-align:middle;}
-->
</style>
<![if !supportTabStrip]><script language=3D"JavaScript">
<!--
function fnUpdateTabs()
 {
  if (parent.window.g_iIEVer>=3D4) {
   if (parent.document.readyState=3D=3D"complete"
    && parent.frames['frTabs'].document.readyState=3D=3D"complete")
   parent.fnSetActiveSheet(0);
  else
   window.setTimeout("fnUpdateTabs();",150);
 }
}

if (window.name!=3D"frSheet")
 window.location.replace("../TES.htm");
else
 fnUpdateTabs();
//-->
</script>
<![endif]>
</head>

<body link=3D"#0563C1" vlink=3D"#954F72">
<!--The following information was generated by Microsoft Excel's Publish as=
 Web
Page wizard.--><!--If the same item is republished from Excel, all informat=
ion between the DIV
tags will be replaced.--><!-----------------------------><!--START OF OUTPU=
T FROM EXCEL PUBLISH AS WEB PAGE WIZARD --><!----------------------------->

<table border=3D0 cellpadding=3D0 cellspacing=3D0 width=3D2233 style=3D'bor=
der-collapse:
 collapse;table-layout:fixed;width:1703pt'>
 <col width=3D0 style=3D'display:none;mso-width-source:userset;mso-width-al=
t:0'>
 <col width=3D26 style=3D'mso-width-source:userset;mso-width-alt:950;width:=
20pt'>
 <col width=3D18 style=3D'mso-width-source:userset;mso-width-alt:658;width:=
14pt'>
 <col width=3D20 span=3D3 style=3D'mso-width-source:userset;mso-width-alt:7=
31;
 width:15pt'>
 <col width=3D17 span=3D2 style=3D'mso-width-source:userset;mso-width-alt:6=
21;
 width:13pt'>
 <col width=3D27 style=3D'mso-width-source:userset;mso-width-alt:987;width:=
20pt'>
 <col width=3D17 span=3D25 style=3D'mso-width-source:userset;mso-width-alt:=
621;
 width:13pt'>
 <col width=3D20 style=3D'mso-width-source:userset;mso-width-alt:731;width:=
15pt'>
 <col width=3D17 span=3D3 style=3D'mso-width-source:userset;mso-width-alt:6=
21;
 width:13pt'>
 <col width=3D20 style=3D'mso-width-source:userset;mso-width-alt:731;width:=
15pt'>
 <col width=3D17 span=3D2 style=3D'mso-width-source:userset;mso-width-alt:6=
21;
 width:13pt'>
 <col width=3D22 style=3D'mso-width-source:userset;mso-width-alt:804;width:=
17pt'>
 <col width=3D17 span=3D2 style=3D'mso-width-source:userset;mso-width-alt:6=
21;
 width:13pt'>
 <col width=3D22 style=3D'mso-width-source:userset;mso-width-alt:804;width:=
17pt'>
 <col width=3D17 span=3D20 style=3D'mso-width-source:userset;mso-width-alt:=
621;
 width:13pt'>
 <col width=3D22 style=3D'mso-width-source:userset;mso-width-alt:804;width:=
17pt'>
 <col width=3D21 style=3D'mso-width-source:userset;mso-width-alt:768;width:=
16pt'>
 <col width=3D17 span=3D9 style=3D'mso-width-source:userset;mso-width-alt:6=
21;
 width:13pt'>
 <col width=3D19 span=3D2 style=3D'mso-width-source:userset;mso-width-alt:6=
94;
 width:14pt'>
 <col width=3D20 style=3D'mso-width-source:userset;mso-width-alt:731;width:=
15pt'>
 <col width=3D17 span=3D10 style=3D'mso-width-source:userset;mso-width-alt:=
621;
 width:13pt'>
 <col width=3D20 style=3D'mso-width-source:userset;mso-width-alt:731;width:=
15pt'>
 <col width=3D17 span=3D9 style=3D'mso-width-source:userset;mso-width-alt:6=
21;
 width:13pt'>
 <col width=3D20 style=3D'mso-width-source:userset;mso-width-alt:731;width:=
15pt'>
 <col width=3D17 span=3D9 style=3D'mso-width-source:userset;mso-width-alt:6=
21;
 width:13pt'>
 <col width=3D20 style=3D'mso-width-source:userset;mso-width-alt:731;width:=
15pt'>
 <col width=3D17 span=3D12 style=3D'mso-width-source:userset;mso-width-alt:=
621;
 width:13pt'>
 <col width=3D22 style=3D'mso-width-source:userset;mso-width-alt:804;width:=
17pt'>
 <col width=3D20 style=3D'mso-width-source:userset;mso-width-alt:731;width:=
15pt'>
 <col width=3D64 style=3D'width:48pt'>
 <tr height=3D37 style=3D'mso-height-source:userset;height:27.75pt'>
  <td height=3D37 class=3Dxl65 width=3D0 style=3D'height:27.75pt'></td>
  <td class=3Dxl65 width=3D26 style=3D'width:20pt'></td>
  <td class=3Dxl65 width=3D18 style=3D'width:14pt'></td>
  <td class=3Dxl65 width=3D20 style=3D'width:15pt'></td>
  <td class=3Dxl65 width=3D20 style=3D'width:15pt'></td>
  <td class=3Dxl65 width=3D20 style=3D'width:15pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D27 style=3D'width:20pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt' align=3Dleft valign=3Dtop><!--[if gte=
 vml 1]><v:shapetype
   id=3D"_x0000_t75" coordsize=3D"21600,21600" o:spt=3D"75" o:preferrelativ=
e=3D"t"
   path=3D"m@4@5l@4@11@9@11@9@5xe" filled=3D"f" stroked=3D"f">
   <v:stroke joinstyle=3D"miter"/>
   <v:formulas>
    <v:f eqn=3D"if lineDrawn pixelLineWidth 0"/>
    <v:f eqn=3D"sum @0 1 0"/>
    <v:f eqn=3D"sum 0 0 @1"/>
    <v:f eqn=3D"prod @2 1 2"/>
    <v:f eqn=3D"prod @3 21600 pixelWidth"/>
    <v:f eqn=3D"prod @3 21600 pixelHeight"/>
    <v:f eqn=3D"sum @0 0 1"/>
    <v:f eqn=3D"prod @6 1 2"/>
    <v:f eqn=3D"prod @7 21600 pixelWidth"/>
    <v:f eqn=3D"sum @8 21600 0"/>
    <v:f eqn=3D"prod @7 21600 pixelHeight"/>
    <v:f eqn=3D"sum @10 21600 0"/>
   </v:formulas>
   <v:path o:extrusionok=3D"f" gradientshapeok=3D"t" o:connecttype=3D"rect"=
/>
   <o:lock v:ext=3D"edit" aspectratio=3D"t"/>
  </v:shapetype><v:shape id=3D"Picture_x0020_1" o:spid=3D"_x0000_s1028" typ=
e=3D"#_x0000_t75"
   style=3D'position:absolute;margin-left:6.75pt;margin-top:4.5pt;width:90.=
75pt;
   height:110.25pt;z-index:1;visibility:visible' o:gfxdata=3D"UEsDBBQABgAIA=
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
BQYAAAAABgAGAIUBAABbNAAAAAA=3D
">
   <v:imagedata src=3D"image001.png" o:title=3D""/>
   <o:lock v:ext=3D"edit" aspectratio=3D"f"/>
   <x:ClientData ObjectType=3D"Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style=3D'mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:9px;margin-top:6px;width:121px;
  height:147px'><img width=3D121 height=3D147 src=3Dimage002.gif v:shapes=
=3D"Picture_x0020_1"></span><![endif]><span
  style=3D'mso-ignore:vglayout2'>
  <table cellpadding=3D0 cellspacing=3D0>
   <tr>
    <td height=3D37 class=3Dxl65 width=3D17 style=3D'height:27.75pt;width:1=
3pt'></td>
   </tr>
  </table>
  </span></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D20 style=3D'width:15pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D20 style=3D'width:15pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td colspan=3D39 class=3Dxl29512278 width=3D689 style=3D'width:526pt'>PEMERINTA=
H KABUPATEN
  BOGOR</td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D20 style=3D'width:15pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D20 style=3D'width:15pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D20 style=3D'width:15pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl65 width=3D22 style=3D'width:17pt'></td>
  <td class=3Dxl65 width=3D20 style=3D'width:15pt'></td>
 </tr>
 <tr height=3D33 style=3D'mso-height-source:userset;height:24.75pt'>
  <td height=3D33 class=3Dxl65 style=3D'height:24.75pt'></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td colspan=3D106 class=3Dxl71 style=3D'border-right:.5pt solid black'>DI=
NAS
  KEPENDUDUKAN DAN PENCATATAN SIPIL</td>
  <td colspan=3D7 class=3Dxl74 style=3D'border-right:.5pt solid black;borde=
r-left:
  none'>F-1.01</td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
 </tr>
 <tr class=3Dxl66 height=3D83 style=3D'mso-height-source:userset;height:62.=
25pt'>
  <td height=3D83 class=3Dxl67 style=3D'height:62.25pt'></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl69 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl69 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl69 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl69 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl69 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl69 width=3D17 style=3D'width:13pt'></td>
  <td colspan=3D58 class=3D17 width=3D1021 style=3D'width:779pt'>JALAN BE=
RSIH
  KELURAHAN TENGAH KEC. CIBINONG TELP. (021) 87902288 CIBINONG 16914</td>
  <td class=3Dxl69 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl69 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl69 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl69 width=3D17 style=3D'width:13pt'></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl68></td>
  <td class=3Dxl67></td>
  <td class=3Dxl67></td>
 </tr>
 <tr class=3Dxl66 height=3D33 style=3D'mso-height-source:userset;height:24.=
95pt'>
  <td height=3D33 class=3Dxl67 style=3D'height:24.95pt'></td>
  <td colspan=3D121 class=3Dxl70>FORMULIR BIODATA PENDUDUK WARGA NEGARA
  INDONESIA<span style=3D'mso-spacerun:yes'>&nbsp;</span></td>
  <td class=3Dxl67></td>
  <td class=3Dxl67></td>
 </tr>
 <tr height=3D19 style=3D'mso-height-source:userset;height:14.25pt'>
  <td height=3D19 class=3Dxl65 style=3D'height:14.25pt'></td>
  <td colspan=3D47 class=3Dxl13112278>PERHATIAN : Isilah Formulir ini dengan hur=
uf cetak
  dan jelas serta mengikuti &quot;TATA CARA PENGISIAN FORMULIR&quot; pada
  halaman sebaliknya</td>
  <td class=3Dxl8612278>&nbsp;</td>
  <td class=3Dxl15212278>&nbsp;</td>
  <td class=3Dxl70></td>
  <td class=3Dxl70></td>
  <td class=3Dxl70></td>
  <td class=3Dxl70></td>
  <td class=3Dxl70></td>
  <td class=3Dxl70></td>
  <td class=3Dxl70></td>
  <td class=3Dxl70></td>
  <td class=3Dxl70></td>
  <td class=3Dxl70></td>
  <td class=3Dxl70></td>
  <td class=3Dxl70></td>
  <td class=3Dxl70></td>
  <td class=3Dxl70></td>
  <td class=3Dxl70></td>
  <td class=3Dxl70></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td colspan=3D7 class=3Dxl65>Diisi Oleh Petugas</td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl71></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl65></td>
  <td class=3Dxl70></td>
  <td class=3Dxl70></td>
  <td class=3Dxl70></td>
  <td></td>
 </tr>
 
 <tr height=3D28 style=3D'mso-height-source:userset;height:21.0pt'>
  <td height=3D28 class=3Dxl1512278 style=3D'height:21.0pt'></td>
  <td class=3Dxl8712278 colspan=3D11>DATA KEPALA KELUARGA</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278 colspan=3D8>Kode-Nama Propinsi</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278>:</td>
    <?php 
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("2", "$alamatkodeprovkk", " class=3Dxl8212278", " class=3Dxl8212278 style=3D'border-left:none'", " class=3Dxl8212278 style=3D'border-left:none'");
?> 
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278 style=3D'border-right:.5pt solid black'></td>
  <?php 
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("38", "$alamatprovkk", " class=3Dxl7212278", " class=3Dxl7212278", " class=3Dxl7212278");
?> 
  
  <td class=3Dxl7212278  style=3D'border-right:.5pt solid black'></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D6 style=3D'mso-height-source:userset;height:4.5pt'>
  <td height=3D6 class=3Dxl1512278 style=3D'height:4.5pt'></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D22 style=3D'mso-height-source:userset;height:16.5pt'>
  <td height=3D22 class=3Dxl1512278 style=3D'height:16.5pt'></td>
  <td class=3Dxl1512278 colspan=3D7>Nama Kepala Keluarga</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278>:</td> 
    <?php 
	 //changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
	 echo changeCell("55", "$namakk", " class=3Dxl8212278", " class=3Dxl8212278 style=3D'border-left:none'", " class=3Dxl8212278 style=3D'border-left:none'");
?> 
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278 colspan=3D10>Kode-Nama Kabupaten/Kota</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278>:</td>
    <?php 
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("2", "$alamatkodekabkk", " class=3Dxl8212278", " class=3Dxl8212278 style=3D'border-left:none'", " class=3Dxl8212278 style=3D'border-left:none'");
?> 
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278 style=3D'border-right:.5pt solid black'></td>
  <?php 
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("38", "$alamatkabkk", " class=3Dxl7212278", " class=3Dxl7212278", " class=3Dxl7212278");
?> 
  
  <td class=3Dxl7212278  style=3D'border-right:.5pt solid black'></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D6 style=3D'mso-height-source:userset;height:4.5pt'>
  <td height=3D6 class=3Dxl1512278 style=3D'height:4.5pt'></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D27 style=3D'mso-height-source:userset;height:20.25pt'>
  <td height=3D27 class=3Dxl1512278 style=3D'height:20.25pt'></td>
  <td class=3Dxl1512278 colspan=3D3>Alamat</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278 style=3D'border-right:.5pt solid black'>:</td>
   <?php 
	 //changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
	 echo changeCell("54", "$alamatkk", " class=3Dxl7212278", " class=3Dxl7212278", " class=3Dxl7212278");
?> 

  
  <td class=3Dxl7512278>&nbsp;</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278 colspan=3D11>Kode-Nama Kecamatan/Distrik</td>
  <td class=3Dxl1512278>:</td>
  
    <?php
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("2", "$alamatkodekeckk", " class=3Dxl8212278", " class=3Dxl8212278 style=3D'border-left:none'", " class=3Dxl8212278 style=3D'border-left:none'");
?> 
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278  style=3D'border-right:.5pt solid black'></td>
  <?php 
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("38", "$alamatkeckk", " class=3Dxl7212278", " class=3Dxl7212278", " class=3Dxl7212278");
?> 
  <td class=3Dxl7212278  style=3D'border-right:.5pt solid black'></td>
  
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D6 style=3D'mso-height-source:userset;height:4.5pt'>
  <td height=3D6 class=3Dxl1512278 style=3D'height:4.5pt'></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D30 style=3D'mso-height-source:userset;height:22.5pt'>
  <td height=3D30 class=3Dxl1512278 style=3D'height:22.5pt'></td>
  <td class=3Dxl1512278 colspan=3D3>Kode Pos</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278>:</td> 
  <?php 
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("6", "$alamatkodeposkk", " class=3Dxl8212278", " class=3Dxl8212278 style=3D'border-left:none'", " class=3Dxl8212278 style=3D'border-left:none'");
?> 
  
  
  <td colspan=3D2 class=3Dxl29612278 style=3D'border-right:.5pt solid black'>RT</td>
<?php 
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("3", "$alamatrtkk", " class=3Dxl8212278", " class=3Dxl8212278 style=3D'border-left:none'", " class=3Dxl8212278 style=3D'border-left:none'");
?> 
  
  <td class=3Dxl7012278 style=3D'border-left:none'>&nbsp;</td>
  <td colspan=3D2 class=3Dxl29612278 style=3D'border-right:.5pt solid black'>RW</td>
<?php 
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("3", "$alamatrwkk", " class=3Dxl8212278", " class=3Dxl8212278 style=3D'border-left:none'", " class=3Dxl8212278 style=3D'border-left:none'");
?> 
  
  <td colspan=3D9 class=3Dxl29812278 style=3D'border-right:.5pt solid black;
  border-left:none'>Jumlah Anggota Keluarga</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl1512278 colspan=3D2>orang</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl10412278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td colspan=3D11 class=3Dxl29912278 width=3D191 style=3D'width:145pt'>Kode-Nama
  Kelurahan/Desa/ Sebutan lain</td>
  <td class=3Dxl1512278>:</td>
  
    <?php 
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("4", "$alamatkodedesakk", " class=3Dxl8212278", " class=3Dxl8212278 style=3D'border-left:none'", " class=3Dxl8212278 style=3D'border-left:none'");
?> 
  <?php 
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("38", "$alamatdesakk", " class=3Dxl7212278", " class=3Dxl7212278", " class=3Dxl7212278");
?> 
  
  <td class=3Dxl7212278  style=3D'border-right:.5pt solid black'></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D6 style=3D'mso-height-source:userset;height:4.5pt'>
  <td height=3D6 class=3Dxl1512278 style=3D'height:4.5pt'></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D29 style=3D'mso-height-source:userset;height:21.75pt'>
  <td height=3D29 class=3Dxl1512278 style=3D'height:21.75pt'></td>
  <td class=3Dxl1512278 colspan=3D3>Telepon</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278>:</td>
  <td class=3Dxl7312278>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7012278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td colspan=3D11 class=3Dxl28212278 width=3D191 style=3D'width:145pt'>Nama
  Dusun/Dukuh/ Kampung/Sebutan lain</td>
  <td class=3Dxl1512278>:</td>
  <td class=3Dxl7412278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7512278>&nbsp;</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D5 style=3D'mso-height-source:userset;height:3.75pt'>
  <td height=3D5 class=3Dxl1512278 style=3D'height:3.75pt'></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D22 style=3D'height:16.5pt'>
  <td height=3D22 class=3Dxl1512278 style=3D'height:16.5pt'></td>
  <td class=3Dxl8712278 colspan=3D8>DATA KELUARGA</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D18 style=3D'mso-height-source:userset;height:13.5pt'>
  <td height=3D18 class=3Dxl1512278 style=3D'height:13.5pt'></td>
  <td rowspan=3D2 class=3Dxl24912278 width=3D26 style=3D'border-left:2.0pt double black;border-bottom:2.0pt double black;
  width:20pt'>No</td>
  <td colspan=3D60 rowspan=3D2 class=3Dxl24012278 width=3D1056 style=3D'bor=
der-right:
  2.0pt double black;width:806pt'>Nama Lengkap</td>
  <td colspan=3D3 rowspan=3D2 class=3Dxl24012278 width=3D51 style=3D'border=
-right:2.0pt double black;
  border-bottom:2.0pt double black;width:39pt'>Gelar</td>
  <td colspan=3D16 rowspan=3D2 class=3Dxl24012278 width=3D288 style=3D'bord=
er-right:2.0pt double black;
  border-bottom:2.0pt double black;width:219pt'>Nomor KTP/Nopen</td>
  <td colspan=3D24 rowspan=3D2 class=3Dxl28612278 style=3D'border-right:2.0=
pt double black;
  border-bottom:2.0pt double black'>Alamat Sebelumnya</td>
  <td colspan=3D9 rowspan=3D2 class=3Dxl24012278 width=3D156 style=3D'borde=
r-right:2.0pt double black;
  border-bottom:2.0pt double black;width:119pt'>Nomor Paspor</td>
  <td colspan=3D8 rowspan=3D2 class=3Dxl25512278 width=3D136 style=3D'borde=
r-right:2.0pt double black;
  border-bottom:2.0pt double black;width:104pt'>Tanggal Berakhir Paspor</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D18 style=3D'height:13.5pt'>
  <td height=3D18 class=3Dxl1512278 style=3D'height:13.5pt'></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D19 style=3D'height:14.25pt'>
  <td height=3D19 class=3Dxl1512278 style=3D'height:14.25pt'></td>
  <td class=3Dxl8912278  style=3D'border-bottom:2.0pt double black;border-right:2.0pt double black;border-left:2.0pt double black'>1</td>
  <td colspan=3D60 class=3Dxl27912278 width=3D1056 style=3D'border-right:2.=
0pt double black;
  width:806pt'>2</td>
  <td colspan=3D3 class=3Dxl22012278 style=3D'border-right:2.0pt double black;
  border-left:none'>3</td>
  <td colspan=3D16 class=3Dxl22012278 style=3D'border-right:2.0pt double bl=
ack;
  border-left:none'>4</td>
  <td colspan=3D24 class=3Dxl22012278 style=3D'border-right:2.0pt double bl=
ack;
  border-left:none'>5</td>
  <td colspan=3D9 class=3Dxl22012278 style=3D'border-right:2.0pt double black;
  border-left:none'>6</td>
  <td colspan=3D8 class=3Dxl22012278 style=3D'border-right:2.0pt double black;
  border-left:none'>7</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 
		<?php 
		
	$cekkk = mysql_num_rows(mysql_query("SELECT * FROM penduduk where no_kk_pen='$_GET[no_kk]'"));
			  if ($cekkk > 0){
  
$penduduk = "SELECT * FROM  penduduk, arsip_agama, arsip_alamat, arsip_kelamin,arsip_goldar, arsip_kewarganegaraan, arsip_pekerjaan, arsip_pendidikan, arsip_rt, arsip_rw, arsip_status, arsip_status_hdk
WHERE arsip_agama.id_agama=penduduk.agama_pen
AND arsip_alamat.id_alamat=penduduk.alamat_pen
AND arsip_kelamin.id_kelamin=penduduk.kelamin_pen
AND arsip_kewarganegaraan.id_kewarganegaraan=penduduk.kewarganegaraan_pen
AND arsip_pekerjaan.id_pekerjaan=penduduk.pekerjaan_pen
AND arsip_pendidikan.id_pendidikan=penduduk.pendidikan_pen
AND arsip_rt.id_rt=penduduk.rt_pen
AND arsip_rw.id_rw=penduduk.rw_pen
AND arsip_status.id_status=penduduk.status_pen
AND arsip_status_hdk.id_status_hdk=penduduk.status_hdk_pen
AND arsip_goldar.id_goldar=penduduk.goldar_pen
AND penduduk.no_kk_pen='$_GET[no_kk]' ";

  
$penduduk1 = " AND penduduk.statusnya='0' ";			  
  $p      = new Listpen; 
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);
  $hasildata  = mysql_query($penduduk.$penduduk1);
  $jmldata = mysql_num_rows($hasildata);
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas); 
$penduduk .= " ORDER BY status_hdk_pen, DATE_FORMAT(tanggal_lahir_pen, '%Y-%m-%d') LIMIT $posisi,$batas";

  $penduduk  = mysql_query($penduduk);
  $jmldatatr = mysql_num_rows($penduduk);
	$no=$posisi+1;
	
	while($p=mysql_fetch_array($penduduk)){
 if($no==$batas){
	 
		if ($p['statusnya']!="4" AND $p['statusnya']!="0") {
			echo " <tr height=3D23 style=3D'mso-height-source:userset;height:17.45pt;display:none'>";
		}
		else { if ($p['statusnya']=="4"){ $NIK= '';} else { $NIK = $p['no_pen'];}
			echo " <tr height=3D23 style=3D'mso-height-source:userset;height:17.45pt'>"; 
			}
			?>
	 
  <td height=3D23 class=3Dxl1512278 style=3D'height:17.45pt'></td>
  <td class=3Dxl11812278  style=3D'border-bottom:2.0pt double black;border-right:2.0pt double black;border-left:2.0pt double black'><?php echo $no; ?></td>
          

  <?php 
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("59", "$p[nama_pen]",  " class=3Dxl7312278 style=3D'border-top:none;vertical-align:middle;text-align:center;border-bottom:2.0pt double black'", " class=3Dxl7312278 style=3D'border-top:none;border-left:none;vertical-align:middle;text-align:center;border-bottom:2.0pt double black'", " class=3Dxl7312278 style=3D'border-top:none;border-left:none;vertical-align:middle;text-align:center;border-bottom:2.0pt double black'");
?> 
  <td class=3Dxl16912278 style=3D'border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl17712278 style=3D'border-left:none;border-bottom:2.0pt double black'>1</td>
  <td class=3Dxl17912278 style=3D'border-left:none;border-bottom:2.0pt double black'>2</td>
  <td class=3Dxl17812278 style=3D'border-bottom:2.0pt double black'>3</td>
     <?php 
	 //changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
	 echo changeCell("15", "$NIK", " class=3Dxl7212278 style=3D'text-align:center;vertical-align:middle;border-bottom:2.0pt double black'", " class=3Dxl7212278 style=3D'text-align:center;vertical-align:middle;border-bottom:2.0pt double black'", " class=3Dxl7212278 style=3D'text-align:center;vertical-align:middle;border-bottom:2.0pt double black'");
?> 

  <td colspan=3D24 class=3Dxl12412278 style=3D'border-top:none;border-left:2.0pt double black;border-right:2.0pt double black;border-bottom:2.0pt double black'>&nbsp;</td>
  <td colspan=3D9 class=3Dxl12412278 style=3D'border-top:none;border-left:none;border-right:2.0pt double black;border-bottom:2.0pt double black'>&nbsp;</td>
   
  <td class=3Dxl7512278 style=3D'border-top:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl10612278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <?php
	 }
	 else {
		 
		if ($p['statusnya']!="4" AND $p['statusnya']!="0") {
			echo " <tr height=3D23 style=3D'mso-height-source:userset;height:17.45pt;display:none'>";
		}
		else { if ($p['statusnya']=="4"){ $NIK= '';} else { $NIK = $p['no_pen'];}
			echo " <tr height=3D23 style=3D'mso-height-source:userset;height:17.45pt'>"; 
			}
			?>
  <td height=3D23 class=3Dxl1512278 style=3D'height:17.45pt'></td>
  <td class=3Dxl11812278  style=3D'border-bottom:.5pt solid black;border-right:2.0pt double black;border-left:2.0pt double black'><?php echo $no; ?></td>
          

  <?php 
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("59", "$p[nama_pen]",  " class=3Dxl7312278 style=3D'border-top:none;vertical-align:middle;text-align:center'", " class=3Dxl7312278 style=3D'border-top:none;border-left:none;vertical-align:middle;text-align:center'", " class=3Dxl7312278");
?> 
  <td class=3Dxl16912278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl17712278 style=3D'border-left:none'>1</td>
  <td class=3Dxl17912278 style=3D'border-left:none'>2</td>
  <td class=3Dxl17812278>3</td>
     <?php 
	 //changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
	 echo changeCell("15", "$NIK", " class=3Dxl7212278 style=3D'text-align:center;vertical-align:middle'", " class=3Dxl7212278 style=3D'text-align:center;vertical-align:middle'", " class=3Dxl7212278 style=3D'text-align:center;vertical-align:middle'");
?> 

  <td colspan=3D24 class=3Dxl12412278 style=3D'border-top:none;border-left:2.0pt double black;border-right:2.0pt double black'>&nbsp;</td>
  <td colspan=3D9 class=3Dxl12412278 style=3D'border-top:none;border-left:none;border-right:2.0pt double black'>&nbsp;</td>
   
  <td class=3Dxl7512278 style=3D'border-top:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl10612278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <?php
	}
 $no++;
	}
	
	if ($jmldatatr < $batas) {
	$jmltr = $batas-$jmldatatr;
	$jmltrmulai = $jmldatatr+1;
	if($_GET['hal'] >= 2){
		$jmltrmulai = $batas+$jmltrmulai;
		$batasi = $batas*(int)$_GET['hal'];
	}
	else { $batasi = $batas; }
     for ($i=$jmltrmulai; $i<=$batasi; $i++){
     if($i==$batasi){
	 ?>
<tr height=3D23 style=3D'mso-height-source:userset;height:17.45pt'>
  <td height=3D23 class=3Dxl1512278 style=3D'height:17.45pt;border-bottom:.5pt solid black'></td>
  <td class=3Dxl11812278  style=3D'border-bottom:2.0pt double black;border-right:2.0pt double black;border-left:2.0pt double black'><?php echo $i; ?></td>
          

  <?php 
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("58", "",  " class=3Dxl7312278 style=3D'border-top:none;vertical-align:middle;text-align:center;border-bottom:2.0pt double black'", " class=3Dxl7312278 style=3D'border-top:none;border-left:none;vertical-align:middle;text-align:center;border-bottom:2.0pt double black'", " class=3Dxl7312278 style=3D'border-top:none;border-left:none;vertical-align:middle;text-align:center;border-bottom:2.0pt double black'");
?> 
  <td class=3Dxl16912278 style=3D'border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl17712278 style=3D'border-left:none;border-bottom:2.0pt double black'>1</td>
  <td class=3Dxl17912278 style=3D'border-left:none;border-bottom:2.0pt double black'>2</td>
  <td class=3Dxl17812278 style=3D'border-bottom:2.0pt double black'>3</td>
     <?php 
	 //changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
	 echo changeCell("15", "", " class=3Dxl7212278 style=3D'text-align:center;vertical-align:middle;border-bottom:2.0pt double black'", " class=3Dxl7212278 style=3D'text-align:center;vertical-align:middle;border-bottom:2.0pt double black'", " class=3Dxl7212278 style=3D'text-align:center;vertical-align:middle;border-bottom:2.0pt double black'");
?> 

  <td colspan=3D24 class=3Dxl12412278 style=3D'border-top:none;border-left:2.0pt double black;border-right:2.0pt double black;border-bottom:2.0pt double black'>&nbsp;</td>
  <td colspan=3D9 class=3Dxl12412278 style=3D'border-top:none;border-left:none;border-right:2.0pt double black;border-bottom:2.0pt double black'>&nbsp;</td>
   
  <td class=3Dxl7512278 style=3D'border-top:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl10612278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <?php
	 }
	 else {
		 	 ?>
<tr height=3D23 style=3D'mso-height-source:userset;height:17.45pt'>
  <td height=3D23 class=3Dxl1512278 style=3D'height:17.45pt'></td>
  <td class=3Dxl11812278  style=3D'border-bottom:.5pt solid black;border-right:2.0pt double black;border-left:2.0pt double black'><?php echo $i; ?></td>
          

  <?php 
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("58", "",  " class=3Dxl7312278 style=3D'border-top:none;vertical-align:middle;text-align:center'", " class=3Dxl7312278 style=3D'border-top:none;border-left:none;vertical-align:middle;text-align:center'", " class=3Dxl7312278");
?> 
  <td class=3Dxl16912278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl17712278 style=3D'border-left:none'>1</td>
  <td class=3Dxl17912278 style=3D'border-left:none'>2</td>
  <td class=3Dxl17812278>3</td>
     <?php 
	 //changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
	 echo changeCell("15", "", " class=3Dxl7212278 style=3D'text-align:center;vertical-align:middle'", " class=3Dxl7212278 style=3D'text-align:center;vertical-align:middle'", " class=3Dxl7212278 style=3D'text-align:center;vertical-align:middle'");
?> 

  <td colspan=3D24 class=3Dxl12412278 style=3D'border-top:none;border-left:2.0pt double black;border-right:2.0pt double black'>&nbsp;</td>
  <td colspan=3D9 class=3Dxl12412278 style=3D'border-top:none;border-left:none;border-right:2.0pt double black'>&nbsp;</td>
   
  <td class=3Dxl7512278 style=3D'border-top:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl10612278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <?php
	 }
	 }
	}
}
	?>
 <tr height=3D10 style=3D'mso-height-source:userset;height:7.5pt'>
  <td height=3D10 class=3Dxl1512278 style=3D'height:7.5pt'></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl7612278>&nbsp;</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 
<!--data 1 header --> 

 <tr height=3D18 style=3D'mso-height-source:userset;height:13.5pt'>
  <td height=3D18 class=3Dxl1512278 style=3D'height:13.5pt'></td>
  <td rowspan=3D2 class=3Dxl24912278 width=3D26 style=3D'border-left:2.0pt double black;border-bottom:2.0pt double black;
  width:20pt'>No</td>
  <td colspan=3D4 rowspan=3D2 class=3Dxl26812278 width=3D78 style=3D'border=
-right:2.0pt double black;
  border-bottom:2.0pt double black;width:59pt'>Jenis Kelamin</td>
  <td colspan=3D28 rowspan=3D2 class=3Dxl25512278 width=3D486 style=3D'bord=
er-bottom:
  2.0pt double black;width:371pt'>Tempat Lahir</td>
  <td colspan=3D8 rowspan=3D2 class=3Dxl24012278 width=3D147 style=3D'borde=
r-right:2.0pt double black;
  border-bottom:2.0pt double black;width:112pt'>Tanggal/Bulan/Tahun Lahir</td>
  <td colspan=3D3 rowspan=3D2 class=3Dxl24012278 width=3D56 style=3D'border=
-right:2.0pt double black;
  border-bottom:2.0pt double black;width:43pt'>Umur (tahun)</td>
  <td colspan=3D4 class=3Dxl25112278 style=3D'border-right:2.0pt double black;
  border-left:none'>Akte Lahir/</td>
  <td colspan=3D8 class=3Dxl25112278 style=3D'border-right:2.0pt double black;
  border-left:none'>Nomor Akta Kelahiran/</td>
  <td colspan=3D4 class=3Dxl25112278 style=3D'border-right:2.0pt double black;
  border-left:none'>Golongan</td>
  <td colspan=3D7 rowspan=3D2 class=3Dxl24012278 width=3D128 style=3D'borde=
r-right:2.0pt double black;
  border-bottom:2.0pt double black;width:98pt'>Agama/Kepercayaan Terhadap T=
uhan
  YME</td>
  <td colspan=3D9 rowspan=3D2 class=3Dxl26812278 width=3D155 style=3D'borde=
r-right:2.0pt double black;
  border-bottom:2.0pt double black;width:118pt'>Kepercayaan Terhadap Tuhan =
Yang
  Maha Esa</td>
  <td colspan=3D4 rowspan=3D2 class=3Dxl24012278 width=3D73 style=3D'border=
-right:2.0pt double black;
  border-bottom:2.0pt double black;width:55pt'>Status Perkawinan</td>
  <td colspan=3D4 rowspan=3D2 class=3Dxl27412278 width=3D68 style=3D'border=
-bottom:2.0pt double black;
  width:52pt'>Akte Perkawinan/ Buku Nikah</td>
  <td colspan=3D9 rowspan=3D2 class=3Dxl24012278 width=3D156 style=3D'borde=
r-right:2.0pt double black;
  border-bottom:2.0pt double black;width:119pt'>Nomor Akta Perkawinan/Buku
  Nikah*)</td>
  <td colspan=3D8 rowspan=3D2 class=3Dxl25512278 width=3D139 style=3D'borde=
r-bottom:2.0pt double black;
  width:106pt'>Tanggal Perkawinan *)</td>
  <td colspan=3D4 class=3Dxl25112278 style=3D'border-right:2.0pt double bla=
ck'>Akte
  Cerai/</td>
  <td colspan=3D8 rowspan=3D2 class=3Dxl26512278 width=3D139 style=3D'borde=
r-bottom:2.0pt double black;
  width:106pt'>Nomor Akta Perceraian/Surat Cerai*)</td>
  <td colspan=3D8 rowspan=3D2 class=3Dxl24012278 width=3D136 style=3D'borde=
r-right:2.0pt double black;
  border-bottom:2.0pt double black;width:104pt'>Tanggal Perceraian*)</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D18 style=3D'height:13.5pt'>
  <td height=3D18 class=3Dxl1512278 style=3D'height:13.5pt'></td>
  <td colspan=3D4 class=3Dxl11312278 style=3D'border-right:2.0pt double black;
  border-left:none'>Surat Lahir</td>
  <td colspan=3D8 class=3Dxl11312278 style=3D'border-right:2.0pt double black;
  border-left:none'>Surat Kenal Lahir</td>
  <td colspan=3D4 class=3Dxl11312278 style=3D'border-right:2.0pt double black;
  border-left:none'>Darah</td>
  <td class=3Dxl15412278 colspan=3D4 style=3D'border-right:2.0pt double bla=
ck'>Surat
  Cerai*)</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D19 style=3D'height:14.25pt'>
  <td height=3D19 class=3Dxl1512278 style=3D'height:14.25pt'></td>
  <td class=3Dxl13112278 style=3D'border-top:none'>&nbsp;</td>
  <td colspan=3D4 class=3Dxl22012278 style=3D'border-right:2.0pt double bla=
ck'>8</td>
  <td colspan=3D28 class=3Dxl22012278 style=3D'border-right:2.0pt double bl=
ack;
  border-left:none'>9</td>
  <td colspan=3D8 class=3Dxl22012278 style=3D'border-right:2.0pt double black;
  border-left:none'>10</td>
  <td colspan=3D3 class=3Dxl22012278 style=3D'border-right:2.0pt double black;
  border-left:none'>11</td>
  <td colspan=3D4 class=3Dxl22012278 style=3D'border-right:2.0pt double black;
  border-left:none'>12</td>
  <td colspan=3D8 class=3Dxl22012278 style=3D'border-right:2.0pt double black;
  border-left:none'>13</td>
  <td colspan=3D4 class=3Dxl22012278 style=3D'border-right:2.0pt double black;
  border-left:none'>14</td>
  <td colspan=3D7 class=3Dxl22012278 style=3D'border-right:2.0pt double black;
  border-left:none'>15</td>
  <td colspan=3D9 class=3Dxl26312278 width=3D155 style=3D'border-right:2.0pt double black;
  border-left:none;width:118pt'>16</td>
  <td colspan=3D4 class=3Dxl22012278 style=3D'border-right:2.0pt double black;
  border-left:none'>17</td>
  <td colspan=3D4 class=3Dxl22012278 style=3D'border-left:none'>18</td>
  <td colspan=3D9 class=3Dxl22012278 style=3D'border-right:2.0pt double bla=
ck'>19</td>
  <td colspan=3D8 class=3Dxl22112278>20</td>
  <td colspan=3D4 class=3Dxl22012278 style=3D'border-right:2.0pt double bla=
ck'>21</td>
  <td colspan=3D8 class=3Dxl22112278>22</td>
  <td colspan=3D8 class=3Dxl22012278 style=3D'border-right:2.0pt double bla=
ck'>23</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 
<!--data 1 -->


		<?php 
		 
			  if ($cekkk > 0){
  
$penduduk2=mysql_query("SELECT * FROM  penduduk, arsip_agama, arsip_alamat, arsip_kelamin,arsip_goldar, arsip_kewarganegaraan, arsip_pekerjaan, arsip_pendidikan, arsip_rt, arsip_rw, arsip_status, arsip_status_hdk
WHERE arsip_agama.id_agama=penduduk.agama_pen
AND arsip_alamat.id_alamat=penduduk.alamat_pen
AND arsip_kelamin.id_kelamin=penduduk.kelamin_pen
AND arsip_kewarganegaraan.id_kewarganegaraan=penduduk.kewarganegaraan_pen
AND arsip_pekerjaan.id_pekerjaan=penduduk.pekerjaan_pen
AND arsip_pendidikan.id_pendidikan=penduduk.pendidikan_pen
AND arsip_rt.id_rt=penduduk.rt_pen
AND arsip_rw.id_rw=penduduk.rw_pen
AND arsip_status.id_status=penduduk.status_pen
AND arsip_status_hdk.id_status_hdk=penduduk.status_hdk_pen
AND arsip_goldar.id_goldar=penduduk.goldar_pen 
AND penduduk.no_kk_pen='$_GET[no_kk]'  ORDER BY status_hdk_pen, DATE_FORMAT(tanggal_lahir_pen, '%Y-%m-%d') LIMIT  $posisi,$batas");
	$no=$posisi+1;
	while($p=mysql_fetch_array($penduduk2)){		
	$tgllahir = tglpolos($p['tanggal_lahir_pen']);
 if($no==$batas){
	 
		if ($p['statusnya']!="4" AND $p['statusnya']!="0") {
			echo " <tr height=3D23 style=3D'mso-height-source:userset;height:17.45pt;display:none'>";
		}
		else { if ($p['statusnya']=="4"){ $NIK= '';} else { $NIK = $p['no_pen'];}
			echo " <tr height=3D23 style=3D'mso-height-source:userset;height:17.45pt'>"; 
			}
			?>
	 
  	
  <td height=3D23 class=3Dxl1512278 style=3D'height:17.45pt'></td>
  <td class=3Dxl13312278 style=3D'border-bottom:2.0pt double black'><?php echo $no; ?></td>
  <?php
  $jk=$p['kelamin_pen'];
  if($jk==1){
	  echo "
  <td colspan=3D2 class=3Dxl13612278 style=3D'border-bottom:2.0pt double black;vertical-align:middle'>
  <span class=3Dcode>j</span></td>
  <td colspan=3D2 class=3Dxl9712278 style=3D'border-bottom:2.0pt double black;border-right:2.0pt double black;border-left:none'>2</td>";
  }
  else {
	  echo "
  <td colspan=3D2 class=3Dxl13612278 style=3D'border-bottom:2.0pt double black'>1</td>
  <td colspan=3D2 class=3Dxl9712278 style=3D'border-bottom:2.0pt double black;border-right:2.0pt double black;border-left:none;vertical-align:middle'>
  <span class=3Dcode>k</span></td>";}
  ?> 
  
  <?php 
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("28", "$p[tempat_lahir_pen]",  " class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;vertical-align:middle;text-align:center'", " class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none;vertical-align:middle;text-align:center'", " class=3Dxl7312278  style=3D'border-bottom:2.0pt double black;border-top:none'");
?> 


  <?php
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("8", "$tgllahir",  " class=3Dxl12612278 style=3D'border-bottom:2.0pt double black;border-right:none;border-top:none;vertical-align:middle;text-align:center'", " class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:.5pt solid black;vertical-align:middle;text-align:center'", " class=3Dxl7312278");
?> 
  
  <td colspan=3D3 class=3Dxl12412278 style=3D'border-bottom:2.0pt double black;border-right:2.0pt double black;border-left:2.0pt double black'>&nbsp;</td>
  <td colspan=3D2 class=3Dxl15812278 style=3D'border-bottom:2.0pt double black;border-right:.5pt solid black;
  border-left:none'>1</td>
  <td colspan=3D2 class=3Dxl10812278 style=3D'border-bottom:2.0pt double black;border-right:2.0pt double black;
  border-left:none'>2</td>
  <td class=3Dxl12412278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  <td class=3Dxl7212278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7212278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7212278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7212278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7212278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7212278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl16312278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  
  <?php
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("2", "  ",  " colspan=3D2 class=3Dxl12612278 style=3D'border-bottom:2.0pt double black;border-right:none;border-top:none;vertical-align:middle;text-align:center'", " colspan=3D2 class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:.5pt solid black;vertical-align:middle;text-align:center'", " colspan=3D2 class=3Dxl7312278");
?> 

  <?php
  $agm=$p['agama_pen'];
  if($agm==1){
	  echo "
  <td class=3Dxl13612278 style=3D'border-bottom:2.0pt double black;vertical-align:middle'>
  <span class=3Dcode>j</span></td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>3</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>4</td>
  <td class=3Dxl9712278 style=3D'border-bottom:2.0pt double black;border-left:none'>5</td>
  <td class=3Dxl9712278 style=3D'border-bottom:2.0pt double black;border-left:none'>6</td>
  <td class=3Dxl18512278 style=3D'border-bottom:2.0pt double black;border-left:none'>7</td>";
  } 
  elseif($agm==2){
	  echo "
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none;vertical-align:middle'>
  <span class=3Dcode>k</span></td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>3</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>4</td>
  <td class=3Dxl9712278 style=3D'border-bottom:2.0pt double black;border-left:none'>5</td>
  <td class=3Dxl9712278 style=3D'border-bottom:2.0pt double black;border-left:none'>6</td>
  <td class=3Dxl18512278 style=3D'border-bottom:2.0pt double black;border-left:none'>7</td>";
  }
  elseif($agm==3){
	  echo "
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none;vertical-align:middle'>
  <span class=3Dcode>l</span></td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>4</td>
  <td class=3Dxl9712278 style=3D'border-bottom:2.0pt double black;border-left:none'>5</td>
  <td class=3Dxl9712278 style=3D'border-bottom:2.0pt double black;border-left:none'>6</td>
  <td class=3Dxl18512278 style=3D'border-bottom:2.0pt double black;border-left:none'>7</td>";
  }
  elseif($agm==4){
	  echo "
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>3</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none;vertical-align:middle'>
  <span class=3Dcode>m</span></td>
  <td class=3Dxl9712278 style=3D'border-bottom:2.0pt double black;border-left:none'>5</td>
  <td class=3Dxl9712278 style=3D'border-bottom:2.0pt double black;border-left:none'>6</td>
  <td class=3Dxl18512278 style=3D'border-bottom:2.0pt double black;border-left:none'>7</td>";
  }
  elseif($agm==5){
	  echo "
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>3</td>
  <td class=3Dxl9712278 style=3D'border-bottom:2.0pt double black;border-left:none'>4</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none;vertical-align:middle'>
  <span class=3Dcode>n</span></td>
  <td class=3Dxl9712278 style=3D'border-bottom:2.0pt double black;border-left:none'>6</td>
  <td class=3Dxl18512278 style=3D'border-bottom:2.0pt double black;border-left:none'>7</td>";
  }
  elseif($agm==6){
	  echo "
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>3</td>
  <td class=3Dxl9712278 style=3D'border-bottom:2.0pt double black;border-left:none'>4</td>
  <td class=3Dxl9712278 style=3D'border-bottom:2.0pt double black;border-left:none'>5</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none;vertical-align:middle'>
  <span class=3Dcode>o</span></td>
  <td class=3Dxl18512278 style=3D'border-bottom:2.0pt double black;border-left:none'>7</td>";
  }
  elseif($agm==7){
	  echo "
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>3</td>
  <td class=3Dxl9712278 style=3D'border-bottom:2.0pt double black;border-left:none'>4</td>
  <td class=3Dxl9712278 style=3D'border-bottom:2.0pt double black;border-left:none'>5</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>6</td>
  <td class=3Dxl18512278 style=3D'border-bottom:2.0pt double black;border-left:none;vertical-align:middle'>
  <span class=3Dcode>p</span></td>";
  }
  else {
	  echo "
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>3</td>
  <td class=3Dxl9712278 style=3D'border-bottom:2.0pt double black;border-left:none'>4</td>
  <td class=3Dxl9712278 style=3D'border-bottom:2.0pt double black;border-left:none'>5</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>6</td>
  <td class=3Dxl18512278 style=3D'border-bottom:2.0pt double black;border-left:none'>7</td>";
  }
  ?> 
   
  <td colspan=3D9 class=3Dxl15812278  style=3D'border-bottom:2.0pt double black;border-right:2.0pt double black;border-left:2.0pt double black'>&nbsp;</td>
  
  
  <?php
  $status=$p['status_pen'];
  if($status==1){
	  echo "
  <td class=3Dxl13612278 style=3D'border-bottom:2.0pt double black;vertical-align:middle'>
  <span class=3Dcode>j</span></td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>3</td>
  <td class=3Dxl18512278 style=3D'border-bottom:2.0pt double black;border-left:none'>4</td>";
  } 
  elseif($status==2){
	  echo "
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none;vertical-align:middle'>
  <span class=3Dcode>k</span></td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>3</td>
  <td class=3Dxl18512278 style=3D'border-bottom:2.0pt double black;border-left:none'>4</td>";
  }
  elseif($status==3){
	  echo "
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none;vertical-align:middle'>
  <span class=3Dcode>l</span></td>
  <td class=3Dxl18512278 style=3D'border-bottom:2.0pt double black;border-left:none'>4</td>";
  }
  elseif($status==4){
	  echo "
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>3</td>
  <td class=3Dxl18512278 style=3D'border-bottom:2.0pt double black;border-left:none;vertical-align:middle'>
  <span class=3Dcode>m</span></td>";
  }
  else {
	  echo "
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>3</td>
  <td class=3Dxl18512278 style=3D'border-bottom:2.0pt double black;border-left:none'>4</td>";
  }
  ?> 
   
   
  
  <td colspan=3D2 class=3Dxl11512278 style=3D'border-bottom:2.0pt double black;border-right:.5pt solid black'>1</td>
  <td colspan=3D2 class=3Dxl10812278 style=3D'border-bottom:2.0pt double black;border-left:none'>2</td>
  <td class=3Dxl15812278 style=3D'border-bottom:2.0pt double black;border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black;border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black;border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black;border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black;border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black;border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black;border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black;border-top:none'>&nbsp;</td>
  <td class=3Dxl14112278 style=3D'border-bottom:2.0pt double black;border-top:none'>&nbsp;</td>
  <td class=3Dxl7212278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  <td class=3Dxl7212278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  
  <td colspan=3D2 class=3Dxl15812278 style=3D'border-bottom:2.0pt double black;border-right:.5pt solid black'>1</td>
  <td colspan=3D2 class=3Dxl10812278 style=3D'border-bottom:2.0pt double black;border-right:2.0pt double black;
  border-left:none'>2</td>
  
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7212278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl12412278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  <td class=3Dxl10212278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 
 <?php
	 }
	 else {
		 
		if ($p['statusnya']!="4" AND $p['statusnya']!="0") {
			echo " <tr height=3D23 style=3D'mso-height-source:userset;height:17.45pt;display:none'>";
		}
		else { if ($p['statusnya']=="4"){ $NIK= '';} else { $NIK = $p['no_pen'];}
			echo " <tr height=3D23 style=3D'mso-height-source:userset;height:17.45pt'>"; 
			}
			?>
  
  <td height=3D23 class=3Dxl1512278 style=3D'height:17.45pt'></td>
  <td class=3Dxl13312278><?php echo $no; ?></td>
  <?php
  $jk=$p['kelamin_pen'];
  if($jk==1){
	  echo "
  <td colspan=3D2 class=3Dxl13612278 style=3D'vertical-align:middle'>
  <span class=3Dcode>j</span></td>
  <td colspan=3D2 class=3Dxl9712278 style=3D'border-right:2.0pt double black;border-left:none'>2</td>";
  }
  else {
	  echo "
  <td colspan=3D2 class=3Dxl13612278>1</td>
  <td colspan=3D2 class=3Dxl9712278 style=3D'border-right:2.0pt double black;border-left:none;vertical-align:middle'>
  <span class=3Dcode>k</span></td>";}
  ?> 
  
  <?php 
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("28", "$p[tempat_lahir_pen]",  " class=3Dxl7312278 style=3D'border-top:none;vertical-align:middle;text-align:center'", " class=3Dxl7312278 style=3D'border-top:none;border-left:none;vertical-align:middle;text-align:center'", " class=3Dxl7312278");
?> 


  <?php
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("8", "$tgllahir",  " class=3Dxl12612278 style=3D'border-right:none;border-top:none;vertical-align:middle;text-align:center'", " class=3Dxl7312278 style=3D'border-top:none;border-left:.5pt solid black;vertical-align:middle;text-align:center'", " class=3Dxl7312278");
?> 
  
  <td colspan=3D3 class=3Dxl12412278 style=3D'border-right:2.0pt double black;border-left:2.0pt double black'>&nbsp;</td>
  <td colspan=3D2 class=3Dxl15812278 style=3D'border-right:.5pt solid black;
  border-left:none'>1</td>
  <td colspan=3D2 class=3Dxl10812278 style=3D'border-right:2.0pt double black;
  border-left:none'>2</td>
  <td class=3Dxl12412278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl16312278>&nbsp;</td>
  
  <?php
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("2", "  ",  " colspan=3D2 class=3Dxl12612278 style=3D'border-right:none;border-top:none;vertical-align:middle;text-align:center'", " colspan=3D2 class=3Dxl7312278 style=3D'border-top:none;border-left:.5pt solid black;vertical-align:middle;text-align:center'", " colspan=3D2 class=3Dxl7312278");
?> 

  <?php
  $agm=$p['agama_pen'];
  if($agm==1){
	  echo "
  <td class=3Dxl13612278 style=3D'vertical-align:middle'>
  <span class=3Dcode>j</span></td>
  <td class=3Dxl8212278 style=3D'border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>3</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>4</td>
  <td class=3Dxl9712278 style=3D'border-left:none'>5</td>
  <td class=3Dxl9712278 style=3D'border-left:none'>6</td>
  <td class=3Dxl18512278 style=3D'border-left:none'>7</td>";
  } 
  elseif($agm==2){
	  echo "
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-left:none;vertical-align:middle'>
  <span class=3Dcode>k</span></td>
  <td class=3Dxl8212278 style=3D'border-left:none'>3</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>4</td>
  <td class=3Dxl9712278 style=3D'border-left:none'>5</td>
  <td class=3Dxl9712278 style=3D'border-left:none'>6</td>
  <td class=3Dxl18512278 style=3D'border-left:none'>7</td>";
  }
  elseif($agm==3){
	  echo "
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-left:none;vertical-align:middle'>
  <span class=3Dcode>l</span></td>
  <td class=3Dxl8212278 style=3D'border-left:none'>4</td>
  <td class=3Dxl9712278 style=3D'border-left:none'>5</td>
  <td class=3Dxl9712278 style=3D'border-left:none'>6</td>
  <td class=3Dxl18512278 style=3D'border-left:none'>7</td>";
  }
  elseif($agm==4){
	  echo "
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>3</td>
  <td class=3Dxl8212278 style=3D'border-left:none;vertical-align:middle'>
  <span class=3Dcode>m</span></td>
  <td class=3Dxl9712278 style=3D'border-left:none'>5</td>
  <td class=3Dxl9712278 style=3D'border-left:none'>6</td>
  <td class=3Dxl18512278 style=3D'border-left:none'>7</td>";
  }
  elseif($agm==5){
	  echo "
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>3</td>
  <td class=3Dxl9712278 style=3D'border-left:none'>4</td>
  <td class=3Dxl8212278 style=3D'border-left:none;vertical-align:middle'>
  <span class=3Dcode>n</span></td>
  <td class=3Dxl9712278 style=3D'border-left:none'>6</td>
  <td class=3Dxl18512278 style=3D'border-left:none'>7</td>";
  }
  elseif($agm==6){
	  echo "
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>3</td>
  <td class=3Dxl9712278 style=3D'border-left:none'>4</td>
  <td class=3Dxl9712278 style=3D'border-left:none'>5</td>
  <td class=3Dxl8212278 style=3D'border-left:none;vertical-align:middle'>
  <span class=3Dcode>o</span></td>
  <td class=3Dxl18512278 style=3D'border-left:none'>7</td>";
  }
  elseif($agm==7){
	  echo "
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>3</td>
  <td class=3Dxl9712278 style=3D'border-left:none'>4</td>
  <td class=3Dxl9712278 style=3D'border-left:none'>5</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>6</td>
  <td class=3Dxl18512278 style=3D'border-left:none;vertical-align:middle'>
  <span class=3Dcode>p</span></td>";
  }
  else {
	  echo "
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>3</td>
  <td class=3Dxl9712278 style=3D'border-left:none'>4</td>
  <td class=3Dxl9712278 style=3D'border-left:none'>5</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>6</td>
  <td class=3Dxl18512278 style=3D'border-left:none'>7</td>";
  }
  ?> 
   
  <td colspan=3D9 class=3Dxl15812278  style=3D'border-right:2.0pt double black;border-left:2.0pt double black'>&nbsp;</td>
  
  
  <?php
  $status=$p['status_pen'];
  if($status==1){
	  echo "
  <td class=3Dxl13612278 style=3D'vertical-align:middle'>
  <span class=3Dcode>j</span></td>
  <td class=3Dxl8212278 style=3D'border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>3</td>
  <td class=3Dxl18512278 style=3D'border-left:none'>4</td>";
  } 
  elseif($status==2){
	  echo "
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-left:none;vertical-align:middle'>
  <span class=3Dcode>k</span></td>
  <td class=3Dxl8212278 style=3D'border-left:none'>3</td>
  <td class=3Dxl18512278 style=3D'border-left:none'>4</td>";
  }
  elseif($status==3){
	  echo "
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-left:none;vertical-align:middle'>
  <span class=3Dcode>l</span></td>
  <td class=3Dxl18512278 style=3D'border-left:none'>4</td>";
  }
  elseif($status==4){
	  echo "
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>3</td>
  <td class=3Dxl18512278 style=3D'border-left:none;vertical-align:middle'>
  <span class=3Dcode>m</span></td>";
  }
  else {
	  echo "
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>3</td>
  <td class=3Dxl18512278 style=3D'border-left:none'>4</td>";
  }
  ?> 
   
   
  
  <td colspan=3D2 class=3Dxl11512278 style=3D'border-right:.5pt solid black'>1</td>
  <td colspan=3D2 class=3Dxl10812278 style=3D'border-left:none'>2</td>
  <td class=3Dxl15812278 style=3D'border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-top:none'>&nbsp;</td>
  <td class=3Dxl14112278 style=3D'border-top:none'>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7312278>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td colspan=3D2 class=3Dxl15812278 style=3D'border-right:.5pt solid black'>1</td>
  <td colspan=3D2 class=3Dxl10812278 style=3D'border-right:2.0pt double black;
  border-left:none'>2</td>
  <td class=3Dxl11512278>&nbsp;</td>
  <td class=3Dxl11512278>&nbsp;</td>
  <td class=3Dxl11512278>&nbsp;</td>
  <td class=3Dxl11512278>&nbsp;</td>
  <td class=3Dxl11512278>&nbsp;</td>
  <td class=3Dxl11512278>&nbsp;</td>
  <td class=3Dxl11512278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl12412278>&nbsp;</td>
  <td class=3Dxl7312278>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl10212278>&nbsp;</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 
 <?php
	}
 $no++;
	}
	
	if ($jmldatatr < $batas) {
	$jmltr = $batas-$jmldatatr;
	$jmltrmulai = $jmldatatr+1;
	if($_GET['hal'] >= 2){
		$jmltrmulai = $batas+$jmltrmulai;
		$batasi = $batas*(int)$_GET['hal'];
	}
	else { $batasi = $batas; }
     for ($i=$jmltrmulai; $i<=$batasi; $i++){
     if($i==$batasi){
	 ?>
 <tr height=3D23 style=3D'mso-height-source:userset;height:17.45pt'> 
			 
	 
  	
  <td height=3D23 class=3Dxl1512278 style=3D'border-bottom:2.0pt double black;height:17.45pt'></td>
  <td class=3Dxl13312278 style=3D'border-bottom:2.0pt double black'><?php echo $i; ?></td>
 
  <td colspan=3D2 class=3Dxl13612278 style=3D'border-bottom:2.0pt double black'>1</td> 
  <td colspan=3D2 class=3Dxl9712278 style=3D'border-bottom:2.0pt double black;border-right:2.0pt double black;border-left:none'>2</td>
 
  
  <?php 
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("28", "                            ",  " class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;vertical-align:middle;text-align:center'", " class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none;vertical-align:middle;text-align:center'", " class=3Dxl7312278  style=3D'border-bottom:2.0pt double black;border-top:none'");
?> 


  <?php
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("8", "        ",  " class=3Dxl12612278 style=3D'border-bottom:2.0pt double black;border-right:none;border-top:none;vertical-align:middle;text-align:center'", " class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:.5pt solid black;vertical-align:middle;text-align:center'", " class=3Dxl7312278");
?> 
  
  <td colspan=3D3 class=3Dxl12412278 style=3D'border-bottom:2.0pt double black;border-right:2.0pt double black;border-left:2.0pt double black'>&nbsp;</td>
  <td colspan=3D2 class=3Dxl15812278 style=3D'border-bottom:2.0pt double black;border-right:.5pt solid black;
  border-left:none'>1</td>
  <td colspan=3D2 class=3Dxl10812278 style=3D'border-bottom:2.0pt double black;border-right:2.0pt double black;
  border-left:none'>2</td>
  <td class=3Dxl12412278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  <td class=3Dxl7212278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7212278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7212278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7212278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7212278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7212278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl16312278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  
  <?php
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("2", "  ",  " colspan=3D2 class=3Dxl12612278 style=3D'border-bottom:2.0pt double black;border-right:none;border-top:none;vertical-align:middle;text-align:center'", " colspan=3D2 class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:.5pt solid black;vertical-align:middle;text-align:center'", " colspan=3D2 class=3Dxl7312278");
?> 
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>3</td>
  <td class=3Dxl9712278 style=3D'border-bottom:2.0pt double black;border-left:none'>4</td>
  <td class=3Dxl9712278 style=3D'border-bottom:2.0pt double black;border-left:none'>5</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>6</td>
  <td class=3Dxl18512278 style=3D'border-bottom:2.0pt double black;border-left:none'>7</td> 
   
  <td colspan=3D9 class=3Dxl15812278  style=3D'border-bottom:2.0pt double black;border-right:2.0pt double black;border-left:2.0pt double black'>&nbsp;</td>
  
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'>3</td>
  <td class=3Dxl18512278 style=3D'border-bottom:2.0pt double black;border-left:none'>4</td> 
   
   
  
  <td colspan=3D2 class=3Dxl11512278 style=3D'border-bottom:2.0pt double black;border-right:.5pt solid black'>1</td>
  <td colspan=3D2 class=3Dxl10812278 style=3D'border-bottom:2.0pt double black;border-left:none'>2</td>
  <td class=3Dxl15812278 style=3D'border-bottom:2.0pt double black;border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black;border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black;border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black;border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black;border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black;border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black;border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black;border-top:none'>&nbsp;</td>
  <td class=3Dxl14112278 style=3D'border-bottom:2.0pt double black;border-top:none'>&nbsp;</td>
  <td class=3Dxl7212278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  <td class=3Dxl7212278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  
  <td colspan=3D2 class=3Dxl15812278 style=3D'border-bottom:2.0pt double black;border-right:.5pt solid black'>1</td>
  <td colspan=3D2 class=3Dxl10812278 style=3D'border-bottom:2.0pt double black;border-right:2.0pt double black;
  border-left:none'>2</td>
  
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7212278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl12412278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-left:none'>&nbsp;</td>
  <td class=3Dxl10212278 style=3D'border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <?php
	 }
	 else{
	 ?>
 <tr height=3D23 style=3D'mso-height-source:userset;height:17.45pt'> 
			 
	 
  	
  <td height=3D23 class=3Dxl1512278 style=3D'height:17.45pt'></td>
  <td class=3Dxl13312278><?php echo $i; ?></td>
 
  <td colspan=3D2 class=3Dxl13612278>1</td> 
  <td colspan=3D2 class=3Dxl9712278 style=3D'border-right:2.0pt double black;border-left:none'>2</td>
 
  
  <?php 
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("28", "                            ",  " class=3Dxl7312278 style=3D'border-top:none;vertical-align:middle;text-align:center'", " class=3Dxl7312278 style=3D'border-top:none;border-left:none;vertical-align:middle;text-align:center'", " class=3Dxl7312278  style=3D'border-top:none'");
?> 


  <?php
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("8", "        ",  " class=3Dxl12612278 style=3D'border-right:none;border-top:none;vertical-align:middle;text-align:center'", " class=3Dxl7312278 style=3D'border-top:none;border-left:.5pt solid black;vertical-align:middle;text-align:center'", " class=3Dxl7312278");
?> 
  
  <td colspan=3D3 class=3Dxl12412278 style=3D'border-right:2.0pt double black;border-left:2.0pt double black'>&nbsp;</td>
  <td colspan=3D2 class=3Dxl15812278 style=3D'border-right:.5pt solid black;
  border-left:none'>1</td>
  <td colspan=3D2 class=3Dxl10812278 style=3D'border-right:2.0pt double black;
  border-left:none'>2</td>
  <td class=3Dxl12412278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl16312278>&nbsp;</td>
  
  <?php
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("2", "  ",  " colspan=3D2 class=3Dxl12612278 style=3D'border-right:none;border-top:none;vertical-align:middle;text-align:center'", " colspan=3D2 class=3Dxl7312278 style=3D'border-top:none;border-left:.5pt solid black;vertical-align:middle;text-align:center'", " colspan=3D2 class=3Dxl7312278");
?> 
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>3</td>
  <td class=3Dxl9712278 style=3D'border-left:none'>4</td>
  <td class=3Dxl9712278 style=3D'border-left:none'>5</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>6</td>
  <td class=3Dxl18512278 style=3D'border-left:none'>7</td> 
   
  <td colspan=3D9 class=3Dxl15812278  style=3D'border-right:2.0pt double black;border-left:2.0pt double black'>&nbsp;</td>
  
  <td class=3Dxl13612278>1</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>2</td>
  <td class=3Dxl8212278 style=3D'border-left:none'>3</td>
  <td class=3Dxl18512278 style=3D'border-left:none'>4</td> 
   
   
  
  <td colspan=3D2 class=3Dxl11512278 style=3D'border-right:.5pt solid black'>1</td>
  <td colspan=3D2 class=3Dxl10812278 style=3D'border-left:none'>2</td>
  <td class=3Dxl15812278 style=3D'border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-top:none'>&nbsp;</td>
  <td class=3Dxl11512278 style=3D'border-top:none'>&nbsp;</td>
  <td class=3Dxl14112278 style=3D'border-top:none'>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl7312278>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7212278 style=3D'border-left:none'>&nbsp;</td>
  
  <td colspan=3D2 class=3Dxl15812278 style=3D'border-right:.5pt solid black'>1</td>
  <td colspan=3D2 class=3Dxl10812278 style=3D'border-right:2.0pt double black;
  border-left:none'>2</td>
  
  <td class=3Dxl11512278>&nbsp;</td>
  <td class=3Dxl11512278>&nbsp;</td>
  <td class=3Dxl11512278>&nbsp;</td>
  <td class=3Dxl11512278>&nbsp;</td>
  <td class=3Dxl11512278>&nbsp;</td>
  <td class=3Dxl11512278>&nbsp;</td>
  <td class=3Dxl11512278>&nbsp;</td>
  <td class=3Dxl7212278>&nbsp;</td>
  <td class=3Dxl12412278>&nbsp;</td>
  <td class=3Dxl7312278>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-left:none'>&nbsp;</td>
  <td class=3Dxl10212278>&nbsp;</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <?php
	 }
	 }
	}
}
	?>
<tr height=3D10 style=3D'mso-height-source:userset;height:7.5pt'>
  <td height=3D10 class=3Dxl1512278 style=3D'height:7.5pt'></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
<!--data 1 // -->

<!--data 2 header --> 
 <tr height=3D19 style=3D'mso-height-source:userset;height:14.25pt'>
  <td height=3D19 class=3Dxl1512278 style=3D'height:14.25pt'></td>
  <td rowspan=3D2 class=3Dxl24912278 width=3D26 style=3D'border-left:2.0pt double black;border-bottom:2.0pt double black;
  width:20pt'>No</td>
  <td colspan=3D4 class=3Dxl25112278 style=3D'border-right:2.0pt double black;
  border-left:none'>Status Hub.</td>
  <td colspan=3D4 rowspan=3D2 class=3Dxl25312278 width=3D78 style=3D'border=
-bottom:2.0pt double black;
  width:59pt'>Kelainan Fisik &amp; Mental</td>
  <td colspan=3D12 rowspan=3D2 class=3Dxl24012278 width=3D204 style=3D'bord=
er-right:2.0pt double black;
  border-bottom:2.0pt double black;width:156pt'>Penyandang Cacat</td>
  <td colspan=3D20 rowspan=3D2 class=3Dxl26012278 width=3D351 style=3D'widt=
h:268pt'>Pendidikan
  Terakhir</td>
  <td colspan=3D4 rowspan=3D2 class=3Dxl24012278 width=3D73 style=3D'border=
-right:2.0pt double black;
  border-bottom:2.0pt double black;width:56pt'>Pekerjaan</td>
  <td colspan=3D16 rowspan=3D2 class=3Dxl22512278 width=3D272 style=3D'bord=
er-bottom:
  2.0pt double black;width:208pt'>NIK Ibu</td>
  <td colspan=3D21 rowspan=3D2 class=3Dxl23112278 width=3D373 style=3D'bord=
er-right:2.0pt double black;
  width:284pt'>Nama lengkap Ibu</td>
  <td colspan=3D16 rowspan=3D2 class=3Dxl22512278 width=3D275 style=3D'widt=
h:210pt'>NIK
  Ayah</td>
  <td colspan=3D23 rowspan=3D2 class=3Dxl24012278 width=3D397 style=3D'bord=
er-right:2.0pt double black;
  border-bottom:2.0pt double black;width:303pt'>Nama Lengkap Ayah</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D19 style=3D'height:14.25pt'>
  <td height=3D19 class=3Dxl1512278 style=3D'height:14.25pt'></td>
  <td colspan=3D4 class=3Dxl11312278 style=3D'border-right:2.0pt double black;
  border-left:none'>Dlm Keluarga</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D19 style=3D'height:14.25pt'>
  <td height=3D19 class=3Dxl1512278 style=3D'height:14.25pt'></td>
  <td class=3Dxl13112278 style=3D'border-top:none'>&nbsp;</td>
  <td colspan=3D4 class=3Dxl22012278 style=3D'border-right:2.0pt double bla=
ck'>24</td>
  <td colspan=3D4 class=3Dxl22112278>25</td>
  <td colspan=3D12 class=3Dxl22012278 style=3D'border-right:2.0pt double bl=
ack'>26</td>
  <td colspan=3D20 class=3Dxl24612278 width=3D351 style=3D'width:268pt'>27</td>
  <td colspan=3D4 class=3Dxl22012278 style=3D'border-right:2.0pt double bla=
ck'>28</td>
  <td colspan=3D16 class=3Dxl21212278 width=3D272 style=3D'width:208pt'>29</td>
  <td colspan=3D21 class=3Dxl21612278 width=3D373 style=3D'border-right:2.0=
pt double black;
  width:284pt'>30</td>
  <td colspan=3D16 class=3Dxl21812278>31</td>
  <td colspan=3D23 class=3Dxl22012278 style=3D'border-right:2.0pt double bl=
ack'>32</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>

<!--data 2 --> 


		<?php 
		 
			  if ($cekkk > 0){
  
$penduduk3=mysql_query("SELECT * FROM  penduduk, arsip_agama, arsip_alamat, arsip_kelamin,arsip_goldar, arsip_kewarganegaraan, arsip_pekerjaan, arsip_pendidikan, arsip_rt, arsip_rw, arsip_status, arsip_status_hdk
WHERE arsip_agama.id_agama=penduduk.agama_pen
AND arsip_alamat.id_alamat=penduduk.alamat_pen
AND arsip_kelamin.id_kelamin=penduduk.kelamin_pen
AND arsip_kewarganegaraan.id_kewarganegaraan=penduduk.kewarganegaraan_pen
AND arsip_pekerjaan.id_pekerjaan=penduduk.pekerjaan_pen
AND arsip_pendidikan.id_pendidikan=penduduk.pendidikan_pen
AND arsip_rt.id_rt=penduduk.rt_pen
AND arsip_rw.id_rw=penduduk.rw_pen
AND arsip_status.id_status=penduduk.status_pen
AND arsip_status_hdk.id_status_hdk=penduduk.status_hdk_pen
AND arsip_goldar.id_goldar=penduduk.goldar_pen 
AND penduduk.no_kk_pen='$_GET[no_kk]'  ORDER BY status_hdk_pen, DATE_FORMAT(tanggal_lahir_pen, '%Y-%m-%d') LIMIT  $posisi,$batas");
	$no=$posisi+1;
	while($p=mysql_fetch_array($penduduk3)){		
 if($no==$batas){
	 
		if ($p['statusnya']!="4" AND $p['statusnya']!="0") {
			echo " <tr height=3D23 style=3D'mso-height-source:userset;height:17.45pt;display:none'>";
		}
		else { if ($p['statusnya']=="4"){ $NIK= '';} else { $NIK = $p['no_pen'];}
			echo " <tr height=3D23 style=3D'mso-height-source:userset;height:17.45pt'>"; 
			}
			?>
	 
	 
 
  <td height=3D23 class=3Dxl1512278 style=3D'height:17.45pt'></td>
  <td  class=3Dxl20512278 style=3D'border-bottom:2.0pt double black;border-right:2.0pt double black;border-left:2.0pt double black'><?php echo $no; ?></td>
  
  <?php 
  $counthdk = mb_strlen($p['status_hdk_pen']);
if($counthdk>1){
  $hdk = $p['status_hdk_pen'];
}
else {
  $hdk = "0".$p['status_hdk_pen'];	
}
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("2", "$hdk",  " colspan=3D2 class=3Dxl12612278 style=3D'border-bottom:2.0pt double black;border-right:none;border-top:none;vertical-align:middle;text-align:center'", " colspan=3D2 class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:.5pt solid black;vertical-align:middle;text-align:center'", " colspan=3D2 class=3Dxl7312278 style=3D'border-bottom:2.0pt double black'");
?> 
  
  <td colspan=3D2 class=3Dxl20512278 style=3D'border-bottom:2.0pt double black;vertical-align:middle;border-left:2.0pt double black'>
  1</td>
  <td colspan=3D2 class=3Dxl9712278 style=3D'border-bottom:2.0pt double black;border-left:none;vertical-align:middle'>
  2</td>
  
  <td colspan=3D2 class=3Dxl15812278 style=3D'border-bottom:2.0pt double black;border-right:.5pt solid black'>1</td>
  <td colspan=3D2 class=3Dxl10812278 style=3D'border-bottom:2.0pt double black;border-right:.5pt solid black;
  border-left:none'>2</td>
  <td colspan=3D2 class=3Dxl11812278 style=3D'border-bottom:2.0pt double black;border-right:.5pt solid black;
  border-left:none'>3</td>
  <td colspan=3D2 class=3Dxl11812278 style=3D'border-bottom:2.0pt double black;border-right:.5pt solid black;
  border-left:none'>4</td>
  <td colspan=3D2 class=3Dxl11812278 style=3D'border-bottom:2.0pt double black;border-right:.5pt solid black;
  border-left:none'>5</td>
  <td colspan=3D2 class=3Dxl11812278 style=3D'border-bottom:2.0pt double black;border-right:2.0pt double black;
  border-left:none'>6</td>
  
  
  <?php
  $pnddk=$p['pendidikan_pen'];
  if($pnddk==1){
	  $style_pnddk1=" colspan=3D2 style=3D'border-bottom:2.0pt double black;vertical-align:middle'";
	  $val_pnddk1 = "<span class=3Dcode>j</span>";
	  $style_pnddk2="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk2 = "2";
	  $style_pnddk3="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk3 = "3";
	  $style_pnddk4="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk4 = "4";
	  $style_pnddk5="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk5 = "5";
	  $style_pnddk6="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk6 = "6";
	  $style_pnddk7="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk7 = "7";
	  $style_pnddk8="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk8 = "8";
	  $style_pnddk9="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk9 = "9";
	  $style_pnddk10="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk10 = "10";
  }
	
  elseif($pnddk==2){
	  $style_pnddk1="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk1 = "1";
	  $style_pnddk2="  colspan=3D2 style=3D'border-bottom:2.0pt double black;vertical-align:middle'";
	  $val_pnddk2 = "<span class=3Dcode>k</span>";
	  $style_pnddk3="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk3 = "3";
	  $style_pnddk4="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk4 = "4";
	  $style_pnddk5="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk5 = "5";
	  $style_pnddk6="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk6 = "6";
	  $style_pnddk7="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk7 = "7";
	  $style_pnddk8="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk8 = "8";
	  $style_pnddk9="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk9 = "9";
	  $style_pnddk10="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk10 = "10";
  }	  
    elseif($pnddk==3){
	  $style_pnddk1="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk1 = "1";
	  $style_pnddk2="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk2 = "2";
	  $style_pnddk3="  colspan=3D2 style=3D'border-bottom:2.0pt double black;vertical-align:middle'";
	  $val_pnddk3 = "<span class=3Dcode>l</span>";
	  $style_pnddk4="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk4 = "4";
	  $style_pnddk5="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk5 = "5";
	  $style_pnddk6="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk6 = "6";
	  $style_pnddk7="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk7 = "7";
	  $style_pnddk8="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk8 = "8";
	  $style_pnddk9="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk9 = "9";
	  $style_pnddk10="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk10 = "10";
  }
    elseif($pnddk==4){
	  $style_pnddk1="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk1 = "1";
	  $style_pnddk2="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk2 = "2";
	  $style_pnddk3="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk3 = "3";
	  $style_pnddk4="  colspan=3D2 style=3D'border-bottom:2.0pt double black;vertical-align:middle'";
	  $val_pnddk4 = "<span class=3Dcode>m</span>";
	  $style_pnddk5="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk5 = "5";
	  $style_pnddk6="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk6 = "6";
	  $style_pnddk7="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk7 = "7";
	  $style_pnddk8="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk8 = "8";
	  $style_pnddk9="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk9 = "9";
	  $style_pnddk10="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk10 = "10";
  }	 
    elseif($pnddk==5){
	  $style_pnddk1="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk1 = "1";
	  $style_pnddk2="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk2 = "2";
	  $style_pnddk3="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk3 = "3";
	  $style_pnddk4="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk4 = "4";
	  $style_pnddk5="  colspan=3D2 style=3D'border-bottom:2.0pt double black;vertical-align:middle'";
	  $val_pnddk5 = "<span class=3Dcode>n</span>";
	  $style_pnddk6="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk6 = "6";
	  $style_pnddk7="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk7 = "7";
	  $style_pnddk8="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk8 = "8";
	  $style_pnddk9="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk9 = "9";
	  $style_pnddk10="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk10 = "10";
  }	  
    elseif($pnddk==6){
	  $style_pnddk1="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk1 = "1";
	  $style_pnddk2="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk2 = "2";
	  $style_pnddk3="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk3 = "3";
	  $style_pnddk4="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk4 = "4";
	  $style_pnddk5="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk5 = "5";
	  $style_pnddk6="  colspan=3D2 style=3D'border-bottom:2.0pt double black;vertical-align:middle'";
	  $val_pnddk6 = "<span class=3Dcode>o</span>";
	  $style_pnddk7="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk7 = "7";
	  $style_pnddk8="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk8 = "8";
	  $style_pnddk9="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk9 = "9";
	  $style_pnddk10="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk10 = "10";
  }	  
    elseif($pnddk==7){
	  $style_pnddk1="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk1 = "1";
	  $style_pnddk2="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk2 = "2";
	  $style_pnddk3="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk3 = "3";
	  $style_pnddk4="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk4 = "4";
	  $style_pnddk5="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk5 = "5";
	  $style_pnddk6="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk6 = "6";
	  $style_pnddk7="  colspan=3D2 style=3D'border-bottom:2.0pt double black;vertical-align:middle'";
	  $val_pnddk7 = "<span class=3Dcode>p</span>";
	  $style_pnddk8="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk8 = "8";
	  $style_pnddk9="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk9 = "9";
	  $style_pnddk10="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk10 = "10";
  }
    elseif($pnddk==8){
	  $style_pnddk1="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk1 = "1";
	  $style_pnddk2="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk2 = "2";
	  $style_pnddk3="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk3 = "3";
	  $style_pnddk4="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk4 = "4";
	  $style_pnddk5="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk5 = "5";
	  $style_pnddk6="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk6 = "6";
	  $style_pnddk7="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk7 = "7";
	  $style_pnddk8="  colspan=3D2 style=3D'border-bottom:2.0pt double black;vertical-align:middle'";
	  $val_pnddk8 = "<span class=3Dcode>q</span>";
	  $style_pnddk9="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk9 = "9";
	  $style_pnddk10="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk10 = "10";
  }	  
    elseif($pnddk==9){
	  $style_pnddk1="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk1 = "1";
	  $style_pnddk2="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk2 = "2";
	  $style_pnddk3="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk3 = "3";
	  $style_pnddk4="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk4 = "4";
	  $style_pnddk5="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk5 = "5";
	  $style_pnddk6="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk6 = "6";
	  $style_pnddk7="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk7 = "7";
	  $style_pnddk8="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk8 = "8";
	  $style_pnddk9="  colspan=3D2 style=3D'border-bottom:2.0pt double black;vertical-align:middle'";
	  $val_pnddk9 = "<span class=3Dcode>r</span>";
	  $style_pnddk10="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none;'";
	  $val_pnddk10 = "10";
  }	  
    elseif($pnddk==10){
	  $style_pnddk1="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk1 = "1";
	  $style_pnddk2="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk2 = "2";
	  $style_pnddk3="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk3 = "3";
	  $style_pnddk4="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk4 = "4";
	  $style_pnddk5="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk5 = "5";
	  $style_pnddk6="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk6 = "6";
	  $style_pnddk7="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk7 = "7";
	  $style_pnddk8="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk8 = "8";
	  $style_pnddk9="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk9 = "9";
	  $style_pnddk10="  colspan=3D2 style=3D'border-bottom:2.0pt double black;vertical-align:middle;border-left:none'";
	  $val_pnddk10 = "<span class=3Dcode>s</span>";
  }	  
  else{
	  $style_pnddk1="  colspan=3D2 style=3D'border-bottom:2.0pt double black;vertical-align:middle'";
	  $val_pnddk1 = "<span class=3Dcode>j</span>";
	  $style_pnddk2="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk2 = "2";
	  $style_pnddk3="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk3 = "3";
	  $style_pnddk4="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk4 = "4";
	  $style_pnddk5="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk5 = "5";
	  $style_pnddk6="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk6 = "6";
	  $style_pnddk7="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk7 = "7";
	  $style_pnddk8="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk8 = "8";
	  $style_pnddk9="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk9 = "9";
	  $style_pnddk10="  colspan=3D2 style=3D'border-bottom:2.0pt double black;border-left:none'";
	  $val_pnddk10 = "10";
  
	
  }
  
  echo "
  <td class=3Dxl13612278 $style_pnddk1>$val_pnddk1</td>
  <td class=3Dxl8212278 $style_pnddk2>$val_pnddk2</td>
  <td class=3Dxl8212278 $style_pnddk3>$val_pnddk3</td>
  <td class=3Dxl8212278 $style_pnddk4>$val_pnddk4</td>
  <td class=3Dxl8212278 $style_pnddk5>$val_pnddk5</td>
  <td class=3Dxl8212278 $style_pnddk6>$val_pnddk6</td>
  <td class=3Dxl8212278 $style_pnddk7>$val_pnddk7</td>
  <td class=3Dxl8212278 $style_pnddk8>$val_pnddk8</td>
  <td class=3Dxl8212278 $style_pnddk9>$val_pnddk9</td>
  <td class=3Dxl18512278  $style_pnddk10>$val_pnddk10</td>";

  ?> 
  
    <?php
	$countkrj = mb_strlen($p['pekerjaan_pen']);
if($countkrj>1){
  $krj = $p['pekerjaan_pen'];
}
else {
  $krj = "0".$p['pekerjaan_pen'];	
}
	 //changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
	 echo changeCell("2", "$krj", " colspan=3D2 class=3Dxl8212278 style=3D'border-bottom:2.0pt double black'", " colspan=3D2 class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'", " colspan=3D2 class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'");
?> 
  
  <td class=3Dxl7512278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7412278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none;border-right:2.0pt double black'>&nbsp;</td>

<?php
$ibu = $p['ibu_pen'];
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("21", "$ibu", " class=3Dxl8212278 style=3D'border-bottom:2.0pt double black'", " class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'", " class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'");
?> 

  <td class=3Dxl7512278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7412278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none;border-right:2.0pt double black'>&nbsp;</td>

  
<?php
$ayah= $p['ayah_pen'];
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("22", "$ayah", " class=3Dxl8212278 style=3D'border-bottom:2.0pt double black'", " class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'", " class=3Dxl8212278 style=3D'border-bottom:2.0pt double black;border-left:none'");
?> 
  <td class=3Dxl7412278 style=3D'border-bottom:2.0pt double black;border-top:none;border-left:none;border-right:2.0pt double black'>&nbsp;</td>
 
 </tr>
<?php
 }
 else {
	 
		if ($p['statusnya']!="4" AND $p['statusnya']!="0") {
			echo " <tr height=3D23 style=3D'mso-height-source:userset;height:17.45pt;display:none'>";
		}
		else { if ($p['statusnya']=="4"){ $NIK= '';} else { $NIK = $p['no_pen'];}
			echo " <tr height=3D23 style=3D'mso-height-source:userset;height:17.45pt'>"; 
			}
			?>
	 
	 
 
  <td height=3D23 class=3Dxl1512278 style=3D'height:17.45pt'></td>
  <td  class=3Dxl20512278 style=3D'border-bottom:.5pt solid black;border-right:2.0pt double black;border-left:2.0pt double black'><?php echo $no; ?></td>
  
  <?php 
  
$counthdk = mb_strlen($p['status_hdk_pen']);
if($counthdk>1){
  $hdk = $p['status_hdk_pen'];
}
else {
  $hdk = "0".$p['status_hdk_pen'];	
}
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("2", "$hdk",  " colspan=3D2 class=3Dxl12612278 style=3D'border-right:none;border-top:none;vertical-align:middle;text-align:center'", " colspan=3D2 class=3Dxl7312278 style=3D'border-top:none;border-left:.5pt solid black;vertical-align:middle;text-align:center'", " colspan=3D2 class=3Dxl7312278");
?> 
  
  <td colspan=3D2 class=3Dxl20512278 style=3D'vertical-align:middle;border-left:2.0pt double black'>
  1</td>
  <td colspan=3D2 class=3Dxl9712278 style=3D'border-left:none;vertical-align:middle'>
  2</td>
  
  <td colspan=3D2 class=3Dxl15812278 style=3D'border-right:.5pt solid black'>1</td>
  <td colspan=3D2 class=3Dxl10812278 style=3D'border-right:.5pt solid black;
  border-left:none'>2</td>
  <td colspan=3D2 class=3Dxl11812278 style=3D'border-right:.5pt solid black;
  border-left:none'>3</td>
  <td colspan=3D2 class=3Dxl11812278 style=3D'border-right:.5pt solid black;
  border-left:none'>4</td>
  <td colspan=3D2 class=3Dxl11812278 style=3D'border-right:.5pt solid black;
  border-left:none'>5</td>
  <td colspan=3D2 class=3Dxl11812278 style=3D'border-right:2.0pt double black;
  border-left:none'>6</td>
  
  
  <?php
$countpnddk = mb_strlen($p['pendidikan_pen']);
if($countpnddk>1){
  $pnddk= $p['pendidikan_pen'];
}
else {
  $pnddk = "0".$p['pendidikan_pen'];	
}

  if($pnddk==1){
	  $style_pnddk1=" colspan=3D2 style=3D'vertical-align:middle'";
	  $val_pnddk1 = "<span class=3Dcode>j</span>";
	  $style_pnddk2="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk2 = "2";
	  $style_pnddk3="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk3 = "3";
	  $style_pnddk4="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk4 = "4";
	  $style_pnddk5="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk5 = "5";
	  $style_pnddk6="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk6 = "6";
	  $style_pnddk7="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk7 = "7";
	  $style_pnddk8="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk8 = "8";
	  $style_pnddk9="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk9 = "9";
	  $style_pnddk10="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk10 = "10";
  }
	
  elseif($pnddk==2){
	  $style_pnddk1="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk1 = "1";
	  $style_pnddk2="  colspan=3D2 style=3D'vertical-align:middle'";
	  $val_pnddk2 = "<span class=3Dcode>k</span>";
	  $style_pnddk3="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk3 = "3";
	  $style_pnddk4="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk4 = "4";
	  $style_pnddk5="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk5 = "5";
	  $style_pnddk6="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk6 = "6";
	  $style_pnddk7="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk7 = "7";
	  $style_pnddk8="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk8 = "8";
	  $style_pnddk9="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk9 = "9";
	  $style_pnddk10="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk10 = "10";
  }	  
    elseif($pnddk==3){
	  $style_pnddk1="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk1 = "1";
	  $style_pnddk2="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk2 = "2";
	  $style_pnddk3="  colspan=3D2 style=3D'vertical-align:middle'";
	  $val_pnddk3 = "<span class=3Dcode>l</span>";
	  $style_pnddk4="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk4 = "4";
	  $style_pnddk5="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk5 = "5";
	  $style_pnddk6="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk6 = "6";
	  $style_pnddk7="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk7 = "7";
	  $style_pnddk8="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk8 = "8";
	  $style_pnddk9="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk9 = "9";
	  $style_pnddk10="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk10 = "10";
  }
    elseif($pnddk==4){
	  $style_pnddk1="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk1 = "1";
	  $style_pnddk2="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk2 = "2";
	  $style_pnddk3="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk3 = "3";
	  $style_pnddk4="  colspan=3D2 style=3D'vertical-align:middle'";
	  $val_pnddk4 = "<span class=3Dcode>m</span>";
	  $style_pnddk5="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk5 = "5";
	  $style_pnddk6="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk6 = "6";
	  $style_pnddk7="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk7 = "7";
	  $style_pnddk8="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk8 = "8";
	  $style_pnddk9="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk9 = "9";
	  $style_pnddk10="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk10 = "10";
  }	 
    elseif($pnddk==5){
	  $style_pnddk1="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk1 = "1";
	  $style_pnddk2="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk2 = "2";
	  $style_pnddk3="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk3 = "3";
	  $style_pnddk4="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk4 = "4";
	  $style_pnddk5="  colspan=3D2 style=3D'vertical-align:middle'";
	  $val_pnddk5 = "<span class=3Dcode>n</span>";
	  $style_pnddk6="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk6 = "6";
	  $style_pnddk7="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk7 = "7";
	  $style_pnddk8="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk8 = "8";
	  $style_pnddk9="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk9 = "9";
	  $style_pnddk10="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk10 = "10";
  }	  
    elseif($pnddk==6){
	  $style_pnddk1="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk1 = "1";
	  $style_pnddk2="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk2 = "2";
	  $style_pnddk3="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk3 = "3";
	  $style_pnddk4="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk4 = "4";
	  $style_pnddk5="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk5 = "5";
	  $style_pnddk6="  colspan=3D2 style=3D'vertical-align:middle'";
	  $val_pnddk6 = "<span class=3Dcode>o</span>";
	  $style_pnddk7="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk7 = "7";
	  $style_pnddk8="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk8 = "8";
	  $style_pnddk9="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk9 = "9";
	  $style_pnddk10="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk10 = "10";
  }	  
    elseif($pnddk==7){
	  $style_pnddk1="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk1 = "1";
	  $style_pnddk2="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk2 = "2";
	  $style_pnddk3="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk3 = "3";
	  $style_pnddk4="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk4 = "4";
	  $style_pnddk5="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk5 = "5";
	  $style_pnddk6="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk6 = "6";
	  $style_pnddk7="  colspan=3D2 style=3D'vertical-align:middle'";
	  $val_pnddk7 = "<span class=3Dcode>p</span>";
	  $style_pnddk8="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk8 = "8";
	  $style_pnddk9="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk9 = "9";
	  $style_pnddk10="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk10 = "10";
  }
    elseif($pnddk==8){
	  $style_pnddk1="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk1 = "1";
	  $style_pnddk2="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk2 = "2";
	  $style_pnddk3="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk3 = "3";
	  $style_pnddk4="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk4 = "4";
	  $style_pnddk5="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk5 = "5";
	  $style_pnddk6="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk6 = "6";
	  $style_pnddk7="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk7 = "7";
	  $style_pnddk8="  colspan=3D2 style=3D'vertical-align:middle'";
	  $val_pnddk8 = "<span class=3Dcode>q</span>";
	  $style_pnddk9="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk9 = "9";
	  $style_pnddk10="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk10 = "10";
  }	  
    elseif($pnddk==9){
	  $style_pnddk1="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk1 = "1";
	  $style_pnddk2="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk2 = "2";
	  $style_pnddk3="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk3 = "3";
	  $style_pnddk4="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk4 = "4";
	  $style_pnddk5="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk5 = "5";
	  $style_pnddk6="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk6 = "6";
	  $style_pnddk7="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk7 = "7";
	  $style_pnddk8="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk8 = "8";
	  $style_pnddk9="  colspan=3D2 style=3D'vertical-align:middle'";
	  $val_pnddk9 = "<span class=3Dcode>r</span>";
	  $style_pnddk10="  colspan=3D2 style=3D'border-left:none;'";
	  $val_pnddk10 = "10";
  }	  
    elseif($pnddk==10){
	  $style_pnddk1="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk1 = "1";
	  $style_pnddk2="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk2 = "2";
	  $style_pnddk3="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk3 = "3";
	  $style_pnddk4="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk4 = "4";
	  $style_pnddk5="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk5 = "5";
	  $style_pnddk6="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk6 = "6";
	  $style_pnddk7="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk7 = "7";
	  $style_pnddk8="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk8 = "8";
	  $style_pnddk9="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk9 = "9";
	  $style_pnddk10="  colspan=3D2 style=3D'vertical-align:middle;border-left:none'";
	  $val_pnddk10 = "<span class=3Dcode>s</span>";
  }	  
  else{
	  $style_pnddk1="  colspan=3D2 style=3D'vertical-align:middle'";
	  $val_pnddk1 = "<span class=3Dcode>j</span>";
	  $style_pnddk2="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk2 = "2";
	  $style_pnddk3="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk3 = "3";
	  $style_pnddk4="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk4 = "4";
	  $style_pnddk5="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk5 = "5";
	  $style_pnddk6="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk6 = "6";
	  $style_pnddk7="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk7 = "7";
	  $style_pnddk8="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk8 = "8";
	  $style_pnddk9="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk9 = "9";
	  $style_pnddk10="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk10 = "10";
  
	
  }
  
  echo "
  <td class=3Dxl13612278 $style_pnddk1>$val_pnddk1</td>
  <td class=3Dxl8212278 $style_pnddk2>$val_pnddk2</td>
  <td class=3Dxl8212278 $style_pnddk3>$val_pnddk3</td>
  <td class=3Dxl8212278 $style_pnddk4>$val_pnddk4</td>
  <td class=3Dxl8212278 $style_pnddk5>$val_pnddk5</td>
  <td class=3Dxl8212278 $style_pnddk6>$val_pnddk6</td>
  <td class=3Dxl8212278 $style_pnddk7>$val_pnddk7</td>
  <td class=3Dxl8212278 $style_pnddk8>$val_pnddk8</td>
  <td class=3Dxl8212278 $style_pnddk9>$val_pnddk9</td>
  <td class=3Dxl18512278  $style_pnddk10>$val_pnddk10</td>";

  ?> 
  
    <?php
		$countkerja = mb_strlen( $p['pekerjaan_pen']);
if($countkerja>1){
  $kerja= $p['pekerjaan_pen'];
}
else {
  $kerja = "0".$p['pekerjaan_pen'];	
}

	 //changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
	 echo changeCell("2", "$kerja", " colspan=3D2 class=3Dxl8212278", " colspan=3D2 class=3Dxl8212278 style=3D'border-left:none'", " colspan=3D2 class=3Dxl8212278 style=3D'border-left:none'");
?> 
  
  <td class=3Dxl7512278 style=3D'border-top:none;border-left:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7412278 style=3D'border-top:none;border-left:none;border-right:2.0pt double black'>&nbsp;</td>

<?php
$ibu = $p['ibu_pen'];
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("21", "$ibu", " class=3Dxl8212278", " class=3Dxl8212278 style=3D'border-left:none'", " class=3Dxl8212278 style=3D'border-left:none'");
?> 

  <td class=3Dxl7512278 style=3D'border-top:none;border-left:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7412278 style=3D'border-top:none;border-left:none;border-right:2.0pt double black'>&nbsp;</td>

  
<?php
$ayah= $p['ayah_pen'];
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("22", "$ayah", " class=3Dxl8212278", " class=3Dxl8212278 style=3D'border-left:none'", " class=3Dxl8212278 style=3D'border-left:none'");
?> 
  <td class=3Dxl7412278 style=3D'border-top:none;border-left:none;border-right:2.0pt double black'>&nbsp;</td>
 
 </tr>
 	 
	 <?php	 
 }
 $no++;
	}
			  }
	
	
	if ($jmldatatr < $batas) {
	$jmltr = $batas-$jmldatatr;
	$jmltrmulai = $jmldatatr+1;
	if($_GET['hal'] >= 2){
		$jmltrmulai = $batas+$jmltrmulai;
		$batasi = $batas*(int)$_GET['hal'];
	}
	else { $batasi = $batas; }
     for ($i=$jmltrmulai; $i<=$batasi; $i++){
     if($i==$batasi){
	 ?> 
	 <tr height=3D23 style=3D'mso-height-source:userset;height:17.45pt'>
 
  <td height=3D23 class=3Dxl1512278 style=3D'height:17.45pt;border-bottom:2.0pt double black'></td>
  <td  class=3Dxl20512278 style=3D'border-bottom:2.0pt double black;border-right:2.0pt double black;border-left:2.0pt double black'><?php echo $i; ?></td>
  
  <?php 
  
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("2", "  ",  " colspan=3D2 class=3Dxl12612278 style=3D'border-right:none;border-top:none;vertical-align:middle;text-align:center;border-bottom:2.0pt double black'", " colspan=3D2 class=3Dxl7312278 style=3D'border-top:none;border-left:.5pt solid black;vertical-align:middle;text-align:center;border-bottom:2.0pt double black'", " colspan=3D2 class=3Dxl7312278");
?> 
  
  <td colspan=3D2 class=3Dxl20512278 style=3D'vertical-align:middle;border-left:2.0pt double black;border-bottom:2.0pt double black'>
  1</td>
  <td colspan=3D2 class=3Dxl9712278 style=3D'border-left:none;vertical-align:middle;border-bottom:2.0pt double black'>
  2</td>
  
  <td colspan=3D2 class=3Dxl15812278 style=3D'border-right:.5pt solid black;border-bottom:2.0pt double black'>1</td>
  <td colspan=3D2 class=3Dxl10812278 style=3D'border-right:.5pt solid black;
  border-left:none;border-bottom:2.0pt double black'>2</td>
  <td colspan=3D2 class=3Dxl11812278 style=3D'border-right:.5pt solid black;
  border-left:none;border-bottom:2.0pt double black'>3</td>
  <td colspan=3D2 class=3Dxl11812278 style=3D'border-right:.5pt solid black;
  border-left:none;border-bottom:2.0pt double black'>4</td>
  <td colspan=3D2 class=3Dxl11812278 style=3D'border-right:.5pt solid black;
  border-left:none;border-bottom:2.0pt double black'>5</td>
  <td colspan=3D2 class=3Dxl11812278 style=3D'border-right:2.0pt double black;
  border-left:none;border-bottom:2.0pt double black'>6</td>
  
  
  <?php

	  $style_pnddk1="  colspan=3D2 style=3D'border-left:none;border-bottom:2.0pt double black'";
	  $val_pnddk1 = "1";
	  $style_pnddk2="  colspan=3D2 style=3D'border-left:none;border-bottom:2.0pt double black'";
	  $val_pnddk2 = "2";
	  $style_pnddk3="  colspan=3D2 style=3D'border-left:none;border-bottom:2.0pt double black'";
	  $val_pnddk3 = "3";
	  $style_pnddk4="  colspan=3D2 style=3D'border-left:none;border-bottom:2.0pt double black'";
	  $val_pnddk4 = "4";
	  $style_pnddk5="  colspan=3D2 style=3D'border-left:none;border-bottom:2.0pt double black'";
	  $val_pnddk5 = "5";
	  $style_pnddk6="  colspan=3D2 style=3D'border-left:none;border-bottom:2.0pt double black'";
	  $val_pnddk6 = "6";
	  $style_pnddk7="  colspan=3D2 style=3D'border-left:none;border-bottom:2.0pt double black'";
	  $val_pnddk7 = "7";
	  $style_pnddk8="  colspan=3D2 style=3D'border-left:none;border-bottom:2.0pt double black'";
	  $val_pnddk8 = "8";
	  $style_pnddk9="  colspan=3D2 style=3D'border-left:none;border-bottom:2.0pt double black'";
	  $val_pnddk9 = "9";
	  $style_pnddk10="  colspan=3D2 style=3D'border-left:none;border-bottom:2.0pt double black'";
	  $val_pnddk10 = "10";

  
  echo "
  <td class=3Dxl13612278 $style_pnddk1>$val_pnddk1</td>
  <td class=3Dxl8212278 $style_pnddk2>$val_pnddk2</td>
  <td class=3Dxl8212278 $style_pnddk3>$val_pnddk3</td>
  <td class=3Dxl8212278 $style_pnddk4>$val_pnddk4</td>
  <td class=3Dxl8212278 $style_pnddk5>$val_pnddk5</td>
  <td class=3Dxl8212278 $style_pnddk6>$val_pnddk6</td>
  <td class=3Dxl8212278 $style_pnddk7>$val_pnddk7</td>
  <td class=3Dxl8212278 $style_pnddk8>$val_pnddk8</td>
  <td class=3Dxl8212278 $style_pnddk9>$val_pnddk9</td>
  <td class=3Dxl18512278  $style_pnddk10>$val_pnddk10</td>";

  ?> 
  
    <?php

	 //changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
	 echo changeCell("2", "  ", " colspan=3D2 class=3Dxl8212278 STYLE=3D'border-bottom:2.0pt double black'", " colspan=3D2 class=3Dxl8212278 style=3D'border-left:none;border-bottom:2.0pt double black'", " colspan=3D2 class=3Dxl8212278 style=3D'border-left:none;border-bottom:2.0pt double black'");
?> 
  
  <td class=3Dxl7512278 style=3D'border-top:none;border-left:2.0pt double black;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7412278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black;border-right:2.0pt double black'>&nbsp;</td>

<?php 
echo changeCell("20", "", " class=3Dxl8212278 style=3D'border-bottom:2.0pt double black'", " class=3Dxl8212278 style=3D'border-left:none;border-bottom:2.0pt double black'", " class=3Dxl8212278 style=3D'border-left:none;border-bottom:2.0pt double black'");
?> 

  <td class=3Dxl7512278 style=3D'border-top:none;border-left:2.0pt double black;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7412278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black;border-right:2.0pt double black'>&nbsp;</td>

  
<?php 
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("21", "", " class=3Dxl8212278 style=3D'border-bottom:2.0pt double black'", " class=3Dxl8212278 style=3D'border-left:none;border-bottom:2.0pt double black'", " class=3Dxl8212278 style=3D'border-left:none;border-bottom:2.0pt double black'");
?> 
  <td class=3Dxl7412278 style=3D'border-top:none;border-left:none;border-bottom:2.0pt double black;border-right:2.0pt double black'>&nbsp;</td>
 
 </tr>
 	 
	 <?php 
	 }
	 else {
		 ?>
		 
		 
	 <tr height=3D23 style=3D'mso-height-source:userset;height:17.45pt'>
 
  <td height=3D23 class=3Dxl1512278 style=3D'height:17.45pt'></td>
  <td  class=3Dxl20512278 style=3D'border-bottom:.5pt solid black;border-right:2.0pt double black;border-left:2.0pt double black'><?php echo $i; ?></td>
  
  <?php 
  
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("2", "  ",  " colspan=3D2 class=3Dxl12612278 style=3D'border-right:none;border-top:none;vertical-align:middle;text-align:center'", " colspan=3D2 class=3Dxl7312278 style=3D'border-top:none;border-left:.5pt solid black;vertical-align:middle;text-align:center'", " colspan=3D2 class=3Dxl7312278");
?> 
  
  <td colspan=3D2 class=3Dxl20512278 style=3D'vertical-align:middle;border-left:2.0pt double black'>
  1</td>
  <td colspan=3D2 class=3Dxl9712278 style=3D'border-left:none;vertical-align:middle'>
  2</td>
  
  <td colspan=3D2 class=3Dxl15812278 style=3D'border-right:.5pt solid black'>1</td>
  <td colspan=3D2 class=3Dxl10812278 style=3D'border-right:.5pt solid black;
  border-left:none'>2</td>
  <td colspan=3D2 class=3Dxl11812278 style=3D'border-right:.5pt solid black;
  border-left:none'>3</td>
  <td colspan=3D2 class=3Dxl11812278 style=3D'border-right:.5pt solid black;
  border-left:none'>4</td>
  <td colspan=3D2 class=3Dxl11812278 style=3D'border-right:.5pt solid black;
  border-left:none'>5</td>
  <td colspan=3D2 class=3Dxl11812278 style=3D'border-right:2.0pt double black;
  border-left:none;'>6</td>
  
  
  <?php

	  $style_pnddk1="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk1 = "1";
	  $style_pnddk2="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk2 = "2";
	  $style_pnddk3="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk3 = "3";
	  $style_pnddk4="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk4 = "4";
	  $style_pnddk5="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk5 = "5";
	  $style_pnddk6="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk6 = "6";
	  $style_pnddk7="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk7 = "7";
	  $style_pnddk8="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk8 = "8";
	  $style_pnddk9="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk9 = "9";
	  $style_pnddk10="  colspan=3D2 style=3D'border-left:none'";
	  $val_pnddk10 = "10";

  
  echo "
  <td class=3Dxl13612278 $style_pnddk1>$val_pnddk1</td>
  <td class=3Dxl8212278 $style_pnddk2>$val_pnddk2</td>
  <td class=3Dxl8212278 $style_pnddk3>$val_pnddk3</td>
  <td class=3Dxl8212278 $style_pnddk4>$val_pnddk4</td>
  <td class=3Dxl8212278 $style_pnddk5>$val_pnddk5</td>
  <td class=3Dxl8212278 $style_pnddk6>$val_pnddk6</td>
  <td class=3Dxl8212278 $style_pnddk7>$val_pnddk7</td>
  <td class=3Dxl8212278 $style_pnddk8>$val_pnddk8</td>
  <td class=3Dxl8212278 $style_pnddk9>$val_pnddk9</td>
  <td class=3Dxl18512278  $style_pnddk10>$val_pnddk10</td>";

  ?> 
  
    <?php

	 //changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
	 echo changeCell("2", "  ", " colspan=3D2 class=3Dxl8212278", " colspan=3D2 class=3Dxl8212278 style=3D'border-left:none'", " colspan=3D2 class=3Dxl8212278 style=3D'border-left:none'");
?> 
  
  <td class=3Dxl7512278 style=3D'border-top:none;border-left:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7412278 style=3D'border-top:none;border-left:none;border-right:2.0pt double black'>&nbsp;</td>

<?php 
echo changeCell("20", "", " class=3Dxl8212278", " class=3Dxl8212278 style=3D'border-left:none'", " class=3Dxl8212278 style=3D'border-left:none'");
?> 

  <td class=3Dxl7512278 style=3D'border-top:none;border-left:2.0pt double black'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7312278 style=3D'border-top:none;border-left:none'>&nbsp;</td>
  <td class=3Dxl7412278 style=3D'border-top:none;border-left:none;border-right:2.0pt double black'>&nbsp;</td>

  
<?php 
//changeCell("jmlkolom"," atribut_td pertama", " atribut_td_selanjutnya'", " atribut_td_sisanya");
echo changeCell("22", "", " class=3Dxl8212278 style=3D'", " class=3Dxl8212278 style=3D'border-left:none'", " class=3Dxl8212278 style=3D'border-left:none'");
?> 
  <td class=3Dxl7412278 style=3D'border-top:none;border-left:none;border-right:2.0pt double black'>&nbsp;</td>
 
 </tr>
 	 
		 
		 <?php
	 }
	 }
	}
	?>
 <!--data 2 // -->
<tr height=3D18 style=3D'height:13.5pt'>
  <td height=3D18 class=3Dxl1512278 style=3D'height:13.5pt'></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D14 style=3D'mso-height-source:userset;height:10.5pt'>
  <td height=3D14 class=3Dxl1512278 style=3D'height:10.5pt'></td>
  <td class=3Dxl1512278 colspan=3D5>Nama Ketua RT</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278>:</td>
  <td colspan=3D30 class=3Dxl6512278><?php echo $nama_rt; ?></td>
  
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl8812278>&nbsp;</td>
  <td class=3Dxl8812278>&nbsp;</td>
  <td class=3Dxl8812278>&nbsp;</td>
  <td class=3Dxl8812278>&nbsp;</td>
  <td class=3Dxl8812278>&nbsp;</td>
  <td class=3Dxl8812278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td colspan=3D13 class=3Dxl8012278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td colspan=3D13 class=3Dxl8012278><?php echo $alamatkabkk; ?>,
   <?php   if(isset($_GET[tglbuat])){
  echo $_GET['tglbuat'];
  }
  else {
  echo date('d-m-Y');
  }
  ?></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D17 style=3D'height:12.75pt'>
  <td height=3D17 class=3Dxl1512278 style=3D'height:12.75pt'></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl8012278></td>
  <td class=3Dxl8012278></td>
  <td class=3Dxl8012278></td>
  <td class=3Dxl8012278></td>
  <td class=3Dxl8012278></td>
  <td class=3Dxl8012278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td colspan=3D54 class=3Dxl8012278>Mengetahui,</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td colspan=3D13 class=3Dxl8012278>Kepala Keluarga,</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D17 style=3D'height:12.75pt'>
  <td height=3D17 class=3Dxl1512278 style=3D'height:12.75pt'></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td colspan=3D20 rowspan=3D2 class=3Dxl19712278 width=3D349 style=3D'widt=
h:267pt'>Kepala
  Dinas Kependudukan dan Pencatatan Sipil <?php echo $alamatkabkk2; ?></td>
  <td colspan=3D20 class=3Dxl19812278><?php echo $alamatkeckk2; ?></td>
  <td class=3Dxl8012278></td>
  <td colspan=3D13 class=3Dxl10412278>Kepala <?php echo $alamatdesakk2; ?></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D28 style=3D'mso-height-source:userset;height:21.0pt'>
  <td height=3D28 class=3Dxl1512278 style=3D'height:21.0pt'></td>
  <td class=3Dxl1512278 colspan=3D5>Nama Ketua RW</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278>:</td>
  <td colspan=3D30 class=3Dxl6512278><?php echo $k['nama_ketua_rw']; ?></td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278 colspan=3D6><!--TTD--></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D17 style=3D'height:12.75pt'>
  <td height=3D17 class=3Dxl1512278 style=3D'height:12.75pt'></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D29 style=3D'mso-height-source:userset;height:21.75pt'>
  <td height=3D29 class=3Dxl1512278 style=3D'height:21.75pt'></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl6512278 colspan=3D6><!--nama lengkap disduk--></td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl6512278 colspan=3D6><!--nama lengkap camat--></td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl6512278>&nbsp;</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl8012278></td>
  <td colspan=3D13 class=3Dxl19612278><!--nama lengkap kades--></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D17 style=3D'height:12.75pt'>
  <td height=3D17 class=3Dxl1512278 style=3D'height:12.75pt'></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278 colspan=3D2>NIP :</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278 colspan=3D2>NIP :</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl8012278></td>
  <td colspan=3D13 class=3Dxl10412278>NIP :</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl6512278 colspan=3D12 style=3D'text-align:center'><?php echo $namakk; ?> </td>
  
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D18 style=3D'mso-height-source:userset;height:13.5pt'>
  <td height=3D18 class=3Dxl1512278 style=3D'height:13.5pt'></td>
  <td class=3Dxl9012278 colspan=3D5>PERNYATAAN</td>
  <td class=3Dxl9012278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D17 style=3D'height:12.75pt'>
  <td height=3D17 class=3Dxl1512278 style=3D'height:12.75pt'></td>
  <td class=3Dxl1512278 colspan=3D35>Demikian Formulir ini saya/kami isi de=
ngan
  sesungguhnya apabila keterangan tersebut tidak sesuai dengan</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D17 style=3D'height:12.75pt'>
  <td height=3D17 class=3Dxl1512278 style=3D'height:12.75pt'></td>
  <td class=3Dxl1512278 colspan=3D39>keadaan sebenarnya, saya bersedia dike=
nakan
  sanksi sesuai ketentuan peraturan perundang-undangan yang berlaku</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D17 style=3D'height:12.75pt'>
  <td height=3D17 class=3Dxl1512278 style=3D'height:12.75pt'></td>
  <td class=3Dxl1512278 colspan=3D26>Catatan : *) Hanya diisi oleh salah sa=
tu
  pasangan keluarga tersebut (suami/istri)</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D17 style=3D'height:12.75pt'>
  <td height=3D17 class=3Dxl1512278 style=3D'height:12.75pt'></td>
  <td class=3Dxl1512278 colspan=3D61><span style=3D'mso-spacerun:yes'>     
          
  </span>**) Hanya ditandatangani oleh Kepala Dinas Kependudukan dan Pencatatan
  Sipil Kabupaten/Kota, apabila pencatatan biodata dilakukan oleh WNI yang
  datang dari luar negeri</td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D17 style=3D'height:12.75pt'>
  <td height=3D17 class=3Dxl1512278 style=3D'height:12.75pt'></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D17 style=3D'height:12.75pt'>
  <td height=3D17 class=3Dxl1512278 style=3D'height:12.75pt'></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D17 style=3D'height:12.75pt'>
  <td height=3D17 class=3Dxl1512278 style=3D'height:12.75pt'></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D17 style=3D'height:12.75pt'>
  <td height=3D17 class=3Dxl1512278 style=3D'height:12.75pt'></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <tr height=3D17 style=3D'height:12.75pt'>
  <td height=3D17 class=3Dxl1512278 style=3D'height:12.75pt'></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
  <td class=3Dxl1512278></td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=3D0 style=3D'display:none'>
  <td width=3D0></td>
  <td width=3D26 style=3D'width:20pt'></td>
  <td width=3D18 style=3D'width:14pt'></td>
  <td width=3D20 style=3D'width:15pt'></td>
  <td width=3D20 style=3D'width:15pt'></td>
  <td width=3D20 style=3D'width:15pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D27 style=3D'width:20pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D20 style=3D'width:15pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D20 style=3D'width:15pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D22 style=3D'width:17pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D22 style=3D'width:17pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D22 style=3D'width:17pt'></td>
  <td width=3D21 style=3D'width:16pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D19 style=3D'width:14pt'></td>
  <td width=3D19 style=3D'width:14pt'></td>
  <td width=3D20 style=3D'width:15pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D20 style=3D'width:15pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D20 style=3D'width:15pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D20 style=3D'width:15pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D17 style=3D'width:13pt'></td>
  <td width=3D22 style=3D'width:17pt'></td>
  <td width=3D20 style=3D'width:15pt'></td>
 </tr>
 <![endif]>
</table>


</body>

</html>

------=_NextPart_01D1BB37.BA791D70
Content-Location: file:///C:/B133D8F3/TES_files/image001.png
Content-Transfer-Encoding: base64
Content-Type: image/png

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
LwAAAABJRU5ErkJggk==

------=_NextPart_01D1BB37.BA791D70
Content-Location: file:///C:/B133D8F3/TES_files/image002.gif
Content-Transfer-Encoding: base64
Content-Type: image/gif

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
2f8NgIAAADs=

------=_NextPart_01D1BB37.BA791D70
Content-Location: file:///C:/B133D8F3/TES_files/filelist.xml
Content-Transfer-Encoding: quoted-printable
Content-Type: text/xml; charset="utf-8"

<xml xmlns:o=3D"urn:schemas-microsoft-com:office:office">
 <o:MainFile HRef=3D"../TES.htm"/>
 <o:File HRef=3D"stylesheet.css"/>
 <o:File HRef=3D"tabstrip.htm"/>
 <o:File HRef=3D"sheet001.htm"/>
 <o:File HRef=3D"image001.png"/>
 <o:File HRef=3D"image002.gif"/>
 <o:File HRef=3D"filelist.xml"/>
</xml>
------=_NextPart_01D1BB37.BA791D70--
