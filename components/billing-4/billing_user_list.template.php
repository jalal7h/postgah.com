
<table class="billing_userpanel_list">
	
	<tr>
		<th>#</th>
		<th>{lmtc('billing_invoice:cost')}</th>
		<th>{lmtc('billing_invoice:date_created')}</th>
		<th>{lmtc('billing_invoice:date')}</th>
		<th>{lmtc('billing_invoice:method')}</th>
		<th>{lmtc('billing_invoice:transaction')}</th>
		<th></th>
	</tr>

	<tr><td colspan="4"></td></tr>

	<?if(! sizeof($records) ):?>
		<tr><th colspan="7" class="convbox" ><lang>هنوز صورتحسابی برای شما ثبت نشده است.</lang></th></tr>
	<?else:?>
	<?foreach( $records as $rw ):?>

		<tr>
			
			<th class="ltr"><?=$rw['id']?></th>
			<td><?=billing_format($rw['cost'])?></td>
			<td dir="ltr" align="center"><?=substr(UDate($rw['date_created']),0,16)?></td>

			<?if( $rw['date'] ):?>
				<td dir="ltr" align="center"><?=substr(UDate($rw['date']),0,16)?></td>
				<td align="center" title="<?=$rw['method_title']?>"><?=$rw['method_name']?></td>
				<td dir="ltr" align="center"><?=$rw['transaction']?></td>
				<td align="center"><span class="paid_invoice"><lang>پرداخت شده</lang></span></td>
			
			<?else:?>
				<td dir="ltr" align="center"><span class="none">- - -</span></td>
				<td align="center"><span class="none">- - -</span></td>
				<td dir="ltr" align="center"><span class="none">- - -</span></td>
				<td align="center"><a class="payment_link" href="<?=billing_invoiceLink($rw)?>"><lang>پرداخت نشده</lang></a></td>
			<?endif?>

		</tr>

	<?endforeach?>
	<?endif?>

</table>

{paging}

<div class="billing_userpanel_credit" >
	<span><lang>اعتبار شما</lang> : </span>
	<span style="font:bold 16px font01;">{credit}</span>
	<a class="btn btn-primary" href="{_URL}/<?=Slug::get('page',14)?>/payment" ><lang>شارژ حساب</lang></a>
</div>


