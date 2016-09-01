<?

function pgItem_tag_link( $tag, $rw_item=null ){

	$link = _URL."/tag/".urlencode($tag);

	return $link;

}

