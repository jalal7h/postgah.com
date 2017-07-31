
<div class="{template_name}" dir="rtl">

	<?=toggle( 'pictured_ads', 'آگهی‌های عکس‌دار', null, $rrqs='a' ) ?>
	<?=toggle( 'postgah_sales', 'فروش با همکاری پستگاه', null, $rrqs='a' ) ?>

	<hr>
	
	<input type="hidden" name="price_range" value="{price_range}" rrqs="a" />
	<div for="amount">بازه قیمت ({billing_unit()['code']}):‌</div>
	<div class="price_boxes">
		<input type="text" placeholder="از" class="price_from" value="{range_min}" />
		<input type="text" placeholder="تا" class="price_to" value="{range_max}" />
	</div>
	<script>$('.price_from, .price_to').number( true, 0 );</script>

	<input type="button" value="تایید" class="btn btn-xs btn-primary" />

</div>

