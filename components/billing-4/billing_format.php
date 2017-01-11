<?

# jalal7h@gmail.com
# 2017/01/09
# 1.1

// $%% USD

/*README*/

function billing_format( $money, $silent_on_zero=true ){

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


