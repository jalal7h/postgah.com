<?php

# jalal7h@gmail.com
# 2017/08/10
# 1.1

function pgPlan_getItemPlan_text( $rw ){
	
	if( $item_plan = pgPlan_getItemPlan($rw["id"]) ){
		return table( "plan", $item_plan )["name_on_form"];

	} else {
		return "رایگان";
	}

}


