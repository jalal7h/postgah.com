<?

function pgItem_list_of_premium_extra_save( $rw_pagelayer ){

	$data['number_of_rows'] = intval($_REQUEST['number_of_rows']);
	$data = json_encode( $data );
	
	if(! dbs( 'page_layer', [ 'data'=>$data ], [ 'id'=>$rw_pagelayer['id'] ] ) ){
		e(__FUNCTION__,__LINE__);

	} else {
		return true;
	}
	
	return false;

}

