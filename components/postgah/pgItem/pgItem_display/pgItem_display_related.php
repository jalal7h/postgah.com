<?php

# jalal7h@gmail.com
# 2017/06/21
# 1.0

add_layer( 'pgItem_display_related', 'نمایش آیتم - آگهی های مرتبط', 'center', $repeat='0' );

function pgItem_display_related( $rw_pagelayer ){
	
	if(! $rw_item = pgItem_fetch() ){
		e();

	} else if(! $rs = dbq(" SELECT `item`.*, `plan`.`suggest_as_related` FROM `item` LEFT JOIN `plan` ON `item`.`plan` = `plan`.`id` WHERE `item`.`cat_id`='{$rw_item['cat_id']}' AND `item`.`id`!='".$rw_item['id']."' ORDER BY `suggest_as_related` DESC, rand() LIMIT 4 ") ){
		e( dbe() );

	} else if(! dbn($rs) ){
		echo "<!-- no related -->";

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
	<a href=\"".pgItem_link( $rw )."\" class=\"".( $rw['suggest_as_related'] ? 'suggest_as_related' : '' )."\" >
		<img src=\"".pgItem_image($rw, "200x200")."\"/>
		<span>".$rw['name']."</span>
	</a>";

	return $c;

}






