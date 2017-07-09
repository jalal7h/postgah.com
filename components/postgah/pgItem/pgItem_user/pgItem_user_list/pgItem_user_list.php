<?php

# jalal7h@gmail.com
# 2017/06/30
# 1.3

function pgItem_user_list(){

	if(! $user_id = user_logged() ){
		jsgo( layout_link(60) );
	}

	$content.= que::pop( 'pgItem_user_saveNew_result' );
	$content.= que::pop( 'pgItem_user_saveEdit_result' );

	###################################################################################
	# the new version 1.2

	# 
	# the list
	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `item` WHERE `user_id`='$user_id' ORDER BY `date_updated` DESC ,`id` DESC ";
	$list['tdd'] = 5; // tedad dar safhe
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '_URL."/?page='.$_REQUEST['page'].'&do=pgItem_user"';

	#
	# actions 
	# ** mitunim link ham bedim bejaye 'true'
	# ** ama age base_url ro dashte bashim az hamun estefade mikone
	#
	
	$list['addnew_url'] = '"'._URL.'/'.Slug::getSlugByName('userpanel').'/items/new"';
	$list['remove_url'] = true; // link dokme hazf
	$list['modify_url'] = '_URL."/?page='.$_REQUEST['page'].'&do='.$_REQUEST['do'].'&do1=form&id=".$rw["id"]';
	// $list['modify_url'] = '_URL."/items/edit/".$rw["id"]';
	$list['paging_url'] = true; // not needed when we have 'tdd'
	// $list['tr_class'] = 'pgItem_user_list_tr_class($rw)';
	
	#
	# list array // list e sotun haye list
	$list['list_array']= [
		["picture" => 'pgItem_image($rw)'],
		["content" => '$rw["name"].pgPlan_itemCurrentPlan($rw)'],
		["content" => 'cat_translate($rw["cat_id"])'],
		["content" => 'pgItem_user_list_this_status($rw). pgPlan_user_MakePremium_form($rw). pgPlan_user_RenewAds_form($rw)'],
		["content" => 'pgItem_user_list_this_tools($rw)'],
	];

	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = array("id","name","text");

	#
	# paging select
	$list['paging_select'] = [
		'sold' => "<option value='' >.. ".lmtc('item:sold')." ..</option><option value='0'>موجود</option><option value='1'>فروخته شده</option>",
		'expired' => "<option value='' >.. ".lmtc('item:expired')." ..</option><option value='0'>فعال</option><option value='1'>منقضی</option>",
		'flag' => "<option value='' >.. ".lmtc('item:flag')." ..</option><option value='2'>تایید شده</option><option value='0'>منتظر تایید</option><option value='1'>رد شده</option>",
		'cat_id' => "<option value='' >.. ".lmtc('item:cat_id')." ..</option>".listmaker_option( "cat", $condition=" AND `cat`='adsCat' AND `parent`='0' AND `flag`='1' ", $returnArray=false ) ,
	];


	#
	# echo result
	$content.= listmaker_list( $list );
	#
	########################################################################################

	?>
	<style>
		#hitbox-text * {
		    max-width: 100vw;
		}
	</style>
	<?

	layout_post_box( "لیست آگهی ها", $content, $allow_eval=false, $framed=1 );

}







