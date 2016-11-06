<?

function fbcm_list( $table_name , $table_id , $comment_id=0, $page_id=0 ){
	
	$c = '<div class="fbcm_list" id="fbcm_'.$table_name.'_'.$table_id.'_'.$comment_id.'_'.$page_id.'" >';
	
	if(! $rs = dbq(" SELECT * FROM `facebookComment` WHERE `table_name`='".$table_name."' AND `table_id`='".$table_id."' AND `comment_id`='".$comment_id."' ORDER BY `date` DESC ") ){
		e( __FUNCTION__ , __LINE__ );
	} else while( $rw = dbf($rs) ){
		$c.= fbcm_list_this( $table_name , $table_id , $rw );
	}

	$c.= "</div>";

	return $c;
}

function fbcm_list_this( $table_name , $table_id , $rw ){
	
	$c = '
	<a name="comment-'.$rw['id'].'"></a>
	<div>
	<div class="r">'.
		useravatar( $rw['user_id'] , $text_flag=true , $link_flag=true , $job_flag=true , $where_flag=true ).'
		<div class="date">'.time_inword_before( $rw['date'] ).'</div>
		<div class="text">'.$rw['text'].'</div>
		<div class="links">
			'.( is_component('upvote') ? upvote_form("facebookComment",$rw['id']) : '').'
			'.( user_logged() ? '<a class="reply" href="#" onclick="return fbcm_subCommentVisible( this )">پاسخ</a>' :'' ).
			( _fbcm_share_on_twitter ? '<a class="tweet twitter_popup" href="http://twitter.com/share?text='.urlencode($rw['text']).'&url='.urlencode( stash_item_link( table("item", $_REQUEST['id']) )."#comment-".$rw['id'] ).'"></a>' : '').
			'
		</div>
	</div>';
	
	$c.= fbcm( $table_name , $table_id , $comment_id=$rw['id'], $page_id=0 );
	$c.= "</div>";
	
	return $c;	
}







