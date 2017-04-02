<?

# jalal7h@gmail.com
# 2017/03/12
# 1.3

add_layer( 'user_forgot_form', __('فرم فراموشی کلمه عبور'), 'center' );

function user_forgot_form(){

	if( user_logged() ){
		jsgo( layout_link(14) );
	}

	switch ($_REQUEST['do']) {

		case 'verify':
			return user_forgot_verify();

		case 'new':
			return user_forgot_new();

		case 'save':
			return user_forgot_save();
	}

	echo template_engine( 'user_forgot_form' );
	
}




