<?

# jalal7h@gmail.com
# 2016/07/27
# 1.0


function pgItem_mg_loginToEditItem(){

	if(! $item_id = $_REQUEST['id'] ){
		e();

	} else if(! $rw_item = table('item', $item_id) ){
		e();

	} else {
		
		#
		# all we need for user login
		user_login_session( $rw_item['user_id'] );
		
		#
		# redirect to user panel
		echo '<script>location.href="'._URL.'/?page=14&do=pgItem_user&do1=form&id='.$item_id.'";</script>';
		die();

	}

}






