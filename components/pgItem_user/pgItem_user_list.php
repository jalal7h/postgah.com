<?

# jalal7h@gmail.com
# 2016/10/16
# 1.2

function pgItem_user_list(){

	if(! $user_id = user_logged() ){
		echo "<script>location.href = '"._URL."/login';</script>";
		die();
	}

	$content.= qpop( 'pgItem_user_saveNew_result' );
	$content.= qpop( 'pgItem_user_saveEdit_result' );

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
	$list['base_url'] = '"./?page='.$_REQUEST['page'].'&do=pgItem_user"';

	#
	# actions 
	# ** mitunim link ham bedim bejaye 'true'
	# ** ama age base_url ro dashte bashim az hamun estefade mikone
	#
	
	$list['addnew_url'] = true;
	$list['remove_url'] = true; // link dokme hazf
	$list['modify_url'] = '"./?page='.$_REQUEST['page'].'&do='.$_REQUEST['do'].'&do1=form&id=".$rw["id"]';
	$list['paging_url'] = true; // not needed when we have 'tdd'
	$list['tr_class'] = 'pgItem_user_list_tr_class($rw)';
	
	#
	# list array // list e sotun haye list
	$list['list_array']= [
		["picture" => 'pgItem_image($rw)'],
		["content" => '$rw[\'name\']'],
		["content" => 'cat_translate($rw[\'cat_id\'])'],
		["content" => 'pgItem_user_list_this_status($rw).pgPlan_user_MakePremium_form( $rw ).pgPlan_user_RenewAds_form( $rw )'],
	];

	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = array("name","text");

	#
	# paging select
	$list['paging_select'] = [
		'sold' => "<option value='' >.. ".lmtc('item:sold')." ..</option><option value='0'>موجود</option><option value='1'>فروخته شده</option>",
		'expired' => "<option value='' >.. ".lmtc('item:expired')." ..</option><option value='0'>فعال</option><option value='1'>منقضی</option>",
		'flag' => "<option value='' >.. ".lmtc('item:flag')." ..</option><option value='2'>تایید شده</option><option value='0'>منتظر تایید</option><option value='1'>رد شده</option>",
		'cat_id' => "<option value='' >.. ".lmtc('item:cat_id')." ..</option>".listmaker_option( "cat", $condition=" AND `cat`='adsCat' AND `parent`='0' AND `flag`='1' ", $returnArray=false ) ,
	];


	$list['linkTo']['OutOfStock'] = [
		'url'=>'_URL."/?page='.$_REQUEST['page'].'&do='.$_REQUEST['do'].'&do1=SetStock&id=".$rw["id"]',
		'icon'=>'00c',
		'name'=>'فروخته شد',
		'color'=>'#4b00ff',
	];
	#
	$list['linkTo']['InStock'] = [
		'url'=>'_URL."/?page='.$_REQUEST['page'].'&do='.$_REQUEST['do'].'&do1=SetStock&id=".$rw["id"]',
		'icon'=>'00c',
		'name'=>'بازگشت به فروش',
		'color'=>'#b7b7b7',
	];

	$list['linkTo']['SetUpdateTime'] = [
			'url'=>'_URL."/?page='.$_REQUEST['page'].'&do='.$_REQUEST['do'].'&do1=SetUpdateTime&id=".$rw["id"]',
		'icon'=>'021',
		'name'=>'بروزرسانی',
		'color'=>'#c3bd00',
		// 'target'=>'_hidden'
	];

	if( pgShop_getUserShopId() ){
		$list['linkTo']['RegisterInShop'] = [
			'url'=>'_URL."/?page='.$_REQUEST['page'].'&do='.$_REQUEST['do'].'&do1=RegisterInShop&id=".$rw["id"]',
			'icon'=>'07a',
			'name'=>'نمایش در فروشگاه من',
			'color'=>'#b7b7b7',
		];
		#
		$list['linkTo']['UnregisterInShop'] = [
			'url'=>'_URL."/?page='.$_REQUEST['page'].'&do='.$_REQUEST['do'].'&do1=UnregisterInShop&id=".$rw["id"]',
			'icon'=>'07a',
			'name'=>'عدم نمایش در فروشگاه من',
			'color'=>'#b10000',
		];
	}

	$list['linkTo']['LinkToAds'] = [
		'url'=>'pgItem_link($rw)',
		'icon'=>'08e',
		'name'=>'نمایش آگهی',
		'color'=>'#000',
		'target'=>'_blank'
	];

	$list['linkTo']['RenewAds'] = [
		'url'=>'$rw["id"]',
		'icon'=>'017',
		'name'=>'تمدید',
		'color'=>'#ff7600',
	];

	$list['linkTo']['MakePremium'] = [
		'url'=>'$rw["id"]',
		'icon'=>'005',
		'name'=>'ویژه کردن',
		'color'=>'#00cad4',
	];

	$list['linkTo']['RejectMessage'] = [
		'url'=>__FUNCTION__.'_RejectMessage($rw)',
		'icon'=>'0e0',
		'name'=>'پیام از طرف مدیریت در رابطه با رد آگهی',
		'color'=>'#ff8100',
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







