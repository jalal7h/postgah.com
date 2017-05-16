<?

# jalal7h@gmail.com
# 2017/05/04
# 1.1

function pgShop_user_list(){

	# --------------------------------------------
	$content = listmaker_list([
		'table' => 'shop', 'where' => [ 'user_id'=>user_logged() ], 'order' => [ 'id' => 'desc' ], 
		'url' => [
			'base' => '_URL."/?page='.$_REQUEST['page'].'&do_slug='.$_REQUEST['do_slug'].'"', // *
			'target' => true, 'add' => true, 'remove' => true, 'flag' => true,
		],
		'item' => [
			[ "head"=>lmtc("shop:logo"), "tag"=>"th", "picture" => '$rw["logo"]' ],
			[ "head"=>lmtc("shop:name"), '$rw["name"]' ],
			[ "head"=>lmtc("shop:path"), '_DOMAIN."/".$rw["path"]' ],
		],
		// 'search' => [ "name","path","desc","address","phone" ],
	]);
	# --------------------------------------------

	layout_post_box( lmtc('shop')[0]." من", $content, $allow_eval=false, $framed=1 );

}


