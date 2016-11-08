<?

# jalal7h@gmail.com
# 2016/11/08
# 1.1

# list of payments done by user
/*README*/


function billing_userpanel_list(){
	
	ob_start();

	if(! $user_id = user_logged() ){
		ed();
	}
	
	$tdd = 5;
	$p = intval($_REQUEST['p']);
	$stt = $tdd * $p;
	
	$query = " SELECT * FROM `billing_invoice` WHERE `user_id`='$user_id' AND ( `date`>0 OR `order_table`!='' ) ORDER BY `date_created` DESC LIMIT $stt,$tdd ";

	if(! $rs = dbq($query) ){
		e();
	
	} else {
		?>
		<table class="billing_userpanel_list">
		<tr>
			<th>#</th>
			<th><?=lmtc('billing_invoice:cost')?></th>
			<th><?=lmtc('billing_invoice:date_created')?></th>
			<th><?=lmtc('billing_invoice:date')?></th>
			<th><?=lmtc('billing_invoice:method')?></th>
			<th><?=lmtc('billing_invoice:transaction')?></th>
			<th></th>
		</tr>
		<tr><td colspan="4"></td></tr>
		<?
		
		if( dbn($rs) == 0 ){
			echo "<tr><th colspan=7 class='convbox' >".__("هنوز صورتحسابی برای شما ثبت نشده است.")."</th></tr>";
	
		} else while( $rw = dbf($rs) ){
			$paymentmethod_name = billing_method_name($rw['method']);
			?>
			<tr>
				<th class="ltr"><?=$rw['id']?></th>
				<td><?=billing_format($rw['cost'])?></td>
				<td dir="ltr" align="center"><?=substr(u2vaght($rw['date_created']),0,16)?></td>

				<? if( $rw['date'] ){ ?>
					<td dir="ltr" align="center"><?=substr(u2vaght($rw['date']),0,16)?></td>
					<td align="center"><?=$paymentmethod_name?></td>
					<td dir="ltr" align="center"><?=( $rw['method']=='wallet' ? '<span class="none">- - -</span>' : strtoupper($rw['transaction']) )?></td>
					<td align="center"><span class="paid_invoice"><?=__('پرداخت شده')?></span></td>
				
				<? } else { ?>
					<td dir="ltr" align="center"><span class="none">- - -</span></td>
					<td align="center"><span class="none">- - -</span></td>
					<td dir="ltr" align="center"><span class="none">- - -</span></td>
					<td align="center"><a target="_blank" class="payment_link" href="<?=_URL?>/?page=<?=$_REQUEST['page']?>&do=billing_userpanel_payment&invoice_id=<?=$rw['id']?>"><?=__('پرداخت نشده')?></a></td>
				
				<? } ?>

			</tr>
			<?

		}

		?>
		</table>
		<?
	}

	#
	# the paging links
	$link = "./?page=".$_REQUEST['page']."&do=".$_REQUEST['do']."&p=";
	echo listmaker_paging( $query, $link, $tdd );

	# 
	# the credit bar
	billing_userpanel_credit();
	

	$content = ob_get_contents();
	ob_end_clean();
	layout_post_box( __("صورتحساب ها"), $content, $allow_eval=false, $framed=1 );

}



