<?

# jalal7h@gmail.com
# 2016/12/31
# 1.0

$GLOBALS['layout-metatag'] = array(
	'meta_title',
	'meta_kw',
	'meta_desc',
);

function layout_mg_meta_form(){
	
	switch ($_REQUEST['do2']) {
				
		case 'meta_save':
			layout_mg_meta_save();
			break;
		
	}

	if(! $id = $_REQUEST['id'] ){
		e();
	
	} else if(! $rw = table("page", $id) ){
		e();
	
	} else {
		?>
		<form name="layout_mg_meta_form" class="layout_mg_meta_form" method="post" action="./?page=admin&cp=<?=$_REQUEST['cp']?>&do=<?=$_REQUEST['do']?>&id=<?=$_REQUEST['id']?>&do2=meta_save">
			
			<div class="head"><?=__('جزئیات صفحه %%', [ table('page',$id,'name') ] )?></div>

			<? if( $id != 1 ){ ?>
			<div class="slug_div">
				<span><?=__('آدرس صفحه')?> ..</span>
				<div><input name="slug" type="text" value="<?=layout_link($rw)?>" /></div>
			</div>
			<hr>
			<? } ?>

			<? foreach ($GLOBALS['layout-metatag'] as $k => $column) { ?>
			<div>
				<span><?=lmtc("page:".$column)?> ..</span>
				<textarea placeholder="&lt;?php

some php code

?&gt;" name="<?=$column?>"><?=stripcslashes($rw[$column])?></textarea>
			</div>
			<? } ?>
			<div class='submit-div'>
				<input type="button" value="<?=__('بازگشت')?>" class="btn btn-primary" onclick="location.href='./?page=admin&cp=<?=$_REQUEST['cp']?>'" />
				<input type="submit" value="<?=__('ثبت')?>" class="btn btn-primary" />
			</div>
		</form>
		<?
	}
	
}




