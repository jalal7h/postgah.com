<?php

# jalal7h@gmail.com
# 2017/07/01
# 1.0

add_action('pgPlan_user_getPlansForThisCat');

function pgPlan_user_getPlansForThisCat( $ignore_plan_id_list=null ){

	if( $rw_s = pgPlan_user_getPlansForThisCat_fetch($ignore_plan_id_list) ){
		
		echo "<div class=\"ppugpftc\">\n";
	
		foreach( $rw_s as $rw ){

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

			echo "<span class='this_plan'>";
			echo "<div class='head'>پلان های $plan_head_cat $plan_head_pos</div>";

			foreach( $rw['pd_s'] as $rw_pd ){
				echo '<label><input type="radio" name="plan_duration_id" value="'.$rw_pd['id'].'" /> '.$rw['name_on_form'].' ( '.$rw_pd['name'].' / '.billing_format($rw_pd['cost']).' ) '.( $rw['sample_page'] ? '<a class="sample_page" href="'.$rw['sample_page'].'" target="_blank" >'.lmtc('plan:sample_page').'</a>' : '').'</label>';
			}

			echo "</span>\n";

		}

		echo "</div>\n";

	}

}









