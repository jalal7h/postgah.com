<?

# jalal7h@gmail.com
# 2016/07/09
# 1.1

function billing_management_offline_list(){
	
	#
	# action
	switch ($_REQUEST['do']) {
		
		case 'remove':
			billing_management_offline_list_remove();
			break;
		
		case 'flag':
			billing_management_offline_list_flag();
			break;
	}

	#
	# list
	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `billing_invoice` WHERE `method` LIKE 'manual%' AND `date`".($_REQUEST['archive']==0 ?'=0' :'!=0' )." ORDER BY `id` ASC ";
	$list['tdd'] = 12;
	
	$list['paging_url'] = '_URL."/?page=admin&cp=".$_REQUEST["cp"]."&func=".$_REQUEST[\'func\']."&func2=".$_REQUEST[\'func2\']."&archive=".$_REQUEST[\'archive\']';

	$list['remove_url'] = '_URL."/?page=admin&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]."&func2=".$_REQUEST["func2"]."&archive=".$_REQUEST["archive"]."&do=remove&id=".$rw["id"]';
	$list['remove_prompt'] = '__("آیا مایل به حذف این پرداخت هستید?")';

	$list['list_array'] = array (
		array("head"=>__("کاربر"), "content"=>'table("user",$rw["user_id"], "name")'),
		array("head"=>lmtc("billing_invoice:cost"), "content"=>'billing_format($rw[\'cost\'])','attr'=>array('align'=>'center')),
		array("head"=>__("بانک"), "content"=>'table("billing_method",$rw["method"],"c1","method")'),
		
		array("head"=>lmtc("billing_invoice:date"), "content"=>'substr(U2Vaght( ($rw[\'date\']==0 ?explode(\'::\',$rw[\'transaction\'])[1] :$rw[\'date\']) ),0,10)','attr'=>array('align'=>'center','dir'=>'ltr')),
		
		array("head"=>__("شماره تراکنش / سریال"), "content"=>'( $rw[\'date\']==0 ?explode(\'::\',$rw[\'transaction\'])[0] :$rw[\'transaction\'] )','attr'=>array('align'=>'center','dir'=>'ltr')),

	);

	if($_REQUEST['archive']==0){
		$list['setflag_url'] = '_URL."/?page=admin&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]."&func2=".$_REQUEST["func2"]."&archive=".$_REQUEST["archive"]."&do=flag&id=".$rw["id"]';
	}
	// $list['linkTo'][] = array(
	// 	'url' => '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=tour_management_list&p=".$_REQUEST["p"]."&do=setHotel&id=".$rw["id"]',
	// 	'name' => 'هتلها',
	// 	'width' => 35,
	// );
	
	if(! $rs0 = dbq(" SELECT DISTINCT `method` FROM `billing_invoice` WHERE `method` LIKE 'manual%' ") ){
		e();
	
	} else if(! dbn($rs0) ){
		//

	} else {
		
		while( $rw0 = dbf($rs0) ){
			$bank_str_offline_options.= "<option value='".$rw0['method']."'>".table('billing_method',$rw0['method'],'c1','method')."</option>";
		}

		$list['paging_select'] = array(
			'method' => "<option value=''>.. ".__('بانک')." ..</option>".$bank_str_offline_options,
		);

	}

	echo listmaker_list($list);
	
}










