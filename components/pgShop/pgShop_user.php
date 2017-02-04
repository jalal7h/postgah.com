<?

# jalal7h@gmail.com
# 2017/02/04
# 1.0

add_userpanel_item( 'pgShop_user', 'shop', 'فروشگاه‌ من', '07a' );

function pgShop_user(){

	if(! $user_id = user_logged() ){
		die();
	}

	switch ($_REQUEST['do1']) {
		
		case 'form':
			return pgShop_user_form();
		
		case 'saveNew':
			pgShop_user_saveNew();
			break;
		
		case 'saveEdit':
			pgShop_user_saveEdit();
			break;
		
		case 'remove':
			pgShop_user_remove();
			break;

		case 'flag':
			listmaker_flag('shop');
			break;
		
	}
	
	pgShop_user_list();

}

