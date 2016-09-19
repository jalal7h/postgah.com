<?

function pgItem_set_cat_serial( $item_id, $rw_item=null ){

	if( $rw_item ){
		$cat_id = $rw_item['cat_id'];

	} else {
		$cat_id = table("item", $item_id, "cat_id");		
	}

	if( $GLOBALS['cat_id_serial'] and array_key_exists($cat_id, $GLOBALS['cat_id_serial']) ){
		$serial_arr = $GLOBALS['cat_id_serial'][ $cat_id ];

	} else {
		$serial_arr = cat_id_serial( $cat_id );
		$GLOBALS['cat_id_serial'][ $cat_id ] = $serial_arr;
	}
	
	$serial = "/" . implode('/', $serial_arr) . "/";

	if( $serial == '//' ){
		echo "we have problem at ".__FUNCTION__." : ".__LINE__;
		die();
	}

	if(! dbs( 'item', [ 'cat_serial'=>$serial ], [ 'id'=>$item_id ] ) ){
		return false;

	} else {
		return true;
	}

}

