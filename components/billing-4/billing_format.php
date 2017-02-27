<?

# jalal7h@gmail.com
# 2017/02/20
# 1.2

// $%% USD

/*README*/

function billing_format( $money, $silent_on_zero=true ){

	$money = number_format($money);

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


