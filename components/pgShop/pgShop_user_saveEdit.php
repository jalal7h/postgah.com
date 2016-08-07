<?

function pgShop_user_saveEdit(){

	if(! $user_id = user_logged() ){
		return false;
	
	} else if(! $id = $_REQUEST['id'] ){
		return false;

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

}

