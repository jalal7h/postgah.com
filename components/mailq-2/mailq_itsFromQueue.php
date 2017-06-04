<?

# jalal7h@gmail.com
# 2016/11/11
# 1.0


function mailq_itsFromQueue(){
	
	if( qpop( 'mailq_itsFromQueue' ) ) {
		return true;
	
	} else {
		return false;
	}

}





