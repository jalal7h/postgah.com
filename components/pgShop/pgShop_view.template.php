
<div class="pgShop_view">

	<div class="head">به فروشگاه <b class="cl_l1"><?=$shop_name?></b> خوش آمدید.</div>

	<?foreach( $items as $item ):?><!--
	 --><a href="<?=$item['link']?>" class="re" title="<?=$item['name']?>">
			<img class="isss" src="<?=$item['image']?>"/>
			<span class="name"><?=$item['name']?></span>
			<?if( $item['cost'] ):?>
			<div class="cost"><?=$item['cost']?></div>
			<?endif?>
		</a><!--
 --><?endforeach?>
	
	<hr>
	{paging}

</div>

