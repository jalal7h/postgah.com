<?

# jalal7h@gmail.com
# 2016/08/16
# 1.1

function layout_layer( $pos="center" ){

	if( $pos=="center" ){
		$pos = "";
	}

	ob_start();

	$we_have_column_pos = is_column('page_layer', 'pos');

	if(! $rs_pagelayer = dbq(" SELECT * FROM `page_layer` WHERE `page_id`='"._PAGE."' ".( $we_have_column_pos ? " AND `pos`='$pos' " : "" )." AND `flag`='1' ORDER BY `prio` ASC, `id` ASC ") ){
		e(__FUNCTION__,__LINE__);
		
	} else if(! dbn($rs_pagelayer) ){
		return "";

	} else while( $rw_pagelayer = dbf($rs_pagelayer) ){
		
		$page_layer_id = $rw_pagelayer['id'];
		$page_layer_func = $rw_pagelayer['func'];

		if(! function_exists( $page_layer_func ) ){
			e(__FUNCTION__,__LINE__);
		
		} else {
			$page_layer_func( $rw_pagelayer );
		}

	}

	$content = ob_get_contents();
	ob_end_clean();

	if( $pos=='' ){
		
		if( is_column('page_layer','pos') ){
			if( dbr(dbq(" SELECT COUNT(*) FROM `page_layer` WHERE `page_id`='"._PAGE."' AND `pos`='right' AND `flag`='1' "),0,0)!=0 ){
				$hv_sidebars = "have_right_sidebar";
			}
			if( dbr(dbq(" SELECT COUNT(*) FROM `page_layer` WHERE `page_id`='"._PAGE."' AND `pos`='left' AND `flag`='1' "),0,0)!=0 ){
				$hv_sidebars.= " have_left_sidebar";
			}
		}

		$content = "\n<section class=\"center $hv_sidebars\">\n".$content."\n</section>\n";

	} else {
		$content = "\n<section class=\"".$pos."\">\n".$content."\n</section>\n";

	}

	return $content;
}







