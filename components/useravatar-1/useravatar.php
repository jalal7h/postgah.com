<?

function useravatar( $user_id , $text_flag=false , $link_flag=false , $job_flag=false , $where_flag=false ){

	// if( $GLOBALS['useravatar-cache'][ $user_id ] ){
	// 	return $GLOBALS['useravatar-cache'][ $user_id ];
	// }

	if(! $rw_user = table("users", $user_id) ){
		return false;
	}

	$c.= '<div class="useravatar">';
	
	$c.= ( $link_flag ?'<a target="_blank" href="'.userprofile_link( $user_id ).'">' :'' );
	$c.= '<img src="'._URL.'/'.$rw_user['profile_pic'].'" />';
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


