<?

define( 'upvote_title' , 'رای+' );
define( 'upvote_title_s' , 'آرای +' );

function upvote_form( $table_name , $table_id=null ){

	$page_url = urldecode(str_enc( _URI ));

	if(! $table_id ){
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

		$c.= '
		<a name="'.$table_name.'-'.$table_id.'"></a>
		<div class="upvote_form '.$clicked.'" '.( user_logged() ?'onclick="upvote_do(this)"' :'title="برای ثبت رای مثبت باید ثبت نام کنید" style="cursor:default" ' ).' rel="'.$table_name.":".$table_id.':'.$page_url.'" >
			<icon></icon>
			<div>'.( $numb==0 ? upvote_title : $numb ).'</div>
		</div>';
	}

	return $c;
}

