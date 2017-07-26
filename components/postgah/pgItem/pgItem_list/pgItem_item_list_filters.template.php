
<div class="{template_name}" dir="rtl">

	<?=toggle( 'pictured_ads', 'آگهی‌های عکس‌دار', null, $rrqs=true ) ?>
	<?=toggle( 'postgah_sales', 'فروش با همکاری پستگاه', null, $rrqs=true ) ?>

	<hr>
	<script>
		$( function() {
	
			$( "#slider-range" ).slider({
				range: true,
				min: 0,
				max: 10000000,
				step: 10000,
				values: [ {range_min}, {range_max} ],
				slide: function( event, ui ) {
					val_min = ui.values[0];
					val_max = ui.values[1];
					$( "#amount" ).html( new Intl.NumberFormat().format(val_min) + " تا " + new Intl.NumberFormat().format(val_max) );
					$('input[name="price_range"]').val( val_min+'-'+val_max );
				}
			});
			
			val_min = $( "#slider-range" ).slider( "values", 0 );
			val_max = $( "#slider-range" ).slider( "values", 1 );
			$( "#amount" ).html( new Intl.NumberFormat().format(val_min) + " تا " + new Intl.NumberFormat().format(val_max) );
			$('input[name="price_range"]').val( val_min+'-'+val_max );
			
		});
	</script>

	<input type="hidden" name="price_range" value="{price_range}" rrqs="1" />

	<div for="amount">بازه قیمت ({billing_unit()['code']}):‌</div>
	<div id="amount"></div>
	<div id="slider-range"></div>


	<input type="button" value="اعمال" class="btn btn-xs btn-primary" />

</div>

