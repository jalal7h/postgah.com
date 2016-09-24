<?

# jalal7h@gmail.com
# 2016/09/24
# 1.0

function canonical_tag(){


	# 
	# page
	if(  (sizeof($_GET) == 0)  or  ( isset($_GET['page']) and (sizeof($_GET) == 1) )  ){
		
		if( _PAGE == 1 ){
			$link = _URL;
		
		} else {
			$link = _URL."/page-"._PAGE.".html";
		}
		

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

