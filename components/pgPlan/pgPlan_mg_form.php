<?

function pgPlan_mg_form(){

	#
	# duration
	#
	$duration = "<div class='".__FUNCTION__."_duration_c' >\n";
	#
	# already have some records
	if( $plan_id = $_REQUEST['id'] ){
		if(! $rs_dr = dbq(" SELECT * FROM `plan_duration` WHERE `plan_id`='$plan_id' ORDER BY `id` ASC ") ){
			e(__FUNCTION__,__LINE__,dbe());
		} else if(! dbn($rs_dr) ){
			;//
		} else while( $rw_dr = dbf($rs_dr) ){
			$duration.= "<div class='edit'>\n";
			$duration.= lmfe([
				[ lmtc('plan_duration:hour'), 'number:duration_hour[]@'=>$rw_dr['hour'] ],				
				[ lmtc('plan_duration:name'), 'text:duration_name[]@'=>$rw_dr['name'] ],
				[ lmtc('plan_duration:cost'), 'number:duration_cost[]@'=>$rw_dr['cost'] ],
				[ 'hidden:duration_in_table[]'=>$rw_dr['id'] ],
			]);

			$duration.= "</div><!-- edit -->\n";
		}
	}

	#
	# new
	$duration.= "<div class='new'>\n";
	$duration.= lmfe([
		[ lmtc('plan_duration:hour'), 'number:duration_hour[]@'],
		[ lmtc('plan_duration:name'), 'text:duration_name[]@'],
		[ lmtc('plan_duration:cost'), 'number:duration_cost[]@'],
	]);
	$duration.= "
	</div><!-- new -->
	<div class='more'></div>
	<div class='more_div'></div>
	</div><!-- duration_c -->
	";

	echo listmaker_form('
	
	[!
		"table" => "plan" ,
		"action" => "./?page=admin&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["cp"]."_list",
		"name" => "'.__FUNCTION__.'" ,
		"class" => "'.__FUNCTION__.'" ,
		"switch" => "do",
	!]
		
		[!"cat:cat_id","cat_name"=>"adsCat","inDiv"!]
		[!"position:position_id","inDiv"!]
		
		<hr>

		[!"text:name*","inDiv"!]
		[!"text:name_on_form*","inDiv"!]
		[!"url:sample_page","inDiv"!]
		
		<hr>

		[!"file:icon","inDiv"!]

		[!"file:watermark","inDiv"!]
		[!"toggle:watermark_onlyfirst","inDiv"!]

		<hr>

		[!"toggle:search_box_color_flag","inDiv"!]
		[!"color:search_box_color","inDiv"!]
		[!"file:search_result_cover","inDiv"!]
		
		<hr>

		[!"toggle:show_in_index","inDiv"!]
		[!"toggle:suggest_as_related","inDiv"!]
		[!"toggle:send_in_newsletter","inDiv"!]
		[!"toggle:pin_in_all_cat","inDiv"!]
		[!"toggle:pin_in_own_cat","inDiv"!]
		[!"toggle:pin_in_search","inDiv"!]		
		
		<hr>

		'.$duration.'

		<hr>

		[!"submit:ثبت","inDiv"!]

	[!close!]

	');

}


