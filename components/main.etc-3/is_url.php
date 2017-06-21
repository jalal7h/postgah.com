<?php

# jalal7h@gmail.com
# 2017/06/18
# 1.0

function is_url( $url ){
	
	if( substr($url, 0, 7) == 'http://'  or  substr($url, 0, 8) == 'https://' ){
		return true;
	
	} else {
		return false;
	}

}

