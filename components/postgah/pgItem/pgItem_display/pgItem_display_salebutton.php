<?

$GLOBALS['block_layers_side']['pgItem_display_salebutton'] = 'نمایش آیتم - دکمه فروش';

function pgItem_display_salebutton( $rw_pagelayer ){
	
	if(! $rw_item = pgItem_fetch() ){
		e();

	} else if( $rw_item['cost']==0 ){
		//

	} else {

		$content = "
		<div class=\"".__FUNCTION__."\">
			<div class=\"cost\">".billing_format($rw_item['cost'])."</div>
			<a class=\"btn btn-primary\" href=\"".pgVendor_item_link( $rw_item )."\">خرید با همکاری پستگاه</a>
			<a class=\"help\" href=\"\" >خرید با همکاری پستگاه چیست؟</a>
		</div>";

		layout_post_box( $title, $content, $allow_eval=false, $framed=1, $rw_pagelayer['pos'] );
	
	}

}






