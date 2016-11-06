<?

# jalal7h@gmail.com
# 2016/08/24
# 1.1

function multi_size_pic( $file_name, $nWD, $nHT ){
	
	if(! file_exists($file_name) ){
		return false;
	
	} else if( $nWD==0 or $nHT==0 ){
		return false;
	}

	$PIC = $file_name;

	# 
	# if there is any cahce dir defined for resize
	if( defined('resize_cache_dir') and is_string(resize_cache_dir) and (resize_cache_dir!='') ){
		$PIC_tmp_dir = resize_cache_dir;
	}

	if(! $PIC_tmp_dir ){
		$PIC_tmp = sys_get_temp_dir()."/tmp".rand(1000000,9999999).strrchr($PIC, ".");

	## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ##
	} else {
		
		$sha_name = sha1( $file_name."-".$nWD."-".$nHT ).strrchr($file_name,'.');
		
		if(! file_exists($PIC_tmp_dir) ){
			mkdir($PIC_tmp_dir);
		}

		$dir = substr($sha_name,-13,-10);
		$PIC_tmp_dir.= "/".$dir;
		if(! file_exists($PIC_tmp_dir) ){
			mkdir($PIC_tmp_dir);
		}

		$dir = substr($sha_name,-16,-13);
		$PIC_tmp_dir.= "/".$dir;
		if(! file_exists($PIC_tmp_dir) ){
			mkdir($PIC_tmp_dir);
		}

		$dir = substr($sha_name,-19,-16);
		$PIC_tmp_dir.= "/".$dir;
		if(! file_exists($PIC_tmp_dir) ){
			mkdir($PIC_tmp_dir);
		}

		$PIC_tmp = $PIC_tmp_dir."/".$sha_name;

	}
	## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ##
		
	$PIC = _URL."/".$PIC;
	
	#
	# resize if needed
	if( file_exists($PIC_tmp) ){
		// echo "cache hit on $PIC_tmp"; die();
	
	} else {
		
		$SZ = getimagesize($PIC);
		$SW = $SZ[0];
		$SH = $SZ[1];
		#
		if( $SW-$nWD < $SH-$nHT ){
			$CW=$nWD;
			$CH= round($CW * ($SH / $SW));
		
		} else {
			$CH=$nHT;
			$CW= round($CH * ($SW / $SH));
		}
		
		if($CH > $nHT){
			$CH = $nHT;
			$CW = round($CH * ($SW / $SH));
		}
		
		if($CW > $nWD){
			$CW=$nWD;
			$CH= round($CW * ($SH / $SW));
		}

		if(! resize_gd($PIC, '', $PIC_tmp, $CW, $CH, false) ){
			echo __FUNCTION__." : ".__LINE__;
			return false;
	
		} else {
			// echo "resize process on ".$PIC_tmp; die();
		}

	}

	#
	# echo file
	$ext = strtolower(strrchr($file_name, '.'));
	#
	switch($ext){
	
		case '.jpg' : 
		case '.jpeg' :
			$func_open = "imagecreatefromjpeg";
			$func_show = "imagejpeg";
			break;
		
		case '.bmp' : 
			$func_open = "imagecreatefromwbmp";
			$func_show = "imagewbmp";
			break;
		
		case '.gif' : 
			$func_open = "imagecreatefromgif";
			$func_show = "imagegif";
			break;
		
		case '.png' : 
		DEFAULT : 
			$func_open = "imagecreatefrompng";
			$func_show = "imagepng";
			break;
	}
	
	$IM = $func_open($PIC_tmp);
	imagealphablending($IM, true); // setting alpha blending on
	imagesavealpha($IM, true);
	header("Content-disposition: inline; filename=$file_name");
	header('Content-Type: image/'.substr($ext, 1));
	$expires = 60 * 60 * 24 * 30;
	$exp_gmt = gmdate("D, d M Y H:i:s", U() + $expires )." GMT";
	$mod_gmt = gmdate("D, d M Y H:i:s", U() + (3600 * -5 * 24 * 365) )." GMT";
	@header("Expires: {$exp_gmt}");
	@header("Last-Modified: {$mod_gmt}");
	@header("Cache-Control: public, max-age={$expires}");
	@header("Pragma: !invalid");
	echo $func_show($IM);
	imagedestroy($IM);
	
	if(! $PIC_tmp_dir ){
		unlink($PIC_tmp);
	}

	die();

}



