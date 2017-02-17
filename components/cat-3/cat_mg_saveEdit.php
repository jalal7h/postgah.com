<?

# jalal7h@gmail.com
# 2017/02/11
# 1.3

function cat_mg_saveEdit(){
	
	$l = $_REQUEST['l'];
	$desc = strip_tags($_REQUEST['desc']);
	$kw = strip_tags($_REQUEST['kw']);
	$color = strip_tags($_REQUEST['color']);

	if(! $name = $_REQUEST['name'] ){
		//
	
	} else if(! $id = $_REQUEST['id'] ){
		e();
	
	} else {

		dbs( 'cat', [ 'name'=>$name, 'desc'=>$desc, 'kw'=>$kw, 'color'=>$color ], [ 'id'=>$id ] );

		$fileupload_upload = fileupload_upload( array("id"=>$l, "input"=>"cat") );
		if( $fileupload_upload[0] ){
			$logo = $fileupload_upload[0];
			dbs( 'cat', [ 'logo'=>$logo ], ['id'=>$id] );
		}

	}
}

