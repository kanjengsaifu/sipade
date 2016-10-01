<?php

// LEMBAR KTP
	$rule_std = mysql_query("select * from pengaturan where id='2'");
	$rule=mysql_fetch_array($rule_std);
	$rule_cap = mysql_query("select * from pengaturan where id='1'");
	$rulecap=mysql_fetch_array($rule_cap);
	$set_pejabat = mysql_query("select * from pejabat where id='$_POST[ybt]' ");
	$setpejabat=mysql_fetch_array($set_pejabat);
	$RULEDESA = $rule['desa'];
	$RULEKODEDESA = $rule['kodedesa'];
	$RULEKEC = $rule['kecamatan'];
	$RULEKAB = $rule['kabupaten'];
	$RULEKODEKAB = $rule['kodekab'];
	$RULEPROV = $rule['provinsi'];
	$RULEALMT = $rule['alamat'];
	$RULEKODEPOS = $rule['kodepos'];
	
	$RULECAPKODE = $rulecap['kodekab'];
	$RULECAPDESA = $rulecap['desa'];
	$RULEKODEDESA = $rulecap['kodedesa'];
	$RULECAPKEC = $rulecap['kecamatan'];
	$RULEKODEKEC =  substr($RULECAPKODE ,4,4);
	$RULECAPKAB = $rulecap['kabupaten'];
	$RULEKODEKAB =  substr($RULECAPKODE ,2,2);
	$RULECAPPROV = $rulecap['provinsi'];
	$RULEKODEPROV = substr($RULECAPKODE ,0,2);
	$RULECAPALMT = $rulecap['alamat'];
	$RULECAPKODEPOS = $rulecap['kodepos'];

	
	if ($_POST[tglbuat]!==''){ // menentukan kewarganegaraan (1=WNI)
$TGLBUAT = $_POST['tglbuat'];
		}
		else {
		$TGLBUAT = date('d-m-Y');
		}
  $TGLBUAT = tgl_mod1($TGLBUAT);
  
$NAMA = $_POST['nama'];
$NAMA = ubah_huruf_ke_besar($NAMA);
$NOID = preg_replace('/\D/', '', $_POST['noid']);
$NOKK = preg_replace('/\D/', '', $_POST['nokk']);
$RT = $_POST['rt'];
$RW	 = $_POST['rw']; 
$ALMT = ubah_huruf_ke_besar($_POST['almt']);
$DESA = ubah_huruf_ke_besar($_POST['desa']);
$KEC = ubah_huruf_ke_besar($_POST['kec']);
$KAB = ubah_huruf_ke_besar($_POST['kab']);

$PERMOHONAN = $_POST[permohonanktp];
  
  if ($PERMOHONAN=="1"){
  $PERMOHONANTEXTI = "#";
  $PERMOHONANTEXTII= "&nbsp";
  $PERMOHONANTEXTIII= "&nbsp";
  }
  elseif ($PERMOHONAN=="2"){
  $PERMOHONANTEXTI = "&nbsp";
  $PERMOHONANTEXTII= "#";
  $PERMOHONANTEXTIII= "&nbsp";
  }
  elseif ($PERMOHONAN=="3"){
  $PERMOHONANTEXTI = "&nbsp";
  $PERMOHONANTEXTII= "&nbsp";
  $PERMOHONANTEXTIII= "#";
  }

?>


<?php

		function changeCell($jmlkolom,$text,$attr1,$attr2,$attr3){
			$nm = "$text";
			$count = mb_strlen($nm);
			$nm = (string)$nm; // convert into a string
			$arr = str_split($nm, "1"); // break string in 3 character sets
			$ino=1;
			foreach ($arr as $hrf) {  
				$hrf=ucwords(strtolower($hrf));  
				$echo.="<td".$attr1.">
						    <p".$attr2."><span".$attr3.">".$hrf."</span><o:p></o:p></p>
							</td>";
				
				$ino++;		
				} 

			if ($count< $jmlkolom){
			$jml = $jmlkolom-$count;
			}
			for ($i=1; $i<=$jml; $i++){
					$echo.="<td".$attr1.">
						    <p".$attr2."><span".$attr3.">&nbsp;</span><o:p></o:p></p>
							</td>"	; 
			}
		return $echo; 
		}
		
		
		function changeCellR($jmlkolom,$text,$attr1,$attr2,$attr3){
			$nm = "$text";
			$count = mb_strlen($nm);
			$nm = (string)$nm; // convert into a string
			$arr = str_split($nm, "1"); // break string in 3 character sets
			$ino=1;
			
			if ($count< $jmlkolom){
			$jml = $jmlkolom-$count;
			}
			for ($i=1; $i<=$jml; $i++){
					$echo.="<td".$attr1.">
						    <p".$attr2."><span".$attr3.">0</span><o:p></o:p></p>
							</td>"	; 
			}
			foreach ($arr as $hrf) {  
				$hrf=ucwords(strtolower($hrf));  
				$echo.="<td".$attr1.">
						    <p".$attr2."><span".$attr3.">".$hrf."</span><o:p></o:p></p>
							</td>";
				
				$ino++;		
				} 

		return $echo; 
		}
		
		
		
?>
<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 15">
<meta name=Originator content="Microsoft Word 15">
<link rel=File-List href="sk_tp_files/filelist.xml">
<link rel=Edit-Time-Data href="sk_tp_files/editdata.mso">
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
w\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>Ade Arwans</o:Author>
  <o:LastAuthor>Adeas</o:LastAuthor>
  <o:Revision>2</o:Revision>
  <o:TotalTime>5</o:TotalTime>
  <o:Created>2016-09-26T15:26:00Z</o:Created>
  <o:LastSaved>2016-09-26T15:26:00Z</o:LastSaved>
  <o:Pages>1</o:Pages>
  <o:Words>144</o:Words>
  <o:Characters>826</o:Characters>
  <o:Lines>6</o:Lines>
  <o:Paragraphs>1</o:Paragraphs>
  <o:CharactersWithSpaces>969</o:CharactersWithSpaces>
  <o:Version>16.00</o:Version>
 </o:DocumentProperties>
</xml><![endif]-->
<link rel=themeData href="sk_tp_files/themedata.thmx">
<link rel=colorSchemeMapping href="sk_tp_files/colorschememapping.xml">
<!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:View>Print</w:View>
  <w:SpellingState>Clean</w:SpellingState>
  <w:GrammarState>Clean</w:GrammarState>
  <w:TrackMoves>false</w:TrackMoves>
  <w:TrackFormatting/>
  <w:ValidateAgainstSchemas/>
  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
  <w:DoNotPromoteQF/>
  <w:LidThemeOther>EN-US</w:LidThemeOther>
  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>
  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>
  <w:Compatibility>
   <w:BreakWrappedTables/>
   <w:SplitPgBreakAndParaMark/>
  </w:Compatibility>
  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>
  <m:mathPr>
   <m:mathFont m:val="Cambria Math"/>
   <m:brkBin m:val="before"/>
   <m:brkBinSub m:val="&#45;-"/>
   <m:smallFrac m:val="off"/>
   <m:dispDef/>
   <m:lMargin m:val="0"/>
   <m:rMargin m:val="0"/>
   <m:defJc m:val="centerGroup"/>
   <m:wrapIndent m:val="1440"/>
   <m:intLim m:val="subSup"/>
   <m:naryLim m:val="undOvr"/>
  </m:mathPr></w:WordDocument>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="false"
  DefSemiHidden="false" DefQFormat="false" DefPriority="99"
  LatentStyleCount="373">
  <w:LsdException Locked="false" Priority="0" QFormat="true" Name="Normal"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 1"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 2"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 3"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 4"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 5"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 6"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 7"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 8"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="heading 9"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 6"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 7"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 8"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index 9"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 1"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 2"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 3"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 4"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 5"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 6"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 7"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 8"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" Name="toc 9"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Normal Indent"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="footnote text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="annotation text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="header"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="footer"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="index heading"/>
  <w:LsdException Locked="false" Priority="35" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="caption"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="table of figures"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="envelope address"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="envelope return"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="footnote reference"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="annotation reference"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="line number"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="page number"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="endnote reference"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="endnote text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="table of authorities"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="macro"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="toa heading"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Bullet 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Number 5"/>
  <w:LsdException Locked="false" Priority="10" QFormat="true" Name="Title"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Closing"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Signature"/>
  <w:LsdException Locked="false" Priority="1" SemiHidden="true"
   UnhideWhenUsed="true" Name="Default Paragraph Font"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text Indent"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="List Continue 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Message Header"/>
  <w:LsdException Locked="false" Priority="11" QFormat="true" Name="Subtitle"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Salutation"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Date"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text First Indent"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text First Indent 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Note Heading"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text Indent 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Body Text Indent 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Block Text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Hyperlink"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="FollowedHyperlink"/>
  <w:LsdException Locked="false" Priority="22" QFormat="true" Name="Strong"/>
  <w:LsdException Locked="false" Priority="20" QFormat="true" Name="Emphasis"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Document Map"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Plain Text"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="E-mail Signature"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Top of Form"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Bottom of Form"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Normal (Web)"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Acronym"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Address"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Cite"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Code"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Definition"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Keyboard"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Preformatted"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Sample"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Typewriter"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="HTML Variable"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Normal Table"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="annotation subject"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="No List"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Outline List 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Outline List 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Outline List 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Simple 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Simple 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Simple 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Classic 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Classic 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Classic 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Classic 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Colorful 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Colorful 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Colorful 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Columns 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 6"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 7"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Grid 8"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 6"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 7"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table List 8"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table 3D effects 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table 3D effects 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table 3D effects 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Contemporary"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Elegant"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Professional"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Subtle 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Subtle 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Web 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Web 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Web 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Balloon Text"/>
  <w:LsdException Locked="false" Priority="39" Name="Table Grid"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Table Theme"/>
  <w:LsdException Locked="false" SemiHidden="true" Name="Placeholder Text"/>
  <w:LsdException Locked="false" Priority="1" QFormat="true" Name="No Spacing"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 1"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 1"/>
  <w:LsdException Locked="false" SemiHidden="true" Name="Revision"/>
  <w:LsdException Locked="false" Priority="34" QFormat="true"
   Name="List Paragraph"/>
  <w:LsdException Locked="false" Priority="29" QFormat="true" Name="Quote"/>
  <w:LsdException Locked="false" Priority="30" QFormat="true"
   Name="Intense Quote"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 1"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 1"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 1"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 2"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 2"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 2"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 2"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 3"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 3"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 3"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 3"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 4"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 4"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 4"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 4"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 5"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 5"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 5"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 5"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 6"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 6"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 6"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 6"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="19" QFormat="true"
   Name="Subtle Emphasis"/>
  <w:LsdException Locked="false" Priority="21" QFormat="true"
   Name="Intense Emphasis"/>
  <w:LsdException Locked="false" Priority="31" QFormat="true"
   Name="Subtle Reference"/>
  <w:LsdException Locked="false" Priority="32" QFormat="true"
   Name="Intense Reference"/>
  <w:LsdException Locked="false" Priority="33" QFormat="true" Name="Book Title"/>
  <w:LsdException Locked="false" Priority="37" SemiHidden="true"
   UnhideWhenUsed="true" Name="Bibliography"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="TOC Heading"/>
  <w:LsdException Locked="false" Priority="41" Name="Plain Table 1"/>
  <w:LsdException Locked="false" Priority="42" Name="Plain Table 2"/>
  <w:LsdException Locked="false" Priority="43" Name="Plain Table 3"/>
  <w:LsdException Locked="false" Priority="44" Name="Plain Table 4"/>
  <w:LsdException Locked="false" Priority="45" Name="Plain Table 5"/>
  <w:LsdException Locked="false" Priority="40" Name="Grid Table Light"/>
  <w:LsdException Locked="false" Priority="46" Name="Grid Table 1 Light"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark"/>
  <w:LsdException Locked="false" Priority="51" Name="Grid Table 6 Colorful"/>
  <w:LsdException Locked="false" Priority="52" Name="Grid Table 7 Colorful"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 1"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 1"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 1"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 1"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 1"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 1"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 2"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 2"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 2"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 2"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 2"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 2"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 3"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 3"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 3"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 3"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 3"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 3"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 4"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 4"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 4"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 4"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 4"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 4"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 5"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 5"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 5"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 5"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 5"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 5"/>
  <w:LsdException Locked="false" Priority="46"
   Name="Grid Table 1 Light Accent 6"/>
  <w:LsdException Locked="false" Priority="47" Name="Grid Table 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="48" Name="Grid Table 3 Accent 6"/>
  <w:LsdException Locked="false" Priority="49" Name="Grid Table 4 Accent 6"/>
  <w:LsdException Locked="false" Priority="50" Name="Grid Table 5 Dark Accent 6"/>
  <w:LsdException Locked="false" Priority="51"
   Name="Grid Table 6 Colorful Accent 6"/>
  <w:LsdException Locked="false" Priority="52"
   Name="Grid Table 7 Colorful Accent 6"/>
  <w:LsdException Locked="false" Priority="46" Name="List Table 1 Light"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark"/>
  <w:LsdException Locked="false" Priority="51" Name="List Table 6 Colorful"/>
  <w:LsdException Locked="false" Priority="52" Name="List Table 7 Colorful"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 1"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 1"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 1"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 1"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 1"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 1"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 2"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 2"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 2"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 2"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 2"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 2"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 3"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 3"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 3"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 3"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 3"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 3"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 4"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 4"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 4"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 4"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 4"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 4"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 5"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 5"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 5"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 5"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 5"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 5"/>
  <w:LsdException Locked="false" Priority="46"
   Name="List Table 1 Light Accent 6"/>
  <w:LsdException Locked="false" Priority="47" Name="List Table 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="48" Name="List Table 3 Accent 6"/>
  <w:LsdException Locked="false" Priority="49" Name="List Table 4 Accent 6"/>
  <w:LsdException Locked="false" Priority="50" Name="List Table 5 Dark Accent 6"/>
  <w:LsdException Locked="false" Priority="51"
   Name="List Table 6 Colorful Accent 6"/>
  <w:LsdException Locked="false" Priority="52"
   Name="List Table 7 Colorful Accent 6"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Mention"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   Name="Smart Hyperlink"/>
 </w:LatentStyles>
</xml><![endif]-->
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:1;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:0 0 0 0 0 0;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-536870145 1073786111 1 0 415 0;}
@font-face
	{font-family:Tahoma;
	panose-1:2 11 6 4 3 5 4 4 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520081665 -1073717157 41 0 66047 0;}
@font-face
	{font-family:Cambria;
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-536870145 1073743103 0 0 415 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:0in;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:minor-fareast;
	mso-bidi-font-family:"Times New Roman";}
h1
	{mso-style-priority:9;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Heading 1 Char";
	margin-top:24.0pt;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:0in;
	margin-bottom:.0001pt;
	line-height:115%;
	mso-pagination:widow-orphan;
	page-break-after:avoid;
	mso-outline-level:1;
	font-size:14.0pt;
	font-family:"Cambria",serif;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:minor-fareast;
	color:#365F91;}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-link:"Header Char";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:minor-fareast;
	mso-bidi-font-family:"Times New Roman";}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-link:"Footer Char";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:minor-fareast;
	mso-bidi-font-family:"Times New Roman";}
p.MsoDocumentMap, li.MsoDocumentMap, div.MsoDocumentMap
	{mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-link:"Document Map Char";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:8.0pt;
	font-family:"Tahoma",sans-serif;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:minor-fareast;}
p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
	{mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-link:"Balloon Text Char";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:8.0pt;
	font-family:"Tahoma",sans-serif;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:minor-fareast;}
p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
	{mso-style-priority:34;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:.5in;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:minor-fareast;
	mso-bidi-font-family:"Times New Roman";}
span.Heading1Char
	{mso-style-name:"Heading 1 Char";
	mso-style-priority:9;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Heading 1";
	font-family:"Cambria",serif;
	mso-ascii-font-family:Cambria;
	mso-hansi-font-family:Cambria;
	color:#365F91;
	font-weight:bold;}
p.msonormal0, li.msonormal0, div.msonormal0
	{mso-style-name:msonormal;
	mso-style-unhide:no;
	mso-margin-top-alt:auto;
	margin-right:0in;
	mso-margin-bottom-alt:auto;
	margin-left:0in;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman",serif;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:minor-fareast;}
span.HeaderChar
	{mso-style-name:"Header Char";
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:Header;
	font-family:"Times New Roman",serif;
	mso-ascii-font-family:"Times New Roman";
	mso-hansi-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";}
span.FooterChar
	{mso-style-name:"Footer Char";
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:Footer;
	font-family:"Times New Roman",serif;
	mso-ascii-font-family:"Times New Roman";
	mso-hansi-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";}
span.DocumentMapChar
	{mso-style-name:"Document Map Char";
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Document Map";
	font-family:"Tahoma",sans-serif;
	mso-ascii-font-family:Tahoma;
	mso-hansi-font-family:Tahoma;
	mso-bidi-font-family:Tahoma;}
span.BalloonTextChar
	{mso-style-name:"Balloon Text Char";
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Balloon Text";
	font-family:"Tahoma",sans-serif;
	mso-ascii-font-family:Tahoma;
	mso-hansi-font-family:Tahoma;
	mso-bidi-font-family:Tahoma;}
p.msolistparagraphcxspfirst, li.msolistparagraphcxspfirst, div.msolistparagraphcxspfirst
	{mso-style-name:msolistparagraphcxspfirst;
	mso-style-unhide:no;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.5in;
	margin-bottom:.0001pt;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:minor-fareast;
	mso-bidi-font-family:"Times New Roman";}
p.msolistparagraphcxspmiddle, li.msolistparagraphcxspmiddle, div.msolistparagraphcxspmiddle
	{mso-style-name:msolistparagraphcxspmiddle;
	mso-style-unhide:no;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.5in;
	margin-bottom:.0001pt;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:minor-fareast;
	mso-bidi-font-family:"Times New Roman";}
p.msolistparagraphcxsplast, li.msolistparagraphcxsplast, div.msolistparagraphcxsplast
	{mso-style-name:msolistparagraphcxsplast;
	mso-style-unhide:no;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:.5in;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:minor-fareast;
	mso-bidi-font-family:"Times New Roman";}
p.Normal1, li.Normal1, div.Normal1
	{mso-style-name:Normal1;
	mso-style-unhide:no;
	margin:0in;
	margin-bottom:.0001pt;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Arial",sans-serif;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:minor-fareast;
	color:black;}
p.msochpdefault, li.msochpdefault, div.msochpdefault
	{mso-style-name:msochpdefault;
	mso-style-unhide:no;
	mso-margin-top-alt:auto;
	margin-right:0in;
	mso-margin-bottom-alt:auto;
	margin-left:0in;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Calibri",sans-serif;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:minor-fareast;
	mso-bidi-font-family:"Times New Roman";}
p.msopapdefault, li.msopapdefault, div.msopapdefault
	{mso-style-name:msopapdefault;
	mso-style-unhide:no;
	mso-margin-top-alt:auto;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:0in;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman",serif;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:minor-fareast;}
span.SpellE
	{mso-style-name:"";
	mso-spl-e:yes;}
span.GramE
	{mso-style-name:"";
	mso-gram-e:yes;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	font-size:10.0pt;
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-hansi-font-family:Calibri;}
.MsoPapDefault
	{mso-style-type:export-only;
	margin-bottom:10.0pt;
	line-height:115%;}
@page WordSection1
	{size:8.5in 14.0in;
	margin:4.3pt 9.35pt 41.05pt .3in;
	mso-header-margin:.5in;
	mso-footer-margin:.5in;
	mso-paper-source:0;}
div.WordSection1
	{page:WordSection1;}
-->
</style>
<!--[if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:"Table Normal";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-parent:"";
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-para-margin-top:0in;
	mso-para-margin-right:0in;
	mso-para-margin-bottom:10.0pt;
	mso-para-margin-left:0in;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Calibri",sans-serif;}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext="edit" spidmax="1028"/>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1"/>
 </o:shapelayout></xml><![endif]-->
</head>

<body lang=EN-US style='tab-interval:.5in'>

<div class=WordSection1>

<p class=MsoNormal><!--[if gte vml 1]><v:rect id="Rectangle_x0020_3" o:spid="_x0000_s1027"
 style='position:absolute;margin-left:509.4pt;margin-top:15.2pt;width:57.75pt;
 height:28.5pt;z-index:251659264;visibility:visible;mso-wrap-style:square;
 mso-height-percent:0;mso-wrap-distance-left:9pt;mso-wrap-distance-top:0;
 mso-wrap-distance-right:9pt;mso-wrap-distance-bottom:0;
 mso-position-horizontal:absolute;mso-position-horizontal-relative:text;
 mso-position-vertical:absolute;mso-position-vertical-relative:text;
 mso-height-percent:0;mso-height-relative:margin;v-text-anchor:middle'
 o:gfxdata="UEsDBBQABgAIAAAAIQC2gziS/gAAAOEBAAATAAAAW0NvbnRlbnRfVHlwZXNdLnhtbJSRQU7DMBBF
90jcwfIWJU67QAgl6YK0S0CoHGBkTxKLZGx5TGhvj5O2G0SRWNoz/78nu9wcxkFMGNg6quQqL6RA
0s5Y6ir5vt9lD1JwBDIwOMJKHpHlpr69KfdHjyxSmriSfYz+USnWPY7AufNIadK6MEJMx9ApD/oD
OlTrorhX2lFEilmcO2RdNtjC5xDF9pCuTyYBB5bi6bQ4syoJ3g9WQ0ymaiLzg5KdCXlKLjvcW893
SUOqXwnz5DrgnHtJTxOsQfEKIT7DmDSUCaxw7Rqn8787ZsmRM9e2VmPeBN4uqYvTtW7jvijg9N/y
JsXecLq0q+WD6m8AAAD//wMAUEsDBBQABgAIAAAAIQA4/SH/1gAAAJQBAAALAAAAX3JlbHMvLnJl
bHOkkMFqwzAMhu+DvYPRfXGawxijTi+j0GvpHsDYimMaW0Yy2fr2M4PBMnrbUb/Q94l/f/hMi1qR
JVI2sOt6UJgd+ZiDgffL8ekFlFSbvV0oo4EbChzGx4f9GRdb25HMsYhqlCwG5lrLq9biZkxWOiqY
22YiTra2kYMu1l1tQD30/bPm3wwYN0x18gb45AdQl1tp5j/sFB2T0FQ7R0nTNEV3j6o9feQzro1i
OWA14Fm+Q8a1a8+Bvu/d/dMb2JY5uiPbhG/ktn4cqGU/er3pcvwCAAD//wMAUEsDBBQABgAIAAAA
IQBOPPuGmwIAAI4FAAAOAAAAZHJzL2Uyb0RvYy54bWysVEtv2zAMvg/YfxB0Xx3n0a5BnSJo0WFA
0RZth54VWYoFyKImKbGzXz9KfiToih2G5aCIIvmR/Ezy6rqtNdkL5xWYguZnE0qE4VAqsy3oj9e7
L18p8YGZkmkwoqAH4en16vOnq8YuxRQq0KVwBEGMXza2oFUIdpllnleiZv4MrDColOBqFlB026x0
rEH0WmfTyeQ8a8CV1gEX3uPrbaekq4QvpeDhUUovAtEFxdxCOl06N/HMVldsuXXMVor3abB/yKJm
ymDQEeqWBUZ2Tv0BVSvuwIMMZxzqDKRUXKQasJp88q6al4pZkWpBcrwdafL/D5Y/7J8cUWVBZ5QY
VuMnekbSmNlqQWaRnsb6JVq92CfXSx6vsdZWujr+YxWkTZQeRkpFGwjHx4vZbD5dUMJRNTvPLxeJ
8uzobJ0P3wTUJF4K6jB4IpLt733AgGg6mMRYBu6U1umraRMfPGhVxrckxLYRN9qRPcMPHto8VoAQ
J1YoRc8s1tVVkm7hoEWE0OZZSCQEc5+mRFIrHjEZ58KEvFNVrBRdqMUEf0OwIYsUOgFGZIlJjtg9
wGDZgQzYXc69fXQVqZNH58nfEuucR48UGUwYnWtlwH0EoLGqPnJnP5DUURNZCu2mRZN43UB5wM5x
0I2Ut/xO4Re8Zz48MYczhNOGeyE84iE1NAWF/kZJBe7XR+/RHlsbtZQ0OJMF9T93zAlK9HeDTX+Z
z+dxiJMwX1xMUXCnms2pxuzqG8AuyHEDWZ6u0T7o4Sod1G+4PtYxKqqY4Ri7oDy4QbgJ3a7ABcTF
ep3McHAtC/fmxfIIHgmOHfravjFn+zYO2P8PMMwvW77r5s42ehpY7wJIlVr9yGtPPQ596qF+QcWt
cionq+MaXf0GAAD//wMAUEsDBBQABgAIAAAAIQAGVXhW4QAAAAsBAAAPAAAAZHJzL2Rvd25yZXYu
eG1sTI9BS8NAFITvgv9heYKXYndjgoaYTRFF6UEKVj1422SfSWz2bci+tvHfuz3pcZhh5ptyNbtB
HHAKvScNyVKBQGq87anV8P72dJWDCGzImsETavjBAKvq/Kw0hfVHesXDllsRSygURkPHPBZShqZD
Z8LSj0jR+/KTMxzl1Eo7mWMsd4O8VupGOtNTXOjMiA8dNrvt3mn4XM/cfifP/LIzi4/FuqubzWOt
9eXFfH8HgnHmvzCc8CM6VJGp9nuyQQxRqySP7KwhVRmIUyJJsxRErSG/zUBWpfz/ofoFAAD//wMA
UEsBAi0AFAAGAAgAAAAhALaDOJL+AAAA4QEAABMAAAAAAAAAAAAAAAAAAAAAAFtDb250ZW50X1R5
cGVzXS54bWxQSwECLQAUAAYACAAAACEAOP0h/9YAAACUAQAACwAAAAAAAAAAAAAAAAAvAQAAX3Jl
bHMvLnJlbHNQSwECLQAUAAYACAAAACEATjz7hpsCAACOBQAADgAAAAAAAAAAAAAAAAAuAgAAZHJz
L2Uyb0RvYy54bWxQSwECLQAUAAYACAAAACEABlV4VuEAAAALAQAADwAAAAAAAAAAAAAAAAD1BAAA
ZHJzL2Rvd25yZXYueG1sUEsFBgAAAAAEAAQA8wAAAAMGAAAAAA==
" filled="f" strokecolor="black [3213]" strokeweight="1pt"/><![endif]--><![if !vml]><span
style='mso-ignore:vglayout'>

<table cellpadding=0 cellspacing=0 align=left>
 <tr>
  <td width=678 height=19></td>
 </tr>
 <tr>
  <td></td>
  <td width=83 height=44 style='border:1.0pt solid black;vertical-align:top'><![endif]><![if !mso]><span
  style='position:absolute;mso-ignore:vglayout;z-index:251659264'>
  <table cellpadding=0 cellspacing=0 width="100%">
   <tr>
    <td><![endif]>
    <div v:shape="Rectangle_x0020_3" style='padding:4.6pt 8.2pt 4.6pt 8.2pt'
    class=shape>
    <p class=MsoNormal align=center style='text-align:center'><b
    style='mso-bidi-font-weight:normal'><span style='font-size:16.0pt;
    mso-bidi-font-size:11.0pt;line-height:115%;color:black;mso-themecolor:text1'>F.1.07<o:p></o:p></span></b></p>
    </div>
    <![if !mso]></td>
   </tr>
  </table>
  </span><![endif]><![if !mso & !vml]>&nbsp;<![endif]><![if !vml]></td>
 </tr>
</table>

</span><![endif]><!--[if gte vml 1]><v:shapetype id="_x0000_t75" coordsize="21600,21600"
 o:spt="75" o:preferrelative="t" path="m@4@5l@4@11@9@11@9@5xe" filled="f"
 stroked="f">
 <v:stroke joinstyle="miter"/>
 <v:formulas>
  <v:f eqn="if lineDrawn pixelLineWidth 0"/>
  <v:f eqn="sum @0 1 0"/>
  <v:f eqn="sum 0 0 @1"/>
  <v:f eqn="prod @2 1 2"/>
  <v:f eqn="prod @3 21600 pixelWidth"/>
  <v:f eqn="prod @3 21600 pixelHeight"/>
  <v:f eqn="sum @0 0 1"/>
  <v:f eqn="prod @6 1 2"/>
  <v:f eqn="prod @7 21600 pixelWidth"/>
  <v:f eqn="sum @8 21600 0"/>
  <v:f eqn="prod @7 21600 pixelHeight"/>
  <v:f eqn="sum @10 21600 0"/>
 </v:formulas>
 <v:path o:extrusionok="f" gradientshapeok="t" o:connecttype="rect"/>
 <o:lock v:ext="edit" aspectratio="t"/>
</v:shapetype><v:shape id="Picture_x0020_1" o:spid="_x0000_s1026" type="#_x0000_t75"
 alt="Description: Description: yyyyy" style='position:absolute;margin-left:18.15pt;
 margin-top:15.2pt;width:53.25pt;height:60pt;z-index:-251658240;visibility:visible;
 mso-wrap-style:square;mso-wrap-distance-left:9pt;mso-wrap-distance-top:0;
 mso-wrap-distance-right:9pt;mso-wrap-distance-bottom:0;
 mso-position-horizontal:absolute;mso-position-horizontal-relative:text;
 mso-position-vertical:absolute;mso-position-vertical-relative:text'>
 <v:imagedata src="file:///C:/Users/images/logokab.jpg"/>
 <w:wrap type="square"/>
</v:shape><![endif]--><![if !vml]><img width=71 height=80
src="file:///C:/Users/images/logokab.jpg" align=left hspace=12
alt="Description: Description: yyyyy" v:shapes="Picture_x0020_1"><![endif]><span
style='font-size:14.0pt;line-height:115%'><o:p></o:p></span></p>

<p class=MsoNormal><span class=GramE><span style='font-size:14.0pt;line-height:
115%;letter-spacing:3.0pt'>FORMULIR &nbsp;KARTU</span></span><span
style='font-size:14.0pt;line-height:115%;letter-spacing:3.0pt'> &nbsp;TANDA
&nbsp;PENDUDUK &nbsp;(KTP)</span><span style='font-size:14.0pt;line-height:
115%'><o:p></o:p></span></p>

<p class=MsoNormal><span style='font-size:4.0pt;line-height:115%'>&nbsp;</span></p>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width="97%"
 style='width:97.94%;border-collapse:collapse;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 0in 0in 0in'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:.15in'>
  <td width="100%" nowrap style='width:100.0%;border-top:solid windowtext 1.0pt;
  border-left:solid windowtext 1.0pt;border-bottom:none;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.15in'>
  <p class=MsoNormal style='margin-top:0in;margin-right:3.35pt;margin-bottom:
  0in;margin-left:0in;margin-bottom:.0001pt;line-height:normal'><span
  class=SpellE><span class=GramE><span style='font-size:8.0pt;font-family:"Arial",sans-serif;
  color:black'>Perhatian</span></span></span><span class=GramE><span
  style='font-size:8.0pt;font-family:"Arial",sans-serif;color:black'> :</span></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;height:.15in'>
  <td width="100%" nowrap style='width:100.0%;border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:none;border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:.15in'>
  <p class=MsoNormal style='margin-top:0in;margin-right:3.35pt;margin-bottom:
  0in;margin-left:0in;margin-bottom:.0001pt;line-height:normal'><span
  style='font-size:8.0pt;font-family:"Arial",sans-serif;color:black'>1.&nbsp;&nbsp;<span
  class=SpellE>Harap</span> <span class=SpellE>diisi</span> <span class=SpellE>dengan</span>
  <span class=SpellE>huruf</span> <span class=SpellE>cetak</span> <span
  class=SpellE>dan</span> <span class=SpellE>menggunakan</span> <span
  class=SpellE>tinta</span> <span class=SpellE>hitam</span></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2;height:.15in'>
  <td width="100%" nowrap style='width:100.0%;border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:none;border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:.15in'>
  <p class=MsoNormal style='margin-top:0in;margin-right:3.35pt;margin-bottom:
  0in;margin-left:0in;margin-bottom:.0001pt;line-height:normal'><span
  style='font-size:8.0pt;font-family:"Arial",sans-serif;color:black'>2.&nbsp;&nbsp;<span
  class=SpellE>Untuk</span> <span class=SpellE>kolom</span> <span class=SpellE>pilihan</span>,
  <span class=SpellE>harap</span> <span class=SpellE><span class=GramE>memberi</span></span><span
  class=GramE>&nbsp; <span class=SpellE>tanda</span></span> <span class=SpellE>silang</span>
  (X) <span class=SpellE>pada</span> <span class=SpellE>kotak</span> <span
  class=SpellE>pilihan</span></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:3;mso-yfti-lastrow:yes;height:.15in'>
  <td width="100%" nowrap style='width:100.0%;border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.15in'>
  <p class=MsoNormal style='margin-top:0in;margin-right:3.35pt;margin-bottom:
  0in;margin-left:0in;margin-bottom:.0001pt;line-height:normal'><span
  style='font-size:8.0pt;font-family:"Arial",sans-serif;color:black'>3.&nbsp; <span
  class=SpellE>Selelah</span> <span class=SpellE>formulir</span> <span
  class=SpellE>ini</span> <span class=SpellE>diisi</span> <span class=SpellE>dan</span>
  <span class=SpellE>ditandatangani</span>, <span class=SpellE>harap</span> <span
  class=SpellE>diserahkan</span> <span class=SpellE>kembali</span> <span
  class=SpellE>ke</span> <span class=SpellE>kantor</span> <span class=SpellE>Desa</span>/<span
  class=SpellE>Kelurahan</span></span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt'><span
style='font-size:5.0pt;line-height:115%'>&nbsp;</span></p>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width="85%"
 style='width:85.3%;border-collapse:collapse;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 0in 0in 0in'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:.15in'>
  <td width="26%" nowrap style='width:26.02%;padding:0in 5.4pt 0in 5.4pt;
  height:.15in'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif;
  color:black'>PEMERINTAHAN PROPINSI</span></p>
  </td>
  <td width="4%" nowrap style='width:4.3%;padding:0in 5.4pt 0in 5.4pt;
  height:.15in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>:</span></p>
  </td>
   <?php echo changeCell("2",$RULEKODEPROV," width='3%' nowrap style='width:3.9%;border:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.15in''"," class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal''"," style='font-size:8.0pt;
  font-family:\"Arial\",sans-serif;color:black'"); ?>
  
  <td width="3%" nowrap style='width:3.88%;padding:0in 5.4pt 0in 5.4pt;
  height:.15in'></td>
  <td width="3%" nowrap style='width:3.88%;padding:0in 5.4pt 0in 5.4pt;
  height:.15in'></td>
  <td width="7%" nowrap style='width:7.7%;padding:0in 5.4pt 0in 5.4pt;
  height:.15in'></td>
  <td width="46%" nowrap style='width:46.44%;border:solid windowtext 1.0pt;
  border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:.15in'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif;
  color:black'>&nbsp;<?php echo $RULECAPPROV; ?></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;height:.15in'>
  <td width="26%" nowrap style='width:26.02%;padding:0in 5.4pt 0in 5.4pt;
  height:.15in'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif;
  color:black'>PEMERINTAHAN KABUPATEN</span></p>
  </td>
  <td width="4%" nowrap style='width:4.3%;padding:0in 5.4pt 0in 5.4pt;
  height:.15in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>:</span></p>
  </td>
  
   <?php echo changeCell("2",$RULEKODEPROV," width='3%' nowrap style='width:3.9%;border:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.15in''"," class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal''"," style='font-size:8.0pt;
  font-family:\"Arial\",sans-serif;color:black'"); ?>
  
  <td width="3%" nowrap style='width:3.88%;padding:0in 5.4pt 0in 5.4pt;
  height:.15in'></td>
  <td width="3%" nowrap style='width:3.88%;padding:0in 5.4pt 0in 5.4pt;
  height:.15in'></td>
  <td width="7%" nowrap style='width:7.7%;padding:0in 5.4pt 0in 5.4pt;
  height:.15in'></td>
  <td width="46%" nowrap style='width:46.44%;border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.15in'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif;
  color:black'>&nbsp;<?php echo $RULECAPKAB; ?></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2;height:.15in'>
  <td width="26%" nowrap style='width:26.02%;padding:0in 5.4pt 0in 5.4pt;
  height:.15in'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif;
  color:black'>KECAMATAN</span></p>
  </td>
  <td width="4%" nowrap style='width:4.3%;padding:0in 5.4pt 0in 5.4pt;
  height:.15in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>:</span></p>
  </td>
  
   <?php echo changeCell("2",$RULEKODEPROV," width='3%' nowrap style='width:3.9%;border:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.15in''"," class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal''"," style='font-size:8.0pt;
  font-family:\"Arial\",sans-serif;color:black'"); ?>
  
  <td width="3%" nowrap style='width:3.88%;padding:0in 5.4pt 0in 5.4pt;
  height:.15in'></td>
  <td width="3%" nowrap style='width:3.88%;padding:0in 5.4pt 0in 5.4pt;
  height:.15in'></td>
  <td width="7%" nowrap style='width:7.7%;padding:0in 5.4pt 0in 5.4pt;
  height:.15in'></td>
  <td width="46%" nowrap style='width:46.44%;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:.15in'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif;
  color:black'>&nbsp;<?php echo $RULECAPKEC; ?></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:3;mso-yfti-lastrow:yes;height:.15in'>
  <td width="26%" nowrap style='width:26.02%;padding:0in 5.4pt 0in 5.4pt;
  height:.15in'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif;
  color:black'>KELURAHAN/DESA</span></p>
  </td>
  <td width="4%" nowrap style='width:4.3%;padding:0in 5.4pt 0in 5.4pt;
  height:.15in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>:</span></p>
  </td>
  
   <?php echo changeCell("4",$RULEKODEDESA," width='3%' nowrap style='width:3.9%;border:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.15in''"," class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal''"," style='font-size:8.0pt;
  font-family:\"Arial\",sans-serif;color:black'"); ?>
  
  <td width="7%" nowrap style='width:7.7%;padding:0in 5.4pt 0in 5.4pt;
  height:.15in'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif;
  color:black'>&nbsp;</span></p>
  </td>
  <td width="46%" nowrap style='width:46.44%;border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.15in'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif;
  color:black'>&nbsp;<?php echo $RULECAPDESA; ?></span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt'><span
style='font-size:6.0pt;line-height:115%'>&nbsp;</span></p>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width="97%"
 style='width:97.96%;border-collapse:collapse;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 0in 0in 0in'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes;
  height:.15in'>
  <td width="15%" nowrap style='width:15.78%;padding:0in 5.75pt 0in 5.75pt;
  height:.15in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><i><u><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>PERMOHONAN KTP</span></u></i></p>
  </td>
  <td width="3%" nowrap style='width:3.78%;padding:0in 5.75pt 0in 5.75pt;
  height:.15in'></td>
  <td width="3%" nowrap style='width:3.46%;border:solid windowtext 1.0pt;
  border-right:solid black 1.0pt;padding:0in 5.75pt 0in 5.75pt;height:.15in'>
  <?php echo   $PERMOHONANTEXTI; ?></td>
  <td width="10%" style='width:10.2%;border:solid windowtext 1.0pt;border-left:
  none;padding:0in 5.75pt 0in 5.75pt;height:.15in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>A. BARU</span></p>
  </td>
  <td width="6%" style='width:6.68%;border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.75pt 0in 5.75pt;height:.15in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" style='width:3.38%;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.75pt 0in 5.75pt;height:.15in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'><?php echo   $PERMOHONANTEXTII; ?></span></p>
  </td>
  <td width="16%" style='width:16.98%;border:solid windowtext 1.0pt;border-left:
  none;padding:0in 5.75pt 0in 5.75pt;height:.15in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>B. PERPANJANGAN</span></p>
  </td>
  <td width="6%" style='width:6.84%;border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.75pt 0in 5.75pt;height:.15in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>
  </td>
  <td width="3%" style='width:3.38%;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.75pt 0in 5.75pt;height:.15in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'><?php echo   $PERMOHONANTEXTIII; ?></span></p>
  </td>
  <td width="16%" style='width:16.74%;border:solid windowtext 1.0pt;border-left:
  none;padding:0in 5.75pt 0in 5.75pt;height:.15in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>C. PENGGANTIAN</span></p>
  </td>
  <td width="12%" style='width:12.78%;padding:0in 5.75pt 0in 5.75pt;height:
  .15in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt'><span
style='font-size:2.0pt;line-height:115%'>&nbsp;</span></p>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width="97%"
 style='width:97.92%;border-collapse:collapse;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 0in 0in 0in'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes;
  height:.15in'>
  <td width="21%" nowrap style='width:15.72%;border:solid windowtext 1.0pt;
  padding:0in 5.75pt 0in 5.75pt;height:.15in'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif;
  color:black'>1. Nama <span class=SpellE>Lengkap</span></span></p>
  </td>
  <td width="4%" nowrap valign=bottom style='width:4.0%;padding:0in 5.75pt 0in 5.75pt;border-right:solid black 1.0pt;
  height:.15in'></td>
  
   <?php echo changeCell("24",$NAMA,"  width=\"3%\"  style='width:3.5%;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.75pt 0in 5.75pt;height:.15in''"," class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'"," style='font-size:8.0pt;
  font-family:\"Arial\",sans-serif;color:black'"); ?>
  
 </tr>
</table>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt'><span
style='font-size:2.0pt;line-height:115%'>&nbsp;</span></p>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width="72%"
 style='width:72.22%;border-collapse:collapse;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 0in 0in 0in'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes;
  height:.15in'>
  <td width="21%" nowrap style='width:21.24%;border:solid windowtext 1.0pt;
  padding:0in 5.75pt 0in 5.75pt;height:.15in'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif;
  color:black'>2. No KK</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.06%;padding:0in 5.75pt 0in 5.75pt;
  height:.15in'></td>
   
   <?php echo changeCell("16",$NOKK,"  width=\"4%\" nowrap style='width:4.6%;border:solid windowtext 1.0pt;
  border-right:solid black 1.0pt;padding:0in 5.75pt 0in 5.75pt;height:.15in'"," class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'"," style='font-size:8.0pt;
  font-family:\"Arial\",sans-serif;color:black''"); ?>
 </tr>
</table>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt'><span
style='font-size:2.0pt;line-height:115%'>&nbsp;</span></p>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width="72%"
 style='width:72.18%;border-collapse:collapse;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 0in 0in 0in'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes;
  height:.15in'>
  <td width="21%" nowrap style='width:21.3%;border:solid windowtext 1.0pt;
  padding:0in 5.75pt 0in 5.75pt;height:.15in'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif;
  color:black'>3. NIK</span></p>
  </td>
  <td width="5%" nowrap valign=bottom style='width:5.06%;padding:0in 5.75pt 0in 5.75pt;
  height:.15in'></td>
  
   <?php echo changeCell("16",$NOID,"  width=\"4%\" nowrap style='width:4.6%;border:solid windowtext 1.0pt;
  border-right:solid black 1.0pt;padding:0in 5.75pt 0in 5.75pt;height:.15in'"," class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'"," style='font-size:8.0pt;
  font-family:\"Arial\",sans-serif;color:black''"); ?>
 </tr>
</table>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt'><span
style='font-size:2.0pt;line-height:115%'>&nbsp;</span></p>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width="98%"
 style='width:98.02%;border-collapse:collapse;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 0in 0in 0in'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes;
  height:.15in'>
  <td width="15%" nowrap style='width:15.7%;border:solid windowtext 1.0pt;
  padding:0in 5.75pt 0in 5.75pt;height:.15in'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif;
  color:black'>4. <span class=SpellE>Alamat</span></span></p>
  </td>
  <td width="3%" nowrap valign=bottom style='width:3.72%;padding:0in 5.75pt 0in 5.75pt;
  height:.15in'></td>
  <td width="80%" nowrap style='width:80.58%;border:solid windowtext 1.0pt;
  border-right:solid black 1.0pt;padding:0in 5.75pt 0in 5.75pt;height:.15in'><?php echo $ALMT; ?></td>
 </tr>
</table>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt'><span
style='font-size:2.0pt;line-height:115%'>&nbsp;</span></p>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width="98%"
 style='width:98.08%;border-collapse:collapse;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 0in 0in 0in'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes;
  height:.15in'>
  <td width="15%" nowrap style='width:15.66%;padding:0in 5.75pt 0in 5.75pt;
  height:.15in'></td>
  <td width="3%" nowrap valign=bottom style='width:3.72%;border:none;
  border-right:solid windowtext 1.0pt;padding:0in 5.75pt 0in 5.75pt;height:
  .15in'></td>
  <td width="80%" nowrap style='width:80.62%;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.75pt 0in 5.75pt;height:.15in'></td>
 </tr>
</table>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt'><span
style='font-size:2.0pt;line-height:115%'>&nbsp;</span></p>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width="98%"
 style='width:98.08%;border-collapse:collapse;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 0in 0in 0in'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes;
  height:.15in'>
  <td width="15%" nowrap style='width:15.72%;padding:0in 5.75pt 0in 5.75pt;
  height:.15in'></td>
  <td width="3%" nowrap style='width:3.68%;border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.75pt 0in 5.75pt;height:.15in'></td>
  <td width="4%" nowrap style='width:4.06%;border:solid windowtext 1.0pt;
  border-left:none;padding:0in 5.75pt 0in 5.75pt;height:.15in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>RT</span></p>
  </td>
  <td width="4%" style='width:4.38%;border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.75pt 0in 5.75pt;height:.15in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>
  </td>
  
     <?php echo changeCellR("2",$RT,"  width=\"5%\" style='width:5.48%;border:solid windowtext 1.0pt;border-left:
  none;padding:0in 5.75pt 0in 5.75pt;height:.15in'"," class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'"," style='font-size:8.0pt;
  font-family:\"Arial\",sans-serif;color:black'"); ?>
  
  
  <td width="7%" style='width:7.34%;border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.75pt 0in 5.75pt;height:.15in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" style='width:4.48%;border:solid windowtext 1.0pt;border-left:
  none;padding:0in 5.75pt 0in 5.75pt;height:.15in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>RW</span></p>
  </td>
  <td width="4%" style='width:4.48%;border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.75pt 0in 5.75pt;height:.15in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>
  </td>
  
     <?php echo changeCellR("2",$RW,"  width=\"5%\" style='width:5.48%;border:solid windowtext 1.0pt;border-left:
  none;padding:0in 5.75pt 0in 5.75pt;height:.15in'"," class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'"," style='font-size:8.0pt;
  font-family:\"Arial\",sans-serif;color:black'"); ?>
  
  <td width="7%" style='width:7.64%;border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.75pt 0in 5.75pt;height:.15in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>
  </td>
  <td width="11%" style='width:11.58%;border:solid windowtext 1.0pt;border-left:
  none;padding:0in 5.75pt 0in 5.75pt;height:.15in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><span
  style='font-size:8.0pt;font-family:"Arial",sans-serif;color:black'>Kode</span></span><span
  style='font-size:8.0pt;font-family:"Arial",sans-serif;color:black'> <span
  class=SpellE><span class=GramE>Pos</span></span><span class=GramE> :</span></span></p>
  </td>
  <td width="2%" style='width:2.36%;border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.75pt 0in 5.75pt;height:.15in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>
  </td>
  
     <?php echo changeCellR("4",$RULEKODEPOS,"  width=\"3%\" style='width:3.06%;border:solid windowtext 1.0pt;border-left:
  none;padding:0in 5.75pt 0in 5.75pt;height:.15in'"," class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'"," style='font-size:8.0pt;
  font-family:\"Arial\",sans-serif;color:black''"); ?>
  
  
 </tr>
</table>

<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt'><span
style='font-size:6.0pt;line-height:115%'>&nbsp;</span></p>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width="98%"
 style='width:98.26%;border-collapse:collapse;mso-yfti-tbllook:1184;mso-padding-alt:
 0in 0in 0in 0in'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:.1in'>
  <td width="15%" nowrap style='width:15.72%;border:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.1in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>Pas <span class=SpellE>Foto</span>
  (</span><span lang=IN style='font-size:8.0pt;font-family:"Arial",sans-serif;
  color:black;mso-ansi-language:IN'>3</span><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>x</span><span lang=IN
  style='font-size:8.0pt;font-family:"Arial",sans-serif;color:black;mso-ansi-language:
  IN'>4</span><span style='font-size:8.0pt;font-family:"Arial",sans-serif;
  color:black'>)</span></p>
  </td>
  <td width="15%" nowrap colspan=2 style='width:15.72%;border:solid windowtext 1.0pt;
  border-left:none;padding:0in 5.4pt 0in 5.4pt;height:.1in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>Cap <span class=SpellE>Jempol</span></span></p>
  </td>
  <td width="34%" nowrap colspan=4 valign=bottom style='width:34.7%;border:
  solid windowtext 1.0pt;border-left:none;padding:0in 5.4pt 0in 5.4pt;
  height:.1in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><span
  style='font-size:8.0pt;font-family:"Arial",sans-serif;color:black'>Tanda</span></span><span
  style='font-size:8.0pt;font-family:"Arial",sans-serif;color:black'> <span
  class=SpellE>Tangan</span></span></p>
  </td>
  <td width="7%" rowspan=4 valign=top style='width:7.54%;padding:0in 5.4pt 0in 5.4pt;
  height:.1in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>
  </td>
  <td width="26%" colspan=2 valign=top style='width:26.32%;padding:0in 5.4pt 0in 5.4pt;
  height:.1in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><span
  style='font-size:8.0pt;font-family:"Arial",sans-serif;color:black'>
  <?php echo $RULEKAB.", ".$TGLBUAT; ?>
  </span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;height:9.75pt'>
  <td width="15%" nowrap rowspan=3 style='width:15.72%;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:9.75pt'></td>
  <td width="15%" nowrap colspan=2 rowspan=3 style='width:15.72%;border-top:
  none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>
  </td>
  <td width="34%" nowrap colspan=4 rowspan=2 style='width:34.7%;border-top:
  none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:9.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>
  </td>
  <td width="26%" colspan=2 style='width:26.32%;padding:0in 5.4pt 0in 5.4pt;
  height:9.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span class=SpellE><span
  style='font-size:8.0pt;font-family:"Arial",sans-serif;color:black'>Pemohon</span></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2;height:48.0pt'>
  <td width="26%" colspan=2 valign=bottom style='width:26.32%;padding:0in 5.4pt 0in 5.4pt;
  height:48.0pt'>
  <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=190
   style='width:142.75pt;border-collapse:collapse;mso-yfti-tbllook:1184;
   mso-padding-alt:0in 0in 0in 0in'>
   <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes;
    height:4.0pt'>
    <td width=16 valign=top style='width:12.25pt;padding:0in 5.4pt 0in 5.4pt;
    height:4.0pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span style='font-size:8.0pt;
    font-family:"Arial",sans-serif;color:black'>(</span></p>
    </td>
    <td width=156 valign=top style='width:117.25pt;border:none;border-bottom:
    solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:4.0pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span style='font-size:8.0pt;
    font-family:"Arial",sans-serif;color:black'> <?php echo $NAMA; ?></span></p>
    </td>
    <td width=18 valign=top style='width:13.25pt;padding:0in 5.4pt 0in 5.4pt;
    height:4.0pt'>
    <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal'><span style='font-size:8.0pt;
    font-family:"Arial",sans-serif;color:black'>)</span></p>
    </td>
   </tr>
  </table>
  </td>
 </tr>
 <tr style='mso-yfti-irow:3;height:21.75pt'>
  <td width="34%" nowrap colspan=4 style='width:34.7%;padding:0in 5.4pt 0in 5.4pt;
  height:21.75pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span class=SpellE><span style='font-size:8.0pt;font-family:"Arial",sans-serif;
  color:black'>Ket</span></span><span style='font-size:8.0pt;font-family:"Arial",sans-serif;
  color:black'>. Cap <span class=SpellE>Jempol</span> / <span class=SpellE>Tanda</span>
  <span class=SpellE>Tangan</span></span></p>
  </td>
  <td width="26%" colspan=2 style='width:26.32%;padding:0in 5.4pt 0in 5.4pt;
  height:21.75pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:4;height:15.35pt'>
  <td width="15%" nowrap valign=bottom style='width:15.72%;padding:0in 5.4pt 0in 5.4pt;
  height:15.35pt'></td>
  <td width="84%" nowrap colspan=9 valign=bottom style='width:84.28%;
  padding:0in 5.4pt 0in 5.4pt;height:15.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black;mso-ansi-language:IN'>Mengetahui,</span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:5;height:13.0pt'>
  <td width="15%" nowrap valign=top style='width:15.72%;padding:0in 5.4pt 0in 5.4pt;
  height:13.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black'>&nbsp;</span></p>
  </td>
  <td width="42%" nowrap colspan=4 style='width:42.14%;padding:0in 5.4pt 0in 5.4pt;
  height:13.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black;mso-ansi-language:IN'>CAMAT
   <?php echo $RULECAPKEC; ?></span></p>
  </td>
  <td width="42%" colspan=5 style='width:42.14%;padding:0in 5.4pt 0in 5.4pt;
  height:13.0pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black;mso-ansi-language:IN'>
  <?php
 if ($_POST[ybt]=='1'){	// Yang bertandatangan (kades=1) maka nama kepala desa yang dipakai
$AN = "KEPALA DESA $rulecap[desa]";
$KADES = $rulecap['kepaladesa']; 
		}
		else { // selain kades=1 (kepala desa) maka nama pejabat yang dipilihlah yang dipakai
$AN = "a/n KEPALA DESA $rulecap[desa] <BR/> $setpejabat[ket]";
$KADES = $setpejabat[nama_cap]; 
		}
		?>
		<?php echo $AN; ?></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:6;height:.6in'>
  <td width="15%" nowrap valign=bottom style='width:15.72%;padding:0in 5.4pt 0in 5.4pt;
  height:.6in'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif;
  color:black'>&nbsp;</span></p>
  </td>
  <td width="4%" nowrap valign=bottom style='width:4.72%;padding:0in 5.4pt 0in 5.4pt;
  height:.6in'>
  <p class=MsoNormal align=right style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:right;line-height:normal'><span lang=IN style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black;mso-ansi-language:IN'>(</span></p>
  </td>
  <td width="32%" colspan=2 valign=bottom style='width:32.92%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:.6in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black;mso-ansi-language:IN'>&nbsp;</span></p>
  </td>
  <td width="4%" valign=bottom style='width:4.5%;padding:0in 5.4pt 0in 5.4pt;
  height:.6in'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span lang=IN style='font-size:8.0pt;font-family:"Arial",sans-serif;
  color:black;mso-ansi-language:IN'>)</span></p>
  </td>
  <td width="4%" valign=bottom style='width:4.0%;padding:0in 5.4pt 0in 5.4pt;
  height:.6in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black;mso-ansi-language:IN'>(</span></p>
  </td>
  <td width="32%" colspan=3 valign=bottom style='width:32.92%;border:none;
  border-bottom:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:.6in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black;mso-ansi-language:IN'><?php echo $KADES; ?></span></p>
  </td>
  <td width="5%" valign=bottom style='width:5.22%;padding:0in 5.4pt 0in 5.4pt;
  height:.6in'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span lang=IN style='font-size:8.0pt;
  font-family:"Arial",sans-serif;color:black;mso-ansi-language:IN'>)</span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:7;mso-yfti-lastrow:yes'>
  <td width=1598 style='width:1198.5pt;padding:0in 0in 0in 0in'></td>
  <td width=451 style='width:338.25pt;padding:0in 0in 0in 0in'></td>
  <td width=1106 style='width:829.5pt;padding:0in 0in 0in 0in'></td>
  <td width=2184 style='width:1638.35pt;padding:0in 0in 0in 0in'></td>
  <td width=428 style='width:321.0pt;padding:0in 0in 0in 0in'></td>
  <td width=376 style='width:282.0pt;padding:0in 0in 0in 0in'></td>
  <td width=406 style='width:304.5pt;padding:0in 0in 0in 0in'></td>
  <td width=746 style='width:559.5pt;padding:0in 0in 0in 0in'></td>
  <td width=2184 style='width:1638.35pt;padding:0in 0in 0in 0in'></td>
  <td width=609 style='width:456.75pt;padding:0in 0in 0in 0in'></td>
 </tr>
</table>

<p class=MsoNormal><span lang=IN style='mso-ansi-language:IN'>&nbsp;</span></p>

<p class=MsoNormal>&nbsp;</p>

</div>

</body>

</html>
