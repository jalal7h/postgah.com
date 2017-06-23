<?

function layout_mg_remove(){

	if(! $id = $_REQUEST['id'] ){
		e();
	
	} else if( $id < 100 ){
		echo convbox( __('شما مجاز به حذف این صفحه نمی باشید.') , 'red' );
		
	} else {
		return dbrm( 'page', $id, true );
	}

	return false;

}

