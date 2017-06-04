
<div class="listmaker_clicktab">
	
<?if( sizeof($list) ):?>
<?foreach( $list as $tab ):?>
	<div class="r">
		<div class="name cl_l1r_hover_i" ><?=$tab['name']?></div>
		<div class="text" ><?=$tab['text']?></div>
	</div>
<?endforeach?>
<?endif?>

</div>

