<?php

# jalal7h@gmail.com
# 2017/06/15
# 1.0

function resize_image( $source_path, $new_w, $new_h, $cut_flag=null, $resized_dir=null ){

	$ex = pathinfo($source_path)['extension'];
	$SHA = sha1( $source_path."-".$new_w."-".$new_h."-".intval($cut_flag) ).'.'.$ex;
	
	#
	# resized dir
	if(! $resized_dir ){
		
		if( defined('resize_cache_dir') and is_string(resize_cache_dir) and ( resize_cache_dir != '' ) ){
			$resized_dir = resize_cache_dir;
		
		} else {
			$resized_dir = '.';
		}

		$resized_dir.= '/' . substr($SHA,-13,-10) . '/' . substr($SHA,-16,-13).'/'.substr($SHA,-19,-16);

	}

	#
	$resized_image = $resized_dir.'/'.$SHA;


	#
	# cache hit
	if( file_exists($resized_image) ){
		dg('cache hit for resize');
		return $resized_image;
	}

	#
	# input check
	if( !file_exists($source_path) or !($new_w*$new_h) ){
		return false;
	}

	#
	# make sure the cache dir is already made
	mkdirs( $resized_dir );

	
	####################################################################
	#
	# inputs ( $new_w; $new_h; $image_w; $image_h; )

	list( $image_w, $image_h ) = getimagesize($source_path);
	$new_z = floatval( $new_w / $new_h );
	$image_z = floatval( $image_w / $image_h );

	# 
	# cut
	if(  $cut_flag  and  $new_z != $image_z  ){

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

		$resized_n_cut = $resized_dir.'/cut_'.$SHA;
		resize_cut( $source_path, $cut_w, $cut_h, $resized_n_cut );
		resize_gd( $resized_n_cut, '', $resized_image, $resize_w, $resize_h, false );
		unlink( $resized_n_cut );
	
	#
	# just resize
	} else {

		if( $image_z > $new_z ){ // ax ariztar a frame e resize hast
			$resize_w = $new_w;
			$resize_h = $new_w / $image_z;

		} else {
			$resize_h = $new_h;
			$resize_w = $new_h * $image_z;
		}

		resize_gd( $source_path, '', $resized_image, $resize_w, $resize_h, false );			

	}

	# outputs ( $cut_w; $cut_h; $resize_w; $resize_h; )
	#
	####################################################################


	return $resized_image;


}



