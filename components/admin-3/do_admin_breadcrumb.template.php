
<div class="breadcrumb">
	
	<a class="home" href="{_URL}"><?=setting('main_title')?></a>
	<a class="etc" href="{_URL}/admin"><lang>پیشخوان</lang></a>

	<? foreach( $links as $link ): ?>
		<a href="<?=$link[0]?>"><?=$link[1]?></a>
	<? endforeach ?>

</div>

