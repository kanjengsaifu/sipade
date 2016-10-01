<?php
	function tgl($tgl){ //(DD-MM-YYYY >>> YYYY-MM-DD) angka
			$tahun = substr($tgl,8,4);
			$bulan = substr($tgl,4,2);
			$tanggal = substr($tgl,0,2);
			return $tahun.'-'.$bulan.'-'.$tanggal;		 
	}	
	
	function tgldbnik1($tgl){ //(YYYY-MM-DD) angka
			$echo = explode("-",$tgl); 
			$echotgl = $echo[0]+40;
			$echobln = $echo[1];
			$th = $echo[2];
			$echothn = substr($th,2,2);
	 		
	return $echotgl."".$echobln."".$echothn;		 
	
	} 
	
	function tgldbnik2($tgl){ //(YYYY-MM-DD) angka
			$echo = explode("-",$tgl); 
			$echotgl = $echo[0]+40;
			$echobln = $echo[1];
			$th = $echo[2];
			$echothn = substr($th,2,2);
	 		
	return $echo[0]."".$echobln."".$echothn;	
	}
	
	function tgldb($tgl){ //(YYYY-MM-DD) angka
		$echo = explode("-",$tgl); 
			return $echo[2]."-".$echo[1]."-".$echo[0];		 
	}
	function tglnmfolder($tgl){  //(YYYY-MM-YY >>>  DD-MM-YYYY) angka
			$bulan = substr($tgl,5,2);
			$tahun = substr($tgl,0,4);
			return $tahun.'/'.$bulan;		 
	}	
	function tglnmfile($tgl){ //(YYYY-MM-DD) angka
		$echo = explode("-",$tgl); 
			return $echo[2]."_".$echo[1]."_".$echo[0];		 
	}	
	
	function tglpolos($tgl){ //(YYYY-MM-DD) angka
		$echo = explode("-",$tgl); 
			return $echo[2].$echo[1].$echo[0];		 
	}	
	
	function tgl_indo2($tgl){  //(YYYY-MM-YY >>>  DD-MM-YYYY) angka
			$tanggal = substr($tgl,8,2);
			$bulan = substr($tgl,5,2);
			$tahun = substr($tgl,0,4);
			return $tanggal.'-'.$bulan.'-'.$tahun;		 
	}	
	function tgl_indo3($tgl){ //(DD-MM-YYYY) Angka
			$tahun = substr($tgl ,6,4); 
			$bulan = substr($tgl ,3,2); 
			$tanggal = substr($tgl ,0,2);
			return $tanggal.'-'.$bulan.'-'.$tahun;		 
	}	

	function tgl_indo($tgl){ //(YYYY-MM-DD)
			
			$tahun = substr($tgl,8,4);
			$bulan = getBulan(substr($tgl,4,2));
			$tanggal = substr($tgl,0,2);
			return $tahun.'-'.$bulan.'-'.$tanggal;			 
	}	 	

	function blnindo($tgl){   //Bulan Indo (MM)
		$bulan = getBulanCaps(substr($tgl,0,2));
			return $bulan;	
	}
	function tgl_mod1($tgl){    //Tanggal Buat (DD/MM/YYYY)
			$echo = explode("-",$tgl); 
 			$bulan = getBulan($echo[1]);
			return $echo[0]." ".$bulan." ".$echo[2];	
 
	}	
	function tgl_thn($tgl){    //Tanggal Buat (DD/MM/YYYY)
			$echo = explode("-",$tgl);  
			return $echo[2];	
 
	}	
	function tgl_bln($tgl){    //Tanggal Buat (DD/MM/YYYY)
			$echo = explode("-",$tgl);  
 			$bulan = getBulanrow($echo[1]);
			return $bulan;	
 
	}	
	function tgl_jw($JW,$tgl){	 //Jangka Waktu Surat (Masa Berlaku)
			$echo = explode("-",$tgl); 			
 			$bulancek = $echo[1]+$JW;
			if ($bulancek=='13' || $bulancek=='14' || $bulancek=='15' || $bulancek=='16' || $bulancek=='17' || $bulancek=='18' || $bulancek=='19' || $bulancek=='20' || $bulancek=='21' || $bulancek=='22' || $bulancek=='23' || $bulancek=='24'){
				$tahun = $echo[2]+1;
			}
			else {
				$tahun = $echo[2];
				}
 			$bulan = getBulanjw($echo[1]+$JW);
			return $echo[0]." ".$bulan." ".$tahun;	
			 	 
	}
	function getBulanCaps($bln){
				switch ($bln){
					case 1: 
						return "JANUARI";
						break;
					case 2:
						return "FEBRUARI";
						break;
					case 3:
						return "MARET";
						break;
					case 4:
						return "APRIL";
						break;
					case 5:
						return "MEI";
						break;
					case 6:
						return "JUNI";
						break;
					case 7:
						return "JULI";
						break;
					case 8:
						return "AGUSTUS";
						break;
					case 9:
						return "SEPTEMBER";
						break;
					case 10:
						return "OKTOBER";
						break;
					case 11:
						return "NOVEMBER";
						break;
					case 12:
						return "DESEMBER";
						break;
				}
			}
	function getBulan($bln){
				switch ($bln){
					case 1: 
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break; 
				}
			} 	
	function getBulanrow($bln){
				switch ($bln){
					case 1: 
						return "I";
						break;
					case 2:
						return "II";
						break;
					case 3:
						return "III";
						break;
					case 4:
						return "IV";
						break;
					case 5:
						return "V";
						break;
					case 6:
						return "VI";
						break;
					case 7:
						return "VII";
						break;
					case 8:
						return "VIII";
						break;
					case 9:
						return "IX";
						break;
					case 10:
						return "X";
						break;
					case 11:
						return "XI";
						break;
					case 12:
						return "XII";
						break; 
				}
			} 	
	
	function getBulanjw($bln){
				switch ($bln){
					case 1: 
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
					case 13:
						return "Januari";
						break;
					case 14:
						return "Februari";
						break;
					case 15:
						return "Maret";
						break;
					case 16:
						return "April";
						break;
					case 17:
						return "Mei";
						break;
					case 18:
						return "Juni";
						break;
					case 19:
						return "Juli";
						break;
					case 20:
						return "Agustus";
						break;
					case 21:
						return "September";
						break;
					case 22:
						return "Oktober";
						break;
					case 23:
						return "November";
						break;
					case 24:
						return "Desember";
						break;
				}
			}  
			?>
