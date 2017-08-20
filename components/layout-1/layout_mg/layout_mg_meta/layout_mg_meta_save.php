<?php

# jalal7h@gmail.com
# 2016/12/31
# 1.0

function layout_mg_meta_save(){
	
	foreach( $GLOBALS['layout-metatag'] as $k => $column ){
		$fields[] = "`".$column."`='".mysql_real_escape_string( $_REQUEST[ $column ] )."'";
	}
	
	if(! $id = $_REQUEST['id'] ){
		e();
	
	} else if(! $rw = table("page", $id) ){
		e();
	
	} else if(! dbq(" UPDATE `page` SET ".implode(',', $fields)." WHERE `id`='".$id."' LIMIT 1 ") ){
		e();
		echo dbe();
	
	} else {

		$path = './?page='.$id;

		if( layout_link( $rw, $skip_slug=true) == trim($_REQUEST['slug']) ){
			// no specific slug defined

		} else if(! $slug = trim($_REQUEST['slug']) ){
			// no new slug defined

		} else if( substr( $slug, 0, strlen(_URL) ) != _URL ){
			echo convbox( __('آدرس صفحه باید شامل دامنه اصلی وبسایت باشد.'), 'red' );

		} else if(! $slug = trim( str_replace( _URL."/", "", $slug ) ) ){
			// no new slug defined
			
		} else if( $slug != mb_ereg_replace('[^A-Za-z0-9آ-ی\-\_\.]+','',$slug) ){
			echo convbox( __('لطفا عنوان مناسبی برای صفحه انتخاب کنید.'), 'red' );

		} else if(! $rsN = dbq(" SELECT * FROM `slug` WHERE `slug`='$slug' AND `path`!='$path' LIMIT 1 ") ){
			e( dbe() );

		} else if( dbn($rsN) and ($rwN = dbf($rsN)) ){
			$convbox_text = __('آدرس صفحه مورد نظر شما قبلا مورد استفاده قرار گرفته است.');
			$convbox_text.= ' <br><a target="_blank" target="_blank" href="'.
				_URL.'/'.Slug::getSlugByURL( $rwN['path'] ).
				'">'.__('مشاهده صفحه').'</a>';

			echo convbox( $convbox_text, 'red' );
		
		// } else if( $slug != mb_ereg_replace('[^A-Za-z0-9آ-ی ]+','',$slug) ){
		// 	invalid slug

		} else if(! Slug::set( $path, $slug ) ){
			e();
		
		} else {
			$name = table('page', $id, 'name' );
			echo convbox( __('ثبت تغییرات انجاد شد. %%', ['<br><a target="_blank" target="_blank" href="'.layout_link($id).'" >'.$name.'</a>'] ), 'green' );

			return true;
		}

	}

	return false;
	
}


