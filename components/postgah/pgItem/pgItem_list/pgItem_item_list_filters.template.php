
<div class="{template_name}" dir="rtl">

	<?=toggle( 'pictured_ads', 'آگهی‌های عکس‌دار', null, $rrqs=true ) ?>
	<?=toggle( 'postgah_sales', 'فروش با همکاری پستگاه', null, $rrqs=true ) ?>

	<hr>
	
	<input type="hidden" name="price_range" value="{price_range}" rrqs="1" />
	<div for="amount">بازه قیمت ({billing_unit()['code']}):‌</div>
	<div class="price_boxes">
		<input type="text" placeholder="از" class="price_from" value="{range_min}" />
		<input type="text" placeholder="تا" class="price_to" value="{range_max}" />
	</div>

	<input type="button" value="تایید" class="btn btn-xs btn-primary" />

</div>

