<?

# jalal7h@gmail.com
# 2017/01/06
# 2.1

function linkify_mg_this_saveNew(){

	if(! $_REQUEST['url'] ){
		$_REQUEST['url'] = _URL;
	}

	$_REQUEST['url'] = linkify_URL_add( $_REQUEST['url'] );

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






