<?

function cost_in_word( $cost ){

	if( $cost == 0 ){
		return "مجانی";
	
	} else {
		return number_format($cost)." ".setting('money_unit');
	}

}
