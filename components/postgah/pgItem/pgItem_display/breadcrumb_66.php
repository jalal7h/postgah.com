<?

# jalal7h@gmail.com
# 2017/01/03
# 1.1

function breadcrumb_66(){

	if(! $item_id = $_REQUEST['item_id'] ){
		dg();
	
	} else if(! $rw = table('item', $item_id) ){
		dg();

	} else {
		$_REQUEST['cat_id'] = $rw['cat_id'];
		$c = breadcrumb_65();
		$c.= "<a href=\"".pgItem_link( $rw )."\">".$rw['name']."</a>";
	}

	return $c;
}




