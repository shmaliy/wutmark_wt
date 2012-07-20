<?php
class img
{
	function header($t){
		if ($t == "jpg"){ header("Content-type: image/jpeg"); }
		elseif ($t == "gif"){ header("Content-type: image/gif"); }
		elseif($t == "png"){ header("Content-type: image/png"); }
	}
	
	function create($s){
		if (file_exists($s)){
			$s = strtolower($s);
			if(substr($s, -3) == "jpg"){ return imagecreatefromjpeg($s); }
			elseif(substr($s, -3) == "gif"){ return imagecreatefromgif($s); }
			elseif(substr($s, -3) == "png"){ return imagecreatefrompng($s); }
		}else echo false;
	}
	
	function save($img, $path, $q = NULL){
		if(substr($path, -3) == "jpg" && isset($q)){ imagejpeg($img, $path, $q); }
		elseif(substr($path, -3) == "gif"){ imagegif($img); }
		elseif(substr($path, -3) == "png" && isset($q)){ imagepng($img, $path, $q); }
		imagedestroy($img);		
	}
	
	function saveimage($url, $save_path, $real_name=NULL){
		
		$query = parse_url($url);
		$str = parse_str($query['query'], $GET);
		
		if($GET['i']){
			
			$path = str_replace('photos/', 'photo_cache/', $GET['i']);
			$path = explode('/', $path);
			if(!is_null($real_name))
			{$filename = $real_name;}
			else
			{$filename = $path[count($path)-1];}
			
			if(!file_exists($save_path . '/' . $filename)){
			
				$i = new img();
				//$i->header($GET['t']);
				$img = $i->create($GET['i']);
			
				if ($img){
					if ($GET['m']){
						if ($GET['m'] == 'per'){$imw = $i->by_percent($img, $GET['per_v']); }
						elseif ($GET['m'] == 'fit'){$imw = $i->by_fit($img, $GET['w'], $GET['h'], $GET['ca'], $GET['bg'], $GET['crop']); }
						elseif ($GET['m'] == 'size'){$imw = $i->by_size($img, $GET['w'], $GET['h']); }
						elseif ($GET['m'] == 'side'){$imw = $i->by_side($img, $GET['s'], $GET['sm']); }
					}else{ $imw = $img; }
				}
				@mkdir($_SERVER['DOCUMENT_ROOT'] . '/' . $save_path, 0777);
				$this->save($imw, $save_path . '/' . $filename, 100);
			}
			
			return $save_path . '/' . $filename;
		}
	}
	
	
	
	function by_percent($img, $p){
		$w = imagesx($img);
		$h = imagesy($img);
		$nw = round(($w*$p)/100);
		$nh = round(($h*$p)/100);
		$oimg = imagecreatetruecolor($nw,$nh);
		imagecopyresampled($oimg,$img,0,0,0,0,$nw,$nh,$w,$h);
		return $oimg;
	}
	
	function by_side($img, $length, $mode){
		$w = imagesx($img);
		$h = imagesy($img);		
		if ($h > $length || $w > $length){
			if ($mode == 'long'){
				if ($w > $h){ $nw = $length; $nh = round($nw*$h/$w); }
				elseif ($w < $h){ $nh = $length; $nw = round($nh*$w/$h); }
				else { $nh = $nw = $length; }
			}elseif ($mode == 'short'){
				if ($w < $h){ $nw = $length; $nh = round($nw*$h/$w); }
				elseif ($w > $h){ $nh = $length; $nw = round($nh*$w/$h); }
				else { $nh = $nw = $length; }
			}
			elseif ($mode == 'width')
			{
				$nw = $length; $nh = round($nw*$h/$w);
			}
		}else{
			$nh = $h; $nw = $w;
		}
		$oimg = imagecreatetruecolor($nw,$nh);
		imagealphablending($oimg,false);
		imagesavealpha($oimg,true);
		imagecopyresampled($oimg,$img,0,0,0,0,$nw,$nh,$w,$h);
		return $oimg;
	}
	
	function by_size($img, $nw, $nh){
		$w = imagesx($img);
		$h = imagesy($img);		
		$oimg = imagecreatetruecolor($nw,$nh);
		imagealphablending($oimg,false);
		imagesavealpha($oimg,true);
		imagecopyresampled($oimg,$img,0,0,0,0,$nw,$nh,$w,$h);
		return $oimg;
	}
	
	function by_fit($img, $nw, $nh, $ca = NULL, $bg = NULL, $crop = null){
		$w = imagesx($img);
		$h = imagesy($img);
		$ps = ($h/$w)*100;
		$pr = ($nh/$nw)*100;
		if (isset($crop)){
			$crop = true;
		}else{
			$crop = false;
		}
		if ($ca){
			$it = 0; $il = 0;
			
			if (($ps < $pr && !$crop) || ($ps > $pr && $crop)){ $iw = $nw; $ih = round($iw*$h/$w); }
			elseif (($ps > $pr && !$crop) || ($ps < $pr && $crop)){ $ih = $nh; $iw = round($ih*$w/$h); }
			else { $iw = $nw; $ih = $nh; }			
			
			if ($ca == 'cen'){ $il = round(($nw-$iw)/2); $it = round(($nh-$ih)/2); }
			elseif ($ca == 'left'){ $il = 0; $it = round(($nh-$ih)/2); }
			elseif ($ca == 'right'){ $il = round($nw-$iw); $it = round(($nh-$ih)/2); }
			elseif ($ca == 'top'){ $il = round(($nw-$iw)/2); $it = 0; }
			elseif ($ca == 'bottom'){ $il = round(($nw-$iw)/2); $it = round($nh-$ih); }
			else{
				if ($ps > $pr){ $ih = $nh; $iw = round($ih*$w/$h); $it = 0; $il = round(($nw-$iw)/2); }
				elseif ($ps < $pr){ $iw = $nw; $ih = round($iw*$h/$w); $il = 0; $it = round(($nh-$ih)/2); }
				else { $iw = $nw; $ih = $nh; $it = 0; $il = 0; }
			}
		}else{
			if ($ps > $pr){ $ih = $nh; $iw = round($ih*$w/$h); }
			elseif ($ps < $pr){ $iw = $nw; $ih = round($iw*$h/$w); }
			else{ $iw = $nw; $ih = $nh; }
			$it = 0; $il = 0; $nw = $iw; $nh = $ih;
		}
		$oimg = imagecreatetruecolor($nw,$nh);
		if ($bg){
			$col = imagecolorallocate($oimg, '0x'.substr($bg,0,2), '0x'.substr($bg,2,2), '0x'.substr($bg,4,2));
			imagefilledrectangle($oimg, 0, 0, $nw, $nh, $col);
		}else{
			$col = imagecolorallocate($oimg, '255', '255', '255');
			imagefilledrectangle($oimg, 0, 0, $nw, $nh, $col);
		}
		//imagealphablending($oimg,false);
		//imagesavealpha($oimg,true);
		imagecopyresampled($oimg,$img,$il,$it,0,0,$iw,$ih,$w,$h);
		return $oimg;
	}
}
?>