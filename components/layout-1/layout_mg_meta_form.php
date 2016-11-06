<?

$GLOBALS['layout-metatag'] = array(
	'meta_title',
	'meta_kw',
	'meta_desc',
);

function layout_mg_meta_form(){
	
	if(! $id = $_REQUEST['id'] ){
		e();
	
	} else if(! $rw = table("page", $id) ){
		e();
	
	} else {
		?>
		<form name="layout_mg_meta_form" class="layout_mg_meta_form" method="post" action="./?page=admin&cp=<?=$_REQUEST['cp']?>&do=meta_save&id=<?=$_REQUEST['id']?>">
			<? foreach ($GLOBALS['layout-metatag'] as $k => $column) { ?>
			<div>
				<span><?=lmtc("page:".$column)?> ..</span>
				<textarea placeholder="&lt;?php


some php code


?&gt;" name="<?=$column?>"><?=$rw[$column]?></textarea>
			</div>
			<? } ?>
			<div class='submit-div'>
				<input type="button" value="<?=__('بازگشت')?>" class="submit_button" onclick="location.href='./?page=admin&cp=<?=$_REQUEST['cp']?>'" />
				<input type="submit" value="<?=__('ثبت')?>" class="submit_button" />
			</div>
		</form>
		<?
	}
	
}




