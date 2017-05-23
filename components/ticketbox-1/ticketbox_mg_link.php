<?php

# jalal7h@gmail.com
# 2017/05/21
# 1.0

function ticketbox_mg_link( $rw ){
	
	if( is_numeric($rw) ){
		$rw = table('ticketbox', $rw);
	}

	return _URL . '/admin/ticketbox/view/' .$rw['id'] ;

}

