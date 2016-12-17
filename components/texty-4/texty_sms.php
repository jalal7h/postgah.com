<?

# jalal7h@gmail.com
# 2016/12/16
# 3.3

/*
texty_sms( "user" , "user_register_do_sms" , array(
	"username"=>$username,
	"password"=>$password,
) );
*/

# who : `admin` / `user` / or a mobile number, $who can be array of user_id's [ 1 , 3 ]
# slug : a template name / or a text message
# vars : something that we need to put it into the slug content

function texty_sms( $who , $slug , $vars ){

	if( ! is_component('sms') ){
		return false;
	}

	#
	# who
	switch ($who) {

		case 'admin':
			$admin_id = 1;
			break;

		case 'user':
			$user_id = user_logged();
			break;

		default:
			
			# [ 2 , 45 ]
			if( is_array($who) ){
				$user_id = $who[0];
				$user2_id = $who[1];
			
			# Yadollah
			} else if(! is_numeric($who) ){
				return false;

			# 11
			} else if( strlen($who) < 10 ) {
				$user_id = $who;
			
			# 9127744129
			} else {
				$user_numb = $who;
			}

			break;

	}

	#
	# get texty record
	if(! $texty = texty_fetch( $slug ) ){
		return false;

	} else if( $admin_id ){
		$rw_admin = table( 'user' , $admin_id );
		$admin_numb = user_cellNumber( $admin_id );
		texty_sms_this( $admin_numb, $texty['admin_sms'], $vars, $rw_admin );
		
	} else {

		if( $user_id > 0 ){
			$rw_user = table( 'user' , $user_id );
			$user_numb = user_cellNumber( $user_id );
			texty_sms_this( $user_numb, $texty['user_sms'], $vars, $rw_user );
		}
		if( $user2_id > 0 ){
			$rw_user2 = table( 'user' , $user2_id );
			$user2_numb = user_cellNumber( $user2_id );
			texty_sms_this( $user2_numb, $texty['user2_sms'], $vars, $rw_user2 );
		} 

	}
	
}


function texty_sms_this( $to, $content, $vars, $rw_user ){

	if(! $to ){
		return false;
	
	} else if(! $content = trim( strip_tags($content) ) ){
		return false;
	}

	if( $rw_user ){
		$content = str_replace('{user_cell}', $to, $content);
		$content = str_replace('{user_email}', $rw_user['username'], $content);
		$content = str_replace('{user_id}', $rw_user['id'], $content);
		$content = str_replace('{user_name}', $rw_user['name'], $content);
	}

	#
	# replace vars
	if( sizeof($vars) ){
		foreach( $vars as $k => $v ){
			$content = str_replace('{'.$k.'}', $v, $content);
		}
	}

	#
	# send the text
	sms_send( $to , $content );

}










