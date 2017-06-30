<?php

# jalal7h@gmail.com
# 2017/06/30
# 1.2

function pgShop_user_saveNew(){

	#
	# felan 1dune shop kafie
	if( dbqc('shop', ['user_id'=>user_logged()] ) ){
		return true;
	}

	$_REQUEST['path'] = trim( strtolower($_REQUEST['path']) );

	if(! $user_id = user_logged() ){
		dg();
	
	} else if(! pgShop_checkShopDomain( $_REQUEST['path'] ) ){
		echo convbox( 'خطا: لطفا در انتخاب آدرس فروشگاه دقت کنید.', 'red' );
		
	} else {

		$_REQUEST['path'] = substr( $_REQUEST['path'], strlen(_DOMAIN)+1 );

		# 
		# save in db
		$id = dbs('shop', [ 'path','name','desc','user_id'=>$user_id,'address','phone','flag'=>1 ]);

		#
		# upload files
		listmaker_fileupload( 'shop', $id );

		#
		# slug
		slugInDB::set( 'shop-'.$id, $_REQUEST['path'], './?page=171&path='.$_REQUEST['path'] );

		return true;

	}

	return false;

}

