<?

function pgItem_set_cat_serial( $item_id ){

	$cat_id = table("item", $item_id, "cat_id");

	$serial_arr = cat_id_serial( $cat_id );
	$serial = "/" . implode('/', $serial_arr) . "/";

	if(! dbs( 'item', [ 'cat_serial'=>$serial ], [ 'id'=>$item_id ] ) ){
		return false;

	} else {
		return true;
	}

}

