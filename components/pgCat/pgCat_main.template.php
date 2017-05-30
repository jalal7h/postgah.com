
<div class="{template_name}">
	
	<div class="head">{layer_name}</div>
	
	<div class="list">
	<?foreach( $cats as $cat ):?><!--
	 --><a class="re" href="<?= $cat->link ?>">
			<img src="<?= $cat->image ?>" alt="<?= $cat->alt ?>" title="<?= $cat->alt ?>" />
			<div><?= $cat->name ?></div>
		</a><!--
 --><?endforeach?>
	</div>

</div>

