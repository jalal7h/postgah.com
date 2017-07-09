<?

# jalal7h@gmail.com
# 2016/10/15
# 1.0

function position_id_serial( $id ){

	while( 1 ){
		$serial[] = $id;
		$rw = table('position', $id);
		
		if(! $id = $rw['parent'] ){
			break;
		}

	}

	return $serial;

}

