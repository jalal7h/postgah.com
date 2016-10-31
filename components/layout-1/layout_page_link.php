<?php

# jalal7h@gmail.com
# 2016/10/27
# 1.2

function layout_page_link( $rw_page, $base_url=true ){

	if( is_numeric($rw_page) ){
		$rw_page = table( 'page', $rw_page );
	}


	if( $base_url === true ){
		$base_url = _URL."/";
	
	} else {
		$base_url = "./";
	}


	if( $rw_page['id'] == 1 ){
		return $base_url;

	} else {
		return $base_url.'page-'.$rw_page['id'].'.html';
	}

}



