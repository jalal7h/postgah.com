<?

# jalal7h@gmail.com
# 2016/09/26
# 3.3

/*
texty_email( 
	"admin", "nb_adminCoponCountCheck" , 
	[
		"netbarg_name"=>table("netbarg",$netbarg_id,"name"), 
		"netbarg_id"=>$netbarg_id,
	]
);
*/

# who : admin / user [it can be the user_id or the word 'user' if logged in] / or an email address
# slug : a template name / or a text message
# vars : something that we need to put it into the slug content

# user_id / user_email / user_name is already defined

// faghat age user login bashe, $who='user' kar mikone



$GLOBALS['mss_list']['texty_email'] = 'پیامهای پیشفرض';

function texty_email( $who , $slug , $vars=null ){

	#
	# actions
	switch ($who) {

		case 'admin':
			$its_admin = true;
			$to = setting('contact_email_address_0');
			break;

		case 'user':
			if(! $user_id = user_logged() ){
				return false;
			
			} else if(! $rw_users = table("users", $user_id) ){
				return false;
			
			} else {
				$to = $rw_users['username'];
				// its OK
			}
			break;

		default:
			if( is_numeric($who) ){
				$user_id = $who;
				if(! $rw_users = table("users", $user_id) ){
					e(__FUNCTION__,__LINE__);
					die();
				} else {
					$to = $rw_users['username'];
				}

			} else {
				$to = $who;
			}
			break;
	}

	#
	# get texty record
	if(! $texty = texty_fetch( $slug ) ){
		return false;

	#
	# admin email
	} else if( $its_admin ){
		$subject = $texty['admin_email_subject'];
		$content = $texty['admin_email_content'];

	#
	# user email
	} else {

		$subject = $texty['user_email_subject'];
		$content = $texty['user_email_content'];

		if( $rw_users ){
			
			# email
			$subject = str_replace('{user_email}', $rw_users['username'], $subject);
			$content = str_replace('{user_email}', $rw_users['username'], $content);
			# id
			$subject = str_replace('{user_id}', $rw_users['id'], $subject);
			$content = str_replace('{user_id}', $rw_users['id'], $content);
			# name
			$subject = str_replace('{user_name}', $rw_users['name'], $subject);
			$content = str_replace('{user_name}', $rw_users['name'], $content);

		}
		
	}

	#
	# if its disabled return back.
	if( !$subject or !$content ){
		return false;
	}

	#
	# replaces vars
	if( sizeof($vars) ){
		foreach( $vars as $k => $v ){
			$subject = str_replace('{'.$k.'}', $v, $subject);
			$content = str_replace('{'.$k.'}', $v, $content);
		}
	}

	return xmail( $to , $subject , $content );

}



