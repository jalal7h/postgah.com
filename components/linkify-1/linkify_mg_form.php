<?



function linkify_mg_form(){
	
	if(! $id = $_REQUEST['id']){
		;// new
	} else if(! $rw = table("linkify", $id)){
		e(__FUNCTION__ , __LINE__);
	}

	if(! $rs0 = dbq(" SELECT * FROM `page` WHERE 1 ORDER BY `id` ASC ")){
		e(__FUNCTION__ , __LINE__);
	} else while($rw0 = dbf($rs0)){
		$list_of_pages_in_select.= "<option value='./?page=".$rw0['id']."::".$rw0['name']."' >".$rw0['name']."</option>";
	}
	
	echo 
	fm( array( 
	'name'=>'linkify_mg_form' , // if not define , it will be some random name
	'class'=>'linkify_mg_form' , // if define , it will be
	'method'=>'post' , // if not method define , it will be 'post'
	'action'=>'?page=admin&cp='.$_REQUEST['cp']."&l=".$_REQUEST["l"], // must define
	'save_switch'=>'do', // if define , it will be saveNew/saveEdit
	'title_in_span'=>true, // if define , it will be in ff
	)).

	'<input type="hidden" name="parent" value="'.intval($_REQUEST['parent']).'" />'.

	'<div>
		<span class="lmft_tis"></span>
		<select class="list_of_pages_in_select" ><option value="">... لیست صفحات ...</option>'.
			$list_of_pages_in_select.
		'</select>
	</div>'.

	ff('hr').

	ff(array( lmtc("linkify:name") ,'n:name'=>$rw,'inDiv')).
	ff(array( lmtc("linkify:url") ,'n:url'=>$rw,'inDiv')).

	ff('hr').

	( $GLOBALS['linkify_items'][ $_REQUEST["l"] ]['haveIcon'] ?
		ff(array( lmtc("linkify:pic") ,'n:linkify[]'=>'','accept'=>'image/*','inDiv', 'title_in_span'=>false))
		:'' 
	).

	ff(array('t:submit','class'=>'submit_button','n:submit'=>'ثبت','inDiv', 'title_in_span'=>false));

	fm('close' , $listifcsselements=false );

}













