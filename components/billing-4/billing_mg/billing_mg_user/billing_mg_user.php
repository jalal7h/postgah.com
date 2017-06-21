<?php

# jalal7h@gmail.com
# 2017/06/10
# 1.3

function billing_management_user(){
	
	#
	# action
	switch($_REQUEST['do']){
		case 'invoice_list':
			return billing_management_user_invoicelist();
	}

	#
	# list
	# --------------------------------------------
	echo listmaker_list([
		'table' => 'user',
		'where' => [ 'permission'=>0 ],
		'order' => [ 'id' => 'desc' ],
		'limit' => 10,
		'url' => [
			'base' => '_URL."/?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'"', // *
			'target' => '_URL."/admin/billing/user/".$rw["id"]',
		],
		'item' => [
			[ '"<span title=\'".$rw[\'email\']."\'>".$rw["name"]."</span>"', "head"=>lmtc('user:name') ],
			[ '( billing_userPayments($rw["id"]) ? billing_format(billing_userPayments($rw["id"])) : "'.__('صفر').'")', "head"=>__("پرداخت") ],
			[ '( billing_userCredit($rw["id"]) ? billing_format(billing_userCredit($rw["id"])) : "'.__('صفر').'")', "head"=>__("اعتبار") ],
		],
		'search' => [ 'name', 'email' ],
	]);
	# --------------------------------------------

}


