<?php

# jalal7h@gmail.com
# 2017/06/15
# 1.1

function ticketbox_link( $rw ){

	if( is_numeric($rw) ){
		$rw = table( 'ticketbox', $rw );
	}

	return _URL . '/' . Slug::getSlugByName('userpanel') . "/ticket/" . $rw['id'];

}

