<?

function layout_mg_layer_form_extra( $rw ){

	$func_name = $rw['func']."_extra";

	if(! function_exists($func_name) ){
		echo "\n<!-- cant find function `$func_name()` -->\n";
		return true;
	
	} else {
		
		if(! $id = $_REQUEST['id'] ){
			e(__FUNCTION__,__LINE__);
		} else if(! $rw_pagelayer = table("page_layer",$id) ){
			e(__FUNCTION__,__LINE__,$id);
		}

		#
		# action
		switch( $_REQUEST['do2'] ){
			case 'save':
				call_user_func( $func_name."_save", $rw_pagelayer );
				break;
		}

		$rw_pagelayer = table("page_layer",$id);

		#
		# form
		?>
		<form method="post" action="./?page=admin&cp=<?=$_REQUEST['cp']?>&id=<?=$_REQUEST['id']?>&do=<?=$_REQUEST['do']?>&do2=save">
		<fieldset class="<?=__FUNCTION__?> <?=$func_name?>">
			<legend ><?=$GLOBALS['block_layers'][ $rw['func'] ]?></legend>
			<? $func_name($rw_pagelayer); ?>
			<? echo ff('hr'); ?>
			<center>
				<input type="button" class="submit_button" onclick="location.href='./?page=admin&cp=<?=$_REQUEST['cp']?>'" value="<?=__('بازگشت')?>"/>
				<input type="submit" class="submit_button" value="<?=__('ثبت تغييرات')?>"/>
			</center>
		</fieldset>
		</form>	
		<?

	}

}

