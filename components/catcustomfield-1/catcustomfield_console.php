<?

# jalal7h@gmail.com
# 2016/06/13
# Version 1.1

function catcustomfield_console( $cat_name, $item_table, $item_id ){

	if(! $GLOBALS['cat_items'][$cat_name][6] ){
		return "";
	
	} else {

		$item_hash = md5x( $item_table.$item_id, 8 );

		$c.= "
		<div class='lmfe_inDiv ccfc' id='ccfc_".$cat_name."_c'>
			<span class='lmfe_tnit'></span>
			<div id='ccfc_".$cat_name."' item_info='".$item_table.":".$item_id.":".$item_hash."' ></div>
		</div>";

		return $c;
	}

}

