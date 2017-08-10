<?php

# jalal7h@gmail.com
# 2017/06/22
# 1.0

function pgPlan_getItemPlan_NowAndFuture_text( $rw ){
	
	if( $item_plan = pgPlan_getItemPlan_NowAndFuture($rw["id"]) ){
		return table( "plan", $item_plan )["name_on_form"];

	} else {
		return "رایگان";
	}

}


