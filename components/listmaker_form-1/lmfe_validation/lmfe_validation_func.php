<?php

# jalal7h@gmail.com
# 2017/05/16
# 1.0

add_action('lmfe_validation_func');

function lmfe_validation_func(){
	
	if(! $func = $_REQUEST['func'] ){
		e();
		
	} else if(! $func = str_dec($func) ){
		e();
		
	} else if(! $value = $_REQUEST['value'] ){
		e();
		
	} else if(! $req = $_REQUEST['req'] ){
		e();

	} else if(! $req = str_dec($req) ){
		e();

	} else if(! $req = json_decode($req, true) ){
		e();

	} else {

		$_REQUEST = $req;
		
		ob_start();
		if( $func( $value ) ){
			$prompt = "OK";
		} else {
			$prompt = "ER";
		}
		$text = ob_get_contents();
		ob_end_clean();

		echo $prompt;
		echo $text;

		die();
		
	}

}

