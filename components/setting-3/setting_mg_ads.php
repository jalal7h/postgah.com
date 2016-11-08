<?

// -spi-

$GLOBALS['setting']['setting_mg_ads'] = 'تنظیمات آگهی‌ها';

function setting_mg_ads(){
	
	# -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "setting" ,
			"action" => "./?page=admin&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]."&do=save",
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"rw" => setting_mg_main_setting_rw(),
		!]
			
			[!"'.setting_rw('free_ads_duration_limit')['name'].'","number:free_ads_duration_limit","notInDiv"!]<span class="the_day">'.__('روز').'</span> ( 0 == '.__('بدون محدودیت').' )
			
			<hr>

		[!"submit:ثبت"!]
	');
	# -------------------------------------------------

}

