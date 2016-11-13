<?

# jalal7h@gmail.com
# 2016/08/16
# 1.1

function layout_mg_this( $rw ){
	
	?>
	<a name="layout_<?=$rw['id']?>"></a>
	<div class="this">
		
		<div class="the_name">
			<a class="name" href="<?=layout_page_link( $rw )?>" target="_blank"><?=$rw['name']?></a>
			<form class="rename_form" method="post" >
				<input type="hidden" name="id" value="<?=$rw['id']?>" />
				<input type="text" name="name" value="<?=$rw['name']?>"/>
				<input type="submit" class="submit_button" value="<?=__('ثبت')?>"/>
			</form>
			<div class="rename_button_container">
				<a href="#" class="rename_button"><?=__('تغییر نام')?></a>
			</div>
		</div>
		
		<? if( is_column('page_layer', 'pos') ){ ?>
		<div class="lmtl">
			
			<? if( layout_pos_top ){ ?>
			<div class="top" >
				<? layout_mg_this_layer( $rw['id'], "top" ) ?>
			</div>
			<? } ?>

			<div class="middle">
				
				<? if( layout_pos_right ){ ?>
					<div class="right"><? layout_mg_this_layer( $rw['id'], "right" ) ?></div>
				<? } ?>
				
				<? if( layout_pos_center ){ ?>
					<div class="center"><? layout_mg_this_layer( $rw['id'], "center" ) ?></div>
				<? } ?>

				<? if( layout_pos_left ){ ?>
					<div class="left"><? layout_mg_this_layer( $rw['id'], "left" ) ?></div>
				<? } ?>

			</div>

			<? if( layout_pos_top ){ ?>
			<div class="bottom">
				<? layout_mg_this_layer( $rw['id'], "bottom" ) ?>
			</div>
			<? } ?>

		</div>
		
		<? } else { ?>
			<div class="alone"><? layout_mg_this_layer( $rw['id'] ) ?></div>
		<? } ?>

		<a class="the_meta" href="<?=_URL?>/?page=admin&cp=<?=$_REQUEST['cp']?>&do=meta_form&id=<?=$rw['id']?>">
			<icon></icon>
		</a>

		<? if( $rw['id'] > 1 ){ ?>
		<a onclick="if(!confirm('<?=__('آیا مایل به حذف هستید؟')?>'))return false;" class="the_remove_button" href="<?=_URL?>/?page=admin&cp=<?=$_REQUEST['cp']?>&do=remove&id=<?=$rw['id']?>">
			<icon></icon>
		</a>
		<? } ?>

	</div>
	<?

}

