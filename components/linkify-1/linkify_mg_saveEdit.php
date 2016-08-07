<?

function linkify_mg_saveEdit(){
	
	$parent = $_REQUEST['parent'];

	if(! $id = $_REQUEST['id']){
		e(__FUNCTION__ , __LINE__);
	} else if(! $name = $_REQUEST['name']){
		e(__FUNCTION__ , __LINE__);
	} else if(! $url = $_REQUEST['url']){
		e(__FUNCTION__ , __LINE__);
	} else if(! dbq(" UPDATE `linkify` SET `name`='$name', `url`='$url' WHERE `id`='$id' LIMIT 1 ")){
		e(__FUNCTION__ , __LINE__);
	} else {

		if(! $GLOBALS['linkify_items'][ $_REQUEST['l'] ]['haveIcon'] ){
			;//
		} else if(! $array_of_file_path = fileupload_upload( array("id"=>$id, "input"=>"linkify") )){
			;//
		} else if(! $pic = $array_of_file_path[0] ){
			;//
		} else if(! dbq(" UPDATE `linkify` SET `pic`='$pic' WHERE `id`='$id' LIMIT 1 ") ){
			;//
		} else {
			return true;
		}
	}

	return false;
}













