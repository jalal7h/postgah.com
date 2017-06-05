<?

// -spi-

$GLOBALS['setting']['pgItem_mg_setting'] = 'آگهی‌ها';

function pgItem_mg_setting(){
	
	# -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "setting" ,
			"action" => "./?page=admin&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]."&do=save",
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"rw" => setting_rw_slug_n_text(),
		!]
			
			[!"'.setting_rw('free_ads_duration_limit')['name'].'","number:free_ads_duration_limit","notInDiv"!]<span class="the_day">'.__('روز').'</span> ( 0 == '.__('بدون محدودیت').' )
			
			<hr>
		
		[!"submit:ثبت"!]
	');
	# -------------------------------------------------

}

