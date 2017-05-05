<?php

# jalal7h@gmail.com
# 2017/05/01
# 1.0

function user_mg_view_main(){

	switch ($_REQUEST['do2']) {
		case 'saveEdit':
			user_mg_view_main_save();
			break;
	}

	if(! $user_id = intval($_REQUEST['id']) ){
		e();

	} else if(! $rw_user = user_detail($user_id) ){
		e();

	} else {
	
		$action = _URL.'/?page=admin&cp='.$_REQUEST['cp'].'&do='.$_REQUEST['do'].'&id='.$_REQUEST['id'].'&func='.$_REQUEST['func'];

		# -------------------------------------------------
		echo listmaker_form('
			[!"table" => "user", "action"=>"'.$action.'", "switch"=>"do2"!]
						
				[!"text:name"!]
				[!"file:profile_pic"!]

				<div class="lmfe_inDiv">
					[!"email:email", "notInDiv"!]
					[!"toggle:email_verified@", "notInDiv"!]
				</div>

				<div class="lmfe_inDiv">
					[!"cell:cell", "notInDiv"!]
					[!"toggle:cell_verified@", "notInDiv"!]
				</div>
					
				[!"phone:tell"!]
				[!"text:address"!]
				
				<hr>
				
				[!"text:im_a"!]
				[!"text:work_at"!]

				[!"select:gender","option"=>["M"=>"'.__('مذکر').'", "F"=>"'.__('مونث').'"]!]

				<hr>
		
			[!submit!]
		');
		# -------------------------------------------------
		
	}

}

