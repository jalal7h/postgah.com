<?

# jalal7h@gmail.com
# 2017/05/30
# 1.1

function billing_management_user(){
	
	#
	# action
	switch($_REQUEST['do']){
		case 'invoice_list':
			return billing_management_user_invoicelist();
	}

	#
	# list
	$list['query'] = " SELECT * FROM `user` WHERE `permission`='0' ORDER BY `id` DESC ";
	
	$list['target_url'] = '_URL."/admin/billing/user/".$rw["id"]';
	$list['paging_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]';
	$list['addnew_url'] = false;
	
	$list['list_array'] = array(
		#
		# name
		array( "head" => lmtc('user:name') , "content" => '"<span title=\'".$rw[\'email\']."\'>".$rw["name"]."</span>"' , "attr" => array( "width" => "200px" , "align" => 'center' , "dir" => _rtl) ),
		#
		# payments
		array( "head" => __("پرداخت") , "content" => 'billing_format(intval(dbr(dbq(" SELECT SUM(`cost`) FROM `billing_invoice` WHERE `user_id`=\'".$rw[\'id\']."\' AND `date`>0 AND `method`!=\'wallet\' "),0,0)))' , "attr" => array( "align" => 'right',"dir" => _rtl) ),
		#
		# credit
		array( "head" => __("اعتبار") , "content" => 'billing_format(billing_userCredit($rw["id"]))' , "attr" => array( "align" => 'right',"dir" => _rtl) ),
	);

	echo listmaker_list($list);

}


