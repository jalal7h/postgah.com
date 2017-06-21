<?

# jalal7h@gmail.com
# 2017/02/08
# 1.3

function billing_userpanel_list(){

	if(! $user_id = user_logged() ){
		ed();
	}
	
	$tdd = 5;
	$p = intval($_REQUEST['p']);
	$stt = $tdd * $p;
	
	$query = " SELECT * FROM `billing_invoice` WHERE `user_id`='$user_id' AND ( `visible`=1 OR `date`>0 OR `order_table`!='' ) ORDER BY `date_created` DESC LIMIT $stt,$tdd ";

	if(! $rs = dbq($query) ){
		ed();
	
	} else if(! dbn($rs) ){
		//

	} else while( $rw = dbf($rs) ){

		if( substr($rw['method'],0,6) == 'manual' ){
			$rw['method_title'] = __('پرداخت فیش بانکی');
		
		} else if( $rw['method'] == 'wallet' ){
			$rw['method_title'] = __('پرداخت از اعتبار');
		
		} else {
			$rw['method_title'] = __('پرداخت آنلاین');
		}

		$rw['method_name'] = billing_method_name($rw['method']);

		if( $rw['method'] == 'wallet' ){
			$rw['transaction'] = '<span class="none">- - -</span>';
		} else {
			$rw['transaction'] = strtoupper($rw['transaction']);
		}

		$records[] = $rw;

	}

	#
	# the paging links
	$link = _URL."/?page=".$_REQUEST['page']."&do_slug=".$_REQUEST['do_slug']."&p=";
	$paging = listmaker_paging( $query, $link, $tdd );

	# 
	# the credit bar
	if( $credit = billing_userCredit($user_id) ){
		$credit = billing_format($credit);
	} else {
		$credit = __('صفر');
	}

	#
	# render the template
	$c = template_engine( 'billing_user_list', [ 
		'records' => $records,
		'paging' => $paging,
		'credit' => $credit
	]);

	layout_post_box( __("صورتحساب ها"), $c, $allow_eval=false, $framed=1 );

}



