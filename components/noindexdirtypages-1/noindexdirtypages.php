<?php

# jalal7h@gmail.com
# 2016/12/27
# 1.0

function noindexdirtypages(){
	
	if( strstr( _FULL_URL , '?') ){
		return '<meta name="googlebot" content="noindex" />';
	} else {
		return '';
	}

}

