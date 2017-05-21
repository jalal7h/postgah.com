<?

# jalal7h@gmail.com
# 2017/05/21
# 1.2

function pgShop_user_list(){

	# --------------------------------------------
	$content = listmaker_list([
		'table' => 'shop', 'where' => [ 'user_id'=>user_logged() ], 'order' => [ 'id' => 'desc' ], 
		'url' => [
			'base' => '_URL."/?page='.$_REQUEST['page'].'&do_slug='.$_REQUEST['do_slug'].'"', // *
			'modify' => true, 'add' => true, 'remove' => true, 'flag' => true,
		],
		'item' => [
			[ "head"=>lmtc("shop:logo"), "tag"=>"th", "picture" => '$rw["logo"]' ],
			[ "head"=>lmtc("shop:name"), '( strlen($rw["name"]) > 50 ? mb_substr($rw["name"],0,50)." .." : $rw["name"] )' ],
			[ "head"=>lmtc("shop:path"), '"<a target=\"_blank\" href=\"http://"._DOMAIN."/".$rw["path"]."\">"._DOMAIN."/".$rw["path"]."</a>"' ],
		],
		// 'search' => [ "name","path","desc","address","phone" ],
	]);
	# --------------------------------------------

	layout_post_box( lmtc('shop')[0]." من", $content, $allow_eval=false, $framed=1 );

}



