<?

function pgItem_user(){

	if(! $user_id = user_logged() ){
		ed(__FUNCTION__,__LINE__);
	}

	switch ($_REQUEST['do1']) {
		
		case 'form':
			return pgItem_user_form();

		case 'saveNew':
			pgItem_user_saveNew();
			break;
		
		case 'saveEdit':
			pgItem_user_saveEdit();
			break;

		case 'remove':
			pgItem_user_remove();
			break;

		case 'RegisterInShop':
			pgShop_user_RegisterInShop( $_REQUEST['id'] );
			break;

		case 'UnregisterInShop':
			pgShop_removeItemShopId( $_REQUEST['id'] );
			break;

		case 'SetStock':
			listmaker_flag('item',null,null,'sold');
			break;

		case 'SetUpdateTime':
			dbs( 'item', ['date_updated'=>U()], ['id'] );
			break;

		case 'MakePremium':
			if( $_REQUEST['plan_duration_id'] ){
				return pgPlan_user_MakePremium_do();
			}
			break;

		case 'RenewAds':
			return pgPlan_user_RenewAds_do();

	}
	
	pgItem_user_list();

}








