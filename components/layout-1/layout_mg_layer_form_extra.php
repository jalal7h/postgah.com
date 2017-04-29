<?

# jalal7h@gmail.com
# 2017/01/07
# 1.1

function layout_mg_layer_form_extra( $rw ){

	$func_name = $rw['func']."_extra";

	if(! function_exists($func_name) ){
		echo "\n<!-- cant find function `$func_name()` -->\n";
		return true;
	
	} else {
		
		if(! $id = $_REQUEST['id'] ){
			e();
		} else if(! $rw_pagelayer = table("page_layer",$id) ){
			e( $id );
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
		<form method="post" name="<?=$func_name?>_form" action="./?page=admin&cp=<?=$_REQUEST['cp']?>&id=<?=$_REQUEST['id']?>&do=<?=$_REQUEST['do']?>&do2=save">
		<fieldset class="<?=__FUNCTION__?> <?=$func_name?>">
			<legend ><?=$GLOBALS['block_layers'][ $rw['func'] ]?></legend>
			<? $func_name($rw_pagelayer); ?>
			<? echo ff('hr'); ?>
			<input type="submit" style="margin-left:30px;" class="btn btn-primary" value="<?=__('ثبت')?>"/>
		</fieldset>
		</form>	
		<?

	}

}




