<?php

# jalal7h@gmail.com
# 2017/07/02
# 1.1

function pgPlan_mg_list(){

	# --------------------------------------------
	echo listmaker_list([
		'head' => 'لیست پلان‌ها',
		'table' => 'plan',
		'order' => [ 'prio'=>'asc', 'id'=>'desc' ],
		'url' => [
			'base' => '_URL."/?page=admin&cp='.$_REQUEST['cp'].'"', // *
			'target' => '_URL."/?page=admin&cp='.$_REQUEST['cp'].'&do=form&id=".$rw["id"]',
			'add' => true,
			'remove' => true,
			'prio' => true,
			'flag' => true,
		],
		'filter' => [
			'cat_id' => [ '.. گروه ..', cat_display('adsCat') ],
		],
		'item' => [
			[ "head"=>lmtc("plan:pic"), "tag"=>"th", "picture" => '$rw[\'icon\']' ],
			[ '$rw["name"]." (".$rw["name_on_form"].")"', "head"=>lmtc("plan:name") ],
			[ 'cat_translate($rw[\'cat_id\'])', "head"=>lmtc("plan:cat_id") ],
			[ 'position_translate($rw[\'position_id\'])', "head"=>lmtc("plan:position_id") ],
		],
		'search' => [ 'name','name_on_form','sample_page' ],
		'sort' => 'plan/admin',
	]);
	# --------------------------------------------

}


