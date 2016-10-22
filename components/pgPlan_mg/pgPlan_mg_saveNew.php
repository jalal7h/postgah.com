<?

function pgPlan_mg_saveNew(){

	if( $_REQUEST['position_id']==11 ){
		$_REQUEST['position_id'] = 0;
	}
	
	#
	# insert
	$id = dbs("plan", 
		['name','name_on_form','cat_id','position_id','watermark_onlyfirst','sample_page','search_box_color','search_box_color_flag','show_in_index','suggest_as_related','send_in_newsletter','pin_in_all_cat','pin_in_own_cat','pin_in_search'] );
	#

	if( sizeof($_REQUEST['duration_name']) ){
		foreach( $_REQUEST['duration_name'] as $i => $name ){
			if(! $name ){
				continue;
			} else {
				$hour = intval($_REQUEST['duration_hour'][$i]);
				$cost = intval($_REQUEST['duration_cost'][$i]);
				dbs( "plan_duration", ['plan_id'=>$id,'name'=>$name,'hour'=>$hour,'cost'=>$cost] );
			}
		}
	}

	#
	# upload photo
	listmaker_fileupload( 'plan', $id );
	#

}


