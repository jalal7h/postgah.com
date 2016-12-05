<?

# jalal7h@gmail.com
# 2016/12/05
# 3.2

/*
texty_sms( "user" , "user_register_do_sms" , array(
	"username"=>$username,
	"password"=>$password,
) );
*/

# who : `admin` / `user` / or a mobile number
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
			if(! $to = user_cellNumber(1) ){
				return false;
			}
			break;

		case 'user':
			if(! $user_id = user_logged() ){
				return false;

			} else if(! $to = user_cellNumber($user_id) ){
				return false;
			}
			break;

		default:
			if(! is_numeric($who) ){
				return false;
				
			} else if( strlen($who)<10 ){ // its user_id
				$user_id = $who;
				if(! $rw_user = table("user", $user_id) ){
					ed();

				} else {
					$to = $rw_user['username'];
				}

			} else {
				$to = $who;
			}
			break;
	}

	#
	# number validation
	if( substr($to, 0, 2)!='09' ){
		return false;

	#
	# get texty record
	} else if(! $texty = texty_fetch( $slug ) ){
		return false;
		// ed(__FUNCTION__,__LINE__);

	#
	# user sms content
	} else if( $rw_user ){
		$content = $texty['user_sms'];
		$content = str_replace('{user_email}', $rw_user['username'], $content);
		$content = str_replace('{user_id}', $rw_user['id'], $content);
		$content = str_replace('{user_name}', $rw_user['name'], $content);

	#
	# admin sms content
	} else {
		$content = $texty['admin_sms'];
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
	sms_send( $to , $text );
	
}



