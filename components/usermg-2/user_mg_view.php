<?php

# jalal7h@gmail.com
# 2017/05/30
# 1.1

function user_mg_view(){

	if(! $user_id = intval($_REQUEST['id']) ){
		e();

	} else if(! $rw_user = user_detail($user_id) ){
		e();

	} else {

		echo "<div class=\"user_mg_view_head\">
			<span class=\"nav\">
				<a href=\""._URL."/admin/user\">".__('لیست کاربران')."</a> &nbsp; » &nbsp; 
				#".$rw_user['id']." - ".$rw_user['name']."
			</span>
			<span class=\"buttons\">
			<a href=\""._URL."/admin/billing/user/".$user_id."\" class=\"btn btn-link btn-sm\">".strtoupper(__('صورتحساب‌ها'))."</a>
			<a href=\""._URL."/admin/billing/user/".$user_id."/new-invoice\" class=\"btn btn-link btn-sm\">".strtoupper(__('صورتحساب جدید‌'))."</a>
			</span>
		</div>";

		$tabmenu_items[ "user_mg_view_main" ] = __("مشخصات کاربر");
		
		if( sizeof($GLOBALS['adminusertab']) ){
			foreach( $GLOBALS['adminusertab'] as $func => $name ){
				$tabmenu_items[ $func ] = $name;
			}
		}

		// $user_invoicelist_url = _URL."/admin/billing/user/".$user_id;
		// $tabmenu_items[ $user_invoicelist_url ] = __("لیست صورتحساب‌ها");

		listmaker_tabmenu( $tabmenu_items , _URL."/?page=admin&cp=".$_REQUEST['cp']."&do=".$_REQUEST['do']."&id=".$_REQUEST['id'] );
		
	}

}

