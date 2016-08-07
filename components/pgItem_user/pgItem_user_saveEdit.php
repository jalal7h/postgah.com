<?

function pgItem_user_saveEdit(){

	token_check();

	if(! $user_id = user_logged() ){
		ed(__FUNCTION__,__LINE__);
	}

	if( admin_logged() ){
		$flag = table('item', $_REQUEST['id'], 'flag');

	} else {
		$flag = 0;
	}

	#
	# age agahi rad shode bude, va alan edit dare mishe, set beshe be onvane agahi molaheze nashode, k admin dobare barresish kone
	if( $flag==1 ){
		$flag = 0;
	}

	#
	# insert
	$item_id = dbs("item", 
		['name','text','cat_id','position_id','cost','cell','tell','sale_by_postgah','state','count_of_stock','weight','sale_duration','delivery_method','delivery_cost_town','delivery_cost_country','flag'=>$flag ], ['id','user_id'=>$user_id] );
	#

	# 
	# set kword
	kwordusage_set( $_REQUEST['kword'], "item", $item_id );
	
	#
	# upload photo
	listmaker_fileupload( 'item', $item_id );
	#

	$vars['item_id'] = $item_id;
	$vars['item_name'] = trim( strip_tags($_REQUEST['name']) );
	echo texty('pgItem_user_saveEdit', $vars);
	
}

