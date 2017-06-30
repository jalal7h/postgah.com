<?php

# jalal7h@gmail.com
# 2017/06/30
# 1.2

function ticketbox_link( $rw ){

	if( is_numeric($rw) ){
		$rw = table( 'ticketbox', $rw );
	}

	return _URL . '/' . Slug::getSlugByName('userpanel') . "/ticket/" . $rw['id'];

}

function ticketbox_user_link( $rw ){
	return ticketbox_link($rw);
}