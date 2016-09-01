<?php


function layout_page_link( $rw_page ){

	if( is_numeric($rw_page) ){
		$rw_page = table( 'page', $rw_page );
	}

	$link = _URL.'/page-'.$rw_page['id'].'.html';

	return $link ;

}



