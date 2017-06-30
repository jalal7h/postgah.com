<?

function pgItem_user_list_this_tools( $rw ){

	$c.= "<div class=\"tools_w\">";

	$list = pgItem_user_getValidActionList($rw);
	foreach( $list as $i => $func ){
		if( function_exists('pgItem_user_list_this_tools_'.$func) ){
			$c.= call_user_func( 'pgItem_user_list_this_tools_'.$func , $rw );
		}
	}

	$c.= "</div>";

	return $c;
}


function pgItem_user_list_this_tools_InStock( $rw ){
	$the_url = _URL.'/?page='.$_REQUEST['page'].'&do_slug='.$_REQUEST['do_slug'].'&do1=SetStock&id='.$rw["id"];
	return "<a title=\"انتقال به فروخته شده‌ها\" href=\"".$the_url."\" class=\"InStock\"></a>";
}

function pgItem_user_list_this_tools_OutOfStock( $rw ){
	$the_url = _URL.'/?page='.$_REQUEST['page'].'&do_slug='.$_REQUEST['do_slug'].'&do1=SetStock&id='.$rw["id"];
	return "<a title=\"بازگشت به فروشگاه\" href=\"".$the_url."\" class=\"OutOfStock\"></a>";
}

function pgItem_user_list_this_tools_RegisterInShop( $rw ){
	if( $rw['cost'] == 0 ){
		$onclick = " onclick=\"alert('لطفا برای ثبت این محصول در فروشگاه، ابتدا قیمت محصول را تعیین نمائید.'); return false;\" ";
	}
	$the_url = _URL.'/?page='.$_REQUEST['page'].'&do_slug='.$_REQUEST['do_slug'].'&do1=RegisterInShop&id='.$rw["id"];
	return "<a $onclick title=\"نمایش در فروشگاه من\" href=\"".$the_url."\" class=\"RegisterInShop\"></a>";
}

function pgItem_user_list_this_tools_UnregisterInShop( $rw ){
	if( $rw['cost'] == 0 ){
		$onclick = " onclick=\"alert('لطفا برای ثبت این محصول در فروشگاه، ابتدا قیمت محصول را تعیین نمائید.'); return false;\" ";
	}
	$the_url = _URL.'/?page='.$_REQUEST['page'].'&do_slug='.$_REQUEST['do_slug'].'&do1=UnregisterInShop&id='.$rw["id"];
	return "<a $onclick title=\"عدم نمایش در فروشگاه من\" href=\"".$the_url."\" class=\"UnregisterInShop\"></a>";
}

function pgItem_user_list_this_tools_SetUpdateTime( $rw ){
	$the_url = _URL.'/?page='.$_REQUEST['page'].'&do_slug='.$_REQUEST['do_slug'].'&do1=SetUpdateTime&id='.$rw["id"];
	return "<a target=\"_hidden\" title=\"بروزرسانی\" href=\"".$the_url."\" class=\"SetUpdateTime\"></a>";
}

function pgItem_user_list_this_tools_LinkToAds( $rw ){
	return "<a target=\"_blank\" title=\"نمایش آگهی\" href=\"".pgItem_link($rw)."\" class=\"LinkToAds\"></a>";
}

function pgItem_user_list_this_tools_RejectMessage( $rw ){
	return "<a title=\"پیام رد آگهی\" href=\"#\" rel='".pgItem_user_list_RejectMessage($rw)."' class=\"RejectMessage\"></a>";
}

function pgItem_user_list_this_tools_RenewAds( $rw ){
	return "<a title=\"تمدید\" href='".$rw["id"]."' class=\"RenewAds\"></a>";
}

function pgItem_user_list_this_tools_MakePremium( $rw ){
	return "<a title=\"ویژه کردن\" href=\"".$rw['id']."\" class=\"MakePremium\"></a>";	
}

function pgItem_user_list_this_tools_IncompletePayment( $rw ){
	$invoice_id = que::pop( 'IncompletePayment-invoice_id' );
	return "<a title=\"پرداخت\" href=\"".billing_invoiceLink($invoice_id)."\" class=\"IncompletePayment\"></a>";
}










