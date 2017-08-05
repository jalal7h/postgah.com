
<?if( $plans ):?>
	<?foreach( $plans as $plan ):?>
		<label class="plan_wrapper">
			<input type="radio" name="the_plan">
			<div class="name"><?=$plan['name_on_form']?></div>
			<select disabled="1" name="plan_duration_id" >
				<option value="">انتخاب نمایید</option>
				<?foreach( $plan['pd_s'] as $duration ):?>
					<option value="<?=$duration['id']?>"><?=$duration['name']." / ".billing_format($duration['cost'])?></option>
				<?endforeach?>
			</select>
			<?if( $plan['sample_page'] ):?>
				<a class="sample_page" target="_blank" href="<?=$plan['sample_page']?>">صفحه نمونه</a>
			<?endif?>
		</label>
	<?endforeach?>
<?endif?>

