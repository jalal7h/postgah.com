<?

function pgItem_link( $rw ){

	$name = $rw['name'];
	$name = mb_ereg_replace('[^A-Za-z0-9آ-ی ]+','',$name);
	$name = str_replace(" ", "-", $name);
	$link = _URL."/".$rw['id']."-".$name.".html";

	return $link;

}

