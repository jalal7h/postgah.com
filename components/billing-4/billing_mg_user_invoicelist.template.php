
<div class='{template_name}'>

	<div class="info" >
		
		<div class="name" >
			<span><?= $user->name ?> &lt;<a href="mailto:<?= $user->email ?>"><?= $user->email ?></a>&gt;</span>
		</div>
		
		<div class="credit" >
			<span><lang>پرداختی</lang>:</span>
			<span><?= $user->credit ?></span>
		</div>
		
		<div class="payments" >
			<span><lang>اعتبار</lang>:</span>
			<span><?= $user->payments ?></span>
		</div>

	</div>

	<div class="invoices">
	<?if(! sizeof( $invoices ) ):?>
		<?= convbox( __("هنوز صورتحسابی برای این کاربر ثبت نشده است.") ) ?>

	<?else:?>
		
		<div class="re head" ><!--
		 --><div class="numb">#</div><!--
		 --><div class="cost"><?= lmtc('billing_invoice:cost') ?></div><!--
		 --><div class="method"><?= lmtc('billing_invoice:method') ?></div><!--
		 --><div class="transaction"><?= lmtc('billing_invoice:transaction') ?></div><!--
		 --><div class="date"><?= lmtc('billing_invoice:date') ?></div><!--
	 --></div>

		<?foreach( $invoices as $invoice ):?>
		<div class="re"><!--
		 --><div class="numb"><a href="<?=$invoice->link?>" target="_blank"><?= $invoice->id ?></a></div><!--
		 --><div class="cost"><?= $invoice->cost ?></div><!--
		 --><div class="method"><?= $invoice->method ?></div><!--
		 --><div class="transaction"><?= $invoice->transaction ?></div><!--
		 --><div class="date"><?= $invoice->date ?></div><!--
	 --></div>
		<?endforeach?>

		{paging}

	<?endif?>
	</div>


</div>
