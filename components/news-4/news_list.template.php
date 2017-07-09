
	<div class="{template_name}"><!--
 --><?foreach( $news_list as $news ):?><!--
		
	 --><div class="re<?= ( $news->image ? '' : ' no_image' ) ?>" >
		 	<a href="<?= $news->link ?>" >
				<?if( $news->image ):?><img src="<?= $news->image ?>"/><?endif?>
				<div class="info">
					<div class="cat cl_l1"><?= $news->cat ?></div>
					<div class="date"><?= $news->date ?></div>
					<div class="name"><?= $news->name ?></div>
				</div>
			</a>
			<div class="social"><?= $news->social ?></div>
		</div><!--

 --><?endforeach?><!--
 --></div>

 	<hr>

 	{paging}
