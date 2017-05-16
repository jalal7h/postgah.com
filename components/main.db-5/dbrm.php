<?

# jalal7h@gmail.com
# 2017/05/16
# 3.1

# dbrm( 'post', 11 );
# dbrm( 'post', 11, $recursive=true );
# dbrm( 'post', [ 'name'=>'Some Name', 'cat'=>12 ] , true );

function dbrm( $table, $id=null, $recursive=false ){

	#
	# state: no $id input
	if(! $id ){
		if(! $id = $_REQUEST['id'] ){
			return e();
		}
	}

	#
	# state: array $id
	if( is_array($id) ){

		#
		# no result
		if(! $rw_s = table( $table, $id/*array_set*/ ) ){
			return true;

		#
		# only one result	
		} else if( sizeof($rw_s) == 1 ){
			$id = $rw_s[0]['id'];

		#
		# more than one result
		} else {
			foreach( $rw_s as $rw ){
				dbrm( $table, $rw['id'], $recursive );
			}
			return true;
		}

	}
	
	# loop passed.

	#
	# non numeric $id
	if(! is_numeric($id) ){
		return e();
	}

	# 
	# recursive records
	if( $recursive ){
		$recursive_column = $table."_id";
		foreach( get_tables() as $i => $recursive_table ){
			if( is_column( $recursive_table, $recursive_column ) ){
				dbq(" DELETE FROM `$recursive_table` WHERE `$recursive_column`='$id' ");
			}
		}
	}

	# 
	# main record
	if(! dbq(" DELETE FROM `$table` WHERE `id`='$id' LIMIT 1 ") ){
		dg();

	} else {
		return true;
	}

	return false;

}





