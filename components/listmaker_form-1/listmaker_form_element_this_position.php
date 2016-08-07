<?

function listmaker_form_element_this_position( $info ){

	if( $info['value'] ){
		if( $value_serial = position_id_serial( $info['value'] ) ){
			$value_serial = array_reverse($value_serial);
			$value_serial = implode(',', $value_serial);
		}
	
	} else {
		$value_serial = '';
	}

	$c.= lmfe_tnit( $info );

	if(! sizeof($GLOBALS['position-default']) ){
		e( __FUNCTION__, __LINE__ );

	} else for( $i=sizeof($GLOBALS['position-default']); $i>1; $i-- ){
		
		$pos_info = $GLOBALS['position-default'][$i];
		
		if( $pos_info['default']!=null ){
			continue;
		
		} else if(! $pos_info['id'] ){
			continue;
		
		} else {
			// echo $pos_info['id']."<br>";
		}

		$extra_parent_default = $GLOBALS['position-default'][$i+1]['default'];
		if(! $extra_parent_default ){
			$extra_parent_default = 0;
		}

	}

	$hidden_input_id = "lmfetp_hidden_".$info['name'];

	$c.= $info['PreTab']."<input type=\"hidden\" id=\"".$hidden_input_id."\"".
		" name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" ".
		( $info['value'] ? "value=\"".$info['value']."\" " : '' ).
		"/>\n";

	$c.= "<span id='lmfetpX_".$info['name']."' ></span>\n";
	$c.= "<script> lmfetp( '$extra_parent_default', 'lmfetpX_".$info['name']."', '".$hidden_input_id."', '$value_serial' ); </script>";

	return $c;

}


$GLOBALS['do_action'][] = 'listmaker_form_element_this_position_getChild';

function listmaker_form_element_this_position_getChild(){
	
	$hidden_input_id = trim( strip_tags($_REQUEST['hidden_input_id']) );
	$cat_name = trim( strip_tags($_REQUEST['cat_name']) );
	$parent = intval($_REQUEST['parent']);
	$div_id = 'lmfetp'.$parent;

	if( $parent==0 ){
		die();
	}

	if( $_REQUEST['value_serial'] ){

		$value_serial = trim( strip_tags($_REQUEST['value_serial']) );
		$value_this = strstr($value_serial, ",", 1);
		$value_serial_else = substr( strstr( $value_serial, "," ), 1 );

		if(! $value_this ){
			$value_this = $value_serial;
			$value_serial_else = "";
		}

	}

	if(! $rs = dbq(" SELECT * FROM `position` WHERE `parent`='$parent' ")){
		e(__FUNCTION__,__LINE__);

	} else if(! dbn($rs) ){
		// echo "00";
	
	} else {
		echo '<select id="'.$div_id.'_select" onchange="lmfetp( this.value, \''.$div_id.'\', \''.$hidden_input_id.'\', \'\' );" >'."\n";
		echo "<option value=''>..</option>\n";
		while( $rw = dbf($rs) ){
			echo "<option value='".$rw['id']."'>".$rw['name']."</option>\n";
		}
		echo "</select>\n";
		echo "<span id='$div_id'></span>\n";
		
		echo '
		<script>
			$(document).ready(function($) {
				
				'.($value_this ? '
				lmfetp( '.$value_this.' , \''.$div_id.'\', \''.$hidden_input_id.'\', \''.$value_serial_else.'\' );
				' :'' ).'
	
				cl( "#'.$div_id.'_select" + " / '.$value_this.'" );
				$("#'.$div_id.'_select").delay(2500).val("'.$value_this.'");

			});
		</script>
		';

	}

}








