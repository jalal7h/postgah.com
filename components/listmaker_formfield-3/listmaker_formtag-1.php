<?

# jalal7h@gmail.com
# 2016/04/04
# Version 1.3

/*************************
echo 

fm([
	'table' => 'ipopup' ,
	'name' => __FUNCTION__ , // if not define , it will be some random name
	'class' => __FUNCTION__ , // if define , it will be defined
	'method' => 'post' , // if not method define , it will be 'post'
	'action' => './?page=admin&cp='.$_REQUEST['cp'].'&func=ipopup_mg_list', // must define
	'save_switch' => 'do', // if define , it will be saveNew/saveEdit
	'title_in_span'=> true, // if define , it will be in <span> tag inside inDiv
	'rw'=>$rw, // if not defined , it will be table( $table, $_REQUEST['id'] );
]).

...

fm('close' , $listifcsselements=true );
*********/


function fm($array , $ffcss=false){
	return listmaker_formtag($array , $ffcss);
}

function listmaker_formtag( $array , $ffcss=false ){
	
	#
	# close form
	if($array=='close'){
		
		#
		# unset the form
		$GLOBALS['listmaker_formtag-tableName'] = null;
		$GLOBALS['listmaker_formtag-rw'] = null;
		
		if( $ffcss ){
			echo "ffcss";
			ffcss();
		}
		
		return '</form>';
	}

	#
	# open form

	#
	# table name
	if(! is_array( $array ) ) {
		;//
	} else if(! array_key_exists( 'table' , $array ) ){
		;//
	} else if(! $array['table'] ){
		;//
	} else {
		$GLOBALS['listmaker_formtag-tableName'] = $array['table'];
	}

	#
	# rw
	if(! array_key_exists( 'rw' , $array ) ){
		if(! $array['table'] ){
			;//
		} else if(! $id = $_REQUEST['id'] ){
			;//
		} else if(! $rw = table( $array['table'] , $id ) ){
			;//
		} else {
			$GLOBALS['listmaker_formtag-rw'] = $rw;			
		}
	}


	#
	# title in span global
	if($array['title_in_span']===true){
		$GLOBALS['listmaker_formtag-title_in_span'] = true;
	}

	#
	# check if there is no name for this form, assign some name
	if($array['name']==''){
		$array['name'] = 'form'.rand(1001,9999);
	}
	$GLOBALS['formName'] = $array['name'];
	
	#
	# check if there is no method defined
	if($array['method']==''){
		$array['method'] = 'post';
	}
	
	#
	# check if its having some id and name of save switch
	if($array['save_switch']!=''){
		if($id = $_REQUEST['id']){
			$save_switch_string = "&".$array['save_switch']."=saveEdit&id=".$id;
		} else {
			$save_switch_string = "&".$array['save_switch']."=saveNew";
		}
		$array['action'].= $save_switch_string;
	}
	
	#
	# burn the <form tag
	$c = '<form	enctype="multipart/form-data" 
		'.($array['name'] ? 'name="'.$array['name'].'"':'').'
		'.($array['class'] ? 'class="'.$array['class'].'"':'').'
		'.($array['id'] ? 'id="'.$array['id'].'"':'').'
		method="'.($array['method'] ? $array['method']:'POST').'"
		action="'.$array['action'].'" >';
	
	return $c;
}




