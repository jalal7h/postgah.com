<?

# jalal7h@gmail.com
# 2016/10/28
# 2.0

function linkify_mg_this_saveEdit(){
	
	if(! $_REQUEST['url'] ){
		$_REQUEST['url'] = _URL;
	}

	$parent = intval($_REQUEST['parent']);
	
	if(! $id = intval($_REQUEST['id']) ){
		e();

	} else if(! $rw_linkify = table('linkify',$id) ){
		e();

	} else if(! $rw_linkify_config = table('linkify_config',$rw_linkify['cat']) ){
		e();

	} else if(! $name = trim($_REQUEST['name']) ){
		e();

	} else if(! $url = trim($_REQUEST['url']) ){
		e();

	} else if(! dbs( 'linkify', ['name','url'], ['id'] ) ){
		e();

	} else {

		if(! $rw_linkify_config['haveIcon'] ){
			//

		} else if(! $array_of_file_path = fileupload_upload([ "id"=>$id, "input"=>"linkify" ]) ){
			//

		} else if(! $pic = $array_of_file_path[0] ){
			//

		} else if(! dbs( 'linkify', [ 'pic'=>$pic ], [ 'id'=>$id ] ) ){
			//

		} else {
			//
		}

		return true;
	}

	return false;
}






