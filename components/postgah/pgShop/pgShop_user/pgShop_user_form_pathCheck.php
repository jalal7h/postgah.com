<?php

# jalal7h@gmail.com
# 2017/05/16
# 1.0

function pgShop_user_form_pathCheck( $path ){

	$path = substr( $path, strlen(_DOMAIN)+1 );

	if(! $path ){
		echo "مقداری وارد نشده است";
	
	} else if( var_control( $path, 'a-zA-Z0-9' ) != $path ){
		echo "آدرس وارده شده مجاز نیست.";

	} else if( $id = intval($_REQUEST['id']) ){ // edit
		
		if(! $rw = table( 'shop', $id ) ){
			echo "اختلال : ".__LINE__;
		
		} else if(! $rs = dbq(" SELECT COUNT(*) FROM `shop` WHERE `id`!='$id' AND `path`='$path' ") ){
			echo "اختلال : ".__LINE__;

		} else if( dbr($rs,0,0) != 0 ){
			echo "قبلا ثبت شده است.";
		
		// } else if( Slug::getSlugByURL( './'.$path ) ){
			// echo "صفحه مورد نظر قبلا رزرو شده است.";			

		} else {
			echo "آزاد است.";
			return true;
		}


	} else { // new

		if( table( 'shop', [ 'path'=>$path ] ) ){
			echo "قبلا ثبت شده است.";
		
		} else {
			echo "آزاد است.";
			return true;
		}

	}

	return false;

}

