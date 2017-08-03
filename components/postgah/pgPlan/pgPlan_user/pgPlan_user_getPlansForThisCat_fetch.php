<?php

# jalal7h@gmail.com
# 2017/08/03
# 1.1

function pgPlan_user_getPlansForThisCat_fetch( $ignore_plan_id_list=null ){

	if( $ignore_plan_id_list ){
		$ignore_plan_id_query = " AND `id` NOT IN (".implode( ",", $ignore_plan_id_list ).") ";
	}

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
	if(! $rs = dbq(" SELECT * FROM `plan` WHERE `flag`='1' $ignore_plan_id_query AND `cat_id` IN (".implode(',',$cat_serial).") AND `position_id` IN (".implode(',',$position_serial).")
	") ){
		e();

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
		return false;

	} else {

		while( $rw = dbf($rs) ){

			if(! $rs0 = dbq(" SELECT * FROM `plan_duration` WHERE `plan_id`='".$rw['id']."' ORDER BY `hour` ASC , `name` ASC ") ){
				e();

			} else if(! dbn($rs0) ){
				//

			} else {
				while( $rw_pd = dbf($rs0) ){
					$rw['pd_s'][] = $rw_pd;
				}
			}

			$rw_s[] = $rw;

		}

	}

	return $rw_s;

}









