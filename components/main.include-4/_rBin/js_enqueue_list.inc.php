<?

# jalal7h@gmail.com
# 2017/01/20
# 1.1

/*README*/

function js_enqueue_list(){
	
	if(! sizeof( $GLOBALS['js_enqueue'] ) ){
		//
	
	} else foreach( $GLOBALS['js_enqueue'] as $i => $file_path ){
		$c.= "\t<script type=\"text/javascript\" src=\""._URL."/".$file_path."\"></script>\n";
	}

	return $c;

}










