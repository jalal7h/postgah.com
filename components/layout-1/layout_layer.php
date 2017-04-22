<?

# jalal7h@gmail.com
# 2017/01/07
# 1.3

function layout_layer( $pos="center" ){
	
	if( $pos == "center" ){
		$pos = "";
	}

	switch ($pos) {
		case 'top':
			if(! layout_pos_top ){
				return;
			}
			break;
		case 'left':
			if(! layout_pos_left ){
				return;
			}
			break;
		case 'right':
			if(! layout_pos_right ){
				return;
			}
			break;
		case 'bottom':
			if(! layout_pos_bottom ){
				return;
			}
			break;

		case '':
			if(! layout_pos_center ){
				return;
			}
			break;
	}

	ob_start();

	$we_have_column_pos = is_column('page_layer', 'pos');

	if(! $rs_pagelayer = dbq(" SELECT * FROM `page_layer` WHERE `page_id`='"._PAGE."' ".( $we_have_column_pos ? " AND `pos`='$pos' " : "" )." AND `flag`='1' ORDER BY `prio` ASC, `id` ASC ") ){
		e();
		
	} else if(! dbn($rs_pagelayer) ){
		return "";

	} else while( $rw_pagelayer = dbf($rs_pagelayer) ){
		
		$page_layer_id = $rw_pagelayer['id'];
		$page_layer_func = $rw_pagelayer['func'];

		if( $rw_pagelayer['hide_name'] ){
			$rw_pagelayer['name'] = '';
		}

		if(! function_exists( $page_layer_func ) ){
			echo convbox( __("function %% does not exists",[$page_layer_func]) );
		
		} else {
			echo "<div class=\"no_margin ".$page_layer_func."_wrap\">";
			$page_layer_func( $rw_pagelayer );
			echo "</div>";
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







