<?

# jalal7h@gmail.com
# 2016/07/10
# 1.0

function do_admin_breadcrumb(){
	
	?>
	<div class="breadcrumb">
		<a class="home" href="<?=_URL?>"><?=setting('main_title')?></a>
		<a class="etc" href="<?=_URL?>/admin"><?=__('پیشخوان')?></a>
		<?

		if( $cp = $_REQUEST['cp'] ){

			if( array_key_exists( $cp, $GLOBALS['cmp'] ) ){
				?><a href="<?=_URL?>/admin/<?=substr($cp,0,-3)?>"><?=$GLOBALS['cmp'][$cp]?></a><?

			} else if( $cp == 'cat_mg' and $_REQUEST['l'] != '' ) {
				?><a href="<?=_URL?>/admin/<?=substr($cp,0,-3)?>"><?=cat_detail( $_REQUEST['l'] )['name']?></a><?

			} else if( $cp == 'linkify_mg' and $_REQUEST['l'] != '' ) {
				?><a href="<?=_URL?>/admin/<?=substr($cp,0,-3)?>"><?=$GLOBALS['linkify_items'][ $_REQUEST['l'] ]['name']?></a><?
			}

			$func_bc = substr($cp,0,-3).'_breadcrumb';
			if( function_exists($func_bc) ){
				$func_bc();
			}
			
		}

	?></div><?

}





