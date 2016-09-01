<?

function pgItem_list_brief_this( $rw ){

	$name = $rw['name'];
	$cat = cat_translate( $rw['cat_id'] );
	$price = $rw['cost'] > 0 ? $rw['cost']." ".setting('money_unit') : "مجانی";

	$c.= "
	<a class=\"pgItem_list_brief_this\" href=\"".pgItem_link($rw)."\">
		<img src=\"".pgItem_image($rw, "150x150" )."\"/ title=\"\" alt=\"\" />
		<div class=\"text\">
			<div class=\"name\">".$name."</div>
			<div class=\"cat\">".$cat."</div>
			<div class=\"price\">".$price."</div>
		</div>
	</a>\n";

	return $c;

}


