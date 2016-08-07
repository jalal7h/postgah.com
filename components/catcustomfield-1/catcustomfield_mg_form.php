<?

# jalal7h@gmail.com
# 2016/06/14
# Version 1.2

$GLOBALS['catcustomfield-select-options'] = [
	'text'=>'متن ساده',
	'select'=>'انتخابی',
	'radio'=>'دکمه داریوئی',
	'checkbox'=>'چک باکس',
	'textarea'=>'متن بزرگ',
];

function catcustomfield_mg_form(){

	if(! $cat_id = intval($_REQUEST['cat_id']) ){
		e(__FUNCTION__,__LINE__);
		return false;
	
	} else if(! $rw_cat = table("cat", $cat_id) ){
		e(__FUNCTION__,__LINE__);
		return false;
	
	}

	if( $id = $_REQUEST['id'] ){
		if(! $rw_ccf = table('catcustomfield', $id) ){
			e(__FUNCTION__,__LINE__);
			return false;
		}
	}

	echo lmfo([
		'table' => 'catcustomfield' ,
		'action' => './?do_action='.$_REQUEST['do_action'].'&cat_id='.$_REQUEST['cat_id'],
		'name' => __FUNCTION__ ,
		'class' => __FUNCTION__ ,
		'switch' => 'do',
	]);

	echo "<div class='head'><a href='./?do_action=".$_REQUEST['do_action']."&cat_id=".$_REQUEST['cat_id']."'>خصیصه‌های ".$rw_cat['name']."</a>".( $rw_ccf ? " » ".$rw_ccf['name'] : '' )."</div>";

	echo lmfe([
				
		['text:name*','inDiv'],
		['select:type*','option'=>$GLOBALS['catcustomfield-select-options'], 'inDiv'],
		
		'<div '.(in_array($GLOBALS['listmaker_form-rw']['type'],['select','radio'])?'':'style=display:none').' class="option_list">',
			
			['text:option+','inDiv'],
		
		'</div>',

		"<br><hr><br>",

		['submit:ثبت','inDiv'],

	]);

	echo lmfc();

}

