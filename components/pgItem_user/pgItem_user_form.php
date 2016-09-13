<?

function pgItem_user_form(){
	
	$content = listmaker_form('

	[!
		"table" => "item" ,
		"action" => "./?page=".$_REQUEST["page"]."&do=pgItem_user_list",
		"name" => "'.__FUNCTION__.'" ,
		"class" => "'.__FUNCTION__.'" ,
		"switch" => "do1",
	!]

		<?= token_make(); ?>

		[!"cat:cat_id*", "cat_name"=>"adsCat","inDiv"!]
		[!"position:position_id*","inDiv"!]
		
		<hr>
		
		[!"text:name*","inDiv"!]
		[!"textarea:text*","inDiv"!]
		
		<hr>
		
		[!"file:image+","inDiv"!]
		<div>[!"number:cost"!] &nbsp; <?=setting("money_unit")?></div>
		
		<hr>

		[!"کلمه کلیدی","text:kword"=>kwordusage_get("item",$rw["id"],$string_flag=true),"inDiv"!]
		
		<hr>
		
		[!"number:cell","inDiv"!]
		[!"number:tell","inDiv"!]

		<hr>

		'.
		( $_REQUEST['id'] ? '' : '
		<div class="plans" >
			<span class="lmfe_tnit">پلان</span>
			<div class="list_of_plans ppugpftc">
				<span class="this_plan">
					<label><input type="radio" name="plan_duration_id" checked=1 value="0" /> مجانی</label>
				</span>
				<span class="etc"></span>
			</div>
		</div>
		<hr>
		')
		.'
		
		<div>
			[!"checkbox:sale_by_postgah","آیا مایلید کالا/محصول فوق را با همکاری '.setting('tiny_title').' به فروش برسانید؟"!]
			<span>(<a href=\''._URL.'/?page=64\' target=\'_blank\'>همکاری با پستگاه چیست؟</a>)</span>
	 	</div>
		
		<div id="sale_by_postgah_wrapper" <?=( $rw[\'sale_by_postgah\']==0 ? "style=\'display:none;\'" : "" )?> >
			
			[!"cat:state","cat_name"=>"product-state","inDiv"!]
			<div>[!"number:count_of_stock"!] &nbsp; عدد</div>
			[!"cat:weight","cat_name"=>"product-weight","inDiv"!]

			[!"radio:delivery_method","option"=>["BuyerPaysAll"=>"ارسال با هزینه خریدار","SellerPaysTown"=>"ارسال رایگان در شهر خودم","SellerPaysAll"=>"ارسال رایگان به کل کشور"],"inDiv"!]

			<div id="delivery_costs">
				<span class="lmfe_tnit"></span>
				<span id="delivery_cost_country-span">[!"number:delivery_cost_country"!]</span>
				<span id="delivery_cost_town-span">[!"number:delivery_cost_town"!]</span>
			</div>

		</div>

		<hr>

		[!"submit:ثبت","inDiv"!]

	[!close!]
	
	');

	layout_post_box( "فرم ثبت آیتم جدید", $content, $allow_eval=false, $framed=1 );

}





