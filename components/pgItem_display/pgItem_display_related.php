<?

$GLOBALS['block_layers_center']['pgItem_display_related'] = 'نمایش آیتم - آگهی های مرتبط';

function pgItem_display_related( $rw_pagelayer ){
	
	if(! $item_id = $_REQUEST['item_id'] ){
		e(__FUNCTION__,__LINE__);

	} else if(! $rw_item = table('item', $item_id) ){
		e(__FUNCTION__,__LINE__);

	} else if(! $rs = dbq(" SELECT * FROM `item` WHERE `cat_id`='{$rw_item['cat_id']}' ORDER BY rand() LIMIT 4 ") ){
		e(__FUNCTION__,__LINE__);

	} else if(! dbn($rs) ){
		//	

	} else {

		$title = $rw_pagelayer['name'];
		$title.= "<a class=\"".__FUNCTION__."_link_to_all\" href=\"".pgCat_link( table('cat', $rw_item['cat_id']) )."\" target=\"_blank\" >مشاهده همه</a>";

		$content = "<div class=\"".__FUNCTION__."\">";

		while( $rw = dbf($rs) ){
			$content.= pgItem_display_related_this( $rw );
		}

		$content.= "</div>";

		layout_post_box( $title, $content, $allow_eval=false, $framed=1, $rw_pagelayer['pos'] );
	
	}

}


function pgItem_display_related_this( $rw ){
	
	$c.= "
	<a href=\"".pgItem_link( $rw )."\" >
		<img class=\"isss\" src=\"".pgItem_image($rw, "200x200")."\"/>
		<span>".$rw['name']."</span>
	</a>";

	return $c;

}






