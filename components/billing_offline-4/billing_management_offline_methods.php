<?

function billing_management_offline_methods(){
	
	switch($_REQUEST['do']){
		
		case 'form':
			return billing_management_offline_methods_form();

		case 'saveNew':
			billing_management_offline_methods_saveNew();
			break; 

		case 'saveEdit':
			billing_management_offline_methods_saveEdit();
			break;

		case 'remove':
			billing_management_offline_methods_remove();
			break;
	}

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

	echo "<a class='submit_button' href='./?page=admin&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&func2=".$_REQUEST['func2']."&do=form' class='new'>".__('ثبت روشی پرداخت جدید')."</a>";

	echo "</div>";
}

function billing_management_offline_methods_form(){
	
	if(!$id = $_REQUEST['id']){
		// new
	
	} else if(!$rw = table("billing_method", $id)){
		e();
		return false;
	}

	?>
	<form method="post" class="billing_management_offline_methods_form" action="./?page=admin&cp=<?=$_REQUEST['cp']?>&func=<?=$_REQUEST['func']?>&func2=<?=$_REQUEST['func2']?>&<?=($id?"do=saveEdit&id=".$id:"do=saveNew")?>">
		<div>
			<span><?=__("نام بانک")?> :‌</span>
			<input type="text" name="c1" value="<?=$rw['c1']?>"/>
		</div>
		<div>
			<span><?=__("شماره حساب")?> :</span>
			<input class="numeric" type="text" name="c2" value="<?=$rw['c2']?>"/>
		</div>
		<div>
			<span><?=__("شماره کارت")?> :‌</span>
			<input class="numeric" type="text" name="c3" value="<?=$rw['c3']?>"/>
		</div>
		<hr>
		<div>
			<input class="submit_button" type="submit" value="<?=__("ثبت")?>"/>
		</div>
	</form>
	<?

}

function billing_management_offline_methods_saveNew(){
	
	if(! $rs0 = dbq(" SELECT `method` FROM `billing_method` WHERE `method` LIKE 'manual%' ORDER BY `id` DESC LIMIT 1 ") ){
		return e();
	
	} else if(! dbn($rs0) ){
		$method = "manual1";
	
	} else {
		$method = dbr($rs0, 0, 0);
		$method = substr($method, 6);
		$method = "manual".($method+1);
	}

	if(! dbs( 'billing_method', ['method'=>$method,'c1','c2','c3','c5'=>'offline'] ) ){
		e();
	
	} else {
		return true;
	}

}

function billing_management_offline_methods_saveEdit(){
	
	if(! $id = $_REQUEST['id'] ){
		return e();
	
	} else if(! $rw = table("billing_method", $id) ){
		e();
	
	} else if(! dbs( 'billing_method', ['c1','c2','c3'], ['id'] ) ){
		e();
	
	} else {
		return true;
	}

	return false;

}

function billing_management_offline_methods_remove(){
	
	if(! $id = $_REQUEST['id'] ){
		return e();
	
	} else if(! $rw = table("billing_method", $id) ){
		e();
	
	} else if(! dbs('billing_method', ['hide'=>'1'], ['id'] ) ){
		e();
	
	} else {
		return true;
	}

	return false;

}






