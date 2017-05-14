<?

# jalal7h@gmail.com
# 2016/08/24
# 1.1

function multi_size_pic( $file_name, $new_w, $new_h, $cut_flag=null ){

	if(! file_exists($file_name) ){
		return false;
	
	} else if( $new_w==0 or $new_h==0 ){
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
		
		$sha_name = sha1( $file_name."-".$new_w."-".$new_h."-".intval($cut_flag) ).strrchr($file_name,'.');
		
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
		$PIC_tmp_cut = $PIC_tmp_dir."/cut_".$sha_name;

	}
	## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ## # ##
		
	$PIC = _URL."/".$PIC;

	#
	# resize if needed
	if( file_exists($PIC_tmp) ){
		// echo "cache hit on $PIC_tmp"; die();
	
	} else {
		
		
		####################################################################
		#
		# inputs ( $new_w; $new_h; $image_w; $image_h; )

		list( $image_w, $image_h ) = getimagesize($PIC);
		$new_z = floatval( $new_w / $new_h );
		$image_z = floatval( $image_w / $image_h );

		if(  $cut_flag  and  $new_z != $image_z  ){ // cut darim

			if( $new_z > $image_z ){ // cut ariztare
				// cut arzesh bishtar e, arz ro kamel migirim, ertefa ro kam mikonim
				$cut_w = $image_w;
				$cut_h = intval( floatval( $image_w / $new_z ) );

			} else { // cut deraztare
				// cut arzesh kamtar e, ertefa ro kamel migirim, arz ro kam mikonim
				$cut_h = $image_h;
				$cut_w = intval( floatval( $image_h * $new_z ) );
			}

			$resize_w = $new_w;
			$resize_h = $new_h;
			
		} else { // cut nadarim

			if( $image_z > $new_z ){ // ax ariztar a frame e resize hast
				$resize_w = $new_w;
				$resize_h = $new_w / $image_z;

			} else {
				$resize_h = $new_h;
				$resize_w = $new_h * $image_z;
			}

		}

		# outputs ( $cut_w; $cut_h; $resize_w; $resize_h; )
		#
		####################################################################

		if( $cut_flag ){
			resize_cut( $PIC, $cut_w, $cut_h, $PIC_tmp_cut );
			resize_gd( $PIC_tmp_cut, '', $PIC_tmp, $resize_w, $resize_h, false );
			unlink( $PIC_tmp_cut );
		
		} else {
			resize_gd( $PIC, '', $PIC_tmp, $resize_w, $resize_h, false );			
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
	$func_show($IM);
	imagedestroy($IM);
	
	if(! $PIC_tmp_dir ){
		unlink($PIC_tmp);
	}

	die();

}



