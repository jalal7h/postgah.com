<?php

# jalal7h@gmail.com
# 2017/01/25
# 1.0

function curl( $url , $params=null, $method="POST" ){

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url );
	
	if( sizeof($params) ){
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params) );
	}
	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$server_output = curl_exec ($ch);
	curl_close ($ch);

	return $server_output;

}

