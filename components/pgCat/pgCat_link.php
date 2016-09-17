<?

function pgCat_link( $rw, $page_number=0 ){

	$name = $rw['name'];
	$name = mb_ereg_replace('[^A-Za-z0-9آ-ی ]+','',$name);
	$name = str_replace(" ", "-", $name);
	$link = _URL."/cat-".$rw['id'].",".$page_number."/".$name.".html";

	return $link;

}

