<?

function pgItem_user_getValidActionList( $rw ){

	$list[] = 'NULL';

	#
	# age agahi faal hast
	if( pgItem_isActive($rw) ){
		
		# 
		# [ dokme mojudiat e jens ] age in ye jens e tu monagheseye postgah
		if( pgItem_saleByPostgah($rw) ){
			
			# age hanuz hast
			if( $rw['sold'] == 0 ){
				$list[] = 'InStock';
			
			# age forush rafte
			} else {
				$list[] = 'OutOfStock';
			}

		}

		#
		# [ dokme ezafe be shop ] age agahi faal hast, age user shop dare
		if( pgShop_getUserShopId() ){
			
			if(! pgShop_getItemShopId($rw['id']) ){
				$list[] = 'RegisterInShop';

			} else {
				$list[] = 'UnregisterInShop';
			}

		}

		#
		# [ dokme beruz-resani ] age agahi faal hast
		$list[] = 'SetUpdateTime';
		
		#
		# [ dokme namayesh e agahi ] age agahi faal hast
		$list[] = 'LinkToAds';

	}

	#
	# [ dokme moshahede matn e reject ] age agahi reject hast
	if( pgItem_isRejected($rw) ){
		$list[] = 'RejectMessage';
	}

	if( pgItem_isActive($rw) and pgItem_isPremium($rw) ){
		$list[] = 'RenewAds';
	}

	#
	# [ dokme upgrade ] 
	if( ( pgItem_isVerified($rw) or pgItem_isVerifyWaiting($rw) ) // agar agahi faal ya montazer faal shodane
	and !pgItem_isExpired($rw) // va monghazi nist
	and !pgItem_haveIncompletePayment($rw) // va pardakht e naghesi nadare
	and !( pgItem_isVerifyWaiting($rw) and !pgItem_isFree($rw) )
	and pgPlan_isAnyInThisCatAndPosition( $rw['cat_id'], $rw['position_id'], $rw['plan'] )
	){
		$list[] = 'MakePremium';
	}

	# 
	# [ dokme pardakht ] agar pardakht e naghesi dashte, va faktor sakhte shode
	if( $IPD_id = pgItem_haveIncompletePayment($rw) ){
		$invoice_id = billing_invoiceDetail_byOrderDetail( 'item_plan_duration', $IPD_id )['id'];
		$list[] = 'IncompletePayment';
		qpush( 'IncompletePayment-invoice_id', $invoice_id );

	}

	return $list;

}








