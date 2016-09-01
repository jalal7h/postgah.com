<?

$GLOBALS['block_layers_side']['pgItem_display_salebutton'] = 'نمایش آیتم - دکمه فروش';

function pgItem_display_salebutton( $rw_pagelayer ){
	
	if(! $item_id = $_REQUEST['item_id'] ){
		e(__FUNCTION__,__LINE__);

	} else if(! $rw_item = table('item', $item_id) ){
		e(__FUNCTION__,__LINE__);

	} else if( $rw_item['cost']==0 ){
		//

	} else {

		// $rw_item['cost'] = 100000;

		$content = "
		<div class=\"".__FUNCTION__."\">
			<div class=\"cost\">".cost_in_word($rw_item['cost'])."</div>
			<a class=\"submit_button\" href=\"".pgVendor_item_link( $rw_item )."\">خرید با همکاری پستگاه</a>
			<a class=\"help\" href=\"\" >خرید با همکاری پستگاه چیست؟</a>
		</div>";

		layout_post_box( $title, $content, $allow_eval=false, $framed=1, $rw_pagelayer['pos'] );
	
	}

}

