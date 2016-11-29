<?

# jalal7h@gmail.com
# 2016/11/29
# 1.1

function fbcomment_userprofile_lastUpvotes(){

	$c = "<div class='".__FUNCTION__." fbcommentuplu'>
	<div class='head'>".__('آخرین نظرات')."</div>";

	if(! $user_id = $_REQUEST['id']){
		e();

	} else if(! $rs = dbq(" SELECT * FROM `fbcomment` WHERE `user_id`='$user_id' ORDER BY `id` DESC LIMIT 20 ")){
		e();

	} else if(! dbn($rs)){
		return "";

	} else while( $rw = dbf($rs)){
		$c.= fbcomment_userprofile_lastUpvotes_this( $rw );
	}

	$c.= "</div>";

	return $c;
}









