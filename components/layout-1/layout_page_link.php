<?php

# jalal7h@gmail.com
# 2016/09/24
# 1.1

function layout_page_link( $rw_page ){

	if( is_numeric($rw_page) ){
		$rw_page = table( 'page', $rw_page );
	}

	if( $rw_page['id'] == 1 ){
		return _URL;

	} else {
		return _URL.'/page-'.$rw_page['id'].'.html';
	}

}



