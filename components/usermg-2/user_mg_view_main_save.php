<?php

# jalal7h@gmail.com
# 2017/05/01
# 1.0

function user_mg_view_main_save(){
	
	if(! $id = dbs( 'user', [ 'name', 'email', 'email_verified', 'cell', 'cell_verified', 'tell', 'address', 'im_a', 'work_at', 'gender' ], ['id'] ) ){
		echo convbox_back( __('مشکل در ثبت تغییرات') );
	
	} else {

		listmaker_fileupload( 'user', $id );

		echo convbox( __('تغییرات ثبت شد.') );
	}

}

