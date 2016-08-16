<?

function pgItem_header_search_form(){

	if(! $rs = dbq(" SELECT * FROM `position` WHERE `parent`='11' ORDER BY `name` ASC ") ){
		e(__FUNCTION__,__LINE__);

	} else if(! dbn($rs) ){
		e(__FUNCTION__,__LINE__);

	} else while( $rw = dbf($rs) ){
		$list_of_options_for_states.= "<option name=\"".$rw['id']."\">".$rw['name']."</option>\n";
	}

	$c.= "
	<form method=\"post\" action=\"./?page=11\" class=\"".__FUNCTION__."\">
		<select name=\"position_id\"><option>انتخاب استان</option>\n".$list_of_options_for_states."</select>
		<input type=\"text\" name=\"q\" placeholder=\"محصول، دسته یا برند مورد نظر خود را جستجو کنید ..\" value=\"".$_REQUEST['q']."\" />
		<input type=\"submit\" value=\"جستجو\" />
	</form>";

	return $c;

}

