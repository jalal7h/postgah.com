<?php

# jalal7h@gmail.com
# 2017/07/28
# 2.0

define( '_PAGE_SEARCH', '67' );

function pgSearch_form(){

	$q = pgSearch_q();

	if( $_REQUEST['its_tag'] ){
		$q = '';
	}

	if( $cat_id = $_POST['q_cat'] ){
		if(! $cat_name = cat_translate($cat_id) ){
			$cat_id = null;
		}
	}

	if( $pos_id = $_POST['q_pos'] ){
		if(! $pos_name = position_translate($pos_id) ){
			$pos_id = null;
		}
	}

	return listmaker_form('
		[!"action" => _URL."/?page="._PAGE_SEARCH!]
			
		[!"catbox:q_cat", "cat_name"=>"adsCat", "همه گروه‌ها"!]
		[!"text:q"=>"'.$q.'"!]
		[!"positionbox:q_pos", "همه شهرها"!]
		<i class="fa fa-search submit btn btn-primary btn-sm"></i>

		<shelf>
			<cat></cat>
			<pos></pos>
		</shelf>

		'.( $cat_id ? '
		<script>
			jQuery(document).ready(function($) {
				$("#lmfe_inDiv_formd41d8c_q_cat input[type=\'hidden\'][name=\'q_cat\']").val("'.$cat_id.'");
				$("#lmfe_inDiv_formd41d8c_q_cat .lmfe_catbox ").html("&nbsp;");
				$(".pgSearch_form shelf cat").html("'.$cat_name.'").addClass("visi");
			});
		</script>
		' : '' ).'	

		'.( $pos_id ? '
		<script>
			jQuery(document).ready(function($) {
				$("#lmfe_inDiv_formd41d8c_q_pos input[type=\'hidden\'][name=\'q_pos\']").val("'.$pos_id.'");
				$("#lmfe_inDiv_formd41d8c_q_pos .lmfe_positionbox ").html(" ");
				$(".pgSearch_form shelf pos").html("'.$pos_name.'").addClass("visi");
			});
		</script>
		' : '' ).'	

	');	

}


