
<form class="{template_name}" action="{_URL}/?page={page}&do={do}&do2={do2}&invoice_id={invoice_id}&do3=save" method="post">
	
	<?= token_make(); ?>

	<h1><lang>فرم پرداخت بانکی</lang></h1>
	
	<div>
		<span><lang>بانک</lang>: </span>
		<input type="text" readonly="1" value="{method_name}" />
	</div>
	
	<div>
		<span><?=lmtc('billing_invoice:cost')?> : </span>
		<input type="text" readonly="1" value="{cost}" />
	</div>
	
	<div>
		<span><lang>شماره تراکنش / سریال</lang>: </span>
		<input type="text" dir="ltr" name="transaction" alert="<lang>لطفا شماره تراکنش / سریال را وارد کنید</lang>" id="transaction" />
	</div>

	<div>
		<span>{lmtc('billing_invoice:date')}:‌ </span>
		<input type="text" class="calendar-fa" alert="<lang>لطفا تاریخ پرداخت را وارد کنید</lang>" name="date" />
	</div>


	<div>
	<hr>
		<span>&nbsp;</span>
		<input type="submit" class="btn btn-primary" value="<lang>ثبت پرداخت</lang>"/>
	</div>
</form>

<script> $('#transaction').focus(); </script>


