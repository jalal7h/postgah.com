<?php

# jalal7h@gmail.com
# 2017/06/22
# 1.1

function pgItem_mg_list(){

	# --------------------------------------------
	echo listmaker_list([
		
		'head' => 'لیست آگهی‌ها',
		'name' => 'pgItem_mg',
		'table' => 'item',
		
		'query' => " SELECT * FROM `item` WHERE `hide`='0' ".
		  ( is_numeric($_REQUEST['flag']) ? " AND `flag`='".intval($_REQUEST['flag'])."' " : '' ).
			
			// hazf e mavaredi ke dar hale pardakht hastand ( faktor barashun sader shode, ama pardakht nashode, hala che offline, che online )
			" AND `id` NOT IN ( ".
			  " SELECT `id` FROM `item` WHERE `flag`='0' AND `hide`='0' AND `id` IN ( ".
				" SELECT `item_id` FROM `item_plan_duration` WHERE `flag`='0' AND `request_for_date`='0' AND `hide`='0' ".
			  " ) ".
			" ) ".

		  " ORDER BY `flag` ASC , `date_updated` DESC ,`id` DESC ",

		'limit' => 10,

		'tr_class' => 'pgItem_mg_list_tr_class($rw)',

		'url' => [
			'base' => '_URL."/?page=admin&cp='.$_REQUEST['cp'].'"', // *
			'modify' => '_URL."/?page=admin&cp='.$_REQUEST['cp'].'&do=edit&id=".$rw["id"]',
			'removeAll' => true,
		],
				
		'filter' => [
			'sold' => [ ".. ".lmtc('item:sold')." ..", [ 0=>'موجود', 1=>'فروخته شده' ] ],
			'expired' => [ ".. ".lmtc('item:expired')." ..", [ 0=>'فعال', 1=>'منقضی' ] ],
			'flag' => [ ".. ".lmtc('item:flag')." ..", [ 2=>'تایید شده', 0=>'منتظر تایید', 1=>'رد شده' ] ],
			'cat_id' => [ ".. ".lmtc('item:cat_id')." ..", listmaker_option("cat", " AND `cat`='adsCat' AND `parent`='0' AND `flag`='1' ORDER BY `prio` ") ],
			'position_id' => [ ".. ".lmtc('item:position_id')." ..", listmaker_option("position", " AND `parent`='0' ORDER BY `name` ASC ") ],
			'plan' => [ ".. ".lmtc('item:plan')." ..", listmaker_option("plan", " AND `flag`='1' ") ],
		],
		
		'button' => [
			'LinkToAds' => [
				'url'=>'pgItem_link($rw)',
				'icon'=>'08e',
				'name'=>'نمایش آگهی',
				'color'=>'#000',
				'target'=>'_blank'
			],
			'RejectAds' => [
				'url'=>'$rw["id"]',
				'icon'=>'256',
				'name'=>'رد آگهی',
				'color'=>'#f18601',
			],
			'AcceptAds' => [
				'url'=>'_URL."/?page=admin&cp=".$_REQUEST["cp"]."&do=accept&id=".$rw["id"]',
				'icon'=>'00c',
				'name'=>'تایید آگهی',
				'color'=>'#75ac00',
			],
		],


		'item' => [
			[ "picture" => 'pgItem_image($rw)' ],
			[ '$rw[\'name\']."<div style=\'font-size:9px\'>".pgPlan_getItemPlan_text($rw)."</div>"', "title"=>'time_inword($rw["date_updated"])' ],
			[ '"<a target=\'_blank\' href=\'".user_loginLink($rw[\'user_id\'])."\'>".table("user",$rw[\'user_id\'], "name")' ],
			[ 'position_translate($rw[\'position_id\'])." / ".cat_translate($rw[\'cat_id\'])' ],
			[ 'pgItem_user_list_this_status($rw)' ],
		],

		'search' => [ "id", "name", "text", "user(user_id)[email]", "user(user_id)[name]", "cat(cat_id)[name]", "position(position_id)[name]" ],


	]);
	# --------------------------------------------

}

