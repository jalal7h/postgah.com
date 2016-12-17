<?

# jalal7h@gmail.com
# 2016/12/17
# 1.3

#
# echo texty( 'some_slug_name', $vars, $user_id='user' /*the logged in user*/ , $convbox=true );
# age field e sms ya email por shode bashe, ersal ha ham anjam mishe ( email va sms karbar + admin )
# $vars['prompt_class'] is supported, this will add a class into prompt div
# user_id can be array

# $user_id [ 11 / jalal7h@gmail.com / [11,143] ]

/*README*/

function texty( $slug, $vars=null, $user_id='user', $convbox=true ){

	$vars['texty_user_id'] = $user_id;
	
	# 
	# email
	texty_email( 'admin', $slug, $vars );
	if( $user_id != 'admin' ){
		texty_email( $user_id, $slug, $vars );
	}
		
	#
	# sms
	texty_sms( 'admin', $slug, $vars );
	if( $user_id != 'admin' ){
		texty_sms( $user_id, $slug, $vars );
	}

	# 
	# prompt
	return texty_prompt( $slug, $vars, $convbox );

}

