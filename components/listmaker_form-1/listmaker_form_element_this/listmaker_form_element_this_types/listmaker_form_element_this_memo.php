<?

# jalal7h@gmail.com
# 2017/04/01
# 1.0

function listmaker_form_element_this_memo( $info ){
	
	$c = lmfe_tnit( $info );
	
	$id = $info['id'] ? $info['id'] : "lmfe_".$info['formName']."_".$info['name'];
	$id = listmaker_uniqId( $id );

	$info['class'].= ' memo';
	$info['class'] = trim($info['class']);

	$c.= $info['PreTab']."<memo name=\"".$info['name']."\" id=\"".$id."\" ".
		( $info['class'] ? "class=\"".$info['class']."\" " : '' ).
		( $info['etc'] ? $info['etc']." " : '' ).
		">".$info['value']."</memo>\n";

	return $c;

}




