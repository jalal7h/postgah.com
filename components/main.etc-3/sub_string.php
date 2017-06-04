<?

function sub_string($STR, $S, $V){
	
	if(strlen($STR)<=($V-$S))return $STR;
	
	$STR = substr($STR, $S, $V);
	$tmp = explode(' ', $STR);
	for($i=0,$STR='' ; $i<sizeof($tmp)-1; $i++)
		$STR.= ' '.$tmp[$i];
	return $STR;
}
