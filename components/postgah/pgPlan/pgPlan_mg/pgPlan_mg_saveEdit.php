<?

function pgPlan_mg_saveEdit(){

	if( $_REQUEST['position_id']==11 ){
		$_REQUEST['position_id'] = 0;
	}
	
	#
	# update
	$id = dbs(
		"plan", 
		['name','name_on_form','cat_id','position_id','watermark_onlyfirst','sample_page','search_box_color','search_box_color_flag','hilight_color','show_in_index','suggest_as_related','send_in_newsletter','pin_in_all_cat','pin_in_own_cat','pin_in_search'], 
		['id']
	);
	#

	if( sizeof($_REQUEST['duration_name']) ){
		foreach( $_REQUEST['duration_name'] as $i => $name ){
			if(! $name ){
				continue;
			} else {
				$hour = intval($_REQUEST['duration_hour'][$i]);
				$cost = intval($_REQUEST['duration_cost'][$i]);
				#
				# edit
				if( $duration_id = $_REQUEST['duration_in_table'][$i] ){
					dbs( "plan_duration", ['plan_id'=>$id,'name'=>$name,'hour'=>$hour,'cost'=>$cost], ['id'=>$duration_id] );
				#
				# new
				} else {
					dbs( "plan_duration", ['plan_id'=>$id,'name'=>$name,'hour'=>$hour,'cost'=>$cost] );
				}
			}
		}
	}

	#
	# upload photo
	listmaker_fileupload( 'plan', $id );
	#

}


