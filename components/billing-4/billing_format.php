<?

# jalal7h@gmail.com
# 2017/04/14
# 1.3

// $%% USD

/*README*/

function billing_format( $money, $silent_on_zero=true ){

	$money = number_format( $money, 2 );

	if( $silent_on_zero and $money == 0 ){
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


