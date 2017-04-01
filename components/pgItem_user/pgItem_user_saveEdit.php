<?

# jalal7h@gmail.com
# 2017/02/06
# 1.1

function pgItem_user_saveEdit(){

	# 
	# check if the content is verified
	token_check();

	#
	# filter all words
	kbclear( $_REQUEST['name'] );
	kbclear( $_REQUEST['text'] );
	kbclear( $_REQUEST['cost'] );
	kbclear( $_REQUEST['cell'] );
	kbclear( $_REQUEST['tell'] );
	kbclear( $_REQUEST['video'] );

	if( !$_REQUEST['position_id'] or !$_REQUEST['cat_id'] ){
		ed();
	}

	#
	# character limit
	if( mb_strlen( $_REQUEST['name'] ) < 70 ){
		$_REQUEST['name'] = mb_substr( $_REQUEST['name'], 0, 70 );
	}
	
	if(! $user_id = user_logged() ){
		ed();

	} else if(! $_REQUEST['cat_id'] ){
		ed();
	
	} else if(! $_REQUEST['position_id'] ){
		ed();
	}

	// if( admin_logged() ){
	// 	$flag = table('item', $_REQUEST['id'], 'flag');

	// } else {
		$flag = 0;
	// }

	#
	# age agahi rad shode bude, va alan edit dare mishe, set beshe be onvane agahi molaheze nashode, k admin dobare barresish kone
	if( $flag==1 ){
		$flag = 0;
	}

	#
	# insert
	$item_id = dbs("item", 
		['name','text','cat_id','position_id','cost','cell','tell','video','sale_by_postgah','state','count_of_stock','weight','sale_duration','delivery_method','delivery_cost_town','delivery_cost_country','flag'=>$flag ], ['id','user_id'=>$user_id] );

	#
	# save the custom fields.
	catcustomfield_save( 'item', $item_id );

	#
	# fetch the 'cat serial' and 'position serial' for this item and save on db
	pgItem_set_cat_serial( $item_id );
	pgItem_set_position_serial( $item_id );

	# 
	# set kword
	kwordusage_set( $_REQUEST['kword'], "item", $item_id );
	
	#
	# upload photo
	listmaker_fileupload( 'item', $item_id );
	
	#
	# send relared messages	
	$c = texty('pgItem_user_saveEdit', [
		'item_id' => $item_id,
		'item_name' => trim( strip_tags($_REQUEST['name']) ),
	]);
	
	qpush( __FUNCTION__."_result", $c );
	
}

