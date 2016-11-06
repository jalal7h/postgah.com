<?
$GLOBALS['cmp']['layout_mg'] = 'طرح صفحه';
$GLOBALS['cmp-icon']['layout_mg'] = '121';

function layout_mg(){

	#
	# action
	switch( $_REQUEST['do'] ){
		
		case 'remove':
			layout_mg_remove();
			break;

		case 'save':
			layout_mg_save();
			break;

		case 'meta_form':
			return layout_mg_meta_form();

		case 'meta_save':
			layout_mg_meta_save();
			break;

		case 'layer_form':
			return layout_mg_layer_form();

		case 'layer_saveNew':
			layout_mg_layer_saveNew();
			break;

		case 'layer_saveEdit':
			layout_mg_layer_saveEdit();
			break;

		case 'layer_prio':
			listmaker_prio( array('page_layer','same'=>'page_id') );
			break;

		case 'layer_remove':
			listmaker_remove('page_layer');
			break;

		case 'layer_flag':
			listmaker_flag('page_layer');
			break;

	}

	#
	# list
	?>
	<div class="layout_mg">
		<?
		if(! $rs = dbq(" SELECT * FROM `page` WHERE 1 ORDER BY `id` ASC ") ){
			e(__FUNCTION__,__LINE__);
		
		} else while($rw = dbf($rs)){
			layout_mg_this($rw);
		}

		echo ff('hr');

		?>
		<div></div>
		<form action="./?page=admin&cp=<?=$_REQUEST['cp']?>&do=save" method="post" class="this new" >
			<input type="text" name="name" placeholder="<?=__('صفحه جدید ..')?>" />
			<input type="submit" class="submit_button" value="<?=__('ثبت')?>"/>
		</form>
	</div>
	<?

}



