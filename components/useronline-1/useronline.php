<?

# jalal7h@gmail.com
# 2016/09/17
# 1.0

function useronline( $user_id ){
	
	$useronline_date = table('user',$user_id,'useronline_date');

	if( $useronline_date + 60 < U() ){
		return false;

	} else {
		return true;
	}

}


