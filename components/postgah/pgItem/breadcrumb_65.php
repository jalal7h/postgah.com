<?

function breadcrumb_65(){

	if(! $cat_id = $_REQUEST['cat_id'] ){
		e(__FUNCTION__,__LINE__);

	} else {
		
		$cat_serial = cat_id_serial( $cat_id );

		foreach( $cat_serial as $i => $this_cat_id ){
			$rw = table('cat', $this_cat_id);
			$link = pgCat_link( $rw );
			$c[] = "<a href=\"".$link."\">".$rw['name']."</a>";
		}

		$c = array_reverse( $c );
		$c = implode("\n", $c);

		return $c;

	}

	return "";
	
}

