<?php

# jalal7h@gmail.com
# 2017/07/02
# 1.0

add_component( 'pgPlan_mg', 'پلان‌ها', '009' );

function pgPlan_mg(){
	
	#
	# action
	switch($_REQUEST['do']){
		
		case 'form':
			return pgPlan_mg_form();

		case 'saveNew' : 
			pgPlan_mg_saveNew();
			break;
		
		case 'saveEdit' : 
			pgPlan_mg_saveEdit();
			break;
		
		case 'prio' :
			listmaker_prio([ 
				'plan' , 
				'up_or_down'=>$_REQUEST['up_or_down'], 
				'same'=>( $_REQUEST['cat_id'] ? 'cat_id' : "" )
			]);
			break;

		case 'remove' : 
			pgPlan_mg_remove();
			break;

		case 'flag' : 
			listmaker_flag('plan');
			break;
	}
	
	#
	# the list
	pgPlan_mg_list();

}



