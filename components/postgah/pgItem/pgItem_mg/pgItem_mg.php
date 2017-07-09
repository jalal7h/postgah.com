<?php

# jalal7h@gmail.com
# 2017/06/30
# 1.1

add_component( 'pgItem_mg', 'آگهی ها', '022' );

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
			pgItem_mg_accept( $_REQUEST['id'] );
			break;
			
		case 'reject':
			pgItem_mg_reject();
			break;

		case 'removeAll':
			if( sizeof($_REQUEST['big_button']) ){
				foreach( $_REQUEST['big_button'] as $item_id ){
					dbrm('item', $item_id, true);
				}
			}
			break;

		case 'confirmAll':
			if( sizeof($_REQUEST['big_button']) ){
				foreach( $_REQUEST['big_button'] as $item_id ){
					pgItem_mg_accept( $item_id );
				}
			}
			break;
		
	}

	#
	# the list
	pgItem_mg_list();
	#
	
}


