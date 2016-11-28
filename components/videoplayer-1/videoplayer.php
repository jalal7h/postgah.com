<?

# jalal7h@gmail.com
# 2016/11/28
# 1.0


define( 'videoplayer_aparat_pattern' , '<div id="aparat_container"><script type="text/JavaScript" src="https://www.aparat.com/embed/%%?data[rnddiv]=aparat_container&data[responsive]=yes"></script></div>' );

define( 'videoplayer_youtube_pattern' , '<div><iframe src="http://www.youtube.com/embed/%%" width="100%" height="100%" frameborder="0" allowfullscreen ></iframe></div>' );

define( 'videoplayer_vimeo_pattern' , '<div><iframe src="https://player.vimeo.com/video/%%" width="100%" height="100%" frameborder="0" allowfullscreen ></iframe></div>' );



function videoplayer( $src, $w="auto", $h="auto" ){

	#
	# null
	if(! $src = trim($src) ){
		$code = "";

	# 
	# link
	} else if( substr($src,0,4) == 'http' ){
		
		# 
		# aparat
		if( strstr( $src, 'aparat.com/' ) ){
			$code = explode( 'aparat.com/v/', $src)[1];
			$code = explode( '/', $code)[0];
			$code = str_replace( '%%', $code, videoplayer_aparat_pattern );
		
		#
		# youtube
		} else if( strstr( $src, 'youtube.com/' ) ){
			$code = explode( 'youtube.com/watch?v=', $src)[1];
			$code = explode( '&', $code)[0];
			$code = str_replace( '%%', $code, videoplayer_youtube_pattern );

		#
		# vimeo
		} else if( strstr( $src, 'vimeo.com/' ) ){
			$code = explode( 'vimeo.com/', $src)[1];
			$code = explode( '/', $code)[0];
			$code = str_replace( '%%', $code, videoplayer_vimeo_pattern );
		}

	#
	# code
	} else {
		$code = $src;
	}


	return $code;

}



