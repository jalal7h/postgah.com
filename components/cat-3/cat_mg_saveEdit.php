<?

# jalal7h@gmail.com
# 2017/04/29
# 1.4

function cat_mg_saveEdit(){
	
	$l = $_REQUEST['l'];
	$desc = strip_tags($_REQUEST['desc']);
	$kw = strip_tags($_REQUEST['kw']);
	$color = var_control($_REQUEST['color'], '#a-zA-Z0-9');
	
	#
	# cat detail
	$cat_detail = cat_detail( $l );


	if(! $name = $_REQUEST['name'] ){
		//
	
	} else if(! $id = $_REQUEST['id'] ){
		e();
	
	} else {

		#
		# check slug
		if( $cat_detail['slug'] ){
			if(! $slug = $_REQUEST['slug'] ){
				$slug = $_REQUEST['name'];
				$slug = strtolower($slug);
				$slug = str_replace( [ " ", ",", "." ], "-", $slug );
			}
			$slug = var_control( $slug, 'a-zA-Z0-9آ-ی\-~' );
			#
			# check if its duplicated
			$slug = cat_mg_slug_duplicate_control( $l, $slug, $id );
		}

		
		if(! dbs( 'cat', [ 'name'=>$name, 'desc'=>$desc, 'kw'=>$kw, 'color'=>$color, 'slug'=>$slug ], [ 'id'=>$id ] ) ){
			e();
		}

		$fileupload_upload = fileupload_upload( array("id"=>$l, "input"=>"cat") );
		if( $fileupload_upload[0] ){
			$logo = $fileupload_upload[0];
			dbs( 'cat', [ 'logo'=>$logo ], ['id'=>$id] );
		}

	}
}

