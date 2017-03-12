<?

# jalal7h@gmail.com
# 2017/03/11
# 1.4

#
# echo texty( 'some_slug_name', $vars, $user_id='user' /*the logged in user*/ , $convbox=true );
# age field e sms ya email por shode bashe, ersal ha ham anjam mishe ( email va sms karbar + admin )
# $vars['prompt_class'] is supported, this will add a class into prompt div
# user_id can be array

# $user_id [ 11 / jalal7h@gmail.com / [11,143] ]

/*README*/

function texty( $slug, $vars=null, $user_id='user', $convbox=true ){
	
	if( is_array($user_id) ){
		$vars['texty_user_id'] = $user_id[0];
	} else {
		$vars['texty_user_id'] = $user_id;
	}
	
	# 
	# email
	texty_email( 'admin', $slug, $vars );
	if( $user_id != 'admin' ){
		dg("text email ".$user_id);
		texty_email( $user_id, $slug, $vars );
	}
		
	#
	# sms
	texty_sms( 'admin', $slug, $vars );
	if( $user_id != 'admin' ){
		dg("text sms ".$user_id);
		texty_sms( $user_id, $slug, $vars );
	}

	# 
	# prompt
	return texty_prompt( $slug, $vars, $convbox );

}

