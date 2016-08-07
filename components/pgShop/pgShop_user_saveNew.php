<?

function pgShop_user_saveNew(){

	if(! $user_id = user_logged() ){
		return false;
	
	} else {

		# 
		# save in db
		$id = dbs('shop', ['path','name','desc','user_id'=>$user_id,'address','phone','flag']);
		#

		#
		# upload files
		listmaker_fileupload( 'shop', $id );
		#

	}

}

