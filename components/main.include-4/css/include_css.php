<?php

# jalal7h@gmail.com
# 2017/06/10
# 1.2

add_action('include_css');

function include_css(){
	
	@header("Content-disposition: filename=styles.css");
	@header("Content-type: text/css");
	

	##########################
	$cache_key = __FUNCTION__._PAGE;
	if( $css = cache( "hit", $cache_key, "30min" ) ){
		echo $css;
	} else {
	###########################


	asort( $GLOBALS['include_all_css'] );
	$css_files = array_merge( $GLOBALS['include_all_css_init'], $GLOBALS['include_all_css'] );

	$template_files = include_css_templateFiles();
	if( sizeof( $template_files ) ){
		$css_files = array_merge( $css_files, $template_files );
	}

	foreach( $css_files as $k => $file ){

		$normal_or_responsive = strstr( $file, '.responsive.' ) ? 'responsive' : 'normal' ;

		$css = implode( '', file($file) );
		$displayFlag = false;
		
		$css = include_css_fixIfResposiveAndSizeAttached( $file, $css, $normal_or_responsive );

		// /*"/*print*/",
		if( trim( str_replace([ "/*admin*/", "/*index*/", "/*skipfix*/" ], "", $css ) ) == '' ){
			continue;
		
		} else if( strstr($css,"/*admin*/") or strstr(basename($file),'_mg_') or strstr(basename($file),'_mg.') ){
			if( _PAGE == 'admin' ){
				$displayFlag = true;
			}
		
		} else if( strstr($css,"/*index*/") ){
			if( _PAGE != 'admin' ){
				$displayFlag = true;
			}
		
		} else {
			$displayFlag = true;
		}
		
		if( $displayFlag ){
		
			if( is_component('lang') ){
				$css = lang_css_fix( $css, $file );
			}

			if( minify and !debug ){
				$css = minify_css_remove_spaces($css);
			
			} else {
				// $css = "null";
				$css = "\n/*** $normal_or_responsive css : ".$file." ***/\n" . $css . "\n/***/\n\n";				
			}

			$css_code[ $normal_or_responsive ].= $css;
			
		}

	}

	$css = $css_code['normal'] . $css_code['responsive'];
		


	###########################
		echo cache( "make", $cache_key, $css );
	}
	##########################

}


function include_css_templateFiles(){

	$path = "templates/"._THEME."/css/";

	if(! $dp = opendir($path) ){
		e();
	
	} else while( $d = readdir($dp) ){
		
		if( substr($d,0,1) == '.' ){
			continue;
		
		} else if( strrchr($d,".") != '.css' ){
			continue;
		
		} else {
			$files[] = $path.$d;
		}

	}

	sort($files);

	return $files;

}


function include_css_fixIfResposiveAndSizeAttached( $file, $css, $normal_or_responsive ){

	// its not a responsive css code
	if( $normal_or_responsive == 'normal' ){
		return $css;
	}

	// already have @media
	if( strstr( $css, '@media' ) ){
		return $css;
	}

	$size = explode( '.responsive.' , $file )[1];
	$size = var_control( $size, '0-9-' ) ;

	// it does not have any size - should be preattached @media
	if( $size == '' ){
		return $css;
	}

	list( $min, $max ) = explode('-', $size);

	$css = "@media screen and (max-width: ".$max."px) and (min-width: ".$min."px) {\n"
		.$css
		."\n}\n";

	return $css;

}




