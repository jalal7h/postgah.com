<?

# jalal7h@gmail.com
# 2015/10/17
# Version 1.1.0

function billing_management_users_invoicelist(){
	
	if(! $user_id = $_REQUEST['id'] ){
		die();
	}
	
	$tdd = 5;
	$p = intval($_REQUEST['p']);
	$stt = $tdd * $p;
	
	billing_management_users_activity( $user_id );
	
	echo "<div class='".__FUNCTION__."'>";
	
	$query = " SELECT * FROM `billing_invoice` WHERE `date`>0 AND `user_id`='$user_id' AND `method`!='wallet' ORDER BY `date` DESC LIMIT $stt,$tdd ";
	
	if(!$rs = dbq($query)){
		e(__LINE__);
	
	} else if(dbn($rs)==0){
		echo "<div class='convbox' >هنوز صورتحسابی برای شما ثبت نشده است.</div>";
	
	} else {
		
		echo "<div class=r >
			<div>#</div>
			<div>مبلغ</div>
			<div>روش پرداخت</div>
			<div>سریال پرداخت</div>
			<div>تاریخ</div>
		</div>";
		
		while($rw = dbf($rs)){
			
			$paymentmethod_name = billing_method_name( $rw['method'] );
			
			echo "<div class=r >
				<div>".$rw['id']."</div>
				<div>".number_format($rw['cost'])." تومان</div>
				<div>".$paymentmethod_name."</div>
				<div>".$rw['transaction']."</div>
				<div>".substr(u2vaght($rw['date']),0,16)."</div>
			</div>";
		}

	}

	echo "</div>";

	$link = "./?page=".$_REQUEST['page']."&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&do=".$_REQUEST['do']."&id=".$user_id."&p=";

	echo listmaker_paging($query, $link, $tdd);
}





