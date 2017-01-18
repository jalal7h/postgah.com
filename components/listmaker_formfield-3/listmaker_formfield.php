<?

# jalal7h@gmail.com
# 2017/01/04
# 3.1

function ff($field){
	return listmaker_formfield($field);
}

function listmaker_formfield($field){

	$lmft_titleInSpan = $GLOBALS['listmaker_formtag-title_in_span'];

	if( $GLOBALS['listmaker_formtag-rw'] ){
		$rw = $GLOBALS['listmaker_formtag-rw'];
		$the_form_is = "edit";
	} else {
		$the_form_is = "new";
	}

	if( isset($field['title_in_span']) ){
		$lmft_titleInSpan = $field['title_in_span'];
	}

	if(!is_array($field)){
		switch ($field) {
			case 'br': return '<br />';
			case 'hr': return '<hr class="listmaker_divider">';
			case 'clear': return '<div class="clear"></div>';
			default: return '<span class="listmaker_formfield_titlespan lmffts">'.$field.'</span>';
		}
	}

	foreach($field as $k0 => $r0){
		
		# 
		# [ 'tag:name' ... ]
		if( is_numeric($k0) and strstr($r0, ':') ){
			$rx = explode(':', $r0);
			if( in_array( $rx[0] , array('text','textarea','file','select','submit','reset','button','checkbox','radio','number','calendar','tag') ) ){
				$field['type'] = $rx[0];
				$field['name'] = $rx[1];
				$field[ $k0 ] = "";
				$r0 = "";
			}
		}

		# $isNeeded = false;
		# $moreButton = false;
		# $inDiv = false;

		# 1. 'n:name' => $rw
		# 2. 'n:name' => 'text'
		# 3. 'n:name' => ''
		# 4. 0 => 'n:name'
		#
		if( is_numeric($k0) and substr($r0,0,2)=='n:' ){
			$k0 = $r0;
			$r0 = $rw;
		}
		#
		# 1. 'n:name' => $rw
		# 2. 'n:name' => 'text'
		# 3. 'n:name' => ''
		# 4. 'n:name' => $rw

		if(substr($k0,0,2)=='n:'){
			$field['name'] = substr($k0,2);
			if(strstr($field['name'],"*")){
				$field['name'] = str_replace("*","",$field['name']);
				$isNeeded = true;
			}
			if(strstr($field['name'],"+")){
				$field['name'] = str_replace("+","",$field['name']);
				$moreButton = true;
				$isArrayInput = true;
			}
			if( substr($field['name'],-2)=='[]' ){
				$field['name'] = substr($field['name'] , 0 , -2);
				$isArrayInput = true;
			}

			// age tu form rw darim
			if(! $r0 ){
				if( $rw ){
					$r0 = $rw;
				}
			}

			// age =>$rw nadarim tu ff
			if(! $r0 ){
				if(! $the_form_is ){
					$the_form_is = "new";
				}

			} else {
				if(! $the_form_is ){
					$the_form_is = "edit";
				}
				
				// age na, age =>$rw araye hast
				if(is_array($r0)){
					$field['value'] = $r0[$field['name']];
				
				// age na, age =>$rw text e
				} else {
					$field['value'] = $r0;
				}
			}

		} else if(is_numeric($k0)){
			if( $r0=='inDiv' ){
				$inDiv = true;
			} else if( substr($r0,0,2)=='t:' ){
				$field['type'] = substr($r0,2);
			} else if(! $field['placeholder'] ){
				$field['placeholder'] = $r0;
			}
		}
	}
	if( ! $field['placeholder'] ){
		if( $GLOBALS['listmaker_formtag-tableName'] ){
			$path_to_field = $GLOBALS['listmaker_formtag-tableName'].
				":".str_replace(array("[","]","+","*"),"", $field['name']);
			if( $lmtc = lmtc( $path_to_field ) ){
				$field['placeholder'] = $lmtc;
			}
		}
	}
	
	if($field['id']=='' and $field['id']!='NuN'){
		$field['id'] = $GLOBALS['formName']."_".str_replace(array("[","]"),"",$field['name'])."_".++$GLOBALS['lmff-rand-id'];
	}
	
	if($field['type']==''){
		if($field['option']!=''){
			$field['type'] = 'select';
		} else if($field['accept']!=''){
			$field['type'] = 'file';
		} else {
			$field['type'] = 'text';
		}
	}

	// echo "<div dir=ltr >".($moreButton?"more ; ":"")."type: ".$field['type'].", name: ".$field['name'].", placeholder: ".$field['placeholder']."</div>";

	switch( $field['type'] ){
		
		case 'select' : 
			if($field['option']){
				if( is_array($field['option']) ){
					foreach($field['option'] as $k => $r){
						$options.= "<option value='$k' >$r</option>";
					}
				} else {
					$options = $field['option'];
				}
			}
			if( $lmft_titleInSpan ){
				$c = "<span class='lmft_tis'>".$field['placeholder']."</span>";
			}
			$c.= "<select title='".$field['placeholder']."' ". // open the tag n also take care of title attr
			($field['class']?"class='".$field['class']."' ":""). // if eny class defined
			($field['name']?"name='".$field['name'].($isArrayInput?'[]':'')."' ":""). // if any name tag defined
			($field['id']?"id='".$field['id']."' ":""). // if any id defined
			($field['etc']?$field['etc']." ":""). // if anything else defined
			">". // close the select tag
			
			( /*$the_form_is=="new"*/ true
				?( ($lmft_titleInSpan or $field['placeholder']=='')
					?"<option value=''>...</option>" 
					:"<option value='' >.. ".$field['placeholder']." ..</option>"
				)
				:""
			).

			$options.

			"</select>".
			($field['value']?"<script>document.getElementById('".$field['id']."').value='".$field['value']."'</script>":"");
			break;
			
		case 'textarea' : 
			if( $lmft_titleInSpan ){
				$c = "<span class='lmft_tis'>".$field['placeholder']."</span>";
			}
			$c.= "<textarea title='".$field['placeholder']."' ".
			($field['class']?"class='".$field['class']."' ":"").
			($field['name']?"name='".$field['name'].($isArrayInput?'[]':'')."' ":"").
			($field['id']?"id='".$field['id']."' ":"").
			($lmft_titleInSpan 
				?"" 
				:($field['placeholder'] 
					?"placeholder='".$field['placeholder']."' "
					:""
				) 
			).
			($field['etc']?$field['etc']." ":"").
			">".
			$field['value'].
			"</textarea>";
			break;
		
		case 'checkbox' : 
			$c = "<label><input ".
			"type='".$field['type']."' ".
			($field['name']?"name='".$field['name'].($isArrayInput?'[]':'')."' ":"").
			($field['checked']?"checked='".$field['checked']."' ":"").
			(intval($field['value'])>0?"checked='1' ":"").
			($field['id']?"id='".$field['id']."' ":"").
			($field['value']?"value='".$field['value']."' ":"value='1'").
			($field['etc']?$field['etc']." ":"").
			"/>&nbsp;".$field['placeholder']."</label>&nbsp;&nbsp;&nbsp;";
			break;
		
		// case 'file' : 
		// 	$c = "<span class='lmfffs'>".$field['placeholder']."</span><input ".
		// 	"type='".$field['type']."' ".
		// 	"class='lmff_file".($field['class']?" ".$field['class']:"")."' ".
		// 	($field['name']?"name='".$field['name']."' ":"").
		// 	($field['id']?"id='".$field['id']."' ":"").
		// 	($field['value']?"value='".$field['value']."' ":"").
		// 	($field['etc']?$field['etc']." ":"").
		// 	($field['accept']?"accept='".$field['accept']."' ":"").
		// 	"/>";
		// 	break;

		case 'file' : 
			if( $lmft_titleInSpan ){
				$c = "<span class='lmft_tis'>".$field['placeholder']."</span>";
			}
			$c.= "<div class='lmff_div'".($lmft_titleInSpan?" style='display:inline-block' ":"")."><span onclick='lmff_div_select( this )' class='lmff_span btn btn-primary'>".$field['placeholder']."</span>".
			"<input ".
			"type='".$field['type']."' ".
			"class='lmff_file".($field['class']?" ".$field['class']:"")."' ".
			($field['name']?"name='".$field['name']."[]' ":"").
			($field['id']?"id='".$field['id']."' ":"").
			($field['value']?"value='".$field['value']."' ":"").
			($field['etc']?$field['etc']." ":"").
			($field['accept']?"accept='".$field['accept']."' ":"").
			($moreButton ?"multiple" :"").
			" /></div>";
			break;
		
		DEFAULT : 
			if( $lmft_titleInSpan ){
				$c = "<span class='lmft_tis'>".$field['placeholder']."</span>";
			}
			$c.= "<input title='".$field['placeholder']."' ".
			"type='".$field['type']."' ".
			($checked?"checked=1 ":"").
			($field['class']?"class='".$field['class']."' ":"").
			($field['name']?"name='".$field['name'].($isArrayInput?'[]':'')."' ":"").
			($field['id']?"id='".$field['id']."' ":"").
			"value='".$field['value']."' ".
			($lmft_titleInSpan 
				?""
				:($field['placeholder'] 
					?"placeholder='".$field['placeholder']."' "
					:""
				)
			).
			($field['accept']?"accept='".$field['accept']."' ":"").
			($field['etc']?$field['etc']." ":"").
			"/>";
			break;
	}

	// if( $field['name']=='doc_name' ){
	// 	echo "<div dir=ltr>".$field['type']." ; ".$field['name']." ; ".$field['value']."</div><br>";
	// }

	# 
	# its related to moreButton
	$moreButton_c_tmp = $c;
	$moreButton_c_tmp = str_replace("value='".$field['value']."'", '', $moreButton_c_tmp);
	$moreButton_c_tmp = str_replace(">".$field['value']."</textarea>", '></textarea>', $moreButton_c_tmp);
	$moreButton_c_tmp = str_replace("<span class='lmft_tis'>".$field['placeholder']."</span>", "<span class='lmft_tis'></span>", $moreButton_c_tmp);

	#
	# preview for `file` input
	// if( $rw and $field['type']=='file' ){
	// 	$value = $rw[ $field['name'] ];
	// 	$c = str_replace('<!--PREVIEW-->', , $c );
	// }

	$c.= "\n";

	if( $field['type'] != 'submit' and $field['type'] != 'file' ){
		if($field['name']){
			$GLOBALS['ffcss-name'][] = $field['name'];
		}
		if($field['id']){
			$GLOBALS['ffcss'][] = $field['id'];
		}
	}
		
	if( $moreButton ){
		$moreButton_c_tmp = "<div class=more >".$moreButton_c_tmp."</div>";
		$moreButton_c_tmp = str_replace("'", '"', $moreButton_c_tmp);
		$moreButton_c_tmp = addcslashes($moreButton_c_tmp, '"');
		// echo "\n\n\n";echo $moreButton_c_tmp;die();
		$c = "<section>$c";
		$rand2 = "plus".rand(1000,9999);
		$c.= "<a onclick='$(\"#".$rand2."\").append(\"".$moreButton_c_tmp."\"); return false;' class='lmff_aplus' href='#' onclick=''><icon></icon></a>";
		$c.= "</section>";
		$c.= "<section id='$rand2' ></section>";
	}

	$c.= listmaker_formfield_file_preuploadedfiles( $field );

	if($field['class']=='tinymce'){
		if(!$GLOBALS['tinymce-defined']){
			$GLOBALS['tinymce-defined'] = true;
			$c.= '
			<!--- tinymce --->
			<script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
			'.js_print( 'layout', 'tinymce-set' ).'
			<!---->
			';
		}
	}
	
	if($inDiv){
		$c = "<div id='inDiv_".$field['id']."' >$c</div>\n";
	}
	
	if( 
		
		// lazeme
		$isNeeded 
		
		and
		
		// in ye virayeshe file nist
		( $field['type']!='file' or $the_form_is=="new" )

	){
		$c.= "
		<script>
			$('form[name=\"".$GLOBALS['formName']."\"]').submit(function(event){
				if($('#".$field['id']."').val()==''){
					$('#".$field['id']."').css('backgroundColor','#fdd');
					$('#".$field['id']."').keydown(function(){
						$(this).css('backgroundColor','');
					});
					$('#".$field['id']."').change(function(){
						$(this).css('backgroundColor','');
					});
					event.preventDefault();
				}
			});
		</script>\n";
	}
	
	return $c;
}


function ffcss(){
	echo "<pre>";
	foreach($GLOBALS['ffcss'] as $k => $r){
		if(!trim($r)){
			continue;
		}
		echo "\n#$r {\n\t\n}";
	}
	echo "\n- - - - - - - - - - - - - - - - - -\n";
	echo " UPDATE `table_name` SET \n";
	foreach($GLOBALS['ffcss-name'] as $k => $r){
		if(!trim($r)){
			continue;
		}
		$list0[] = '`'.$r.'`=\'".$_REQUEST[\''.$r.'\']."\'';
	}
	echo implode(",\n", $list0)."\n";
	echo ' WHERE `id`=\'$id\' LIMIT 1 ';
	echo "\n- - - - - - - - - - - - - - - - - -\n";
	echo " INSERT INTO `table_name` (";
	foreach($GLOBALS['ffcss-name'] as $k => $r){
		if(!trim($r)){
			continue;
		}
		$list1[] = $r;
	}
	echo "`".implode("`,\n`", $list1)."`) VALUES (";
	foreach($GLOBALS['ffcss-name'] as $k => $r){
		if(!trim($r)){
			continue;
		}
		$list2[] = '".$_REQUEST[\''.$r.'\']."';
	}
	echo "'".implode("',\n'", $list2)."')";
	echo "\n- - - - - - - - - - - - - - - - - -\n";
	echo "</pre>";
	die();
}




