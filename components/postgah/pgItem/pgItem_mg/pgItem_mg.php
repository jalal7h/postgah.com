<?

# jalal7h@gmail.com
# 2016/07/27
# 1.0

$GLOBALS['cmp']['pgItem_mg'] = 'آگهی ها';
$GLOBALS['cmp-icon']['pgItem_mg'] = '022';

function pgItem_mg(){

	#
	# actions
	switch( $_REQUEST['do'] ){
		
		case 'edit':
			return pgItem_mg_loginToEditItem();
		
		case 'remove':
			pgItem_remove( $_REQUEST['id'], $by="admin" );
			break;

		case 'accept':
			pgItem_mg_accept();
			break;
			
		case 'reject':
			pgItem_mg_reject();
			break;

		case 'removeAll':
			foreach($_REQUEST['removeAll'] as $item_id){
				dbrm('item', $item_id, true);
			}
			break;
		
	}

	#
	# the list
	pgItem_mg_list();
	#
	
}


