<?

# jalal7h@gmail.com
# 2017/01/01
# 1.0

function breadcrumb_66(){

	if(! $item_id = $_REQUEST['item_id'] ){
		e();
	
	} else if(! $rw = table('item', $item_id) ){
		//

	} else {
		$_REQUEST['cat_id'] = $rw['cat_id'];
		$c = breadcrumb_65();
		$c.= "<a href=\"".pgItem_link( $rw )."\">".$rw['name']."</a>";
	}


	return $c;
	
}




