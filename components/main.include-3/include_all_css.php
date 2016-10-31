<?

# jalal7h@gmail.com
# 2016/10/27
# 1.1

/*README*/

$GLOBALS['do_action'][] = "include_all_css";

// minify_css_remove_spaces
define( 'mcrs', true );

function include_all_css(){
	
	asort($GLOBALS['include_all_css']);
	
	@header("Content-disposition: filename=styles.css");
	@header("Content-type: text/css");
	
	if(! $GLOBALS['include_all_css'] ){
		if( mcrs !== true ){
			echo "/*** no other css found ***/";
		}
		return true;
	
	} else foreach( $GLOBALS['include_all_css'] as $k => $file ){
		
		$css = implode('',file($file));
		$displayFlag = false;
		
		if( trim(str_replace(array("/*admin*/","/*index*/"), "", $css)) == '' ){
			continue;
		
		} else if( strstr($css,"/*admin*/") ){
			if( $_REQUEST['page'] == 'admin' ){
				$displayFlag = true;
			}
		
		} else if( strstr($css,"/*index*/") ){
			if( $_REQUEST['page'] != 'admin' ){
				$displayFlag = true;
			}
		
		} else {
			$displayFlag = true;
		}

		// $css = trim(str_replace(array("/*admin*/","/*index*/"), "", $css));
		if( $displayFlag ){
			if( mcrs === true ){
				$css = minify_css_remove_spaces($css);

			} else {
				echo "\n/* * * * * * * * * * * * * * * * * * * * * * * css : ".$file."  * * * * * * * */\n";
				echo $css;
				echo "\n/* * * * * * * */\n\n";
			}
		}

	}
}


