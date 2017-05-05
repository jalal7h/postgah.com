
{layout_open}

	<style>
		body {
			background-color: #eee;
		}
		.seo_rss_mega {
			direction: {lang_dir};
			padding: 50px;
		}
		.seo_rss_mega .head {
			font-size: 24px;
		    color: #666;
		    border-bottom: 1px dashed #ccc;
		    margin-bottom: 20px;
		    padding-bottom: 17px;
		}
		.seo_rss_mega a {
			display: inline-block;
			margin: 6px;
			font-family: DefaultFont;
			font-size: 18px;
			color: #555;
			background-color: #ddd;
			border-radius: 5px;
			padding: 10px 20px;
			text-decoration: none;
			line-height: 30px !important;
		}
		.seo_rss_mega a:hover {
			color: #000;
			background-color: #ccc;
		}
	</style>

	<div class="seo_rss_mega">
	<div class="head"><lang>لیست rss های سایت :‌ </lang></div>

	<?foreach( $rss_array as $rss ):?>
        <a href="<?=$rss['link']?>"><?=$rss['name']?></a>
	<?endforeach?>

	</div>

{layout_close}



