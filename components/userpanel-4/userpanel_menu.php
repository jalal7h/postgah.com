<?

# jalal7h@gmail.com
# 2017/01/10
# 2.5

add_layer( 'userpanel_menu', 'منوی کاربری', 'side' );

function userpanel_menu(){
	
	$userpanel_slug = Slug::get('page',14);

	if(! $user_id = user_logged() ){
		return dg();
	
	} else if(! $rw = table("user",$user_id) ){
		dg();
		user_logout();
	
	} else if( $_REQUEST['page'] != 14 ){
		return dg();
	}

	echo template_engine( 'userpanel_menu', [
		'rw' => $rw ,
		'userpanel_slug' => $userpanel_slug,
	]);
	
}





