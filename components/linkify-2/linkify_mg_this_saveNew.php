<?

# jalal7h@gmail.com
# 2017/01/06
# 2.1

function linkify_mg_this_saveNew(){

	if(! $_REQUEST['url'] ){
		$_REQUEST['url'] = _URL;
	}

	$URL_len = strlen(_URL);
	if( substr( $_REQUEST['url'], 0, $URL_len ) == _URL ){
		$_REQUEST['url'] = '{_URL}'.substr( $_REQUEST['url'], $URL_len );
	}

	$parent = intval($_REQUEST['parent']);

	if(! $name = $_REQUEST['name']){
		e();

	} else if(! $cat = $_REQUEST['cat']){
		e();

	} else if(! $rw_linkify_config = table('linkify_config',$cat) ){
		e();

	} else if(! dbs( 'linkify', ['name','url','flag'=>1,'parent','cat'] ) ){
		e();

	} else {

		listmaker_prio_reset( array('linkify') );
		$id = dbi();

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






