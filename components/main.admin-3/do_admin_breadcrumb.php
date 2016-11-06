<?

# jalal7h@gmail.com
# 2016/07/10
# 1.0

function do_admin_breadcrumb(){
	?>
	<div class="breadcrumb">
		
		<a class="home" href="<?=_URL?>"><?=setting('main_title')?></a>
		<a class="etc" href="<?=_URL?>/?page=admin"><?=__('پیشخوان')?></a>

		<? if( $cp = $_REQUEST['cp'] ){ ?>

			<? if( array_key_exists($cp, $GLOBALS['cmp']) ){ ?>
				<a class="etc" href="<?=_URL?>/?page=admin&cp=<?=$cp?>"><?=$GLOBALS['cmp'][$cp]?></a>

			<? } else if( $cp=='cat_management' and $_REQUEST['l']!='' ) { ?>
				<a class="etc" href="<?=_URL?>/?page=admin&cp=<?=$cp?>"><?=$GLOBALS['cat_items'][ $_REQUEST['l'] ][0]?></a>

			<? } else if( $cp=='linkify_mg' and $_REQUEST['l']!='' ) { ?>
				<a class="etc" href="<?=_URL?>/?page=admin&cp=<?=$cp?>"><?=$GLOBALS['linkify_items'][ $_REQUEST['l'] ]['name']?></a>

			<? } ?>

		<? } ?>

	</div>
	<?

}


