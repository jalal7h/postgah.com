<?

# jalal7h@gmail.com
# 2017/02/04
# 1.1

add_userpanel_item( 'pgItem_user', 'items', 'لیست آگهی ها', '022', null, true );

function pgItem_user(){

	if(! $user_id = user_logged() ){
		ed();
	}


	if( $id = $_REQUEST['id'] ){
		if(! $rw = table('item',$id) ){
			e();
		} else {
			$list = pgItem_user_getValidActionList($rw);
		}
	}

	$do1 = $_REQUEST['do1'];

	switch( $do1 ){
		
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
			if( in_array( $do1, $list ) ){
				pgShop_user_RegisterInShop( $_REQUEST['id'] );
			}
			break;

		case 'UnregisterInShop':
			if( in_array( $do1, $list ) ){
				pgShop_removeItemShopId( $_REQUEST['id'] );
			}
			break;

		case 'SetStock':
			if( in_array( 'InStock', $list ) or in_array( 'OutOfStock', $list ) ){
				listmaker_flag('item',null,null,'sold');
			}
			break;

		case 'SetUpdateTime':
			if( in_array( $do1, $list ) ){
				dbs( 'item', ['date_updated'=>U()], ['id'] );
			}
			break;

		case 'MakePremium':
			if( in_array( $do1, $list ) ){
				if( $_REQUEST['plan_duration_id'] ){
					return pgPlan_user_MakePremium_do();
				}
			}
			break;

		case 'RenewAds':
			if( in_array( $do1, $list ) ){
				return pgPlan_user_RenewAds_do();
			}
			break;

	}
	
	pgItem_user_list();

}








