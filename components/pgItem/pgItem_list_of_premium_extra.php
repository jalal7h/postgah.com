<?

function pgItem_list_of_premium_extra( $rw_pagelayer ){

	$data = json_decode($rw_pagelayer['data']);
	$data->number_of_rows;
	$number_of_rows = intval( $data->number_of_rows );

	if(! $number_of_rows ){
		$number_of_rows = 3;
	}

	?>
	<div>
		<span>تعداد : </span>
		<select id="<?=__FUNCTION__?>_select" name="number_of_rows">
		<?
			for( $i=1; $i<=20; $i++ ){
				echo "<option value='".$i."'>".$i." ردیف</option>\n";
			}
		?>
		</select>

		<script> $('#<?=__FUNCTION__?>_select').val('<?=$number_of_rows?>'); </script>

	</div>
	<?

}







