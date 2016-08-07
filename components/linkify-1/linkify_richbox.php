<?

function linkify_richbox( $cat ){
	$c = '<div class="linkify_richbox">';
	if(! $rs = dbq(" SELECT * FROM `linkify` WHERE `cat`='$cat' `flag`='1' AND `parent`='0' ORDER BY `prio` ASC , `id` ASC ")){
		e(__FUNCTION__ , __LINE__);
	} else if(! dbn($rs)){
		e(__FUNCTION__ , __LINE__);
	} else while( $rw = dbf($rs) ){
		$c.= linkify_richbox_this( $rw );
	}
	$c.= '</div>';

	return $c;
}

function linkify_richbox_this( $rw ){
	
	if(! $rs0 = dbq(" SELECT * FROM `linkify` WHERE `flag`='1' AND `parent`='".$rw['id']."' ORDER BY `prio` ASC , `id` ASC ") ){
		e(__FUNCTION__ , __LINE__);
	} else if(! dbn($rs0)){
		e(__FUNCTION__,__LINE__);
	} else while( $rw0 = dbf($rs0) ){
		$div_list.= '<a href="'.$rw0['url'].'">'.$rw0['name'].'</a>';
	}

	$c.= '
	<div>
		<a href="'.$rw['url'].'">'.$rw['name'].'</a>
		<div class="list">
			'.($rw['pic'] ? '<img src="'.$rw['pic'].'" />' : '').'
			<span class="head">'.$rw['name'].'</span>
			<div class="div_list">
				'.$div_list.'
			</div>
		</div>
	</div>';

	return $c;
}



