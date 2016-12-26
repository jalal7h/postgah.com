<?

# jalal7h@gmail.com
# 2016/12/26
# 1.0

if( strstr( _FULL_URL , '://www.' ) ){
	$new_FULL_URL = str_replace( '://www.' , '://' , _FULL_URL );
	header( "HTTP/1.1 301 Moved Permanently" ); 
	header( "Location: ".$new_FULL_URL ); 
	die();
}


