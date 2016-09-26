<?

# jalal7h@gmail.com
# 2016/09/12
# 1.1

#
# echo texty( 'some_slug_name', $vars, $user_id='user' /*the logged in user*/ , $convbox=true );
# age field e sms ya email por shode bashe, ersal ha ham anjam mishe ( email va sms karbar + admin )
# 

/*README*/

function texty( $slug, $vars=null, $user_id='user', $convbox=true ){
	
	texty_email( 'admin', $slug, $vars );
	texty_email( $user_id, $slug, $vars );
	
	texty_sms( 'admin', $slug, $vars );
	texty_sms( $user_id, $slug, $vars );

	return texty_prompt( $slug, $vars, $convbox );

}

