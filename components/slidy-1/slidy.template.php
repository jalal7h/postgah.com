
<scrit src="{bysideme}/slidy.exclude.js"></scrit>

<div class="slidy" min_wh="">
	
	<div class="main">
	<?foreach( $images as $image ):?>
		<img src="<?= $image->src ?>" numb="<?= $image->numb ?>" width="<?= $image->width ?>" height="<?= $image->height ?>" />
	<?endforeach?>
	</div>
	
	<div class="tumb">
	<?foreach( $images as $image ):?>
		<img src="<?= $image->src ?>" numb="<?= $image->numb ?>" width="<?= $image->width ?>" height="<?= $image->height ?>" />
	<?endforeach?>
	</div>

</div>

