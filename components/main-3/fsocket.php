<?php

# jalal7h@gmail.com
# 2017/01/25
# 1.0

function fsocket( $url, $params=null, $method="POST" ){


	#####################
	# fix url and port
	#
	if( substr( $url, 0, 8) == 'https://' ){
		$url = substr($url,8);
		$port = 443;
	
	} else if( substr( $url, 0, 7 ) == 'http://' ){
		$url = substr($url,7);
		$port = 80;
	
	} else {
		$port = 80;
	}
	#
	######################


	# 
	# fix params
	if( sizeof($params) ){
		$params = http_build_query($params);

		if( strstr( $url, '?') ){
			$url.= "&".$params;
		
		} else if( substr($url,-1) == '/' ){
			$url.= '?'.$params;
		
		} else {
			$url.= '/?'.$params;			
		}

	}


	#
	# fix method
	$method = strtoupper($method);
	

	# 
	# run it
	if(! $fp = fsockopen($url, $port, $errno, $errstr, 10) ){
		echo "$errstr ($errno)<br />\n";
		
	} else {
		
		$out = "$method / HTTP/1.1\r\n";
		$out .= "Host: $url\r\n";
		$out .= "Connection: Close\r\n\r\n";
		
		fwrite($fp, $out);
		
		while (! feof($fp) ) {
			$c.= fgets($fp, 128);
		}
		
		fclose($fp);

	}


	#
	# return the result
	return $c;

}
