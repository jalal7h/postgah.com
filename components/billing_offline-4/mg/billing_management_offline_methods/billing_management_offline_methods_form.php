<?

# jalal7h@gmail.com
# 2016/11/27
# 1.0

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
			<input class="btn btn-primary" type="submit" value="<?=__("ثبت")?>"/>
		</div>
	</form>
	<?

}
