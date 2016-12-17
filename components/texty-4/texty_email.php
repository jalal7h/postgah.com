<?

# jalal7h@gmail.com
# 2016/12/17
# 3.4

/*
texty_email( 
	"admin", "nb_adminCoponCountCheck" , 
	[
		"netbarg_name"=>table("netbarg",$netbarg_id,"name"), 
		"netbarg_id"=>$netbarg_id,
	]
);
*/

# who : admin / user [it can be the user_id or the word 'user' if logged in] / or an email address. it can be array of user_id's [ 1 , 22 ]
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
			
			# 11
			} else if( is_numeric($who) ){
				$user_id = $who;

			# jay@vay.com
			} else if( is_email_correct_or_not($who) ) {
				$user_email = $who;
			
			} else {
				return false;
			}
			
			break;
	}

	#
	# fetch email
	if( $admin_id ){
		$admin_email = setting('contact_email_address_0');
	}
	if( $user_id > 0 ){
		$rw_user = table('user',$user_id);
		$user_email = user_email( $user_id );
	}
	if( $user2_id > 0 ){
		$rw_user2 = table('user',$user2_id);
		$user2_email = user_email( $user2_id );
	}

	#
	# get texty record
	if(! $texty = texty_fetch( $slug ) ){
		return false;

	} else if( $admin_id ){
		
		$admin_email = setting('contact_email_address_0');
		$subject = $texty['admin_email_subject'];
		$content = $texty['admin_email_content'];

		$user_id = $vars['texty_user_id'];
		if( is_array($user_id) ){
			$user_id = $user_id[0];
		} else if( $user_id == 'user' ){
			$user_id = user_logged();
		}
		$rw_user = table( 'user' , $user_id );

		texty_email_this( $admin_email, $subject, $content, $vars, $rw_user );
		
	} else {

		if( $user_id ){
			$user_email = user_email( $user_id );
			$subject = $texty['user_email_subject'];
			$content = $texty['user_email_content'];
			$rw_user = table( 'user' , $user_id );
			texty_email_this( $user_email, $subject, $content, $vars, $rw_user );
		}
		if( $user2_id ){
			$user2_email = user_email( $user2_id );
			$subject = $texty['user2_email_subject'];
			$content = $texty['user2_email_content'];
			$rw_user2 = table( 'user' , $user2_id );
			texty_email_this( $user2_email, $subject, $content, $vars, $rw_user2 );
		} 

	}

}

function texty_email_this( $email, $subject, $content, $vars, $rw_user ){

	#
	# if its disabled return back.
	if( !$subject or !$content ){
		return false;
	}

	$subject = str_replace('{tiny_title}', setting('tiny_title'), $subject);
	$content = str_replace('{main_title}', setting('main_title'), $content);
	
	#
	# user replaces
	if( $rw_user ){
		
		# email
		$subject = str_replace('{user_email}', $rw_user['username'], $subject);
		$content = str_replace('{user_email}', $rw_user['username'], $content);
		# id
		$subject = str_replace('{user_id}', $rw_user['id'], $subject);
		$content = str_replace('{user_id}', $rw_user['id'], $content);
		# name
		$subject = str_replace('{user_name}', $rw_user['name'], $subject);
		$content = str_replace('{user_name}', $rw_user['name'], $content);

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



