<?php

# jalal7h@gmail.com
# 2017/08/05
# 1.1

add_action('pgPlan_user_getPlansForThisCat');

function pgPlan_user_getPlansForThisCat(){
	
	if( $rw_s = pgPlan_user_getPlansForThisCat_fetch() ){
		echo template_engine( 'pgPlan_user_getPlansForThisCat', [ "plans"=>$rw_s ] );
	}

}

