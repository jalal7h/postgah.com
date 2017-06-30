<?php

# jalal7h@gmail.com
# 2017/06/23
# 1.3

function pgItem_user_form(){
	
	// add_to_my_shop
	if(! $_REQUEST['id'] ){
		if( pgShop_getUserShopId() ){
			$add_to_my_shop = true;
		}
	}

	$content = listmaker_form('

	[!
		"table" => "item" ,
		"action" => "'.layout_link(14).'/items",
		"name" => "'.__FUNCTION__.'" ,
		"class" => "'.__FUNCTION__.'" ,
		"switch" => "do1",
	!]

		<?= token_make(); ?>
		
		[!"catbox:cat_id*", "ccf"=>true, "cat_name"=>"adsCat"!]
		[!"positionbox:position_id*"!]
		
		<hr>
		
		[!"text:name*","content_min"=>"3w","content_max"=>"70c"!]
		[!"textarea:text*","content_min"=>"50c"!]
		
		<hr>
		
		[!"file:image+"!]
		[!"url:video"!]
		<div class="video_memo">فقط یوتوب، آپارات،‌ ویمئو</div>

		<div>[!"cost:cost","notInDiv"!]</div>
		
		<hr>

		[!"کلمه کلیدی","max"=>10,"keyword:kword"=>kwordusage_get("item",$rw["id"],$string_flag=true)!]
		
		<hr>
		
		<div>
			[!"number:cell","notInDiv"!]
			[!"number:tell","notInDiv"!]
		</div>

		<hr>

		'.( $add_to_my_shop ? '[!"checkbox:add_to_my_shop", "نمایش در فروشگاه من"!]<hr>' : '').'

		'.
		( $_REQUEST['id'] ? '' : '
		<div class="plans" >
			<span class="lmfe_tnit">پلان</span>
			<div class="list_of_plans ppugpftc">
				<!--
				<span class="this_plan">
					<label><input type="radio" name="plan_duration_id" checked=1 value="0" /> مجانی</label>
				</span>
				-->
				<span class="etc"></span>
			</div>
		<hr>
		</div>
		')
		.'
		
		<div class="sales_by_postgah_checkbox_wrapper">
			[!"checkbox:sale_by_postgah","آیا مایلید کالا/محصول فوق را با همکاری '.setting('tiny_title').' به فروش برسانید؟","notInDiv"!]
			<span>(<a href=\''._URL.'/?page=64\' target=\'_blank\'>همکاری با پستگاه چیست؟</a>)</span>
	 	</div>
		
		<div id="sale_by_postgah_wrapper" <?=( $rw[\'sale_by_postgah\']==0 ? "style=\'display:none;\'" : "" )?> >
			
			[!"cat:state","cat_name"=>"product-state"!]
			<div>[!"number:count_of_stock","notInDiv"!] &nbsp; عدد</div>
			[!"cat:weight","cat_name"=>"product-weight"!]

			[!"radio:delivery_method","option"=>["BuyerPaysAll"=>"ارسال با هزینه خریدار","SellerPaysTown"=>"ارسال رایگان در شهر خودم","SellerPaysAll"=>"ارسال رایگان به کل کشور"]!]

			<div id="delivery_costs">
				<span class="lmfe_tnit"></span>
				<span id="delivery_cost_country-span">[!"number:delivery_cost_country","notInDiv"!]</span>
				<span id="delivery_cost_town-span">[!"number:delivery_cost_town","notInDiv"!]</span>
			</div>

		</div>

		<hr>

	[!"submit:ثبت"!]
	
	');

	layout_post_box( "فرم ثبت آیتم جدید", $content, $allow_eval=false, $framed=1 );

}





