<?

# jalal7h@gmail.com
# 2016/09/01
# 1.2

/*
function breadcrumb_66(){ // page id is 66
	return "<a href=''>صفحه</a>";
}
*/

/*README*/

function breadcrumb(){
	
	$c.= "
	<div class=\"".__FUNCTION__."\">
		<a href=\""._URL."\" class=\"home\">".setting('tiny_title')."</a>\n";

	$func = 'breadcrumb_'._PAGE;
	if( function_exists($func) ){
		$c.= $func();

	} else {
		$c.= "<a href=\"".layout_page_link( _PAGE )."\" >".table('page', _PAGE, 'name')."</a>\n";
	}

	$c.="</div>\n";

	return $c;
	
}

