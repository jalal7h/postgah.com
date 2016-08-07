<?

function linkify_simple( $cat ){
	$c = '<div class="linkify_simple">';
	if(! $rs = dbq(" SELECT * FROM `linkify` WHERE `cat`='$cat' AND `flag`='1' AND `parent`='0' ORDER BY `prio` ASC , `id` ASC ")){
		e(__FUNCTION__ , __LINE__);
	} else if(! dbn($rs)){
		e(__FUNCTION__ , __LINE__);
	} else while( $rw = dbf($rs) ){
		$c.= linkify_simple_this( $rw );
	}
	$c.= '</div>';
	
	return $c;
}

function linkify_simple_this( $rw ){
	return '<a href="'.$rw['url'].'">'.$rw['name']."</a>\n";
}


