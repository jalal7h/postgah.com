<?

# jalal7h@gmail.com
# 2017/05/22
# 1.1

function tallfooter_mg_list(){
	

	#############################################################
	echo listmaker_list([
		'head' => __('لایه های فوتر'),
		'table' => 'tallfooter',
		'url' => [
			'base' => '_URL."/?page=admin&cp=tallfooter_mg"', // default _FULL_URL *
			'target' => '_URL."/admin/tallfooter/edit/".$rw["id"]',
			'add' => true,
			'remove' => true,
			'flag' => true,
		],
		'item' => [
			[ 'tallfooter_mg_list_theName($rw)', 'head'=>lmtc("tallfooter:name") ],
			[ 'tallfooter_mg_list_theType($rw)', 'head'=>lmtc("tallfooter:type") ],
			[ '$rw["grid"]." / 12"', 'head'=>lmtc("tallfooter:grid") ],
		],
		'search' => [ 'name' ],
		'sort' => 'tallfooter/admin',
	]);
	#############################################################


	###################################################################################
	# the new version 1.2
		$list['sortable'] = $table."/admin";
	
	#
	# list e nou e element ha baraye hitbox e dokme "new item"
	echo "<div id=\"tallfooter_typelist\" >
	<div class=\"tallfooter_typelist_container\">
	<div class=\"info\">".__("انتخاب نوع لایه جدید ..")."</div>";
	foreach( $GLOBALS['tallfooter_element'] as $type => $title ){
		echo "<a class=\"btn btn-primary\" href=\""._URL."/?page=admin&cp=".$_REQUEST['cp']."&do=form&type=".$type."\">".$title."</a>";
	}
	echo "</div></div>";

}


function tallfooter_mg_list_theName( $rw ){

	// if( $rw['type'] == 'hr' ){
	// 	return '- - - - - - - -';
	
	// } else {
		return $rw['name'];
	// }

}


function tallfooter_mg_list_theType( $rw ){

	switch ($rw['type']) {
		
		case 'hr':
			return __('جدا کننده');

		case 'html':
			return __('محتوای html');
		
		case 'linkify':
			return __('جعبه پیوند');
		
		case 'social':
			return __('جامعه مجازی');
		
		case 'nl':
			return __('خبرنامه');
		
		case 'seo':
			return __('sitemap & rss');
		
		default:
			return __('نامشخص');
		
	}

}






