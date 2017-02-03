
<div class="userpanel_headmenu logged">
	
	<a href="{_URL}/{userpanel_slug}" class="box cl_l2r cl_l1r_hover_i">
 		<icon></icon>
 		{name}
 		<div class="circle cl_l2r" style="background-image:url('{photo}')" ></div>
 	</a>

 	<menu>
 		<? foreach( userpanel_menu_items() as $item ) { ?>
 			<a class="cl_l2r cl_l2_i cl_l1r_hover_i" href="{_URL}/{userpanel_slug}/<?=$item['slug']?>" >
				<?fa_icon($item['icon'])?>
				<span><?=$item['name']?></span>
 			</a>
 		<? } ?>
 	</menu>

 	<? if( is_component('billing') ){ ?>
		<div class="links">
	 		<a class="cl_l2_i cl_l1_hover" href="">
	 			<?=__('موجودی شما')?> : {credit}
	 		</a>
	 	</div>
	<? } ?>

</div>

