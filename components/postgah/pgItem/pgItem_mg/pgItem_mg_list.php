<?php

# jalal7h@gmail.com
# 2017/06/10
# 1.0

function pgItem_mg_list(){

	###################################################################################
	# the new version 1.2
	
	// ( isset($_REQUEST['flag']) ? ( $_REQUEST['flag']!='1' ? " AND `flag`!=1 " : " AND `flag`='1' " ) : '' ).

	# 
	# the list
	$list['head'] = 'لیست آگهی‌ها';
	$list['name'] = 'pgItem_mg';

	$list['query'] = 
	" SELECT * FROM `item` WHERE `hide`='0' ".
	  ( is_numeric($_REQUEST['flag']) ? " AND `flag`='".intval($_REQUEST['flag'])."' " : '' ).
		
		// hazf e mavaredi ke dar hale pardakht hastand ( faktor barashun sader shode, ama pardakht nashode, hala che offline, che online )
		" AND `id` NOT IN ( ".
		  " SELECT `id` FROM `item` WHERE `flag`='0' AND `hide`='0' AND `id` IN ( ".
			" SELECT `item_id` FROM `item_plan_duration` WHERE `flag`='0' AND `request_for_date`='0' AND `hide`='0' ".
		  " ) ".
		" ) ".

	  " ORDER BY `flag` ASC , `date_updated` DESC ,`id` DESC ";

	$list['tdd'] = 10; // tedad dar safhe
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '_URL."/?page=admin&cp='.$_REQUEST['cp'].'"';

	#
	# actions 
	# ** mitunim link ham bedim bejaye 'true'
	# ** ama age base_url ro dashte bashim az hamun estefade mikone
	#
	
	$list['addnew_url'] = false;
	$list['remove_url'] = true; // link dokme hazf
	$list['paging_url'] = true; // not needed when we have 'tdd'
	$list['modify_url_inBlank'] = '_URL."/?page=admin&cp='.$_REQUEST['cp'].'&do=edit&id=".$rw["id"]'; // not needed when we have 'tdd'

	$list['tr_class'] = 'pgItem_mg_list_tr_class($rw)';

	#
	# list array // list e sotun haye list
	$list['list_array']= [
		["picture" => 'pgItem_image($rw)'],
		["content" => '$rw[\'name\']."<div style=\'font-size:9px\'>".table( "plan", pgPlan_getItemPlan($rw["id"]) )["name_on_form"]."</div>"', "title"=>'time_inword($rw["date_updated"])'],
		["content" => '"<a target=\'_blank\' href=\'./?page=admin&cp=user_mg&do=login&id=".$rw[\'user_id\']."\'>".table("user",$rw[\'user_id\'], "name")'],
		["content" => 'position_translate($rw[\'position_id\'])." / ".cat_translate($rw[\'cat_id\'])'],
		["content" => 'pgItem_user_list_this_status($rw)'],
	];

	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = [ "id", "name", "text", "user(user_id)[email]", "user(user_id)[name]", "cat(cat_id)[name]", "position(position_id)[name]" ];

	#
	# paging select
	$list['paging_select'] = [
		'sold' => "<option value='' >.. ".lmtc('item:sold')." ..</option><option value='0'>موجود</option><option value='1'>فروخته شده</option>",
		'expired' => "<option value='' >.. ".lmtc('item:expired')." ..</option><option value='0'>فعال</option><option value='1'>منقضی</option>",
		'flag' => "<option value='' >.. ".lmtc('item:flag')." ..</option><option value='2'>تایید شده</option><option value='0'>منتظر تایید</option><option value='1'>رد شده</option>",
		'cat_id' => "<option value='' >.. ".lmtc('item:cat_id')." ..</option>".listmaker_option( "cat", $condition=" AND `cat`='adsCat' AND `parent`='0' AND `flag`='1' ORDER BY `prio` ", $returnArray=false ) ,
		'position_id' => "<option value='' >.. ".lmtc('item:position_id')." ..</option>".listmaker_option( "position", $condition=" AND `parent`='0' ORDER BY `name` ASC ", $returnArray=false ) ,
	];

	$list['linkTo']['LinkToAds'] = [
		'url'=>'pgItem_link($rw)',
		'icon'=>'08e',
		'name'=>'نمایش آگهی',
		'color'=>'#000',
		'target'=>'_blank'
	];

	$list['linkTo']['RejectAds'] = [
		'url'=>'$rw["id"]',
		'icon'=>'256',
		'name'=>'رد آگهی',
		'color'=>'#f18601',
	];

	$list['linkTo']['AcceptAds'] = [
		'url'=>'_URL."/?page=admin&cp=".$_REQUEST["cp"]."&do=accept&id=".$rw["id"]',
		'icon'=>'00c',
		'name'=>'تایید آگهی',
		'color'=>'#75ac00',
	];

	#
	# echo result
	echo listmaker_list( $list );
	#
	########################################################################################
	
}

