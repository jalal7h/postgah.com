<?

function linkify_mg_saveNew(){

	if(! $url = $_REQUEST['url'] ){
		$url = "./";
	}

	$parent = $_REQUEST['parent'];
	if(! $name = $_REQUEST['name']){
		e(__FUNCTION__ , __LINE__);
	} else if(! $cat = $_REQUEST['l']){
		e(__FUNCTION__ , __LINE__);
	} else if(! dbq(" INSERT INTO `linkify` (`name`,`url`,`flag`,`parent`,`cat`) VALUES ('$name', '$url', '1' , '$parent','$cat') ")){
		e(__FUNCTION__ , __LINE__);
	} else {

		listmaker_prio_reset( array('linkify') );

		$id = dbi();
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













