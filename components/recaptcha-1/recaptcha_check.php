<?php

# jalal7h@gmail.com
# 2017/01/25
# 1.0

function recaptcha_check(){
	
	if(! $response = trim($_REQUEST['g-recaptcha-response']) ){
		//

	} else if(! $res = curl( 'https://www.google.com/recaptcha/api/siteverify', [
		'secret'	=> recaptcha_secred_key , 
		'response'	=> $response
	] ) ){
		//

	} else {

		$res = json_decode($res, true);

		if( $res['success'] === true ){
			return true;
		}

	}

	?>
	<div dir="ltr" style="
		line-height: 100vh !important;
		font: normal 36px Monospace, sans-serif;
		text-align: center; 
		position: absolute; 
		top: 0px; 
		left: 0px; 
		width: 100vw; 
		height: 100vh; 
		color: #600; 
		background-color: #eee;">invalid captcha</div>
	<?
	die();

}




