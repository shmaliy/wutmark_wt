<?php
require ('classes/img.php');

if($_GET['i']){
	$i = new img();
	$i->header($_GET['t']);
	$img = $i->create($_GET['i']);
	
	if ($img){
		if ($_GET['m']){
			if ($_GET['m'] == 'per'){$imw = $i->by_percent($img, $_GET['per_v']); }
			elseif ($_GET['m'] == 'fit'){$imw = $i->by_fit($img, $_GET['w'], $_GET['h'], $_GET['ca'], $_GET['bg'], $_GET['crop']); }
			elseif ($_GET['m'] == 'size'){$imw = $i->by_size($img, $_GET['w'], $_GET['h']); }
			elseif ($_GET['m'] == 'side'){$imw = $i->by_side($img, $_GET['s'], $_GET['sm']); }
		}else{ $imw = $img; }
	}
	
	if ($_GET['t'] == "jpg"){ if ($_GET['q']) { imagejpeg($imw,null,$_GET['q']); }else{ imagejpeg($imw); } }
	elseif ($_GET['t'] == "gif"){ imagegif($imw); }
	elseif($_GET['t'] == "png"){ if ($_GET['q']) { imagepng($imw,null,$_GET['q']); }else{ imagepng($imw); } }
	imagedestroy($imw);
}
?>