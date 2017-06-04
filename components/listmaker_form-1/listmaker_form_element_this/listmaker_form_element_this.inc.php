<?

# jalal7h@gmail.com
# 2017/05/16
# 1.10

/*
	
	'[ 'text','color','name','number','float','cell','phone','textarea','select','checkbox','radio','date','clock','toggle','url','email','file','submit','hidden','password','cat','catbox','catsearch','position','positionbox','keyword','searchbox','head','catcheck','count','cost','memo' ]'
	
	['text:name*+{ + will add `[]` }'],
	['color:color_code'],
	['number:tell[]{ `[]` will be added to name }'],
	['textarea:desc.tinymce class_name'],
	['name:name@{ @ -> force title in element, !@ -> force title no in element }','forced place holder { not-array not-inDiv not-text:..  }'],
	['text:student_id','notInDiv'],
	['select:name#some_id'=>'2{ forced_value }','option{string/array}'=>listmaker_option($table_name)],
	'some text',
	['file:attachment.someClass and_moreclass','accept'=>'image/*'],
	['submit:Submit!.some_class more class#some_id.className/rel="1"'],

/*README*/

function listmaker_form_element_this( $list ){

	# 
	# list of defined elements
	$aol = [ 'text','color','name','number','float','cell','phone','textarea','select','checkbox','radio','date','clock','toggle','url','email','file','submit','hidden','password','cat','catbox','catsearch','position','positionbox','keyword','searchbox','head','catcheck','count','cost','memo' ];

	#
	# preparing `info`
	foreach( $list as $k => $r ){

		if( is_numeric($k) ){
			$numeric_index = true;
			$k = $r;
			$r = $rw;
		
		} else {
			$numeric_index = false;
		}

		#
		# mining
		$info['inDiv'] = true;
		if( in_array( explode(':', $k)[0] , $aol )){
			
			# 
			# `type`
			$type = explode(':', $k)[0];
			$type_etc = substr( $k, strlen($type)+1 );
			
			# 
			# `etc`
			$etc = trim(explode("/", $type_etc)[1]);
			$type_etc = explode("/", $type_etc)[0];

			# 
			# mining `id`
			if( strstr( $type_etc, '#' )){
				$id = explode('#', $type_etc)[1];
				$id = explode('.', $id)[0];
				$id = explode(' ', $id)[0];
				$type_etc = str_replace( '#'.$id, '', $type_etc );
			}
			
			# 
			# mining `name`
			$name = explode('.', $type_etc)[0];
			$type_etc = substr( $type_etc, strlen($name) );			

			#
			# mining `class`
			$class = str_replace( '.', ' ', $type_etc );
			$class = trim($class);

			#
			# mining `value`
			if( $r ){
				$value = $r;
			}

		} else if( $numeric_index and $k=='inDiv' ) {
			// its deprecated

		} else if( $numeric_index and $k=='notInDiv' ) {
			$info['PreTab'].= "\t";
			$info['inDiv'] = false;
		
		} else if( $numeric_index ){
			$info['placeholder'] = $k;
			
		} else if( in_array( $k, [ 'option', 'accept', 'cat_name', 'ccf', 'content_min', 'content_max', 'placeholder', 'dir', 'feed', 'prompt', 'validation' ] ) ){
			$info[$k] = $r;
		
		} else {
			return "invalid form element type [ $k : $r ]\n";
		}
	}
	#
	# filling `info`
	$info['type'] = $type;
	$info['etc'] = $etc;
	$info['id'] = $id;
	$info['name'] = $name;
	$info['class'] = $class;
	$info['value'] = $value;
	
	#
	# globals
	$info['formTable'] = $GLOBALS['listmaker_form-formTable'];
	$info['formName'] = $GLOBALS['listmaker_form-formName'];


	#
	# `name` flags
	# 
	# isNeeded
	if( strstr($info['name'], '*') ){
		$info['isNeeded'] = true;
		$info['name'] = str_replace( '*', '', $info['name'] );
	}
	#
	# ArrayInput
	if( strstr($info['name'], '[]') ){
		$info['ArrayInput'] = true;
		$info['name'] = str_replace( '[]', '', $info['name'] );
	}
	#
	# moreButton
	if( strstr($info['name'], '+') ){
		$info['moreButton'] = true;
		$info['moreButton_icon'] = true;
		$info['ArrayInput'] = true;
		$info['PreTab'].= "\t";
		$info['name'] = str_replace( '+', '', $info['name'] );
	}
	#
	# TitleInTag
	if( $GLOBALS['listmaker_form-TitleInTag'] ){
		$info['TitleInTag'] = true;
	}
	if( strstr($info['name'], '@') ){
		if( $info['type']!='submit' and strstr($info['name'], '!@') ){
			$info['TitleInTag'] = false;
			$info['name'] = str_replace( '!@', '', $info['name'] );
		} else {
			$info['TitleInTag'] = true;
			$info['name'] = str_replace( '@', '', $info['name'] );
		}
	}


	#
	# forced value
	if( $info['value'] ){
		;//
	
	#
	# value in db
	} else if( $GLOBALS['listmaker_form-rw'] and isset($GLOBALS['listmaker_form-rw'][$info['name']]) ){
		$info['value'] = $GLOBALS['listmaker_form-rw'][ $info['name'] ];
	
	#
	# there is no forced value and its a new form
	} else {
		;//
	}


	#
	# default placeholder
	if(! $info['placeholder'] ){
		if(! $info['placeholder'] = lmtc( $GLOBALS['listmaker_form-formTable'].':'.$info['name'] ) ){
			$info['placeholder'] = lmtc( $GLOBALS['listmaker_form-formTable'].'_'.$info['name'].':'.$info['name'] );
		}
	}


	#
	# is needed elements
	if( $info['isNeeded'] ){
		$info['class'].= " lmfe_isNeeded";
		$info['class'] = trim($info['class']);
	}

	
	#
	# bake
	$c.= lmfe_this_loadFromForegnTable( $info );


	#
	# return html export
	return $c;

}


function lmfe_this_loadFromForegnTable( $info ){

	#
	# solo element / new form
	if( (!$info['moreButton']) or (!$GLOBALS['listmaker_form-rw']) ){
		//

	} else if( in_array( $info['type'] , ['position','file','submit'] ) ){
		//

	} else {

		#
		# variables
		$fg_tableName = $GLOBALS['listmaker_form-formTable']."_".$info['name'];
	 	$fg_idColumn = $GLOBALS['listmaker_form-formTable']."_id";
	 	$fg_idColumn_value = $GLOBALS['listmaker_form-rw']['id'];
		$fg_column = $info['name'];

	 	if(! is_table($fg_tableName) ){
	 		;//
	 	
	 	} else if(! is_column( $fg_tableName, ['id', $fg_idColumn, $fg_column] ) ){
	 		;//

	 	} else if(! $rs_fg = dbq(" SELECT * FROM `$fg_tableName` WHERE `$fg_idColumn`='$fg_idColumn_value' ORDER BY `id` ") ){
	 		e();

	 	} else if(! $rn_fg = dbn($rs_fg) ){
	 		;//

	 	} else {
	 		while( $rw_fg = dbf($rs_fg) ){
	 			$info['value'] = $rw_fg[ $fg_column ];
	 			if( ++$fgi == $rn_fg ){
	 				$info['moreButton'] = true;
	 			} else {
	 				$info['moreButton'] = false;	 				
	 			}
	 			$c.= "<input type=\"hidden\" name=\"".$info['name']."_in_table[]\" value=\"".$rw_fg['id']."\"/>\n";
				$c.= lmfe_this_loadFromForegnTable_this( $info );	

	 		}
			return $c;
	 	}


	}

	return lmfe_this_loadFromForegnTable_this( $info );
}


function lmfe_this_loadFromForegnTable_this( $info ){

	#
	# running the element processor
	$func = 'listmaker_form_element_this_'.$info['type'];
	if( function_exists( $func )){
		
		if( function_exists($info['validation']) ){
			$info['class'].= " lmfe_validation_input";
			$info['etc'].= " func=\"".str_enc( $info['validation'] )."\"";
		}

		#
		# func
		$c = $func( $info );
		
		#
		# moreButton
		$c = lmfe_moreButton__nsf( $info, $c );

		#
		# validation cover
		if( function_exists($info['validation']) ){
			$c = lmfe_validation_cover( $info, $c );
		}
		
		#
		# inDiv
		$c = lmfe_inDiv_cover( $c, $info );
		
	} else {
		$c = "function $func does not exists\n";
	}

	return $c;
}








