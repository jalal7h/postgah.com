<?

function upvote_userprofile_lastUpvotes(){

	$c = "<div class='".__FUNCTION__." uvupluv'>
	<div class='head'>آخرین رای های مثبت</div>\n";

	if(! $user_id = $_REQUEST['id']){
		e( __FUNCTION__,__LINE__ );
		
	} else if(! $rs = dbq(" SELECT * FROM `upvote` WHERE `user_id`='$user_id' ORDER BY `id` DESC LIMIT 20 ")){
		e( __FUNCTION__,__LINE__ );

	} else if(! dbn($rs)){
		return "";
	
	} else while( $rw = dbf($rs) ){
		$c.= upvote_userprofile_lastUpvotes_this( $rw );
	}

	$c.= "</div>\n";

	return $c;
}


function upvote_userprofile_lastUpvotes_this( $rw ){
	
	# 
	# upvote url	
	$upvote_url = _URL.$rw['page_url']."#".$rw['table_name']."-".$rw['table_id'];
	
	#
	# table
	$upvote_post_tableName = lmtc($rw['table_name'])[0];
	$rw_table = table( $rw['table_name'], $rw['table_id'] );
	
	if( $upvote_post_name = $rw_table['name'] ){
		$subject = $upvote_post_tableName.' </span><a class="name" href="'.$upvote_url.'">'.$upvote_post_name.'</a> ';
	
	} else if( $upvote_post_text = $rw_table['text'] ) {
		$subject = $upvote_post_tableName.' </span><a class="text" href="'.$upvote_url.'">'.$upvote_post_text.'</a>';
	} else {
		echo ":-B";
	}
	
	$c = '
	<div class="this">
		<div class="the_post"><span>'.time_inword_before( $rw['date'] ).' ، به '.$subject.'<span>رای مثبت داد.</span>
		</div>
	</div>
	';

	return $c;
}






