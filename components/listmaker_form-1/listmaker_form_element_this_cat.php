<?

# jalal7h@gmail.com
# 2016/06/10
# Version 1.2

function listmaker_form_element_this_cat( $info ){
	
	if( $info['value'] ){
		$value_serial = cat_id_serial( $info['value'] );
		$value_serial = array_reverse($value_serial);
		$value_serial = implode(',', $value_serial);

	} else {
		$value_serial = '';
	}

	if(! $info['cat_name'] ){
		echo "no cat defined !";
		return false;
	}
	
	#
	# check if this cat have subcat
	if(! $GLOBALS['cat_items'][ $info['cat_name'] ][2] ){
		$noSubcat = 1;
	} else {
		$noSubcat = 0;
	}

	$c.= lmfe_tnit( $info );

	$c.= "
	<span class='lmfetc_container' rel_cat_name='{$info['cat_name']}' >
		<input ".($info['isNeeded']?'class="lmfe_isNeeded"':'')." type=\"hidden\" name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" ".( $info['value'] ? "value=\"".$info['value']."\" " : '' )." />
		<span class='lmfetc' rel_parent='0' rel_no_subcat='$noSubcat' rel_value_serial='$value_serial'></span>
	</span>";
	
	if( is_component('catcustomfield') ){
		if(! $info['ArrayInput'] ){
			$cat_name = $info['cat_name'];
			$item_table = $GLOBALS['listmaker_form-formTable'];
			$item_id = $GLOBALS['listmaker_form-rw']['id'];
			$c.= catcustomfield_console( $cat_name, $item_table, $item_id );
		}
	}

	return $c;

}

$GLOBALS['do_action'][] = 'listmaker_form_element_this_cat_fetchSubCat';
function listmaker_form_element_this_cat_fetchSubCat(){

	#
	# vars
	$cat_name = trim( strip_tags($_REQUEST['cat_name']) );
	$parent = intval($_REQUEST['parent']);
 	$value_serial = strip_tags($_REQUEST['value_serial']);
	
	#
	# fix value_serial
	if( $value_serial ){
		$value_serial = explode(',', $value_serial);
		$value_serial = array_reverse($value_serial);
		$value_this = intval(array_pop($value_serial));
		$value_serial = array_reverse($value_serial);
		$value_serial = implode(',', $value_serial);
	} else {
		$value_this = 0;
	}
	
	#
	# main query
	if(! $rs = dbq(" SELECT * FROM `cat` WHERE `cat`='$cat_name' AND `parent`='$parent' ")){
		e(__FUNCTION__,__LINE__);

	#
	# if no child
	} else if(! dbn($rs) ){
		// echo "00";
	
	} else {
		

		$lmfetc_rahem_rand = 'lmfetc_rand_'.rand(100000,999999);
		error_log('kkl; '.$lmfetc_rahem_rand);

		# 
		# the select
		echo "<select onchange='lmfetc_load( $(\"#$lmfetc_rahem_rand\") , this.value );' ><option value=''>..</option>";
		while( $rw = dbf($rs) ){
			echo "<option ".($rw['id']==$value_this ? "selected=1": '')." value='{$rw['id']}'>{$rw['name']}</option>";
		}
		echo "</select>";

		#
		# makan e bevojud amadan e child
		echo "<span id='$lmfetc_rahem_rand' class='lmfetc' rel_parent='$value_this' rel_value_serial='$value_serial'></span>";

		if( $value_this ){
			?><script>lmfetc_load( $('#<?=$lmfetc_rahem_rand?>'), '<?=$value_this?>' );</script><?
		}
	}
}










