<?

# jalal7h@gmail.com
# 2017/04/29
# 1.0

function cat_mg_saveNew(){
	
	#
	# checking for variables
	$l = $_REQUEST['l'];
	$parent = intval($_REQUEST['parent']);
	$desc = strip_tags($_REQUEST['desc']);
	$kw = strip_tags($_REQUEST['kw']);
	$color = var_control($_REQUEST['color'], '#a-zA-Z0-9');

	#
	# cat detail
	$cat_detail = cat_detail( $l );

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
		$slug = cat_mg_slug_duplicate_control( $l, $slug );
	}

	#
	# uploading the logo file
	$fileupload_upload = fileupload_upload([ "id"=>$l, "input"=>"cat" ]);
	$logo = $fileupload_upload[0];

	#
	# trying to put it into db
	if(! $name = $_REQUEST['name'] ){
		return false;
	
	} else if(! dbs( 'cat', [ 'name', 'desc'=>$desc, 'kw'=>$kw, 'cat'=>$l, 'parent'=>$parent, 'logo'=>$logo, 'color'=>$color, 'slug'=>$slug, 'flag'=>1 ] ) ){
		e( dbe() );
	}

}

