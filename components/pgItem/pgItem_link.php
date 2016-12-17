<?

function pgItem_link( $rw ){

	# if rw is id, replace it with rw
	if(! is_array($rw) ){
		$item_id = $rw;
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