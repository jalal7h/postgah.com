<?

$GLOBALS['block_layers_center']['pgItem_display_slide'] = 'نمایش آیتم - اسلایدها';

function pgItem_display_slide( $rw_pagelayer ){

	pgItem_viewCounter();

	if(! $item_id = $_REQUEST['item_id'] ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! $rw_item = table('item', $item_id) ){
		e(__FUNCTION__,__LINE__);

	} else {
		
		$image_arr = pgItem_image_array( $rw_item );

		foreach ($image_arr as $i => $image_this) {
			
			if(! file_exists($image_this) ){
				e(__FUNCTION__,__LINE__);

			} else if(! $size = getimagesize($image_this) ){
				e(__FUNCTION__,__LINE__);

			} else if( $size[0] >= 500 ){
				// $image_arr[$i] = "./resize/800x2000/".$image_this;
				continue;
			}

			unset($image_arr[$i]);
		}

		// $title = "some title";
		$content = "
		<div class=\"".__FUNCTION__."\">
			
			<div class=\"item_name\">".$rw_item['name']."</div>
			<div class=\"item_code\">کد آگهی :‌ ".$rw_item['id']."</div>
		
		 	<div class=\"item_prompt\">اخطار! لطفا از واریز وجه به حساب فروشندگان ناشناس قبل از دسترسی مستقیم به کالا خودداری کنید.</div>
			
			".slidy( $image_arr )."

		</div>";


		
		layout_post_box( $title, $content, $allow_eval=false, $framed=1, $rw_pagelayer['pos'] );
	}

}

