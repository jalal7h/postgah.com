<?

function cat_management_saveNew(){
	
	#
	# checking for variables
	$l = $_REQUEST['l'];
	$parent = intval($_REQUEST['parent']);
	$desc = strip_tags($_REQUEST['desc']);
	$kw = strip_tags($_REQUEST['kw']);

	#
	# uploading the logo file
	$fileupload_upload = fileupload_upload( array("id"=>$l, "input"=>"cat") );
	$logo = $fileupload_upload[0];

	#
	# trying to put it into db
	if(! $name = $_REQUEST['name'] ){
		return false;
	
	} else if(! dbs( 'cat', ['name','desc'=>$desc,'kw'=>$kw,'cat'=>$l,'parent'=>$parent,'logo'=>$logo,'flag'=>1] ) ){
		e( dbe() );
	}

}

