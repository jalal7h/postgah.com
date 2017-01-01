<?

# jalal7h@gmail.com
# 2017/01/01
# 1.0

function canonical_link(){

	# 
	# page
	if(  (sizeof($_GET) == 0)  or  
		 ( $_GET['page'] and (sizeof($_GET) == 1) )  or 
		 ( $_GET['page'] and $_GET['canonical_tag'] and (sizeof($_GET) == 2) )
	){

		if( _PAGE == 1 ){
			$link = _URL;
		
		} else {
			$link = layout_link(_PAGE);
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


	return $link;

}

