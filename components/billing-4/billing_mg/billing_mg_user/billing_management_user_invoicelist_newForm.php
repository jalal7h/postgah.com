<?php

# jalal7h@gmail.com
# 2017/06/18
# 1.0

function billing_management_user_invoicelist_newForm(){
	
	if(! $user_id = intval($_REQUEST['id']) ){
		ed();
	}
	
	# -------------------------------------------------
	echo listmaker_form('
		[!"action" => "'._URL.'/admin/billing/user/'.$user_id.'", "switch"=>"do2"!]
			
			<div class="the_head">
				<span class="lmfe_tnit"></span>
				'.__('ثبت صورتحساب جدید برای %%', [ user_detail($user_id)['name'] ] ).'</div>
			<hr>

			[!"cost", "cost:cost"!]
			<hr>
	
		[!submit!]
	');
	# -------------------------------------------------
	


}

