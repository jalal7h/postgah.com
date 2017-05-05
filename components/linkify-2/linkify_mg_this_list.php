<?

# jalal7h@gmail.com
# 2017/01/06
# 2.1

function linkify_mg_this_list(){
	
	if(! $cat = intval($_REQUEST['cat']) ){
		ed();

	} else if(! $rw_linkify_config = table( 'linkify_config', $cat ) ){
		ed();
	}

	$parent = intval($_REQUEST['parent']);




	if( $rw_linkify_config['haveIcon'] == 1 ){
		$list_item[] = [ "head"=>lmtc("linkify:pic"), "tag"=>"th", "picture"=>'$rw[\'pic\']' ];
	}
	
	$list_item[] = [ "head"=>lmtc("linkify:name"), '$rw["name"]' ];
	$list_item[] = [ "head"=>lmtc("linkify:url"), 'linkify_mg_this_list_url($rw)' ];
	
	if( $rw_linkify_config['haveSub'] == 1 ){
		$list_item[] = [ "head"=>__('زیرپیوند'), '"<center>".dbr(dbq(" SELECT COUNT(*) FROM `linkify` WHERE `parent`=\'".$rw[\'id\']."\' "),0,0)."</center>"' ];
	}

	# --------------------------------------------
	echo listmaker_list([
		'table' => 'linkify',
		'where' => [ 'cat'=>$cat, 'parent'=>$parent ],
		'limit' => 10,
		'url' => [
			'base' => '_URL."/?page=admin&cp='.$_REQUEST['cp']."&cat=".$cat.'&do='.$_REQUEST['do'].'&parent='.$parent.'"',
			'target' => ( $rw_linkify_config['haveSub'] == 1 
					? '_URL."/admin/linkify/view/'.$cat.'/".$rw["id"]'
					: false ) ,
			'add' => true,
			'modify' => true,
			'remove' => true,
			'prio' => true,
			'flag' => true,
		],
		// 'add_prompt' => 'new item link prompt',
		'item' => $list_item,
		'search' => [ 'name', 'url' ],
		'sort' => 'linkify/admin',
	]);
	# --------------------------------------------

}



function linkify_mg_this_list_url( $rw ){

	$the_url = $rw["url"];
	$the_url = linkify_URL_remove( $the_url );
	
	$the_title = str_replace( 'http://', '', $the_url );
	if( strlen($the_title) > 22 ){
		$the_title = substr( $the_title , 0, 10 )."..".substr( $the_title , -10 );
	}

	$c = "<a class=\"url\" target=\"_blank\" href=\"".$the_url."\">".$the_title."</a>";

	return $c;

}









