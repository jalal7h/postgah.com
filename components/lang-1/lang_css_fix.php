<?

# jalal7h@gmail.com
# 2016/11/14
# 1.1

function lang_css_fix( $css, $file ){

	if( stristr($css, '/*skipfix*/') or strstr( basename($file), '.skipfix.css' ) ){
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
	# toggle
	$css_arr = explode('{', $css);
	foreach ($css_arr as $i => $tag) {
		$tag_arr = explode('}', $tag);
		$tag_arr[0] = lang_css_fix_toggle( $tag_arr[0], 'direction:rtl', 'direction:ltr' );
		$tag_arr[0] = lang_css_fix_toggle( $tag_arr[0], 'left', 'right' );
		$css_arr[$i] = implode('}', $tag_arr);
	}
	$css = implode('{', $css_arr);

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
		[ '\f100', '\f104', '\f064', '\f060', '\f10e' ],
	 	[ '\f101', '\f105', '\f_64', '\f061', '\f_0e' ], 
	 	$css );

	$css = str_replace( 
	 	[ '\f112', '\f_64',   '\f10d', '\f_0e' ], 
	 	[ '\f064', '\f112',   '\f10e', '\f10d' ], 
	 	$css );

	return $css;

}


function lang_css_fix_toggle( $css, $from, $to ){

	$fr__ = substr($from, 0, -2)."__";

	$css = str_ireplace( $from, $fr__, $css);
	$css = str_ireplace( $to, $from, $css);
	$css = str_ireplace( $fr__, $to, $css);

	return $css;

}











