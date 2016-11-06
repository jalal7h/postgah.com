<?

function billing_management_users(){
	
	#
	# action
	switch($_REQUEST['do']){
		case 'invoice_list':
			return billing_management_users_invoicelist();
	}

	#
	# list
	$list['query'] = " SELECT * FROM `users` WHERE `permission`='0' ORDER BY `id` DESC ";
	
	$list['target_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]."&do=invoice_list&id=".$rw["id"]';
	$list['paging_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]';
	$list['addnew_url'] = false;
	
	$list['list_array'] = array(
		#
		# name
		array( "head" => lmtc('users:name') , "content" => '"<span title=\'".$rw[\'username\']."\'>".$rw["name"]."</span>"' , "attr" => array( "width" => "200px" , "align" => 'center' , "dir" => "rtl") ),
		#
		# payments
		array( "head" => __("پرداخت") , "content" => 'billing_format(intval(dbr(dbq(" SELECT SUM(`cost`) FROM `billing_invoice` WHERE `user_id`=\'".$rw[\'id\']."\' AND `date`>0 AND `method`!=\'wallet\' "),0,0)))' , "attr" => array( "align" => 'right',"dir" => "rtl") ),
		#
		# credit
		array( "head" => __("اعتبار") , "content" => 'billing_format(billing_userCredit($rw["id"]))' , "attr" => array( "align" => 'right',"dir" => "rtl") ),
	);

	echo listmaker_list($list);

}


