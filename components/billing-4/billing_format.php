<?

# jalal7h@gmail.com
# 2016/11/01
# 1.0

// $%% USD

/*README*/

function billing_format( $money ){

	if( $money == 0 ){
		return "";
	}

	$unit = setting('money_unit');
	
	if( strstr($unit, '%%') ){
		$money = str_replace( '%%', $money, $unit );
	
	} else {
		$money.= " ".$unit;
	}

	return $money;

}


