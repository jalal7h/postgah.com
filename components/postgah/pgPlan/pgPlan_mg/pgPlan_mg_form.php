<?php

# jalal7h@gmail.com
# 2017/06/30
# 1.0

function pgPlan_mg_form(){

	if(! $plan_id = $_REQUEST['id'] ){
		e();
		return;

	} else if( dbqc( 'item', [ 'plan'=>$plan_id ] ) ){
		echo convbox_back('ویرایش پلان تا زمانی که تعدادی آگهی از آن وجود داشته باشد ممکن نیست.', 'red');
		return;
	}

	#
	# duration
	#
	$duration = "<div class='".__FUNCTION__."_duration_c' >\n";
	#
	# already have some records
	if( $plan_id = $_REQUEST['id'] ){
		if(! $rs_dr = dbq(" SELECT * FROM `plan_duration` WHERE `plan_id`='$plan_id' ORDER BY `hour` ASC, `id` ASC ") ){
			e(__FUNCTION__,__LINE__,dbe());
		} else if(! dbn($rs_dr) ){
			;//
		} else while( $rw_dr = dbf($rs_dr) ){
			$duration.= "<div class='edit'>\n";
			$duration.= lmfe([
				[ lmtc('plan_duration:hour'), 'number:duration_hour[]@'=>$rw_dr['hour'],'notInDiv' ],				
				[ lmtc('plan_duration:name'), 'text:duration_name[]@'=>$rw_dr['name'],'notInDiv' ],
				[ lmtc('plan_duration:cost'), 'number:duration_cost[]@'=>$rw_dr['cost'],'notInDiv' ],
				[ 'hidden:duration_in_table[]'=>$rw_dr['id'] ],
			]);

			$duration.= "</div><!-- edit -->\n";
		}
	}

	#
	# new
	$duration.= "<div class='new'>\n";
	$duration.= lmfe([
		[ lmtc('plan_duration:hour'), 'number:duration_hour[]@','notInDiv'],
		[ lmtc('plan_duration:name'), 'text:duration_name[]@','notInDiv'],
		[ lmtc('plan_duration:cost'), 'number:duration_cost[]@','notInDiv'],
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
		"action" => _URL."/?page=admin&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["cp"]."_list",
		"name" => "'.__FUNCTION__.'" ,
		"class" => "'.__FUNCTION__.'" ,
		"switch" => "do",
	!]
		
		[!"catbox:cat_id","cat_name"=>"adsCat","inDiv"!]
		[!"positionbox:position_id","inDiv"!]
		
		<hr>

		[!"text:name*","inDiv"!]
		[!"text:name_on_form*","inDiv"!]
		[!"url:sample_page","inDiv"!]
		
		<hr>

		[!"file:icon","inDiv"!]
		[!"file:watermark","inDiv"!]

		<hr>

		[!"color:search_box_color","inDiv"!]
		
		<hr>

		[!"toggle:suggest_as_related","inDiv"!]
		[!"toggle:pin_in_own_cat","inDiv"!]
		
		<hr>

		'.$duration.'

		<hr>

		[!"submit:ثبت","inDiv"!]

	[!close!]

	');

}

//		[!"toggle:show_in_index","inDiv"!]
// 		[!"toggle:watermark_onlyfirst","inDiv"!]
//		[!"toggle:pin_in_all_cat","inDiv"!]

// 		[!"toggle:search_box_color_flag","inDiv"!]
//		[!"file:search_result_cover","inDiv"!]
//		[!"toggle:send_in_newsletter","inDiv"!]
//		[!"toggle:pin_in_search","inDiv"!]



