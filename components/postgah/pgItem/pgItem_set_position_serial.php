<?

function pgItem_set_position_serial( $item_id ){

	$position_id = table("item", $item_id, "position_id");

	$serial_arr = position_id_serial( $position_id );
	$serial = "/" . implode('/', $serial_arr) . "/";

	if(! dbs( 'item', [ 'position_serial'=>$serial ], [ 'id'=>$item_id ] ) ){
		return false;

	} else {
		return true;
	}

}

