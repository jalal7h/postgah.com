<?

# jalal7h@gmail.com
# 2016/12/11
# 1.2

function billing_management_user_invoicelist(){
	
	if(! $user_id = $_REQUEST['id'] ){
		ed();
	}
	
	$tdd = 5;
	$p = intval($_REQUEST['p']);
	$stt = $tdd * $p;
	
	billing_management_user_activity( $user_id );
	
	echo "<div class='".__FUNCTION__."'>";
		
	if(! $rs = dbq(" SELECT * FROM `billing_invoice` WHERE `date`>0 AND `user_id`='$user_id' AND `method`!='wallet' ORDER BY `date` DESC LIMIT $stt,$tdd ") ){
		e(__LINE__);
	
	} else if( dbn($rs) == 0 ){
		echo convbox( __("هنوز صورتحسابی برای شما ثبت نشده است.") );
	
	} else {
		
		echo "<div class=r >
			<div>#</div>
			<div>".lmtc('billing_invoice:cost')."</div>
			<div>".lmtc('billing_invoice:method')."</div>
			<div>".lmtc('billing_invoice:transaction')."</div>
			<div>".lmtc('billing_invoice:date')."</div>
		</div>";
		
		while($rw = dbf($rs)){
			
			$paymentmethod_name = billing_method_name( $rw['method'] );
			
			echo "<div class=r >
				<div>".$rw['id']."</div>
				<div>".billing_format($rw['cost'])."</div>
				<div>".$paymentmethod_name."</div>
				<div>".$rw['transaction']."</div>
				<div>".substr(UDate($rw['date']),0,16)."</div>
			</div>";
		}

	}

	echo "</div>";

	$link = "./?page=".$_REQUEST['page']."&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&do=".$_REQUEST['do']."&id=".$user_id."&p=";

	echo listmaker_paging($query, $link, $tdd);

}





