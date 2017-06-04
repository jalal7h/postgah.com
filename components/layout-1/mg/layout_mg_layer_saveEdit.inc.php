<?

# jalal7h@gmail.com
# 2017/01/07
# 1.1

function layout_mg_layer_saveEdit(){

	$set_array = ['name','func'];

	if( is_column('page_layer', 'hide_name') ){
		$set_array[] = 'hide_name';
	}

	if(! $id = $_REQUEST['id'] ){
		e();
	
	} else if(! dbs( 'page_layer', $set_array, ['id'] ) ){
		e( dbe() );
	
	} else {
		jsgo('./?page=admin&cp='.$_REQUEST['cp'].'&id='.$id.'&do=layer_form');
	}

}

