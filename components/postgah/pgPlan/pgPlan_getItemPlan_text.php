<?php

# jalal7h@gmail.com
# 2017/06/22
# 1.0

function pgPlan_getItemPlan_text( $rw ){
	
	if( pgPlan_getItemPlan($rw["id"]) ){
		return table( "plan", pgPlan_getItemPlan($rw["id"]) )["name_on_form"];

	} else {
		return "رایگان";
	}

}


