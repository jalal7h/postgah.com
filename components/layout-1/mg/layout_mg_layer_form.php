<?

# jalal7h@gmail.com
# 2017/04/30
# 1.5

function layout_mg_layer_form(){
	
	if( $layer_id = $_REQUEST['id'] ){
		$rw = table( "page_layer", $layer_id );
		$pos = $rw['pos'];
		$page_id = $rw['page_id'];
	
	} else {
		$pos = $_REQUEST['pos'];
		$page_id = $_REQUEST['page_id'];
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


	foreach( $GLOBALS['block_layers'] as $func => $name ) {
		
		$repeat = $GLOBALS['layout_block_repeat'][$func];
		
		// echo "<hr>".$func." - ".$repeat."<br>";

		// age azad hast: pak nakon
		if( $repeat == 'N' ){
			continue;
		
		// age ye edit hast: pak nakon
		} else if(  $rw  and  $rw['func'] == $func  ){
			continue;
		
		// age kolan ruye 1bar limit hast, va kolan azash nis: pak nakon
		} else if(  $repeat == 0  and  !table( 'page_layer', ['func'=>$func] )  ){
			continue;
			
		// age safhey 1dune limit hast, va dar in safhe azash nis: pak nakon
		} else if(  $repeat == 1  and  !table( 'page_layer', [ 'func'=>$func, 'page_id'=>$page_id ] )  ){
			continue;
		}

		// echo $func." - ".$repeat." - will be removed";
		unset( $GLOBALS['block_layers'][$func] );

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
				<?if( is_column('page_layer', 'hide_name') and ( $rw['func'] == 'layout_post' ) ):?>
				<div class="jtoggle_w">
					<input type="jtoggle" name="hide_name" value="<?=intval($rw['hide_name'])?>">
					<span class="title"><?=lmtc('page_layer:hide_name')?></span>
				</div>
				<?endif?>
			</div>

			<?=ff("hr")?>

			<input type="submit" class="btn btn-primary" value="<?=__('ثبت')?>" >
	
		</form>
	</fieldset>
	<?

	layout_mg_layer_form_extra( $rw );

}

