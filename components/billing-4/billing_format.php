<?php

# jalal7h@gmail.com
# 2017/06/05
# 2.0

function billing_format( $money, $silent_on_zero=true ){


	if( defined('lang_dir') and lang_dir === 'ltr' ){
		$money = number_format( $money, 2 );

	} else {
		$money = number_format( $money );		
	}

	if( $silent_on_zero and $money == 0 ){
		return "";
	}

	$unit = billing_unit();
	$money = $unit['sign'].$money." ".$unit['code'];
	
	return $money;

}


