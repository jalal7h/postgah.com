<?

# jalal7h@gmail.com
# 2016/11/12
# 1.0

function lang_css_fix( $css ){

	if( stristr($css, '/*skipfix*/') ){
		return $css;
	}
	// return $css;

	if( lang_dir != 'ltr' ){
		return $css;
	}

	# 
	# remove spaces
	$css = str_replace( 
		[ ': ', ' ;', ' :', ' {' ], 
		[ ':' , ';' , ':' , '{'  ], $css);

	# 
	# direction
	$css = str_ireplace('direction:rtl', 'direction:__l', $css);
	$css = str_ireplace('direction:ltr', 'direction:rtl', $css);
	$css = str_ireplace('direction:__l', 'direction:ltr', $css);

	#
	# left / right
	$css = str_ireplace('left', '__ft', $css);
	$css = str_ireplace('right', 'left', $css);
	$css = str_ireplace('__ft', 'right', $css);

	# 
	# 4section elements
	$css = lang_css_fix_4mirror( $css, 'padding:', 'side' );
	$css = lang_css_fix_4mirror( $css, 'margin:', 'side' );
	$css = lang_css_fix_4mirror( $css, 'border-width:', 'side' );
	$css = lang_css_fix_4mirror( $css, 'border-radius:', 'edge' ); // mirror

	#
	# before n after
	// $css = str_replace( ':before', ':__fore', $css );
	// $css = str_replace( ':after', ':before', $css );
	// $css = str_replace( ':__fore', ':after', $css );

	#
	# font-awesome contents
	$css = lang_css_fix_fontawesome( $css );

	return $css;

}


function lang_css_fix_4mirror( $css, $tag, $type/* {side / edge} */ ){

	$arr = explode( $tag, $css );

	for( $i=1; $i<sizeof($arr); $i++ ){
		
		$this_sec = $arr[$i];
		$this_sec_arr = explode(';', $this_sec);
		$this_line = trim($this_sec_arr[0]);
		$this_line_arr = explode(' ', $this_line);
		
		if( sizeof($this_line_arr) < 4 ){
			continue;
		
		} else if( $this_line_arr[1] == $this_line_arr[3] ){
			continue;
		
		} else {
			
			switch ($type) {
				
				case 'side':
					$tmp = $this_line_arr[1];
					$this_line_arr[1] = $this_line_arr[3];
					$this_line_arr[3] = $tmp;
					break;
				
				case 'edge':
					$tmp = $this_line_arr[0];
					$this_line_arr[0] = $this_line_arr[1];
					$this_line_arr[1] = $tmp;
					$tmp = $this_line_arr[2];
					$this_line_arr[2] = $this_line_arr[3];
					$this_line_arr[3] = $tmp;
					break;

			}
			
			$this_line = implode(' ', $this_line_arr);
			$this_sec_arr[0] = $this_line;
			$this_sec = implode(';', $this_sec_arr);
			$arr[$i] = $this_sec;
		}

	}

	$css = implode( $tag, $arr );

	return $css;

}


function lang_css_fix_fontawesome( $css ){

	$css = str_replace( 
		[ '\f100', '\f104', '\f064', '\f060' ],
	 	[ '\f101', '\f105', '\f_64', '\f061' ], 
	 	$css );

	$css = str_replace( 
	 	[ '\f112', '\f_64' ], 
	 	[ '\f064', '\f112' ], 
	 	$css );

	return $css;

}





