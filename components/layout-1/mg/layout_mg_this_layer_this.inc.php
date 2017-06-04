<?

# jalal7h@gmail.com
# 2017/05/04
# 1.5

function layout_mg_this_layer_this( $rw=null ){
	
	$base_url = _URL."/?page=admin&cp=".$_REQUEST['cp']."&id=".$rw['id']."&do=layer_";

	?>
	<div the_id="<?=$rw['id']?>" class="lmtlt_<?=$rw['pos']?> layout_mg_this_layer<?=( ($rw and $rw['flag']==0) ? " layout_mg_this_layer_off" : "" )?>">
		
		<? if( $rw ){ ?>

		<div class="name"><?=( $rw['name'] ? $rw['name'] : '<i style="color:#ccc; font-size:10px;">نامشخص</i>' )?></div>
		<div class="tools">
			<a title="<?=__('ویرایش')?>" class="form" href="<?=$base_url?>form"><icon></icon></a>
			<a title="<?=__('فعال/غیرفعال')?>" class="flag<?=( $rw['flag'] == 0 ? ' off' : '' ) ?>" layer_id="<?=$rw["id"]?>" ><icon></icon></a>
			
			<? if( $rw['id'] > 100 ){ ?>
				<a title="<?=__('حذف')?>" text_remove="<?=__("آیا مایل به حذف هستید؟")?>" class="remove" layer_id="<?=$rw["id"]?>" ><icon></icon></a>
			<? } ?>

		</div>

		<? } ?>

	</div>
	<?

}

