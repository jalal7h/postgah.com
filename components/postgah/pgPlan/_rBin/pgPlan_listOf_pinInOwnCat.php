<?php

# jalal7h@gmail.com
# 2017/06/19
# 1.0

function pgPlan_listOf_pinInOwnCat(){

	$plans = [];

	foreach( table('plan', ['pin_in_own_cat'=>1, 'flag'=>1]) as $rw_plan ){
		$plans[] = $rw_plan['id'];
	}

	return $plans;

}

