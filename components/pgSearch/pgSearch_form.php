<?

# jalal7h@gmail.com
# 2017/01/02
# 1.2

define( '_PAGE_SEARCH', '67' );

function pgSearch_form(){

	$pos_id = intval($_REQUEST['position_id']);

	if(! $rs = dbq(" SELECT * FROM `position` WHERE `parent`='0' ORDER BY `name` ASC ") ){
		e();

	} else if(! dbn($rs) ){
		e();

	} else while( $rw = dbf($rs) ){
		$list_of_options_for_states.= "<option ".( $pos_id==$rw['id'] ? "selected" : "" )." value=\"".$rw['id']."\">".$rw['name']."</option>\n";
	}

	$q = pgSearch_q();

	$c.='
	<form method="get" action="'._URL.'" name="'.__FUNCTION__.'" class="'.__FUNCTION__.'" >
		<input type="hidden" name="page" value="'._PAGE_SEARCH.'" />
		<select name="position_id">
			<option value="">همه استان‌ها</option>
			'.$list_of_options_for_states.'
		</select>
		<input type="text" name="q" placeholder="محصول، دسته یا برند مورد نظر خود را جستجو کنید .." value="'.$q.'" />
		<input type="submit" value="جستجو" />
	</form>';

	return $c;

}


