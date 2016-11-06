<?

function upvote_list( $table_name , $table_id=null ){

	if(! $table_id ){
		if(! $table_id = $_REQUEST['id'] ){
			return "";
		}
	}

	if(! $rs = dbq(" SELECT * FROM `upvote` WHERE `table_name`='".$table_name."' AND `table_id`='".$table_id."' ORDER BY `date` DESC ")){
		e( __FUNCTION__ , __LINE__ );
	} else if(! $rn = dbn($rs) ) {
		return "";
	} else {
		$c.= '<div class="upvote_list'.( $rn > 7 ? ' tiny' : '' ).'">';
		while( $rw = dbf($rs) ){
			$c.= useravatar( $rw['user_id'] , $text_flag=false , $link_flag=true , $job_flag=false , $where_flag=false );
		}
		$c.= '</div>';
	}

	return $c;
}

