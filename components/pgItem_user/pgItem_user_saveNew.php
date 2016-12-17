<?

# jalal7h@gmail.com
# 2016/10/16
# 1.0

function pgItem_user_saveNew(){
	
	# 
	# check if the content is verified
	token_check();

	#
	# filter all words
	kbclear( $_REQUEST['name'] );
	kbclear( $_REQUEST['text'] );
	kbclear( $_REQUEST['cost'] );
	kbclear( $_REQUEST['cell'] );
	kbclear( $_REQUEST['tell'] );
	kbclear( $_REQUEST['video'] );

	if(! $user_id = user_logged() ){
		ed();
	
	} else if(! $_REQUEST['cat_id'] ){
		ed();
	
	} else if(! $_REQUEST['position_id'] ){
		ed();
	}

	#
	# insert
	$item_id = dbs("item", ['user_id'=>$user_id,'name','text','cat_id','position_id','cost','cell','tell','video','sale_by_postgah','state','count_of_stock','weight','sale_duration','delivery_method','delivery_cost_town','delivery_cost_country','date_updated'=>U()] );
	#

	pgItem_set_cat_serial( $item_id );
	pgItem_set_position_serial( $item_id );

	# 
	# set kword
	if( trim($_REQUEST['kword']) ){
		kwordusage_set( $_REQUEST['kword'], "item", $item_id );
	}

	#
	# upload photo
	listmaker_fileupload( 'item', $item_id );
	#
	
	#
	# paid ads
	if( $PD_id = $_REQUEST['plan_duration_id'] ){

		if(! $rw_PD = table('plan_duration', $PD_id) ){
			e();
		
		} else {

			# save plan_duration_id
			$IPD_id = dbs( 'item_plan_duration', [ 'item_id'=>$item_id, 'plan_duration_id'=>$PD_id, 'cost'=>$rw_PD['cost'] ] );
			
			# check for billing after submit new item, 
			$order_table = 'item_plan_duration';
			$order_id = $IPD_id;
			$cost = $rw_PD['cost'];
			
			if(! $invoice_id = billing_invoiceMake( $cost, $order_table, $order_id ) ){
				return e();
			}

			# and redirect if needed.
			$vars['item_id'] = $item_id;
			$vars['item_name'] = trim( strip_tags($_REQUEST['name']) );
			$vars['item_invoice_id'] = $invoice_id;
			$vars['item_cost'] = billing_format($cost);

			$vars['item_payment_link'] = _URL.'/?page='.$_REQUEST['page'].'&do=billing_userpanel_payment&invoice_id='.$invoice_id;
			$vars['item_payment_button'] = '<a class="submit_button" href="'.$vars['item_payment_link'].'">پرداخت '.lmtc('billing_invoice')[0].'</a>';
			$vars['invoice_list_link'] = _URL.'/?page='.$_REQUEST['page'].'&do=billing_userpanel_list';
			$vars['invoice_list_button'] = '<a class="submit_button" href="'.$vars['invoice_list_link'].'">لیست '.lmtc('billing_invoice')[1].'</a>';
			
			$vars['login_link'] = user_loginLink( user_logged() );

			$c = texty('pgItem_user_saveNew_premium', $vars);
			
		}

	#
	# free ads
	} else {
		$vars['item_id'] = $item_id;
		$vars['item_name'] = trim( strip_tags($_REQUEST['name']) );
		$c = texty('pgItem_user_saveNew_free', $vars);
	}

	qpush( __FUNCTION__."_result", $c );

}







