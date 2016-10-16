<?

# jalal7h@gmail.com
# 2015/08/22
# Version 1.0.2

/*
# $position_str (  "1,11,0,0,0" / $tNetbarg / null[from-REQUEST] )

# $position_str = "1,11,0,0,0";
# or
# $position_str = $rw;
# or
# $position_str = null; // from REQUEST
# 
# echo position_select( $position_str=null );

hame position ha ro tu ye select miare
in system positiuon shamele keshvar / ostan / shahr / mantaghe / mahalle hast

# echo position_select( "id-keshvar,id-ostan,id-shahr,id-mantaghe,id-mahale" );
/*README*/

$GLOBALS['do_action'][] = "position_select";

function position_select( $position_str=null ){
	#
	# list if positions
	if(is_string($position_str) and $position_str!=''){
		// its OK
	} else if( 
		(is_string($position_str = $position_str['position_str'])) and 
		($position_str!='') 
	){
		// its OK
	} else if($position_str = $_REQUEST['position_str']){
		// its OK
	} else {
		$position_str = position_select_default_str();
	}
	#
	# current position selecting
	if(!$position_cur = $_REQUEST['position_cur']){
		$position_cur = position_select_default_cur();
	}
	#
	# make the postion str pattern
	# 1,11,0,0,0
	# 1,11,'+this.value+',0,0
	$position_str_array = explode(",", $position_str);
	$position_str_array[$position_cur] = '"+this.value+"';
	$position_str_pattern = implode(',', $position_str_array);
	#
	# make the options
	$global_position_ix = sizeof($GLOBALS['position-default']) - ($position_cur+1);
	$global_position_id = $GLOBALS['position-default'][$global_position_ix]['id'];
	$position_select_options = listmaker_select_options("position",$condition=" AND `type`='$global_position_id' AND `parent`='".$position_str_array[$position_cur-1]."' ",$returnArray=false);
	#
	# display the <select
	$c = "<select id='position_select_".$position_cur."' onchange='document.getElementById(\"position_str\").value=\"".$position_str_pattern."\"; console.log(".$position_cur."); ".
		(
			(($position_cur+1)<sizeof($GLOBALS['position-default'])) ?
				"wget(\"./\", \"position_select_sub_".($position_cur+1)."\", \"do_action=position_select&position_str=".$position_str_pattern."&position_cur=".($position_cur+1)."\");" :
				""
		).
		"'><option value=\"0\"> .. ".$GLOBALS['position-default'][$global_position_ix]['name']." .. </option>".$position_select_options."</select>";
	$c.= "<div id='position_select_sub_".($position_cur+1)."'></div>";
	# 
	# initial wget if its an edit
	$position_str_array = explode(",", $position_str);
	if($position_str_array[$position_cur]!=0){
		$c.= "<script>";
		if( ($position_cur+1) < sizeof($GLOBALS['position-default']) ){
			$c.= "wget(\"./\", \"position_select_sub_".($position_cur+1)."\", \"do_action=position_select&position_str=".$position_str."&position_cur=".($position_cur+1)."\");";
		}
		$c.= "document.getElementById('position_select_".($position_cur)."').value = '".$position_str_array[$position_cur]."';";
		$c.= "</script>";
	}
	#
	# try to display the <input hidden
	if($_REQUEST['do_action']){
		echo $c;
	} else {
		$c.= "<input type='hidden' id='position_str' name='position_str' value='".$position_str."' />";
		return $c;
	}
}

function position_select_default_str(){
	$positions = array_reverse($GLOBALS['position-default']);
	foreach ($positions as $k => $r) {
		if($r['default']==null){
			$str[] = "0";
		} else {
			$str[] = $r['default'];
		}
	}

	return implode(",", $str);
}

function position_select_default_cur(){
	$positions = array_reverse($GLOBALS['position-default']);
	$cur = 0;
	foreach ($positions as $k => $r) {
		if($r['default']==null){
			break;
		}
		$cur++;
	}

	return $cur;
}


