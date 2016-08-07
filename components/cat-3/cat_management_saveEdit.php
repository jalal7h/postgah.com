<?

# jalal7h@gmail.com
# 2016/05/17
# Version 1.2

function cat_management_saveEdit(){
	
	$l = $_REQUEST['l'];
	$desc = strip_tags($_REQUEST['desc']);
	$kw = strip_tags($_REQUEST['kw']);

	if(! $name = $_REQUEST['name'] ){
		;//echo "err - ".__LINE__;
	
	} else if(!$id = $_REQUEST['id']){
		e( __FUNCTION__,__LINE__ );
	
	} else {
		
		$fileupload_upload = fileupload_upload( array("id"=>$l, "input"=>"cat") );
		if( $fileupload_upload[0] ){
			$query_logo = " , `logo`='".$fileupload_upload[0]."' ";
		}
		
		if(!dbq(" UPDATE `cat` SET `name`='$name',`desc`='$desc',`kw`='$kw' $query_logo WHERE `id`='$id' LIMIT 1 ")){
			e(dbe());
		}

	}
}

