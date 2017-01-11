<?

# jalal7h@gmail.com
# 2017/01/10
# 1.2

function userpanel_headmenu(){

	if( $user_id = user_logged() ){
		
		if(! $rw = table("user", $user_id) ){
			e();
		
		} else {

			return template_engine( 'userpanel_headmenu-logged' , [
				'name' => $rw['name'] ,
				'photo' => ( user_photo( $rw, true ) ? user_photo($rw , "90x90") : '' ) ,
				'credit' => billing_format( billing_userCredit($user_id), false) ,
				'userpanel_slug' => Slug::get('page',14) 
			] );

		}
		
	} else {
		return template_engine( 'userpanel_headmenu-notlogged' );
	}

}





