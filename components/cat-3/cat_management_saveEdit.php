<?

# jalal7h@gmail.com
# 2016/05/17
# 1.2

function cat_management_saveEdit(){
	
	$l = $_REQUEST['l'];
	$desc = strip_tags($_REQUEST['desc']);
	$kw = strip_tags($_REQUEST['kw']);

	if(! $name = $_REQUEST['name'] ){
		//
	
	} else if(! $id = $_REQUEST['id'] ){
		e();
	
	} else {

		dbs( 'cat', [ 'name'=>$name, 'desc'=>$desc, 'kw'=>$kw ], [ 'id'=>$id ] );

		$fileupload_upload = fileupload_upload( array("id"=>$l, "input"=>"cat") );
		if( $fileupload_upload[0] ){
			$logo = $fileupload_upload[0];
			dbs( 'cat', [ 'logo'=>$logo ], ['id'=>$id] );
		}

	}
}

