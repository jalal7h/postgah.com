<?

# jalal7h@gmail.com
# 2017/01/21
# 1.1

add_headtag( 'include_all_css_echotags', 0 );

function include_all_css_echotags(){

	if( defined('minify') and minify===false ){

		asort($GLOBALS['include_all_css']);

		foreach($GLOBALS['include_all_css'] as $k => $file){
		
			$css = implode('',file($file));
			$displayFlag = false;
			
			if(trim(str_replace(array("/*admin*/","/*index*/"), "", $css))==''){
				continue;
			
			} else if(strstr($css,"/*admin*/")){
				if( $_REQUEST['page']=='admin' ){
					$displayFlag = true;
				}
			
			} else if(strstr($css,"/*index*/")){
				if( $_REQUEST['page']!='admin' ){
					$displayFlag = true;
				}
			
			} else {
				$displayFlag = true;
			}

			if( $displayFlag ){
				$c.= '<link href="'._URL.'/'.$file.'" rel="stylesheet" type="text/css" />'."\n\t";
			}

		}

	} else {
		$c = '<link href="'._URL.'/styles'.($_REQUEST['page']=='admin' ? '-admin' : '').'.css" rel="stylesheet" type="text/css" />';
	}

	return $c;

}

