<?

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

