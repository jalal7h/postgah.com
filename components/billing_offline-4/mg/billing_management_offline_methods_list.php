<?

# jalal7h@gmail.com
# 2016/11/27
# 1.0

function billing_management_offline_methods_list(){
	
	echo "<div class='".__FUNCTION__."'>";
	
	$list['query'] = " SELECT * FROM `billing_method` WHERE `hide`='0' AND `c5`='offline' ORDER BY `id` DESC ";
	$list['target_url'] = '_URL."/?page=admin&cp=".$_REQUEST[\'cp\']."&func=".$_REQUEST[\'func\']."&func2=".$_REQUEST[\'func2\']."&do=form&id=".$rw["id"]';
	$list['remove_url'] = '_URL."/?page=admin&cp=".$_REQUEST[\'cp\']."&func=".$_REQUEST[\'func\']."&func2=".$_REQUEST[\'func2\']."&do=remove&id=".$rw["id"]';
	$list['remove_prompt'] = '__("آیا مایل به حذف هستید?")';
	$list['list_array'] = array (
		array("head"=>__("نام بانک"), "content" => '"<b>".$rw[\'c1\']."</b> <span style=color:#bbb>(".billing_format(dbr(dbq(" SELECT SUM(`cost`) FROM `billing_invoice` WHERE `method`=\'".$rw[\'method\']."\' "),0,0))." '.__('دریافتی').')</span>"' ),
		array("head"=>__("شماره حساب"), "content" => '$rw[\'c2\']' ,"attr" => array("align" => 'center',"dir" => _rtl)),
		array("head"=>__("شماره کارت"), "content" => '$rw[\'c3\']' ,"attr" => array("align" => 'center',"dir" => _rtl)),
	);
	echo listmaker_list($list);

	echo "<a class='btn btn-primary' href='./?page=admin&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&func2=".$_REQUEST['func2']."&do=form' class='new'>".__('ثبت روش پرداخت جدید')."</a>";

	echo "</div>";

}









