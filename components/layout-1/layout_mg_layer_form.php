<?

# jalal7h@gmail.com
# 2016/08/30
# 1.3

function layout_mg_layer_form(){
	
	if( $layer_id = $_REQUEST['id'] ){
		$rw = table( "page_layer", $layer_id );
		$pos = $rw['pos'];
	
	} else {
		$pos = $_REQUEST['pos'];
	}
	
	if( in_array( $pos, ['left','right'] ) ){
		if( sizeof($GLOBALS['block_layers_side']) ){
			$GLOBALS['block_layers'] = array_merge( $GLOBALS['block_layers'], $GLOBALS['block_layers_side'] );
		}
		
	} else {
		if( sizeof($GLOBALS['block_layers_center']) ){
			$GLOBALS['block_layers'] = array_merge( $GLOBALS['block_layers'], $GLOBALS['block_layers_center'] );
		}
	}

	asort( $GLOBALS['block_layers'] );

	?>
	<fieldset class="<?=__FUNCTION__?>">
		<legend><?=( $rw ? __("تغییر نوع لایه") : __("ايجاد لایه جديد") )?></legend>
		<form action="./?page=admin&cp=<?=$_REQUEST['cp']?>&page_id=<?=$_REQUEST['page_id']?>&do=layer_save<?=($rw?"Edit&id=".$layer_id:"New")?>&pos=<?=$_REQUEST['pos']?>" method="post">
			
			<select name="func" >
				<option value="">.. <?=__('نوع لایه')?> ..</option>
				<?
				foreach($GLOBALS['block_layers'] as $func => $name){
					echo '<option value="'.$func.'">'.$name.'</option>';
				}
				?>
			</select>
			<? if($rw){ ?>
				<script type="text/javascript">
					$('.<?=__FUNCTION__?> select[name="func"]').val('<?=$rw['func']?>');
				</script>
			<? } ?>

			<div>
				<input type="text" placeholder="<?=__('عنوان لایه')?>" name="name" value="<?=$rw['name']?>" >
				<? if( is_column( 'page_layer', 'hide_name' ) ){ ?>
				<div class="jtoggle_w">
					<input type="jtoggle" name="hide_name" value="<?=intval($rw['hide_name'])?>">
					<span class="title"><?=lmtc('page_layer:hide_name')?></span>
				</div>
				<? } ?>
			</div>

			<?=ff("hr")?>

			<input type="submit" class="submit_button" value="<?=__('ثبت')?>" >
	
		</form>
	</fieldset>
	<?

	layout_mg_layer_form_extra( $rw );
}
