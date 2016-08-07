<?
$GLOBALS['cmp']['users_management'] = 'کاربران';
$GLOBALS['cmp-icon']['users_management'] = '0c0';

function users_management(){
	


	switch($_REQUEST['do']){
		case 'login':
			users_management_login();
			break;
		case 'remove':
			users_management_remove();
			break;
	}

	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `users` WHERE `permission`='0' ORDER BY `id` DESC ";
	$list['target_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&do=login&id=".$rw["id"]';
	$list['paging_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]';
	$list['addnew_url'] = false;
	$list['remove_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&do=remove&id=".$rw["id"]';
	$list['remove_prompt'] = '"آیا مایل به حذف  کاربر هستید?"';
	$list['list_array'] = array(
		
		#
		# avatar
		array( "head" => "عکس" , "picture" => '$rw[\'profile_pic\']' ),
		
		#
		# username
		array( "head" => "نام کاربر" , "content" => '"<span title=\'".$rw[\'username\']."\'>".$rw["name"]."</span>"' , "attr" => array( "width" => "200px" , "align" => 'right' , "dir" => "rtl") ),
		
		#
		# position
		array( "head" => "موقعیت" , "content" => '"<span title=\'".$rw[\'address\']."\'>".position_translate($rw["position_region_id"])."</span>"' , "attr" => array( "align" => 'center' , "dir" => "rtl") ),
		
	);

	if( is_component("billing") ){

		#
		# payments
		$list['list_array'][] = array( "head" => "پرداخت" , "content" => 'number_format( billing_userPayments( $rw["id"] ) )." تومان"' , "attr" => array( "align" => 'right',"dir" => "rtl") );
		
		# 
		# credit
		$list['list_array'][] = array( "head" => "اعتبار" , "content" => 'number_format(billing_userCredit($rw["id"]))." تومان"' , "attr" => array( "align" => 'right',"dir" => "rtl") );
		
	}
	
	$list['paging_select'] = array(
		'position_region_id' => "<option value=''>منطقه</option>".listmaker_select_options("position",$condition=" AND `type`='region'",$returnArray=false),
	);

	$list['search'] = array("name","username","address");

	echo "<div class='".__FUNCTION__."_wrapper'>";
	echo listmaker_list($list);
	echo "</div>";

}

