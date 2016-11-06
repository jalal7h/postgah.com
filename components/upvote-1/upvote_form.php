<?

# jalal7h@gmail.com
# 2016/08/23
# 1.1

function upvote_form( $table_name , $table_id=null ){

	$page_url = urldecode(str_enc( _URI ));

	if(! $table_id ){
		echo "<script>upvote_title = '".upvote_title."';</script>\n";
		if(! $table_id = $_REQUEST['id'] ){
			return "";
		}
	}
	
	if(! $rs = dbq(" SELECT COUNT(*) FROM `upvote` WHERE `table_name`='".$table_name."' AND `table_id`='".$table_id."' ") ){
		e( __FUNCTION__ , __LINE__ );
	
	} else {
		$numb = dbr($rs, 0, 0);

		if(! $user_id = user_logged() ){
			;//
		} else if(! $rs2 = dbq(" SELECT COUNT(*) FROM `upvote` WHERE `table_name`='".$table_name."' AND `table_id`='".$table_id."' AND `user_id`='".$user_id."' ") ){
			e( __FUNCTION__ , __LINE__ );
		} else if( dbr($rs2,0,0)==1 ){
			$clicked = "clicked";
		}

		$c.= "<a name=\"".$table_name."-".$table_id."\"></a>\n";

		if( is_component('upvote') ){

			$the_title = __('برای ثبت %% باید ثبت نام کنید', [upvote_title] );
			
			$c.= '
			<div class="upvote_form '.$clicked.'" '.( user_logged() ?'onclick="upvote_do(this)"' :'title="'.$the_title.'" style="cursor:default" ' ).' rel="'.$table_name.":".$table_id.':'.$page_url.'" >
				<icon></icon>
				<div>'.( $numb==0 ? upvote_title : $numb ).'</div>
			</div>';
			
		}

	}

	return $c;
}

