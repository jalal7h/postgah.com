<?

# jalal7h@gmail.com
# 2016/08/23
# 1.1

function useravatar( $user_id, $text_flag=false, $link_flag=false, $job_flag=false, $where_flag=false ){

	// if( $GLOBALS['useravatar-cache'][ $user_id ] ){
	// 	return $GLOBALS['useravatar-cache'][ $user_id ];
	// }

	if(! $rw_user = table("user", $user_id) ){
		return false;
	}

	$profile_pic = user_photo( $rw_user );

	$c.= '<div class="useravatar">';
	
	$c.= ( $link_flag ?'<a target="_blank" href="'.userprofile_link( $user_id ).'">' :'' );
	$c.= '<img src="'._URL.'/'.$profile_pic.'" />';
	$c.= ( $link_flag ?'</a>' :'' );
	
	if( $text_flag ) {
		$c.= '<div>'.
			( $link_flag ?'<a class="name" target="_blank" href="'.userprofile_link( $user_id ).'">' :'<div class="name">' ).
			$rw_user['name'].
			( $link_flag ?'</a>' :'</div>' ).
			( ($job_flag and $rw_user['im_a']) ?'<div class="job"> — '.$rw_user['im_a'].'</div>' :'' ).
			( ($where_flag and $rw_user['work_at']) ?'<div class="where"> @ '.$rw_user['work_at'].'</div>' :'' ).
			'</div>';
	}

	$c.= '</div>';

	$GLOBALS['useravatar-cache'][ $user_id ] = $c;

	return $c;
}






