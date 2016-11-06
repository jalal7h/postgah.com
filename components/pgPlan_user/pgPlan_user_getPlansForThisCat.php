<?

$GLOBALS['do_action'][] = 'pgPlan_user_getPlansForThisCat';

function pgPlan_user_getPlansForThisCat( $ignore_plan_id_list=null ){

	if( $ignore_plan_id_list ){
		$ignore_plan_id_query = " AND `id` NOT IN (".implode( ",", $ignore_plan_id_list ).") ";
	}

	echo "<div class=\"ppugpftc\">\n";

	#
	# vars
	$cat_id = intval($_REQUEST['cat_id']);
	$cat_serial = cat_id_serial( $cat_id );
	$cat_serial[] = 0;
	$position_id = intval($_REQUEST['position_id']);
	$position_serial = position_id_serial( $position_id );
	if( $position_id==11 ){ // 11 == iran
		$position_id = 0;
	}
	$position_serial[] = 0;

	#
	# item plan duration
	if( $item_id = $_REQUEST['item_id'] ){
		$item_planDurationId = pgPlan_getItemPlanDuration( $item_id );
		// error_log('itttem ' . $item_id. ' ; '. $item_planDurationId);
	}

	#
	# put out the content
	if(! $rs = dbq(" SELECT * FROM `plan` WHERE 1 $ignore_plan_id_query AND
			`cat_id` IN (".implode(',',$cat_serial).") AND
			`position_id` IN (".implode(',',$position_serial).")
	") ){
		e(__FUNCTION__,__LINE__);

	} else if(! dbn($rs) ){
		if( $ignore_plan_id_query ){
			// echo convbox('هیچ پلانی برای این گروه / منطقه تعریف نشده است');
		} else {
			// echo convbox('هیچ پلانی تعریف نشده است');
		}
		// echo "<style>
		// .current_plan { display: none; } 
		// .pgiul_sb_".$item_id." { display: none !important; }
		// </style>";

	} else while( $rw = dbf($rs) ){

		if(! $rs0 = dbq(" SELECT * FROM `plan_duration` WHERE `plan_id`='".$rw['id']."' ORDER BY `name` ASC ") ){
			e(__FUNCTION__,__LINE__);

		} else if(! dbn($rs0) ){
			;//

		} else {

			echo "<span class='this_plan'>";

			#
			# head
			if(! $rw['cat_id'] ){
				$plan_head_cat = 'همه دسته بندی ها';
			} else {
				$plan_head_cat = cat_translate( $rw['cat_id'] );	
			}
			if(! $rw['position_id'] ){
				$plan_head_pos = '';
			} else {
				$plan_head_pos = "در ".position_translate( $rw['position_id'] );
			}

			echo "<div class='head'>پلان های $plan_head_cat $plan_head_pos</div>";

			while( $rw0 = dbf($rs0) ){
				// '.($rw0['id']==$item_planDurationId?'checked':'').'
				echo '<label><input type="radio" name="plan_duration_id" value="'.$rw0['id'].'" /> '.$rw['name_on_form'].' ( '.$rw0['name'].' / '.number_format($rw0['cost']).' '.setting('money_unit').' ) '.( $rw['sample_page'] ? '<a class="sample_page" href="'.$rw['sample_page'].'" target="_blank" >'.lmtc('plan:sample_page').'</a>' : '').'</label>';
			}

			echo "</span>";

		}
	}

	echo "</div>\n";

}









