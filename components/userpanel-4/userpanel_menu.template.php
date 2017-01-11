
<div class="userpanel_menu">

	<? if( user_photo($rw, true) ){ ?>
		<a class="profile_avatar" href="{_URL}/{userpanel_slug}/userprofile_form"><img src="<?=user_photo($rw, "320x800")?>" /></a>
		
	<? } else { ?>
		<div class="profile_avatar"><img src="{_URL}/image_list/avatar-not-found.png"/></div>
	<? } ?>

	<div class="links">
		<a href="{_URL}">
			<?fa_icon("015")?>
			<span><?=__('صفحه اصلی')?></span>
		</a>
		<? foreach( userpanel_menu_items() as $item ){ ?>
			<a href="{_URL}/{userpanel_slug}/<?=$item['func']?>" class="userpanel_menu_<?=$item['func']?> <?=$item['curr_class']?>" >
				<?fa_icon($item['icon'])?>
				<span><?=$item['name']?></span>
			</a>
		<? } ?>	

	</div>

</div>

