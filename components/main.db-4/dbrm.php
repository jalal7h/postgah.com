<?

# jalal7h@gmail.com
# 2016/07/16
# 1.0

function dbrm( $table, $id=null, $condition="" ){

	if(! $id ){
		if(! $id = $_REQUEST['id'] ){
			return false;
		}
	}

	if(! dbq(" DELETE FROM `$table` WHERE `id`='$id' ".( $condition ? " AND ".$condition : "" )." LIMIT 1 ") ){

	} else {
		return true;
	}

	return false;
}





