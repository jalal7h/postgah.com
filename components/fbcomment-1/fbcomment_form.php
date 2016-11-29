<?

# jalal7h@gmail.com
# 2016/11/29
# 1.3

function fbcomment_form( $table_name , $table_id , $comment_id=0, $page_id=0 ){

	# 
	# no login / no form
	if(! $user_id = user_logged() ){
		if( $comment_id == 0 ){
			$c.= "<div class='fbcomment_form_login_request'>".__("ثبت نظر فقط برای کاربران سایت مجاز است.<br>برای ادامه %%ثبت نام%% کنید.", [ "<a href='./register' class='register_popup'>", "</a>" ] )."</div>";
		}

	} else {
		$c.= '
		<form class="form" method="post" autocomplete="off" rel="fbcomment_'.$table_name.'_'.$table_id.'_'.$comment_id.'_'.$page_id.'" onsubmit="return fbcomment_saveComment( this )">
			'.( is_component('useravatar') ? useravatar( $user_id ) : '' ).'
			<input type="text" name="comment" rel="'.$table_name.':'.$table_id.":".$comment_id.":".$page_id.'" autocomplete="off" placeholder="'.__('نظر شما ...').'" onclick="fbcomment_inputCommentCl(this)" onkeypress="fbcomment_inputCommentCl(this)" onblur="fbcomment_inputCommentBl(this)">
			<input type="submit" value="'.__('ارسال').'" />
		</form>';
	}

	return $c;

}







