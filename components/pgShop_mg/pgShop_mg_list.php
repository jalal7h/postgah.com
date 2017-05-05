<?php

# jalal7h@gmail.com
# 2017/05/04
# 1.0

function pgShop_mg_list(){
	
	$lmtcShop = lmtc('shop');

	# --------------------------------------------
	echo listmaker_list([
		'head' => 'لیست '.$lmtcShop[1],
		'table' => 'shop',
		'order' => [ 'id' => 'desc' ],
		'limit' => 10,
		'url' => [
			'base' => '_URL."/?page=admin&cp=".$_REQUEST["cp"]', // *
			'remove' => true,
			'flag' => true,
		],
		'item' => [
			[ 'picture' => '$rw["logo"]' ],
			[ 'pgShop_mg_list_shopNameNLinkNOwner( $rw )', "head"=>"نام ".$lmtcShop[0] ],
			[ 'dbqc("shop_item",["shop_id"=>$rw["id"]])." عدد"', "head" => "محصول" ],
			[ 'pgShop_mg_list_shopView( $rw )', "head"=>"بازدید" ]
		],
		'search' => [ 'path','name','desc','user(user_id)[name]','address','phone' ],
	]);
	# --------------------------------------------

}


function pgShop_mg_list_shopNameNLinkNOwner( $rw ){

	$rw_user = user_detail( $rw['user_id'] );

	$t =  "<a title=\"مشاهده فروشگاه\" ".( $rw['flag'] ? " href=\"http://".$rw["path"]."\" " : "" )." target=\"_blank\">".$rw["name"]."</a>";
	$t.= "<br>";
	$t.= "سازنده:‌ <a title=\"پروفایل کاربر\" href=\""._URL."/admin/user/view/".$rw_user['id']."\" target=\"_blank\">".$rw_user["name"]."</a>";

	$t.= " [ <a title=\"ورود به پنل کاربر\" target=\"_blank\" href=\"".user_loginLink($rw['user_id'], 'shop' )."\" class=\"fa fa-sign-in fa-lg\"></a> ]";

	return $t;

}


function pgShop_mg_list_shopView( $rw ){

	if(! $rs = dbq(" SELECT SUM(`view`) FROM `item` WHERE `id` IN (SELECT `item_id` FROM `shop_item` WHERE `shop_id`='".$rw['id']."') ") ){
		e();

	} else if(! $sum = dbr($rs,0,0) ){
		return 0;

	} else {
		return $sum;
	}

}




