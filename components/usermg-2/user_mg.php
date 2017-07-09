<?

# jalal7h@gmail.com
# 2017/05/01
# 1.1

add_component( 'user_mg', 'کاربران', '0c0' );

function user_mg(){
	
	#
	# actions
	switch($_REQUEST['do']){

		case 'login':
			user_mg_login();
			break;

		case 'remove':
			user_mg_remove();
			break;

		case 'flag':
			listmaker_flag('user');
			break;

		case 'view':
			return user_mg_view();

	}

	#
	# the list
	user_mg_list();


}

