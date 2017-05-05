
<div class="tallfooter_seo">

	<?foreach( $rss_array as $rss ):?>
		<a href="<?=$rss['link']?>" title="<?=$rss['name']?> RSS" class="fa fa-rss"></a>
	<?endforeach?>

	<a href="{_URL}/sitemap.xml" title="Sitemap" class="fa fa-sitemap"></a>

</div>

