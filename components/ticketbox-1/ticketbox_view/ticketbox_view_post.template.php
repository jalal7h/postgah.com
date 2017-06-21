
<div class="post" post_id="<?= $post->id ?>" >
	
	<?if( is_admin() ):?><div class="remove" text_remove="<lang>آیا مایل به حذف هستید</lang>" ></div><?endif?>
	
	<div class="info <?= $post->user_type ?>" >
		
		<?= $post->user_avatar ?>
		
		<div class="user">
			
			<?if( is_admin() ):?>
				<a href="<?= user_loginLink($post->user_id) ?>"><?= $post->user_name ?></a>
			
			<?else:?>
				<?= $post->user_name ?>
			<?endif?>

		</div>

		<div class="date" title="<?= UDateNClock($post->date_created) ?>"><?= time_inword($post->date_created) ?></div>

	</div><!--
	
 --><div class="text"><?= $post->text ?></div>

</div>



