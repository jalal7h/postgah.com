<?

# jalal7h@gmail.com
# 2016.08.31
# 1.0

function breadcrumb_67(){
	
	if(! $q = pgSearch_q() ){
		e(__FUNCTION__,__LINE__);

	} else if( $position_id = $_REQUEST['position_id'] ){
		return "<a href=\""._URL."/?page="._PAGE."&position_id=".$position_id."&q=".$q."\">".$q."</a>";

	} else {
		return "<a href=\"".pgItem_tag_link($q)."\">".$q."</a>";
	}

}



