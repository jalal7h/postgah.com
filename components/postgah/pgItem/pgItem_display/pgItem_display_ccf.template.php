
<div class="pgItem_display_ccf">
<?foreach($records as $record ):?>
	<? list( $name, $value ) = $record; ?>
	<div class="re">
		<div class="name"><?=$name?></div><!--
	 --><div class="value">
		<?if( is_array($value) ):?>
			<?foreach($value as $value_this):?><!--
			 --><div class="checkbox_node"><?=$value_this?></div><!--
		 --><?endforeach?>
		<?else:?>
			<?=$value?>
		<?endif?>
		</div>
	</div>
<?endforeach?>
</div>

