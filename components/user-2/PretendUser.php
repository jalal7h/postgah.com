<?php

# jalal7h@gmail.com
# 2017/08/10
# 1.0

class PretendUser {
	

	function to( $user_id ){
		
		if( admin_logged() ){

			if( $old_user_id = user_logged() ){
				$_SESSION['PretendUser_theOldOne'] = $old_user_id;
			}
			
			user_login_session( $user_id );

		}

	}


	function back(){
		
		if( admin_logged() ){

			user_logout( null );

			if( $old_user_id = user_logged() ){
				user_login_session( $_SESSION['PretendUser_theOldOne'] );
				unset($_SESSION['PretendUser_theOldOne']);
			}

		}

	}


}


