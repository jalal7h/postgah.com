<?

# jalal7h@gmail.com
# 2016/07/13
# 1.1

/*

echo date_zero( 'add', '2016/1/12' ); // 2016/01/12
echo date_zero( 'remove', '2016/01/03' ); // 2016/1/3

*/

/*README*/

function date_zero( $action , $date ){

	$date = explode('/', $date);

	switch( $action ){
		
		case 'add':
			if( $date[1] < 10 ){
				$date[1] = "0".intval($date[1]);
			}
			if( $date[2] < 10 ){
				$date[2] = "0".intval($date[2]);
			}
			break;

		case 'remove':
			$date[1] = intval($date[1]);
			$date[2] = intval($date[2]);
			break;

	}

	$date = implode('/', $date);

	return $date;
}


# same as top
function addzero($Q){
	
	if($Q<10){
		return '0'.$Q;

	} else {
		return $Q;
	}
	
}










