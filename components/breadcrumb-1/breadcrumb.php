<?

# jalal7h@gmail.com
# 2016/08/15
# 1.0

function breadcrumb(){
	
	$c.= "
	<div class=\"".__FUNCTION__."\">
		<a href=\""._URL."\" class=\"home\">پستگاه</a>\n";


	$c.= "<a href=\""._URL."/?page="._PAGE."\" class=\"the_link\" >".table('page', _PAGE, 'name')."</a>\n";
	
	$c.="</div>\n";

	return $c;
	
}

