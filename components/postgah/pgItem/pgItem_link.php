<?

# jalal7h@gmail.com
# 2017/05/21
# 1.0

function pgItem_link( $rw__or__item_id ){

	# if rw is id, replace it with rw
	if( is_array($rw__or__item_id) ){
		$rw = $rw__or__item_id;
	
	} else {
		$item_id = $rw__or__item_id;
		$rw = table('item', $item_id);
	}

	$name = $rw['name'];
	$name = mb_ereg_replace('[^A-Za-z0-9آ-ی ]+','',$name);
	$name = str_replace(" ", "-", $name);
	$link = _URL."/".$rw['id']."-".$name.".html";

	return $link;

}

# 
# only for abusereport component
function item_link( $rw ){
	return pgItem_link($rw);
}




