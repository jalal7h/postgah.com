<?if( sizeof($cats) ):?>

<script>
	var _PAGE = '{_PAGE}';
	var ccf_main_cat_id = '{cat_id}';
</script>

<div class="ccf_displayFilters">
<?foreach( $cats as $cat_records ):?>
	<div class="cat">
		<?foreach( $cat_records as $record ):?>
			<div class="element<?=$record['any_checked']?>">
				<div class="head"><?=$record['name']?> : </div>
				<?foreach( $record['option'] as $option ):?>
					<label class="option_container">
						<input type="checkbox" value="1" name="<?=$option['name']?>" <?=$option['checked']?> />
						<span class="noselect"><?=$option['option']?></span>
					</label>
				<?endforeach?>
				<a href="#" class="more">بیشتر</a>
			</div>
		<?endforeach?>
	</div>
<?endforeach?>
</div>

<?endif?>