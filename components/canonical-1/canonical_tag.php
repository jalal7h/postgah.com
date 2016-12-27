<?

# jalal7h@gmail.com
# 2016/12/27
# 1.1

function canonical_tag(){

	# 
	# page
	if(  (sizeof($_GET) == 0)  or  ( isset($_GET['page']) and (sizeof($_GET) == 1) )  ){
		echo __LINE__;
		if( _PAGE == 1 ){
			$link = _URL;
		
		} else {
			$link = _URL."/page-"._PAGE.".html";
		}
		
		
	#
	# dirty page
	} else if( strstr( $_SERVER['REQUEST_URI'], '?' ) ){
		return "";


	# 
	# canonical tag request
	} else if( $_GET['canonical_tag'] == 1 ){
		$link = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];


	#
	# strange things
	} else {
		return "";
	}


	return '<link rel="canonical" href="'.$link.'" />';


}

