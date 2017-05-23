<?

# jalal7h@gmail.com
# 2016/12/14
# 1.0

function ticketbox_user_link( $rw_tb__or__id_tb ){

	if( is_numeric($rw_tb__or__id_tb) ){
		$id = $rw_tb__or__id_tb;
		$rw_tb = table( 'ticketbox', $id );
	} else {
		$rw_tb = $rw_tb__or__id_tb;
		$id = $rw_tb['id'];
	}

	return _URL . '/' . Slug::getSlugByName('userpanel') . "/ticket-" . $id;

}

