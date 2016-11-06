<?

function fbcm_userprofile_lastUpvotes(){

	$c = "<div class='".__FUNCTION__." fbcmuplu'>
	<div class='head'>".__('آخرین نظرات')."</div>";

	if(! $user_id = $_REQUEST['id']){
		e(__FUNCTION__,__LINE__);

	} else if(! $rs = dbq(" SELECT * FROM `facebookComment` WHERE `user_id`='$user_id' ORDER BY `id` DESC LIMIT 20 ")){
		e(__FUNCTION__,__LINE__);

	} else if(! dbn($rs)){
		return "";

	} else while( $rw = dbf($rs)){
		$c.= fbcm_userprofile_lastUpvotes_this( $rw );
	}

	$c.= "</div>";

	return $c;
}

function fbcm_userprofile_lastUpvotes_this( $rw ){
	
	# 
	# the related post	
	$related_post_url = _URL."/?page=".$rw['page_id']."&id=".$rw['table_id'];
	$related_post_name = table( $rw['table_name'], $rw['table_id'], "name");
	
	# comment
	$comment_url = _URL."/?page=".$rw['page_id']."&id=".$rw['table_id']."&#comment-".$rw['id'];
	$comment_text = $rw['text'];

	#
	# replied to
	if( $rw['comment_id'] ){
		$rw_replay_to = table("facebookComment", $rw['comment_id']);
		$replay_to_text = $rw_replay_to['text'];
		$replay_to_id = $rw_replay_to['user_id'];
		$replay_to_name = table("users", $rw_replay_to['user_id'], "name");
		$replay_to_url = _URL."/?page=".$rw['page_id']."&id=".$rw['table_id']."&#comment-".$replay_to_id;
	}

	$c = '
	<div class="this">
		
		<div class="related_post">'.__('در مورد').' <a href="'.$related_post_url.'">'.$related_post_name.'</a></div>
		
		'.($rw['comment_id']? '<div class="replay_to">'.__('در جواب').' '.useravatar( $replay_to_id, $text_flag=true , $link_flag=true ).'<a href="'.$replay_to_url.'">'.$replay_to_text.'</a></div>' :'').'
		
		<div class="said">گفت <a href="'.$comment_url.'">'.$comment_text.'</a></div>
	
	</div>
	';

	return $c;
}










