<?

# jalal7h@gmail.com
# 2016/12/23
# 1.0

function pgShop_user_saveEdit(){

	$_REQUEST['path'] = trim( strtolower($_REQUEST['path']) );

	if(! $user_id = user_logged() ){
		dg();
	
	} else if(! $id = $_REQUEST['id'] ){
		dg();

	} else if(! pgShop_checkShopDomain( $_REQUEST['path'] ) ){
		echo convbox( 'خطا: لطفا در انتخاب آدرس فروشگاه دقت کنید.', 'red' );
	
	} else {

		# 
		# update in db
		$id = dbs( 'shop', ['path','name','desc','user_id'=>$user_id,'address','phone','flag'], ['id'] );
		#

		#
		# upload files
		listmaker_fileupload( 'shop', $id );
		#

	}

	return false;

}

