<?

# jalal7h@gmail.com
# 2016/11/30
# 1.0

function ticketbox_isNew( $ticketbox_id ){
	
	return !ticketbox_user( $ticketbox_id )['view'];
	
}
