<?php

# jalal7h@gmail.com
# 2017/06/05
# 1.0

function billing_unit(){
	
	$unit = setting('money_unit');
	$unit = trim($unit);
	$unit = str_replace( '%%', ' ', $unit );
	$unit = trim($unit);
	
	if( strstr( $unit, ' ' ) ){
		list( $sign, $code ) = explode( ' ', $unit );

	} else {
		$sign = "";
		$code = $unit;
	}

	return [ 'sign'=>$sign, 'code'=>$code ];

}

