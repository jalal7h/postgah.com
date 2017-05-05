<?php

# jalal7h@gmail.com
# 2017/05/04
# 1.0

add_component( 'pgShop_mg', 'فروشگاه‌ها', '07a' );

function pgShop_mg(){
	
	#
	# actions
	switch ($_REQUEST['do']) {
		
		case 'flag':
			listmaker_flag('shop');
			break;
			
		case 'remove':
			dbrm('shop', null, true);
			break;
			
	}

	#
	# the list
	pgShop_mg_list();

}



