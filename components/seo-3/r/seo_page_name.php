<?

function seo_page_name(){
	
	switch( $_REQUEST['page'] ){
		
		case '101' :
			$page_name = table( 'cat', $_REQUEST['id'], "name");
			break;
		
		case '102' :
			$page_name = table( 'item', $_REQUEST['id'], "name");
			break;

		default : 
			$page_name = table( 'page', $_REQUEST['page'], "name");
			break;

	}

	return $page_name;

}