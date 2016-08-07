<?

function getVersionGd(){
	ob_start();
	phpinfo(8);
	$phpinfo = ob_get_contents();
	ob_end_clean();
	$phpinfo = strip_tags($phpinfo);
	$phpinfo = stristr($phpinfo, "gd version");
	$phpinfo = stristr($phpinfo, "version");
	if ($phpinfo === false && function_exists('gd_info')) {
		$phpinfo = gd_info();
		$phpinfo = $phpinfo['GD Version'];
	}
	$end = strpos($phpinfo, ".");
	$phpinfo = substr($phpinfo, 0, $end);
	$length = strlen($phpinfo) - 1;
	$phpinfo = substr($phpinfo, $length);
	$GLOBALS['gdInfo'] = $phpinfo;
	return $phpinfo;
}

