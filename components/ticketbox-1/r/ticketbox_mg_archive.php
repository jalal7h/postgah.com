<?

function ticketbox_mg_archive(){
	
	$list['query'] = " SELECT * FROM `ticketbox` WHERE `archived`='1' ORDER BY `date` DESC ";
	$list['target_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["cp"]."_waiting&do=".$_REQUEST["cp"]."_form"."&id=".$rw["id"]';
	$list['paging_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]';
	$list['remove_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["cp"]."_waiting&do=".$_REQUEST["cp"]."_remove&id=".$rw["id"]';
	$list['remove_prompt'] = '__("آیا مایل به حذف تیکت با عنوان `%%` هستید?", [ $rw["name"] ] )';
	$list['list_array'] = array(
		# 
		# name
		array(	"content" => '$rw[\'name\']' , "attr" => array("align" => 'right',"dir" => _rtl) ),
		# 
		# user name
		array(	"content" => 'table(\'users\', $rw[\'uid\'], \'name\')' , "attr" => array("width" => "150px" , "align" => 'right',"dir" => _rtl) ),
		#
		# cat
		array(	"content" => 'cat_translate($rw[\'cat\'])' , "attr" => array("width" => "150px" , "align" => 'center',"dir" => _rtl) ),
		#
		# date
		array(	"content" => 'substr(u2vaght($rw[\'date\']), 0, 16)' , "attr" => array("width" => "120px" , "align" => 'center',"dir" => _ltr) ),

	);

	$list['paging_select'] = array(
		'cat' => "<option value=''>.. ".lmtc('ticketbox:cat')." ..</option>".cat_display('ticketbox',$is_array=false,$parent=0,$optionPreStr=""),
		
	);

	echo listmaker_list($list);
	
}

