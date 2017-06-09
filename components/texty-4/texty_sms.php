<?

# jalal7h@gmail.com
# 2017/03/12
# 3.4

/*
texty_sms( "user" , "user_register_do_sms" , array(
	"email"=>$email,
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
			
			# array of user id's : for example [ 2 , 45 ]
			if( is_array($who) ){
				$user_id = $who[0];
				$user2_id = $who[1];
			
			# mobile number : for example 09127744129
			} else if( is_cell_correct_or_not($who) ){
				$anonymous_cell = $who;

			# user_id : for example 11 
			} else if( is_numeric($who) and strlen($who) < 10 ){
				$user_id = $who;
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

		if( $anonymous_cell ){
			texty_sms_this( $anonymous_cell, $texty['user_sms'], $vars, null );			
		}

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


function texty_sms_this( $to, $content, $vars, $rw_user=null ){

	if(! $to ){
		return false;
	
	} else if(! $content = trim( strip_tags($content) ) ){
		return false;
	}


	$content = str_replace( 
		['{tiny_title}','{main_title}'], 
		[setting('tiny_title'),setting('main_title')], 
		$content );
	

	if( $rw_user ){
		$content = str_replace('{user_cell}', $to, $content);
		$content = str_replace('{user_email}', $rw_user['email'], $content);
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










